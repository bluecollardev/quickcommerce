<?php

namespace App;

use Doctrine\Common\Collections\Criteria,
    Doctrine\ORM\Mapping\ClassMetadata,
    Doctrine\Common\Util\Inflector,
    Doctrine\Common\Util\Debug,
    Doctrine\ORM\EntityManager,
    Exception;

use Doctrine\ORM\Query\Expr;
use QuickCommerce\API\Service\AbstractAPIService;

abstract class Resource
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;


    protected $entityName;

    protected $repo;

    protected $meta;

    protected $map;
    /**
     * @var int
     */
    protected $_recursionDepth = 0;

    /**
     * @var int
     */
    protected $_maxRecursionDepth = 4;

    // TODO: Abstract method to set mapping ($map), force implementation

    public function __construct(\Doctrine\ORM\EntityManager &$entityManager, $entityName)
    {
        $this->setEntityManager($entityManager);
        $this->entityName = $entityName;
        $this->repo = $this->getEntityManager()->getRepository($this->entityName);
        $this->meta = $this->getEntityManager()->getClassMetadata($this->entityName);
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @param \Doctrine\ORM\EntityManager $entityManager
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;

        return $this;
    }

    public function serializeEntity($entity, $tableize = false, $children = array(), $exclude = array(), $arrayDates = true)
    {
        return $this->_serializeEntity($entity, $tableize, $children, $exclude, $arrayDates);
    }

    protected function _serializeEntity($entity, $tableize = true, $assoc = array(), $exclude = array(), $arrayDates = true)
    {
        $className = get_class($entity);
        $metadata = $this->entityManager->getClassMetadata($className);

        if (is_array($assoc) && count($assoc) > 0) {
            list($prop, $assoc) = each($assoc);
            // To prevent too much recursion, we add the current key to the exclusion list,
            // unless the current property is specifically included in the association
            // structure provided
            if (is_array($assoc) && !array_key_exists($prop, $assoc)) {
                array_push($exclude, $prop);
            }
        }

        $data = array();

        foreach ($metadata->fieldMappings as $field => $mapping) {
            $value = $metadata->reflFields[$field]->getValue($entity);
            $field = ($tableize == true) ? Inflector::tableize($field): $field;

            $castValue = true;
            if ($value instanceof \DateTime || $value instanceof \Date) {
                if ($arrayDates) {
                    // If arrayDates is true (by default), we cast DateTime to array to keep consistency with array result
                    $data[$field] = (array)$value;
                } else {
                    $castValue = false;
                }
            } elseif (is_object($value)) {
                // Catch all other objects and cast to string
                $data[$field] = (string)$value;
            } else {
                $castValue = false;
            }

            if (!$castValue) {
                $data[$field] = $value; // Leave type alone
            }
        }

        foreach ($metadata->associationMappings as $field => $mapping) {
            $key = ($tableize == true) ? Inflector::tableize($field) : $field;

            if ($mapping['isCascadeDetach']) {
                $data[$key] = $metadata->reflFields[$field]->getValue($entity);
                if (null !== $data[$key]) {
                    $data[$key] = $this->_serializeEntity($data[$key]); // This may error out?
                }
            } elseif (($mapping['isOwningSide'] && $mapping['type'] & ClassMetadata::TO_ONE) || (is_array($assoc) && array_key_exists($field, $assoc))) {

                $value = $metadata->reflFields[$field]->getValue($entity);
                if (null !== $value) {
                    if (($this->_recursionDepth < $this->_maxRecursionDepth) && !in_array($field, $exclude)) {
                        $this->_recursionDepth++;

                        if (get_class($value) == 'Doctrine\ORM\PersistentCollection') {
                            $data[$key] = array();

                            foreach ($value as $child) {
                                array_push($data[$key], $this->_serializeEntity($child, $tableize, array($field => $assoc[$field]), $exclude));
                            }
                        } else {
                            $assocField = isset($assoc[$field]) ? $assoc[$field] : null;
                            $data[$key] = $this->_serializeEntity($value, $tableize, array($field => $assocField), $exclude);
                        }

                        $this->_recursionDepth--;
                    } else {
                        $data[$key] = $this->getEntityManager()
                            ->getUnitOfWork()
                            ->getEntityIdentifier($value);
                    }
                } else {
                    // In some case the relationship may not exist, but we want  to know about it
                    $data[$key] = null;
                }
            }
        }

        return $data;
    }

    /**
     * Serialize an entity to an array
     *
     * @param The entity $entity
     * @return array
     */
    public function toArray($entity)
    {
        return $this->_serializeEntity($entity);
    }


    /**
     * Convert an entity to a JSON object
     *
     * @param The entity $entity
     * @return string
     */
    public function toJson($entity)
    {
        return json_encode($this->toArray($entity));
    }

    /**
     * Convert an entity to XML representation
     *
     * @param The entity $entity
     * @throws Exception
     */
    public function toXml($entity)
    {
        throw new Exception('Not yet implemented');
    }

    /**
     * Set the maximum recursion depth
     *
     * @param   int     $maxRecursionDepth
     * @return  void
     */
    public function setMaxRecursionDepth($maxRecursionDepth)
    {
        $this->_maxRecursionDepth = $maxRecursionDepth;
    }

    /**
     * Get the maximum recursion depth
     *
     * @return  int
     */
    public function getMaxRecursionDepth()
    {
        return $this->_maxRecursionDepth;
    }

    /**
     * @param $id
     * @return object
     */
    public function getEntity($id, $serialize = true, $tableize = true, $format = array(), $exclude = array())
    {
        /**
         * @var \App\Entity $entity
         */
        $repository = $this->getEntityManager()->getRepository($this->entityName);
        $entity = $repository->find($id);

        if ($entity === null) {
            return null;
        }

        if ($serialize) {
            $result = $this->_serializeEntity($entity, $tableize, $format, $exclude);


            if (in_array('description', $result) && isset($result['description'])) {
                if (is_array($result['description']) && count($result['description'] > 0)) {
                    // TODO: Get the right language - for now just use default
                    $description['name'] = $result['description'][0]['name'];
                    $description['description'] = '';
                    //$description['description'] = htmlentities($result['description'][0]['description']);

                    $result = array_merge($result, $description);
                }
            }

            $entity = $result;
        }

        return $entity;
    }

    public function findEntityByDescriptionName($name, $serialize = true, $tableize = true)
    {
        /**
         * @var \App\Entity $entity
         */
        $repository = $this->getEntityManager()->getRepository($this->entityName);
        $qb = $repository->createQueryBuilder('e');
        $qb->join('e.description', 'd')
            ->where($qb->expr()->eq('d.name', $qb->expr()->literal($name)));

        $entity = $qb->getQuery()->getResult();

        if (empty($entity)) {
            return null;
        }

        if ($serialize) {
            return $this->_serializeEntity($entity, $tableize);
        }

        return $entity;
    }

    public function findEntityByName($name, $serialize = true, $tableize = true)
    {
        /**
         * @var \App\Entity $entity
         */
        $repository = $this->getEntityManager()->getRepository($this->entityName);
        $qb = $repository->createQueryBuilder('e');
        $qb->where($qb->expr()->eq('e.name', $qb->expr()->literal($name)));

        $entity = $qb->getQuery()->getResult();

        if ($entity === null) {
            return null;
        }

        if ($serialize) {
            return $this->_serializeEntity($entity, $tableize);
        }

        return $entity;
    }

    public function getMax($alias = 'e', $field, $where = null)
    {
        // TODO: Duck type 'where' param?
        $repository = $this->getEntityManager()->getRepository($this->entityName);
        $qb = $repository->createQueryBuilder($alias);
        $qb->select($alias, 'MAX(' . $alias . '.' . $field . ') AS value');

        if ($where) { // TODO: Instance of...
            $qb->add('where', $where);
        }

        $results = $qb->getQuery()->getResult();

        return $results;
    }

    public function findWhere($alias = 'e', $where = null, $orderBy = null)
    {
        // TODO: Duck type 'where' param?
        $repository = $this->getEntityManager()->getRepository($this->entityName);
        $qb = $repository->createQueryBuilder($alias);

        if ($where) {
            $qb->add('where', $where);
        }

        if ($orderBy) {
            $qb->add('orderBy', $orderBy);
        }

        $results = $qb->getQuery()->getResult();

        return $results;
    }

    /**
     * Don't allow direct access to the repository
     */
    public function find(Criteria $criteria)
    {
        $repository = $this->getEntityManager()->getRepository($this->entityName);
        return $repository->matching($criteria);
    }

    public function countAll()
    {
        // TODO: This will only work for entities with a single identifier
        // I will need to patch this for entities with multiple identifiers or composite keys
        $key = $this->meta->identifier[0];

        $repository = $this->getEntityManager()->getRepository($this->entityName);
        $qb = $repository->createQueryBuilder('e');
        $qb->select('count(e.' . $key . ')');

        $total = $qb->getQuery()->getSingleScalarResult();

        return (!empty($total)) ? $total : 0;
    }

    /**
     * TODO: Split this into three methods - getCollection, getSerializedCollection, and possibly getTableizedCollection/getOcCollection
     * There are way too many params here
     * @return array|null
     */
    public function getCollection($serialize = true, $tableize = true, $format = array(), $exclude = array(), $limit = 10, $offset = 0, $order = array())
    {
        $repository = $this->getEntityManager()->getRepository($this->entityName);

        try {
            // TODO: Doctrine supports multi-sort :)
            if (is_string($order)) {
                // TODO: This will only work for entities with a single identifier
                // I will need to patch this for entities with multiple identifiers or composite keys
                $key = $this->meta->identifier[0]; // TODO: Regex check?
                $order = array($key => $order);
            }

            $collection = $repository->findBy(array(), $order, $limit, $offset); //$repository->findAll();
        } catch (Exception $e) {
            //throw $e;
            echo $e;
            exit;
        }

        if (empty($collection)) {
            return null;
        } elseif (!empty($collection) && $serialize == false) {
            return $collection;
        }

        /**
         * @var \App\Entity $entity
         */
        $data = array();
        foreach ($collection as $entity)
        {
            $result = $this->_serializeEntity($entity, $tableize, $format, $exclude);

            if (in_array('description', $result) && isset($result['description'])) {
                if (is_array($result['description']) && count($result['description'] > 0)) {
                    // TODO: Get the right language - for now just use default
                    $description['name'] = $result['description'][0]['name'];
                    $description['description'] = '';
                    //$description['description'] = htmlentities($result['description'][0]['description']);

                    $result = array_merge($result, $description);
                }
            }

            $data[] = $result;
        }

        return $data;
    }

    public function deleteEntity($id)
    {
        /**
         * @var \App\Entity $entity
         */
        $repository = $this->getEntityManager()->getRepository($this->entityName);
        $entity = $repository->find($id);

        if ($entity === null) {
            return false;
        }

        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();

        return true;
    }

    public function updateEntity($entity)
    {
        /**
         * @var \App\Entity $entity
         */
        if ($entity === null) {
            return false;
        }

        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();

        return true;
    }

    protected function getNewInstance()
    {
        if (class_exists($this->entityName) === false) {
            throw new \Exception('Unable to create new instance of ' . $this->entityName);
        }

        return new $this->entityName;
    }

    /**
     * {@inheritdoc}
     */
    public function writeItem(array $item, $camelize = false)
    {
        $entity = $this->findOrCreateItem($item);

        //$this->loadAssociationObjectsToEntity($item, $entity);
        $this->fillEntity($item, $entity, $camelize);

        return $entity;
    }

    public function findOrCreateItem(array $item)
    {
        $entity = null;

        if (isset($this->lookupFields) && count($this->lookupFields) > 0) {
            $lookupConditions = array();
            foreach ($this->lookupFields as $fieldName) {
                $lookupConditions[$fieldName] = $item[$fieldName];
            }
            $entity = $this->repo->findOneBy(
                $lookupConditions
            );
        } else {
            //$entity = $this->entityRepository->find(current($item)); // This is how it's done in the original library
            $params = array(); // This works better because the first key may not be the id
            foreach ($this->meta->identifier as $id) {
                if (isset($item[$id])) {
                    $params[$id] = $item[$id];
                }
            }

            if (!count($params) > 0) {
                return $this->getNewInstance();
            }

            $entity = $this->repo->find($params);
        }

        if (!$entity) {
            return $this->getNewInstance();
        }

        return $entity;
    }

    /**
     *
     * @param array $item
     * @param object $entity
     */
    public function fillEntity(array $item, &$entity, $camelize = false, $meta = null)
    {
        $meta = (isset($meta)) ? $meta : $this->meta;

        $fieldNames = array_merge($meta->getFieldNames(), $meta->getAssociationNames());
        foreach ($fieldNames as $fieldName) {
            $key = ($camelize == true) ? Inflector::camelize($fieldName): Inflector::tableize($fieldName); // Deal with serialized input - see serializeEntity

            $value = null;
            if (isset($item[$key])) {
                $value = $item[$key];
            } elseif (method_exists($item, 'get' . ucfirst($fieldName))) {
                $value = $item->{'get' . ucfirst($fieldName)};
            }

            if (null === $value) {
                continue;
            }

            // TODO: Need to move this patch outta here in case I refresh the lib
            if (!($value instanceof \DateTime) || $value != $meta->getFieldValue($entity, $fieldName)) {
                // Looks like this was done for Doctrine 1.x, it's not working in 2.x (methods like from/toArray were removed... might have something to do with it?
                if ($meta->hasAssociation($fieldName)) {
                    // Don't set assoc, it won't work!
                    // I need some better checks in here... I might have my mappings incorrectly specified but I'm not getting a relationship type in the association meta
                    $associationMapping = $meta->getAssociationMapping($fieldName);

                    /*if (is_array($value) && (array_keys($value) == range(0, count($value) - 1))) {
                        // Indexed array - target is a collection
                        // Processing in a callback is a better option -- this can get way too convoluted
                        $collection = $entity->{'get'. ucfirst($fieldName)}(); // Get the collection
                        foreach ($value as $collectionItem) {
                            //$ref = $this->entityManager->getReference($associationMapping['targetEntity'], $collectionItem);
                            $ref = new $associationMapping['targetEntity'];
                            $this->loadAssociationObjectsToEntity($collectionItem, $ref);
                            $this->updateEntity($collectionItem, $ref);
                            var_dump($collectionItem);
                            $this->entityManager->persist($ref);
                            $collection->add($ref);
                        }
                    } else {
                        $value = $this->getEntityManager()->getReference($associationMapping['targetEntity'], $value);
						
						$setter = 'set' . ucfirst($fieldName);
						$this->setValue($entity, $value, $setter);
                    }*/
                } else {
                    $setter = 'set' . ucfirst($fieldName);
                    $this->setValue($entity, $value, $setter);
                }

                //$setter = 'set' . ucfirst($fieldName);
                //$this->setValue($entity, $value, $setter);
            }
        }
    }

    protected function setValue($entity, $value, $setter) {
        if (method_exists($entity, $setter)) {
            $entity->$setter($value);
        }
    }
}
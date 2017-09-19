<?php

namespace App\Resource;

use App\Resource;
use \OcInvoice as Entity;

class Invoice extends Resource
{
    protected static $format = array(
        'invoice' => array(
            'transaction' => null,
            'customer' => null,
            'address' => null,
            'lines' => array(
                'line' => null
            ),
            'manufacturer' => null
        )
    );

    protected static $exclude = array();

    public function getEntity($id, $serialize = true, $tableize = true, $format = array(), $exclude = array())
    {
        return parent::getEntity($id, $serialize, $tableize, self::$format, self::$exclude);
    }

    public function getCollection($serialize = true, $tableize = true, $format = array(), $exclude = array(), $limit = 150, $offset = 0, $order = array())
    {
        return parent::getCollection($serialize, $tableize, self::$format, self::$exclude, $limit, $offset, $order);
    }

    /**
     * @param array $data
     * @param bool|true $serialize
     * @param bool|true $tableize
     * @return \App\Entity|array|null
     * Options:
     * 'filter_invoice_id'    => $filter_invoice_id,
     *  'filter_customer'	   => $filter_customer,
     *  'filter_invoice_status'  => $filter_invoice_status,
     *  'filter_total'         => $filter_total,
     *  'filter_date_added'    => $filter_date_added,
     *  'filter_date_modified' => $filter_date_modified,
     *  'sort'                 => $sort,
     *  'order'                => $order,
     *  'start'                => ($page - 1) * $limit,
     *  'limit'                => $limit
     */
    public function search($params = array(), $serialize = true, $tableize = true)
    {
        $format = self::$format;
        $exclude = self::$exclude;
        
        $repository = $this->getEntityManager()->getRepository($this->entityName);

        try {
            $qb = $repository->createQueryBuilder('e');
            $qb->leftJoin('e.customer', 'c');

            $where = array();

            if (isset($params['filter_invoice_id'])) {
                $where[] = 'e.invoiceId LIKE :invoiceId';
            }

            if (isset($params['filter_customer'])) {
                $chunks = explode(' ', $params['filter_customer']); // If someone is too dumb to check for crazy characters, whatever, just gotta ignore stuff now and get this out. We're accounting for names in reverse order below...
                if (count($chunks) > 0) {
                    for ($idx = 0; $idx < count($chunks); $idx++) {
                        $where[] = 'c.firstname LIKE :firstname' . $idx;
                        $where[] = 'c.lastname LIKE :lastname' . $idx; // Don't concat these together I want independent search of both
                        //$where[] = 'c.company LIKE :company';
                    }
                }
            }

            if (isset($params['filter_total'])) {
                //$where[] = '';
            }

            if (isset($params['filter_date_added'])) {
                $where[] = 'e.invoiceDate = :invoiceDate';
            }

            if (isset($params['filter_date_modified'])) {
                $where[] = 'e.dueDate = :dueDate';
            }

            $firstWhere = true;
            foreach ($where as $condition) {
                if ($firstWhere) {
                    $qb->where($condition);
                    $firstWhere = false;
                } else {
                    $qb->orWhere($condition);
                }
            }

            if (isset($params['filter_invoice_id'])) {
                $qb->setParameter('invoiceId', $params['filter_invoice_id']);
            }

            if (isset($params['filter_customer'])) {
                if (count($chunks) > 0) {
                    $input = array();
                    for ($idx = 0; $idx < count($chunks); $idx++) {
                        $qb->setParameter('firstname' . $idx, $chunks[$idx]);
                        $qb->setParameter('lastname' . $idx, $chunks[$idx]);
                    }
                }
            }

            if (isset($params['filter_total'])) {
                //$where[] = $filter['filter_total'];
            }

            if (isset($params['filter_date_added'])) {
                $qb->setParameter('invoiceDate', $params['filter_date_added']);
            }

            if (isset($params['filter_date_modified'])) {
                $qb->setParameter('dueDate', $params['filter_date_modified']);
            }
            
            $qb->orderBy('e.' . $params['sort'], $params['order']) // Cannot order by relationed field or this can crash...
                ->setFirstResult($params['start'])
                ->setMaxResults($params['limit']);
        
            $collection = $qb->getQuery()->getResult();
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
        
        $data = array();
        foreach ($collection as $entity)
        {
            $result = $this->_serializeEntity($entity, $tableize, $format, $exclude);

            /*if (in_array('description', $result) && isset($result['description'])) {
                if (is_array($result['description']) && count($result['description'] > 0)) {
                    // TODO: Get the right language - for now just use default
                    $description['name'] = $result['description'][0]['name'];
                    $description['description'] = '';
                    //$description['description'] = htmlentities($result['description'][0]['description']);

                    $result = array_merge($result, $description);
                }
            }*/

            $data[] = $result;
        }

        return $data;
    }
}
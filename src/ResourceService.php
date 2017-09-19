<?php

namespace App;

//use Slim\Slim;
use Doctrine\ORM\Configuration;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\ORM\EntityManager;

abstract class ResourceService
{
    const STATUS_OK = 200;
    const STATUS_CREATED = 201;
    const STATUS_ACCEPTED = 202;
    const STATUS_NO_CONTENT = 204;

    const STATUS_MULTIPLE_CHOICES = 300;
    const STATUS_MOVED_PERMANENTLY = 301;
    const STATUS_FOUND = 302;
    const STATUS_NOT_MODIFIED = 304;
    const STATUS_USE_PROXY = 305;
    const STATUS_TEMPORARY_REDIRECT = 307;

    const STATUS_BAD_REQUEST = 400;
    const STATUS_UNAUTHORIZED = 401;
    const STATUS_FORBIDDEN = 403;
    const STATUS_NOT_FOUND = 404;
    const STATUS_METHOD_NOT_ALLOWED = 405;
    const STATUS_NOT_ACCEPTED = 406;

    const STATUS_INTERNAL_SERVER_ERROR = 500;
    const STATUS_NOT_IMPLEMENTED = 501;

    /**
     * @var \Slim\Slim
     */
    public static $slim;

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    public static $entityManager;
	
	/**
     * @var \App\Resource
     */
    protected $resource;

    /**
     * Construct
     */
    public function __construct()
    {
		//$this->init();
    }

    /**
     * Default init, use for overwrite only
     */
    public function init()
    {}

    /**
     * @param null $id
     */
    public function get($req, $res, $id = null)
    {
		if ($id === null) {
            $data = $this->getResource()->getCollection();
        } else {
            $data = $this->getResource()->getEntity($id);
        }

        if ($data === null) {
            self::response($res, self::STATUS_NOT_FOUND);
            return;
        }
		
        self::response($res, self::STATUS_OK, $data);
    }

    /**
     * Default post method
     */
    public function post()
    {
        $this->response(self::STATUS_METHOD_NOT_ALLOWED);
    }

    /**
     * Default put method
     */
    public function put($id)
    {
        $this->response(self::STATUS_METHOD_NOT_ALLOWED);
    }
	
	/**
     * @param $id
     */
    public function delete($id)
    {
        $status = $this->getResource()->deleteEntity($id);

        if ($status === false) {
            self::response(self::STATUS_NOT_FOUND);
            return;
        }

        self::response(self::STATUS_OK);
    }
	
	/**
     * General options method
     */
    public function options()
    {
        $this->response(self::STATUS_METHOD_NOT_ALLOWED);
    }

    /**
     * @return \App\Resource
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @param \App\Resource $resource
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param int $status
     * @param array $data
     */
    public static function response($res, $status = 200, array $data = array())
    {
		$allow = array();

        // Clean out any previous junk that was echoed, printed or dumped prior to setting our headers
        // Obviously there shouldn't be anything happening like that, but we can log that stuff
        $buffer = ob_get_contents();
        if (!empty($buffer)) {
            // Any previous output will screw up file transmission
            ob_clean();
        }

        if (!empty($data)) {
            //$body = $res->getBody();
			//$body->write(json_encode($data));
            $res->withHeader('Content-Type', 'application/json');
            $output = array(
                'data' => $data,
                'status' => 'success'
            );

            //var_dump($output);
            $res->write(json_encode($output));
        }

        if (!empty($allow)) {
            //$res->withHeader('Allow', strtoupper(implode(',', $allow)));
        }

        return $res;
    }

    /**
     * This is the old Slim version
     * @param int $status
     * @param array $data
     */
    /*public static function response($res, $status = 200, array $data = array())
    {
        $allow = array();

        $res->withStatus($status);
        $res->withHeader('Content-Type', 'application/json');

        if (!empty($data)) {
            $body = $res->getBody();
            $body->write(json_encode($data));
        }

        if (!empty($allow)) {
            $res->withHeader('Allow', strtoupper(implode(',', $allow)));
        }

        return $res;
    }*/

    /**
     * @param $resource
     * @return mixed
     */
    public static function load($resource)
    {
        $class = __NAMESPACE__ . '\\ResourceService\\' . ucfirst($resource);
        if (!class_exists($class)) {
            return null;
        }

        return new $class();
    }

    /**
     * @return \Slim\Slim
     */
    public function getSlim()
    {
        return self::$slim;
    }

    /**
     * @param \Slim\Slim $slim
     */
    public function setSlim($slim)
    {
        self::$slim = $slim;
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        return self::$entityManager;
    }

    /**
     * Create a entity manager instance
     */
    public function setEntityManager($entityManager)
    {
        /*$config = new Configuration();
        $config->setMetadataCacheImpl(new ArrayCache());
        $driverImpl = $config->newDefaultAnnotationDriver(array(__DIR__ . '/Entity'));
        $config->setMetadataDriverImpl($driverImpl);

        $config->setProxyDir(__DIR__ . '/Entity/Proxy');
        $config->setProxyNamespace('Proxy');

        $ini = parse_ini_file(__DIR__ . '/../../config/local.ini');
        $connectionOptions = array(
            'driver'   => $ini['driv'],
            'host'     => $ini['host'],
            'dbname'   => $ini['name'],
            'user'     => $ini['user'],
            'password' => $ini['pass'],
        );

        $this->entityManager = EntityManager::create($connectionOptions, $config);*/
		self::$entityManager = $entityManager;
    }
}
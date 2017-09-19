<?php
// DIC configuration
use Doctrine\ORM\Tools;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\Mapping\NamingStrategy;
use Doctrine\ORM\EntityManager;

$container = $app->getContainer();

// -----------------------------------------------------------------------------
// Service providers
// -----------------------------------------------------------------------------

// Twig
$container['view'] = function ($c) {
	//$view = new \Slim\Views\Twig($settings['view']['template_path'], $settings['view']['twig']);
	$view = new \Slim\Views\Twig($c['settings']['view']['template_path'], $c['settings']['view']['twig']); 

    // Add extensions
    $view->addExtension(new Slim\Views\TwigExtension($c['router'], $c['request']->getUri()));
    $view->addExtension(new Twig_Extension_Debug());

    return $view;
};

$container['EntityManager'] = function ($c) {
	$cfg = $c->get('settings');
	$paths = array(__DIR__ . '/doctrine/orm/mappings/');
	$isDevMode = false;

	// the connection configuration
	$dbParams = array(
		'host'	   => '127.0.0.1',
		'driver'   => 'pdo_mysql',
		'user'     => 'root',
		'password' => 'v@der!4201986',
		'dbname'   => 'quickcommerce',
		'port'	   => 3306
	);
	
	$config = Setup::createXMLMetadataConfiguration($paths, $isDevMode);
	$config->setAutoGenerateProxyClasses(true);
	
	//$namingStrategy = new OpenCartNamingStrategy();
	//$namingStrategy->setPrefix('oc2_');
	//$config->setNamingStrategy($namingStrategy);

	$entityManager = EntityManager::create($dbParams, $config);
	$entityManager->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
	//var_dump($entityManager);
	//exit;
	//$entityManager->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

	return $entityManager;
};

/*$container['App\Resource\User'] = function ($c) {
	return new \App\Resource\User($this, $c->get('EntityManager'));
};*/

// Flash messages
$container['flash'] = function ($c) {
    return new \Slim\Flash\Messages;
};

// -----------------------------------------------------------------------------
// Service factories
// -----------------------------------------------------------------------------

// monolog
$container['logger'] = function ($c) {
    $settings = $c['settings']['logger'];
    $logger = new \Monolog\Logger($settings['name']);
    $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
    $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], \Monolog\Logger::DEBUG));
    return $logger;
};

// -----------------------------------------------------------------------------
// Action factories
// -----------------------------------------------------------------------------

$container['App\Action\HomeAction'] = function ($c) {
    return new App\Action\HomeAction($c['view'], $c['logger']);
};

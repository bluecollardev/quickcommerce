<?php
require __DIR__ . '/vendor/autoload.php';
/*require_once __DIR__ . '/vendor/symfony/class-loader/UniversalClassLoader.php';

$loader = new Symfony\Component\ClassLoader\UniversalClassLoader();
$loader->registerNamespaces(array('App' => __DIR__ . '/app/src'));
$loader->registerNamespaces(array('Slim' => __DIR__ . '/vendor/slim/slim'));
$loader->registerNamespaces(array('Symfony\\Component\\ClassLoader' => __DIR__.'/vendor/symfony/class-loader'));
$loader->registerNamespaces(array('Symfony\\Component\\Console' => __DIR__.'/vendor/symfony/console'));
$loader->registerNamespaces(array('Doctrine\\Common' => __DIR__.'/vendor/doctrine/common/lib'));
$loader->registerNamespaces(array('Doctrine\\DBAL' => __DIR__.'/vendor/doctrine/common/lib'));
$loader->registerNamespaces(array('Doctrine\\ORM' => __DIR__.'/vendor/doctrine/orm/lib'));
$loader->register();*/

use Doctrine\ORM\Tools;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\Mapping\NamingStrategy;
use Doctrine\ORM\EntityManager;

$paths = array('app/doctrine/orm/mappings/');
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

// Setup naming strategy
class OpenCartNamingStrategy implements NamingStrategy {
	protected $prefix = '';
	
	public function setPrefix($prefix) {
		$this->prefix = $prefix;
	}
	
	/**
	 * Return a table name for an entity class
	 *
	 * @param string $className The fully-qualified class name
	 * @return string A table name
	 */
	public function classToTableName($className) {
		return $this->prefix . $this->classToTableNameUnprefixed($className);
	}
	
	public function classToTableNameUnprefixed($className) {
		return strtolower(substr($className, strrpos($className, '\\') + 1));
	}

	/**
	 * Return a column name for a property
	 *
	 * @param string $propertyName A property
	 * @return string A column name
	 */
	public function propertyToColumnName($propertyName, $className = null) {
		return $propertyName;
	}
	
	/**
	 * Returns a column name for an embedded property.
	 *
	 * @param string $propertyName
	 * @param string $embeddedColumnName
	 *
	 * @return string
	 */
	public function embeddedFieldToColumnName($propertyName, $embeddedColumnName, $className = null, $embeddedClassName = null) {
		return $propertyName . '_' . $embeddedColumnName;
	}

	/**
	 * Return the default reference column name
	 *
	 * @return string A column name
	 */
	public function referenceColumnName() {
		return 'id';
	}

	/**
	 * Return a join column name for a property
	 *
	 * @param string $propertyName A property
	 * @return string A join column name
	 */
	public function joinColumnName($propertyName, $className = null) {
		return $propertyName . '_' . $this->referenceColumnName();
	}

	/**
	 * Return a join table name
	 *
	 * @param string $sourceEntity The source entity
	 * @param string $targetEntity The target entity
	 * @param string $propertyName A property
	 * @return string A join table name
	 */
	public function joinTableName($sourceEntity, $targetEntity, $propertyName = null) {
		return $this->prefix . strtolower($this->classToTableNameUnprefixed($sourceEntity) . '_to_' .
                $this->classToTableNameUnprefixed($targetEntity));
	}

	/**
	 * Return the foreign key column name for the given parameters
	 *
	 * @param string $entityName A entity
	 * @param string $referencedColumnName A property
	 * @return string A join column name
	 */
	public function joinKeyColumnName($entityName, $referencedColumnName = null) {
		return strtolower($this->classToTableNameUnprefixed($entityName) . '_' .
                ($referencedColumnName ?: $this->referenceColumnName()));
	}	
}

$namingStrategy = new OpenCartNamingStrategy();
$namingStrategy->setPrefix('oc2_');
$config->setNamingStrategy($namingStrategy);

$entityManager = EntityManager::create($dbParams, $config);
$entityManager->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

//php vendor/doctrine/orm/bin/doctrine orm:convert-mapping --from-database --namespace="App\Entity\OpenCart\\" --extend="App\Entity" xml app/doctrine/orm/mappings
// will return files with entities prefixed w. Oc2 -- gonna have to automate that; mapping files also have Oc2 in entity name attr -- fix that too
//php vendor/doctrine/orm/bin/doctrine orm:generate-entities --generate-annotations=true --extend="\App\Entity" app/src/
// will create App dir as well... will have to move App/Entity folder to src/Entity after generation
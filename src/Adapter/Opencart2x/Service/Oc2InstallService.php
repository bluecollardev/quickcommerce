<?php

namespace QuickCommerce\Adapter\OC2\Service;

use QuickCommerce\API\Service\AbstractInstallService;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\DBAL\Schema\SchemaDiff;
use Doctrine\DBAL\Schema\Table;
use Doctrine\DBAL\Schema\TableDiff;

/**
 * The install service
 * @author Administrator
 *
 */
class Oc2InstallService extends AbstractInstallService {
	/**
	 * {@inheritDoc}
	 * @see \QuickCommerce\API\Service\AbstractInstallService::install()
	 */
	protected function install() {
		// install opencart v2.x adapter
		try {
			$log = $this->adapter->getLogger();
			
			$log->debug('getting connections...');
			$conn = $this->adapter->getEntityManager()->getConnection();
			
			$log->debug('getting all entity classes...');
			$classes = $this->adapter->getEntityManager()->getMetadataFactory()->getAllMetadata();
			
			$schemaManager = $conn->getSchemaManager();
			$log->debug('getting schema details from database...');
			$databaseSchema = $schemaManager->createSchema();
			
			$schemaTool = new SchemaTool($this->adapter->getEntityManager());
			$log->debug('getting schema details from entities...');
			$posEntitySchema = $schemaTool->getSchemaFromMetadata($classes);
			
			$diff = new SchemaDiff();
			$diff->fromSchema = $databaseSchema;
			
			// Create new tables and add new fields into existing tables only
			foreach ($posEntitySchema->getTables() as $table) {
				$table->dropColumn('dtype');
			
				$posTableName = $table->getName();
				// $ocTableName = $this->adapter->formatOcTableName($posTableName);
				$ocTableName = $posTableName;
				$log->debug('processing OCTable ' . $ocTableName . ' for pos model ' . $table->getName());
			
				if ( ! $databaseSchema->hasTable($ocTableName)) {
					$posTable = $posEntitySchema->getTable($posTableName);
					$newTable = new Table($ocTableName, $posTable->getColumns(), $posTable->getIndexes(), $posTable->getForeignKeys());
					$diff->newTables[$ocTableName] = $newTable;
				} else {
					$ocTable = $databaseSchema->getTable($ocTableName);
					$posTable = $posEntitySchema->getTable($posTableName);
			
					$changes = 0;
					$tableDifferences = new TableDiff($ocTable->getName());
					$tableDifferences->fromTable = $ocTable;
			
					$posTableColumns = $posTable->getColumns();
					foreach ($posTableColumns as $columnName => $column) {
						if ( !$ocTable->hasColumn($columnName)) {
							$tableDifferences->addedColumns[$columnName] = $column;
							$changes++;
						}
					}
			
					if ($changes > 0) {
						$diff->changedTables[$ocTableName] = $tableDifferences;
					}
				}
			}
			
			$updateSql = $diff->toSaveSql($conn->getDatabasePlatform());
			foreach ($updateSql as $sql) {
				$log->debug($sql);
				try {
					$conn->executeQuery($sql);
				} catch (\Exception $sqlException) {
					$log->debug('Error to execute the sql but will be ignore to continue');
					$log->debug($sqlException->getMessage());
				}
			}
		} catch (\Exception $exception) {
			$log->error($exception->getMessage());
			$log->error($exception->getTraceAsString());
			return false;
		}
		
		return true;
	}
}
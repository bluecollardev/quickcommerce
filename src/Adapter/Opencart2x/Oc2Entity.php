<?php
namespace QuickCommerce\Adapter;
use \Doctrine\ORM\Event\LoadClassMetadataEventArgs;

class Oc2Entity {

	public function loadClassMetadata(LoadClassMetadataEventArgs $eventArgs) {
		$classMetadata = $eventArgs->getClassMetadata();
	
		$table = $classMetadata->table;
		$table['name'] = $this->formatOcTableName($table['name']);
		
		$classMetadata->setPrimaryTable($table);
	}

	private function formatOcTableName($posTableName) {
		$ocTableName = substr($posTableName, 3);
		$ocTableName = DB_PREFIX . strtolower(preg_replace('/\B([A-Z])/', '_$1', $ocTableName));
		return $ocTableName;
	}
}
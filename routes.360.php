<?php
use Ddeboer\DataImport\Workflow;
use Ddeboer\DataImport\Reader\ArrayReader;
use Ddeboer\DataImport\Reader\OneToManyReader;
use Ddeboer\DataImport\Writer\ArrayWriter;
use Ddeboer\DataImport\Writer\CallbackWriter;
use Ddeboer\DataImport\Writer\DoctrineWriter;
use Ddeboer\DataImport\ItemConverter\MappingItemConverter;
use Ddeboer\DataImport\ItemConverter\NestedMappingItemConverter;
use Ddeboer\DataImport\ValueConverter\DateTimeValueConverter;
use App\Entity\OpenCart;

use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\Common\Util\Inflector;
use Doctrine\ORM\EntityManager;

// Routes

$app->get('/test', function ($request, $response, $args) { 
	// Set flash message for next request
	$this->flash->addMessage('result', 'Post updated');
	
	// Get messages
	$messages = $this->flash->getMessages();
	// render
	return $response->write($messages['result'][0]);
});

$app->get('/hello/{name}', function($request, $response, $args) {
	$body = $this->view->fetch('hello.twig', [
		'name' => $args['name'],
	]);
	return $response->write($body);
});

// REST base
$app->get('/api/list/entities', function ($req, $res, $args) {
    $classes = array();
    $metas = $this->getContainer()->get('EntityManager')->getMetadataFactory()->getAllMetadata();
    foreach ($metas as $meta) {
        $classes[] = $meta->getName();
    }

    $res->withHeader('Content-Type', 'application/json');
    $res->getBody()->write(json_encode($classes));
});

$app->get('/import/from/quickbooks', function($req, $res, $args) {
    require __DIR__ .  '/../vendor/intuit/quickbooks-php-sdk/config.php';
	require __DIR__ .  '/../vendor/intuit/quickbooks-php-sdk/Core/OperationControlList.php';
	//require_once __DIR__ .  '/../vendor/intuit/quickbooks-php-sdk/_Samples/AccountsFindAll.php';
	//require_once __DIR__ .  '/../vendor/intuit/quickbooks-php-sdk/_Samples/CustomersFindAll.php';
	require_once __DIR__ .  '/../vendor/intuit/quickbooks-php-sdk/_Samples/GetAppmenu.php';
	//IntuitQuickbooks::begin();
});

$app->get('/import/from/feed', function($req, $res, $args) {
	var_dump('yo');
	exit;
	// TODO: Doctrine entities are fucked right now
	//$em = $this->getContainer()->get('EntityManager');
    // Load definition
    $feedMap = __DIR__ . '/feeds/mappings/UnlockBase.fcm.xml';
    //$feedMapXml = new DOMDocument();
    //$feedMapXml->strictErrorChecking = false;

    if (!is_file($feedMap)) throw new \Slim\Exception\Exception("Oh crap something's not right with the feed map");
    //$feedMapXml->load($feedMap);
    $feedMapXml = simplexml_load_file($feedMap);
	
	//var_dump($feedMapXml);

    $xmlResponse = "";
    $output = [];
	
	// TODO: Test vs schema to make sure def matches what Doctrine needs
	$converter = null;
	// Build mappings
	$converters = [];
	$mappings = [];
	$mapEntity = function ($map) use (&$mappings, &$em, &$mapEntity) {
		// Get the mapping info for the entity
		$className = (string)$map->attributes()->name;
		$foreignName = (string)$map->attributes()->foreign;
		$metadata = $em->getClassMetadata($className);
		$associations = $metadata->associationMappings;
		$domNode = dom_import_simplexml($map);
		$nodePath = $domNode->getNodePath();

		$mappings[$foreignName]['foreign'] = $foreignName;
		$mappings[$foreignName]['fields'] = array_fill_keys(array_keys($metadata->fieldMappings), null);

		// Get properties
		$fields = $map->xpath('./field | ./id');

		$mapFields = function (&$fieldMappings) use ($fields, &$mapFields) {
			foreach ($fields as $field) {
				$attributes = $field->attributes();
				$foreign = (string)$attributes->foreign;
				$name = (string)$attributes->name;
				$type = (string)$attributes->type;
				
				if ($foreign && $name && $type) {
					if (array_key_exists($name, $fieldMappings)) $fieldMappings[$name] = $foreign;
				}
			}
		};
		
		$mapFields($mappings[$foreignName]['fields']);
		$mappings[$foreignName]['fields'] = array_flip(array_filter($mappings[$foreignName]['fields'], function($v) { 
			return !is_null($v);
		}));
		
		foreach ($metadata->associationMappings as $field => $mapping) {
			$key = ($tableize == true) ? Inflector::tableize($field) : $field;
		}
	};
	
	
	$filterEntities = function ($data, $filter = null) {
		if (!$filter) return $data;
		
		// TODO: Return the path to node in original doc so we can do stuff like attach categories and such later
		$xml = new DOMDocument();
		$xml->loadXML($data, LIBXML_PARSEHUGE);
		
		$xpath = new DOMXPath($xml);
		
		// TODO: Some sort of sanitization, and strip out nested stuff we don't wanna parse
		/*$nodes = $xpath->query($xpathToNode);
		foreach ($nodes as $node) {
			// Clean nodes using $xpathToNode = '', $xpathToChildren = ''
			if ($xpathToChildren !== '') {
				$children = $xpath->query($xpathToChildren, $node);
				foreach ($children as $child)  $node->removeChild($child);
			};

			$children = null;
		}*/
		
		// This is fuckin' gross but whatever for now
		
		$collection = new DOMDocument();
		$collection->loadXML('<entities/>');
		foreach ($xpath->query($filter) as $item) {
			$node = $collection->importNode($item, true);
			$collection->documentElement->appendChild($node);
		}
		
		return $collection;
	};
	
	
	$mapEntities = function ($foreign) use ($feedMapXml, &$mapEntity) {
        if (is_string($foreign)) {
            $foreignEntities = $feedMapXml->xpath('//entity[@foreign="' . $foreign . '"]');
            var_dump($foreignEntities[0]);
			//$mapEntity($foreignEntities[0]);
        } elseif (is_array($foreign) && count($foreign) > 0) {
            foreach ($foreign as $key) {
                $foreignEntities = $feedMapXml->xpath('//entity[@foreign="' . $foreign . '"]');
                //$mapEntity($foreignEntities[0]);
				var_dump($foreignEntities[0]);
            }
        }
    };

    // DO products
    $mapEntities('Tool');
	// Start dealing with data
	// Groups->Tools
	$xmlResponse = UnlockBase::CallAPI('GetTools');
	//var_dump($xmlResponse);
	exit;
	// Returns properties of current node not including... ./*[not(name()=\'Network\')]
	$data = XML2Array::createArray($filterEntities($xmlResponse, '//Tool')); // Just filters crap out
	$data = $data['entities']['Tool'];
	
	$productReader = new ArrayReader($data); // OK for single level
	//$descriptionReader = new ArrayReader($data);
	
	//$productDescriptionReader = new OneToManyReader($productReader, $descriptionReader, 'description', 'ID', 'ID');
	
	//$workflow = new Workflow($productDescriptionReader);
	$workflow = new Workflow($productReader);
	$output = [];
	
	$productWriter = new DoctrineWriter($em, 'App\Entity\OpenCart\Product');
	$descriptionWriter = new DoctrineWriter($em, 'App\Entity\OpenCart\ProductDescription');
	//$workflow->addWriter(new ArrayWriter($output));
	//$workflow->addWriter(new DoctrineWriter($em, 'App\Entity\OpenCart\Product'));
	
	$workflow->addWriter(new CallbackWriter(function ($row) use ($storage, $productWriter, $descriptionWriter, $mappings, $em) {
		echo '----------------------------------------------------------', "\r\n<br>";
		$product = array_intersect_key($row, array_flip($mappings['Tool']['fields']));
		//var_dump($row);
		// Fill in any default values
		$product['stockStatusId'] = 1;
		$product['shipping'] = 0;
		$product['status'] = 1;
		$productEntity = $productWriter->writeItem($product);
		$productWriter->flushAndClear();
		
		$descriptionEntity = new \App\Entity\OpenCart\ProductDescription;
		//$descriptionEntity->setProductId($productEntity->getProductId());
		$descriptionEntity->setLanguageId(1);
		$descriptionEntity->setName($row['Name']);
		$descriptionEntity->setDescription($row['Message']);
		//$productEntity->addDescription($descriptionEntity);
		
		$productWriter->entityManager->persist($descriptionEntity);
		$descriptionEntity->setProduct($productEntity);
		$productWriter->flushAndClear();
		
		var_dump($productEntity);
	}));
	
	$converter = new MappingItemConverter();
	$converter->setMappings($mappings['Tool']['fields']);
	
	$descriptionConverter = new NestedMappingItemConverter('description');
	$descriptionConverter->setMappings($mappings['Tool']['fields']);
		
	$workflow->addItemConverter($converter);
	$workflow->addItemConverter($descriptionConverter);
	$workflow->process();

    /////////////////////////////////////////////////////////////////////////
    // DO categories
    /*$mapEntities('Brand');
    // Start dealing with data
    // Groups->Tools
    $xmlResponse = UnlockBase::CallAPI('GetMobiles');
    // Returns properties of current node not including... ./*[not(name()=\'Network\')]
    $data = XML2Array::createArray($filterEntities($xmlResponse, '//Brand')); // Just filters crap out
    $data = $data['entities']['Brand'];

    $categoryReader = new ArrayReader($data); // OK for single level
    //$descriptionReader = new ArrayReader($data);

    //$productDescriptionReader = new OneToManyReader($productReader, $descriptionReader, 'description', 'ID', 'ID');

    //$workflow = new Workflow($productDescriptionReader);
    $workflow = new Workflow($categoryReader);
    $output = [];

    $categoryWriter = new DoctrineWriter($em, 'App\Entity\OpenCart\Category');
    $categoryDescriptionWriter = new DoctrineWriter($em, 'App\Entity\OpenCart\CategoryDescription');
    //$workflow->addWriter(new ArrayWriter($output));
    //$workflow->addWriter(new DoctrineWriter($em, 'App\Entity\OpenCart\Product'));

    $workflow->addWriter(new CallbackWriter(function ($row) use ($storage, $categoryWriter, $categoryDescriptionWriter, $mappings, $em) {
        echo '----------------------------------------------------------', "\r\n<br>";
        $category = array_intersect_key($row, array_flip($mappings['Brand']['fields']));
        var_dump($row);
        $category['parentId'] = 0;
        $category['image'] = null;
        $category['top'] = 0;
        $category['column'] = 0;
        $category['sortOrder'] = 0;
        $category['status'] = 1;

        // Fill in any default values
        $categoryEntity = $categoryWriter->writeItem($category);
        $categoryWriter->flushAndClear();

        $categoryDescriptionEntity = new \App\Entity\OpenCart\CategoryDescription;
        $categoryDescriptionEntity->setCategoryId($categoryEntity->getCategoryId());
        $categoryDescriptionEntity->setLanguageId(1);
        $categoryDescriptionEntity->setName($row['Name']);
        $categoryDescriptionEntity->setDescription($row['Message']);
        $categoryEntity->addDescription($categoryDescriptionEntity);

        $categoryWriter->entityManager->persist($categoryDescriptionEntity);
        $categoryWriter->flushAndClear();
        var_dump($category);
    }));

    var_dump($mappings);

    //$converter = new MappingItemConverter();

    //$categoryDescriptionConverter = new NestedMappingItemConverter('description');
    //$categoryDescriptionConverter->setMappings($mappings['Model']['fields']);

    //$workflow->addItemConverter($converter);
    //$workflow->addItemConverter($categoryDescriptionConverter);
    $workflow->process();*/

    /////////////////////////////////////////////////////////////////////////
    // DO manufacturers
    /*$mapEntities('Network');
    // Start dealing with data
    // Groups->Tools
    $xmlResponse = UnlockBase::CallAPI('GetNetworks');
    // Returns properties of current node not including... ./*[not(name()=\'Network\')]
    $data = XML2Array::createArray($filterEntities($xmlResponse, '//Network')); // Just filters crap out
    $data = $data['entities']['Network'];

    $manufacturerReader = new ArrayReader($data); // OK for single level
    $workflow = new Workflow($manufacturerReader);
    $output = [];

    $manufacturerWriter = new DoctrineWriter($em, 'App\Entity\OpenCart\Manufacturer');

    $workflow->addWriter(new CallbackWriter(function ($row) use ($storage, $manufacturerWriter, $mappings, $em) {
        echo '----------------------------------------------------------', "\r\n<br>";
        $manufacturer = array_intersect_key($row, array_flip($mappings['Network']['fields']));
        // Fill in any default values
        //$manufacturer['image'] = null;
        $manufacturer['sortOrder'] = 0;

        $manufacturerEntity = $manufacturerWriter->writeItem($manufacturer);
        $manufacturerWriter->flushAndClear();
        var_dump($manufacturer);
    }));

    var_dump($mappings);

    $converter = new MappingItemConverter();
    $converter->setMappings($mappings['Network']['fields']);

    $workflow->addItemConverter($converter);
    $workflow->process();*/

    /////////////////////////////////////////////////////////////////////////
    // DO orders
    /*$mapEntities('Order');
    // Start dealing with data
    // Groups->Tools
    $xmlResponse = UnlockBase::CallAPI('GetOrders');
    // Returns properties of current node not including... ./*[not(name()=\'Network\')]
    $data = XML2Array::createArray($filterEntities($xmlResponse, '//Order')); // Just filters crap out
    $data = $data['entities']['Order'];

    $orderReader = new ArrayReader($data); // OK for single level
    $workflow = new Workflow($orderReader);
    $output = [];

    $orderWriter = new DoctrineWriter($em, 'App\Entity\OpenCart\Order');

    $workflow->addWriter(new CallbackWriter(function ($row) use ($storage, $orderWriter, $mappings, $em) {
        echo '----------------------------------------------------------', "\r\n<br>";
        $order = array_intersect_key($row, array_flip($mappings['Order']['fields']));
        // Fill in any default values
        //$order['image'] = null;
        $order['invoicePrefix'] = 'UB';
        $order['storeId'] = 1;
        $order['storeName'] = 'Your Store';
        $order['storeUrl'] = 'http://php5519.deathstar/quickcommerce/vendor/opencart/upload/';
        $order['customerId'] = 1; // Has default 0
        $order['customerGroupId'] = 1; // Has default 0
        // TODO: firstname, lastname, email, telephone, fax, customField, paymentFirstname, paymentLastname, paymentCompany, paymentAddress1, paymentAddress2, paymentCity... + shipping

        $order['total'] = 1000.0000;
        $order['orderStatusId'] = 1; // Has default 0
        $order['affiliateId'] = 0;
        $order['sortOrder'] = 0;
        $order['commission'] = 0.0000;
        $order['marketingId'] = 0;
        $order['tracking'] = '';
        $order['languageId'] = 1;
        $order['currencyId'] = 2;
        $order['currencyCode'] = 'USD';
        $order['currencyValue'] = 1.00000000; // Has default 1.00000000
        $order['ip'] = '127.0.0.1';
        $order['forwardedIp'] = '';
        $order['userAgent'] = 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:25.4) Gecko/20150509 Firefox/31.9 PaleMoon/25.4.1';
        $order['acceptLanguage'] = '';

        // Get customer

        // We can't loop over (private) properties if we're using the actual entity
        // If performing read-only ops access the entity as a resource instead
        // Then we don't have to use the Doctrine/entity getter/setter methods
        $fetchResource = function ($resource, $id = null) use (&$em) {
            $resource = \App\Resource::load($resource);
            $resource->setEntityManager($em);
            $resource->setSlim($this);
            $resource->init();

            return ($id) ? $resource->getService()->getEntity($id, false) : $resource->getService()->getCollection(false);
        };

        $customer = $fetchResource('customer', 1);
        $address = $fetchResource('address', $customer->customerId); // TODO: Should be able to lazy load entities/nested entities too. Just sayin'.

        // TODO: Have to filter these
        foreach ($customer as $k => $v) {
            $order[$k] = $v;
        }

        foreach ($address[0] as $k => $v) {
            $order[$k] = $v;
            $order['payment' . ucwords($k)] = $v;
            $order['shipping' . ucwords($k)] = $v;
        }

        $order['shippingMethod'] = 'Flat Shipping Rate';
        $order['shippingCode'] = 'flat.flat';
        $order['shippingZone'] = 'Alberta'; // TODO: Get zone
        $order['shippingCountry'] = 'Canada';
        $order['shippingAddressFormat'] = '';
        $order['paymentMethod'] = 'Cash On Delivery';
        $order['paymentCode'] = 'cod';
        $order['paymentZone'] = 'Alberta'; // TODO: Get zone
        $order['paymentCountry'] = 'Canada';
        $order['paymentAddressFormat'] = '';
        $order['comment'] = ''; // TODO: Check if empty first

        $orderEntity = $orderWriter->writeItem($order);
        $orderWriter->flushAndClear();
        var_dump($order);
    }));

    $converter = new MappingItemConverter();
    $converter->setMappings($mappings['Order']['fields']);

    $workflow->addItemConverter($converter);
    $workflow->process();*/
});

// Get
$app->get('/api/{resource}[/{id:\d+}]', function($req, $res, $args) {
    $resource = \App\Resource::load($args['resource']);
    $resource->setEntityManager($this->getContainer()->get('EntityManager'));
    $resource->setSlim($this);
    $resource->init();

    if ($resource === null) {
        \App\Resource::response($req, $res, \App\Resource::STATUS_NOT_FOUND);
    } else {
        if (!empty($args['id'])) {
            $resource->get($req, $res, $args['id']);
        } else {
            $resource->get($req, $res, null);
        }
    }
});

// Post
$app->post('/api/{resource}[/{id:\d+}]', function($req, $res, $args) {
    $resource = \App\Resource::load($args['resource']);
    if ($resource === null) {
        \App\Resource::response(\App\Resource::STATUS_NOT_FOUND);
    } else {
        $resource->post();
    }
});

// Put
$app->put('/api/{resource}[/{id:\d+}]', function($req, $res, $args) {
    $resource = \App\Resource::load($args['resource']);
    if ($resource === null) {
        \App\Resource::response(\App\Resource::STATUS_NOT_FOUND);
    } else {
        $resource->put($args['id']);
    }
});

// Delete
$app->delete('/api/{resource}[/{id:\d+}]', function($req, $res, $args) {
    $resource = \App\Resource::load($args['resource']);
    if ($resource === null) {
        \App\Resource::response(\App\Resource::STATUS_NOT_FOUND);
    } else {
        $resource->delete($args['id']);
    }
});

// Options
$app->options('/api/{resource}[/{id:\d+}]', function($req, $res, $args) {
    $resource = \App\Resource::load($args['resource']);
    if ($resource === null) {
        \App\Resource::response(\App\Resource::STATUS_NOT_FOUND);
    } else {
        $resource->options();
    }
});

//$app->get('/', 'App\Action\HomeAction:dispatch')->setName('homepage');

// Not found
/*$app->notFound(function() {
    \App\Resource::response(\App\Resource::STATUS_NOT_FOUND);
});*/

/**
 * Array2XML: A class to convert array in PHP to XML
 * It also takes into account attributes names unlike SimpleXML in PHP
 * It returns the XML in form of DOMDocument class for further manipulation.
 * It throws exception if the tag name or attribute name has illegal chars.
 *
 * Author : Lalit Patel
 * Website: http://www.lalit.org/lab/convert-php-array-to-xml-with-attributes
 * License: Apache License 2.0
 *          http://www.apache.org/licenses/LICENSE-2.0
 * Version: 0.1 (10 July 2011)
 * Version: 0.2 (16 August 2011)
 *          - replaced htmlentities() with htmlspecialchars() (Thanks to Liel Dulev)
 *          - fixed a edge case where root node has a false/null/0 value. (Thanks to Liel Dulev)
 * Version: 0.3 (22 August 2011)
 *          - fixed tag sanitize regex which didn't allow tagnames with single character.
 * Version: 0.4 (18 September 2011)
 *          - Added support for CDATA section using @cdata instead of @value.
 * Version: 0.5 (07 December 2011)
 *          - Changed logic to check numeric array indices not starting from 0.
 * Version: 0.6 (04 March 2012)
 *          - Code now doesn't @cdata to be placed in an empty array
 * Version: 0.7 (24 March 2012)
 *          - Reverted to version 0.5
 * Version: 0.8 (02 May 2012)
 *          - Removed htmlspecialchars() before adding to text node or attributes.
 *
 * Usage:
 *       $xml = Array2XML::createXML('root_node_name', $php_array);
 *       echo $xml->saveXML();
 */

class Array2XML {

    private static $xml = null;
    private static $encoding = 'UTF-8';

    /**
     * Initialize the root XML node [optional]
     * @param $version
     * @param $encoding
     * @param $format_output
     */
    public static function init($version = '1.0', $encoding = 'UTF-8', $format_output = true) {
        self::$xml = new DomDocument($version, $encoding);
        self::$xml->formatOutput = $format_output;
        self::$encoding = $encoding;
    }

    /**
     * Convert an Array to XML
     * @param string $node_name - name of the root node to be converted
     * @param array $arr - aray to be converterd
     * @return DomDocument
     */
    public static function &createXML($node_name, $arr=array()) {
        $xml = self::getXMLRoot();
        $xml->appendChild(self::convert($node_name, $arr));

        self::$xml = null;    // clear the xml node in the class for 2nd time use.
        return $xml;
    }

    /**
     * Convert an Array to XML
     * @param string $node_name - name of the root node to be converted
     * @param array $arr - aray to be converterd
     * @return DOMNode
     */
    private static function &convert($node_name, $arr=array()) {

        //print_arr($node_name);
        $xml = self::getXMLRoot();
        $node = $xml->createElement($node_name);

        if(is_array($arr)){
            // get the attributes first.;
            if(isset($arr['@attributes'])) {
                foreach($arr['@attributes'] as $key => $value) {
                    if(!self::isValidTagName($key)) {
                        throw new Exception('[Array2XML] Illegal character in attribute name. attribute: '.$key.' in node: '.$node_name);
                    }
                    $node->setAttribute($key, self::bool2str($value));
                }
                unset($arr['@attributes']); //remove the key from the array once done.
            }

            // check if it has a value stored in @value, if yes store the value and return
            // else check if its directly stored as string
            if(isset($arr['@value'])) {
                $node->appendChild($xml->createTextNode(self::bool2str($arr['@value'])));
                unset($arr['@value']);    //remove the key from the array once done.
                //return from recursion, as a note with value cannot have child nodes.
                return $node;
            } else if(isset($arr['@cdata'])) {
                $node->appendChild($xml->createCDATASection(self::bool2str($arr['@cdata'])));
                unset($arr['@cdata']);    //remove the key from the array once done.
                //return from recursion, as a note with cdata cannot have child nodes.
                return $node;
            }
        }

        //create subnodes using recursion
        if(is_array($arr)){
            // recurse to get the node for that key
            foreach($arr as $key=>$value){
                if(!self::isValidTagName($key)) {
                    throw new Exception('[Array2XML] Illegal character in tag name. tag: '.$key.' in node: '.$node_name);
                }
                if(is_array($value) && is_numeric(key($value))) {
                    // MORE THAN ONE NODE OF ITS KIND;
                    // if the new array is numeric index, means it is array of nodes of the same kind
                    // it should follow the parent key name
                    foreach($value as $k=>$v){
                        $node->appendChild(self::convert($key, $v));
                    }
                } else {
                    // ONLY ONE NODE OF ITS KIND
                    $node->appendChild(self::convert($key, $value));
                }
                unset($arr[$key]); //remove the key from the array once done.
            }
        }

        // after we are done with all the keys in the array (if it is one)
        // we check if it has any text value, if yes, append it.
        if(!is_array($arr)) {
            $node->appendChild($xml->createTextNode(self::bool2str($arr)));
        }

        return $node;
    }

    /*
     * Get the root XML node, if there isn't one, create it.
     */
    private static function getXMLRoot(){
        if(empty(self::$xml)) {
            self::init();
        }
        return self::$xml;
    }

    /*
     * Get string representation of boolean value
     */
    private static function bool2str($v){
        //convert boolean to text value.
        $v = $v === true ? 'true' : $v;
        $v = $v === false ? 'false' : $v;
        return $v;
    }

    /*
     * Check if the tag name or attribute name contains illegal characters
     * Ref: http://www.w3.org/TR/xml/#sec-common-syn
     */
    private static function isValidTagName($tag){
        $pattern = '/^[a-z_]+[a-z0-9\:\-\.\_]*[^:]*$/i';
        return preg_match($pattern, $tag, $matches) && $matches[0] == $tag;
    }
}

class XML2Array {

    private static $xml = null;
    private static $encoding = 'UTF-8';

    /**
     * Initialize the root XML node [optional]
     * @param $version
     * @param $encoding
     * @param $format_output
     */
    public static function init($version = '1.0', $encoding = 'UTF-8', $format_output = true) {
        self::$xml = new DOMDocument($version, $encoding);
        self::$xml->formatOutput = $format_output;
        self::$encoding = $encoding;
    }

    /**
     * Convert an XML to Array
     * @param string $node_name - name of the root node to be converted
     * @param array $arr - aray to be converterd
     * @return DOMDocument
     */
    public static function &createArray($input_xml) {
        $xml = self::getXMLRoot();
        if(is_string($input_xml)) {
            $parsed = $xml->loadXML($input_xml);
            if(!$parsed) {
                throw new Exception('[XML2Array] Error parsing the XML string.');
            }
        } else {
            if(get_class($input_xml) != 'DOMDocument') {
                throw new Exception('[XML2Array] The input XML object should be of type: DOMDocument.');
            }
            $xml = self::$xml = $input_xml;
        }
        $array[$xml->documentElement->tagName] = self::convert($xml->documentElement);
        self::$xml = null;    // clear the xml node in the class for 2nd time use.
        return $array;
    }

    /**
     * Convert an Array to XML
     * @param mixed $node - XML as a string or as an object of DOMDocument
     * @return mixed
     */
    private static function &convert($node) {
        $output = array();

        switch ($node->nodeType) {
            case XML_CDATA_SECTION_NODE:
                $output['@cdata'] = trim($node->textContent);
                break;

            case XML_TEXT_NODE:
                $output = trim($node->textContent);
                break;

            case XML_ELEMENT_NODE:

                // for each child node, call the covert function recursively
                for ($i=0, $m=$node->childNodes->length; $i<$m; $i++) {
                    $child = $node->childNodes->item($i);
                    $v = self::convert($child);
                    if(isset($child->tagName)) {
                        $t = $child->tagName;

                        // assume more nodes of same kind are coming
                        if(!isset($output[$t])) {
                            $output[$t] = array();
                        }
                        $output[$t][] = $v;
                    } else {
                        //check if it is not an empty text node
                        if($v !== '') {
                            $output = $v;
                        }
                    }
                }

                if(is_array($output)) {
                    // if only one node of its kind, assign it directly instead if array($value);
                    foreach ($output as $t => $v) {
                        if(is_array($v) && count($v)==1) {
                            $output[$t] = $v[0];
                        }
                    }
                    if(empty($output)) {
                        //for empty nodes
                        $output = '';
                    }
                }

                // loop through the attributes and collect them
                if($node->attributes->length) {
                    $a = array();
                    foreach($node->attributes as $attrName => $attrNode) {
                        $a[$attrName] = (string) $attrNode->value;
                    }
                    // if its an leaf node, store the value in @value instead of directly storing it.
                    if(!is_array($output)) {
                        $output = array('@value' => $output);
                    }
                    $output['@attributes'] = $a;
                }
                break;
        }
        return $output;
    }

    /*
     * Get the root XML node, if there isn't one, create it.
     */
    private static function getXMLRoot(){
        if(empty(self::$xml)) {
            self::init();
        }
        return self::$xml;
    }
}
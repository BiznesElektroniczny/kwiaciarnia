<?php

include(dirname(__FILE__).'/../config/config.inc.php');
include(dirname(__FILE__).'/../init.php');

error_reporting(E_ALL);
ini_set('display_errors', '1');

$START_TIME = time();
$LANG = 2; // jezyk polski

$REMOVE_ALL = false;
$UPDATE_ATTRIBUTES = false;
$UPDATE_CATEGORIES = false;
$MORE_PRODUCTS = 0;

if (isset($_POST['removeAll']) && strcmp($_POST['removeAll'], 'on') === 0) {
	$REMOVE_ALL = true;
}
if (isset($_POST['updateAttributes']) && strcmp($_POST['updateAttributes'], 'on') === 0) {
	$UPDATE_ATTRIBUTES = true;
}
if (isset($_POST['updateCategories']) && strcmp($_POST['updateCategories'], 'on') === 0) {
	$UPDATE_CATEGORIES = true;
}
if (isset($_POST['products'])) {
	$MORE_PRODUCTS = intval($_POST['products']);
	if($MORE_PRODUCTS > 0) {
		$UPDATE_ATTRIBUTES = true;
		$UPDATE_CATEGORIES = true;
	}
}

################################################################
############                clear                 ##############
################################################################

$minId = function($tableName, $idColumn) {
	$x = Db::getInstance()->ExecuteS("SELECT MIN($idColumn) FROM `$tableName`");
	$y = array_pop($x);
	$z = array_shift($y);
	return intval($z);
};
$maxId = function($tableName, $idColumn) {
	$x = Db::getInstance()->ExecuteS("SELECT MAX($idColumn) FROM `$tableName`");
	$y = array_pop($x);
	$z = array_shift($y);
	return intval($z);
};
if($REMOVE_ALL) {
	for($i = 3; $i <= $maxId("ps_category", "id_category"); $i++) {
		(new Category($i))->delete();
	}
	for($i = $minId("ps_product", "id_product"); $i <= $maxId("ps_product", "id_product"); $i++) {
		(new Product($i))->delete();
	}
	for($i = $minId("ps_attribute_group", "id_attribute_group"); $i <= $maxId("ps_attribute_group", "id_attribute_group"); $i++) {
		(new AttributeGroup($i))->delete();
	}
	for($i = $minId("ps_attribute", "id_attribute"); $i <= $maxId("ps_attribute", "id_attribute"); $i++) {
		(new Attribute($i))->delete();
	}
	for($i = $minId("ps_specific_price", "id_specific_price"); $i <= $maxId("ps_specific_price", "id_specific_price"); $i++) {
		(new SpecificPrice($i))->delete();
	}
}

################################################################
############              attributes              ##############
################################################################

$groupsList = json_decode(file_get_contents("attributes.json"));

if($UPDATE_ATTRIBUTES) {
	foreach($groupsList as $g) {
		$group_name = "group-".$g->groupId;
		$group_public_name = "Wersja";

		$group = new AttributeGroup();
		$group->id = $g->groupId;
		$group->force_id = true;
		$group->name = [0 => $group_name, 1 => $group_name, $LANG => $group_name];
		$group->public_name = [0 => $group_public_name, 1 => $group_public_name, $LANG => $group_public_name];
		$group->group_type = 'radio';
		$group->add();

		foreach($g->attributes as $key => $val) {
			$newAttribute = new Attribute();
			$newAttribute->id = intval($key);
			$newAttribute->force_id = true;
			$newAttribute->name = [0 => $val, 1 => $val, $LANG => $val];
			$newAttribute->id_attribute_group = $group->id;
			$newAttribute->add();
		}
	}
}

################################################################
############             categories               ##############
################################################################

$rootCategoryId = 2;
$catObj = json_decode(file_get_contents("categories.json"));

if($UPDATE_CATEGORIES) {
	$mainCategory = new Category();
	$mainCategory->id = $rootCategoryId;
	$mainCategory->force_id = true;
	$mainCategory->name = [0 => "Wszystkie produkty", 1 => "Wszystkie produkty", $LANG => "Wszystkie produkty"];
	$mainCategory->id_parent = (int) 0;
	$mainCategory->link_rewrite = [0 => "wszystko", 1 => "wszystko", $LANG => "wszystko"];
	if(!$mainCategory->add() && !$mainCategory->update()) {
		die("error: main category");
	}
}

if($UPDATE_CATEGORIES) {
	shell_exec("rm -r /var/www/html/prestashop/var/cache/prod/ps_mainmenu/*");
	Db::getInstance()->ExecuteS("UPDATE `ps_configuration` SET `value` = '' WHERE `ps_configuration`.`name` = 'MOD_BLOCKTOPMENU_ITEMS' LIMIT 1;");
}

$menuCategories = null;

if($UPDATE_CATEGORIES) {
	foreach($catObj->order as $list) {
		foreach($list as $id) {

			$category = new Category();
			$category->id = (int)$id;
			$category->force_id = true;
			$category->is_root_category = 0;

			$idStr = "$id";
			$catName = $catObj->allNodes->$idStr->categoryName;
			$catDescription = $catObj->allNodes->$idStr->description;
			$parentId = $catObj->allNodes->$idStr->parentCategoryId;
			$link = "category";
			
			$category->description = $catDescription;

			$category->name = [0 => $catName, 1 => $catName, $LANG => $catName];

			$category->id_parent = in_array($id, $catObj->roots) ? $rootCategoryId : $parentId;
			
			$category->link_rewrite = [0 => $link, 1 => $link, $LANG => $link];
			if(!$category->add() && !$category->update()) {
				$menuCategories = null;
				die("error category add() or update() " . $catName);
			} 
			if(in_array($id, $catObj->roots)) {
				$menuCategories = $menuCategories . "CAT" . (intval($category->id)) . ",";
			}
		}
	}
	Category::regenerateEntireNtree();
}

if($UPDATE_CATEGORIES && !is_null($menuCategories)) {
	$newValue = rtrim($menuCategories, ",");
	Db::getInstance()->ExecuteS("UPDATE `ps_configuration` SET `value` = '$newValue' WHERE `ps_configuration`.`name` = 'MOD_BLOCKTOPMENU_ITEMS' LIMIT 1;");
}

################################################################
############              products                ##############
################################################################
	
$jsonList = json_decode(file_get_contents("products.json"));

if($MORE_PRODUCTS > 0) {
	$elemIndex = 1;
	$imgImportResult = true;
	foreach($jsonList as $elem) {
		//if($elem->hasAttributes) continue;
		if($elemIndex > $MORE_PRODUCTS) break; 
		$product = new Product();
		$product->id = $elem->productId;
		$product->force_id = true;
		$product->name = $elem->name;
		$product->link_rewrite = [$LANG => 'product'];
		$product->price = ($elem->hasAttributes) ? ($elem->prices->basePrice) : ((reset($elem->prices->pricesMap)->newPrice) + $elem->prices->basePrice);
		
		$prodErrInfo = "Product error: ".($elem->productId);

		$tmpCategoryList = [];
		if($elem->categoryId === 0) {
			$product->id_category = [ $rootCategoryId ];
			$product->id_category_default = $rootCategoryId;
		} else {
			$catIdStr = "$elem->categoryId";
			if(!isset($catObj->routes) || !isset($catObj->routes->$catIdStr)) die($prodErrInfo);
			$tmpCategoryList = $catObj->routes->$catIdStr;
			if(is_null($tmpCategoryList)) die($prodErrInfo);
			sort($tmpCategoryList);
			$product->id_category = array();
			$product->id_category_default = min($tmpCategoryList);
		}
		if(!in_array($rootCategoryId, $tmpCategoryList, true)) array_push($tmpCategoryList, $rootCategoryId);

		$product->description[$LANG] = $elem->description1;
		$product->description_short[$LANG] = $elem->description3;
		$product->reference = $elem->productId;

		// "PTU PL 8%"
		// "PTU PL 23%"
		$taxRulesGroupId = -1;
		if(intval(floatval($elem->vat)) === 23) {
			$taxRulesGroupId = 1;
		} elseif(intval(floatval($elem->vat)) === 8) {
			$taxRulesGroupId = 2;
		}
		if($taxRulesGroupId < 0) {
			die("tax rule not found");	
		}
		$product->id_tax_rules_group = $taxRulesGroupId;

		if ((new Product($product->id, false, $LANG))->id){
			continue;
		}

		if($product->add()) {
			if($elem->hasAttributes === false) {
				$product->quantity = random_int(11,55);
			}
			$product->addToCategories($tmpCategoryList);
			StockAvailable::setQuantity((int)$product->id, 0, $product->quantity, Context::getContext()->shop->id);
		}


		foreach($elem->prices->pricesMap as $key => $val) {
			foreach($groupsList as $g) {
				if(strcmp($g->groupId."", "".$elem->prices->groupId) === 0) {
					foreach($g->attributes as $attId => $attName) {
						$x = $elem->prices->pricesMap->$key->label;
						if(strcmp("$x", "$attName") === 0) {

							$oldPrice = 0.0;
							$newPrice = floatval($elem->prices->pricesMap->$key->newPrice);
							$isReduced = isset($elem->prices->pricesMap->$key->oldPrice) && !is_null($elem->prices->pricesMap->$key->oldPrice);
							if($isReduced) $oldPrice = floatval($elem->prices->pricesMap->$key->oldPrice);

							$combAttribArr = array();
							$combAttribArr[] = intval($attId); //attribute ID
							$prodAttribId = $product->addProductAttribute(
								$isReduced ? $oldPrice : $newPrice, //price 
								floatval(0),	//weight
								0,		//unit_impact 
								null,		//ecotax
								intval($elem->prices->pricesMap->$key->quantity), //quantity
								"",	   	//id_images
								"" , 		//reference
								strval(""), 	//suppliers
								strval(""), 	//ean13
								NULL, 		//default 
								NULL,  		//location
								NULL,  		//upc
								1,		//minimal_quantity
								strval("")	//isbn
								);
							$product->addAttributeCombinaison($prodAttribId,$combAttribArr);

							if($isReduced) {
								
								$reductionVal = floatval(abs($oldPrice - $newPrice));
								$reductionVal = $reductionVal * ((floatval(100) + floatval($elem->vat))/floatval(100));

								$specPrice = new SpecificPrice();
								$specPrice->id_product = $product->id;
								$specPrice->id_product_attribute = $prodAttribId;
								$specPrice->id_customer = 0;
								$specPrice->id_shop = 0;
								$specPrice->id_country = 0;
								$specPrice->id_currency = 0;
								$specPrice->id_group = 0;
								$specPrice->from_quantity = 1;
								$specPrice->price = $oldPrice;
								$specPrice->reduction_type = 'amount';
								$specPrice->reduction = $reductionVal;
								$specPrice->from = date('Y-m-d H:i:s', time() * 0.75);
								$specPrice->to = date('Y-m-d H:i:s', time() * 1.25);
								if (!$specPrice->save()) {
		        						die('An error occurred: specific price, prodId='.($product->id));
		    						}
							}
	
							break;
						}
					}
				}
			}
		}

		foreach ($elem->imageURLs as $URL) {
			$imgImportResult = true;
			$image = new Image();
			$image->id_product = (int) $product->id;
			$image->position = Image::getHighestPosition($product->id) + 1;
			$image->cover = false;
			$image->add();
			$imgImportResult = AdminImportController::copyImg($product->id, $image->id, $URL, $entity = 'products');
			if(!$imgImportResult) {
				break;
			}
		}
		
		if($imgImportResult) {
			$elemIndex++;
		} else {
			$product->delete();
		}
	}
}

ini_set('display_errors', '0');
error_reporting(0); // Turn off all error reporting

$END_TIME = time();
$TIME = $END_TIME - $START_TIME;

echo "
<!DOCTYPE html>
<html>
<body>
	<h1>Success!</h1>
	<h4>time: $TIME s</h4><br>
	<button onclick='ok()'>OK</button>
	<script>
		function ok() {
			window.location.href='panel.html';
		}
	</script>
</body>
</html>
";
die;




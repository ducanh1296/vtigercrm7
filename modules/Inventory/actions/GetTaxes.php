<?php
include_once 'include/Webservices/Relation.php';
include_once 'vtlib/Vtiger/Module.php';
include_once 'includes/main/WebUI.php';
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Inventory_GetTaxes_Action extends Vtiger_Action_Controller {

    function getSum($id) {
        global $adb;
        $sum = 0;

        $result = $adb->pquery("select crmid, quantity from vtiger_seproductsrel where productid = ? ", array($id));
        $num_rows = $adb->num_rows($result);

        if ($num_rows > 0) {
            for ($i = 0; $i < $num_rows; $i++) {
                $resultid[$i] = $adb->query_result($result, $i, 'crmid');
                $result1 = $adb->pquery("select unit_price from vtiger_products where productid = ? ", array($resultid[$i]));
                $price = $adb->query_result($result1, 0, 'unit_price');
                $sum = $sum + $price;
                if($this->isParentProduct($resultid[$i]))
                    $sum = $sum + Inventory_GetTaxes_Action::getSum($resultid[$i]);
            }
        }
        return $sum;
    }

    function isParentProduct($ParentProductId){
        if(!empty($ParentProductId)){
            $db = PearDatabase::getInstance();
            $result = $db->pquery('SELECT crmid FROM vtiger_seproductsrel WHERE productid = ?', array($ParentProductId));
            if($db->num_rows($result) > 0){
                return true;
            }
        }
    }

	function process(Vtiger_Request $request) {
		$decimalPlace = getCurrencyDecimalPlaces();
		$currencyId = $request->get('currency_id');
		$currencies = Inventory_Module_Model::getAllCurrencies();
		$conversionRate = $conversionRateForPurchaseCost = 1;

		$idList = $request->get('idlist');
		if (!$idList) {
			$recordId = $request->get('record');
			$idList = array($recordId);
		}

		$response = new Vtiger_Response();
		$namesList = $purchaseCostsList = $taxesList = $listPricesList = $listPriceValuesList = array();
		$descriptionsList = $quantitiesList = $imageSourcesList = $productIdsList = $baseCurrencyIdsList = array();

		foreach($idList as $id) {
			$recordModel = Vtiger_Record_Model::getInstanceById($id);
			$taxes = $recordModel->getTaxes();
			foreach ($taxes as $key => $taxInfo) {
				$taxInfo['compoundOn'] = json_encode($taxInfo['compoundOn']);
				$taxes[$key] = $taxInfo;
			}

			$taxesList[$id]				= $taxes;
			$namesList[$id]				= decode_html($recordModel->getName());
			$quantitiesList[$id]		= $recordModel->get('qtyinstock');
			$descriptionsList[$id]		= decode_html($recordModel->get('description'));
//            $listPriceValuesList[$id]	= $recordModel->getListPriceValues($recordModel->getId());
            $b = Inventory_GetTaxes_Action::getSum($recordModel->getId());

            $db = PearDatabase::getInstance();
            $res = $db->pquery('SELECT * FROM vtiger_productcurrencyrel WHERE productid	= ?', array($id));
            $a = array();
            for($i=0; $i<$db->num_rows($res); $i++) {
                $c = $db->query_result($res, $i, 'actual_price') + $b;
                $a[$db->query_result($res, $i, 'currencyid')] = $c;
            }
            $listPriceValuesList[$id] =  $a;

			$priceDetails = $recordModel->getPriceDetails();
			foreach ($priceDetails as $currencyDetails) {
				if ($currencyId == $currencyDetails['curid']) {
					$conversionRate = $currencyDetails['conversionrate'];
				}
			}
			$listPricesList[$id] = (float)$recordModel->get('unit_price') * (float)$conversionRate;

			foreach ($currencies as $currencyInfo) {
				if ($currencyId == $currencyInfo['curid']) {
					$conversionRateForPurchaseCost = $currencyInfo['conversionrate'];
					break;
				}
			}
			$purchaseCostsList[$id] = round((float)$recordModel->get('purchase_cost') * (float)$conversionRateForPurchaseCost, $decimalPlace);
			$baseCurrencyIdsList[$id] = getProductBaseCurrency($id, $recordModel->getModuleName());

			if ($recordModel->getModuleName() == 'Products') {
				$productIdsList[] = $id;
			}
		}

		if ($productIdsList) {
			$imageDetailsList = Products_Record_Model::getProductsImageDetails($productIdsList);
			foreach ($imageDetailsList as $productId => $imageDetails) {
				$imageSourcesList[$productId] = $imageDetails[0]['path'].'_'.$imageDetails[0]['orgname'];
			}
		}

		foreach($idList as $id) {
			$resultData = array(
								'id'					=> $id,
								'name'					=> $namesList[$id],
								'taxes'					=> $taxesList[$id],
								'listprice'				=> $listPricesList[$id],
								'listpricevalues'		=> $listPriceValuesList[$id],
								'purchaseCost'			=> $purchaseCostsList[$id],
								'description'			=> $descriptionsList[$id],
								'baseCurrencyId'		=> $baseCurrencyIdsList[$id],
								'quantityInStock'		=> $quantitiesList[$id],
								'imageSource'			=> $imageSourcesList[$id]
					);
			$info[] = array($id => $resultData);
		}
		$response->setResult($info);
		$response->emit();
	}
}

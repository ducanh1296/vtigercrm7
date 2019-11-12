<?php
require "vendor/autoload.php";
include_once 'include/database/PearDatabase.php';
use Sonata\GoogleAuthenticator;
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

class Users_CheckCode_View extends Vtiger_Index_View {

    public function preProcess(Vtiger_Request $request) {
        return true;
    }

    public function process(Vtiger_Request $request) {
        $moduleName = $request->getModule();
        $viewer = $this->getViewer($request);
        $userid = $request->get('userid');
        $code = $request->get('code');

        $g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
        $adb = PearDatabase::getInstance();
//        $salt = '7WAO342QFANY6IKBF7L7SWEUU79WL3VMT920VB5NQMW';
//        $secret = $userid.$salt;
        $result = $adb->pquery("SELECT ga_secret FROM vtiger_users WHERE id = ?", array($userid));
        $secret = $adb->query_result($result,0, 'ga_secret');

        if($g->checkCode($secret,$code) == true) {
            $adb->pquery("UPDATE vtiger_users SET ga_secret = ? WHERE id = ?", array($secret, $userid));
            header("Location: index.php");
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }

    function postProcess(Vtiger_Request $request) {
        return true;
    }
}

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

class Users_EnableCode_View extends Vtiger_Index_View {

    public function preProcess(Vtiger_Request $request) {
        return true;
    }

    public function process(Vtiger_Request $request) {
        $moduleName = $request->getModule();
        $viewer = $this->getViewer($request);
        $userId = $request->get('record');

        $g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
        $adb = PearDatabase::getInstance();
//        $salt = '7WAO342QFANY6IKBF7L7SWEUU79WL3VMT920VB5NQMW';
//        $secret = $userId.$salt;
//        $qr = '<img src="'.$g->getURL($userId, 'test.com', $secret).'"';
        $secret =  $g->generateSecret();
        $adb->pquery("UPDATE vtiger_users SET ga_secret = ? WHERE id = ?", array($secret, $userId));
        $qr = \Sonata\GoogleAuthenticator\GoogleQrUrl::generate($userId, $secret, 'GoogleAuthenticatorExample');

        $viewer->assign('MODULE', $moduleName);
        $viewer->assign('USERID', $userId);
        $viewer->assign('QR', $qr);
        $viewer->view('EnableCode.tpl', $moduleName);
    }

    function postProcess(Vtiger_Request $request) {
        return true;
    }

}

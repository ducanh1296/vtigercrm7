<?php
require "vendor/autoload.php";
include_once 'include/database/PearDatabase.php';

use Sonata\GoogleAuthenticator;

/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */

Class Users_EditAjax_View extends Vtiger_IndexAjax_View {

	function __construct() {
		parent::__construct();
		$this->exposeMethod('changePassword');
		$this->exposeMethod('changeUsername');
        $this->exposeMethod('changeAuthen');

	}

	public function checkPermission(Vtiger_Request $request){
		$currentUserModel = Users_Record_Model::getCurrentUserModel();
        $userId = $request->get('recordId');

		if($currentUserModel->getId() != $userId && !$currentUserModel->isAdminUser()) {
			throw new AppException(vtranslate('LBL_PERMISSION_DENIED', 'Vtiger'));
		}
	}
	
	public function process(Vtiger_Request $request) {
		$mode = $request->get('mode');
		if (!empty($mode)) {
			$this->invokeExposedMethod($mode, $request);
			return;
		}
	}

	public function changePassword(Vtiger_Request $request) {
		$viewer = $this->getViewer($request);
		$moduleName = $request->get('module');
		$userId = $request->get('recordId');

		$viewer->assign('MODULE', $moduleName);
		$viewer->assign('USERID', $userId);
		$viewer->assign('CURRENT_USER_MODEL', Users_Record_Model::getCurrentUserModel());
		$viewer->view('ChangePassword.tpl', $moduleName);
	}

	public function changeUsername(Vtiger_Request $request) {

		$viewer = $this->getViewer($request);
		$moduleName = $request->getModule();
		$userId = $request->get('record');
		$userModel = Users_Record_Model::getInstanceFromPreferenceFile($userId);
		
		$viewer->assign('MODULE',$moduleName);
		$viewer->assign('USER_MODEL',$userModel);
		$viewer->assign('CURRENT_USER_MODEL', Users_Record_Model::getCurrentUserModel());
		$viewer->view('ChangeUsername.tpl', $moduleName);
	}

    public function changeAuthen(Vtiger_Request $request) {
        $viewer = $this->getViewer($request);
        $moduleName = $request->get('module');
        $userId = $request->get('recordId');

        $g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
        $adb = PearDatabase::getInstance();
        $result = $adb->pquery("SELECT ga_secret FROM vtiger_users WHERE id = ?", array($userId));
        $gasecret = $adb->query_result($result, 'ga_secret');

        if($gasecret == null) {
            $salt = '7WAO342QFANY6IKBF7L7SWEUU79WL3VMT920VB5NQMW';
            $secret = $userId.$salt;
            $qr = '<img src="'.$g->getURL($userId, 'test.com', $secret).'"';
        }else{
            $qr = null;
        }

        $viewer->assign('MODULE', $moduleName);
        $viewer->assign('USERID', $userId);
        $viewer->assign('QR', $qr);
        $viewer->assign('CURRENT_USER_MODEL', Users_Record_Model::getCurrentUserModel());
        $viewer->view('ChangeAuthen.tpl', $moduleName);
    }

}
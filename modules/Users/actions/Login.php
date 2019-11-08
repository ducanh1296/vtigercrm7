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

class Users_Login_Action extends Vtiger_Action_Controller {

    function loginRequired() {
        return false;
    }

    function checkPermission(Vtiger_Request $request) {
        return true;
    }

    function process(Vtiger_Request $request) {
        $username = $request->get('username');
        $password = $request->getRaw('password');
        $code = $request->get('code');

        $user = CRMEntity::getInstance('Users');
        $user->column_fields['user_name'] = $username;

        $g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
        $adb = PearDatabase::getInstance();
        $result = $adb->pquery("SELECT ga_secret FROM vtiger_users WHERE user_name = ?", array($username));
        $gasecret = $adb->query_result($result,0,'ga_secret');

        if($gasecret) {
            if ($g->checkCode($gasecret, $code) == false) {
                header('Location: index.php?module=Users&parent=Settings&view=Login&error=login');
                exit;
            }
        }

        if ($user->doLogin($password)) {

            session_regenerate_id(true); // to overcome session id reuse.

            $userid = $user->retrieve_user_id($username);
            Vtiger_Session::set('AUTHUSERID', $userid);

            // For Backward compatability
            // TODO Remove when switch-to-old look is not needed
            $_SESSION['authenticated_user_id'] = $userid;
            $_SESSION['app_unique_key'] = vglobal('application_unique_key');
            $_SESSION['authenticated_user_language'] = vglobal('default_language');

            //Enabled session variable for KCFINDER
            $_SESSION['KCFINDER'] = array();
            $_SESSION['KCFINDER']['disabled'] = false;
            $_SESSION['KCFINDER']['uploadURL'] = "test/upload";
            $_SESSION['KCFINDER']['uploadDir'] = "../test/upload";
            $deniedExts = implode(" ", vglobal('upload_badext'));
            $_SESSION['KCFINDER']['deniedExts'] = $deniedExts;

            // End

            //Track the login History
            $moduleModel = Users_Module_Model::getInstance('Users');
            $moduleModel->saveLoginHistory($user->column_fields['user_name']);
            //End

            if (isset($_SESSION['return_params'])) {
                $return_params = $_SESSION['return_params'];
            }
            header('Location: index.php?module=Users&parent=Settings&view=SystemSetup');
            exit();
        } else {
            header('Location: index.php?module=Users&parent=Settings&view=Login&error=login');
            exit;
        }
    }
}

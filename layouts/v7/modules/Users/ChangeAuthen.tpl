{*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************}
{* modules/Users/views/EditAjax.php *}

{* START YOUR IMPLEMENTATION FROM BELOW. Use {debug} for information *}
{strip}
    <div id="massEditContainer" class="modal-dialog modelContainer">
        {assign var=HEADER_TITLE value="QR CODE"}
        {include file="ModalHeader.tpl"|vtemplate_path:$MODULE TITLE=$HEADER_TITLE}
        <div class="modal-content">
            <form class="form-horizontal" id="confirmCode" name="confirmCode" method="post" action="index.php">
                <input type="hidden" name="module" value="{$MODULE}" />
                <input type="hidden" name="userid" value="{$USERID}" />
                <div name='massEditContent'>
                    <div class="modal-body ">

                        <div class="form-group">
                            <label class="control-label fieldLabel col-sm-5">
                                {vtranslate('QR', $MODULE)}&nbsp;
                                <span class="redColor">*</span>
                            </label>
                            <div class="controls col-xs-6">
                                {$QR}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label fieldLabel col-sm-5">
                                {vtranslate('Confirm Code', $MODULE)}&nbsp;
                                <span class="redColor">*</span>
                            </label>
                            <div class="controls col-xs-6">
                                <input type="text" class="form-control inputElement	" name="code" data-rule-required="true"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer ">
                    <center>
                        {if $QR != null}
                            {assign var=BUTTON_LABEL value="Enable"}
                        {else}
                            {assign var=BUTTON_LABEL value="Disable"}
                        {/if}
                        <button {if $BUTTON_ID neq null} id="{$BUTTON_ID}" {/if} class="btn btn-success" type="submit" name="saveButton"><strong>{$BUTTON_LABEL}</strong></button>
                        <a href="#" class="cancelLink" type="reset" data-dismiss="modal">{vtranslate('LBL_CANCEL', $MODULE)}</a>
                    </center>
                </div>
            </form>
        </div>
    </div>
{/strip}

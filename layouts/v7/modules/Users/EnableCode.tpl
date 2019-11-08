{*{strip}*}
{*    <div class="container">*}
{*        <div id="massEditContainer" class="modal-dialog modelContainer center">*}
{*            {assign var=HEADER_TITLE value="QR CODE"}*}
{*            <div class="modal-content">*}
{*                <form class="form-horizontal" id="enableCode" name="enableCode" method="post" action="index.php?module=Users&view=CheckCode&record={$USERID}">*}
{*                    <input type="hidden" name="module" value="{$MODULE}" />*}
{*                    <input type="hidden" name="userid" value="{$USERID}" />*}
{*                    <div name='massEditContent'>*}
{*                        <div class="modal-body ">*}
{*                            <div class="form-group">*}
{*                                <label class="control-label fieldLabel col-sm-5">*}
{*                                    {vtranslate('QR', $MODULE)}&nbsp;*}
{*                                    <span class="redColor">*</span>*}
{*                                </label>*}
{*                                <div class="controls col-xs-6">*}
{*                                    {$QR}*}
{*                                </div>*}
{*                            </div>*}

{*                            <div class="form-group">*}
{*                                <label class="control-label fieldLabel col-sm-5">*}
{*                                    {vtranslate('Confirm Code', $MODULE)}&nbsp;*}
{*                                    <span class="redColor">*</span>*}
{*                                </label>*}
{*                                <div class="controls col-xs-6">*}
{*                                    <input type="text" class="form-control inputElement	" name="code" data-rule-required="true"/>*}
{*                                </div>*}
{*                            </div>*}
{*                        </div>*}
{*                    </div>*}
{*                    <div class="modal-footer ">*}
{*                        <center>*}
{*                            {if $QR != null}*}
{*                                {assign var=BUTTON_LABEL value="Enable"}*}
{*                            {else}*}
{*                                {assign var=BUTTON_LABEL value="Disable"}*}
{*                            {/if}*}
{*                            <button {if $BUTTON_ID neq null} id="{$BUTTON_ID}" {/if} class="btn btn-success" type="submit" name="saveButton"><strong>{$BUTTON_LABEL}</strong></button>*}
{*                            <a href="index.php?module=Users&action=Logout" class="cancelLink" type="reset" data-dismiss="modal">Logout</a>*}
{*                        </center>*}
{*                    </div>*}
{*                </form>*}
{*            </div>*}
{*        </div>*}
{*    </div>*}
{*{/strip}*}
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html>
<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
</head>
<body>
    <div id="massEditContainer" class="modal-dialog modelContainer center">
        {assign var=HEADER_TITLE value="QR CODE"}
        <div class="modal-content">
            <form class="form-horizontal" id="enableCode" name="enableCode" method="post" action="index.php?module=Users&view=CheckCode&record={$USERID}">
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
                        <a href="index.php?module=Users&action=Logout" class="cancelLink" type="reset" data-dismiss="modal">Logout</a>
                    </center>
                </div>
            </form>
        </div>
    </div>
</body>
</html>






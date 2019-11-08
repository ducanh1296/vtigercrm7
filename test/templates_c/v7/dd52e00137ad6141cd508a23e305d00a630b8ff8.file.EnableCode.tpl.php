<?php /* Smarty version Smarty-3.1.7, created on 2019-11-07 09:49:35
         compiled from "C:\xampp\htdocs\vtigercrm\includes\runtime/../../layouts/v7\modules\Users\EnableCode.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12163297455dc388026cb446-63534922%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd52e00137ad6141cd508a23e305d00a630b8ff8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\includes\\runtime/../../layouts/v7\\modules\\Users\\EnableCode.tpl',
      1 => 1573120174,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12163297455dc388026cb446-63534922',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5dc38802718da',
  'variables' => 
  array (
    'USERID' => 0,
    'MODULE' => 0,
    'QR' => 0,
    'BUTTON_ID' => 0,
    'BUTTON_LABEL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5dc38802718da')) {function content_5dc38802718da($_smarty_tpl) {?>














































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
        <?php $_smarty_tpl->tpl_vars['HEADER_TITLE'] = new Smarty_variable("QR CODE", null, 0);?>
        <div class="modal-content">
            <form class="form-horizontal" id="enableCode" name="enableCode" method="post" action="index.php?module=Users&view=CheckCode&record=<?php echo $_smarty_tpl->tpl_vars['USERID']->value;?>
">
                <input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
" />
                <input type="hidden" name="userid" value="<?php echo $_smarty_tpl->tpl_vars['USERID']->value;?>
" />
                <div name='massEditContent'>
                    <div class="modal-body ">
                        <div class="form-group">
                            <label class="control-label fieldLabel col-sm-5">
                                <?php echo vtranslate('QR',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;
                                <span class="redColor">*</span>
                            </label>
                            <div class="controls col-xs-6">
                                <?php echo $_smarty_tpl->tpl_vars['QR']->value;?>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label fieldLabel col-sm-5">
                                <?php echo vtranslate('Confirm Code',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;
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
                        <?php if ($_smarty_tpl->tpl_vars['QR']->value!=null){?>
                            <?php $_smarty_tpl->tpl_vars['BUTTON_LABEL'] = new Smarty_variable("Enable", null, 0);?>
                        <?php }else{ ?>
                            <?php $_smarty_tpl->tpl_vars['BUTTON_LABEL'] = new Smarty_variable("Disable", null, 0);?>
                        <?php }?>
                        <button <?php if ($_smarty_tpl->tpl_vars['BUTTON_ID']->value!=null){?> id="<?php echo $_smarty_tpl->tpl_vars['BUTTON_ID']->value;?>
" <?php }?> class="btn btn-success" type="submit" name="saveButton"><strong><?php echo $_smarty_tpl->tpl_vars['BUTTON_LABEL']->value;?>
</strong></button>
                        <a href="index.php?module=Users&action=Logout" class="cancelLink" type="reset" data-dismiss="modal">Logout</a>
                    </center>
                </div>
            </form>
        </div>
    </div>
</body>
</html>





<?php }} ?>
<?php /* Smarty version Smarty-3.1.7, created on 2019-11-07 08:28:30
         compiled from "C:\xampp\htdocs\vtigercrm\includes\runtime/../../layouts/v7\modules\Users\ChangeAuthen.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2624254305dc2a248dd82f4-68975411%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64dba0dcd811d840c98697faa80c79dffc8e8020' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\includes\\runtime/../../layouts/v7\\modules\\Users\\ChangeAuthen.tpl',
      1 => 1573115192,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2624254305dc2a248dd82f4-68975411',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5dc2a248e160a',
  'variables' => 
  array (
    'MODULE' => 0,
    'HEADER_TITLE' => 0,
    'USERID' => 0,
    'QR' => 0,
    'BUTTON_ID' => 0,
    'BUTTON_LABEL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5dc2a248e160a')) {function content_5dc2a248e160a($_smarty_tpl) {?>



<div id="massEditContainer" class="modal-dialog modelContainer"><?php $_smarty_tpl->tpl_vars['HEADER_TITLE'] = new Smarty_variable("QR CODE", null, 0);?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('TITLE'=>$_smarty_tpl->tpl_vars['HEADER_TITLE']->value), 0);?>
<div class="modal-content"><form class="form-horizontal" id="confirmCode" name="confirmCode" method="post" action="index.php"><input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
" /><input type="hidden" name="userid" value="<?php echo $_smarty_tpl->tpl_vars['USERID']->value;?>
" /><div name='massEditContent'><div class="modal-body "><div class="form-group"><label class="control-label fieldLabel col-sm-5"><?php echo vtranslate('QR',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;<span class="redColor">*</span></label><div class="controls col-xs-6"><?php echo $_smarty_tpl->tpl_vars['QR']->value;?>
</div></div><div class="form-group"><label class="control-label fieldLabel col-sm-5"><?php echo vtranslate('Confirm Code',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;<span class="redColor">*</span></label><div class="controls col-xs-6"><input type="text" class="form-control inputElement	" name="code" data-rule-required="true"/></div></div></div></div><div class="modal-footer "><center><?php if ($_smarty_tpl->tpl_vars['QR']->value!=null){?><?php $_smarty_tpl->tpl_vars['BUTTON_LABEL'] = new Smarty_variable("Enable", null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['BUTTON_LABEL'] = new Smarty_variable("Disable", null, 0);?><?php }?><button <?php if ($_smarty_tpl->tpl_vars['BUTTON_ID']->value!=null){?> id="<?php echo $_smarty_tpl->tpl_vars['BUTTON_ID']->value;?>
" <?php }?> class="btn btn-success" type="submit" name="saveButton"><strong><?php echo $_smarty_tpl->tpl_vars['BUTTON_LABEL']->value;?>
</strong></button><a href="#" class="cancelLink" type="reset" data-dismiss="modal"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></center></div></form></div></div>
<?php }} ?>
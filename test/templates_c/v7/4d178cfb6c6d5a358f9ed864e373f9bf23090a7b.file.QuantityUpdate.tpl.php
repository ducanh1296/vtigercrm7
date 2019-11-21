<?php /* Smarty version Smarty-3.1.7, created on 2019-11-15 02:47:59
         compiled from "C:\xampp\htdocs\vtigercrm\includes\runtime/../../layouts/v7\modules\Products\QuantityUpdate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:883683925dce11dff3c0d5-74652267%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d178cfb6c6d5a358f9ed864e373f9bf23090a7b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\includes\\runtime/../../layouts/v7\\modules\\Products\\QuantityUpdate.tpl',
      1 => 1520586669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '883683925dce11dff3c0d5-74652267',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'RECORD_ID' => 0,
    'REL_ID' => 0,
    'CURRENT_QTY' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5dce11e00399d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5dce11e00399d')) {function content_5dce11e00399d($_smarty_tpl) {?>


<div id="quantityUpdateContainer" class="modal-dialog modal-sm">
	<div class="modal-content">
		<?php ob_start();?><?php echo vtranslate('LBL_EDIT_QUANTITY',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('TITLE'=>$_tmp1), 0);?>

		<form class="form-horizontal" id="quantityUpdate" method="post" action="index.php">
			<input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
" />
			<input type="hidden" name="action" value="RelationAjax" />
			<input type="hidden" name="src_record" value="<?php echo $_smarty_tpl->tpl_vars['RECORD_ID']->value;?>
" />
			<input type="hidden" name="relid" value="<?php echo $_smarty_tpl->tpl_vars['REL_ID']->value;?>
"/> 
			<div class="modal-body">
				<div class="row">
					<span class="col-lg-6"><label for="quantityEdit" class="pull-right" style="margin-top: 5px;"><?php echo vtranslate('LBL_EDIT_QUANTITY',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label></span>
					<span class="col-lg-6">
						<input id="quantityEdit" data-rule-positiveExcludingZero=true data-rule-positive=true class="form-control" type="text" name="quantity" value="<?php echo $_smarty_tpl->tpl_vars['CURRENT_QTY']->value;?>
">
					</span>
				</div>
			</div>
			<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('ModalFooter.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</form>	
	</div>
</div><?php }} ?>
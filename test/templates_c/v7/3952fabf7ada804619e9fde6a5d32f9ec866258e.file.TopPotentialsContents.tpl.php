<?php /* Smarty version Smarty-3.1.7, created on 2019-11-12 04:01:21
         compiled from "C:\xampp\htdocs\vtigercrm\includes\runtime/../../layouts/v7\modules\Potentials\dashboards\TopPotentialsContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10432255565dca2e9145f186-07609651%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3952fabf7ada804619e9fde6a5d32f9ec866258e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\includes\\runtime/../../layouts/v7\\modules\\Potentials\\dashboards\\TopPotentialsContents.tpl',
      1 => 1520586669,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10432255565dca2e9145f186-07609651',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODELS' => 0,
    'MODULE_NAME' => 0,
    'MODEL' => 0,
    'USER_CURRENCY_SYMBOL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5dca2e9148106',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5dca2e9148106')) {function content_5dca2e9148106($_smarty_tpl) {?>
<div style='padding:5px'>
<?php if (count($_smarty_tpl->tpl_vars['MODELS']->value)>0){?>
	<div>
        <div class='row'>
            <div class='col-lg-4'>
                <b><?php echo vtranslate('Potential Name',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</b>
            </div>
            <div class='col-lg-4'>
                <b><?php echo vtranslate('Amount',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</b>
            </div>
            <div class='col-lg-4'>
                <b><?php echo vtranslate('Related To',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</b>
            </div>
        </div>
		<hr>
		<?php  $_smarty_tpl->tpl_vars['MODEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['MODEL']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['MODELS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['MODEL']->key => $_smarty_tpl->tpl_vars['MODEL']->value){
$_smarty_tpl->tpl_vars['MODEL']->_loop = true;
?>
		<div class='row'>
			<div class='col-lg-4'>
				<a href="<?php echo $_smarty_tpl->tpl_vars['MODEL']->value->getDetailViewUrl();?>
"><?php echo $_smarty_tpl->tpl_vars['MODEL']->value->getName();?>
</a>
			</div>
			<div class='col-lg-4'>
				<?php echo CurrencyField::appendCurrencySymbol($_smarty_tpl->tpl_vars['MODEL']->value->getDisplayValue('amount'),$_smarty_tpl->tpl_vars['USER_CURRENCY_SYMBOL']->value);?>

			</div>
			<div class='col-lg-4'>
				<?php echo $_smarty_tpl->tpl_vars['MODEL']->value->getDisplayValue('related_to');?>

			</div>
		</div>
		<?php } ?>
	</div>
<?php }else{ ?>
	<span class="noDataMsg">
		<?php echo vtranslate('LBL_NO');?>
 <?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
 <?php echo vtranslate('LBL_MATCHED_THIS_CRITERIA');?>

	</span>
<?php }?>
</div><?php }} ?>
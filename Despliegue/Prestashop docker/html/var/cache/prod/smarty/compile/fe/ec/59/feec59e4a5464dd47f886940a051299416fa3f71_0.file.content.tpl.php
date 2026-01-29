<?php
/* Smarty version 4.3.4, created on 2026-01-21 13:02:59
  from '/var/www/html/admin/themes/default/template/content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6970c073ebc9b7_21200951',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'feec59e4a5464dd47f886940a051299416fa3f71' => 
    array (
      0 => '/var/www/html/admin/themes/default/template/content.tpl',
      1 => 1756387940,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6970c073ebc9b7_21200951 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax_confirmation" class="alert alert-success hide"></div>
<div id="ajaxBox" style="display:none"></div>
<div id="content-message-box"></div>

<?php if ((isset($_smarty_tpl->tpl_vars['content']->value))) {?>
	<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }
}
}

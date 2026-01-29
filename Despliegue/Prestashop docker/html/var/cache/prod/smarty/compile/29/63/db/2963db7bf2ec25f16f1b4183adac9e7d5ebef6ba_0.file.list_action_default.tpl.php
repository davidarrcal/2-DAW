<?php
/* Smarty version 4.3.4, created on 2026-01-21 13:03:14
  from '/var/www/html/admin/themes/default/template/helpers/list/list_action_default.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6970c082787f23_26450621',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2963db7bf2ec25f16f1b4183adac9e7d5ebef6ba' => 
    array (
      0 => '/var/www/html/admin/themes/default/template/helpers/list/list_action_default.tpl',
      1 => 1756387940,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6970c082787f23_26450621 (Smarty_Internal_Template $_smarty_tpl) {
?><a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['href']->value,'html','UTF-8' ));?>
" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
"<?php if ((isset($_smarty_tpl->tpl_vars['name']->value))) {?> name="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['name']->value,'html','UTF-8' ));?>
"<?php }?> class="default">
	<i class="icon-asterisk"></i> <?php echo $_smarty_tpl->tpl_vars['action']->value;?>

</a>
<?php }
}

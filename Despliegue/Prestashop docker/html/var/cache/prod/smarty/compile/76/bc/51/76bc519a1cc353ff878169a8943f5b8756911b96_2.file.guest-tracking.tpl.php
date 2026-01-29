<?php
/* Smarty version 4.3.4, created on 2026-01-21 13:03:30
  from '/var/www/html/themes/classic/templates/customer/guest-tracking.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6970c092cbcc24_13523178',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76bc519a1cc353ff878169a8943f5b8756911b96' => 
    array (
      0 => '/var/www/html/themes/classic/templates/customer/guest-tracking.tpl',
      1 => 1738226099,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:customer/_partials/order-detail-no-return.tpl' => 1,
    'file:customer/_partials/account-transformation-form.tpl' => 1,
  ),
),false)) {
function content_6970c092cbcc24_13523178 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14994842966970c092cb66d0_53703594', 'page_title');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12354754336970c092cb7b18_49202388', 'order_detail');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6077076686970c092cb8c57_78497313', 'order_messages');
?>


<?php if (!$_smarty_tpl->tpl_vars['registered_customer_exists']->value) {?>
  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18520819926970c092cba1f3_52906866', 'page_content');
?>

<?php }
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'customer/order-detail.tpl');
}
/* {block 'page_title'} */
class Block_14994842966970c092cb66d0_53703594 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_title' => 
  array (
    0 => 'Block_14994842966970c092cb66d0_53703594',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Guest Tracking','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl ) );?>

<?php
}
}
/* {/block 'page_title'} */
/* {block 'order_detail'} */
class Block_12354754336970c092cb7b18_49202388 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'order_detail' => 
  array (
    0 => 'Block_12354754336970c092cb7b18_49202388',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <?php $_smarty_tpl->_subTemplateRender('file:customer/_partials/order-detail-no-return.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
/* {/block 'order_detail'} */
/* {block 'order_messages'} */
class Block_6077076686970c092cb8c57_78497313 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'order_messages' => 
  array (
    0 => 'Block_6077076686970c092cb8c57_78497313',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'order_messages'} */
/* {block 'account_transformation_form'} */
class Block_3369492186970c092cbab91_29931111 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

      <?php $_smarty_tpl->_subTemplateRender('file:customer/_partials/account-transformation-form.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php
}
}
/* {/block 'account_transformation_form'} */
/* {block 'page_content'} */
class Block_18520819926970c092cba1f3_52906866 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page_content' => 
  array (
    0 => 'Block_18520819926970c092cba1f3_52906866',
  ),
  'account_transformation_form' => 
  array (
    0 => 'Block_3369492186970c092cbab91_29931111',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3369492186970c092cbab91_29931111', 'account_transformation_form', $this->tplIndex);
?>

  <?php
}
}
/* {/block 'page_content'} */
}

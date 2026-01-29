<?php
/* Smarty version 4.3.4, created on 2026-01-21 13:03:33
  from '/var/www/html/themes/classic/templates/errors/forbidden.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6970c0957ccab1_05746865',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aebe34c3913cd9dd4bf8c05d1029187916754cd0' => 
    array (
      0 => '/var/www/html/themes/classic/templates/errors/forbidden.tpl',
      1 => 1738226099,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6970c0957ccab1_05746865 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13686414986970c0957c81d3_63510387', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, $_smarty_tpl->tpl_vars['layout']->value);
}
/* {block 'page_title'} */
class Block_17836101476970c0957c9624_46888648 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');
}
}
/* {/block 'page_title'} */
/* {block 'page_header'} */
class Block_19485200906970c0957c92b3_66046961 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <h1><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17836101476970c0957c9624_46888648', 'page_title', $this->tplIndex);
?>
</h1>
        <?php
}
}
/* {/block 'page_header'} */
/* {block 'page_header_container'} */
class Block_15625004036970c0957c88b7_86835020 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <header class="page-header">
      <div class="logo"><img src="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['shop']->value['logo'], ENT_QUOTES, 'UTF-8');?>
" alt="logo" loading="lazy"></div>
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19485200906970c0957c92b3_66046961', 'page_header', $this->tplIndex);
?>

    </header>
  <?php
}
}
/* {/block 'page_header_container'} */
/* {block 'page_content'} */
class Block_2449234246970c0957cae25_93437602 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

          <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'403 Forbidden','d'=>'Shop.Theme.Global'),$_smarty_tpl ) );?>
</h2>
          <p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>"You are not allowed to access this page.",'d'=>"Shop.Theme.Global"),$_smarty_tpl ) );?>
</p>
        <?php
}
}
/* {/block 'page_content'} */
/* {block 'page_content_container'} */
class Block_4097004336970c0957caa86_92771272 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <section id="content" class="page-content page-restricted">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2449234246970c0957cae25_93437602', 'page_content', $this->tplIndex);
?>

    </section>
  <?php
}
}
/* {/block 'page_content_container'} */
/* {block 'page_footer_container'} */
class Block_6037499996970c0957cc276_06005573 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


  <?php
}
}
/* {/block 'page_footer_container'} */
/* {block 'content'} */
class Block_13686414986970c0957c81d3_63510387 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_13686414986970c0957c81d3_63510387',
  ),
  'page_header_container' => 
  array (
    0 => 'Block_15625004036970c0957c88b7_86835020',
  ),
  'page_header' => 
  array (
    0 => 'Block_19485200906970c0957c92b3_66046961',
  ),
  'page_title' => 
  array (
    0 => 'Block_17836101476970c0957c9624_46888648',
  ),
  'page_content_container' => 
  array (
    0 => 'Block_4097004336970c0957caa86_92771272',
  ),
  'page_content' => 
  array (
    0 => 'Block_2449234246970c0957cae25_93437602',
  ),
  'page_footer_container' => 
  array (
    0 => 'Block_6037499996970c0957cc276_06005573',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15625004036970c0957c88b7_86835020', 'page_header_container', $this->tplIndex);
?>


  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4097004336970c0957caa86_92771272', 'page_content_container', $this->tplIndex);
?>


  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6037499996970c0957cc276_06005573', 'page_footer_container', $this->tplIndex);
?>

<?php
}
}
/* {/block 'content'} */
}

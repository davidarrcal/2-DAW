<?php
/* Smarty version 4.3.4, created on 2026-01-21 13:03:23
  from '/var/www/html/themes/classic/templates/catalog/_partials/miniatures/category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6970c08baa6520_34086413',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32fcc89612a50c949dc70b126dd6551bf53c3e0b' => 
    array (
      0 => '/var/www/html/themes/classic/templates/catalog/_partials/miniatures/category.tpl',
      1 => 1738226099,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6970c08baa6520_34086413 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16638324606970c08baa08f9_93559875', 'category_miniature_item');
?>

<?php }
/* {block 'category_miniature_item'} */
class Block_16638324606970c08baa08f9_93559875 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'category_miniature_item' => 
  array (
    0 => 'Block_16638324606970c08baa08f9_93559875',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <section class="category-miniature">
    <a href="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['category']->value['url'], ENT_QUOTES, 'UTF-8');?>
">
      <picture>
        <?php if (!empty($_smarty_tpl->tpl_vars['category']->value['image']['medium']['sources']['avif'])) {?><source srcset="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['category']->value['image']['medium']['sources']['avif'], ENT_QUOTES, 'UTF-8');?>
" type="image/avif"><?php }?>
        <?php if (!empty($_smarty_tpl->tpl_vars['category']->value['image']['medium']['sources']['webp'])) {?><source srcset="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['category']->value['image']['medium']['sources']['webp'], ENT_QUOTES, 'UTF-8');?>
" type="image/webp"><?php }?>
        <img
          src="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['category']->value['image']['medium']['url'], ENT_QUOTES, 'UTF-8');?>
"
          alt="<?php if (!empty($_smarty_tpl->tpl_vars['category']->value['image']['legend'])) {
echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['category']->value['image']['legend'], ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['category']->value['name'], ENT_QUOTES, 'UTF-8');
}?>"
          loading="lazy"
          width="250"
          height="250"
        >
      </picture>
    </a>

    <h1 class="h2">
      <a href="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['category']->value['url'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['category']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a>
    </h1>

    <div class="category-description"><?php echo $_smarty_tpl->tpl_vars['category']->value['description'];?>
</div>
  </section>
<?php
}
}
/* {/block 'category_miniature_item'} */
}

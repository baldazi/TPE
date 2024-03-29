<?php
/* Smarty version 4.3.2, created on 2024-01-15 15:13:47
  from 'C:\Users\DELL\Documents\GitHub\TPE\src\templates\main\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65a54bab858f96_85944460',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ffe86bc391f7d75ab0973b673eb515a645d0085a' => 
    array (
      0 => 'C:\\Users\\DELL\\Documents\\GitHub\\TPE\\src\\templates\\main\\index.tpl',
      1 => 1705331573,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./event.tpl' => 1,
    'file:./login.tpl' => 1,
  ),
),false)) {
function content_65a54bab858f96_85944460 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php if ((isset($_SESSION['user']))) {?>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_136462699165a54bab83d4e1_48142053', "header-side");
?>

    <?php $_smarty_tpl->_subTemplateRender("file:./event.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
} else { ?>
    <?php $_smarty_tpl->_subTemplateRender("file:./login.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../base.tpl");
}
/* {block "header-side"} */
class Block_136462699165a54bab83d4e1_48142053 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header-side' => 
  array (
    0 => 'Block_136462699165a54bab83d4e1_48142053',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <button class="btn text-white">
            <i class="fa-solid fa-power-off"></i>
        </button>
        <?php
}
}
/* {/block "header-side"} */
}

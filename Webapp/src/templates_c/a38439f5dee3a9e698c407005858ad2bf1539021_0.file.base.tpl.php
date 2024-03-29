<?php
/* Smarty version 4.3.2, created on 2024-01-15 15:13:42
  from 'C:\Users\DELL\Documents\GitHub\TPE\src\templates\base.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65a54ba690a0b3_11670760',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a38439f5dee3a9e698c407005858ad2bf1539021' => 
    array (
      0 => 'C:\\Users\\DELL\\Documents\\GitHub\\TPE\\src\\templates\\base.tpl',
      1 => 1705331573,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65a54ba690a0b3_11670760 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20456244365a54ba68e3ce3_63764145', "style");
?>

    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="shortcut icon" href="/assets/img/icons/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_158326490165a54ba68ebfb7_94908552', "title");
?>
</title>

    <?php echo '<script'; ?>
 src="https://unpkg.com/vue@3/dist/vue.global.js"><?php echo '</script'; ?>
>
</head>

<body>

    <header class="border-bottom">
        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="/assets/img/logo.png" class="logo col-2" alt="logo">
                </a> 

                <div class="d-flex">
                    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_183674517165a54ba68f3de2_55440745', "header-side");
?>

                </div>
            </div>
        </nav>
    </header>
    <div id="app">
        <main>
                            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_131981234065a54ba68fc108_31297781', "content");
?>

                    </main>
    </div>
    <footer>
            <p class="text-center bg-secondary">litisLab!</p>
    </footer>

    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/assets/scripts/app.js"><?php echo '</script'; ?>
>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_137000047865a54ba6903982_03959256', "script");
?>


</body>

</html><?php }
/* {block "style"} */
class Block_20456244365a54ba68e3ce3_63764145 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_20456244365a54ba68e3ce3_63764145',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "style"} */
/* {block "title"} */
class Block_158326490165a54ba68ebfb7_94908552 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_158326490165a54ba68ebfb7_94908552',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
bienvenue !<?php
}
}
/* {/block "title"} */
/* {block "header-side"} */
class Block_183674517165a54ba68f3de2_55440745 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header-side' => 
  array (
    0 => 'Block_183674517165a54ba68f3de2_55440745',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                    <i class="fa-solid fa-bars"></i>
                    <?php
}
}
/* {/block "header-side"} */
/* {block "content"} */
class Block_131981234065a54ba68fc108_31297781 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_131981234065a54ba68fc108_31297781',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_137000047865a54ba6903982_03959256 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_137000047865a54ba6903982_03959256',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "script"} */
}

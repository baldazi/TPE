<?php
/* Smarty version 4.3.2, created on 2024-02-05 15:20:21
  from 'C:\Users\DELL\Documents\GitHub\TPE\src\templates\main\event.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65c0fcb5671353_12293911',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7cf6b12ca477b38b3f4ecfb00d6e816dd3eb6058' => 
    array (
      0 => 'C:\\Users\\DELL\\Documents\\GitHub\\TPE\\src\\templates\\main\\event.tpl',
      1 => 1707146417,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65c0fcb5671353_12293911 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_55752735865c0fcb563ca19_64014381', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_86506154965c0fcb5644ba7_11941779', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_177010344465c0fcb566fe61_02124560', "script");
}
/* {block "title"} */
class Block_55752735865c0fcb563ca19_64014381 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_55752735865c0fcb563ca19_64014381',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

events
<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_86506154965c0fcb5644ba7_11941779 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_86506154965c0fcb5644ba7_11941779',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Users\\DELL\\Documents\\GitHub\\TPE\\src\\Core\\libs\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),1=>array('file'=>'C:\\Users\\DELL\\Documents\\GitHub\\TPE\\src\\Core\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>

<div class="row mx-1">
        <div class="col-lg-3">
        <p class="bg-primary text-white text-center mx-auto shadow mt-1 rounded">
            <i class="fa-solid fa-calendar-days"></i>
            Evenement
        </p>
        <div class="list-group">
            <li class="list-group-item active"><a role="button">Table</a></li>
            <li class="list-group-item"><a role="button">Liste</a></li>
            <li class="list-group-item"><a role="button">Calendrier</a></li>
            <li class="list-group-item"><a role="button">Groupe</a></li>
            <li class="list-group-item"><a role="button">Important</a></li>
        </div>

    </div>
        <div class="col-lg-6 border overflow-hidden">
        <p class="alert alert-primary text-center border-0 m-1">Vous avez <?php echo smarty_modifier_count($_smarty_tpl->tpl_vars['events']->value);?>
 évenement à venir</p>
        <table id="table22" class="table text-center">
            <thead class="bg-primary">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Début</th>
                <th scope="col">Fin</th>
                <th scope="col">Lieu</th>
            </tr>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['events']->value, 'row', false, 'i');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['i']->value => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                <tr>
                    <th scope="row">
                        <?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>

                        <i class="fa-solid fa-circle" style="color: <?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value->Color;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
;"></i>
                    </th>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value->Title;?>
</td>
                    <td>
                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value->StartDate,"%d/%m/%Y");?>
 <br/> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value->StartTime,"%H:%M");?>

                    </td>
                    <td>
                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value->EndDate,"%d/%y/%Y");?>
 <br/> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value->EndTime,"%H:%M");?>

                    </td>
                    <td>
                        <?php echo $_smarty_tpl->tpl_vars['row']->value->Location;?>

                    </td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </div>
        <div class="col-lg-3 p-1">
        <p class="bg-primary text-white text-center rounded shadow"><i class="fa-solid fa-calendar"></i> Calendrier</p>
        <form method="post" action="/calendar/create">
            <input type="hidden" name="stage" value="2"/>
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-link"></i></span>
                    <input type="text" placeholder="entrez votre lien pour ajouter un calendrier" class="form-control form-control-sm" id="ics-url" name="file_URL">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-play"></i></button>
                </div>
            </div>
        </form>
        <div>
            <ul class="list-group">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['calendars']->value, 'row', false, 'i');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['i']->value => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                    <li class="list-group-item text-white" style="background-color: <?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value->Color;
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
;">
                        <?php ob_start();
echo $_smarty_tpl->tpl_vars['row']->value->name;
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
</li>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
        </div>
    </div>

</div>
<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_177010344465c0fcb566fe61_02124560 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_177010344465c0fcb566fe61_02124560',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block "script"} */
}

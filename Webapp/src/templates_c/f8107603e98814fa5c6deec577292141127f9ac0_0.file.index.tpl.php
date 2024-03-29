<?php
/* Smarty version 4.3.2, created on 2024-01-15 15:13:42
  from 'C:\Users\DELL\Documents\GitHub\TPE\src\templates\event\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65a54ba688bd82_01811126',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f8107603e98814fa5c6deec577292141127f9ac0' => 
    array (
      0 => 'C:\\Users\\DELL\\Documents\\GitHub\\TPE\\src\\templates\\event\\index.tpl',
      1 => 1705331573,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65a54ba688bd82_01811126 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_197647891165a54ba67bd075_36708990', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_151881990365a54ba67c9aa5_80508628', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_46503658065a54ba6886452_82705743', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../base.tpl");
}
/* {block "title"} */
class Block_197647891165a54ba67bd075_36708990 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_197647891165a54ba67bd075_36708990',
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
class Block_151881990365a54ba67c9aa5_80508628 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_151881990365a54ba67c9aa5_80508628',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\Users\\DELL\\Documents\\GitHub\\TPE\\src\\Core\\libs\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),1=>array('file'=>'C:\\Users\\DELL\\Documents\\GitHub\\TPE\\src\\Core\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>

    <div class="row">
            <div class="col-lg-3">
            <p class="bg-primary text-white text-center mx-auto shadow mt-1 rounded">Evenement</p>
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
            <table border="0" width="690" id="table22" class="inner_font" cellspacing="1" cellpadding="4" style="font-family:Verdana; font-size:10pt" bgcolor="#99CCFF">
            <tr>
                <td align="center" width="5%"><b>#</b></td>
                <td align="center" width="20%"><b>Event Name</b></td>
                <td align="center" width="22%"><b>Start Date</b></td>
                <td align="center" width="22%"><b>End Date</b></td>
                <td align="center" class="tbl_text"><font color="#000000"><b>Location</b></font></td>
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['events']->value, 'row', false, 'i');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['i']->value => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                <tr>
                    <td style="padding-top:8px; padding-bottom:8px" align="center" width="5%" bgcolor="#FFFFFF"><?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
</td>
                    <td style="padding-top:8px; padding-bottom:8px" align="center" width="20%" bgcolor="#FFFFFF"><?php echo $_smarty_tpl->tpl_vars['row']->value->Title;?>
</td>
                    <td style="padding-top:8px; padding-bottom:8px" align="center" width="22%" bgcolor="#FFFFFF">
                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value->StartDate,"%m/%d/%Y");?>
 @ <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value->StartTime,"%I:%M %p");?>

                    </td>
                    <td style="padding-top:8px; padding-bottom:8px" align="center" width="22%" bgcolor="#FFFFFF">
                        <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value->EndDate,"%m/%d/%Y");?>
 @ <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value->EndTime,"%I:%M %p");?>

                    </td>
                    <td width="20%" style="text-align: center; padding-top:8px; padding-bottom:8px" align="center" bgcolor="#FFFFFF">
                        <?php echo $_smarty_tpl->tpl_vars['row']->value->Location;?>

                    </td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </table>
        </div>
                <div class="col-lg-3 p-1">
        <p class="bg-primary text-white text-center rounded shadow"><i class="fa-solid fa-plus"></i> Ajouter</p>
        <form method="post">
            <input type="hidden" name="stage" value="2" />
            <div class="mb-3">
            <div class="input-group">
                <span class="input-group-text"><i class="fa-solid fa-link"></i></span>
                <input type="text" class="form-control form-control-sm" id="ics-url" name="file_URL">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-play"></i></button>
            </div>
            </div>
        </form> 
        
        <form method="post" enctype="multipart/form-data" name="ics_frm" onsubmit="return validate();">
            <input type="hidden" name="stage" value="1" />
            <div class="mb-3">
            <div class="input-group">
            <input type="file" name="file1"  class="form-control"/>
            <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-play"></i></button>
            </div>
        </form> 
        </div>
    </div>

<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_46503658065a54ba6886452_82705743 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_46503658065a54ba6886452_82705743',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 type="text/javascript">
    function validate(){
        if(document.ics_frm.file1.value == ""){
            alert("please upload a valid Icalendra file.");
            document.form1.file1.focus();
            return false;
        }
        if(document.ics_frm.file1.value != ""){
            if(!/(\.ics|\.ICS)$/i.test(document.ics_frm.file1.value)) 
            {
                alert("please upload a valid Icalendra file\nPlease upload a image file with an extention of one of the following :\n\n ICS,ics");
                document.form1.file1.focus();
                return false;
            }
        }
    }
<?php echo '</script'; ?>
> 
<?php
}
}
/* {/block "script"} */
}

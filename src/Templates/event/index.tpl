{extends file="../base.tpl"}
{block name="title"}
    events
{/block}

{block name="content"}
    <form method="post" enctype="multipart/form-data" name="ics_frm" onsubmit="return validate();">
        <input type="hidden" name="stage" value="1" />
        <input type="file" name="file1" />
        <input type="submit" value="submit" /><br/><br/>
        &nbsp;
    </form> 

    <table border="0" width="690" id="table22" class="inner_font" cellspacing="1" cellpadding="4" style="font-family:Verdana; font-size:10pt" bgcolor="#99CCFF">
    <tr>
        <td align="center" width="5%"><b>#</b></td>
        <td align="center" width="20%"><b>Event Name</b></td>
        <td align="center" width="22%"><b>Start Date</b></td>
        <td align="center" width="22%"><b>End Date</b></td>
        <td align="center" class="tbl_text"><font color="#000000"><b>Location</b></font></td>
    </tr>
    {var_dump($data.events)}
    {foreach from=$data.events item=row}
        <tr>
            <td style="padding-top:8px; padding-bottom:8px" align="center" width="5%" bgcolor="#FFFFFF">{1}</td>
            <td style="padding-top:8px; padding-bottom:8px" align="center" width="20%" bgcolor="#FFFFFF">{$row->Title}</td>
            <td style="padding-top:8px; padding-bottom:8px" align="center" width="22%" bgcolor="#FFFFFF">
                {$row->StartDate|date_format:"%m/%d/%Y"} @ {$row->StartTime|date_format:"%I:%M %p"}
            </td>
            <td style="padding-top:8px; padding-bottom:8px" align="center" width="22%" bgcolor="#FFFFFF">
                {$row->EndDate|date_format:"%m/%d/%Y"} @ {$row->EndTime|date_format:"%I:%M %p"}
            </td>
            <td width="20%" style="text-align: center; padding-top:8px; padding-bottom:8px" align="center" bgcolor="#FFFFFF">
                {$row->Location}
            </td>
        </tr>
    {/foreach}
</table>

{/block}

{block name="script"}
    <script type="text/javascript">
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
</script> 
{/block}

{block name="title"}
    events
{/block}

{block name="content"}
    <div class="row">
    {********** content 1 **********}
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
        {********** content 2 **********}
        <div class="col-lg-6 border overflow-hidden">
        <p class="alert alert-primary text-center border-0 m-1">Vous avez {$events|count} évenement à venir</p>
            <table border="0" width="690" id="table22" class="inner_font" cellspacing="1" cellpadding="4" style="font-family:Verdana; font-size:10pt" bgcolor="#99CCFF">
            <tr>
                <td align="center" width="5%"><b>#</b></td>
                <td align="center" width="20%"><b>Event Name</b></td>
                <td align="center" width="22%"><b>Start Date</b></td>
                <td align="center" width="22%"><b>End Date</b></td>
                <td align="center" class="tbl_text"><font color="#000000"><b>Location</b></font></td>
            </tr>
            {foreach from=$events item=row key=i}
                <tr>
                    <td style="padding-top:8px; padding-bottom:8px" align="center" width="5%" bgcolor="#FFFFFF">{$i+1}</td>
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
        </div>
        {********** content 3 **********}
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
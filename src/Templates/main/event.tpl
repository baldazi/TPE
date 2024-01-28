
{block name="title"}
    events
{/block}

{block name="content"}
    <div class="row mx-1">
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
            <table id="table22" class="table text-center">
            <thead class="bg-primary">
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Début</th>
                    <th>Fin</th>
                    <th>Lieu</th>
                </tr>
            </thead>
            <tbody>
            {foreach from=$events item=row key=i}
                <tr>
                    <td>{$i+1}</td>
                    <td>{$row->Title}</td>
                    <td>
                        {$row->StartDate|date_format:"%d/%m/%Y"} <br/> {$row->StartTime|date_format:"%H:%M"}
                    </td>
                    <td>
                        {$row->EndDate|date_format:"%d/%y/%Y"} <br/> {$row->EndTime|date_format:"%H:%M"}
                    </td>
                    <td>
                        {$row->Location}
                    </td>
                </tr>
            {/foreach}
            </tbody>
            </table>
        </div>
        {********** content 3 **********}
        <div class="col-lg-3 p-1">
        <p class="bg-primary text-white text-center rounded shadow"><i class="fa-solid fa-plus"></i> Ajouter</p>
        <form method="post" action="/calendar/create">
            <input type="hidden" name="stage" value="2" />
            <div class="mb-3">
            <div class="input-group">
                <span class="input-group-text"><i class="fa-solid fa-link"></i></span>
                <input type="text" class="form-control form-control-sm" id="ics-url" name="file_URL">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-play"></i></button>
            </div>
            </div>
        </form> 
        
        <form method="post" enctype="multipart/form-data" name="ics_frm" onsubmit="return validate();" action="/event/create">
            <input type="hidden" name="stage" value="1" />
            <div class="mb-3">
            <div class="input-group">
            <input type="file" name="file_data"  class="form-control"/>
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
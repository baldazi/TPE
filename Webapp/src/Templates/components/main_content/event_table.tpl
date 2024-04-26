<div class="row mx-1">
    {********** content 2 **********}
    <div class="col-lg-6 border overflow-hidden">
        <p class="alert alert-primary text-center border-0 m-1">Vous avez {$events|count} évenement à venir</p>
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
            {foreach from=$events item=row key=i}
                <tr>
                    <th scope="row">
                        {$i+1}
                        <i class="fa-solid fa-circle" style="color: {{$row->Color}};"></i>
                    </th>
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
                {foreach from=$calendars item=row key=i}
                    <li class="list-group-item text-white" style="background-color: {{$row->Color}};">
                        {{$row->name}}</li>
                {/foreach}
            </ul>
        </div>
    </div>

</div>
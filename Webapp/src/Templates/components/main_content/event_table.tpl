<div class="row mx-1">
    {********** content 2 **********}
    <div class="overflow-hidden">
        <p class="alert alert-primary text-center border-0 m-1 d-none">Vous avez {$events|count} évenement à venir</p>
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
                    <td>{$row->title}</td>
                    <td>
                        {$row->startDate|date_format:"%d/%m/%Y"} <br/> {$row->startTime|date_format:"%H:%M"}
                    </td>
                    <td>
                        {$row->endDate|date_format:"%d/%y/%Y"} <br/> {$row->endTime|date_format:"%H:%M"}
                    </td>
                    <td>
                        {$row->location}
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>

</div>
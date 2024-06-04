<div class="mx-1  shadow rounded py-1 px-2">
    <p class="alert alert-primary text-center border-0 m-1 d-none">Vous avez {$events|count} évenement à venir</p>
    <select class="form-select form-select-sm mb-2" aria-label="Large select example" style="max-width: 300px">
        <option value="1" selected>A venir</option>
        <option value="2">Tous</option>
        <option value="3">Passé</option>
    </select>
    {********** content 2 **********}
    <div class="table-responsive text-nowrap">
        <table id="table22" class="table">
            <thead class="bg-primary">
            <tr>
                <th scope="col"></th>
                <th scope="col"><i class="fa-solid fa-arrow-down-1-9"></i></th>
                <th scope="col" class="th-lg">Titre</th>
                <th scope="col">Début</th>
                <th scope="col">Fin</th>
                <th scope="col">Lieu</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            {foreach from=$events item=event key=i}
                <tr>
                    <th scope="row"  class="align-middle"><i class="fa-solid fa-square text-{$smarty.session.user.colorPalette[$event->colorID]}"></i></th>
                    <th scope="row"  class="align-middle">
                        {$i+1}
                    </th>
                    <td  class="align-middle">{$event->title}</td>
                    <td class="align-middle">
                        <span>{$event->startDateTime}</span>
                    </td>
                    <td  class="align-middle">
                        {$event->endDateTime}
                    </td>
                    <td  class="align-middle">
                        {$event->location}
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>

    {***********************************}
    <nav aria-label="event navigation">
        <ul class="pagination pagination-sm justify-content-end">
            <li class="page-item"><a class="page-link" href="#">
                    <i class="fa-solid fa-angle-left"></i>
                </a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">
                    <i class="fa-solid fa-angle-right"></i>
                </a></li>
        </ul>
    </nav>

</div>
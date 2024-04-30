<div class="mx-2">
    <ul class="list-group">
        {foreach from=$calendars item=row key=i}
            <li class="list-group-item text-white p-2 rounded bg-{{$colorPalette[$row->colorID]}}">
                {{$row->name}}
            </li>
        {/foreach}
    </ul>
</div>
</div>
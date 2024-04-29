<div class="mx-2">
    <ul class="list-group">
        {foreach from=$calendars item=row key=i}
        <li class="list-group-item text-white p-2 rounded" style="background-color: {{$row->Color}};">
            {{$row->name}}
            {/foreach}
        <li class="list-group-item text-white p-2 rounded bg-lime">RDV</li>
    </ul>
</div>
</div>
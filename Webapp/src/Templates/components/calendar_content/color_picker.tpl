<div class="fc-color-picker d-flex justify-content-center gap-2" id="color-chooser">
    {foreach from=$colorPalette key=k item=color}
        <a class="text-{{$color}}" role="button" onclick="updateColorPicked({{$k}}, '{{$color}}')">
            <span><i class="fa-solid fa-square"></i></span>
        </a>
    {/foreach}
</div>
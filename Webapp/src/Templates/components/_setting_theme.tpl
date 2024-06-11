<div class="content-wrapper p-2 vw-100 min-vh-100">
    {** Content Header (Page header) **}
    {include file="./main_content/main_header.tpl"}
    <h4 class="text-light-blue">Apparences</h4>
    <hr>
    <div class="d-flex flex-wrap justify-content-center gap-3">
        {foreach from=$themes item=skin key=i}
            {include file="./setting_content/skin_picker.tpl" skin=$skin id=$i}
        {/foreach}
    </div>
</div>
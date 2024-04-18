{extends file="../base.tpl"}


{if isset($smarty.session.user)}
    {block name="header-side"}
        <a class="btn text-white" href="/logout">
            <i class="fa-solid fa-power-off"></i>
        </a>
        {/block}
    {include file="./event.tpl"}
{else}
    {include file="../user/login.tpl"}
{/if}

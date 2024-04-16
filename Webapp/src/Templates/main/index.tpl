{extends file="../base.tpl"}


{if isset($smarty.session.user)}
    {block name="header-side"}
        <button class="btn text-white">
            <i class="fa-solid fa-power-off"></i>
        </button>
        {/block}
    {include file="./event.tpl"}
{else}
    {include file="../user/login.tpl"}
{/if}

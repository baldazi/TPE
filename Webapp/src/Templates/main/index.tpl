{extends file="../base.tpl"}


{if isset($smarty.session.user)}
    {block name="style"}
        <link href="/assets/css/skins.css" rel="stylesheet" type="text/css"/>
    {/block}
    {block name="header-more"}
        {include file="../components/_header_more.tpl"}
    {/block}
    {block name="content"}
        {** Right side column. Contains the navbar and content of the page **}
        <main class="content-wrapper">
            {include file="../components/_left_aside.tpl"}
            {** main section header **}
            {include file="../components/_main_header.tpl"}
            {** main section content **}
            {include file="../components/_main_content.tpl"}
        </main>
    {/block}
    {block name="script"}

    {/block}
{else}
    {include file="../user/login.tpl"}
{/if}

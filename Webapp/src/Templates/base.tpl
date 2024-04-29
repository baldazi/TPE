<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css"
          integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    {block name="style"}{/block}
    <link rel="stylesheet" href="/assets/css/style.css" type="text/css"/>
    <link href="/assets/css/skins.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="/assets/img/icons/favicon.ico"/>
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png"/>
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png"/>
    <title>{block name="title"}bienvenue !{/block}</title>

</head>

<body class="skin-purple">
<header class="main-header">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="container-fluid">
            {* header logo *}
            <a class="navbar-brand px-5 logo" href="/">
                <img src="/assets/img/logo.png" alt="logo">
            </a>
            {block name="header-more"}
                {if isset($smarty.session.user)}
                    {include file="./components/_header_more.tpl"}
                {else}
                    <div class="d-flex">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                {/if}
            {/block}
        </div>
    </nav>

</header>
{*********** Main template block*****************}
{block name="content"}
    {if isset($smarty.session.user)}
        <main class="container-fluid p-0 d-flex h-100 min-vh-100">
            {include file="./components/_left_aside.tpl"}

            {block name="page-content"}

            {/block}
        </main>
    {else}
        {include file="./user/login.tpl"}
    {/if}
{/block}
{*********************************}
<footer class="main-footer border-top border-2 p-2">
    <div class="text-center">
        <b>Version</b> 1.0
        <strong>Copyright &copy; 2024</strong>. proposé par <a href="https://www.litislab.fr/">litislab</a>.
        Tous droits reservé.
    </div>

</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
<script src="/assets/scripts/app.js"></script>
{block name="script"}{/block}

</body>

</html>
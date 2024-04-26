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
    {*    <link rel="stylesheet" href="/assets/css/style.css" type="text/css"/>*}
    <link rel="stylesheet" href="/assets/css/style.css" type="text/css"/>
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
            <a class="navbar-brand px-5 logo" href=".">
                <img src="/assets/img/logo.png" alt="logo">
            </a>
        {block name="header-more"}
            <div class="d-flex">
                <i class="fa-solid fa-bars"></i>
            </div>
        {/block}
        </div>
    </nav>

</header>
{*********** Main template block*****************}
{block name="content"}{/block}
{*********************************}
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.0
    </div>
    <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
<script src="/assets/scripts/app.js"></script>
{block name="script"}{/block}

</body>

</html>
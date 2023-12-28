<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {block name="style"}{/block}
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="shortcut icon" href="/assets/img/icons/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <title>{block name="title"}bienvenue !{/block}</title>

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</head>

<body>

    <header class="container-fluid border-bottom">
        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href=".">
                    <img src="/assets/img/logo.png" class="logo col-2" alt="logo">
                </a>
                <div class="d-flex"><i class="fa-solid fa-bars"></i></div>
            </div>
        </nav>
    </header>
    <main>
        {*********** Main template block*****************}
            {block name="content"}default Content{/block}
        {*********************************}
    </main>
    <footer>
            <p class="text-center bg-secondary">merci!</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/scripts/app.js"></script>
    {block name="script"}{/block}

</body>

</html>
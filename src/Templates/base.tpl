<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {block name="style"}{/block}
    <base href="{$smarty.server.HTTP_HOST}">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>{block name="title"}Default Title{/block}</title>
     <link rel="shortcut icon" href="/assets/img/icons/favicon.ico">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
</head>

<body>
   <header>
        bienvenue sur listlab
   </header>
   <main>
    {*********** Main template block*****************}
        {block name="content"}default Content{/block}
    {*********************************}
   </main>
   <footer>
        merci!
   </footer>
   {block name="script"}{/block}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
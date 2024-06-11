<div class="content-wrapper p-2 vw-100 min-vh-100">
    {** Content Header (Page header) **}
    {include file="./main_content/main_header.tpl"}
    <div class="main-body">

        <div class="row">
            <div class="col-md-4">
                <div class="card bg-purple mt-2">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/img/avatar/1.png" class="img-fluid" alt="user profil" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4 class="mb-4">{$smarty.session.user.firstname} {$smarty.session.user.lastname}</h4>
                                <p class="text-muted font-size-sm">Member depuis {$smarty.session.user.createdAt|date_format:"%b. %Y"}</p>
                                <a href="/main/logout" class="btn btn-secondary">Deconnexion</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h2>Informations</h2>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Identifiant</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {$smarty.session.user.pseudo}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nom</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {$smarty.session.user.lastname}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Prenom</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {$smarty.session.user.firstname}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {$smarty.session.user.email}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-danger" target="_blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Modifier</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
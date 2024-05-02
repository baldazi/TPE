{*-- Sidebar user panel TODO: redefinir les classes css--*}
<div class="d-flex user-panel">
    <div class="">
        <img src="/assets/img/avatar/1.png" class="rounded-circle local-side-img" alt="User Image"/>
    </div>
    <div class="info">
        <p>{$smarty.session.user.firstname} {$smarty.session.user.lastname}</p>
        <a href="/setting/profil"><i class="fa fa-circle text-success"></i> En ligne</a>
    </div>
</div>
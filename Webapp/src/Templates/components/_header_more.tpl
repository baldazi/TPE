{*-- main Sidebar toggle button--*}
<a href="#" class="nav-link sidebar-toggle me-auto" role="button" data-bs-toggle="offcanvas"
   data-bs-target="#leftSidebar"
   aria-controls="leftSidebar">
    <i class="fa-solid fa-bars"></i>
</a>
{* profile *}
<ul class="nav navbar-nav mb-lg-0">
    <li class="nav-item dropdown">
        <a class="nav-link position-relative" href="#" id="headerDropdownTask" role="button" data-bs-toggle="dropdown"
           aria-expanded="false">
            <span class="p-2">
                <i class="fa-regular fa-flag"></i>
                <span class="position-absolute top-0 start-50 translate-middle-y badge text-bg-danger mt-2">9</span>
            </span>
        </a>
        {*-- Tasks: style can be found in dropdown.less --*}
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="headerDropdownTask">
            <li class="text-center fw-bold local-gray-text py-2">9 evenements à venir</li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="list-group local-mw-300">
                    <li class="list-group-item list-group-item-action list-group-item-light"><!-- Task item -->
                        <a href="#" class="local-dropdown-item" style="background: #ad8d0d4f">
                            <p class="d-flex mt-2 align-items-center">
                                <span class="me-auto local-gray-text">Vacances</span>
                                <span class="ms-auto local-lightgray-text">12/07/2024</span>
                            </p>
                        </a>
                    </li><!-- end task item -->
                    <li class="list-group-item list-group-item-action list-group-item-light"><!-- Task item -->
                        <a href="#" class="local-dropdown-item" style="background: #980dad4f">
                            <p class="d-flex mt-2 align-items-center">
                                <span class="me-auto local-gray-text">RDV</span>
                                <span class="ms-auto local-lightgray-text">02/08/2024</span>
                            </p>
                        </a>
                    </li><!-- end task item -->
                    <li class="list-group-item list-group-item-action list-group-item-light"><!-- Task item -->
                        <a href="#" class="local-dropdown-item" style="background: #0d6aad4f">
                            <p class="d-flex mt-2 align-items-center">
                                <span class="me-auto local-gray-text">Anniversaire</span>
                                <span class="ms-auto local-lightgray-text">21/06/2024</span>
                            </p>
                        </a>
                    </li><!-- end task item -->
                </ul>
            </li>
            <li>
                <a href="/event" class="text-center dropdown-item local-gray-text">Voir tout</a>
            </li>
        </ul>
    </li>

    {*-- User Account: style can be found in dropdown.less --*}
    <li class="nav-item dropdown user user-menu">
        <a href="#" class="nav-link" data-bs-toggle="dropdown" id="headerDropdownProfile">
            <img src="/assets/img/avatar/1.png" class="user-image" alt="User Image"/>
            <span class="hidden-xs">{substr($smarty.session.user.firstname,0,1)} {$smarty.session.user.lastname}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="headerDropdownProfile">
            <!-- User image -->
            <li class="user-header local-dropdown-item">
                <img src="/assets/img/avatar/1.png" class="rounded-circle" alt="User Image"/>
                <p>
                    <b>{$smarty.session.user.firstname} {$smarty.session.user.lastname}</b>
                    <small>Member depuis {$smarty.session.user.createdAt|date_format:"%b. %Y"}
                    </small>
                </p>
            </li>
            <!-- Menu Footer-->
            <li class="d-flex justify-content-between p-2">
                <a href="/setting/profil" class="btn btn-primary btn-sm">Profile</a>
                <a href="/main/logout" class="btn btn-secondary btn-sm">Deconnexion</a>
            </li>
        </ul>
    </li>
</ul>

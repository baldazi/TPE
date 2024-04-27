{*-- sidebar menu: : style can be found in sidebar.less --*}
<ul class="sidebar-menu mynav nav nav-pills flex-column mb-auto">
    <li class="header">NAVIGATION</li>
    {* 1. Tableau de bord *}
    <li>
        <a href="/">
            <i class="fa-solid fa-gauge"></i>
            <span>Tableau de bord</span>
        </a>
    </li>
    {* 2. Evenements *}
    <li>
        <a href="/event">
            <i class="fa-solid fa-list-check"></i>
            <span>Evenements</span>
        </a>
    </li>
    {* 3. Calendrier *}
    <li>
        <a href="/calendar">
            <i class="fa-regular fa-calendar-days"></i>
            <span>Calendriers</span>
        </a>
    </li>
    {* 4. Soubscription *}
    <li class="treeview">
        <a href="#collapseSoubscribe" data-bs-toggle="collapse" role="button" aria-expanded="false"
           aria-controls="collapseSoubscribe">
            <i class="fa-solid fa-square-rss"></i>
            <span>Soubscription</span>
            <span class="badge text-bg-danger float-end me-3">3</span>
        </a>
        <ul class="treeview-menu collapse" id="collapseSoubscribe">
            <li><a href="#calendar"><i class="fa-regular fa-circle" style="color:#ad8d0d"></i>Vacances</a></li>
            <li><a href="#calendar"><i class="fa-regular fa-circle" style="color: #0d6aad"></i>Divers</a></li>
            <li><a href="#calendar"><i class="fa-regular fa-circle" style="color: #980dad"></i>Enseignements</a></li>
        </ul>
    </li>
    {* 5. Paramètres *}
    <li>
        <a href="#settings">
            <i class="fa-solid fa-gear"></i>
            <span>Paramètres</span>
        </a>
    </li>

    <li class="header">APPLICATION</li>
    {* 6. Apparence *}
    <li>
        <a href="pages/calendar.html">
            <i class="fa-solid fa-display"></i>
            <span>Theme</span>
        </a>
    </li>
    {* 7. Aide *}
    <li>
        <a href="pages/calendar.html">
            <i class="fa-solid fa-circle-info"></i>
            <span>Aide</span>
        </a>
    </li>
</ul>
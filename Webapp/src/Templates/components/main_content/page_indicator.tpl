{** breadcrumb page indicatator **}
<nav class="ms-auto" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="." class="nav-link fw-bold">
                <i class="fa-solid fa-gauge"></i> Accueil
            </a>
        </li>
        {block name="page-indicator-more"}
            <li class="breadcrumb-item active" aria-current="page">
                {block name="page-indicator-id"}Tableau de bord{/block}
            </li>
        {/block}
    </ol>
</nav>
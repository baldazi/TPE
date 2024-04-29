{*-- Left side column. contains the logo and sidebar --*}
<aside class="d-flex flex-column flex-shrink-0  p-2
              offcanvas-md offcanvas-start main-sidebar bg-dark" id="leftSidebar" >
    {*-- sidebar: style can be found in sidebar.less --*}
    <section class="sidebar">
        {*-- Sidebar user panel TODO: redefinir les classes css--*}
        {include file="./left_aside/profile_panel.tpl"}
        {*-- searchbar --*}
        {include file="./left_aside/search_bar.tpl"}
        {*-- sidebar menu: : style can be found in sidebar.less --*}
        {include file="./left_aside/left_menu.tpl"}
    </section>
</aside>
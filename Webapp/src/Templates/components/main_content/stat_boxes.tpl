{*-- Small boxes (Stat box) ---*}
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="card bg-green">
            <div class="card-body">
                <h2>{$smarty.session.user.nbCalendars}</h2>
                <p>Soubscription</p>
            </div>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="card bg-aqua">
            <div class="card-body">
                <h2>{$stats->upcoming}</h2>
                <p>Evenements à venir</p>
            </div>
           </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="card bg-yellow">
            <div class="card-body">
                <h2>{$stats->previous}</h2>
                <p>Evenements passés</p>
            </div>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6 mb-2">
        <!-- small box -->
        <div class="card bg-red">
            <div class="card-body">
                <h2>{$stats->total}</h2>
                <p>Evenements totals</p>
            </div>
        </div>
    </div><!-- ./col -->
</div>
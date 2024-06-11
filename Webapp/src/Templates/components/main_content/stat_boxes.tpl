{*-- Small boxes (Stat box) ---*}
<div class="d-flex flex-column flex-md-row justify-content-md-around mb-3">
    <div class="local-mw-400">
        <!-- small box -->
        <div class="card bg-green">
            <div class="card-body">
                <h2>{$smarty.session.user.nbCalendars}</h2>
                <p>Soubscription</p>
            </div>
        </div>
    </div><!-- ./col -->
    <div class="local-mw-400">
        <!-- small box -->
        <div class="card bg-aqua">
            <div class="card-body">
                <h2>
                    {if $stats->upcoming}{$stats->upcoming}{else}Aucun{/if}
                </h2>
                <p>Evénéments à venir</p>
            </div>
           </div>
    </div><!-- ./col -->
    <div class="local-mw-400">
        <!-- small box -->
        <div class="card bg-yellow">
            <div class="card-body">
                <h2>
                {if $stats->previous}{$stats->previous}{else}Aucun{/if}
                </h2>
                <p>Evénéments passés</p>
            </div>
        </div>
    </div><!-- ./col -->
    <div class=" local-mw-400">
        <!-- small box -->
        <div class="card bg-red">
            <div class="card-body">
                <h2>{$stats->total}</h2>
                <p>Evénéments totals</p>
            </div>
        </div>
    </div><!-- ./col -->
</div>
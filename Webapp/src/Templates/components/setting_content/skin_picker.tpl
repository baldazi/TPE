<div class="card mb-3 position-relative" style="width: 200px;" onclick="updateSkin('{$skin}', '{$i}')">
    {if $smarty.session.user.themeID eq $i}
        <span class="position-absolute top-0 start-100 translate-middle">
            <i class="fa-solid fa-circle-check"></i>
        </span>
    {/if}

    <h5 class="card-header place p-0">
        <span class="placeholder w-100 bg-{$skin} h-100"></span>
    </h5>
    <div class="row g-0">
        <div class="col-md-4">
            <p class="card-text h-100">
                <span class="placeholder w-100 h-100"></span>
            </p>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">
                    <span class="placeholder col-6"></span>
                </h5>
                <p class="card-text">
                    <span class="placeholder col-7"></span>
                    <span class="placeholder col-4"></span>
                    <span class="placeholder col-4"></span>
                    <span class="placeholder col-6"></span>
                </p>
            </div>
        </div>
    </div>
</div>
{extends file="../base.tpl"}
{block name="title"}
    accueil
{/block}

{block name="content"}
    <div class="main-showcase">
        <div class="container mx-auto row gap-5 p-3 overflow-visible">
        <div class="col text-white">
            <h1>Agregateur d'evenement</h1>
            <p>Agregateur d'evenement et newslater</p>
            <a href="#" class="btn btn-outline-secondary">read more</a>
        </div>
        <div class="col rounded bg-white p-3 shadow-md border main-showcase-form">
            <form method="post" action=".">
                <div class="mb-2">
                    <label for="userId" class="form-label">Identifiant</label>
                    <input type="text" class="form-control" id="userId" placeholder="entrez votre identifiant" required>
                </div>
                <div class="mb-2">
                    <label for="userPwd" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="userPwd" placeholder="mot de passe" required>
                </div>
                <button type="submit" class="btn btn-primary px-5 w-100">
                <i class="fa-solid fa-right-to-bracket"></i> Se connecter</button>
            </form>
        </div>
        </div>
    </div>
    <div>
        <p class="text-center">page principal ....</p>
        <a href="/event">go to event</a>
    </div>
{/block}
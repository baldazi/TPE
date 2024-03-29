{block name="title"}
    accueil
{/block}

{block name="content"}    
    <div class="min-vh-100">
    <div class="main-showcase">
        <div class="container mx-auto row gap-5 p-3 overflow-visible">
        <div class="col text-white">
            <h1>Agregateur d'evenement</h1>
            <p>Agregateur d'evenement et newslater</p>
            <a href="/event" class="btn btn-outline-secondary">read more</a>
        </div>
        <div class="col rounded bg-white p-3 shadow-md border main-showcase-form">
            {if isset($smarty.session.error)}
                <div class="alert alert-danger border-0 rounded-0 p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img"
                        aria-label="Warning:">
                        <path
                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                    {$smarty.session.error}
                </div>
            {/if}
            <form method="post" action=".">
                <div class="mb-2">
                    <label for="userId" class="form-label">Identifiant</label>
                    <input type="text" name="login_user_login" class="form-control" id="userId" placeholder="entrez votre identifiant" required>
                </div>
                <div class="mb-2">
                    <label for="userPwd" class="form-label">Mot de passe</label>
                    <input type="password" name="login_user_pass" class="form-control" id="userPwd" placeholder="mot de passe" required>
                </div>
                <button type="submit" class="btn btn-primary px-5 w-100">
                <i class="fa-solid fa-right-to-bracket"></i> Se connecter</button>
            </form>
        </div>
        </div>
    </div>

    </div>
{/block}
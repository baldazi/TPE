{extends file="./base.tpl"}
{block name="title"}
    Page d'inscription
{/block}

{block name="formsection"}
    <div class="col rounded bg-white p-3 shadow-md border main-showcase-form">
        <h3 class="text-center"> inscription</h3>
        {if isset($smarty.session.error)}
            <div class="alert alert-danger border-0 rounded-0 p-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                     class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img"
                     aria-label="Warning:">
                    <path
                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                {$smarty.session.error}
            </div>
        {/if}
        <form method="post">
            <div class="mb-2">
                <label for="username" class="form-label required">Nom :</label>
                <input type="text" name="lastname" class="form-control" id="username"
                       placeholder="Entrez votre nom" required>
            </div>

            <div class="mb-2">
                <label for="userfsname" class="form-label required">Prenom :</label>
                <input type="text" name="firstname" class="form-control" id="userfsname"
                       placeholder="Entrez votre prénom" required>
            </div>

            <div class="mb-2">
                <label for="useremail" class="form-label required">Email :</label>
                <input type="email" name="email" class="form-control" id="useremail"
                       placeholder="Entrez votre email" required>
            </div>

            <div class="mb-2">
                <label for="userId" class="form-label">Identifiant</label>
                <input type="text" name="userid" class="form-control" id="userId"
                       placeholder="Entrez votre identifiant">
            </div>

            <div class="mb-2">
                <label for="userPwd" class="form-label required">Mot de passe</label>
                <input type="password" name="password" class="form-control" id="userPwd"
                       placeholder="mot de passe" required>
            </div>

            <div class="mb-2">
                <label for="userPwdConf" class="form-label required">Confirmation du mot de passe</label>
                <input type="password" name="passconf" class="form-control" id="userPwdConf" onkeyup='check();'
                       placeholder="mot de passe" required>
            </div>

            <button type="submit" class="btn btn-primary px-5 w-100">
                <i class="fa-solid fa-right-to-bracket"></i> Inscription
            </button>

            <p class="text-center">
                Déja inscrit?
                <a href="/" class="link-primary link-offset-2">
                    se connecter
                </a>
            </p>

        </form>
    </div>
{/block}

{block name="script"}
    <script>
        var check = function() {
            if (document.getElementById('userPwd').value ===
                document.getElementById('userPwdConf').value) {
                document.getElementById('userPwdConf').style.borderColor = 'green';
            } else {
                document.getElementById('userPwdConf').style.borderColor = 'red';
            }
        }
    </script>
{/block}
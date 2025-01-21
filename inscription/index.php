<div class="row justify-content-center">
    <div class="col-md-6 card p-4">
        <form action="traitement-inscription.php" method="post">
            <h1 class="h3 mb-3 fw-normal">Inscrivez-vous</h1>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Nom">
                <label for="last_name">Nom</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="first_names" id="first_names" placeholder="Prénoms">
                <label for="first_names">Prénoms</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                <label for="email">Adresse email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe">
                <label for="password">Mot de passe</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm" placeholder="Confirmer mot de passe">
                <label for="passwordConfirm">Confirmer Mot de passe</label>
            </div>

            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" id="remember-me">
                <label class="form-check-label" for="remember-me">
                    Accepter les termes et conditions
                </label>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-primary w-50 py-2" type="submit">Inscription</button>
            </div>
        </form>
    </div>
</div>
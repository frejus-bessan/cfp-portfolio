<div class="row justify-content-center">
    <div class="col-md-6 card p-4">
        <form action="traitement-connexion.php" method="post">
            <h1 class="h3 mb-3 fw-normal">Connectez-vous</h1>

            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Adresse email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Mot de passe</label>
            </div>

            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Se souvenir de moi
                </label>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-primary w-50 py-2" type="submit">Connexion</button>
            </div>
        </form>
    </div>
</div>
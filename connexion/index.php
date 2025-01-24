<?php
$errors = [];
$data = [];

if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
}
if (isset($_SESSION['data'])) {
    $data = $_SESSION['data'];
}

?>

<div class="row justify-content-center">
    <div class="col-md-6 card p-4">

        <form action="index.php?page=traitement-connexion" method="post">
            <h1 class="h3 mb-3 fw-normal">Connectez-vous</h1>

            <div class="form-floating mb-3">
                <input type="email" class="form-control <?= !empty($errors['email']) ? 'is-invalid' : '' ?>"
                    name="email" id="email" placeholder="Email"
                    value="<?= !empty($data['email']) ? $data['email'] : '' ?>">
                <label for="email">Adresse email</label>
                <?php
                if (!empty($errors['email'])) {
                    ?>
                    <span class="text-sm text-danger"> <?= $errors['email'] ?> </span>
                    <?php
                }
                ?>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control <?= !empty($errors['password']) ? 'is-invalid' : '' ?>"
                    name="password" id="password" placeholder="Mot de passe">
                <label for="password">Mot de passe</label>
                <?php
                if (!empty($errors['password'])) {
                    ?>
                    <span class="text-sm text-danger"> <?= $errors['password'] ?> </span>
                    <?php
                }
                ?>
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
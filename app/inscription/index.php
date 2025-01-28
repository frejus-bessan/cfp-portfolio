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

        <form action="index.php?page=traitement-inscription" method="post">
            <h1 class="h3 mb-3 fw-normal">Inscrivez-vous</h1>

            <div class="form-floating mb-3">
                <input type="text" class="form-control <?= !empty($errors['last_name']) ? 'is-invalid' : '' ?>"
                    name="last_name" id="last_name" placeholder="Nom"
                    value="<?= !empty($data['last_name']) ? $data['last_name'] : '' ?>">
                <label for="last_name">Nom</label>
                <?php
                if (!empty($errors['last_name'])) {
                    ?>
                    <span class="text-sm text-danger"> <?= $errors['last_name'] ?> </span>
                    <?php
                }
                ?>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control <?= !empty($errors['first_names']) ? 'is-invalid' : '' ?>"
                    name="first_names" id="first_names" placeholder="Prénoms"
                    value="<?= !empty($data['first_names']) ? $data['first_names'] : '' ?>">
                <label for="first_names">Prénoms</label>
                <?php
                if (!empty($errors['first_names'])) {
                    ?>
                    <span class="text-sm text-danger"> <?= $errors['first_names'] ?> </span>
                    <?php
                }
                ?>
            </div>

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

            <div class="form-floating mb-3">
                <input type="password"
                    class="form-control <?= !empty($errors['passwordConfirm']) ? 'is-invalid' : '' ?>"
                    name="passwordConfirm" id="passwordConfirm" placeholder="Confirmer mot de passe">
                <label for="passwordConfirm">Confirmer Mot de passe</label>
                <?php
                if (!empty($errors['passwordConfirm'])) {
                    ?>
                    <span class="text-sm mt-0 text-danger"> <?= $errors['passwordConfirm'] ?> </span>
                    <?php
                }
                ?>
            </div>

            <div class="form-check text-start my-3">
                <input class="form-check-input <?= !empty($errors['remember_me']) ? 'is-invalid' : 'checked' ?>"
                    type="checkbox" name="remember_me" id="remember-me">
                <label class="form-check-label" for="remember-me">
                    Accepter les termes et conditions
                </label>
                <?php
                if (!empty($errors['remember_me'])) {
                    ?>
                    <span class="text-sm d-block text-danger"> <?= $errors['remember_me'] ?> </span>
                    <?php
                }
                ?>
            </div>

            <div class="d-flex justify-content-center">
                <button class="btn btn-primary w-50 py-2" type="submit">Inscription</button>
            </div>
        </form>
    </div>
</div>

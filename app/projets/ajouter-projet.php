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
    <div class="col-md-10 card p-4">

        <form action="index.php?page=ajout-traitement" method="post" enctype="multipart/form-data">
            <h1 class="h3 mb-3 fw-normal">Nouveau projet</h1>

            <div class="form-floating mb-3">
                <input type="text" class="form-control <?= !empty($errors['name']) ? 'is-invalid' : '' ?>" name="name"
                    id="name" placeholder="Nom" value="<?= !empty($data['name']) ? $data['name'] : '' ?>" required>
                <label for="name">Nom</label>
                <?php
                if (!empty($errors['name'])) {
                    ?>
                    <span class="text-sm text-danger"> <?= $errors['name'] ?> </span>
                    <?php
                }
                ?>
            </div>
            
            <div class="mb-3">
                <label for="short_description">Courte description</label>
                <textarea name="short_description" id="short_description"
                    class="form-control <?= !empty($errors['short_description']) ? 'is-invalid' : '' ?>" cols="30" required>
                    <?= !empty($data['short_description']) ? $data['short_description'] : '' ?>
                </textarea>
                <?php
                if (!empty($errors['short_description'])) {
                    ?>
                    <span class="text-sm text-danger"> <?= $errors['short_description'] ?> </span>
                    <?php
                }
                ?>
            </div>

            <div class="mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="description"
                    class="form-control <?= !empty($errors['description']) ? 'is-invalid' : '' ?>" cols="50" rows="5">
                    <?= !empty($data['description']) ? $data['description'] : '' ?>
                </textarea>
                <?php
                if (!empty($errors['description'])) {
                    ?>
                    <span class="text-sm text-danger"> <?= $errors['description'] ?> </span>
                    <?php
                }
                ?>
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Sélectionner une image à mettre en avant [Poids maximum : 2mo, Extensions autorisées: JPEG, JPG, PNG, GIF]</label>
                <input class="form-control <?= !empty($errors['image']) ? 'is-invalid' : '' ?>" type="file" name="image" id="formFile" required>
                <?php
                if (!empty($errors['image'])) {
                    ?>
                    <span class="text-sm text-danger"> <?= $errors['image'] ?> </span>
                    <?php
                }
                ?>
            </div>

            <div class="d-flex justify-content-center">
                <button class="btn btn-primary w-50 py-2" type="submit">Ajouter</button>
            </div>
        </form>
    </div>
</div>
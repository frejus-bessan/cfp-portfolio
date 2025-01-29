<?php
$errors = array();
$data = array();

if (isset($_POST) && !empty($_POST)) {
    $_POST = cleandata($_POST);
}

extract($_POST);

if (!isset($name) or empty($name)) {
    $errors['name'] = "Le champ nom est requis";
} else {
    $data["name"] = $name;
}

if (!isset($short_description) or empty($short_description)) {
    $errors['short_description'] = "Le champ courte description est requis";
} else {
    $data["short_description"] = $short_description;
}

if (!isset($description) or empty($description)) {
    $description = null;
}

$extensions_autorisees = ['jpg', 'jpeg', 'png', 'gif'];

if (isset($_FILES["image"]) && $_FILES['image']['error'] == 0) {

    if ($_FILES['image']['size'] > 2000000) {
        $errors['image'] = "Le fichier soumis a un poids supérieur au poids maximum de 2mo";
    }

    $fileInfo = pathinfo($_FILES['image']['name']);
    $extension = $fileInfo['extension'];

    if (!in_array(strtolower($extension), $extensions_autorisees)) {
        $errors['image'] = "Le fichier soumis n'a pas une extension autorisée";
    }

    if (empty($errors['image'])) {
        $chemin_vers_stockage_photos = dirname(__DIR__) . '/public/img/upload/';

        if (!is_dir($chemin_vers_stockage_photos)) {
            mkdir($chemin_vers_stockage_photos);
        }
        $chemin_vers_photo_soumise = $chemin_vers_stockage_photos . basename($_FILES['image']['name']);

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $chemin_vers_photo_soumise)) {
            $errors['image'] = "Une erreur est survenue lors du téléchargement de votre image. Reessayer ou contactez les administrateurs si cela persiste.";
        }
    }

}

if (!empty($errors)) {
    $_SESSION['global_error'] = 'Des erreurs sont survenues. Consultez les différents champs.';
    $_SESSION['errors'] = $errors;
    $_SESSION['data'] = $data;

    header('location: index.php?page=ajouter-projet');
    exit;
} else {
    if (insert_project($name, $short_description, $description, $chemin_vers_photo_soumise, $_SESSION['utilisateur_connecter']['id'])) {
        $_SESSION['global_success'] = 'Nouveau projet ajouté avec succès.';
    } else {
        $_SESSION['global_error'] = 'Une erreur est survenue lors de l\'ajout de votre projet. Reesayrer ou contactez les admins si cela persiste.';
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;
    }

    header('location: index.php?page=projets');
    exit;
}
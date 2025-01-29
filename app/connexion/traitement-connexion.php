<?php
$errors = array();
$data = array();

if (isset($_POST) && !empty($_POST)) {
    $_POST = cleandata($_POST);
}

extract($_POST);

if (!isset($email) or empty($email)) {
    $errors['email'] = "Le champ email est requis";
} else {
    $data["email"] = $email;
}

if (!isset($password) or empty($password)) {
    $errors['password'] = "Le champ mot de passe est requis";
}


if (!empty($errors)) {
    $_SESSION['global_error'] = 'Des erreurs sont survenues. Consultez les différents champs.';
    $_SESSION['errors'] = $errors;
    $_SESSION['data'] = $data;

    header('location: index.php?page=connexion');
    exit;
} else {
    if (sign_in($email, $password)) {
        $_SESSION['global_success'] = 'Connexion effectuée avec succès.';
    } else {
        $_SESSION['global_error'] = 'Email ou mot de passe erronés.';
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;
    }

    header('location: index.php?page=projets');
    exit;
}
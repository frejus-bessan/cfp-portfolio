<?php
$errors = array();
$data = array();

if (isset($_POST) && !empty($_POST)) {
    $_POST = cleandata($_POST);
}

extract($_POST);

if(!isset($last_name) or empty($last_name)) {
    $errors['last_name'] = "Le champ nom est requis";
} else {
    $data["last_name"] = $last_name;
}

if(!isset($first_names) or empty($first_names)) {
    $errors['first_names'] = "Le champ prénoms est requis";
} else {
    $data["first_names"] = $first_names;
}

if(!isset($email) or empty($email)) {
    $errors['email'] = "Le champ email est requis";
}else {
    $data["email"] = $email;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = 'Entrez une adresse email valide';
    }
    if (checkMailExist($email)) {
        $errors['email'] = 'Cette adresse email appartient déjà à un utilisateur.';
    }
}

if(!isset($password) or empty($password)) {
    $errors['password'] = "Le champ mot de passe est requis";
} else {
    if (strlen($password) < 8) {
        $errors['password'] = "Le champ mot de passe doit contenir minimum huit (08) caractères.";
    }
}

if(!empty($password) and ($password != $passwordConfirm)) {
    $errors['passwordConfirm'] = "Les champs confirmation de mot de passe et mot de passe doivent contenir les mêmes valeurs.";
}

if(!isset($remember_me) or empty($remember_me)) {
    $errors['remember_me'] = "Vous devez cocher cette case pour continuer";
} else {
    $data["remember_me"] = $remember_me;
}

if(!empty($errors)) {
    $_SESSION['global_error'] = 'Des erreurs sont survenues. Consultez les différents champs.';
    $_SESSION['errors'] = $errors;
    $_SESSION['data'] = $data;

    header('location: index.php?page=inscription');
    exit;
} else {
    if (sign_up($last_name, $first_names, $email, $password)) {
        $_SESSION['global_success'] = 'Inscription effectuée avec succès. Vous pouvez désormais vous connecter.';
    } else {
        $_SESSION['global_error'] = 'Une erreur est survenue lors de votre enregistrement dans la base de données. Réessayer, si cela persiste, contactez les admins du site.';
    }

    header('location: index.php?page=connexion');
    exit;
}
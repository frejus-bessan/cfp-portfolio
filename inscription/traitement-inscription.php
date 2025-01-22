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

if(!empty($password) and $password != $paswordconfirm) {
    $errors['passwordConfirm'] = "Les champs confirmation de mot de passe et mot de passe doivent contenir les mêmes valeurs.";
}

if(!empty($errors)) {
    $_SESSION['global_error'] = 'Des erreurs sont survenues. Consultez les différents champs.';
    $_SESSION['errors'] = $errors;
    $_SESSION['data'] = $data;
} else {
    
}



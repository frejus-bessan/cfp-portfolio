<?php

function db_connect(){
    $connection = new PDO("mysql:host=localhost;dbname=portfolio;charset=utf8","root","");

    return $connection;
}

function cleandata($data) {
    foreach ($data as $key => $value) {
        $data[$key] = strip_tags($value);
        $data[$key] = stripslashes($value);
        $data[$key] = htmlentities($value);
    }
    return $data;
}

function router() {
    if(isset($_GET["page"]) && !empty($_GET['page'])) {
        switch ($_GET["page"]) {
            case 'connexion':
                include(__DIR__.'/../connexion/index.php');
                break;
            case 'traitement-connexion':
                include(__DIR__.'/../connexion/traitement-connexion.php');
                break;
            case 'inscription':
                include(__DIR__.'/../inscription/index.php');
                break;
            case 'traitement-inscription':
                include(__DIR__.'/../inscription/traitement-inscription.php');
                break;
            case 'projets':
                include(__DIR__.'/../projets/index.php');
                break;
            case 'ajout-projet':
                include(__DIR__.'/../projets/ajouter-projet.php');
                break; 
            case 'modifier-projet':
                include(__DIR__.'/../projets/modifier-projet.php');
                break;
            
            default:
                include(__DIR__.'/../connexion/index.php');
                break;
        }
    } else {
        include(__DIR__.'/../connexion/index.php');
    }
}

function checkMailExist($email) {
    $exists = false;

    $sqlconnection = db_connect();

    $requete = "SELECT * from users where email=:mail";

    $preparationRequete = $sqlconnection->prepare($requete);

    $preparationRequete->execute(array("mail"=> $email));

    $data = $preparationRequete->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($data)){
        $exists = true;
    }

    return $exists;
}

function sign_up($last_name, $first_names, $email, $password) {
    $is_registered = false;

    $sqlconnection = db_connect();

    $requete = "INSERT INTO users (last_name, first_names, email, password) VALUES(:last_name, :first_names, :email, :password)";

    $preparationRequete = $sqlconnection->prepare($requete);

    $execution = $preparationRequete->execute(array(
        "last_name"=> $last_name,
        "first_names"=> $first_names,
        "email"=> $email,
        "password"=> sha1($password),
    ));

    if($execution) {
        $is_registered = true;
    }

    return $is_registered;
}

function sign_in($email, $password) {

    $connected = false;

    $sqlconnection = db_connect();

    $requete = "SELECT last_name, first_names, email from users where email=:mail AND password=:password";

    $preparationRequete = $sqlconnection->prepare($requete);

    $preparationRequete->execute(array(
        "mail"=> $email,
        "password"=> sha1($password),
    ));

    $data = $preparationRequete->fetch(PDO::FETCH_ASSOC);

    if (!empty($data)){
        $_SESSION['utilisateur_connecter'] = $data;
        $connected = true;
    }

    return $connected;
}

function is_connected() {
    return isset($_SESSION['utilisateur_connecter']) && !empty($_SESSION['utilisateur_connecter']);
}
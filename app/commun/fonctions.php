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
            case 'deconnexion':
                include(__DIR__.'/../connexion/deconnexion.php');
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
            case 'ajout-traitement':
                include(__DIR__.'/../projets/ajout-traitement.php');
                break; 
            case 'modifier-projet':
                include(__DIR__.'/../projets/modifier-projet.php');
                break;
            case 'modification-traitement':
                include(__DIR__.'/../projets/modification-traitement.php');
                break;
            default:
                include(__DIR__.'/../inscription/index.php');
                break;
        }
    } else {
        include(__DIR__.'/../inscription/index.php');
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

    $requete = "SELECT id, last_name, first_names, email from users where email=:mail AND password=:password";

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

function insert_project($name, $short_description, $description, $image, $user_id) {
    $sqlconnection = db_connect();

    $requete = "INSERT INTO projets (name, short_description, description, image, user_id) VALUES(:name, :short_description, :description, :image, :user_id)";

    $preparationRequete = $sqlconnection->prepare($requete);

    $execution = $preparationRequete->execute(array(
        "name"=> $name,
        "short_description"=> $short_description,
        "description"=> $description,
        "image"=> $image,
        "user_id"=> $user_id,
    ));

    return $execution;
}

function get_projects($user_id, $project_id=null) {
    $sqlconnection = db_connect();

    $data =[];

    $requete = "SELECT * FROM projets WHERE user_id=:user_id AND deleted_at IS NULL ORDER BY id DESC";
    
    if (!is_null($project_id)){
        $requete = "SELECT * FROM projets WHERE user_id=:user_id AND id=:project_id AND deleted_at IS NULL ORDER BY id DESC";
    }

    $preparationRequete = $sqlconnection->prepare($requete);

    if (!is_null($project_id)){
        $preparationRequete->execute(array(
            "user_id"=> $user_id,
            "project_id"=> $project_id,
        ));
    } else {
        $preparationRequete->execute(array(
            "user_id"=> $user_id,
        ));
    }

    $data = $preparationRequete->fetchAll(PDO::FETCH_ASSOC);

    return $data;
}

function update_project($project_id, $name, $short_description, $description, $image) {

    $sqlconnection = db_connect();

    $requete = "UPDATE projets SET name=:name, short_description=:short_description, description=:description, image=:image, updated_at=:updated_at WHERE id=:project_id";

    $preparationRequete = $sqlconnection->prepare($requete);

    $execution = $preparationRequete->execute(array(
        "project_id"=> $project_id,
        "name"=> $name,
        "short_description"=> $short_description,
        "description"=> $description,
        "image"=> $image,
        "updated_at" => date('Y/m/d H:i:s')
    ));

    return $execution;
}

function delete_project($project_id) {
    $sqlconnection = db_connect();

    $requete = "UPDATE projets SET deleted_at=". date('Y/m/d H:i:s') ." WHERE id=:project_id";

    $preparationRequete = $sqlconnection->prepare($requete);

    $execution = $preparationRequete->execute(array(
        "id"=> $project_id,
    ));

    return $execution;
}

function check_project($project_id, $user_id) {
    $exists = false;

    $sqlconnection = db_connect();

    $requete = "SELECT * from projets where id=:project_id and user_id=:user_id and deleted_at IS NULL";

    $preparationRequete = $sqlconnection->prepare($requete);

    $preparationRequete->execute(array(
        "project_id"=> $project_id,
        "user_id"=> $user_id,
    ));

    $data = $preparationRequete->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($data)){
        $exists = true;
    }

    return $exists;
}
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
            case 'inscription':
                include(__DIR__.'/../inscription/index.php');
                break;
            
            default:
                include(__DIR__.'/../connexion/index.php');
                break;
        }
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

function sign_up() {

}

function sign_in() {

}
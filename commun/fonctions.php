<?php

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
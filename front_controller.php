<?php
session_start();
include_once './lib/lib_db.php';
include_once './vendor/autoload.php';



@$action = $_REQUEST["action"];
$pageContenu = "_TEMPLATE.html.twig";
$parametres = [];

//Ajout utilisateur connecté dans $users
if ( isset($_SESSION["utilConnecte"]) ) {
    $parametres["utilConnecte"] = $_SESSION["utilConnecte"];
}

switch ($action) {
    case "login":
        $pageContenu = './login.html.twig';
        break;
    case "logout":
        session_destroy();
        header("Location: front_controller.php?action=liste_films");
        exit;
    case "login_post":
        $login = $_REQUEST["login"];
        $mdp = $_REQUEST["mdp"];
        if ($login == "admin" && $mdp == "admin") {
            $_SESSION["utilConnecte"] = $login;
            header("Location: front_controller.php?action=liste_films");
            exit;
        } else {
            $pageContenu = './login.html.twig';
        }
        break;
    case "liste_films":
        //$films : Récupère les films
        $parametres["films"] = lister();
        $pageContenu = './liste_films.html.twig';
        break;
    case "liste_series":
        $pageContenu = './liste_series.php';
        break;
    case "ajoute_films":
        $pageContenu = './ajoute_films.html.twig';
        break;
    case "ajoute_films_post":
        ajoutFilm( $_REQUEST["titre"] );
        header("Location: front_controller.php?action=liste_films");
        break;
    case "ajoute_series":
        break;
    case "supprime_films":
        supprimerFilm($_REQUEST["id"]);
        header("Location: front_controller.php?action=liste_films");
        break;
    case "supprime_series":
        break;
//
//    default:
//        echo "ERREUR : Action inconnue";
//        exit();
}


//    <!--Afficher la page-->
require_once './lib/lib_db.php';
require_once './vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('TWIG');
$twig = new Twig_Environment($loader);

//Rendu de la vue
echo $twig->load($pageContenu)->render( $parametres );

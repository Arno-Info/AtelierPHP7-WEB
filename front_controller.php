<?php

include_once './lib/lib_db.php';

session_start();
if (!isset($_SESSION["films"])) {
    $_SESSION["films"] = ["Dracula", "Kung fu panda", "Dora l'exploratice"];
}
//$films = ["Dracula", "Kung fu panda", "Dora l'exploratice"];
//static $series = ["Banshee", "Dexter", "Les Experts"];

@$action = $_REQUEST["action"];
$pageContenu = "";
switch ($action) {
    case "ajoute_films_post":
        ajoutFilm($titre);
        header("Location: front_controller.php?action=liste_films");
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
            $pageContenu = './login.php';
        }
        break;

    case "login":
        $pageContenu = './login.php';
        break;

    case "liste_films":
        //$films : Récupère les films
        $films=lister();
        $pageContenu = './liste_films.php';
        break;

    case "liste_series":
        $pageContenu = './liste_series.php';
        break;

    case "ajoute_films":
        ajoutFilm($titre);
        $pageContenu = './ajoute_films.php';
        break;

    case "ajoute_series":
        break;

    case "supprime_films":
        supprimerFilm($_REQUEST["id"]);
        header("Location: front_controller.php?action=liste_films");
        break;

    case "supprime_series":
        break;

    default:
        echo "ERREUR : Action inconnue";
        exit();
}


//    <!--Afficher la page-->
include './_HEADER.php';
include './_MENU.php';
include $pageContenu;
include './_FOOTER.php';

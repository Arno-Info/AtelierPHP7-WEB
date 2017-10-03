
    <?php
    static $films = ["Dracula", "Kung fu panda", "Dora l'exploratice"];
    static $series = ["Banshee", "Dexter", "Les Experts"];

    @$action = $_REQUEST["action"];
    $pageContenu = "";
    switch ($action) {
        case "liste_films":
            //$films : Récupère les films
            //renvoyer a la vue
            $pageContenu = './liste_films.php';
            break;
        case "liste_series":
            $pageContenu = './liste_series.php';
            break;
        case "ajoute_films":
            break;
        case "ajoute_series":
            break;
        case "supprime_films":
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
      
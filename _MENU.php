<div class="menu"><!--Menu commun a toutes mes pages-->
    <a href="front_controller.php?action=liste_films">FILMS</a>
    <a href="front_controller.php?action=liste_series">SERIES</a>
    <?php if (!isset ($_SESSION["utilConnecte"])) {  ?>
    <a href="front_controller.php?action=login">LOGIN</a>
    <?php } else { ?>
    <a href="front_controller.php?action=logout">Déconnexion</a>
    <?php } ?>
</div>
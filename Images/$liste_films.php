

<H1 align='center'>***  LISTE DES FILMS  ***</H1>

<?php if (isset($_SESSION["utilConnecte"])) { ?>
    <a href="front_controller_twig.php?action=ajoute_films"><BUTTON name="AJOUT">AJOUT D'UN FILM</BUTTON></a>
    <h4> Connecté en tant que :  
        <?php
        echo $_SESSION["utilConnecte"];
        ?>
    <?php } else { ?>

    <?php } ?>
    <table>
        <THEAD>
        <th>TITRES</th>        
        <th>ACTIONS</th>
        </THEAD>
        <TBODY>
            <?php
            foreach ($films as $films) {
                ?>  
                <tr>
                    <td><?php echo $films["titre"]; ?></td>
                    <td><a href="front_controller_twig.php?action=supprime_films&id"><BUTTON name="AJOUT">SUPPRIMER FILM</BUTTON></a></td>
                </tr>        
            </TBODY>
            <?php
        }
        ?>
        
    </table> 

<H1 align='center'>***  LISTE DES FILMS  ***</H1>
<br>
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
            <td><?php echo $films; ?></td>
            <td><a><BUTTON>SUPPRIMER</BUTTON></a></td>
        </tr>        
    </TBODY>
        <?php    
            }
        ?>
</table> 
            
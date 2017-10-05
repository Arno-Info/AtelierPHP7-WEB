<H1 align='center'>***  LISTE DES SERIES  ***</H1>

<br>
<table>
    <THEAD>
        <th>TITRES</th>        
        <th>ACTIONS</th>
    </THEAD>
    <TBODY>
        <?php
            foreach ($series as $series) {
        ?>  
        <tr>
            <td><?php echo $series; ?></td>
            <td><a><BUTTON>SUPPRIMER</BUTTON></a></td>
        </tr>        
    </TBODY>
        <?php    
            }
        ?>
</table> 
            
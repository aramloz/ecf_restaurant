<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Quai Antique</title>
    </head>
    <body>
        <button onclick="location.href='account_page.php'">Créer un compte</button><br>
        <?php
        session_start();

        // Check if the user is logged in
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            // User is logged in, display appropriate content
            echo 'Bienvenue, ' . $_SESSION['email'] . '<br>';
        } else {
            // User is not logged in, display appropriate content
            echo '<button onclick="location.href=\'login.html\'">S\'identifier</button><br>';
        }
        ?>
        
        <button onclick="location.href='reservation_page.php'">Réserver</button> 

        <table>
            <thead>
            <tr>
                <th>Jour de la semaine</th>
                <th>Ouvert</th>
                <th>Heure de début</th>
                <th>Heure de fin</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include 'horaire_retrieval.php';
            echo '<tr>';
                echo '<td>Lundi</td>';
                if ($lundi_etat == "checked"){
                    echo '<td>Ouvert</td>';
                    echo '<td>' . $lundi_debut . '</td>';
                    echo '<td>' . $lundi_fin . '</td>';
                }else{
                    echo '<td>Fermé</td>';
                    echo '<td></td>';
                    echo '<td></td>';
                }
            echo '</tr>';
            echo '<tr>';
                echo '<td>Mardi</td>';
                if ($mardi_etat == "checked"){
                    echo '<td>Ouvert</td>';
                    echo '<td>' . $mardi_debut . '</td>';
                    echo '<td>' . $mardi_fin . '</td>';
                }else{
                    echo '<td>Fermé</td>';
                    echo '<td></td>';
                    echo '<td></td>';
                }
            echo '</tr>';
            ?>
            </tr>
            </tbody>
        </table>
        

    </body>
</html>
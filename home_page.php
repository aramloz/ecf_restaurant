<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Quai Antique</title>
        <link rel="stylesheet" href="style.css">
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

        <button onclick="location.href='carte_page.php'">Carte</button>

        <h2 class="title">Quai Antique</h2>

        <div class="gallery">
            <?php
            include 'image_retrieval.php';

            $rowSize = 3;
            $imageCount = count($imageData);

            for ($i = 0; $i < $imageCount; $i++) {
                $image = $imageData[$i];
                $data = base64_encode($image['data']);
                $titre = $image['titre'];

                if ($i % $rowSize === 0) {
                    echo '<div class="image-row">';
                }

                echo '<div class="image-container">';
                echo '<img src="data:image/jpeg;base64,' . $data . '" alt="' . $titre . '">';
                echo '<div class="caption">' . $titre . '</div>';
                echo '</div>';

                if (($i + 1) % $rowSize === 0 || ($i + 1) === $imageCount) {
                    echo '</div>';
                }
            }
            ?>
        </div>

        <h3>Nos horaires d'ouverture</h3>
        <table>
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
            echo '<tr>';
                echo '<td>mercredi</td>';
                if ($mercredi_etat == "checked"){
                    echo '<td>Ouvert</td>';
                    echo '<td>' . $mercredi_debut . '</td>';
                    echo '<td>' . $mercredi_fin . '</td>';
                }else{
                    echo '<td>Fermé</td>';
                    echo '<td></td>';
                    echo '<td></td>';
                }
            echo '</tr>';
            echo '<tr>';
                echo '<td>jeudi</td>';
                if ($jeudi_etat == "checked"){
                    echo '<td>Ouvert</td>';
                    echo '<td>' . $jeudi_debut . '</td>';
                    echo '<td>' . $jeudi_fin . '</td>';
                }else{
                    echo '<td>Fermé</td>';
                    echo '<td></td>';
                    echo '<td></td>';
                }
            echo '</tr>';
            echo '<tr>';
                echo '<td>vendredi</td>';
                if ($vendredi_etat == "checked"){
                    echo '<td>Ouvert</td>';
                    echo '<td>' . $vendredi_debut . '</td>';
                    echo '<td>' . $vendredi_fin . '</td>';
                }else{
                    echo '<td>Fermé</td>';
                    echo '<td></td>';
                    echo '<td></td>';
                }
            echo '</tr>';
            echo '<tr>';
                echo '<td>samedi</td>';
                if ($samedi_etat == "checked"){
                    echo '<td>Ouvert</td>';
                    echo '<td>' . $samedi_debut . '</td>';
                    echo '<td>' . $samedi_fin . '</td>';
                }else{
                    echo '<td>Fermé</td>';
                    echo '<td></td>';
                    echo '<td></td>';
                }
            echo '</tr>';
            echo '<tr>';
                echo '<td>dimanche</td>';
                if ($dimanche_etat == "checked"){
                    echo '<td>Ouvert</td>';
                    echo '<td>' . $dimanche_debut . '</td>';
                    echo '<td>' . $dimanche_fin . '</td>';
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
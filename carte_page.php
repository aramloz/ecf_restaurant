<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Carte Quai Antique</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <?php

            // Connect to the MySQL database
            $servername = "localhost";
            $username = "root";
            $db_password = "";
            $dbname = "ecf_restaurant";

            $conn = new mysqli($servername, $username, $db_password, $dbname);
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            echo '<h2>Plats</h2> ';

            // Retrieve the categories from quai_antique_plat
            $sql = "SELECT DISTINCT plat_categorie FROM quai_antique_plat";
            $result = $conn->query($sql);

            while ($row = mysqli_fetch_assoc($result)) {
                $plat_categorie = $row['plat_categorie'];
                echo '<h3>' . $plat_categorie . '</h3>';

                $sql_categorie = "SELECT plat_titre, plat_description, plat_prix FROM quai_antique_plat WHERE plat_categorie = '$plat_categorie'";
                $result_categorie = $conn->query($sql_categorie);

                while ($row_categorie = mysqli_fetch_assoc($result_categorie)) {
                    echo '<div class="plats">';
                    echo '<b>' . $row_categorie['plat_titre'] . '</b><br>';
                    echo $row_categorie['plat_description'] . '<br>';
                    echo $row_categorie['plat_prix'] . '<br>';
                    echo '</div>';
                }
            }

            echo '<h2>Menus</h2> ';

            // Retrieve the categories from quai_antique_plat
            $sql = "SELECT * FROM quai_antique_menu";
            $result = $conn->query($sql);

            while ($row = mysqli_fetch_assoc($result)) {
                $menu_titre = $row['menu_titre'];
                echo '<h3>' . $menu_titre . '</h3>';

                $formule_sql = "SELECT * 
                                FROM quai_antique_formule qaf
                                JOIN quai_antique_menu_formule qamf ON qamf.formule_id = qaf.formule_id
                                WHERE qamf.menu_id =" . $row['menu_id'];

                $formule_result = mysqli_query($conn, $formule_sql);
                while ($formule_row = mysqli_fetch_assoc($formule_result)) {
                    echo '<div class="formules">';
                    echo '<b>' . $formule_row['formule_titre'] . '</b><br>';
                    echo $formule_row['formule_description'] . '<br>';
                    echo $formule_row['formule_prix'] . '<br>';
                    echo '</div>';
                }
            }

            // Close the database connection
            mysqli_close($conn);
       
        ?>
    </body>
</html>
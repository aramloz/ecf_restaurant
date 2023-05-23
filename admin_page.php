<!DOCTYPE html>
<html>
    <head>
        <title>Admin page</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <a href="home_page.php">Home page</a>

        <h2>Capacity</h2>
        <form action="capacity_change.php" method="post" class="form_centre">
            <label for="capacity">Capacity:</label>
            <input type="text" id="capacity" name="capacity" pattern="[0-9]*" required title="Please enter a valid number" value="<?php require 'capacity_retrieval.php'; ?>" required>
            <input type="submit" value="Change">
        </form>

        <h2>Horaire</h2>
        <?php include 'horaire_retrieval.php'; ?>
        <form action="horaire_change.php" method="post">
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
            <tr>
                <td>Lundi</td>
                <td><input type="checkbox" name="lundi_ouvert" <?php echo $lundi_etat; ?> onchange="toggleInputs('lundi')"></td>
                <td><input type="time" name="lundi_debut" value="<?php echo $lundi_debut; ?>" <?php echo $lundi_etat ? '' : 'disabled'; ?>></td>
                <td><input type="time" name="lundi_fin" value="<?php echo $lundi_fin; ?>" <?php echo $lundi_etat ? '' : 'disabled'; ?>></td>
            </tr>
            <tr>
                <td>Mardi</td>
                <td><input type="checkbox" name="mardi_ouvert" <?php echo $mardi_etat; ?> onchange="toggleInputs('mardi')"></td>
                <td><input type="time" name="mardi_debut" value="<?php echo $mardi_debut; ?>" <?php echo $mardi_etat ? '' : 'disabled'; ?>></td>
                <td><input type="time" name="mardi_fin" value="<?php echo $mardi_fin; ?>" <?php echo $mardi_etat ? '' : 'disabled'; ?>></td>
            </tr>
            <tr>
                <td>Mercredi</td>
                <td><input type="checkbox" name="mercredi_ouvert" <?php echo $mercredi_etat; ?> onchange="toggleInputs('mercredi')"></td>
                <td><input type="time" name="mercredi_debut" value="<?php echo $mercredi_debut; ?>" <?php echo $mercredi_etat ? '' : 'disabled'; ?>></td>
                <td><input type="time" name="mercredi_fin" value="<?php echo $mercredi_fin; ?>" <?php echo $mercredi_etat ? '' : 'disabled'; ?>></td>
            </tr>
            <tr>
                <td>Jeudi</td>
                <td><input type="checkbox" name="jeudi_ouvert" <?php echo $jeudi_etat; ?> onchange="toggleInputs('jeudi')"></td>
                <td><input type="time" name="jeudi_debut" value="<?php echo $jeudi_debut; ?>" <?php echo $jeudi_etat ? '' : 'disabled'; ?>></td>
                <td><input type="time" name="jeudi_fin" value="<?php echo $jeudi_fin; ?>" <?php echo $jeudi_etat ? '' : 'disabled'; ?>></td>
            </tr>
            <tr>
                <td>Vendredi</td>
                <td><input type="checkbox" name="vendredi_ouvert" <?php echo $vendredi_etat; ?> onchange="toggleInputs('vendredi')"></td>
                <td><input type="time" name="vendredi_debut" value="<?php echo $vendredi_debut; ?>" <?php echo $vendredi_etat ? '' : 'disabled'; ?>></td>
                <td><input type="time" name="vendredi_fin" value="<?php echo $vendredi_fin; ?>" <?php echo $vendredi_etat ? '' : 'disabled'; ?>></td>
            </tr>
            <tr>
                <td>Samedi</td>
                <td><input type="checkbox" name="samedi_ouvert" <?php echo $samedi_etat; ?> onchange="toggleInputs('samedi')"></td>
                <td><input type="time" name="samedi_debut" value="<?php echo $samedi_debut; ?>" <?php echo $samedi_etat ? '' : 'disabled'; ?>></td>
                <td><input type="time" name="samedi_fin" value="<?php echo $samedi_fin; ?>" <?php echo $samedi_etat ? '' : 'disabled'; ?>></td>
            </tr>
            <tr>
                <td>Dimanche</td>
                <td><input type="checkbox" name="dimanche_ouvert" <?php echo $dimanche_etat; ?> onchange="toggleInputs('dimanche')"></td>
                <td><input type="time" name="dimanche_debut" value="<?php echo $dimanche_debut; ?>" <?php echo $dimanche_etat ? '' : 'disabled'; ?>></td>
                <td><input type="time" name="dimanche_fin" value="<?php echo $dimanche_fin; ?>" <?php echo $dimanche_etat ? '' : 'disabled'; ?>></td>
            </tr>
            </tbody>
        </table>
        <div class="form_centre">
            <input type="submit" value="Change" class="form_centre">
        </div>
        </form>

        <!-- JavaScript to togge the start and end times of the horaire -->
        <script>
            function toggleInputs(day) {
                const ouvertCheckbox = document.getElementsByName(`${day}_ouvert`)[0];
                const debutInput = document.getElementsByName(`${day}_debut`)[0];
                const finInput = document.getElementsByName(`${day}_fin`)[0];

                if (ouvertCheckbox.checked) {
                    debutInput.disabled = false;
                    finInput.disabled = false;
                } else {
                    debutInput.disabled = true;
                    finInput.disabled = true;
                }
            }
        </script>

        <h2>Plats</h2>
        <?php
        // Connect to the database
        $conn = mysqli_connect('localhost', 'root', '', 'ecf_restaurant');

        // Retrieve the list of plats from the quai_antique_plat table
        $sql = "SELECT * FROM quai_antique_plat";
        $result = mysqli_query($conn, $sql);

        // Display the plats as a table

        echo '<table border="1">
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Catégorie</th>
                    <th>Actions</th>
                </tr>';

        // Loop through the plats and display them as table rows
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<form action="plat_update.php?id=' . $row['plat_id'] . '" method="POST">';
            echo '<tr>
                    <td><input type="text" name="titre" value="' . $row['plat_titre'] . '" readonly></td>
                    <td><input type="text" name="description" value="' . $row['plat_description'] . '" readonly></td>
                    <td><input type="text" name="prix" value="' . $row['plat_prix'] . ' €" readonly></td>
                    <td><input type="text" name="categorie" value="' . $row['plat_categorie'] . '" readonly></td>
                    <td>
                        <button class="edit" data-id="' . $row['plat_id'] . '" type="button">Edit</button>
                        <button class="delete" data-id="' . $row['plat_id'] . '" type="button"><a href="plat_delete.php?id=' . $row['plat_id'] . '">Delete</a></button>
                        <button class="update" data-id="' . $row['plat_id'] . '" type="submit" name="submit" disabled>Update</button>
                    </td>
                </tr>';
            echo '</form>';
        }

        // Add an empty row at the end of the table
        echo '<form action="plat_add.php" method="POST">';
        echo '<tr>
                <td><input type="text" name="titre" required></td>
                <td><input type="text" name="description" required></td>
                <td><input type="text" name="prix" pattern="[0-9]*" required></td>
                <td><input type="text" name="categorie" required></td>
                
                <td><button type="submit" name="submit">Add</button></td>
            </tr>';

        // Close the table
        echo '</form>';
        echo '</table>';


        // Close the database connection
        mysqli_close($conn);
        ?>

        <h2>Formules</h2>
        <?php
        // Connect to the database
        $conn = mysqli_connect('localhost', 'root', '', 'ecf_restaurant');

        // Retrieve the list of formules from the quai_antique_formule table
        $sql = "SELECT * FROM quai_antique_formule";
        $result = mysqli_query($conn, $sql);

        // Display the formules as a table
        echo '<table border="1">
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>';

        // Loop through the formules and display them as table rows
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<form action="formule_update.php?id=' . $row['formule_id'] . '" method="POST">';
            echo '<tr>
                    <td><input type="text" name="titre" value="' . $row['formule_titre'] . '" readonly></td>
                    <td><input type="text" name="description" value="' . $row['formule_description'] . '" readonly></td>
                    <td><input type="text" name="prix" value="' . $row['formule_prix'] . ' €" readonly></td>
                    <td>
                        <button class="edit" data-id="' . $row['formule_id'] . '" type="button">Edit</button>
                        <button class="delete" data-id="' . $row['formule_id'] . '" type="button"><a href="formule_delete.php?id=' . $row['formule_id'] . '">Delete</a></button>
                        <button class="update" data-id="' . $row['formule_id'] . '" type="submit" name="submit" disabled>Update</button>
                    </td>
                </tr>';
            echo '</form>';
        }

        // Add an empty row at the end of the table
        echo '<form action="formule_add.php" method="POST">';
        echo '<tr>
                <td><input type="text" name="titre" required></td>
                <td><input type="text" name="description" required></td>
                <td><input type="text" name="prix" pattern="[0-9]*" required></td>
                
                <td><button type="submit" name="submit">Add</button></td>
            </tr>';

        // Close the table
        echo '</form>';
        echo '</table>';

        // Close the database connection
        mysqli_close($conn);
        ?>

        <h2>Menus</h2>
        <?php
        // Connect to the database
        $conn = mysqli_connect('localhost', 'root', '', 'ecf_restaurant');

        // Retrieve the list of menus from the quai_antique_menu table
        $sql = "SELECT * FROM quai_antique_menu";
        $result = mysqli_query($conn, $sql);

        // Display the menus as a table
        echo '<table border="1">
                <tr>
                    <th>Titre</th>
                    <th>Formules</th>
                    <th>Actions</th>
                </tr>';

        $formule_sql = "SELECT formule_titre FROM quai_antique_formule";
        $formule_result = mysqli_query($conn, $formule_sql);

        // Loop through the menus and display them as table rows
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<form action="menu_update.php?id=' . $row['menu_id'] . '" method="POST">';
            echo '<tr>
                    <td><input type="text" name="titre" value="' . $row['menu_titre'] . '" readonly></td>
                    <td>
                        <select id="formules" name="formules[]" size="3" multiple disabled>';

                        $selected_formule_sql = "SELECT formule_titre 
                                                FROM quai_antique_formule qaf
                                                JOIN quai_antique_menu_formule qamf ON qamf.formule_id = qaf.formule_id
                                                WHERE qamf.menu_id =" . $row['menu_id'];
                        $selected_formule_result = mysqli_query($conn, $selected_formule_sql);

                        // Loop through all the formules and display them as options of the drop-down
                        mysqli_data_seek($formule_result, 0); // reset the pointer to the beginning of the result set
                        while ($formule_row = mysqli_fetch_assoc($formule_result)) {
                            $formule_titre = $formule_row['formule_titre'];
                            mysqli_data_seek($selected_formule_result, 0); // reset the pointer to the beginning of the result set
                            $found = false;
                            // Loop through the formules belonging to a menu to display them as selected in the drop-down
                            while ($selected_formule_row = mysqli_fetch_assoc($selected_formule_result)) {
                                if ($formule_titre == $selected_formule_row['formule_titre']) {
                                    $found = true;
                                    break;
                                }
                            }
                            if ($found) {
                                echo '<option value="' . $formule_titre . '" selected="selected">' . $formule_titre . '</option>';
                            } else {
                                echo '<option value="' . $formule_titre . '">' . $formule_titre . '</option>';
                            }
                        }
            echo '      </select>
                    </td>
                    <td>
                        <button class="edit" data-id="' . $row['menu_id'] . '" type="button">Edit</button>
                        <button class="delete" data-id="' . $row['menu_id'] . '" type="button"><a href="menu_delete.php?id=' . $row['menu_id'] . '">Delete</a></button>
                        <button class="update" data-id="' . $row['menu_id'] . '" type="submit" name="submit" disabled>Update</button>
                    </td>
                </tr>';
            echo '</form>';
        }

        // Add an empty row at the end of the table
        echo '<form action="menu_add.php" method="POST">';
        echo '<tr>
                <td><input type="text" name="titre" required></td>
                <td>
                    <select id="formules" name="formules[]" size="3" multiple>';
                    mysqli_data_seek($formule_result, 0); // reset the pointer to the beginning of the result set
                    while ($formule_row = mysqli_fetch_assoc($formule_result)) {
                        $formule_titre = $formule_row['formule_titre'];
                        echo '<option value="' . $formule_titre . '">' . $formule_titre . '</option>';
                    }
        echo '      </select>
                </td>
                <td><button type="submit" name="submit">Add</button></td>
            </tr>';

        // Close the table
        echo '</form>';
        echo '</table>';

        // Close the database connection
        mysqli_close($conn);
        ?>

        <h2>Galerie</h2>
        <?php
        // Connect to the database
        $conn = mysqli_connect('localhost', 'root', '', 'ecf_restaurant');

        // Retrieve the images from the quai_antique_image table
        $sql = "SELECT * FROM quai_antique_image";
        $result = mysqli_query($conn, $sql);

        // Display the menus as a table
        echo '<table border="1">
                <tr>
                    <th>Images</th>
                    <th>Titres</th>
                    <th>Actions</th>
                </tr>';

        $formule_sql = "SELECT formule_titre FROM quai_antique_formule";
        $formule_result = mysqli_query($conn, $formule_sql);

        // Loop through the menus and display them as table rows
        while ($row = mysqli_fetch_assoc($result)) {
            $image_id = $row['image_id'];
            $image_titre = $row['image_titre'];
            $image_data = base64_encode($row['image_binaire']);

            echo '<form action="image_update.php?id=' . $row['image_id'] . '" method="POST">';
            echo '<tr>
                    <td><div><img src="data:image/jpeg;base64,' . $image_data . '" alt="' . $image_titre . '"></div></td>
                    <td><input type="text" name="titre" value="' . $image_titre . '" readonly></td>
                    <td>
                        <button class="edit" data-id="' . $image_id . '" type="button">Edit</button>
                        <button class="delete" data-id="' . $image_id . '" type="button"><a href="image_delete.php?id=' . $image_id . '">Delete</a></button>
                        <button class="update" data-id="' . $image_id . '" type="submit" name="submit" disabled>Update</button>
                    </td>
                </tr>';
            echo '</form>';
        }
        echo '</table>';
        echo '<form action="image_add.php" method="POST" enctype="multipart/form-data">';
        echo 'Choisir une ou plusieurs photos à ajouter: <input type="file" name="photo[]" multiple><br>';
        echo '<input type="submit" value="Upload Photo">';
        echo '</form>';

        // Close the database connection
        mysqli_close($conn);
        ?>

        <!-- JavaScript to handle all the Edit buttons -->
        <script>
            const editButtons = document.querySelectorAll('.edit');
            editButtons.forEach((button) => {
                button.addEventListener('click', (event) => {
                    const row = event.target.closest('tr');
                    const inputFields = row.querySelectorAll('input');
                    const selectFields = row.querySelectorAll('select');
                    const updateButton = row.querySelector('.update');
                    inputFields.forEach((inputField) => {
                        inputField.removeAttribute('readonly');
                    });
                    selectFields.forEach((selectField) => {
                        selectField.removeAttribute('disabled');
                    });
                    updateButton.removeAttribute('disabled');
                });
            });
        </script>
    </body>
</html>
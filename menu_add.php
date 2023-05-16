<?php

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'ecf_restaurant');

// Check if the form has been submitted
if(isset($_POST['submit'])) {
    // Get the values from the form
    $titre = $_POST['titre'];
    $selected_formules = $_POST['formules']; // contains an array of selected formule values

    // First insert the titre into the quai_antique_menu table
    $sql = "INSERT INTO quai_antique_menu (menu_titre) 
            VALUES ('$titre')";
    mysqli_query($conn, $sql);


    // Second for each formule selected, add an entry in quai_antique_menu_formule
    foreach ($selected_formules as $formule) {
        $sql = "INSERT INTO quai_antique_menu_formule (menu_id, formule_id)
                VALUES (
                    (SELECT menu_id FROM quai_antique_menu WHERE menu_titre = '$titre'),
                    (SELECT formule_id FROM quai_antique_formule WHERE formule_titre = '$formule')
                )";
        mysqli_query($conn, $sql);
    }

    //Redirect back to the original page
    header("Location: admin_page.php");
    exit();
}

?>
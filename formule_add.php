<?php

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'ecf_restaurant');

// Check if the form has been submitted
if(isset($_POST['submit'])) {
    // Get the values from the form
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];

    // Insert the values into the quai_antique_formule table
    $sql = "INSERT INTO quai_antique_formule (formule_titre, formule_description, formule_prix) 
            VALUES ('$titre', '$description', '$prix')";
    mysqli_query($conn, $sql);

    //Redirect back to the original page
    header("Location: admin_page.php");
    exit();
}

?>
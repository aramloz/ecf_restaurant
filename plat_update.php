<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'ecf_restaurant');

// Check if the update button is clicked
if (isset($_GET['id']) && isset($_POST['submit'])) {
    // Get the ID of the plat to be updated
    $id = $_GET['id'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $categorie = $_POST['categorie'];

    // Update the plat in the quai_antique_plat table
    $sql = "UPDATE quai_antique_plat SET plat_titre = '$titre', plat_description = '$description' , plat_prix = '$prix', plat_categorie = '$categorie' WHERE plat_id = '$id'";
    mysqli_query($conn, $sql);
    
    echo $sql;

    // Close the database connection
    mysqli_close($conn);
    
    // Redirect back to the admin_page.php page
    header('Location: admin_page.php');
    exit();
} else {
    // If the ID is not set, redirect back to the admin_page.php page
    header('Location: admin_page.php');
    exit();
}
?>

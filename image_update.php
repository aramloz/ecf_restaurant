<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'ecf_restaurant');

// Check if the update button is clicked
if (isset($_GET['id']) && isset($_POST['submit'])) {
    // Get the ID of the image to be updated
    $id = $_GET['id'];
    $titre = $_POST['titre'];

    // Update the image in the quai_antique_image table
    $sql = "UPDATE quai_antique_image SET image_titre = '$titre' WHERE image_id = '$id'";
    mysqli_query($conn, $sql);

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
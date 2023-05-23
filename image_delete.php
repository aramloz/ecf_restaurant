<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'ecf_restaurant');

// Check if the delete button is clicked
if (isset($_GET['id'])) {
    // Get the ID of the image to be deleted
    $id = $_GET['id'];
    
    // Delete the image from the quai_antique_image table
    $sql = "DELETE FROM quai_antique_image WHERE image_id = '$id'";
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

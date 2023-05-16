<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'ecf_restaurant');

// Check if the delete button is clicked
if (isset($_GET['id'])) {
    // Get the ID of the menu to be deleted
    $id = $_GET['id'];

    // Delete the menu from the quai_antique_menu_formule table
    $sql = "DELETE FROM quai_antique_menu_formule WHERE menu_id = '$id'";
    mysqli_query($conn, $sql);
    
    // Delete the menu from the quai_antique_menu table
    $sql = "DELETE FROM quai_antique_menu WHERE menu_id = '$id'";
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

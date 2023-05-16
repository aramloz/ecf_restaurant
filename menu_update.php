<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'ecf_restaurant');

// Check if the update button is clicked
if (isset($_GET['id']) && isset($_POST['submit'])) {
    // Get the ID of the formule to be updated
    $id = $_GET['id'];
    $titre = $_POST['titre'];
    $selected_formules = $_POST['formules']; // contains an array of selected formule values

    // Delete all the elements belonging to the updated menu in quai_antique_menu_formule
    $sql = "DELETE FROM quai_antique_menu_formule WHERE menu_id = '$id'";
    mysqli_query($conn, $sql);

    // For each formule selected, add an entry in quai_antique_menu_formule
    foreach ($selected_formules as $formule) {
        $sql = "INSERT INTO quai_antique_menu_formule (menu_id, formule_id)
                SELECT '$id', formule_id 
                FROM quai_antique_formule 
                WHERE formule_titre = '$formule'";
        mysqli_query($conn, $sql);
    }

    // Update the menu in the quai_antique_menu table
    $sql = "UPDATE quai_antique_menu SET menu_titre = '$titre' WHERE menu_id = '$id'";
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

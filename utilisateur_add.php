<?php

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'ecf_restaurant');

// Check if the form has been submitted
if(isset($_POST['submit'])) {
    // Get the values from the form
    $email = $_POST['email'];
    $password = $_POST['password'];
    $numPeople = $_POST['num_people'];
    $comments = $_POST['comments'];

    // Insert the values into the quai_antique_plat table
    $sql = "INSERT INTO quai_antique_utilisateur (utilisateur_email, utilisateur_admin, utilisateur_mdp, utilisateur_nombre, utilisateur_allergie) 
            VALUES ('$email', '0', '$password', '$numPeople', '$comments')";
    mysqli_query($conn, $sql);

    //Redirect back to the original page
    header("Location: home_page.php");
    exit();
}

?>
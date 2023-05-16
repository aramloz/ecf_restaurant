<?php

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'ecf_restaurant');

// Get nombre from the quai_antique_utilisateur table
$sql = "SELECT utilisateur_nombre, utilisateur_allergie FROM quai_antique_utilisateur WHERE utilisateur_email='" . $_SESSION['email'] . "'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $nombre = $row['utilisateur_nombre'];
    $allergie = $row['utilisateur_allergie'];
}

?>
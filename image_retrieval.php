<?php

// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$db_password = "";
$dbname = "ecf_restaurant";

$conn = new mysqli($servername, $username, $db_password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve the data for Monday from the horaire table
$sql = "SELECT image_binaire, image_titre FROM quai_antique_image";
$result = $conn->query($sql);

while ($row = mysqli_fetch_assoc($result)) {
    $image_titre = $row['image_titre'];
    $image_data = $row['image_binaire'];

    $imageData[] = array(
        'data' => $image_data,
        'titre' => $image_titre
    );
}

// Close the database connection
mysqli_close($conn);
?>

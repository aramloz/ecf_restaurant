<?php
// Connect to the MySQL database
$host = 'localhost';
$username = 'root';
$db_password = '';
$database = 'ecf_restaurant';
//$port = 3306;
$mysqli = new mysqli($host, $username, $db_password, $database/*, $port*/);

// Check if the connection was successful
if ($mysqli->connect_error) {
  die('Error connecting to MySQL: ' . $mysqli->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the new capacity value from the form
  $new_capacity = $_POST["capacity"];

  // Update the database with the new capacity value
  $sql = "UPDATE quai_antique_capacite SET capacite_max='$new_capacity'";
  if ($mysqli->query($sql) === TRUE) {
    // Redirect to the admin page
    header('Location: admin_page.php');
    exit();
  } else {
    echo "Error updating record: " . $mysqli->error;
  }
}
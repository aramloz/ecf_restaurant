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

// Retrieve the value of capacite_max
$stmt = $mysqli->prepare('SELECT capacite_max FROM quai_antique_capacite');
$stmt->execute();
$stmt->bind_result($capacite_max);
$stmt->fetch();

// Close the database connection
$stmt->close();
$mysqli->close();

// Output the value of capacite_max
echo htmlspecialchars($capacite_max);
?>
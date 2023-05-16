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
$sql = "SELECT horaire_debut, horaire_fin, horaire_etat FROM quai_antique_horaire WHERE horaire_jour='lundi'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data for Monday
  $row = $result->fetch_assoc();
  $lundi_debut = $row["horaire_debut"];
  $lundi_fin = $row["horaire_fin"];
  $lundi_etat = "";
  if ($row["horaire_etat"] == 1) {
    $lundi_etat = "checked";
  }
} else {
  // No data found for Monday
  $lundi_debut = "";
  $lundi_fin = "";
  $lundi_etat = "";
}

// Retrieve the data for Monday from the horaire table
$sql = "SELECT horaire_debut, horaire_fin, horaire_etat FROM quai_antique_horaire WHERE horaire_jour='mardi'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data for Monday
  $row = $result->fetch_assoc();
  $mardi_debut = $row["horaire_debut"];
  $mardi_fin = $row["horaire_fin"];
  $mardi_etat = "";
  if ($row["horaire_etat"] == 1) {
    $mardi_etat = "checked";
  }
} else {
  // No data found for Monday
  $mardi_debut = "";
  $mardi_fin = "";
  $mardi_etat = "";
}

// Retrieve the data for Monday from the horaire table
$sql = "SELECT horaire_debut, horaire_fin, horaire_etat FROM quai_antique_horaire WHERE horaire_jour='mercredi'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data for Monday
  $row = $result->fetch_assoc();
  $mercredi_debut = $row["horaire_debut"];
  $mercredi_fin = $row["horaire_fin"];
  $mercredi_etat = "";
  if ($row["horaire_etat"] == 1) {
    $mercredi_etat = "checked";
  }
} else {
  // No data found for Monday
  $mercredi_debut = "";
  $mercredi_fin = "";
  $mercredi_etat = "";
}

// Retrieve the data for Monday from the horaire table
$sql = "SELECT horaire_debut, horaire_fin, horaire_etat FROM quai_antique_horaire WHERE horaire_jour='jeudi'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data for Monday
  $row = $result->fetch_assoc();
  $jeudi_debut = $row["horaire_debut"];
  $jeudi_fin = $row["horaire_fin"];
  $jeudi_etat = "";
  if ($row["horaire_etat"] == 1) {
    $jeudi_etat = "checked";
  }
} else {
  // No data found for Monday
  $jeudi_debut = "";
  $jeudi_fin = "";
  $jeudi_etat = "";
}

// Retrieve the data for Monday from the horaire table
$sql = "SELECT horaire_debut, horaire_fin, horaire_etat FROM quai_antique_horaire WHERE horaire_jour='vendredi'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data for Monday
  $row = $result->fetch_assoc();
  $vendredi_debut = $row["horaire_debut"];
  $vendredi_fin = $row["horaire_fin"];
  $vendredi_etat = "";
  if ($row["horaire_etat"] == 1) {
    $vendredi_etat = "checked";
  }
} else {
  // No data found for Monday
  $vendredi_debut = "";
  $vendredi_fin = "";
  $vendredi_etat = "";
}

// Retrieve the data for Monday from the horaire table
$sql = "SELECT horaire_debut, horaire_fin, horaire_etat FROM quai_antique_horaire WHERE horaire_jour='samedi'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data for Monday
  $row = $result->fetch_assoc();
  $samedi_debut = $row["horaire_debut"];
  $samedi_fin = $row["horaire_fin"];
  $samedi_etat = "";
  if ($row["horaire_etat"] == 1) {
    $samedi_etat = "checked";
  }
} else {
  // No data found for Monday
  $samedi_debut = "";
  $samedi_fin = "";
  $samedi_etat = "";
}

// Retrieve the data for Monday from the horaire table
$sql = "SELECT horaire_debut, horaire_fin, horaire_etat FROM quai_antique_horaire WHERE horaire_jour='dimanche'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data for Monday
  $row = $result->fetch_assoc();
  $dimanche_debut = $row["horaire_debut"];
  $dimanche_fin = $row["horaire_fin"];
  $dimanche_etat = "";
  if ($row["horaire_etat"] == 1) {
    $dimanche_etat = "checked";
  }
} else {
  // No data found for Monday
  $dimanche_debut = "";
  $dimanche_fin = "";
  $dimanche_etat = "";
}

// Close the database connection
$conn->close();
?>
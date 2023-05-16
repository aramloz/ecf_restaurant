<?php
// Connect to the MySQL database
$host = 'localhost';
$username = 'root';
$db_password = '';
$database = 'ecf_restaurant';
$mysqli = new mysqli($host, $username, $db_password, $database);

// Check if the connection was successful
if ($mysqli->connect_error) {
  die('Error connecting to MySQL: ' . $mysqli->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the new horaire
  $jour = array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche");
  $success = true;

  foreach ($jour as $j) {
    $etat = isset($_POST[$j.'_ouvert']) ? 1 : 0;
    if ($etat == 1){
        $debut = $_POST[$j.'_debut'];
        $fin = $_POST[$j.'_fin'];
    } else {
        $debut = NULL;
        $fin = NULL;
    }

    $sql = "UPDATE quai_antique_horaire SET horaire_etat=$etat, horaire_debut='$debut', horaire_fin='$fin' WHERE horaire_jour='$j'";

    if (!mysqli_query($mysqli, $sql)) {
      $success = false;
      echo "Error updating record: " . mysqli_error($mysqli);
    }
  }
  
  if ($success)
  {
    // Redirect to the admin page
    header('Location: admin_page.php');
    exit();
  }




/*   $lundi_new_etat = isset($_POST['lundi_etat']) ? 1 : 0;
  $lundi_new_debut = $_POST['lundi_debut'];
  $lundi_new_fin = $_POST['lundi_fin'];

  $mardi_new_etat = isset($_POST['lundi_etat']) ? 1 : 0;
  $mardi_new_debut = $_POST['mardi_debut'];
  $mardi_new_fin = $_POST['mardi_fin'];

  $mercredi_new_etat = isset($_POST['lundi_etat']) ? 1 : 0;
  $mercredi_new_debut = $_POST['mercredi_debut'];
  $mercredi_new_fin = $_POST['mercredi_fin'];

  $jeudi_new_etat = isset($_POST['lundi_etat']) ? 1 : 0;
  $jeudi_new_debut = $_POST['jeudi_debut'];
  $jeudi_new_fin = $_POST['jeudi_fin'];

  $vendredi_new_etat = isset($_POST['lundi_etat']) ? 1 : 0;
  $vendredi_new_debut = $_POST['vendredi_debut'];
  $vendredi_new_fin = $_POST['vendredi_fin'];

  $samedi_new_etat = isset($_POST['lundi_etat']) ? 1 : 0;
  $samedi_new_debut = $_POST['samedi_debut'];
  $samedi_new_fin = $_POST['samedi_fin'];

  $dimanche_new_etat = isset($_POST['lundi_etat']) ? 1 : 0;
  $dimanche_new_debut = $_POST['dimanche_debut'];
  $dimanche_new_fin = $_POST['dimanche_fin']; */


  // Close database connection
  mysqli_close($mysqli);
}
?>
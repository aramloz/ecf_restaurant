<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'ecf_restaurant');

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit;
}

ob_start(); // Start output buffering

// Include the source file
include 'capacity_retrieval.php';

// Capture the output in a variable
$capacity = ob_get_clean();

// Get the selected day of the week
$dayOfWeek = $_GET['dayOfWeek'];
$date = $_GET['date'];
$reservationNombre = $_GET['nombre'];

// Prepare the SQL query to fetch the opening hours based on the selected day of the week
$sql = "SELECT horaire_debut, horaire_fin, horaire_etat FROM quai_antique_horaire WHERE horaire_jour = '$dayOfWeek'";

// Execute the query
$result = mysqli_query($conn, $sql);

// Fetch the opening hours from the result set
$openingHoursAvailability = array();
while ($row = mysqli_fetch_assoc($result)) {
    $start = $row['horaire_debut'];
    $end = $row['horaire_fin'];
    $etat = $row['horaire_etat'];

    if ($etat) {
        // Generate time slots for every fifteen minutes until half an hour before closing time
        $openingHours = array();
        $availability = array();
        $currentTime = date('H:i', strtotime($start));
        while ($currentTime < date('H:i', strtotime($end) - 45*60)) {
            $openingHours[] = $currentTime;

            // Get the total number of reservations at given date and time
            $reservationSQL = "SELECT reservation_nombre FROM quai_antique_reservation WHERE reservation_date = '$date' AND reservation_time='$currentTime'";
            $reservationResult = mysqli_query($conn, $reservationSQL);
            $reservation_total = $reservationNombre;
            while ($reservationRow = mysqli_fetch_assoc($reservationResult)) {
                $nombre = $reservationRow['reservation_nombre'];
                $reservation_total = $reservation_total + $nombre;
            }

            if ($reservation_total >= $capacity) {
                $availability[] = 0;
            } else {
                $availability[] = 1;
            }

            $time = strtotime($currentTime);
            $time = strtotime('+15 minutes', $time);
            $currentTime = date('H:i', $time);
        }

        $openingHoursAvailability[] = array(
            'openingHours' => $openingHours,
            'availability' => $availability
        );
    }
}

// Close the database connection
mysqli_close($conn);

// Return the opening hours as JSON
header('Content-Type: application/json');
echo json_encode($openingHoursAvailability);
?>

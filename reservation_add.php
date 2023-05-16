<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'ecf_restaurant');

// Check if the form has been submitted
if(isset($_POST['submit'])) {
    // Retrieve the form inputs
    $email = $_POST['email'];
    $numPeople = $_POST['num_people'];
    $reservationDate = $_POST['reservation_date'];
    $selectedTime = $_POST['selected_time'];
    $comments = $_POST['comments'];

    // Insert the values into the quai_antique_plat table
    $sql = "INSERT INTO quai_antique_reservation (reservation_email, reservation_nombre, reservation_date, reservation_time, reservation_commentaire) 
    VALUES ('$email', '$numPeople', '$reservationDate', '$selectedTime', '$comments')";
    
    mysqli_query($conn, $sql);

    //Redirect back to the original page
    header("Location: home_page.php");
    exit();
}
?>

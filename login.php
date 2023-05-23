<?php
// Start the session
session_start();

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the email and password from the form
  $email = $_POST['email'];
  $password = $_POST['password'];

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

  // Prepare a statement to check the user's credentials
  $stmt = $mysqli->prepare('SELECT utilisateur_email, utilisateur_mdp, utilisateur_admin FROM ecf_restaurant.quai_antique_utilisateur WHERE utilisateur_email = ?');
  $stmt->bind_param('s', $email);
  $stmt->execute();
  $result = $stmt->get_result();

  // Check if the user exists and the password is correct
  if ($row = $result->fetch_assoc()) {
    if ($password == $row['utilisateur_mdp']) {
      // Store the email in the session
      $_SESSION['loggedin'] = true;
      $_SESSION['email'] = $email;

      $admin = $row['utilisateur_admin'];

      if ($admin){
        // Redirect to the admin page
        header('Location: admin_page.php');
        exit();
      } else{
        // Redirect to the admin page
        header('Location: home_page.php');
        exit();
      }

    } else {
      // Display an error message
      $error = 'Invalid email or password.';
    }
  } else {
    // Display an error message
    $error = 'Invalid email or password.';
  }

  // Close the database connection
  $mysqli->close();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php if (isset($error)): ?>
      <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post" action="login.php">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      <br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <br>
      <button type="submit">Login</button>
    </form>
  </body>
</html>

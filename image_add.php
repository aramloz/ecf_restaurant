<?php

// Check if the form has been submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_FILES["photo"]) && is_array($_FILES["photo"]["error"])) {

        // Create a new database connection
        $conn = mysqli_connect('localhost', 'root', '', 'ecf_restaurant');

        // Check the database connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Iterate over each uploaded file
        foreach ($_FILES["photo"]["error"] as $key => $error) {
            // Check if the upload was successful
            if ($error == UPLOAD_ERR_OK) {
                // Get the uploaded file details
                $file_name = $_FILES["photo"]["name"][$key];
                $file_tmp = $_FILES["photo"]["tmp_name"][$key];

                // Read the file content
                $file_content = file_get_contents($file_tmp);

                // Prepare the SQL statement
                $stmt = mysqli_prepare($conn, "INSERT INTO quai_antique_image (image_binaire, image_titre) VALUES (?, ?)");
                mysqli_stmt_bind_param($stmt, "ss", $file_content, $file_name);

                // Execute the prepared statement
                mysqli_stmt_execute($stmt);

                // Close the statement and the database connection
                mysqli_stmt_close($stmt);
            }
        }

        mysqli_close($conn);
    }

    //Redirect back to the original page
    header("Location: admin_page.php");
    exit();
}

?>
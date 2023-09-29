<?php
// Establish a database connection
$con = mysqli_connect("localhost", "", "", "");

// Check if the connection is successful
if ($con) {
    // Check if the 'image' parameter is not empty in the POST request
    if (!empty($_POST['image'])) {
        // Generate a unique path for the image using the current date, time, and a random number
        $path = 'images/' . date("d-m-y") . '-' . time() . '-' . rand(10000, 100000) . '.jpg';

        // Attempt to save the image file to the specified path
        if (file_put_contents($path, base64_decode($_POST['image']))) {
            // If the image file is successfully saved, construct an SQL query to insert the path into the 'images' table
            $sql = "INSERT INTO images (path) VALUES ('" . $path . "')";

            // Execute the SQL query
            if (mysqli_query($con, $sql)) {
                echo 'Image uploaded successfully';
            } else {
                echo 'Failed to insert into the database';
            }
        } else {
            echo 'Failed to upload image';
        }
    } else {
        echo 'No image found';
    }
} else {
    echo "Database connection failed";
}
?>

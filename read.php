<?php
// Set the response header to indicate that the response will be JSON
header('Content-Type: application/json; charset=utf-8');

// Establish a database connection
$con = mysqli_connect("localhost", "tolrgojs_admin_users", "@7K!8YpWiwT86v", "tolrgojs_admin_users");

// Construct an SQL query to retrieve data from the 'images' table, ordering the results by id in descending order
$sql = "SELECT * FROM images ORDER BY id DESC";

// Execute the SQL query
$result = mysqli_query($con, $sql);

// Create an empty array to store the retrieved data
$data = array();

// Iterate over each row in the query result
foreach ($result as $item) {
    // Extract the 'id' and 'path' values from the current row
    $id = $item['id'];
    $path = $item['path'];

    // Create an associative array to represent the user information
    $userInfo['id'] = $id;
    $userInfo['path'] = $path;

    // Add the user information to the data array
    array_push($data, $userInfo);
}

// Encode the data array as JSON and echo it as the response
echo json_encode($data);
?>

<?php
// Database connection credentials
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'guna';

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection and code here...


// Establish the connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data and sanitize it
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobilenumber=mysqli_real_escape_string($conn,$_POST['mobilenumber']);

    // Insert query to store form data into the database
    $sql = "INSERT INTO users (name, email, mobilenumber) VALUES ('$name', '$email','$mobilenumber')";

    // Execute the query and check for success
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>

<?php
// Database connection parameters
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'project');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $email = $_POST["email"];
    $password = $_POST["pass"];
    $full_name = $_POST["fname"];
    $age = $_POST["age"];
    $phone = $_POST["phone"];
    $city = $_POST["gov"];
    $passwordHash = "";

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the feedback table
    $sql = "INSERT INTO examers (email, pass, fullName, age, phone, city ) 
            VALUES ('$email', '$passwordHash', '$full_name', '$age', '$phone', '$city')";

if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

}

// Close the database connection
$link->close();
?>
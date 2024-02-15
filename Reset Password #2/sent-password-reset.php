<?php

$email = $_POST["email"];

$token = bin2hex(random_bytes(16));

$token_hash = hash("sha256", $token);

$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

// Database connection parameters
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'project');

// Attempt to connect to MySQL database
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE examers
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE email = ?";

$stmt = $link->prepare($sql);

if ($stmt === false) {
    die("Error in prepare statement: " . $link->error);
}

$stmt->bind_param("sss", $token_hash, $expiry, $email);

if ($stmt->execute() === false) {
    die("Error in execute statement: " . $stmt->error);
}

echo "Password reset token has been sent.";

$stmt->close();
$link->close();
?>

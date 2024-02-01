<html>

<head>

<title>Sign Up | Gammal Tech</title>

<link rel="stylesheet" href="style.css" />

<!--Boxicons CSS-->

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

<!--Sign Up Page-->

<div class = wrapper>


<form action="registeration.php" method="post">
    <h1>Signup</h1>
    <div class="input-box">
        <input type="text" name="email" placeholder="Email" required>
    </div>
    <div class="input-box">
        <input type="password" name="password" placeholder="Password" required>
    </div>
    <div class="input-box">
        <input type="password" name="confirmpassword" placeholder="Confirm Password" required>
    </div>
        <button type="submit" class="btn">Submit</button><br><br>

</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $confirmpassword = isset($_POST["confirmpassword"]) ? $_POST["confirmpassword"] : "";

    $errors = array();

    if (empty($email) || empty($password) || empty($confirmpassword)) {
        array_push($errors, "All fields are required");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
    }
    if (strlen($password) < 8) {
        array_push($errors, "Password must be at least 8 characters long");
    }
    if ($password !== $confirmpassword) {
        array_push($errors, "Password does not match");
    }

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        // Here you can insert the data into the database or perform other actions.
        // You need to establish a database connection and execute an SQL query to insert data.
        // Example:
        // $conn = new mysqli("localhost", "username", "password", "database_name");
        // $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
        // if ($conn->query($sql) === TRUE) {
        //     echo "<div class='alert alert-success'>Registration successful</div>";
        // } else {
        //     echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
        // }
        // $conn->close();
    }
}
?>
<div class="line"></div>

<div class="media-options1">

<a href="#" class="field facebook"></a>

<i class='bx bxl-facebook-circle facebook-icon' ></i>

<span>&nbsp;Login with Facebook</span>

</div>

<div class="media-options2">

<a href="#" class="field google"></a>

<img src="google.png" alt="" class="google-img">

<span>&nbsp;Login with Google</span>

</div>

</div>

</body>

</html>
<?php
include 'db_connect.php';
session_start();

// Create connection
$conn = new mysqli($servername, $user, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure form submission is via POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo "Invalid request method.";
    exit;
}

// Retrieve and sanitize form data
$lastname = $conn->real_escape_string($_POST['lastname']);
$firstname = $conn->real_escape_string($_POST['firstname']);
$email = $conn->real_escape_string($_POST['email']);
$dob = $conn->real_escape_string($_POST['dob']);
$psw = $_POST['psw'];
$repeat = $_POST['psw-repeat'];

// Validate passwords match
if ($psw !== $repeat) {
    echo "Passwords do not match. Please go back and try again.";
    exit;
}

// Hash the password for security
$hashed_password = password_hash($psw, PASSWORD_DEFAULT);

// Prepare and execute SQL statement
$stmt = $conn->prepare("INSERT INTO users (lastname, firstname, email, dob, psw) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $lastname, $firstname, $email, $dob, $hashed_password);

if ($stmt->execute()) {
    // Redirect to homepage.php after successful signup
    header("Location: homepage.php");
    exit; // Ensure no further code is executed
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="signup_style.css">
    <title>Sign Up Page</title>
</head>
<body>
    <h1>LAKANDULA</h1>
    <form action="signup.php" method="POST">
        <div class="container">
            <h2>SIGN UP</h2>
            <hr>
            
            <label for="lastname"><b>Last Name</b></label>
            <input type="text" placeholder="Enter Last Name" name="lastname" id="lastname" required>

            <label for="firstname"><b>First Name</b></label>
            <input type="text" placeholder="Enter First Name" name="firstname" id="firstname" required>

            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter your email" name="email" id="email" required>

            <label for="dob"><b>Date of Birth</b></label>
            <input type="date" name="dob" id="dob" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter your password" name="psw" id="psw" required>

            <label for="repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat your password" name="repeat" id="repeat" required>

            <hr>
            <button type="submit" class="registerbtn">SIGN UP</button>
        </div>
        <div class="container signin">
            <p>Already have an account? <a href="#">Sign in</a>.</p>
        </div>
    </form>
</body>
</html>

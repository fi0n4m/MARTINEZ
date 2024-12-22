<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = 'localhost';
$user = 'root';
$password = '';
$dbname = 'lakandula';
$port = '3306';

$conn = new mysqli($servername, $user, $password, $dbname, $port);

if ($conn->connect_error) {
    echo "Connection failed with the following details:";
    echo "<br>Server Name: $servername";
    echo "<br>User: $user";
    echo "<br>Database: $dbname";
    echo "<br>Port: $port";
    die("<br>Error: " . $conn->connect_error);
} else {
    echo "Connected successfully!";
}
?>

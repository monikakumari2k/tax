<?php

$host = 'localhost';
$db = 'tax_regime';
$user = 'root';
$password = '';


$mysqli = new mysqli($host, $user, $password, $db);
session_start();

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


$username = $_POST['username'];
$password = $_POST['password'];




$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $row['username'];
    $_SESSION['userPNO'] = $row['PNO'];
    $_SESSION['userlevel'] = $row['level'];
    header("Location: welcome.php");
} else {
   
    echo "Invalid username or password";
}

$mysqli->close();
?>

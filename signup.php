<?php

$host = 'localhost';
$db = 'tax_regime';
$user = 'root';
$password = '';


$mysqli = new mysqli($host, $user, $password, $db);


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


$username = $_POST['username'];
$password = $_POST['password'];
$PNO=$_POST['PNO'];
$level=$_POST['level'];
$date=$_POST['date'];


$sql = "INSERT INTO users (username, password,PNO,level,date) VALUES ('$username', '$password','$PNO','$level','$date')";

if ($mysqli->query($sql) === TRUE) {
    header("Location: index.html");
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();
?>

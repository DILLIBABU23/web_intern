<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "survey_form";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];

$sql = "INSERT INTO survey_res (name, email) VALUES ('$name', '$email')";

if ($conn->query($sql) === TRUE) {
    $_SESSION['user_id'] = $conn->insert_id;
    header("Location: page2.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

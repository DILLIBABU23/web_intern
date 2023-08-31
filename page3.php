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

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $comments = $_POST['comments'];

    $updateQuery = "UPDATE survey_res SET comments='$comments' WHERE id=$user_id";

    if ($conn->query($updateQuery) === TRUE) {
        echo " success :)";
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "User session not found.";
}

$conn->close();
?>

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

    $how_you_know = $_POST['software'];
    //$used_software = $_POST['used_software'];

    $updateQuery = "UPDATE survey_res SET how_you_know='$how_you_know' WHERE id=$user_id";

    if ($conn->query($updateQuery) === TRUE) {
        header("Location: page2.html");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "User session not found.";
}

$conn->close();
?>

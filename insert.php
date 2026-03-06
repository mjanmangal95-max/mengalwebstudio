<?php

// database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "clientmessage";

// connection create
$conn = new mysqli($servername, $username, $password, $database);

// connection check
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// form data lena
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['text'];

// simple validation (server side)
if ($name == "" || $email == "" || $message == "") {
    echo "All fields are required";
    exit();
}

// insert query
$sql = "INSERT INTO contact_messages (name, email, message)
        VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Message saved successfully";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
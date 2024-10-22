<?php
session_start();
$conn = mysqli_connect("127.0.0.1", "root", "", "pglife");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$sender_id = $_SESSION['user_id']; // Logged-in user ID
$receiver_id = (int) $_POST['receiver_id']; // Receiver's user ID (ensure it's an integer)
$message = mysqli_real_escape_string($conn, $_POST['message']); // Escape special characters in the message

if (empty($message) || empty($sender_id) || empty($receiver_id)) {
    echo "Error: Message or User IDs are missing.";
    exit();
}

$sql = "INSERT INTO messages (sender_id, receiver_id, message) VALUES ($sender_id, $receiver_id, '$message')";

if (mysqli_query($conn, $sql)) {
    echo "Message sent!";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

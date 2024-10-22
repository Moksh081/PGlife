<?php
session_start();
$conn = mysqli_connect("127.0.0.1", "root", "", "pglife");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$sender_id = $_SESSION['user_id']; // Logged-in user ID

// Check if receiver_id is set in the GET request
if (!isset($_GET['receiver_id'])) {
    echo "Receiver ID is missing.";
    exit();
}

$receiver_id = (int) $_GET['receiver_id']; // Receiver's user ID (ensure it's an integer)

// Validate that both sender_id and receiver_id are valid
if (empty($sender_id) || empty($receiver_id)) {
    echo "Invalid sender or receiver ID.";
    exit();
}

$sql = "SELECT * FROM messages WHERE (sender_id = $sender_id AND receiver_id = $receiver_id) 
        OR (sender_id = $receiver_id AND receiver_id = $sender_id) ORDER BY timestamp ASC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error: " . mysqli_error($conn);
    exit();
}

while ($row = mysqli_fetch_assoc($result)) {
    $message_class = $row['sender_id'] == $sender_id ? "user" : "";
    echo '<div class="message ' . $message_class . '">' . htmlspecialchars($row['message']) . '</div>';
}

mysqli_close($conn);
?>

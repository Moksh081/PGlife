<?php
// Database connection
session_start();
require "includes/database_connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pg_name = $_POST['pg_name'];
    $city_id = $_POST['city_id'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $gender = $_POST['gender'];
    $rent = $_POST['rent'];
    $rating_clean = $_POST['rating_clean'];
    $rating_food = $_POST['rating_food'];
    $rating_safety = $_POST['rating_safety'];

    // Insert PG details into the database
    $query = "INSERT INTO properties (name, city_id, address, description, gender, rent, rating_clean, rating_food, rating_safety,images) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, null)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sisssdddd", $pg_name, $city_id, $address, $description, $gender, $rent, $rating_clean, $rating_food, $rating_safety);

    if ($stmt->execute()) {
        echo "New PG added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

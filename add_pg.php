<?php
// Database connection
$conn = mysqli_connect("127.0.0.1", "root", "", "pglife");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL! Please contact the admin.";
    return;
}

if (isset($_GET['id'])) {
    $pg_id = $_GET['id'];

    // Fetch PG details from the database
    $query = "SELECT * FROM properties WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $pg_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $pg = $result->fetch_assoc();

    if ($pg) {
        // Display the PG details
        echo "<h1>" . $pg['name'] . "</h1>";
        echo "<p><strong>Address:</strong> " . $pg['address'] . "</p>";
        echo "<p><strong>Description:</strong> " . $pg['description'] . "</p>";
        echo "<p><strong>Gender:</strong> " . $pg['gender'] . "</p>";
        echo "<p><strong>Rent:</strong> $" . $pg['rent'] . "</p>";
        echo "<p><strong>Cleanliness Rating:</strong> " . $pg['rating_clean'] . "</p>";
        echo "<p><strong>Food Rating:</strong> " . $pg['rating_food'] . "</p>";
        echo "<p><strong>Safety Rating:</strong> " . $pg['rating_safety'] . "</p>";

        // Display images
        $images = json_decode($pg['images'], true);
        if ($images) {
            echo "<h3>PG Images:</h3>";
            foreach ($images as $image) {
                echo "<img src='$image' alt='PG Image' width='200'>";
            }
        }
    } else {
        echo "PG not found!";
    }

    $stmt->close();
}

$conn->close();
?>

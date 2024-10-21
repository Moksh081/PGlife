<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New PG</title>
    <link rel="stylesheet" href="css/addpg.css">
</head>
<body>
    <h2>Add New PG</h2>
    <form action="add_pg.php" method="POST" enctype="multipart/form-data">
        <label for="pg_name">PG Name:</label>
        <input type="text" id="pg_name" name="pg_name" required><br>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required><br>

        <label for="user_name">Owner Name:</label>
        <input type="text" id="user_name" name="user_name" required><br>

        <label for="contact">Contact Number:</label>
        <input type="tel" id="contact" name="contact" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="pg_images">PG Images:</label>
        <input type="file" id="pg_images" name="pg_images[]" multiple accept="image/*"><br>

        <input type="submit" value="Add PG">
    </form>
</body>
</html>

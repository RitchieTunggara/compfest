<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add New Service</title>
</head>
<body>
    <h2>Add New Service</h2>
    <form action="process_add_service.php" method="post">
        <label for="service_name">Service Name:</label>
        <input type="text" id="service_name" name="service_name" required><br><br>
        
        <label for="duration">Duration (minutes):</label>
        <input type="number" id="duration" name="duration" required><br><br>
        
        <input type="submit" value="Add Service">
    </form>
</body>
</html>

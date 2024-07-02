<?php
    require "connect.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $serviceName = $_POST['serviceName'];

        $stmt = $conn->prepare("INSERT INTO service (serviceName) VALUES (?)");
        $stmt->bind_param("s", $serviceName);

        if ($stmt->execute()) {
            echo "New service added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
    header("Location: ../admin.php");
    exit;
?>
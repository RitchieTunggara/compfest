<?php
    require "connect.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $serviceId = $_POST['serviceId'];
        $branchId = $_POST['branchId'];

        $stmt = $conn->prepare("INSERT INTO servicelist (serviceId, branchId) VALUES (?, ?)");
        $stmt->bind_param("ii", $serviceId, $branchId);

        if ($stmt->execute()) {
            echo "New service list entry added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
    header("Location: ../admin.php");
    exit;
?>
<?php
    require "connect.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $branchName = $_POST['branchName'];
        $branchLocation = $_POST['branchLocation'];
        $openingTime = $_POST['openingTime'];
        $closingTime = $_POST['closingTime'];

        $stmt = $conn->prepare("INSERT INTO branch (BranchName, BranchLocation, OpeningTime, ClosingTime) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $branchName, $branchLocation, $openingTime, $closingTime);

        if ($stmt->execute()) {
            echo "New branch added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
    header("Location: ../admin.php");
    exit;
?>
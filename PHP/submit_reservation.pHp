<?php
    require "connect.php";

    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form data
        $branchId = $_POST['branch'];
        $serviceId = $_POST['service'];
        $date = $_POST['date'];
        $time = $_POST['time'];

        // Validate the form data
        if (empty($branchId) || empty($serviceId) || empty($date) || empty($time)) {
            echo "All fields are required.";
            exit;
        }

        // Prepare the SQL query to insert the reservation
        $stmt = $conn->prepare("INSERT INTO reservation (branchId, serviceId, date, time) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $branchId, $serviceId, $date, $time);

        // Execute the query and check for success
        if ($stmt->execute()) {
            // Redirect to success page
            header("Location: ../success_reservation.php");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Invalid request.";
    }
?>
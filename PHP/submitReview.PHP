<?php
    require "connect.php";
    $username = $_SESSION['username'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $message = $_POST['txtMessage'];
        $star = $_POST['rating'];

        $sql = "SELECT userId FROM user WHERE username = ?";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($userId);
            $stmt->fetch();
        }
        else
        {
            $stmt->close();
            $conn->close();
            exit();
        }

        

        $stmt = $conn->prepare("INSERT INTO rating (Comment, Star, userId) VALUES (?, ?, ?)");

        // Bind variables to a prepared statement as parameters
        $stmt->bind_param("sii", $message, $star, $userId);

        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();

        header('Location: /compfest/index.php');
        exit();
    }

    $conn->close();

?>
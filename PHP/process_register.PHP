<?php
    require "connect.php";

    // Mendapatkan data dari form
    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role = "user";

    // Memeriksa apakah username sudah ada
    $sql = "SELECT userId FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Username already exists. Please choose another one.";
        echo '<p><a href="../register.php">Go back to register</a></p>';
        $stmt->close();
        $conn->close();
        exit();
    }

    $sql = "INSERT INTO user (username, password, email, phone, role) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error preparing statement for user insertion: " . $conn->error);
    }

    $stmt->bind_param("sssss", $user, $pass, $email, $phone, $role);

    if ($stmt->execute()) {
        echo "Registration successful. You can now <a href='../login.php'>login</a>.";
    } else {
        echo "Error: " . $stmt->error;
    }


    // Menutup statement dan koneksi
    $stmt->close();
    $conn->close();
?>
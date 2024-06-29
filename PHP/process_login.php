<?php
    require "connect.php";
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Memeriksa apakah username ada dan password cocok
    $sql = "SELECT userId, password FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($pass, $hashed_password)) {
        if (password_verify($pass, $hashed_password)) {
            // Menyimpan informasi pengguna dalam sesi
            $_SESSION['username'] = $user;
            echo "Login successful. Welcome, " . htmlspecialchars($user) . "!";
            // Redirect ke halaman lain jika login berhasil
            header('Location: ../index.php');
            exit();
        }
    } else {
        // Jika login gagal, tampilkan pesan error
        echo "Invalid username or password. Please try again.";
        echo '<p><a href="../login.php">Go back to login</a></p>';
        // Redirect kembali ke halaman login
        // header('Location: login.php');
        // exit();
    }

    // Menutup statement dan koneksi
    $stmt->close();
    $conn->close();
?>
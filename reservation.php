<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .container label {
            display: block;
            margin: 10px 0 5px;
        }
        .container input, .container select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .container button {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        .container button:hover {
            background-color: #45a049;
        }
    </style>
    <script>
        function setMinDate() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById('date').setAttribute('min', today);
        }
    </script>
</head>
<body onload="setMinDate()">

<div class="container">
    <h2>Reservation Form</h2>

    <?php if (!isset($_POST['branch'])): ?>
        <form action="" method="post">
            <label for="branch">Branch:</label>
            <select id="branch" name="branch" required onchange="this.form.submit()">
                <option value="">Select a branch</option>
                <?php
                    require "PHP/connect.php";
                    $sql = "SELECT BranchId, BranchName FROM branch";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['BranchId'] . "'>" . $row['BranchName'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No branches available</option>";
                    }
                    
                    $conn->close();
                ?>
            </select>
        </form>
    <?php endif; ?>

    <?php if (isset($_POST['branch'])): ?>
        <form action="PHP/submit_reservation.php" method="post">
            <input type="hidden" name="branch" value="<?php echo $_POST['branch']; ?>">

            <label for="service">Service:</label>
            <select id="service" name="service" required>
                <option value="">Select a service</option>
                <?php
                    require "PHP/connect.php";
                    $branchId = $_POST['branch'];
                    $stmt = $conn->prepare("SELECT DISTINCT service.serviceId, service.serviceName
                                            FROM service
                                            JOIN servicelist ON servicelist.serviceId = service.serviceId
                                            WHERE servicelist.branchId = ?");
                    $stmt->bind_param("i", $branchId);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['serviceId'] . "'>" . $row['serviceName'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No services available</option>";
                    }

                    $stmt->close();
                    $conn->close();
                ?>
            </select>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="time">Time:</label>
            <select id="time" name="time" required>
                <option value="slot1">09.00 AM - 10.00 AM</option>
                <option value="slot2">10.00 AM - 11.00 AM</option>
                <option value="slot3">11.00 AM - 12.00 PM</option>
                <option value="slot4">12.00 PM - 01.00 PM</option>
                <option value="slot5">01.00 PM - 02.00 PM</option>
                <option value="slot6">02.00 PM - 03.00 PM</option>
                <option value="slot7">03.00 PM - 04.00 PM</option>
                <option value="slot8">04.00 PM - 05.00 PM</option>
                <option value="slot9">05.00 PM - 06.00 PM</option>
                <option value="slot10">06.00 PM - 07.00 PM</option>
                <option value="slot11">07.00 PM - 08.00 PM</option>
                <option value="slot12">08.00 PM - 09.00 PM</option>
            </select>

            <button type="submit">Submit Reservation</button>
        </form>
    <?php endif; ?>
</div>

</body>
</html>
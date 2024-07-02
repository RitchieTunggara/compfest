<?php
require "PHP/connect.php";

// Fetch branches
$branches_sql = "SELECT BranchId, BranchName, BranchLocation, OpeningTime, ClosingTime FROM branch";
$branches_result = $conn->query($branches_sql);

// Fetch services
$services_sql = "SELECT serviceId, serviceName FROM service";
$services_result = $conn->query($services_sql);

// Fetch service list with branch names and service names
$servicelist_sql = "SELECT sl.id, s.serviceId, s.serviceName, b.BranchId, b.BranchName
                    FROM servicelist sl
                    JOIN service s ON sl.serviceId = s.serviceId
                    JOIN branch b ON sl.branchId = b.BranchId";
$servicelist_result = $conn->query($servicelist_sql);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        .container {
            max-width: 1200px;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .button-container {
            margin-bottom: 20px;
            text-align: center;
        }
        .button-container button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin: 5px;
        }
        form {
            display: none;
            margin-bottom: 20px;
        }
        .container form.active {
            display: block;
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
        .container button[type="submit"] {
            background-color: #4CAF50;
            color: white;
        }
        .container button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <script>
        function showForm(formId) {
            document.getElementById('branchForm').classList.remove('active');
            document.getElementById('serviceForm').classList.remove('active');
            document.getElementById('servicelistForm').classList.remove('active');
            document.getElementById(formId).classList.add('active');
            // document.getElementById(formId).scrollIntoView({ behavior: 'smooth' });
        }
    </script>
</head>
<body>

<div class="container">
    <h2>Admin Page</h2>

    <div class="button-container">
        <button onclick="showForm('branchForm')">Add New Branch</button>
        <button onclick="showForm('serviceForm')">Add New Service</button>
        <button onclick="showForm('servicelistForm')">Add New Service List</button>
    </div>

    <form id="branchForm" action="PHP/add_branch.php" method="post">
        <h3>Add New Branch</h3>
        <label for="branchName">Branch Name:</label>
        <input type="text" id="branchName" name="branchName" required>
        <label for="branchLocation">Branch Location:</label>
        <input type="text" id="branchLocation" name="branchLocation" required>
        <label for="openingTime">Opening Time:</label>
        <input type="time" id="openingTime" name="openingTime" required>
        <label for="closingTime">Closing Time:</label>
        <input type="time" id="closingTime" name="closingTime" required>
        <button type="submit">Add Branch</button>
    </form>

    <form id="serviceForm" action="PHP/add_service.php" method="post">
        <h3>Add New Service</h3>
        <label for="serviceName">Service Name:</label>
        <input type="text" id="serviceName" name="serviceName" required>
        <button type="submit">Add Service</button>
    </form>

    <form id="servicelistForm" action="PHP/add_servicelist.php" method="post">
        <h3>Add New Service List</h3>
        <label for="serviceId">Service:</label>
        <select id="serviceId" name="serviceId" required>
            <option value="">Select a service</option>
            <?php
                require "PHP/connect.php";
                $services_sql = "SELECT serviceId, serviceName FROM service";
                $services_result = $conn->query($services_sql);

                if ($services_result->num_rows > 0) {
                    while($row = $services_result->fetch_assoc()) {
                        echo "<option value='" . $row['serviceId'] . "'>" . $row['serviceName'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No services available</option>";
                }

                $conn->close();
            ?>
        </select>
        
        <label for="branchId">Branch:</label>
        <select id="branchId" name="branchId" required>
            <option value="">Select a branch</option>
            <?php
                require "PHP/connect.php";
                $branches_sql = "SELECT BranchId, BranchName FROM branch";
                $branches_result = $conn->query($branches_sql);

                if ($branches_result->num_rows > 0) {
                    while($row = $branches_result->fetch_assoc()) {
                        echo "<option value='" . $row['BranchId'] . "'>" . $row['BranchName'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No branches available</option>";
                }

                $conn->close();
            ?>
        </select>
        <button type="submit">Add Service List</button>
    </form>

    <h3>Branches</h3>
    <table>
        <tr>
            <th>Branch ID</th>
            <th>Branch Name</th>
            <th>Branch Location</th>
            <th>Opening Time</th>
            <th>Closing Time</th>
        </tr>
        <?php
        if ($branches_result->num_rows > 0) {
            while($row = $branches_result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['BranchId']}</td>
                        <td>{$row['BranchName']}</td>
                        <td>{$row['BranchLocation']}</td>
                        <td>{$row['OpeningTime']}</td>
                        <td>{$row['ClosingTime']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No branches available</td></tr>";
        }
        ?>
    </table>

    <h3>Services</h3>
    <table>
        <tr>
            <th>Service ID</th>
            <th>Service Name</th>
        </tr>
        <?php
        if ($services_result->num_rows > 0) {
            while($row = $services_result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['serviceId']}</td>
                        <td>{$row['serviceName']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No services available</td></tr>";
        }
        ?>
    </table>

    <h3>Service List</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Service ID</th>
            <th>Service Name</th>
            <th>Branch ID</th>
            <th>Branch Name</th>
        </tr>
        <?php
        if ($servicelist_result->num_rows > 0) {
            while($row = $servicelist_result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['serviceId']}</td>
                        <td>{$row['serviceName']}</td>
                        <td>{$row['BranchId']}</td>
                        <td>{$row['BranchName']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No service list available</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
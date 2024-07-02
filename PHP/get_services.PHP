<?php
    require "connect.php";
    $branch = $_POST['branch'];
    $services = [];

    $sql = "SELECT DISTINCT service.serviceId, service.serviceName
                            FROM service
                            LEFT OUTER JOIN servicelist ON servicelist.serviceId = service.serviceId
                            LEFT OUTER JOIN branch on branch.branchId = serviceList.branchId
                            WHERE branch.branchName = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $branch);
    $stmt->execute();

    $res = $stmt->get_result();
    while ($row = $res->fetch_assoc()) {
        $services[] = $row;
    }

    $stmt->close();
    $conn->close();

    

    // $stmt->store_result();
    // $stmt->bind_result($services["serviceName"]);
    // while ($stmt->fetch())
    // {
    //     $row = [];
    //     foreach ($services as $key => $val) {
    //         $row[$key] = $val;
    //     }
    //     $array[] = $row;
    // }









    // $branch = [];
    // $services = [];
    // $selectedBranch = "";

    // $sql = "SELECT * FROM branch"; // Adjust the table name and columns as necessary
    // $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
    //     while($row = $result->fetch_assoc()) {
    //         $branch[] = $row;
    //     }
    // }

    // if (isset($_POST['branch'])) {
    //     $selectedBranch = $_POST['branch'];
    //     $sql = "SELECT DISTINCT service.serviceName
    //             FROM servicelist
    //             JOIN service ON servicelist.serviceId = service.serviceId
    //             JOIN branch on branch.branchId = serviceList.branchId
    //             WHERE branch.branchName = ?";
    //     $stmt = $conn->prepare($sql);
    //     $stmt->bind_param("s", $selectedBranch);
    //     $stmt->execute();
    //     $result = $stmt->get_result();

    //     if ($result->num_rows > 0) {
    //         while($row = $result->fetch_assoc()) {
    //             $services[] = $row;
    //         }
    //     }

    //     $stmt->close();
    // }

    // $conn->close();
?>
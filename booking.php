<?php

session_start();
require('firstimport.php');

// Check if user is logged in
if (!isset($_SESSION['name'])) {
    header("location:login1.php");
    exit(); // Terminate script after redirection
}

$tbl_name = "booking";

// Connect to database
mysqli_select_db($conn, $db_name) or die("Cannot select database");

// Retrieve data from $_GET
$uname = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$Tnumber = isset($_GET['tno']) ? $_GET['tno'] : '';
$class = isset($_GET['selct']) ? $_GET['selct'] : '';
$doj = isset($_GET['doj']) ? $_GET['doj'] : '';
$DOB = isset($_GET['DOB']) ? $_GET['DOB'] : '';
$fromstn = isset($_GET['fromstn']) ? $_GET['fromstn'] : '';
$tostn = isset($_GET['tostn']) ? $_GET['tostn'] : '';
$Name = isset($_GET['Name']) ? $_GET['Name'] : '';
$Age = isset($_GET['Age']) ? $_GET['Age'] : '';
$sex = isset($_GET['sex1']) ? $_GET['sex1'] : '';
$Status= isset($_GET['Status']) ? $_GET['Status'] : '';

// Check seat availability
$sql1 = "SELECT * FROM seats_availability WHERE Train_No='$Tnumber' AND doj='$doj'";
$result1 = $conn->query($sql1);
$value = 0;

while ($row1 = mysqli_fetch_array($result1)) {
    $value = $row1["$class"];
}

// Check if there's enough seats available
if ($value > 0 && (!empty($Name) || !empty($Age))) {
    $status = "Confirmed";
    // Insert booking details
    $sql = "INSERT INTO $tbl_name(uname,Tnumber,class,doj,DOB,fromstn,tostn,Name,Age,sex,Status)
            VALUES ('$uname','$Tnumber','$class','$doj','$DOB','$fromstn','$tostn','$Name','$Age','$sex','$status')";
    $result = $conn->query($sql);

    if (!$result) {
        die ($conn->error);
    }

    $value -= 1;

    // Update seat availability
    $sql2 = "UPDATE seats_availability SET $class=$value WHERE doj='$doj' AND Train_No='$Tnumber'";
    $result2 = $conn->query($sql2);

    if (!$result2) {
        die ($conn->error);
    }
} else {
    $status = "Waiting";
    if (!empty($Name) || !empty($Age)) {
        // Insert booking details
        $sql = "INSERT INTO $tbl_name(uname,Tnumber,class,doj,DOB,fromstn,tostn,Name,Age,sex,Status)
                VALUES ('$uname','$Tnumber','$class','$doj','$DOB','$fromstn','$tostn','$Name','$Age','$sex','$status')";
        $result = $conn->query($sql);

        if (!$result) {
            die ($conn->error);
        }

        $value -= 1;

        // Update seat availability
        $sql2 = "UPDATE seats_availability SET $class=$value WHERE doj='$doj' AND Train_No='$Tnumber'";
        $result2 = $conn->query($sql2);

        if (!$result2) {
            die ($conn->error);
        }
    }
}

echo "File successfully inserted";

header("location:display.php?tno=$Tnumber&doj=$doj&seat=$class");

?>
<?php

$servername = "localhost";
$username = "Samuele Andreoli";
$password = "Calciatore01$";
$database = "hellohello";

// Connecting to mysql database
$conn = mysqli_connect($servername, $username, $password,$database);

// Check connection
if (mysqli_error($conn)) {
  die("Connection failed: " . mysqli_error($conn));
}   else {
    echo "Connection Successful";
}

if (!isset($_POST['userID']) || !isset($_POST['pwd'])) {
    echo "<p>Invalid details<p>";
} else {

    $userID = mysqli_real_escape_string($conn, $_POST['userID']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    

    $sql = "SELECT * FROM admins
            WHERE id = '$userID' AND
            passwords = '$pwd'";

    $result = mysqli_query($conn,$sql);
    
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    } else {
        if (mysqli_num_rows($result) == 1) {
            echo "<p>Login successful</p>";
        } else {
            echo "<p>Invalid login details</p>";
        }

    }

    
}












/*
    if (empty($_POST["userID"])) {
        echo "<p>Enter User ID<p>";
    } else {
        $userID = $_POST["userID"];
    }

    if (empty($_POST["pwd"])) {
        echo "<p>Enter the password<p>";
    } else {
        $pwd = $_POST["pwd"];
    }
*/
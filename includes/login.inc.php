<?php

if (isset($_POST['submit'])){
    
    // Grabbing data from login.php form
    $userID = $_POST['userID'];
    $pwd = $_POST['pwd'];
    
    // Include external files
    include "../db.php";
    include "../Login/loginModel.php";
    include "../Login/loginController.php";
    $login = new LoginController($userID,$pwd);

    // Signup User
    $login->loginUser();

    // Redirecting the user to their Homepage
    $userType = $userID[0];
        if ($userType == '1')
        {
            header("location: ../Admin/index.php");
        } 
        elseif ($userType == '2')
        {
            header("location: ../Tutor/index.php");
        }
        elseif ($userType == '3')
        {
            header("location: ../Student/index.php");
        }
        
}
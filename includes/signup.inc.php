<?php

if (isset($_POST['submit'])){
    
    // Grabbing data from signup.php form
    $courseDegree = $_POST['courseDegree'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $birthDate = $_POST['birthDate'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $confirmPwd = $_POST['confirmPwd'];

    // Include external files
    include "../db.php";
    include "../Signup/signupModel.php";
    include "../Signup/signupController.php";
    $signup = new SignupController($courseDegree,$name,$surname,$birthDate,$email,$pwd,$confirmPwd);

    // Signup User
    $signup->signupStudent();

    // Redirecting the user to a 'confirmed application' page
    header("location: ../Signup/applicationSubmitted.php");

}
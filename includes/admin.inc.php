<?php

if (isset($_POST['submit'])){
    
    
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $coursedegree_id = $_POST['coursedegree_id'];
    
    
    // Include external files
    include "../db.php";
    include "../Admin/adminModel.php";
    include "../Admin/adminController.php";
    $admin = new AdminController();
    $admin->setTutor($name,$surname,$email,$pwd,$coursedegree_id);

    // Signup User
    //$login->loginUser();

    header("location: ../Admin/index.php?addintutor=successful");
        
}
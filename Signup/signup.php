<?php

include "head.php";
    
if (isset($_GET['error']))
{
    $error = $_GET['error'];

    echo "<p id='error-message'>";
    switch ($error) 
    {
        case "emptyfield":
          echo "You must fill all fields*";
          break;
        case "invalidname":
          echo "Invalid Name*";
          break;
        case "invalidsurname":
          echo "Invalid Surname*";
          break;
        case "invalidbirthdate":
          echo "Invalid Date of Birth*";
          break;
        case "invalidemail":
          echo "Invalid E-mail*";
          break;
        case "invalidpassword":
          echo "Password must contain at least 7 letters*";
          break;
        case "notmatchingpasswords":
          echo "Passwords are not matching*";
          break;
        case "emailtaken":
          echo "This user already exists*";
          break;  
    }
    echo "</p>";
}

include "footer.php";
?>
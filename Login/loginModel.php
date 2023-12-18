<?php

class LoginModel extends Database {
   
    protected function getStudent($userID,$pwd)
    {
        $conn = $this->connect();
        $stmt = $conn->prepare('SELECT pwd FROM students WHERE id = ?;');
        
        $userID = intval($userID);
        $stmt->bind_param('i',$userID);
        $stmt->execute();
        
        if ($stmt->errno)
        {
            $stmt = null;
            mysqli_close($conn);
            header("location: login.php?error=stmtfailed");
            exit();
        }
        
        $stmt->store_result();
        
        
        if ($stmt->num_rows == 0)
        {
            $stmt = null;
            mysqli_close($conn);
            header("location: login.php?error=usernotfound");
            exit();
        }
        
        $stmt->bind_result($hashedPwd);
        $result = $stmt->fetch();
    
        $checkPassword = password_verify($pwd,$hashedPwd);
        

        if ($checkPassword)
        {
            $stmt = null;
            mysqli_close($conn);
            $conn = $this->connect();
            $stmt = $conn->prepare('SELECT id,first_name,
                                           surname,birth_date,
                                           email,level_year             
                                     FROM students WHERE id = ?;');

            $userID = intval($userID);
            $stmt->bind_param('i',$userID);
            $stmt->execute();
        
            if ($stmt->errno)
            {
                $stmt = null;
                mysqli_close($conn);
                header("location: login.php?error=stmtfailed");
                exit();
            }

            $stmt->store_result();
            $stmt->bind_result($id,$first_name,$surname,$birth_date,$email,$level_year);

            if ($stmt->fetch()) 
            {
                session_start();
                $_SESSION["userID"] = $id;
                $_SESSION["name"] = $first_name;
                $_SESSION["surname"] = $surname;
                $_SESSION["birth_date"] = $birth_date;
                $_SESSION["email"] = $email;
                $_SESSION["level_year"] = $level_year;
            }
            else
            {
                $stmt = null;
                mysqli_close($conn);
                header("location: login.php?error=usernotfound");
                exit();
            }
             
        }
        else
        {
            $stmt = null;
            mysqli_close($conn);
            header("location: login.php?error=wrongpassword");
            exit();
        }
        
    }

    protected function getTutor($userID,$pwd)
    {
        $conn = $this->connect();
        $stmt = $conn->prepare('SELECT pwd FROM tutors WHERE id = ?;');
        
        $userID = intval($userID);
        $stmt->bind_param('i',$userID);
        $stmt->execute();
        
        if ($stmt->errno)
        {
            $stmt = null;
            mysqli_close($conn);
            header("location: login.php?error=stmtfailed");
            exit();
        }
        
        $stmt->store_result();
        
        
        if ($stmt->num_rows == 0)
        {
            $stmt = null;
            mysqli_close($conn);
            header("location: login.php?error=usernotfound");
            exit();
        }
        
        $stmt->bind_result($hashedPwd);
        $result = $stmt->fetch();
    
        $checkPassword = password_verify($pwd,$hashedPwd);
        

        if ($checkPassword)
        {
            $stmt = null;
            mysqli_close($conn);
            $conn = $this->connect();
            $stmt = $conn->prepare('SELECT id,first_name,
                                           surname,email            
                                     FROM tutors WHERE id = ?;');

            $userID = intval($userID);
            $stmt->bind_param('i',$userID);
            $stmt->execute();
        
            if ($stmt->errno)
            {
                $stmt = null;
                mysqli_close($conn);
                header("location: login.php?error=stmtfailed");
                exit();
            }

            $stmt->store_result();
            $stmt->bind_result($id,$first_name,$surname,$email);

            if ($stmt->fetch()) 
            {
                session_start();
                $_SESSION["userID"] = $id;
                $_SESSION["name"] = $first_name;
                $_SESSION["surname"] = $surname;
                $_SESSION["email"] = $email;
            }
            else
            {
                $stmt = null;
                mysqli_close($conn);
                header("location: login.php?error=usernotfound");
                exit();
            }
             
        }
        else
        {
            $stmt = null;
            mysqli_close($conn);
            header("location: login.php?error=wrongpassword");
            exit();
        }
        
    }

    protected function getAdmin($userID,$pwd)
    {
        $conn = $this->connect();
        $stmt = $conn->prepare('SELECT pwd FROM admins WHERE id = ?;');
        
        $userID = intval($userID);
        $stmt->bind_param('i',$userID);
        $stmt->execute();
        
        if ($stmt->errno)
        {
            $stmt = null;
            mysqli_close($conn);
            header("location: login.php?error=stmtfailed");
            exit();
        }
        
        $stmt->store_result();
        
        
        if ($stmt->num_rows == 0)
        {
            $stmt = null;
            mysqli_close($conn);
            header("location: login.php?error=usernotfound");
            exit();
        }
        
        $stmt->bind_result($hashedPwd);
        $result = $stmt->fetch();
    
        $checkPassword = password_verify($pwd,$hashedPwd);
        

        if ($checkPassword)
        {
            $stmt = null;
            mysqli_close($conn);
            $conn = $this->connect();
            $stmt = $conn->prepare('SELECT id,first_name,
                                           surname,email            
                                     FROM admins WHERE id = ?;');

            $userID = intval($userID);
            $stmt->bind_param('i',$userID);
            $stmt->execute();
        
            if ($stmt->errno)
            {
                $stmt = null;
                mysqli_close($conn);
                header("location: login.php?error=stmtfailed");
                exit();
            }

            $stmt->store_result();
            $stmt->bind_result($id,$first_name,$surname,$email);

            if ($stmt->fetch()) 
            {
                session_start();
                $_SESSION["userID"] = $id;
                $_SESSION["name"] = $first_name;
                $_SESSION["surname"] = $surname;
                $_SESSION["email"] = $email;
            }
            else
            {
                $stmt = null;
                mysqli_close($conn);
                header("location: login.php?error=usernotfound");
                exit();
            }
             
        }
        else
        {
            $stmt = null;
            mysqli_close($conn);
            header("location: login.php?error=wrongpassword");
            exit();
        }
        
    }

}
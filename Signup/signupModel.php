<?php

class SignupModel extends Database {
   
    protected function addStudent($name,$surname,$birthDate,$email,$pwd,$courseDegree)
    {
        $conn = $this->connect();
        $stmt = $conn->prepare("INSERT INTO students (first_name,
                                                        surname,
                                                        birth_date,
                                                        email,
                                                        pwd,
                                                        level_year,
                                                        coursedegree_id)
                                            VALUES (?,?,?,?,?,?,?);");
        
        $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);
        $courseDegree_id = intval($courseDegree);

        if (!$stmt->execute(array($name,$surname,$birthDate,$email,$hashedPwd,'1',$courseDegree_id)))
        {
            $stmt = null;
            mysqli_close($conn);
            header("location: signup.php?error=stmtfailed");
            exit();
        }
            
            $stmt = null;
        
    }
    
    // This method checks if the entered email is already taken
    protected function checkStudent($email) 
    {
        $conn = $this->connect();
        $stmt = $conn->prepare('SELECT email FROM students WHERE email = ?;');
        $stmt->bind_param('s', $email);
        $stmt->execute();

        if ($stmt->errno)
        {
            $stmt = null;
            mysqli_close($conn);
            header("location: signup.php?error=stmtfailed");
            exit();
        }

        $stmt->store_result();

        $resultCheck;
        if ($stmt->num_rows > 0)
        {
            $resultCheck = false;
        }
        else
        {
            $resultCheck = true;
        }

        $stmt->close();
        mysqli_close($conn);
        
        return $resultCheck; 
    }   

}
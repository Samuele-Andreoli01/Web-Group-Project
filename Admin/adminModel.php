<?php

class AdminModel extends Database {
   
    protected function addTutor($name,$surname,$email,$pwd,$coursedegree_id)
    {
        $conn = $this->connect();
        $stmt = $conn->prepare("INSERT INTO tutors (first_name,
                                                        surname,
                                                        email,
                                                        pwd,
                                                        coursedegree_id)
                                            VALUES (?,?,?,?,?);");
        
        $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);
        

        if (!$stmt->execute(array($name,$surname,$email,$hashedPwd,$coursedegree_id)))
        {
            $stmt = null;
            mysqli_close($conn);
            header("location: index.php?error=stmtfailed");
            exit();
        }
            
            $stmt = null;
        
    }
    
    protected function checkCoursedegree_id($coursedegree_id) 
    {
        $conn = $this->connect();
        $stmt = $conn->prepare('SELECT id FROM coursedegrees WHERE id = ?;');
        $stmt->bind_param('i', $coursedegree_id);
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
        if ($stmt->num_rows == 0)
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
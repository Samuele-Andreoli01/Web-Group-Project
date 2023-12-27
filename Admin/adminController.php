<?php

class AdminController extends AdminModel {

    public function setTutor($name,$surname,$email,$pwd,$coursedegree_id)
    {
        if ($this->emptyField($name,$surname,$email,$pwd,$coursedegree_id) == false)
        {
            header("location: ../Admin/index.php?error=emptyfield");
            exit();
        }

        if ($this->invalidName($name) == false)
        {
            header("location: ../Admin/index.php?error=invalidname");
            exit();
        }

        if ($this->invalidSurname($surname) == false)
        {
            header("location: ../Admin/index.php?error=invalidsurname");
            exit();
        }

        if ($this->invalidEmail($email) == false)
        {
            header("location: ../Admin/index.php?error=invalidemail");
            exit();
        }

        if ($this->invalidPwd($pwd) == false)
        {
            header("location: ../Admin/index.php?error=invalidpassword");
            exit();
        }

        if ($this->invalidCoursedegree_id($coursedegree_id) == false)
        {
            header("location: ../Admin/index.php?error=invalidcoursedegreeid");
            exit();
        }

        $this->addTutor($name,$surname,$email,$pwd,$coursedegree_id);
    }

    private function emptyField($name,$surname,$email,$pwd,$coursedegree_id) 
    {
        $result;
        if (empty($name) || empty($surname) ||
            empty($email) || empty($pwd) || empty($coursedegree_id)) 
        {
            
            $result = false;
        } 
        else 
        {
            $result = true;
        }
        return $result;
    }

    private function invalidName($name) 
    {
        $result;
        if (!preg_match('/^[a-zA-Z]+$/',$name)) 
        {
            $result = false;
        } 
        else 
        {
            $result = true;
        }
        return $result;
    }

    private function invalidSurname($surname) 
    {
        $result;
        if (!preg_match('/^[a-zA-Z]+$/',$surname)) 
        {
            $result = false;
        } 
        else 
        {
            $result = true;
        }
        return $result;
    }
    

    private function invalidEmail($email) 
    {
        $result;
        if (!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $result = false;
        }
        else 
        {
            $result = true;
        }
        return $result;
    }

    private function invalidPwd($pwd) 
    {
        $result;
        if (strlen($pwd) < 6)
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

    private function invalidCoursedegree_id($coursedegree_id)
    {
        $result;
        if (!$this->checkCoursedegree_id($coursedegree_id))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

}
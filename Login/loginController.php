<?php

class LoginController extends LoginModel {

    private $userID;
    private $pwd;

    public function __construct($userID,$pwd) 
    {
        $this->userID = $userID;
        $this->pwd = $pwd;
    }

    public function loginUser()
    {
        if ($this->emptyField() == false)
        {
            header("location: ../Login/login.php?error=emptyfield");
            exit();
        }

        $userType = $userID[0];
        if ($userType == '1')
        {
            $this->getAdmin($this->userID,$this->pwd);
        } 
        elseif ($userType == '2')
        {
            $this->getTutor($this->userID,$this->pwd);
        }
        elseif ($userType == '3')
        {
            $this->getStudent($this->userID,$this->pwd);
        }
        else
        {
            header("location: ../Login/login.php?error=usernotfound");
            exit();
        }
    
    }

    private function emptyField() 
    {
        $result;
        if (empty($this->userID) || empty($this->pwd)) 
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
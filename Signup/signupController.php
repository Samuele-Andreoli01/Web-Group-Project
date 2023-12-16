<?php

class SignupController extends signupModel {

    private $courseDegree;
    private $name;
    private $surname;
    private $birthDate;
    private $email;
    private $pwd;
    private $confirmPwd;


    public function __construct($courseDegree,$name,$surname,$birthDate,$email,$pwd,$confirmPwd) 
    {
        $this->courseDegree = $courseDegree;
        $this->name = $name;
        $this->surname = $surname;
        $this->birthDate = $birthDate;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->confirmPwd = $confirmPwd;
    }

    public function signupStudent()
    {
        if ($this->emptyField() == false)
        {
            header("location: ../Signup/signup.php?error=emptyfield");
            exit();
        }

        if ($this->invalidName() == false)
        {
            header("location: ../Signup/signup.php?error=invalidname");
            exit();
        }

        if ($this->invalidSurname() == false)
        {
            header("location: ../Signup/signup.php?error=invalidsurname");
            exit();
        }

        if ($this->invalidBirthDate() == false)
        {
            header("location: ../Signup/signup.php?error=invalidbirthdate");
            exit();
        }

        if ($this->invalidEmail() == false)
        {
            header("location: ../Signup/signup.php?error=invalidemail");
            exit();
        }

        if ($this->invalidPwd() == false)
        {
            header("location: ../Signup/signup.php?error=invalidpassword");
            exit();
        }

        if ($this->notMatchingConfirmPwd() == false)
        {
            header("location: ../Signup/signup.php?error=notmatchingpasswords");
            exit();
        }

        if ($this->takenEmail() == false)
        {
            header("location: ../Signup/signup.php?error=emailtaken");
            exit();
        }

        $this->addStudent($this->name,$this->surname,$this->birthDate,$this->email,$this->pwd,$this->courseDegree);
    }

    private function emptyField() 
    {
        $result;
        if (empty($this->courseDegree) || empty($this->name) || empty($this->surname) || empty($this->birthDate) ||
            empty($this->email) || empty($this->pwd) || empty($this->confirmPwd)) 
        {
            
            $result = false;
        } 
        else 
        {
            $result = true;
        }
        return $result;
    }

    private function invalidName() 
    {
        $result;
        if (!preg_match('/^[a-zA-Z]+$/',$this->name)) 
        {
            $result = false;
        } 
        else 
        {
            $result = true;
        }
        return $result;
    }

    private function invalidSurname() 
    {
        $result;
        if (!preg_match('/^[a-zA-Z]+$/',$this->surname)) 
        {
            $result = false;
        } 
        else 
        {
            $result = true;
        }
        return $result;
    }

    private function invalidBirthDate()
    {
        $result;
        if (strlen($this->birthDate) !== 10)
        {
            $result = false;
            
        }
        else
        {
            $year = substr($this->birthDate,0,4);
            $month = substr($this->birthDate,5,2);
            $day = substr($this->birthDate,8,2);

            $yearInt = intval($year);
            $monthInt = intval($month);
            $dayInt = intval($day);
            
            if (!checkdate($monthInt,$dayInt,$yearInt))
            {
                $result = false;
            }
            else
            {
                $result = true;
            }
        }
        return $result;
    }

    private function invalidEmail() 
    {
        $result;
        if (!filter_var($this->email,FILTER_VALIDATE_EMAIL))
        {
            $result = false;
        }
        else 
        {
            $result = true;
        }
        return $result;
    }

    private function invalidPwd() 
    {
        $result;
        if (strlen($this->pwd) < 6)
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

    private function notMatchingConfirmPwd()
    {
        $result;
        if ($this->pwd !== $this->confirmPwd)
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

    private function takenEmail()
    {
        $result;
        if (!$this->checkStudent($this->email))
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
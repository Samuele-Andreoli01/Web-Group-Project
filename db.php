<?php

class Database {

  private $servername = "127.0.0.1:3307";
  private $username = "root";
  private $password = "";
  private $database = "hellohello";  

  public function connect () {
  $conn = mysqli_connect($this->servername,$this->username,$this->password,$this->database);
    if (mysqli_error($conn)) {
      die("Connection with database has failed: " . mysqli_error($conn));
    } 
    return $conn;
  }

}

$database = new Database();
$connection = $database->connect();



// Create Database
$sql = "CREATE DATABASE IF NOT EXISTS hellohello";
mysqli_query($connection, $sql) or die("Connection with database has failed: " . mysqli_error($connection));
 

// Create Tables - ADMINS
$sql = "CREATE TABLE IF NOT EXISTS admins (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    surname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    pwd VARCHAR(255) NOT NULL
) AUTO_INCREMENT = 12024000";
mysqli_query($connection, $sql) or die("Connection with database has failed: " . mysqli_error($connection));


// TUTORS
$sql = "CREATE TABLE IF NOT EXISTS tutors (
  id INT PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL,
  surname VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  pwd VARCHAR(255) NOT NULL
) AUTO_INCREMENT = 22024000";
mysqli_query($connection, $sql) or die("Connection with database has failed: " . mysqli_error($connection));


// COURSES
$sql = "CREATE TABLE IF NOT EXISTS coursedegrees (
  id INT PRIMARY KEY AUTO_INCREMENT,
  course_name VARCHAR(30) NOT NULL,
  number_of_students INT NOT NULL
)";
mysqli_query($connection, $sql) or die("Connection with database has failed: " . mysqli_error($connection));


// COURSE-TUTOR
$sql = "CREATE TABLE IF NOT EXISTS course_tutor (
  coursedegree_id INT,
  tutor_id INT,
  PRIMARY KEY (coursedegree_id, tutor_id),
  FOREIGN KEY (coursedegree_id) REFERENCES coursedegrees(id),
  FOREIGN KEY (tutor_id) REFERENCES tutors(id)
)";
mysqli_query($connection, $sql) or die("Connection with database has failed: " . mysqli_error($connection));


// STUDENTS
$sql = "CREATE TABLE IF NOT EXISTS students (
  id INT PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL,
  surname VARCHAR(50) NOT NULL,
  birth_date DATE NOT NULL,
  email VARCHAR(100) NOT NULL,
  pwd VARCHAR(255) NOT NULL,
  level_year ENUM('1', '2', '3') NOT NULL,
  coursedegree_id INT NOT NULL,
  FOREIGN KEY (coursedegree_id) REFERENCES coursedegrees(id)
) AUTO_INCREMENT = 32024000";
mysqli_query($connection, $sql) or die("Connection with database has failed: " . mysqli_error($connection));

// APPLICANTS
$sql = "CREATE TABLE IF NOT EXISTS applicants (
  id INT PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL,
  surname VARCHAR(50) NOT NULL,
  birth_date DATE NOT NULL,
  email VARCHAR(100) NOT NULL,
  pwd VARCHAR(255) NOT NULL,
  level_year ENUM('1', '2', '3') NOT NULL,
  coursedegree_id INT NOT NULL,
  FOREIGN KEY (coursedegree_id) REFERENCES coursedegrees(id)
) AUTO_INCREMENT = 32024000";
mysqli_query($connection, $sql) or die("Connection with database has failed: " . mysqli_error($connection));

mcxkdmkcxmdk
/*
$coursesToInsert = ["Accounting & Finance",
                    "Business Management",
                    "Computer Science",
                    "History",
                    "Law",
                    "Psychology"];

foreach ($coursesToInsert as $course) {
  $sql = "INSERT INTO coursedegrees (course_name,number_of_students) VALUES ('$course',0)";
  mysqli_query($connection, $sql) or die("Connection with database has failed: " . mysqli_error($connection));
}
/*
$sql = "INSERT INTO coursedegrees (course_name,number_of_students) VALUES ('nothing',0)";
mysqli_query($connection, $sql) or die("Connection with database has failed: " . mysqli_error($connection));
*/
// Close connection with database
mysqli_close($connection);

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup_style.css">
    <script src="../js/login.js"></script>
    <title>Sign Up</title>
</head>

<body>
    <div class="header-container">
        <h1>Liverpool Hope University</h1>
    </div>

    <div class="signup-container">
        <div class="signup-content">
            <h1>Sign Up Application</h1>
            <br>
            <form action="../includes/signup.inc.php" method="post">
                <select class="registration-data" name="courseDegree" id="courseDegree">
                    <option class="option" value="" disabled selected>Select Course Degree</option>
                    <option class="option" value="1">Accounting & Finance</option>
                    <option class="option" value="2">Business Management</option>
                    <option class="option" value="3">Computer Science</option>
                    <option class="option" value="4">History</option>
                    <option class="option" value="5">Law</option>
                    <option class="option" value="6">Psychology</option>
                </select>
                <input type="text" class="registration-data" id="name" name="name" placeholder="name">
                <img class="icon" src="../images/user-icon.png" alt="Icon">
                <br>
                <input type="text" class="registration-data" id="surname" name="surname" placeholder="surnname">
                <img class="icon "src="../images/user-icon.png" alt="Icon">
                <br>
                <input type="text" class="registration-data" id="birthDate" name="birthDate" placeholder="date of birth: yyyy-mm-dd">
                <img class="icon" src="../images/calendar-icon.png" alt="Icon">
                <br>
                <input type="text" class="registration-data" id="email" name="email" placeholder="e-mail">
                <img class="icon "src="../images/email-icon.png" alt="Icon">
                <br>
                <input type="password" class="registration-data" id="pwd" name="pwd" placeholder="password">
                <img class="icon" src="../images/lockopen-icon.png" alt="Icon">
                <br>
                <input type="password" class="registration-data" id="confirmPwd" name="confirmPwd" placeholder="confirm password">
                <img class="icon "src="../images/lock-icon.png" alt="Icon">
                <br>
                <button type="submit" name="submit" class="signup-button">Submit Application</button> 
            </form>
        <p>Already have an account? <a href="../Login/login.php">Login</a></p>
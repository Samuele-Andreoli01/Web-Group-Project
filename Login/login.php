<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login_style.css">
    <script src="../js/login.js"></script>
    <title>Login</title>
</head>

<body>
    <div class="header-container">
        <h1>Liverpool Hope University</h1>
    </div>

    <div class="login-container">
        <div class="login-content">
            <h1>Login</h1>
            <br>
            <form action="../includes/login.inc.php" method="post">
                <input type="text" id="userID" name="userID" placeholder="user ID">
                <img class="icon" src="../images/user-icon.png" alt="Icon">
                <br>
                <input type="password" id="pwd" name="pwd" placeholder="password">
                <img class="icon "src="../images/lock-icon.png" alt="Icon">
                <br>
                <button type="submit" class="login-button">Login</button> 
            </form>
        <p>Don't have an account? <a href="../Signup/signup.php">Sign Up</a></p>
        </div>
    </div>
</body>
</html>
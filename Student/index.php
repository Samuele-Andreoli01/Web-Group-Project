<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Button Example</title>
</head>
<body>

    <h1>Hello, <?php echo $_SESSION["name"]; ?></h1>


    <button onclick="myFunction()">Click me</button>

    <script>
        function myFunction() {
            alert("Button clicked!");
        }
    </script>

</body>
</html>

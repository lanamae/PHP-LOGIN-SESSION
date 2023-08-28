<?php
    // session_start();
    require ('session.php');

    // echo $_SESSION['username'];


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
</head>
<body>
    <div class="main">
        <h1>WELCOME TO HOME</h1>
    </div>

    <form action="logout.php" method="post">
        <input type="submit" value="LOGOUT">
    </form>
</body>
</html>
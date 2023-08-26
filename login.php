<?php
require ('database.php');

session_start();


if($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])){
    // default value
    $_SESSION['status'] = 'invalid' ;
    // echo "<script>window.location.href='login.php</script>";
}

if($_SESSION['status'] == 'valid'){
    echo "<script>window.location.href='home.php'</script>";
}




if(isset($_POST['login'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if(empty($username)||empty($password)){
        echo "Please enter all field";
    }

    else{
        $query_Accounts = "SELECT * FROM accounts WHERE username = '$username' and password = md5('$password')";
        $sql_Accounts = mysqli_query($connection, $query_Accounts);
        $results = mysqli_fetch_array($sql_Accounts);


        if(mysqli_num_rows($sql_Accounts) > 0){
            $_SESSION['status'] = 'valid';
            $_SESSION['username'] = $results['username'];
            echo "<script>window.location.href ='home.php' </script>";
        }

        else{
             $_SESSION['status'] = 'invalid';
             echo 'invalid';
        }
    }

}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>



<form action="/PHP-LOGIN-SESSION/login.php" method="post" style="border: solid 1px #000; padding: 30px; width: 40%;">
    
<h2>LOGIN YOUR ACCOUNT</h2>

    <label for="username">USERNAME</label>
    <input type="text" name="username" id="usernmae" placeholder="Enter your Username"><br><br>

    <label for="passowrd">PASSWORD</label>
    <input type="text" name="password" id="password" placeholder="Enter your Password"> <br><br>

    <input type="submit" value="LOGIN" name="login">
</form>
    
</body>
</html>
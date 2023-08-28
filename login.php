<?php
    require ('database.php');
    session_start();

    // echo $_SESSION['username'];

    if($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])){
        $_SESSION['status'] = 'invalid';
        
        // echo "<script>window.location.href='login.php'</script>";
    }

    if($_SESSION['status'] == 'valid'){
        echo "<script>window.location.href='home.php'</script>";
    }



    if(isset($_POST['login'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if(empty($username) || empty($password)){
            echo "Please fill up all field";
        }

        else{
            $query_Accounts = "SELECT * FROM accounts WHERE username = '$username' and password = md5('$password')";
            $sql_Accounts = mysqli_query($connection, $query_Accounts);
            $results = mysqli_fetch_array($sql_Accounts);

            if(mysqli_num_rows($sql_Accounts) > 0){
                $_SESSION['status'] = 'valid';
                $_SESSION['username'] = $results['username'];

                echo "valid";
                echo "<script>window.location.href='home.php'</script>";
            }

            else{
                $_SESSION['status'] = 'invalid';
                echo "invalid";
                echo "<script>window.location.href='login.php'</script>";
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
    

<div class="main">
    <form action="login.php" method="post" style="border: solid 5px #000; padding: 40px; width: 50%;">
        <h2>LOGIN YOUR CREATE</h2>
        
        <label for="username">USERNAME</label><br><br>
        <input type="text" name="username" id="username" placeholder="Enter your Username"> <br> <br>

        <label for="password">PASSWORD</label><br><br>
        <input type="password" name="password" id="password" placeholder="Enter your Password"><br><br>

        <input type="submit" value="LOGIN" name="login">



    </form>
</div>
</body>
</html>
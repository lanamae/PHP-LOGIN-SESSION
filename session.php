<?php
session_start();


if($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])){
    $_SESSION['status'] = 'invalid';
    
    // echo "<script>window.location.href='login.php'</script>";

    unset($_SESSION['username']); 

    echo "<script>window.location.href='login.php'</script>";   
}

?>
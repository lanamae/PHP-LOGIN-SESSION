<?php
session_start();


function pathTo($destination){
    echo "<script>window.location.href='$destination.php'</script>";

}

$_SESSION['status'] = 'invalid';

unset($_SESSION['username']);

pathTo('login');
?>
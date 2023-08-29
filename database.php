<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'php-login-session';


$connection = mysqli_connect($host, $user, $password, $database);


if(mysqli_connect_error()){
    echo 'Error:' .mysqli_connect_error();
}

else{
    echo 'Connected Successfully';
}


?>
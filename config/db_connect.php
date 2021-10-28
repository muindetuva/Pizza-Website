<?php

    //Connection to MYSQL
    $conn = mysqli_connect('localhost', 'tuva', 'test1234', 'ninja_pizza');

    //Check connection has worked
    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }

?>
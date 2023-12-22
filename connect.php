<?php
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'quanly';

    $conn = new mysqLi($server, $user, $pass, $database);

    if($conn){
        //mysqLi_query($conn, " SETNAME 'utf8' ");
        
    } else {
        echo ' ket noi that bai';
    }
?>
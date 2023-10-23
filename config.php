<?php
    $host = 'localhost';
    $user = 'fork9122_ryfer';
    $pass = 'Xepiting94n45';
    $db = 'fork9122_forum_pengajar_db';
    $conn = mysqli_connect($host, $user, $pass, $db);

    // if($conn){
    //     echo 'connected';
    // }else{
    //     echo 'disconnected';
    // }

    mysqli_select_db($conn, $db);

?>
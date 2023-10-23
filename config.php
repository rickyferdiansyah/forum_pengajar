<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'forum_pengajar_db';
    $conn = mysqli_connect($host, $user, $pass, $db);

    // if($conn){
    //     echo 'connected';
    // }else{
    //     echo 'disconnected';
    // }

    mysqli_select_db($conn, $db);

?>

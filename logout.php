<?php

    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['password']);



    session_destroy();

    echo "<script>alert('anda telah keluar');document.location='login.php';</script>";

?>
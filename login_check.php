<?php
    include 'config.php';

    $pass = $_POST['password'];
    $password = md5($pass);
    $username = $_POST['username'];

    //encryption method
    $ciphering_value = "AES-128-CTR";
    $encryption_key = "JavaTpoint";  

    //username encrypt
    $username_encrypted  = openssl_encrypt($username, $ciphering_value, $encryption_key); 
    //password encrypt
    $pass_encrypted  = openssl_encrypt($pass, $ciphering_value, $encryption_key);


    $queryUserCheck = "SELECT * FROM tb_user WHERE username = '$username'";
    $sqlUserCheck = mysqli_query($conn, $queryUserCheck);
    $userValid = mysqli_fetch_array($sqlUserCheck);

    if($userValid){
        if($password == $userValid['password']){
            //buat session
            session_start();
            $_SESSION['username'] = $userValid['username'];

            //buat cookie
            
            if($_POST['rememberme'] == "yes"){
                setcookie(md5('username'), $username_encrypted, time() + 3600 * 24);
                setcookie(md5('password'), $pass_encrypted, time() + 3600);
            }

            header('Location: index.php');
            
        }else{
            echo "<script>alert('password salah'); document.location = 'login.php'</script>";
        }
    }else{
        echo "<script>alert('username tidak terdaftar');document.location = 'login.php'</script>";
        
    }
    

?>

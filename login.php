<?php
    include 'config.php';
    session_start();

    //kalau ada cookies, masukkan cookie ke form
    if (isset($_COOKIE[md5('username')])){
        $username = $_COOKIE[md5('username')];
        $password = $_COOKIE[md5('password')];

        //decryption method
        $ciphering_value = "AES-128-CTR";  
        $decryption_key = "JavaTpoint";

        //username decrypt
        $username_decrypted = openssl_decrypt($username, $ciphering_value, $decryption_key);   
        //password decrypt
        $password_decrypted = openssl_decrypt($password, $ciphering_value, $decryption_key); 
    }

    //menghapus cookie yang ada
    if (isset($_GET['deleteCookies'])) {
        setcookie(md5('username'), "", time() - 3600 * 24); 
        setcookie(md5('password'), "", time() - 3600 * 24); 
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <div class="container mt-5">
        <form action="login_check.php" method="POST">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="username"
                    value="<?php 
                        if(!isset($username_decrypted)){    //jika tidak ada cookie username, maka echo kosong
                            echo "";    
                        }else{
                            echo $username_decrypted;      //jika ada cookie username, maka cookie username tersebut dimasukkan ke field
                        }
                    ?>" 
                autocomplete="off">
                <label for="username">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                    value="<?php 
                        if(!isset($password_decrypted)){    //jika tidak ada cookie password, maka echo kosong
                            echo "";
                        }else{
                            echo $password_decrypted;   //jika ada cookie password, maka cookie password tersebut dimasukkan ke field
                        }
                    ?>"
                autocomplete="off">
                <label for="password">Password</label>
            </div>
            <div>
                <input type="checkbox" id="rememberme" name="rememberme" value="yes">
                <label for="rememberme"> Remember Me</label><br>
            </div>
            <div>
                <?php
                    
                ?>
                <a href="login.php?deleteCookies=true">Delete Cookies</a>  <!-- saat diklik aan jalankan isset($_GET[deleteCookies]) dan isinya -->
                
            </div>
            <button type="submit" class="mt-3" style="width: 100%;">Log In</button>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

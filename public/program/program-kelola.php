<?php
    include '../../config.php';
    session_start();
    if(!isset($_SESSION['username'])){ //if login in session is not set
        header("Location: ../../login.php");
        
    }

        $kode_program = '';
        $jenjang_program = '';
        $jenis_program = '';
        $biaya = '';

    if(isset($_GET['ubah'])){
        $kode_program = $_GET['ubah'];

        $query = "SELECT * FROM tb_daftar_program WHERE kode_program = '$kode_program';";
        $sql = mysqli_query($conn, $query);
        $result = mysqli_fetch_assoc($sql);

        $kode_program = $result['kode_program'];
        $jenjang_program = $result['jenjang_program'];
        $jenis_program = $result['jenis_program'];
        $biaya = $result['biaya'];
        
    }
    if ($_SESSION['username'] != "admin00") { //yang bisa masuk ke laman ini cuma admin00
        echo "<script>alert('anda tidak dapat menambahkan/mengubah daftar program'); document.location = 'program-list.php';</script>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Program</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>

    <div class="container border border-secondary border-2 rounded mb-5 p-5" style="width:40vw;">
        <form action="../../controllers/program-proses.php" method="POST">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 10vw;">
                        <label for="kode_program">Kode Program</label>
                    </td>
                    <td>
                        <input style="width: 100%;" type="text" name="kode_program" id="kode_program" value="<?php echo $kode_program; ?>" placeholder="4 digit kode" required autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="jenjang_program">Jenjang Program</label>
                    </td>
                    <td>
                        <input style="width: 100%;" type="text" name="jenjang_program" id="jenjang_program" value="<?php echo $jenjang_program; ?>" placeholder="eg. SD/SMP/SMA" required autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label  for="jenis_program">Jenis Program</label>
                    </td>
                    <td>
                        <input style="width: 100%;" type="text" name="jenis_program" id="jenis_program" value="<?php echo $jenis_program; ?>" placeholder="eg. Reguler/Intensif" required autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="biaya">Biaya</label>
                    </td>
                    <td>
                        <input style="width: 100%;" type="text" name="biaya" id="biaya" value="<?php echo $biaya; ?>" placeholder="eg. 1000000" required autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="display: flex; justify-content: right;">
                        <?php
                            if(isset($_GET['ubah'])){
                        ?>
                            <button type="submit" name="aksi" class="btn btn-primary mt-4" value="edit">Simpan Perubahan</button>
                        <?php
                            }
                            else{
                        ?>
                            <button type="submit" name="aksi" class="btn btn-primary mt-4" value="add">Tambahkan</button>
                        <?php
                            }
                        ?>

                        <a href="program-list.php" class="mx-1"><button type="button" class="btn btn-danger mt-4">Batal</button></a>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
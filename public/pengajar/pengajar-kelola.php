<?php
include '../../config.php';
session_start();
if (!isset($_SESSION['username'])) { //if login in session is not set
    header("Location: ../../login.php");
}


$id_pengajar = '';
$nama_pengajar = '';
$no_telepon = '';

if (isset($_GET['ubah'])) {
    $id_pengajar = $_GET['ubah'];

    $query = "SELECT * FROM tb_daftar_pengajar WHERE id_pengajar = '$id_pengajar';";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);

    $id_pengajar = $result['id_pengajar'];;
    $nama_pengajar = $result['nama_pengajar'];;
    $no_telepon = $result['no_telepon'];;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengajar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        input[name=id_pengajar] {
            background-color: #ccc;
        }

        input[name=id_pengajar]:focus {
            outline: none;
        }
    </style>
</head>

<body>

    <div class="container border border-secondary border-2 rounded mb-5 p-5" style="width:40vw;">
        <form action="../../controllers/pengajar-proses.php" method="POST" enctype="multipart/form-data">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 10vw;">
                        <label for="id_pengajar">ID Pengajar</label>
                    </td>
                    <td>
                        <input style="width: 100%;" type="text" name="id_pengajar" id="id_pengajar" value="<?php echo $id_pengajar; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nama_pengajar">Nama Pengajar</label>
                    </td>
                    <td>
                        <input style="width: 100%;" type="text" name="nama_pengajar" id="nama_pengajar" value="<?php echo $nama_pengajar; ?>" placeholder="eg. Alex" required autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="no_telepon">No Telepon</label>
                    </td>
                    <td>
                        <input style="width: 100%;" type="text" name="no_telepon" id="no_telepon" value="<?php echo $no_telepon; ?>" placeholder="081222333444" required autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="fotopengajar">Foto</label>
                    </td>
                    <td>
                        <input type="file" name="foto_pengajar">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <?php
                        if (isset($_GET['ubah'])) {
                        ?>
                            <input type="checkbox" name="simpanGambar">Simpan perubahan Gambar
                        <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="display: flex; justify-content: right;">
                        <?php
                        if (isset($_GET['ubah'])) {
                        ?>
                            <button type="submit" name="aksi" class="btn btn-primary mt-4" value="edit">Simpan Perubahan</button>
                        <?php
                        } else {
                        ?>
                            <button type="submit" name="aksi" class="btn btn-primary mt-4" value="add">Tambahkan</button>
                        <?php
                        }
                        ?>

                        <a href="pengajar-list.php" class="mx-1"><button type="button" class="btn btn-danger mt-4">Batal</button></a>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
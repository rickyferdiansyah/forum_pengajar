<?php
include '../../config.php';
session_start();
if (!isset($_SESSION['username'])) { //if login in session is not set
    header("Location: ../../login.php");
}


$queryProgram = "SELECT kode_program FROM tb_daftar_program ORDER BY kode_program ASC";
$sqlProgram = $conn->query($queryProgram);
// $resultProgram = mysqli_fetch_array($sqlProgram); //ini jangan dipakai, kalau dipakai akan menghilangkan row pertama. note: hanya dipakai di dalam loop

$id_pelajar = '';
$nama_pelajar = '';
$status_pembayaran = '';
// $kode_program = $resultProgram['kode_program'];

if (isset($_GET['ubah'])) {
    $id_pelajar = $_GET['ubah'];

    $query = "SELECT id_pelajar, nama_pelajar, status_pembayaran, tb_daftar_program.kode_program FROM tb_daftar_pelajar INNER JOIN tb_daftar_program ON tb_daftar_pelajar.kode_program = tb_daftar_program.kode_program WHERE id_pelajar = $id_pelajar";
    $sql = $conn->query($query);
    $result = mysqli_fetch_assoc($sql);

    $nama_pelajar = $result['nama_pelajar'];
    $status_pembayaran = $result['status_pembayaran'];
    $resultProgram = mysqli_fetch_array($sqlProgram);
    $kode_program = $resultProgram['kode_program'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pelajar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        input[name=id_pelajar] {
            background-color: #ccc;
        }

        input[name=id_pelajar]:focus {
            outline: none;
        }
    </style>
</head>

<body>
    <div class="container border border-secondary border-2 rounded mb-5 p-5" style="width:40vw;">
        <form action="../../controllers/pelajar-proses.php" method="POST">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 10vw;">
                        <label for="id_pelajar">ID Pelajar</label>
                    </td>
                    <td>
                        <input style="width: 100%;" type="text" name="id_pelajar" id="id_pelajar" value="<?php echo $id_pelajar; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nama_pelajar">Nama Pelajar</label>
                    </td>
                    <td>
                        <input style="width: 100%;" type="text" name="nama_pelajar" id="nama_pelajar" value="<?php echo $nama_pelajar; ?>" required autocomplete="off">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="status_pembayaran">Status Pembayaran</label>
                    </td>
                    <td>
                        <select name="status_pembayaran" id="status_pembayaran" required>
                            <option value="<?php echo $result['status_pembayaran']; ?>" selected>
                                <?php
                                if (!isset($result)) {
                                    echo "";
                                } else {
                                    echo $result['status_pembayaran'];
                                }
                                ?>
                            </option>
                            <option value="" disabled>--</option>
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Lunas">Belum Lunas</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="kode_program">Kode Program</label>
                    </td>
                    <td>
                        <Select name="kode_program" required>
                            <option value="<?php echo $result['kode_program']; ?>" selected>
                                <?php
                                if (!isset($result)) {
                                    echo "";
                                } else {
                                    echo $result['kode_program'];
                                }
                                ?>
                            </option>
                            <option value="" disabled>--</option>
                            <?php
                            while ($resultProgram = mysqli_fetch_array($sqlProgram)) :;
                            ?>
                                <option value="<?php echo $resultProgram['kode_program']; ?>">
                                    <?php echo $resultProgram['kode_program'];
                                    ?>
                                </option>


                            <?php
                            endwhile;
                            // While loop must be terminated
                            ?>
                        </Select>
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

                        <a href="pelajar-list.php" class="mx-1"><button type="button" class="btn btn-danger mt-4">Batal</button></a>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
<?php
    include '../../config.php';
    session_start();
    if(!isset($_SESSION['username'])){ //if login in session is not set
        header("Location: ../../login.php");
    }
    

    $query = "SELECT * FROM tb_daftar_program ORDER BY biaya ASC";
    $sql = mysqli_query($conn, $query)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Pengajar - Program</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        html,body{
            height:100%;
        }
    </style>
    
</head>
<body>

    <nav class="navbar navbar-light bg-dark" style="border-bottom: solid cyan 2px;">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="../index.php">Forum Pengajar</a>
        </div>
    </nav>
    
    <div class="container-fluid p-0" style="height:100%;">
        <div class="row w-100" style="height:100%;">
            <div class="col p-0" style="display:flex; flex-direction:column;">
                <div class="container-fluid bg-dark pe-0 text-left" style="flex:1; height:100%;">
                    <a href="" type="button" class="btn-dark w-100 py-2 text-decoration-none">User : <?php echo $_SESSION['username']; ?></a>
                    <a href="../../index.php" type="button" class="btn-dark w-100 py-2 text-decoration-none">Dashboard</a>
                    <a href="../pelajar/pelajar-list.php" type="button" class="btn-dark w-100 py-2 text-decoration-none">Data Pelajar</a>
                    <a href="../pengajar/pengajar-list.php" type="button" class="btn-dark w-100 py-2 text-decoration-none">Data Pengajar</a>
                    <a href="../program/program-list.php" type="button" class="btn-dark w-100 py-2 text-decoration-none active">Daftar Program</a>
                    <a href="../../logout.php" type="button" class="btn-dark w-100 py-2 text-decoration-none">Log Out</a>
                </div>
            </div>
            <div class="col-10 p-0">
                <div class="container mt-4">
                    <h1>Daftar Program</h1>
                    <?php
                        $queryCount = "SELECT COUNT(kode_program) FROM tb_daftar_program;";
                        $sqlCount = $conn->query($queryCount);

                    ?>
                    <h6 class="mb-3">Jumlah Program : <?php while($resultCount = mysqli_fetch_array($sqlCount)){ echo $resultCount['COUNT(kode_program)']; }?> </h6>

                    <a href="program-kelola.php" type="button" class="btn btn-primary"><b>+</b> Tambahkan Program</a>
                    <div class="table-responsive mt-2">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Kode Program</th>
                                    <th>Jenjang Program</th>
                                    <th>Jenis Program</th>
                                    <th>Biaya</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $batas = 10;
                                    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                                    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
                    
                                    $previous = $halaman - 1;
                                    $next = $halaman + 1;
                                    
                                    $data = mysqli_query($conn,"SELECT * FROM tb_daftar_program ORDER BY biaya ASC");
                                    $jumlah_data = mysqli_num_rows($data);
                                    $total_halaman = ceil($jumlah_data / $batas);

                                    $data_program = mysqli_query($conn,"SELECT * FROM tb_daftar_program ORDER BY biaya ASC limit $halaman_awal, $batas");
                                    $nomor = $halaman_awal+1;
                                    while ($result = mysqli_fetch_assoc($data_program)){

                                ?>
                                <tr>
                                    <td><?php echo $result['kode_program']; ?></td>
                                    <td><?php echo $result['jenjang_program']; ?></td>
                                    <td><?php echo $result['jenis_program']; ?></td>
                                    <td>Rp. <?php echo $result['biaya']; ?></td>
                                    <td>
                                        <a href="program-kelola.php?ubah=<?php echo $result['kode_program'];?>" type="button" class="btn btn-sm btn-success">
                                            Ubah
                                        </a>
                                        <a href="../../controllers/program-proses.php?hapus=<?php echo $result['kode_program']; ?>" type="button" class="btn btn-sm btn-danger" onClick="return confirm('yakin nih?');">Hapus</a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                                </li>
                                <?php 
                                for($x=1;$x<=$total_halaman;$x++){
                                    ?> 
                                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                    <?php
                                }
                                ?>				
                                <li class="page-item">
                                    <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
     


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
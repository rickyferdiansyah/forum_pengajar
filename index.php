<?php
    include 'config.php';
    session_start();
    if(!isset($_SESSION['username'])){ //if login in session is not set
        header("Location: login.php");
    }
        

    //query penarikan data program
    $queryProgramCount = "SELECT COUNT(kode_program) FROM tb_daftar_program;";
    $sqlProgramCount = $conn->query($queryProgramCount);

    //query penarikan data pengajar
    $queryPengajarCount = "SELECT COUNT(id_pengajar) FROM tb_daftar_pengajar;";
    $sqlPengajarCount = $conn->query($queryPengajarCount);

    //query penarikan data pelajar
    $queryPelajarCount = "SELECT COUNT(id_pelajar) FROM tb_daftar_pelajar;";
    $sqlPelajarCount = $conn->query($queryPelajarCount);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Pengajar - Dashboard</title>
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
            <a class="navbar-brand text-light" href="#">Forum Pengajar</a>
        </div>
    </nav>


    <div class="container-fluid p-0" style="height:100%;">
        <div class="row w-100" style="height:100%;">
            <div class="col p-0" style="display:flex; flex-direction:column;">
                <div class="container-fluid bg-dark pe-0 text-left"  style="flex:1; height: 100%;">
                    <a href="" type="button" class="btn-dark w-100 py-2 text-decoration-none">User : <?php echo $_SESSION['username']; ?></a>
                    <a href="index.php" type="button" class="btn-dark w-100 py-2 text-decoration-none active">Dashboard</a>
                    <a href="public/pelajar/pelajar-list.php" type="button" class="btn-dark w-100 py-2 text-decoration-none">Data Pelajar</a>
                    <a href="public/pengajar/pengajar-list.php" type="button" class="btn-dark w-100 py-2 text-decoration-none">Data Pengajar</a>
                    <a href="public/program/program-list.php" type="button" class="btn-dark w-100 py-2 text-decoration-none">Daftar Program</a>
                    <a href="logout.php" type="button" class="btn-dark w-100 py-2 text-decoration-none">Log Out</a>
                </div>
            </div>
            <div class="col-10 p-0">
                <div class="container mt-4">
                    <h1>
                    Dashboard
                </h1>
                <div>
                    Jumlah Program Terdaftar :
                    <b>
                        <?php
                            while ($resultProgramCount = mysqli_fetch_array($sqlProgramCount)){
                            echo $resultProgramCount['COUNT(kode_program)'];
                            }
                        ?>
                    </b>     
                </div>

                <div>
                    Jumlah Pengajar Terdaftar : 
                    <b>
                        <?php
                            while ($resultPengajarCount = mysqli_fetch_array($sqlPengajarCount)){
                            echo $resultPengajarCount['COUNT(id_pengajar)'];
                            }
                        ?>
                    </b>
                </div>

                <div>
                    Jumlah Pelajar Terdaftar :
                    <b>
                        <?php
                            while ($resultPelajarCount = mysqli_fetch_array($sqlPelajarCount)){
                                echo $resultPelajarCount['COUNT(id_pelajar)'];
                            }
                        ?>
                    </b>
                </div>

                <div>
                    <!-- chart -->
                    <div>

                        <!-- SD1R -->
                        <?php
                            $queryCountSD1R = "SELECT COUNT(id_pelajar) FROM tb_daftar_pelajar WHERE kode_program = 'SD1R';";
                            $sqlCountSD1R = $conn->query($queryCountSD1R);
                        ?>
                        <!-- SD1S -->
                        <?php
                            $queryCountSD1S = "SELECT COUNT(id_pelajar) FROM tb_daftar_pelajar WHERE kode_program = 'SD1S';";
                            $sqlCountSD1S = $conn->query($queryCountSD1S);
                        ?>
                        <!-- SD4R -->
                        <?php
                            $queryCountSD4R = "SELECT COUNT(id_pelajar) FROM tb_daftar_pelajar WHERE kode_program = 'SD4R';";
                            $sqlCountSD4R = $conn->query($queryCountSD4R);
                        ?>
                        <!-- SD4S -->
                        <?php
                            $queryCountSD4S = "SELECT COUNT(id_pelajar) FROM tb_daftar_pelajar WHERE kode_program = 'SD4S';";
                            $sqlCountSD4S = $conn->query($queryCountSD4S);
                        ?>
                        <!-- SMPR -->
                        <?php
                            $queryCountSMPR = "SELECT COUNT(id_pelajar) FROM tb_daftar_pelajar WHERE kode_program = 'SMPR';";
                            $sqlCountSMPR = $conn->query($queryCountSMPR);
                        ?>
                        <!-- SMPS -->
                        <?php
                            $queryCountSMPS = "SELECT COUNT(id_pelajar) FROM tb_daftar_pelajar WHERE kode_program = 'SMPS';";
                            $sqlCountSMPS = $conn->query($queryCountSMPS);
                        ?>
                        <!-- SMAR -->
                        <?php
                            $queryCountSMAR = "SELECT COUNT(id_pelajar) FROM tb_daftar_pelajar WHERE kode_program = 'SMAR';";
                            $sqlCountSMAR = $conn->query($queryCountSMAR);
                        ?>
                        <!-- SMAS -->
                        <?php
                            $queryCountSMAS = "SELECT COUNT(id_pelajar) FROM tb_daftar_pelajar WHERE kode_program = 'SMAS';";
                            $sqlCountSMAS = $conn->query($queryCountSMAS);
                        ?>
                    </div>

                    <!-- canvas  -->
                    <div style="width: 80%; margin: auto; margin-top: 3em;"> 
                        <h4><center>Jumlah Pelajar Berdasarkan Program</center></h4>
                        <canvas id="myChart"></canvas>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <script>
                        const ctx = document.getElementById('myChart');

                        new Chart(ctx, {
                            type: 'bar',
                            data: {
                            labels: ['SD1R', 'SD1S', 'SD4R', 'SD4S', 'SMPR', 'SMPS', 'SMAR', 'SMAS'],
                            datasets: [{
                                barPercentage: 0.8,
                                borderRadius: 10,
                                label: '# jumlah siswa',
                                data: [
                                    <?php while($resultCountSD1R = mysqli_fetch_array($sqlCountSD1R)){ echo $resultCountSD1R['COUNT(id_pelajar)']; }?>, 
                                    <?php while($resultCountSD1S = mysqli_fetch_array($sqlCountSD1S)){ echo $resultCountSD1S['COUNT(id_pelajar)']; }?>, 
                                    <?php while($resultCountSD4R = mysqli_fetch_array($sqlCountSD4R)){ echo $resultCountSD4R['COUNT(id_pelajar)']; }?>, 
                                    <?php while($resultCountSD4S = mysqli_fetch_array($sqlCountSD4S)){ echo $resultCountSD4S['COUNT(id_pelajar)']; }?>, 
                                    <?php while($resultCountSMPR = mysqli_fetch_array($sqlCountSMPR)){ echo $resultCountSMPR['COUNT(id_pelajar)']; }?>, 
                                    <?php while($resultCountSMPS = mysqli_fetch_array($sqlCountSMPS)){ echo $resultCountSMPS['COUNT(id_pelajar)']; }?>, 
                                    <?php while($resultCountSMAR = mysqli_fetch_array($sqlCountSMAR)){ echo $resultCountSMAR['COUNT(id_pelajar)']; }?>, 
                                    <?php while($resultCountSMAS = mysqli_fetch_array($sqlCountSMAS)){ echo $resultCountSMAS['COUNT(id_pelajar)']; }?>
                                ],
                                borderWidth: 1
                            }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: {
                                            precision: 0  //supaya tidak decimal
                                        }
                                    }
                                }
                            }
                        });
                        </script>
                    </div> 
                </div>
                </div>
                

                
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>


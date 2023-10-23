<?php
    include '../config.php';

    if(isset($_POST['aksi'])){
        $kode_program = $_POST['kode_program'];
        $jenjang_program = $_POST['jenjang_program'];
        $jenis_program = $_POST['jenis_program'];
        $biaya = $_POST['biaya'];
        if($_POST['aksi'] == "add"){

            $query = "INSERT INTO tb_daftar_program VALUES('$kode_program', '$jenjang_program', '$jenis_program', '$biaya');";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: ../public/program/program-list.php");
            }
            else {
                echo " gagal menambahkan ".$query;
            }
        }
        else if($_POST['aksi'] == "edit"){
            
            $query = "UPDATE tb_daftar_program SET kode_program = '$kode_program', jenjang_program = '$jenjang_program', jenis_program = '$jenis_program', biaya = $biaya WHERE kode_program = '$kode_program';";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: ../public/program/program-list.php");
            }
            else {
                echo " gagal update data ".$query;
            }
        }
    }

    if(isset($_GET['hapus'])){
        if ($_SESSION['username'] != "admin00") { //yang bisa hapus daftar program cuma admin00
            echo "<script>alert('Anda tidak dapat menghapus daftar program'); document.location = '../public/program/program-list.php';</script>";
        }
        $kode_program = $_GET['hapus'];
        $query = "DELETE FROM tb_daftar_program WHERE kode_program = '$kode_program';";
        $sql = mysqli_query($conn, $query);
        
        if($sql){
            header("location: ../public/program/program-list.php");
        }
        else {
            echo $query;
        }
    }


?>
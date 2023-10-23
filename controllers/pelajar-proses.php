<?php
    include '../config.php';

    if(isset($_POST['aksi'])){
        
        $id_pelajar = $_POST['id_pelajar'];
        $nama_pelajar = $_POST['nama_pelajar'];
        $status_pembayaran = $_POST['status_pembayaran'];
        $kode_program = $_POST['kode_program'];

        if($_POST['aksi'] == "add"){

            $query = "INSERT INTO tb_daftar_pelajar (nama_pelajar, status_pembayaran, kode_program) VALUES('$nama_pelajar', '$status_pembayaran', '$kode_program');";
            $sql = mysqli_query($conn, $query);

            
            if($sql){
                header("location: ../public/pelajar/pelajar-list.php");
            }
            else {
                echo " gagal menambahkan ".$query;
                
            }
        }
        else if($_POST['aksi'] == "edit"){
            
            $query = "UPDATE tb_daftar_pelajar SET nama_pelajar = '$nama_pelajar', status_pembayaran = '$status_pembayaran', kode_program = '$kode_program' WHERE id_pelajar = $id_pelajar;";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: ../public/pelajar/pelajar-list.php");
            }
            else {
                echo " gagal update data ".$query;
            }
        }
    }

    if(isset($_GET['hapus'])){
        $id_pelajar = $_GET['hapus'];
        $query = "DELETE FROM tb_daftar_pelajar WHERE id_pelajar = '$id_pelajar';";
        $sql = mysqli_query($conn, $query);
        
        if($sql){
            header("location: ../public/pelajar/pelajar-list.php");
        }
        else {
            echo $query;
        }
    }


?>
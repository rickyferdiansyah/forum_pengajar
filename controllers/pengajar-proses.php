<?php
    include '../config.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){

            // echo '<pre>' , var_dump($_FILES) , '</pre>';
            // die();

            $id_pengajar = $_POST['id_pengajar'];
            $nama_pengajar = $_POST['nama_pengajar'];
            $no_telepon = $_POST['no_telepon'];

            $img_name = $_FILES["foto_pengajar"]["name"];
            $temp_name = $_FILES["foto_pengajar"]["tmp_name"];
            $folder = "../uploads/";

            $query = "INSERT INTO tb_daftar_pengajar (nama_pengajar, no_telepon, foto_pengajar) VALUES('$nama_pengajar', '$no_telepon', '$img_name');";
            $sql = mysqli_query($conn, $query);

        
            move_uploaded_file($temp_name, $folder.$img_name);

            if($sql){
                header("location: ../public/pengajar/pengajar-list.php");
            }
            else {
                echo " gagal menambahkan ".$query;
            }
        }
        else if($_POST['aksi'] == "edit"){
        
            $id_pengajar = $_POST['id_pengajar'];
            $nama_pengajar = $_POST['nama_pengajar'];
            $no_telepon = $_POST['no_telepon'];

            $img_name = $_FILES["foto_pengajar"]["name"];
            $temp_name = $_FILES["foto_pengajar"]["tmp_name"];
            $folder = "../uploads/";

            
            move_uploaded_file($temp_name, $folder.$img_name);

            

            if($_POST['simpanGambar'] == true){
                $query = "UPDATE tb_daftar_pengajar SET nama_pengajar = '$nama_pengajar', no_telepon = '$no_telepon', foto_pengajar = '$img_name' WHERE id_pengajar = $id_pengajar;";
                $sql = mysqli_query($conn, $query);
            }else{
                $query = "UPDATE tb_daftar_pengajar SET id_pengajar = $id_pengajar, nama_pengajar = '$nama_pengajar', no_telepon = '$no_telepon' WHERE id_pengajar = $id_pengajar;";
                $sql = mysqli_query($conn, $query);
            }
            
            if($sql){
                header("location: ../public/pengajar/pengajar-list.php");
            }
            else {
                echo " gagal update data ".$query;
            }
        }
    }

    if(isset($_GET['hapus'])){
        $id_pengajar = $_GET['hapus'];
        $query = "DELETE FROM tb_daftar_pengajar WHERE id_pengajar = '$id_pengajar';";
        $sql = mysqli_query($conn, $query);
        
        if($sql){
            header("location: ../public/pengajar/pengajar-list.php");
        }
        else {
            echo $query;
        }
    }


?>
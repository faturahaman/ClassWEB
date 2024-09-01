<?php
session_start();

// cek apakah user sudah login

if(!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;

}

require 'functions.php';

$id= $_GET["id"];

if (hapus($id)>0){
    echo"
    <script>
    alert('data berhasil di hapus');
    document.location.href= 'admin.php';
    </script>
    ";
}else {
    echo"
    <script>
    alert('data gagal dihapus');
    document.location.href= 'admin.php';
    </script>
    ";
};
?>
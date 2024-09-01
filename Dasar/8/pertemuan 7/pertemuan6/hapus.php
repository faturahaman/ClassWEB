<?php
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
    alert('data gagal berhasil dihapus');
    document.location.href= 'admin.php';
    </script>
    ";
};
?>
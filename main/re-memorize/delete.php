<?php

require 'functions.php';

$id= $_GET["id"];

if (delete($id)>0){
    echo"
    <script>
    alert('data berhasil di hapus');
    document.location.href= 'datasiswa.php';
    </script>
    ";
}else {
    echo"
    <script>
    alert('data gagal dihapus');
    document.location.href= 'datasiswa.php';
    </script>
    ";
};
?>
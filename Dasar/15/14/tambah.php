<?php
session_start();

// cek apakah user sudah login

if(!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;

}

require 'functions.php';


// cek apakah di submit
if ( isset($_POST["submit"])){
// cek data
    if (tambah($_POST)>0){
        echo"
        <script>
        alert('data berhasil di tambahkan');
        document.location.href= 'index.php';
        </script>
        ";
    }else {
        echo "
        <script>
        alert('data gagal di tambahkan');
        document.location.href= 'index.php';
        </script>
        ";
    }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.form-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
}

form {
    display: flex;
    flex-direction: column;
}

h2 {
    margin-bottom: 20px;
    text-align: center;
}

label {
    margin-bottom: 5px;
    color: #333;
}

input[type="text"]{
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
<div class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
            <h2>Penambahan data</h2>
            <label for="NRP">NRP :</label>
            <input type="text" id="NRP" name="NRP" required>
            
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
            
            <label for="email">email:</label>
            <input type="text" id="email" name="email" >
            
            <label for="jurusan">Jurusan:</label>
            <input type="text" id="jurusan" name="jurusan"require >
            
            <label for="gambar">Gambar:</label>
            <input type="file" id="gambar" name="gambar" require>
            
            <button type="submit" name="submit">Tambah data</button>
        </form>
    </div>
</body>
</html>
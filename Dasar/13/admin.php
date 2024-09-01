<?php 
session_start();
// cek apakah user sudah login

if(!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;

}



// koneksi database
// $DB = mysqli_connect("localhost","root","","phpdasar");
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// tombol cari di tekan
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <style>
        body {  
            background-color: lightblue;
            box-sizing: border-box;
            padding: 12px;
            font-family: sans-serif;
        }
        h1 {
            font-family: sans-serif;
        }
        table {
            text-align: center;

        }
        input {
            size: 40px;
            border-radius: 8;
            height: 25px;
            margin: 12px;
        }
        form {
            background-color: white;
            width: 250px;
            border-radius: 12px;
            margin-bottom: 12px;
        }
        h3 {
            text-decoration: none;
            color: black;
        }
        .tambah {
            width: 150px;
            height: fit-content;
            background-color: #3498db;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            transition: width 0.5s ease, height 0.5s ease;
            border-radius: 12px;
        }

        .tambah:hover {
            width: 300px;
            height: fit-content;
        }
        .tambah a {
            margin: 0;
            white-space: nowrap;
        }
        .logout-box {
            display: flex;
            padding: 2px;
            border: 2px solid black;
            width: fit-content; 
            padding-right: 15px;
            gap: 12px;
            margin-bottom: 12px;
        }
        .logout-box a{
            justify-content: center;
            display: flex;
        }

       
        </style>
        <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  -->
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body>
    <h1>Student list</h1>
    <div class="tambah">
         <a href="tambah.php" style="width: fit-content;">
            <h3>tambah data mahasiswa <box-icon type='solid' name='file-plus'></box-icon></h3>
        </a>
        </div>
        <br>

    <form action="" method="post">
        <input type="text" name="keyword" class="search-b" autofocus placeholder="Search" autocomplete="off">
        <button type="submit" name="cari" class="search-btn">
        <box-icon name='search-alt-2' ></box-icon>
        </button>
    </form>
    <div class="logout-box">
        <a href="logout.php">
            <box-icon type='solid' name='log-out' style="margin-top:12px ;"></box-icon>
            <p>logout</p>
        </a>
    </div>

    <table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>no. absen</th>
        <th>Action</th>
        <th>Picture</th>
        <th>No. Absen</th>
        <th>Name</th>
        <th>email</th>
        <th>jurusan</th>
    </tr>
    <?php $i=1?>

    <?php foreach($mahasiswa as $row) :?>
    <tr>
        <td><?= $i ?></td>
        <td>
            <a href="ubah.php?id=<?= $row["id"];?>">
            <box-icon name='edit'></box-icon>
            </a>|
            <a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('yakin?')";>
            <box-icon name='trash' type='solid' ></box-icon>
            </a>
        </td>
        <td><img src="img/<?= $row["gambar"];?>" alt="" width="50"></td>
        <td><?= $row["NRP"];?></td>
        <td><?= $row["nama"];?></td>
        <td><?= $row["email"];?></td>
        <td><?= $row["jurusan"];?></td>
    </tr>

    <?php $i++?>
    <?php endforeach; ?>

    </table>


</body>
</html>
<?php 
// koneksi database
// $DB = mysqli_connect("localhost","root","","phpdasar");
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");


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
    </style>
</head>
<body>
    <h1>Student list</h1>

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
            <a href="">Edit</a>|
            <a href="">Delete</a>
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
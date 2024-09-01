<?php 
// koneksi database
$DB = mysqli_connect("localhost","root","","phpdasar");
// ambil data dari table siswa/ query data siswa
$result = mysqli_query($DB,"SELECT * FROM mahasiswa");

// ambil data (fetch) mahasiswa dari object result
// mysqli_fetch_row() mengambil data secara numeric
// mysqli_fetch_assoc()mengambil data secara associative
// mysqli_fetch_array()mengambil data secara dua duanya
// mysqli_fetch_object()

// while($mhs = mysqli_fetch_assoc($result)) {
//     var_dump($mhs);
// };


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
    <?php while($row = mysqli_fetch_assoc($result)): ?>
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
    <?php endwhile; ?>

    </table>


</body>
</html>
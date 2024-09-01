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

// pagination
$jumlahDataPerhalaman = 3;
// $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$keyword = isset($_POST["keyword"]) ? $_POST["keyword"]: '';
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanActive = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerhalaman * $halamanActive) - $jumlahDataPerhalaman;

$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData,$jumlahDataPerhalaman");


// tombol cari di tekan
if (isset($_POST["cari"])) {
    
    $mahasiswa = cari($keyword);
    $jumlahData = count($mahasiswa);
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
    $mahasiswa = array_slice($mahasiswa, $awalData, $jumlahDataPerhalaman);

} else {

    $jumlahData = count(query("SELECT * FROM mahasiswa"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
    $mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerhalaman");

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
            border-radius: 12px;
            background-color: whitesmoke;
        }
        .logout-box a{
            justify-content: center;
            display: flex;
            color: black;
            text-decoration: none;
            
        }

        
        .nav-page a {
            text-decoration: none;
            color: inherit;
        }
        .hal-active {
            font-weight: bold;
            color: green;
        }
        .nav-page {
            background-color: white;
            width: fit-content;
            padding-left: 12px;
            padding-right: 12px;
            margin-top: 8px;
            border-radius: 12px;
        }

        .box-1 {
            display: flex;
            gap: 12px;
        }

       
        </style>
        <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  -->
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body>
    <h1>Student list</h1>
    <br>
    <div class="box-1">
            <div class="tambah">
                 <a href="tambah.php" style="width: fit-content;">
                    <h3>tambah data mahasiswa <box-icon type='solid' name='file-plus'></box-icon></h3>
                </a>
                </div>

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

        </div>

    <table border="1" cellpadding="10" cellspacing="0" style="border-radius: 12px;">
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
            </a>
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
    <!-- navigasi page -->
    <div class="nav-page">
        <!-- tombol next page -->
        <?php if ($halamanActive > 1): ?>
            <a href="?halaman=<?= $halamanActive - 1;?>">&laquo;</a>
            <?php endif; ?>
            <!-- page nav -->
        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
            <?php if ($i == $halamanActive) : ?>
                <a href="?halaman=<?= $i ?>" class="hal-active"><?= $i ?></a>
            <?php else : ?>
                <a href="?halaman=<?= $i ?>"><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <!-- tombol down page -->
        <?php if ($halamanActive < 1): ?>
            <a href="?halaman=<?= $halamanActive + 1;?>">&raquo;</a>
            <?php endif; ?>
            <?php if( $halamanActive < $jumlahHalaman ) : ?>
	<a href="?halaman=<?= $halamanActive + 1; ?>">&raquo;</a>
<?php endif; ?>
    </div>
        


</body>
</html>
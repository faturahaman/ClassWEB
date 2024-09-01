<?php
// variable scope/lingkup variable
// $x = 10;

// function tampilX() {
//     global $x
//     echo$x ;
// }
// tampilX();

// super global variable:
// $_COOKIE
// $_ENV
// $_GET
// $_POST
// $_SESSION
// $_REQUEST
// $_SERVER
// merupakan array associative
$mahasiswa = [
    [
    "nama" => "sandhikagalih",
    "NPM" => "08007789",
    "jurusan"=>"teknik informatika Quantum",
    "email" => "goblok@gmail.com",
    "gambar" => "img1.jpg",
    "nilai" => [90,93,23]

    ],
    [
    "nama" => "sah",
    "NPM" => "080077989",
    "jurusan"=>"teknik Quantum",
    "email" => "blok@gmail.com",
    "nilai" => [90,93,23],
    "gambar" => "img1.jpg"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <ul>
        <?php foreach($mahasiswa as $mhs ): ?>
            <a href="latihan2.php?nama=<?php echo$mhs["nama"]; ?>">
                <li><?php echo$mhs["nama"]?>
            </a>
        </li>
            <?php endforeach;  ?>
    </ul>
</body>
</html>
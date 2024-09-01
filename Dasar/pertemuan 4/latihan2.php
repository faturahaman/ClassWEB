<?php 

// $mahasiswa =[
//     ["raffi", "03731703", "teknik informatika kuantum", "email@gmail.com"],
//     ["riffa","00807070","teknik computing atom", "email.goblok.com"]
// ];

// array asociative sama dengan numerik tapi keynya berbeda

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
// cara pangil
// echo $mahasiswa[1]["nilai"][1];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>mahasiswa</h1>
    <?php foreach($mahasiswa as $mhs): ?>
    <ul>
        <ul>
            <img src="img/<?php echo$mhs["gambar"]?>" alt="" >
        </ul>
        <li>Nama :<?php echo$mhs["nama"];?></li>
        <li>NPM :<?php echo$mhs["NPM"];?></li>
        <li>Jurusan :<?php echo$mhs["jurusan"];?></li>
        <li>Email :<?php echo$mhs["email"];?></li>
        

    </ul>
    <?php endforeach;?>
</body>
</html>
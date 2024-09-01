<?php 
$mahasiswa = [
    ["raffi", "03731703", "teknik informatika kuantum", "email"],
    ["riffa", "03731703", "teknik informatika kuantum", "email"],
    ["xibran", "03731703", "teknik informatika kuantum", "email"],
    ["resya", "03731703", "teknik informatika kuantum", "email"],
]   ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>daftar nama mahasiswa</h1>

<?php foreach( $mahasiswa as $mahasiswa) : ?>
    <ul> 
        <?php foreach($mahasiswa as $siswa) :?>
            <li>nama:<?php echo$siswa ?></li>
        <?php endforeach;?>
    </ul>
<?php endforeach;?>
</body>
</html>
<?php
require 'functions.php';

if (isset($_POST["submit"])) {
    if (insert($_POST) > 0) {  // Memeriksa apakah form dikirim
        echo '
        <script>
        
        document.location.href = "datasiswa.php";
        </script>
        <div id="liveAlertPlaceholder"></div>
        <button type="button" class="btn btn-primary" id="liveAlertBtn">Show live alert</button>
        ';
    } else {
        echo '
        <script>
            alert("Data gagal ditambahkan");
        </script>
        ';
    }
    // var_dump($_POST);
}






?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<body class="bg-secondary">
    <div class="container py-3">
        <!-- form -->
        <form action="" class="p-5 border border-4 bg-body-secondary" method="post" enctype="multipart/form-data">
            <a href="datasiswa.php">

                <button type="button" class="btn-close" aria-label="Close"></button>
            </a>
            <h1 class="text-center mb-4">Input Siswa</h1>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="nama">
                <label for="floatingInput"><b>Nama</b></label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                <label for="floatingInput"><b>Email Addres</b></label>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Photo</label>
                <input type="file" class="form-control" id="foto" name="foto" placeholder="Photo">
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="text" name="medsos" placeholder="Media Sosial(opsional)">
                <label for="floatingInput"><b>Media Sosial</b></label>
            </div>
            <!-- option -->
            <div class="form-group">
                <label for="kategori">Pastikan Data belum ada di List</label><br>
                <!-- end option -->
                <button type="submit" class="btn btn-outline-primary my-3" name="submit">Kirim</button>
                <button type="reset" class="btn btn-outline-success my-3">Clear</button>
        </form>
        <!-- end form -->
    </div>
</body>

</html>
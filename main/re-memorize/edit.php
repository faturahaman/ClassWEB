<?php
require 'functions.php';


$id = $_GET["id"];
$student = query("SELECT * FROM datasiswa WHERE id = $id")[0];



if (isset($_POST["edit"])) {
    if (edit($_POST) > 0) {
        echo "<script>
				alert('data berhasil diubah!');
				document.location.href = 'datasiswa.php';
			  </script>";
    } else {
        echo "<script>
				alert('data gagal diubah!');
				document.location.href = 'datasiswa.php';
			  </script>";
    }
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container py-3">
        <!-- form -->
        <form action="" class="p-5 border border-4 bg-body-secondary rounded-2" method="post" enctype="multipart/form-data">
            <a href="datasiswa.php">
        <button type="button" class="btn-close" aria-label="Close"></button>
    </a>
    <h1 class="text-center">Edit Siswa</h1>
            <div class="mb-3">
                <input type="hidden" name="id" value="<?php echo $student["id"]; ?>">
                <input type="hidden" name="fotolama" value="<?= $student["foto"]; ?>">
                <label for="nama" class="form-label"><b>Nama:</b></label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $student["nama"]; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label"><b>Email:</b></label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $student["email"]; ?>">
            </div>
            <div class="mb-3">
                <img src="img/<?= $student["foto"]; ?>" alt="none.jpg" width="80" height="80" style="object-fit: cover;" class="mb-2 border border-4">
                <label for="foto" class="form-label"><b>Photo:</b></label>

                <input type="file" class="form-control" id="foto" name="foto">
            </div>
            <div class="mb-3">
                <label for="medsos" class="form-label"><b>Media Sosial:</b></label>
                <input type="text" class="form-control" id="text" name="medsos" value="<?= $student["medsos"]; ?>">
            </div>

            <button type="submit" class="btn btn-outline-primary my-3" name="edit">edit</button>
            <button type="reset" class="btn btn-outline-success my-3">Clear</button>
        </form>
        
        
        <!-- end form -->
    </div>




    <!-- bootstrap cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
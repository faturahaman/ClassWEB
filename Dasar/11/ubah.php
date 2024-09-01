<?php 
require 'functions.php';

$id = $_GET["id"];
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


if( isset($_POST["ubah"]) ) {
	if( ubah($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil diubah!');
				document.location.href = 'admin.php';
			  </script>";
	} else {
		echo "<script>
				alert('data gagal diubah!');
				document.location.href = 'admin.php';
			  </script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ubah Data Mahasiswa</title>
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
        <h1>Ubah Data Mahasiswa</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $mhs["id"]; ?>">
            <input type="hidden" name="gambarLama" value="<?= $mhs['gambar'];?>">
            <ul>
                <li>
                    <label for="NRP">NRP : </label>
                    <input type="text" name="NRP" id="NRP" value="<?php echo $mhs["NRP"]; ?>">
                </li>
                <li>
                    <label for="nama">nama : </label>
                    <input type="text" name="nama" id="nama" value="<?php echo $mhs["nama"]; ?>">
                </li>
                <li>
                    <label for="email">email : </label>
                    <input type="text" name="email" id="email" value="<?php echo $mhs["email"]; ?>">
                </li>
                <li>
                    <label for="jurusan">jurusan : </label>
                    <input type="text" name="jurusan" id="jurusan" value="<?php echo $mhs["jurusan"]; ?>">
                </li>
                <li>
                    <label for="gambar">gambar : </label>
                    <img src="img/<?= $mhs['gambar'];?>" alt="" width="100">
                    <input type="file" name="gambar" id="gambar">
                </li>
                <li>
                    <button type="submit" name="ubah">Ubah Data!</button>
                </li>
            </ul>
        </form>
    </div>
</body>
</html>
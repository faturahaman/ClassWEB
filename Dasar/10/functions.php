<?php 
$conn = mysqli_connect("localhost","root","","phpdasar");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row =  mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
        // AMBIL DATA DARI TIAP ELEMEN dlm form
        $NRP = htmlspecialchars($data["NRP"]);
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        // 
        // $gambar = htmlspecialchars($data ["gambar"]);
        // upload gambar
        $gambar = upload();
        if (!$gambar) {
            return false;
        }

        // query insert data
    $query ="INSERT INTO mahasiswa 
    VALUES
    ('','$nama','$NRP','$email','$jurusan','$gambar')";
    mysqli_query($conn,$query);

    

    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    // ambil nama file/file yg dihapus
    $result = mysqli_query($conn, "SELECT gambar FROM mahasiswa WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    $gambar = $row['gambar'];
    if (file_exists('img/' . $gambar)) {
        unlink('img/' . $gambar);
    }
    // delete dari directory datbase
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");


    return mysqli_affected_rows($conn);
}

function ubah($data) {
	global $conn;

	$id = $data["id"];
	$nrp = htmlspecialchars($data["NRP"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

// cek apakah gambar lama di ganti
if ($_FILES['gambar']['error'] === 4 ){
    $gambar = $gambarLama;
}else {
    $gambar = htmlspecialchars($data["gambar"]);

}
    

	$sql = "UPDATE mahasiswa SET
				NRP = '$nrp',
				nama = '$nama',
				email = '$email',
				jurusan = '$jurusan',
				gambar = '$gambar'
			WHERE
				id = $id
			";

	mysqli_query($conn, $sql);

	return mysqli_affected_rows($conn);
}


function cari($keyword) {
    $query = "SELECT * FROM mahasiswa WHERE 
        nama LIKE '%$keyword%' OR 
        NRP LIKE '%$keyword%' OR 
        email LIKE '%$keyword%' OR 
        jurusan LIKE '%$keyword%'
    ";
    return query($query);
}

function upload() {
    global $conn;
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile =  $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName =  $_FILES['gambar']['tmp_name'];

    // cek apakah ada gambar 
    if ($error === 4){
        echo "
        <script>
        alert('pilih gambar dulu!');
        </script>
        ";
        return false;
    }
    // cek ekstensi file 
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.',$namaFile);
    $ekstensiGambar =strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "
        <script>
        alert('yg anda input bukan gambar!');
        </script>
        ";
        return false;
    }
    // cek size dri gambar
    

    if ($ukuranFile>1000000) {
        echo "<script>
        alert('gambar terlalu besar!');
        </script>";
        return false;
    };
    // gambar yg lolos
    // generate nama gambar acak 
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName,'img/' . $namaFileBaru);

    return $namaFileBaru;
}


?>
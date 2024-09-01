<?php
// connect database
$conn = mysqli_connect("localhost","root","","webkelas");
// query database
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Error: " . mysqli_error($conn));
    }
    $rows = [];
    while( $row =  mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// tambah data
function insert($data){
    global $conn;

    // penjabaran variabel
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $medsos = htmlspecialchars($data["medsos"]);
    // $foto = htmlspecialchars($data["foto"]);
// upload gambar
    $foto = upload();
    if (!$foto) {
        return false;
    }

    // query insert data
$query ="INSERT INTO datasiswa
VALUES
('','$foto','$nama','$email','$medsos')"
;
mysqli_query($conn,$query);



return mysqli_affected_rows($conn);
}

function edit($data) {
    global $conn;

    $id =  $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $medsos = htmlspecialchars($data["medsos"]);
    $fotoLama = htmlspecialchars($data["fotolama"]);

    // cek foto lama apakah diganti
    if($_FILES['foto']['error'] === 4){
        $foto = $fotoLama;
    } else {
        $foto = upload();
        if (!$foto) {
            return false;
        }
    }

    $sql =  "UPDATE datasiswa SET
            nama = '$nama',
            email = '$email',
            medsos = '$medsos',
            foto = '$foto'
            WHERE
                id = $id;
    ";

    mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}

// upload
function upload() {
    global $conn;
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile =  $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName =  $_FILES['foto']['tmp_name'];

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
    

    if ($ukuranFile>10000000) {
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

// hapus data
function delete($id){
    global $conn;
    // ambil nama file/file yg dihapus
    $result = mysqli_query($conn, "SELECT foto FROM datasiswa WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    $foto = $row['foto'];
    if (file_exists('img/' . $foto)) {
        unlink('img/' . $foto);
    }
    // delete dari directory datbase
    mysqli_query($conn, "DELETE FROM datasiswa WHERE id = $id");


    return mysqli_affected_rows($conn);
}


// search functions

function search($keyword) {
    $query = "SELECT * FROM datasiswa WHERE 
    nama LIKE '%$keyword%' OR
    email LIKE '%$keyword%' OR
    medsos LIKE '%$keyword%'
    ";
    return query($query);
}
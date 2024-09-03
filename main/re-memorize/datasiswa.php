<?php
require 'functions.php';

// $students = query("SELECT * FROM datasiswa");

// pagination
$jmlDataPage = 8;
$jmlData = count(query("SELECT * FROM datasiswa"));
$keyword = isset($_POST["keyword"]) ? $_POST["keyword"]: '';
$jmlpage = ceil($jmlData/$jmlDataPage);
$pageActive = (isset($_GET["page"])) ? $_GET["page"]: 1;
$earlyPage = ($jmlDataPage * $pageActive) - $jmlDataPage;

$students = query("SELECT * FROM datasiswa LIMIT  $earlyPage,$jmlDataPage");

// button clicked

if (isset($_POST["search"])){
  $students = search($keyword);
  $jmlData = count($students);
  $jmlDataPage = ceil($jmlData / $jmlDataPage);
  $students = array_slice($students,$earlyPage,$jmlData,$jmlDataPage);
}else {
  $jmlData = count(query("SELECT * FROM datasiswa"));
  $jmlpage = ceil($jmlData / $jmlDataPage);
  $students = query("SELECT * FROM datasiswa  LIMIT $earlyPage,$jmlDataPage");

}


?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar siswa</title>
  <script>
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
      myInput.focus()
    })
  </script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class=" border-0 bd-example m-0 border-0 bg-body-secondary">
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary p-3" 
style="
  backdrop-filter: blur(16px) saturate(180%);
    -webkit-backdrop-filter: blur(16px) saturate(180%);
    background-color: rgba(17, 25, 40, 0.75);
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.125);
"
>
  <div class="container-fluid">
    <a class="navbar-brand " href="#"><h2><b>PPLG GEN-2</b></h2></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="datasiswa.php">Data Siswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="galeri.php">Galery</a>
        </li>
      </ul> 
    </div>
  </div>
</nav>
  <!-- end navbar -->
  <!-- tabel -->
   <div class="container my-5">
     <div class="table-responsive overflow-x-auto">
       <table class="table table-striped table-hover mx-auto p-2 border border-5 "  class="mx-auto p-2" style="width: 800">
       
       <nav class="navbar bg-body-tertiary" class="d-flex" >
         <div class="container-fluid">
           <!-- search bar -->
           <form class="" role="search" method="post" >
             <input class="form-control me-1 mx-auto p-3" type="search" placeholder="Search" aria-label="Search" name="keyword" style="padding:20px;">
             <button class="btn btn-outline-success col-md-4 " type="submit" name="search">Search</button>
             <!-- ======== refresh btn -->
             <button class="btn" onclick="refreshPage()">
                <img src="icon/refresh-regular-24.png" alt="">
              </button>
              <!-- ========= end refresh btn -->
              <a href="insert.php" class="btn btn-outline-success my-2" type="submit">Add Data</a>
            </form>
            <!-- end seearch bar -->
          </div>
        </nav>
        <thead>
          <tr>
            
            <th scope="col">No</th>
            <th scope="col">Name </th>
            <th scope="col">Email</th>
            <th scope="col">Photo</th>
            <th scope="col">Social Media</th>
            <th scope="col">Action</th>
          </tr>
          <?php $i = 1 ?>
        </thead>
        <tbody>
          <?php foreach ($students as $row) : ?>
            <tr>
              <th scope="row">
                <?= $i++ ?>
              </th>
              <th>
                <?= $row["nama"] ?>
              </th>
              <td>
                <?= $row["email"] ?>
              </td>
              <td>
                <img src="img/<?= $row["foto"] ?>" alt="none.jpg" width="40" height="40" style="border-radius:20px; object-fit: cover;">
              </td>
              <td>
                <?= $row["medsos"] ?>
              </td>
              <td>
              <div class="dropdown">
      <a class="btn  dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Action
      </a>
    
      <ul class="dropdown-menu">
        <li><a class="dropdown-item text-primary bg-info-subtle" href="edit.php?id=<?= $row["id"]; ?>">Edit</a></li>
        <li><a class="dropdown-item text-danger bg-danger-subtle" href="delete.php?id=<?= $row["id"]; ?>" class="btn btn-outline-danger" >Delete</a></li>
      </ul>
    </div>
    
              </td>
            </tr>
          <?php endforeach; ?>
    
        </tbody>
      </table>
    </div>
   </div>
  <!-- endtabel -->
   <!-- pagination bar -->
   <div class="nav-page" aria-label="Page navigation example">
        <!-- tombol next page -->
        <ul class="pagination justify-content-center">
        <?php if ($pageActive > 1): ?>
          <li class="page-item">
            <a href="?page=<?= $pageActive - 1;?>" class="page-link">Previous</a>

          </li>
            <?php endif; ?>
            <!-- page nav -->
        <?php for ($i = 1; $i <= $jmlpage; $i++) : ?>
            <?php if ($i == $pageActive) : ?>

<li class="page-item">
                  <a href="?page=<?= $i ?>" class="page-link"><?= $i ?>
                </a>
            <?php else : ?>

              <li class="page-item">
                  <a href="?page=<?= $i ?>" class="page-link"><?= $i ?>
                </a>

                </li>
            <?php endif; ?>
        <?php endfor; ?>

        <!-- tombol down page -->
        <?php if ($pageActive < 1): ?>
          <li class="page-item">
            <a href="?page=<?= $pageActive + 1;?>" class="page-link">Next</a>

          </li>
            <?php endif; ?>
            <?php if( $pageActive < $jmlpage ) : ?>
              <li class="page-item">
            <a href="?page=<?= $pageActive + 1;?>" class="page-link">Next</a>

          </li>
<?php endif; ?>
</ul>
   </div> 

   <!-- end pagination bar -->






<!-- script -->
<script>
        function refreshPage() {
            location.reload(); // Me-refresh halaman
        }
    </script>

<!-- cdn bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
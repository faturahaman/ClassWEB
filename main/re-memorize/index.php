<?php
require 'functions.php';

$profiles = query("SELECT * from datasiswa");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- bootstrap cdn -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- css internal// bisa di improve dengan pindahkan agar lebih mudah di -->
  <style>
    body {
      background-color: #290066;
      background-repeat: no-repeat;

    }

    h1 {
      color: white;
    }

    section {
      min-height: 100vh;

    }

    .header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      padding: 2rem 9%;
      background-color: var(--bg-color);
      display: flex;
      justify-content: space-between;
      align-items: center;
      z-index: 100;
    }

    :root {
      --bg-color: #1f242d;
      --second-bg-color: #323946;
      --text-color: #fff;
      --main-color: #0ef;

    }

    .hover-bg:hover {
      background-color: blue;
      color: black;
    }

    .content1 {
      background-color: white;
      border-radius: 8px;
      margin-top: -150px;
    }


    /* animate/keyframe */
    @keyframes floating {
      0% {
        transform: translateY(0);
      }

      50% {
        transform: translateY(-20px);
      }

      100% {
        transform: translateY(0);
      }
    }


    @keyframes move_wave {
      0% {
        transform: translateX(0) translateZ(0) scaleY(1);
      }

      50% {
        transform: translateX(-25%) translateZ(0) scaleY(0.55);
      }

      100% {
        transform: translateX(-50%) translateZ(0) scaleY(1);
      }
    }

    /* end keyframe */
    .waveWrapper {
      overflow: hidden;
      position: absolute;
      left: 0;
      right: 0;
      bottom: 0;
      top: 0;
      margin: auto;
      z-index: -2;
    }

    .waveWrapperInner {
      position: absolute;
      width: 100%;
      overflow: hidden;
      height: 100%;
      bottom: -1px;

    }

    .bgTop {
      z-index: 15;
      opacity: 0.5;
    }

    .bgMiddle {
      z-index: 10;
      opacity: 0.75;
    }

    .bgBottom {
      z-index: 5;
    }

    .wave {
      position: absolute;
      left: 0;
      width: 200%;
      height: 100%;
      background-repeat: repeat no-repeat;
      background-position: 0 bottom;
      transform-origin: center bottom;

    }

    .waveTop {
      background-size: 50% 100px;
    }

    .waveAnimation .waveTop {
      animation: move-wave 3s;
      -webkit-animation: move-wave 3s;
      -webkit-animation-delay: 1s;
      animation-delay: 1s;
    }

    .waveMiddle {
      background-size: 50% 120px;
    }

    .waveAnimation .waveMiddle {
      animation: move_wave 10s linear infinite;
    }

    .waveBottom {
      background-size: 50% 100px;
    }

    .waveAnimation .waveBottom {
      animation: move_wave 15s linear infinite;
    }
  </style>
  <!-- ======= end css internal -->
</head>

<body>
  <header>

    <nav class="navbar navbar-expand-lg bg-body-tertiary p-3"
      style="
      backdrop-filter: blur(16px) saturate(180%);
        -webkit-backdrop-filter: blur(16px) saturate(180%);
        background-color: rgba(17, 25, 40, 0.75);
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.125);
    ">
      <div class="container-fluid">
        <a class="navbar-brand " href="index.php">
          <h2>PPLG GEN-2</h2>
        </a>
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
  </header>
  <!-- home -->
  <section class="home">
    <h1 class=" mx-auto p-2 text-center text-light my-5 " id="judul" style="font-size: 60px;">Welcome to <span>PPLG GEN 2</span> Website</h1>
    <h5 class="text-light text-center">Ini adalah Website prototipe untuk kelas PPLG</h5>
    <h6 class="text-light text-center">Source Code bisa cek di github ini,jika ingin improve website ini</h6>
    <div class="d-flex align-center justify-content-center" class="">
      <a href="https://github.com/faturahaman/ClassWEB" class="border border-2 rounded-5 p-1 hover-bg">
        <box-icon name='github' type='logo' color='#ffffff'></box-icon>
      </a>
    </div>
    <div class="waveWrapper waveAnimation">
      <div class="waveWrapperInner bgTop">
        <div class="wave waveTop" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-top.png')"></div>
      </div>
      <div class="waveWrapperInner bgMiddle">
        <div class="wave waveMiddle" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png')"></div>
      </div>
      <div class="waveWrapperInner bgBottom">
        <div class="wave waveBottom" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-bot.png')"></div>
      </div>
    </div>
  </section>
  <!-- end home -->
  <!-- wave -->
  <!-- end wave -->

  <!-- Card Siswa section -->
  <section class="content1">
    <h2 class="text-center p-3">About Us</h2>
    <!-- carrousel container -->
    <div class="container-lg rounded ">
      <div id="carouselExampleIndicators" class="carousel slide shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img-wp/bg-home.jpeg" class="d-block w-100 rounded" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img-wp/33.jpeg" class="d-block w-100 rounded" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img-wp/34.jpeg" class="d-block w-100 rounded" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img-wp/36.jpeg" class="d-block w-100 rounded" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img-wp/38.jpg" class="d-block w-100 rounded" alt="...">
          </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <!-- end carrousel container -->
    <!-- card -->
    <div class="container text-center">
      <?php foreach ($profiles as $profile): ?>
      <div class="row">
        <div class="col">
         
        </div>
        <div class="col">
         
        </div>  
        <div class="col">
         
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <!-- end card -->
  </section>
  <section class="content1">

  </section>

  <!-- end card siswa section-->


  <!-- box icon cdn -->
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

  <!-- bootstrap cdn -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
    const appendAlert = (message, type) => {
      const wrapper = document.createElement('div')
      wrapper.innerHTML = [
        `<div class="alert alert-${type} alert-dismissible" role="alert">`,
        `   <div>${message}</div>`,
        '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
        '</div>'
      ].join('')

      alertPlaceholder.append(wrapper)
    }

    const alertTrigger = document.getElementById('liveAlertBtn')
    if (alertTrigger) {
      alertTrigger.addEventListener('click', () => {
        appendAlert('Nice, you triggered this alert message!', 'success')
      })
    }
  </script>
</body>

</html>
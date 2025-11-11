<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="style.css" />
  <title>Penerimaan Siswa Baru</title>
</head>

<body class="bg-light">
  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg bg-gradient-custom py-3 animate__animated animate__fadeInDown">
    <div class="container-fluid px-4">
      <a class="navbar-brand fw-bold text-purple">
        <img src="assets/img/logoSMKN2.png" alt="logosmkn2" width="46" height="46" />
      </a>  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav align-items-center me-3 gap-4">
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="#about">About</a>
          </li>

          <!-- Nav Login -->
          <li>
            <a href="login/index.php" class="btn btn-sm btn-purple">Log in</a></li>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Home -->

<section id="home" class="hero-section d-flex align-items-center">
  <div class="container">
    <div class="row align-items-center">
      
      <!-- Teks di kiri -->
      <div class="col-lg-6 col-md-12 text-center text-lg-start animate__animated animate__fadeInLeft">
        <p class="small-intro">WELCOME TO <span>NYIUMEM</span></p>
        <h1 class="hero-title mb-3">Penerimaan Siswa Baru<br>SMKN 2 Bandung</h1>
        <p class="hero-subtitle mb-4">Tahun Ajaran 2025 / 2026</p>
        <a href="register/index.php" class="btnl btn-purple text-white px-4 py-2">Daftar Sekarang</a>
      </div>

      <!-- Gambar di kanan -->
      <div class="col-lg-6 col-md-12 text-center mt-4 mt-lg-0 animate__animated animate__fadeInRight">
        <img src="assets/img/student.png" alt="Foto siswa" class="hero-img img-fluid">
      </div>

    </div>
  </div>
</section>

 <!-- isi about -->
  <div class="about py-5">
    <div id="about" class="container about-content py-4">
       <h1 class="text-center judul-about mb-5 text-purple">TENTANG <span>NYIUMEM</span></h1>
       <h2 class="text-center subjudul-about mb-5 text-purple"> Penerimaan Siswa Baru SMKN2 Bandung  </h2>
       <div class="row justify-content-center align-items-center">
         <!-- Foto di kiri -->
         <div class="col-md-5 mb-4 mb-md-0">
           <img src="assets/img/smk2.png" alt="SMKN 2 Bandung" class="img-fluid about-image rounded shadow">
         </div>
         
         <!-- Teks di kanan -->
         <div class="col-md-7">
           <p class="about-text">
                Sistem Penerimaan Siswa baru (Nyiumen) SMKN 2 Bandung merupakan platform untuk penerimaan siswa baru setiap tahun ajaran baru. Melalui Nyiumen, calon siswa dapat mendaftar ke SMKN 2 Bandung dengan efisien dan prakstis. Platform ini juga mendorong ide ide untuk memakai sistem pendaftaran berbasis web.         
            </p>
         </div>
       </div>
      </div>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
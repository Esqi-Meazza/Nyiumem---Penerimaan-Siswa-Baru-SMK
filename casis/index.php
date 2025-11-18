<?php
session_start();
include '../service/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="../style.css" />
  <title>Penerimaan Siswa Baru</title>
</head>
<style>
  .navbar-brand img {
  width: 46px;       
  height: 46px;     
  margin-left: 24px; 
  transition: all 0.4s ease;
}.navbar-brand img:hover {
  transform: scale(1.40); 
}
  .card {
    background: transparent;
    border: 2px solid rgba(255, 255, 255, .2);
    box-shadow: 0 0 10px rgba(0, 0, 0, .1);
    backdrop-filter: blur(10px);
    border-radius: 10px;
    color: white;
    transition: all 0.3s ease;
    }.card:hover {
    box-shadow: 0 25px 50px rgba(0, 0, 0, .2);
    transform: translateY(-5px);
    }

  h2{
    text-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    color: #c9d9c6;
  }
</style>
<body class="bg-light">
  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg bg-gradient-custom py-3 animate__animated animate__fadeInDown">
    <div class="container-fluid px-4">
      <a class="navbar-brand fw-bold text-purple">
        <img src="../assets/img/logoSMKN2.png" alt="logosmkn2" width="46" height="46" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav align-items-center gap-3">
          <li class="nav-item">
            <a href="../logout.php" class="btn btn-sm btn-purple">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content Row -->
  <section class="hero-section d-flex align-items-center">
    <div class="container py-1">
      <div class="row g-4">
        <!-- Form Registrasi -->
        <div class="col-lg-7">
          <div class="card">
            <div class="card-body">
              <h4 class="text-center mb-4">Form Registrasi</h4>
              <form action="pendaftaran.php" method="POST" enctype="multipart/form-data">
                <?php if(isset($_GET['gagal'])) {?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $_GET['gagal'] ?>
                </div>
                <?php } ?>
                <?php if(isset($_GET['sukses'])) {?>
                <div class="alert alert-success" role="alert">
                  <?php echo $_GET['sukses'] ?>
                </div>
                <?php } ?>
                
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama Lengkap" required>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukan email" required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="nisn" class="form-label">NISN</label>
                    <input type="number" class="form-control" id="nisn" name="nisn" placeholder="Enter NISN" required>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="id_jurusan" class="form-label">Jurusan</label>
                    <select class="form-select" name="id_jurusan" required>
                      <option value="">Pilih Jurusan</option>
                      <option value="1">RPL</option>
                      <option value="2">TKJ</option>
                      <option value="3">DKV</option>
                      <option value="4">Animasi</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="jenis_kelamin" required>
                      <option value="">Pilih Jenis Kelamin</option>
                      <option value="L">Laki-laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="no_hp" class="form-label">Nomor Handphone</label>
                    <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Masukan Nomor Handphone" required>
                  </div>
                </div>

                <div class="mb-3">
                  <label for="alamat" class="form-label">Alamat</label>
                  <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukan alamat" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                  <label for="foto" class="form-label">Foto</label>
                  <input type="file" class="form-control" id="foto" name="foto" required>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-sm px-5">Daftar</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Status Pendaftaran -->
        <div class="col-lg-5 mb-4">
          <div class="card">
            <div class="card-body">
              <h4 class="text-center mb-4">Status Pendaftaran</h4>
              <?php
              if (isset($_SESSION['id_user'])) {
                $id_user = $_SESSION['id_user'];
                $sql = "SELECT * FROM casis WHERE id_user = $id_user";
                $hasil = $koneksi->query($sql);
                if ($hasil && $hasil->num_rows > 0) {
                  $data = $hasil->fetch_assoc();
                  if($data['status'] == ""){
                    $status = "Belum Dikonfirmasi";
                  } else {
                    $status = $data['status'];
                  }
              ?>
                  <div class="mb-2">
                    <div class="row">
                      <div class="col-5 fw-bold">Nama</div>
                      <div class="col-7">: <?php echo $data['nama']; ?></div>
                    </div>
                  </div>
                  <div class="mb-2">
                    <div class="row">
                      <div class="col-5 fw-bold">NISN</div>
                      <div class="col-7">: <?php echo $data['NISN']; ?></div>
                    </div>
                  </div>
                  <div class="mb-2">
                    <div class="row">
                      <div class="col-5 fw-bold">Jurusan</div>
                      <div class="col-7">: <?php echo $data['jurusan']; ?></div>
                    </div>
                  </div>
                  <div class="mb-2">
                    <div class="row">
                      <div class="col-5 fw-bold">Alamat</div>
                      <div class="col-7">: <?php echo $data['alamat']; ?></div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="row">
                      <div class="col-5 fw-bold text-success">Status</div>
                      <div class="col-7 fw-bold text-success">: <?php echo $status; ?></div>
                    </div>
                  </div>
                  <div class="text-center mt-3">
                    <img src="<?php echo $data['foto']; ?>" class="img-thumbnail" style="max-width: 100%; height: auto; border-radius: 24px;" alt="<?php echo $data['nama']; ?>">
                  </div>
              <?php
                } else {
              ?>
                  <div class="alert alert-info text-center">
                    <h5>Belum Melakukan Pendaftaran</h5>
                    <p class="mb-0">Anda belum melakukan pendaftaran. Silakan daftar terlebih dahulu.</p>
                  </div>
              <?php
                }
              } else {
              ?>
                <div class="alert alert-warning text-center">
                  <h5>Silakan Login</h5>
                  <p class="mb-0">Anda harus login terlebih dahulu untuk melihat status pendaftaran.</p>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
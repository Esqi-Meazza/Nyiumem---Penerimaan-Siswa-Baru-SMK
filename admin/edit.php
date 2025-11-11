<?php
session_start();
require_once '../service/koneksi.php';

$id_casis = isset($_GET['id']) ? $_GET['id'] : 0;

$sql = "SELECT * FROM casis WHERE id_casis = $id_casis";
$result = $koneksi->query($sql);
$data = $result->fetch_assoc();

if (!$data) {
    header('Location: edit.php?gagal=Data tidak ditemukan');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <title>Penerimaan Siswa Baru</title>
</head>
<style>
 * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
  scroll-behavior: smooth;
}

body {
   background: linear-gradient(to bottom right, rgba(255,255,255,0.5), rgba(246,234,187,0.5)),
                url('../assets/img/background.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    margin-top: 88px;
}

.card {
    background: transparent;
    border: 2px solid rgba(255, 255, 255, .2);
    box-shadow: 0 0 10px rgba(0, 0, 0, .1);
    backdrop-filter: blur(10px);
    border-radius: 10px;
    color: white;
    }

    .btn {
  background-color: #6096baff;
  font-weight: bold;
  border: none;
  border-radius: 12px;
  color: #e7ecefff;
  transition: all 0.3s ease-in-out;
}

.btn:hover {
 background-color: #a3cef1ff;
  box-shadow: 0 2px 8px #c9d9c6;
}

    h2{
      text-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      color: #c9d9c6;
    }

</style>
<body class="bg-light">
  <!-- Main pendaftaran -->
  <section id="pendaftaran" class="hero-section d-flex align-items-center">
  <div class="container">
        <div class="row mb-3">
            <div class="col-md-4 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Form Registrasi</h4>
                       <form action="pedit.php" method="POST">
    <?php
    if(isset($_GET['gagal'])) {?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_GET['gagal'] ?>
        </div>
    <?php } ?>
    
    <?php if(isset($_GET['sukses'])) {?>
        <div class="alert alert-success" role="alert">
            <?php echo $_GET['sukses'] ?>
        </div>
    <?php } ?>

    <input type="hidden" name="id_casis" value="<?php echo $data['id_casis']; ?>">

    <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama" name="nama" 
               value="<?php echo $data['nama']; ?>" placeholder="Edit Nama" required>
    </div>
    
    <div class="mb-4">
        <label for="nisn" class="form-label">NISN</label>
        <input type="number" class="form-control" id="nisn" name="nisn" 
               value="<?php echo $data['NISN']; ?>" placeholder="Edit NISN" required>
    </div>

    <div class="form-group mb-4">
        <label class="form-label">Status</label>
        <select class="form-control" name="status" required>
            <option value="">Pilih Status</option>
            <option value="DITERIMA" <?php echo ($data['status'] == 'DITERIMA') ? 'selected' : ''; ?>>Diterima</option>
            <option value="TIDAK DITERIMA" <?php echo ($data['status'] == 'TIDAK DITERIMA') ? 'selected' : ''; ?>>Tidak Diterima</option>
        </select>
    </div>
    
    <div class="mt-3 text-center">
        <button type="submit" class="btn btn-sm px-5">Edit</button>
    </div>
</form>
                    </div>
                </div>
            </div>
    </div>
</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
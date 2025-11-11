<?php
session_start();
require_once '../service/koneksi.php';
if (!isset($_SESSION['level']) || $_SESSION['level'] !== 'admin') {
    header('Location: ../login/index.php?gagal=Silakan login sebagai admin terlebih dahulu.');
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/><title>Admin Panel Navigation</title>
    <style>
        :root {
    --antiflash-white: #e7ecefff;
    --yinmn-blue: #274c77ff;
    --air-superiority-blue: #6096baff;
    --uranian-blue: #a3cef1ff;
    --white: #c9d9c6;
}       * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(90deg, #a3cef1ff, #6096baff); 
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 100%;
            max-width: 1200px;
        }

        nav {
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 5px 15px;
            margin-top: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--antiflash-white);
            display: flex;
            align-items: center;
        }

        .brand i {
            margin-right: 10px;
            font-size: 1.8rem;
        }

        .nav-items {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .search-container {
            display: flex;
            align-items: center;
        }

        .search-input {
            padding: 10px 15px;
            border-radius: 12px 0 0 12px;
            border: none;
            outline: none;
            background-color: rgba(255, 255, 255, 0.15);
            color: var(--antiflash-white);
            width: 250px;
            transition: all 0.3s ease;
        }

        .search-input::placeholder {
            color: rgba(240, 240, 240, 0.7);
        }

        .search-input:focus {
            background-color: rgba(255, 255, 255, 0.25);
        }

        .btn {
            background-color: var(--air-superiority-blue);
            font-weight: bold;
            border: none;
            border-radius: 12px;
            color: var(--antiflash-white);
            transition: all 0.3s ease-in-out;
            cursor: pointer;
            padding: 10px 20px;
        }

        .btn:hover {
            background-color: var(--uranian-blue);
            box-shadow: 0 2px 8px var(--white);
        }

        .search-btn {
            border-radius: 0 12px 12px 0;
            padding: 10px 20px;
        }

        nav .nav-link {
            transition: all 0.5s ease;
            color: var(--antiflash-white);
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 12px;
            display: flex;
            align-items: center;
        }

        nav .nav-link:hover {
            background-color: var(--air-superiority-blue);
            border: none;
            border-radius: 12px;
            transform: rotateY(-2deg);
            color: var(--white);
        }

        .nav-link i {margin-right: 8px;}

        .text-purple {color: var(--antiflash-white);}

        .content {
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 8px;
            margin-top: 24px;
            margin-bottom: 24px;
            color: var(--antiflash-white);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .card {
    margin-top: 8px;
    background: transparent;
    border: 2px solid rgba(255, 255, 255, .2);
    box-shadow: 0 0 10px rgba(0, 0, 0, .1);
    backdrop-filter: blur(50px);
    border-radius: 10px;
    padding: 15px 20px;
    color: white;
    }
        h1 {margin-bottom: 20px;font-size: 2rem; color:var(--antiflash-white)}
        p {line-height: 1.6;margin-bottom: 15px;}
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <nav>
            <div class="brand">
                <i class="fas fa-user-shield"></i>
                <span>Admin Panel</span>
            </div>
            <div class="nav-items">
                <a href="http://localhost/phpmyadmin/index.php?route=/database/structure&db=nyiumem" class="nav-link">
                    <i class="fa-solid fa-database"></i>
                    <span>Database</span>
                </a>
                <a href="../logout.php" class="nav-link">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
        </nav>
        
        <div class="content">
             <div class="row mb-3">
            <div class="col-md-20 mx-auto">
            <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">Data pendaftaran</h1>
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
                        <table class="table table-striped table-sm table-hover">
                            <thead>
    <tr>
      <th class="text-center align-middle" scope="col">ID</th>
      <th class="text-center align-middle" scope="col">Nama</th>
      <th class="text-center align-middle" scope="col">Email</th>
      <th class="text-center align-middle" scope="col">NISN</th>
      <th class="text-center align-middle" scope="col">Jenis Kelamin</th>
      <th class="text-center align-middle" scope="col">Jurusan</th>
      <th class="text-center align-middle" scope="col">Alamat</th>
      <th class="text-center align-middle" scope="col">Nomor Handphone</th>
      <th class="text-center align-middle" scope="col"><i class="fa-solid fa-image-portrait"></i></th>
      <th class="text-center align-middle" scope="col">Status</th>
      <th class="text-center align-middle" scope="col"><i class="fas fa-user-edit"></i></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM casis";
    $hasil = $koneksi->query($sql);
    $no=1;
    while($row=$hasil->fetch_assoc()){
    ?>
    <tr>
      <th scope="row" class="text-center align-middle"><?php echo $row['id_user'];?></th>
      <td class="text-center align-middle"><?php echo $row['nama'];?></td>
      <td class="text-center align-middle"><?php echo $row['email'];?></td>
      <td class="text-center align-middle"><?php echo $row['NISN'];?></td>
      <td class="text-center align-middle"><?php echo $row['jenis_kelamin'];?></td>
      <td class="text-center align-middle"><?php echo $row['jurusan'];?></td>
      <td class="text-center align-middle"><?php echo $row['alamat'];?></td>
      <td class="text-center align-middle"><?php echo $row['no_hp'];?></td>
      <td class="text-center align-middle"><img src="<?php echo $row['foto']; ?>" class="img-thumbnail rounded-circle mx-auto d-block" style="width: auto; height: auto;" alt="<?php echo $row['nama']; ?>"></td>
      <td class="text-success fw-semibold text-center align-middle"><?php echo $row['status'];?></td>
      <td class="text-center align-middle"> 
        <a href="edit.php?id=<?php echo $row['id_casis']; ?>" class="btn btn-sm btn-info">Edit</a>
         <a href="delete.php?id=<?php echo $row['id_casis']; ?>" class="btn btn-sm  mt-2" style="background-color: #dc3545; border-color: #dc3545;" onclick="return confirm('Apakah Anda yakin ingin menghapus casis <?php echo $row['nama']; ?>?')">Hapus</a>
    </td>
    </tr>
    <?php
    $no++;
    }
    ?>
  </tbody>
</table>
    </div>
</div>
</div>
    </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
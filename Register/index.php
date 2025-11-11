<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(90deg, #a3cef1ff, #6096baff); 
}

.card {
    margin-top: 70px;
    background: transparent;
    border: 2px solid rgba(255, 255, 255, .2);
    box-shadow: 0 0 10px rgba(0, 0, 0, .1);
    backdrop-filter: blur(50px);
    border-radius: 10px;
    padding: 30px 40px;
    color: white;
    transition: all 0.3s ease;
    }.card:hover {
    box-shadow: 0 25px 50px rgba(0, 0, 0, .2);
    transform: translateY(-5px);
    }
</style>
<body>
    <div class="container py-5">
        <div class="row mb-3">
            <div class="col-md-4 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Form Registrasi</h4>
                        <form action="pregister.php" method="POST">
                            <?php
                                if(isset($_GET['gagal'])) {?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $_GET['gagal'] ?>
                                </div>
                            <?php
                            }
                            ?>
                            <?php
                                if(isset($_GET['sukses'])) {?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $_GET['sukses'] ?>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukan nama Lengkap" required>
                            </div>
                            <div class="md-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                            </div>
                            <div class="md-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </div>
                            <div class="mt-3">
                                sudah punya akun? <a href="../login/index.php">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
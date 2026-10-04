<?php
// Aktifkan pelaporan error untuk memudahkan pengecekan jika ada kendala
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Konfigurasi Koneksi ke TiDB Cloud
$host = 'gateway01.ap-southeast-1.prod.aws.tidbcloud.com'; // Sesuaikan host dari dasbor TiDB Cloud Anda
$port = 4000;                                               // Port wajib untuk TiDB Cloud
$user = '3P2aTfCk3SwGaKk.root';                             // Username dari TiDB Cloud
$pass = 'ebsJ2crBW7NYlz0i';                     // Masukkan password yang sudah Anda generate
$db   = 'railway';                                          // Nama database yang telah dibuat

// Inisialisasi koneksi MySQLi dengan inisialisasi SSL/TLS yang diwajibkan TiDB Cloud
$conn = mysqli_init();

// Mengaktifkan SSL (opsional tapi disarankan jika server hosting menuntut koneksi aman)
// mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);

// Melakukan koneksi ke database
$connected = mysqli_real_connect($conn, $host, $user, $pass, $db, $port, NULL, MYSQLI_CLIENT_SSL);

if (!$connected) {
    die("Koneksi database ke TiDB Cloud gagal: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SILING - Sistem Informasi Lingkup Keluarga Resiko Stunting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f4f8; }
        .header-top { background: linear-gradient(135deg, #8a2be2, #4b0082); color: white; padding: 15px 30px; }
        .card-login { border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); background: white; }
        .btn-custom { background-color: #008b8b; color: white; }
        .btn-custom:hover { background-color: #006666; color: white; }
    </style>
</head>
<body>
    <div class="header-top d-flex align-items-center">
        <h4 class="m-0"><b>Siling</b> Sistem Informasi Lingkup Keluarga Resiko Stunting <br><small style="font-size: 12px;">DPPKB Kabupaten Tangerang</small></h4>
    </div>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-5">
            <div class="card card-login p-4">
                <div class="text-center mb-3">
                    <img src="asset/logo.png" class="rounded-circle mb-2" alt="Logo">
                    <h3 class="fw-bold">SILINGS</h3>
                    <p class="text-muted" style="font-size: 13px;">Sistem Informasi Lingkup Keluarga Resiko Stunting</p>
                </div>
                <?php if($error): ?>
                    <div class="alert alert-danger py-2"><?= $error; ?></div>
                <?php endif; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary" style="font-size: 12px;">USERNAME</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary" style="font-size: 12px;">PASSWORD</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-custom w-100 py-2 fw-bold">Masuk ke Sistem</button>
                </form>
                <div class="mt-4 p-3 bg-light rounded text-center text-muted" style="font-size: 12px;">
                    Hai.. Pejuang Tetap Semangat Ya !!!<br>Kalau Capek Ngopi Dulu!!!
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php

session_start();

// Memeriksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard SIPENA</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="dashboard-container">

        <div class="dashboard-logo">
            🎓 SIPENA
        </div>

        <div class="dashboard-content">

            <h1>Selamat Datang!</h1>

            <h2>
                <?= htmlspecialchars($_SESSION['nama_lengkap']) ?>
            </h2>

            <p>
                Anda berhasil masuk ke Sistem Informasi
                Pemilihan Peminatan Siswa SMA.
            </p>

            <div class="user-info">
                <p>
                    <strong>Username:</strong>
                    <?= htmlspecialchars($_SESSION['username']) ?>
                </p>

                <p>
                    <strong>Hak Akses:</strong>
                    <?= htmlspecialchars($_SESSION['role']) ?>
                </p>
            </div>

            <a href="logout.php" class="logout-button">
                Keluar dari Sistem
            </a>

        </div>

    </div>

</body>
</html>


<?php
session_start();

// Jika sudah login, langsung ke dashboard
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}

$error = $_SESSION['error'] ?? "";
unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login SIPENA</title>

    <link rel="stylesheet" href="style.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container">

        <div class="logo">
            <div class="logo-icon">🎓</div>
            <h2>SIPENA</h2>
        </div>

        <div class="subtitle">
            <h1>Selamat Datang!</h1>
            <p>Sistem Informasi Pemilihan Peminatan Siswa SMA</p>
        </div>

        <?php if ($error): ?>
            <div class="error-message">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form action="proses_login.php" method="POST">

            <div class="form-group">
                <label for="username">Username / NIS</label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Masukkan username atau NIS"
                    required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    required>
            </div>

            <div class="form-options">
                <label>
                    <input type="checkbox">
                    Ingat saya
                </label>
            </div>

            <button type="submit" class="login-button">
                Masuk Sekarang →
            </button>

        </form>

        <div class="information">
            <span>ⓘ</span>

            <p>
                Gunakan akun yang telah diberikan oleh pihak sekolah
                untuk mengakses sistem pemilihan peminatan.
            </p>
        </div>

        <div class="footer">
            © 2026 SIPENA - Sistem Informasi Pemilihan Peminatan
        </div>

    </div>

</body>
</html>

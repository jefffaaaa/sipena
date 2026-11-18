
<?php

session_start();
require_once "koneksi.php";

// Mengambil input dari form
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

// Validasi input
if ($username === '' || $password === '') {
    $_SESSION['error'] = "Username dan password wajib diisi!";
    header("Location: index.php");
    exit;
}

try {

    // Mencari pengguna berdasarkan username
    $query = $koneksi->prepare(
        "SELECT * FROM users WHERE username = :username"
    );

    $query->execute([
        ':username' => $username
    ]);

    $data = $query->fetch(PDO::FETCH_ASSOC);

    // Memeriksa password
    if ($data && password_verify($password, $data['password'])) {

        // Membuat session login
        session_regenerate_id(true);

        $_SESSION['user_id'] = $data['id'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
        $_SESSION['role'] = $data['role'];

        header("Location: dashboard.php");
        exit;

    } else {

        $_SESSION['error'] = "Username atau password salah!";
        header("Location: index.php");
        exit;

    }

} catch (PDOException $e) {

    $_SESSION['error'] = "Terjadi kesalahan saat memproses login.";
    header("Location: index.php");
    exit;

}

?>

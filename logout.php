
<?php

session_start();

// Menghapus seluruh data session
$_SESSION = [];

session_destroy();

// Kembali ke halaman login
header("Location: index.php");
exit;

?>

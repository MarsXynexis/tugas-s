<?php
$conn = mysqli_connect("localhost", "root", "", "crud_berita");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $query = "DELETE FROM berita WHERE ID = '$_GET[id]'";
    mysqli_query($conn, $query);
    $nama_gambar = $_GET['judul'] . '.png';
    unlink("src/" . $nama_gambar);
}
header("Location: index.php" . (isset($_GET['id']) ? "?id=" . $_GET['id'] : ""));

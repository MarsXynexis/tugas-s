<?php
$conn = mysqli_connect("localhost", "root", "", "crud_berita");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
$query = "SELECT * FROM berita";
$result = mysqli_query($conn, $query);
$beritas = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Terbau</title>
</head>

<body>
    <div style="display: flex; align-items: center; background-color: #f2f2f2; padding: 10px; gap: 10px;">
        <h3>Portal Berita</h3>
        <a href="#">Home</a>
        <a href="input.php">Input Berita</a>
    </div>
    <div style="padding: 20px;">
        <h1>Berita Terbaru</h1>
        <p>Selamat datang di situs berita terbau!</p>
        <?php if (isset($_GET['id'])) { ?>
            <div style="background-color: #ff0000d5; color:#ffffff; padding: 10px; margin-bottom: 10px; border-radius: 5px; font-weight: bold;">
                <p>Berita dengan ID <?php echo $_GET['id']; ?> telah dihapus.</p>
            </div>
        <?php } ?>
        <table border="1" cellpadding="10" cellspacing="0" color="black">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>Penerbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($beritas as $berita) {
                    echo "<tr>";
                    echo "<td>" . $berita['ID'] . "</td>";
                    echo '<td><img src="src/' . $berita['PATH_IMG'] . '" width="320" ></td>';
                    echo "<td>" . $berita['JUDUL'] . "</td>";
                    echo "<td>" . $berita['ISI'] . "</td>";
                    echo "<td>" . $berita['PENERBIT'] . "</td>";
                    echo "<td><a href='input.php?id=" . $berita['ID'] . "'>Edit</a> | <a href='hapus.php?id=" . $berita['ID'] . "&judul=" . $berita['JUDUL'] . "'>Hapus</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
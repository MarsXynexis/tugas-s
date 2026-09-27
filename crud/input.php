<?php
$conn = mysqli_connect("localhost", "root", "", "crud_berita");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $query = "SELECT * FROM berita WHERE ID = '$_GET[id]'";
    $result = mysqli_query($conn, $query);
    $berita = mysqli_fetch_all($result, MYSQLI_ASSOC);
}


if (isset($_POST['JUDUL'])) {
    if (isset($_POST['ID'])) {
        $query = "UPDATE berita SET JUDUL = '$_POST[JUDUL]', ISI = '$_POST[ISI]', PENERBIT = '$_POST[PENERBIT]' WHERE ID = '$_POST[ID]'";
        if (isset($_FILES['PATH_IMG'])) {
            $tmp_gambar = $_FILES['PATH_IMG']['tmp_name'];
            $nama_gambar = $_POST['JUDUL'] . '.png';
            unlink("src/" . $nama_gambar);
            move_uploaded_file($tmp_gambar, "src/" . $nama_gambar);

            $query = "UPDATE berita SET JUDUL = '$_POST[JUDUL]', ISI = '$_POST[ISI]', PENERBIT = '$_POST[PENERBIT]', PATH_IMG = '$nama_gambar' WHERE ID = '$_POST[ID]'";
        }
        mysqli_query($conn, $query);
        header("Location: index.php");
    } else {
        $nama_gambar = $_POST['JUDUL'] . '.png';
        $tmp_gambar = $_FILES['PATH_IMG']['tmp_name'];
        $query = "INSERT INTO berita (JUDUL, ISI, PENERBIT, PATH_IMG) VALUES ('$_POST[JUDUL]', '$_POST[ISI]', '$_POST[PENERBIT]', '$nama_gambar')";
        mysqli_query($conn, $query);
        move_uploaded_file($tmp_gambar, "src/" . $nama_gambar);
        header("Location: index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Berita</title>
</head>

<body>
    <div style="display: flex; align-items: center; background-color: #f2f2f2; padding: 10px; gap: 10px;">
        <h3>Portal Berita</h3>
        <a href="index.php">Home</a>
        <a href="#">Input Berita</a>
    </div>
    <div style="padding: 20px;">
        <h1>Input Berita</h1>
        <form action="input.php" method="POST" enctype="multipart/form-data">
            <?php if (isset($_GET['id'])) { ?>
                <input type="hidden" name="ID" value="<?php echo $_GET['id']; ?>">
            <?php } ?>

            <label for="judul">Judul:</label>
            <input type="text" name="JUDUL" id="judul" value="<?php echo isset($berita[0]['JUDUL']) ? $berita[0]['JUDUL'] : ''; ?>" required><br><br>

            <label for="isi">Isi:</label>
            <textarea name="ISI" id="isi" required><?php echo isset($berita[0]['ISI']) ? $berita[0]['ISI'] : ''; ?></textarea><br><br>

            <label for="penerbit">Penerbit:</label>
            <input type="text" name="PENERBIT" id="penerbit" value="<?php echo isset($berita[0]['PENERBIT']) ? $berita[0]['PENERBIT'] : ''; ?>" required><br><br>

            <?php if (!empty($berita[0]['PATH_IMG'])) { ?>
                <img src="src/<?php echo $berita[0]['PATH_IMG']; ?>" width="150" alt="Preview"><br>
                <small>File saat ini: <?php echo $berita[0]['PATH_IMG']; ?></small><br>
            <?php } ?>
            <br>
            <label for="gambar">Gambar:</label>
            <input type="file" name="PATH_IMG" id="gambar" value="<?php echo isset($berita[0]['PATH_IMG']) ? $berita[0]['PATH_IMG'] : ''; ?>" accept="image/*"><br><br>


            <button type="submit">Simpan</button>
        </form>
    </div>
</body>

</html>
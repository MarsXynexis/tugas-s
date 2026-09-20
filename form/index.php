<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 3 (BIODATA)</title>
</head>

<body>
    <!-- JUDUL TUGAS -->
    <p align="center">Ini Tugas Buat Biodata</p>
    <!-- INISIASI TABEL DENGAN ELEMEN TAG PEMBUKA TABLE BERBORDER 1 -->
    <table border="1">
        <!-- BARIS HEADER DENGAN BG BERWARNA CYAN DAN BERUKURAN 3 KOLOM -->
        <tr bgcolor="cyan">
            <th colspan="3">KARTU IDENTITAS DIRI</th>
        </tr>
        <!-- FOTO DENGAN UKURAN 200, 7 BARIS, DAN DISAMPINGNYA DATA NAMA DENGAN UKURAN 1 BARIS BIASA -->
        <tr>
            <td rowspan="7"><img src="wow.jpg" alt="ini foto" width="200"></td>
            <td>NAMA: </td>
            <?php
            if(isset($_GET['nama'])) {
                echo "<td>" . $_GET['nama'] . "</td>";
            }
            ?>
        </tr>
        <!-- BARIS ALAMAT -->
        <tr>
            <td>TTL: </td>
            <?php
            if(isset($_GET['TTL'])) {
                echo "<td>" . $_GET['TTL'] . "</td>";
            }
            ?>
        </tr>
        <!-- BARIS JENIS KELAMIN -->
        <tr>
            <td>JENIS KELAMIN: </td>
            <?php
            if(isset($_GET['jenis_kelamin'])) {
                echo "<td>" . $_GET['jenis_kelamin'] . "</td>";
            }
            ?>
        </tr>
        <!-- BARIS AGAMA -->
        <tr>
            <td>AGAMA: </td>
            <?php
            if(isset($_GET['agama'])) {
                echo "<td>" . $_GET['agama'] . "</td>";
            }
            ?>  
        </tr>
        <!-- BARIS PEKERJAAN -->
        <tr>
            <td>PEKERJAAN: </td>
            <?php
            if(isset($_GET['pekerjaan'])) {
                echo "<td>" . $_GET['pekerjaan'] . "</td>";
            }
            ?>
        </tr>
        <!-- BARIS ALAMAT -->
        <tr>
            <td>ALAMAT: </td>
            <?php
            if(isset($_GET['alamat'])) {
                echo "<td>" . $_GET['alamat'] . "</td>";
            }
            ?>
        </tr>
        <!-- BARIS HOBI -->
        <tr>
            <td>HOBI: </td>
            <?php
            if(isset($_GET['hobi'])) {
                echo "<td>" . $_GET['hobi'] . "</td>";
            }
            ?>
        </tr>
    </table>

    <form action="" method="get">
        <input type="text" name="nama" placeholder="Nama"><br>
        <input type="text" name="TTL" placeholder="TTL"><br>
        <input type="text" name="jenis_kelamin" placeholder="Jenis Kelamin"><br>
        <input type="text" name="agama" placeholder="Agama"><br>
        <input type="text" name="pekerjaan" placeholder="Pekerjaan"><br>
        <input type="text" name="alamat" placeholder="Alamat"><br>
        <input type="text" name="hobi" placeholder="Hobi"><br>
    <button type="submit">kirim</button>
    </form>
</body>

<?php

if(isset($_GET['nama'])) {
    echo "<p>Nama Anda: " . $_GET['nama'] . "</p>";
}

?>
</html>

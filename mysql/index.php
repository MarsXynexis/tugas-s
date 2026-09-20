<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "tgs_2507411052_raziq_phpadmin";

$conn = mysqli_connect($hostname, $username, $password, $database);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {
    echo "Connected successfully";
} 
$table_name = "transaksi";

$sql = 'CREATE TABLE IF NOT EXISTS `'  . $table_name . '` (
    `id_transaksi` int(11) NOT NULL,
    `id_produk` int(11) NOT NULL,
    `tgl_transaksi` date NOT NULL,
    `kuantitas` tinyint(4) NOT NULL,
    `harga` int(11) NOT NULL,
    `id_pelanggan` int(11) NOT NULL,
    PRIMARY KEY (`id_transaksi`),
    KEY `id_produk` (`id_produk`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1';
    
    $query = mysqli_query($conn, $sql);
    if ($query) {
       $query = "INSERT INTO transaksi (id_produk, tgl_transaksi, kuantitas, harga, id_pelanggan) VALUES (1, '2024-06-01', 2, 50000, 1), (2, '2024-06-02', 1, 75000, 2), (3, '2024-06-03', 3, 100000, 3), (4, '2024-06-04', 1, 25000, 4), (5, '2024-06-05', 2, 60000, 5), (6, '2024-06-06', 1, 80000, 6), (7, '2024-06-07', 2, 90000, 7), (8, '2024-06-08', 1, 120000, 8), (9, '2024-06-09', 3, 150000, 9), (10, '2024-06-10', 2, 200000, 10)";
        if (mysqli_query($conn, $query)) {
            echo "Data inserted successfully";
        } else {
            echo "Error inserting data: " . mysqli_error($conn);
        }
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }

    $select_query = "SELECT id_transaksi, id_produk, tgl_transaksi, kuantitas, harga, id_pelanggan, kuantitas*harga AS total_harga FROM transaksi";
    $datas = mysqli_query($conn, $select_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYSqli</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>ID Transaksi</th>
            <th>ID Produk</th>
            <th>Tanggal Transaksi</th>
            <th>Kuantitas</th>
            <th>Harga</th>
            <th>ID Pelanggan</th>
            <th>TOTAL HARGA</th>
        </tr>
        <? var_dump($datas); ?>
        <?php while ($data = mysqli_fetch_assoc($datas)): ?>
        <tr>
            <td><?= $data['id_transaksi'] ?></td>
            <td><?= $data['id_produk'] ?></td>
            <td><?= $data['tgl_transaksi'] ?></td>
            <td><?= $data['kuantitas'] ?></td>
            <td><?= $data['harga'] ?></td>
            <td><?= $data['id_pelanggan'] ?></td>
            <td><?= $data['total_harga'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
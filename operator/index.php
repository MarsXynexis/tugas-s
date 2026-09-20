<?php
$usn = isset($_POST['usn']) ? $_POST['usn'] : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';
$result = '';

if (isset($_POST['login'])) {
    $login = $usn == 'raziq' && $pass == '2507411052' ? true : false;
    if ($login) {
        $result = 'Selamat Datang ' . $usn;
    } else {
        $result = 'Login Gagal';
    }
}


?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login Sederhana</title>
</head>

<body>
    <h2>Login Sederhana</h2>

    <form method="POST">
        <label>Username:</label>
        <input type="text" name="usn" required><br><br>

        <label>Password:</label>
        <input type="password" name="pass" required><br><br>

        <button type="submit" name="login" value="+">login</button>
    </form>

    <br>
    <p><?php echo htmlspecialchars($result); ?></p>
</body>

</html>
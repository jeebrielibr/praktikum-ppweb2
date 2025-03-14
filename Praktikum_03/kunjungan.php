<?php
require_once("BukuTamu.php");
session_start();

if (!isset($_SESSION['bukutamu'])) {
    $_SESSION['bukutamu'] = [];
}

if (isset($_POST["submit"])) {
    // membuat objek buku tamu
    $bukutamu = new BukuTamu();

    $bukutamu->timestamp = date("Y-m-d H:i:s");
    $bukutamu->fullName = $_POST["fullname"];
    $bukutamu->email = $_POST["email"];
    $bukutamu->message = $_POST["message"];

    array_push($_SESSION['bukutamu'], $bukutamu);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Buku Tamu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container my-5">
        <h1 class="mb-2">Daftar Kunjungan</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Waktu</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Keperluan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['bukutamu'] as $entry): ?>
                <tr>
                    <td>
                        <?php echo htmlspecialchars($entry->timestamp); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($entry->fullName); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($entry->email); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($entry->message); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="index.php">&lt;&lt;&lt; kembali</a>
    </div>
</body>

</html>
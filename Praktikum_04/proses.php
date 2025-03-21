<?php
require_once('Kunjungan.php');
session_start();

if (!isset($_SESSION['bukutamu'])) {
    $_SESSION['bukutamu'] = [];
}

if (isset($_POST['submit'])) {
    $kunjungan = new Kunjungan();
    $kunjungan->fullname = $_POST['fullname'];
    $kunjungan->email = $_POST['email'];
    $kunjungan->jenis_kunjungan_id = $_POST['jenis_kunjungan_id'];
    $kunjungan->save();
}

$daftar_kunjungan = Kunjungan::getAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Buku Tamu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        table {
            margin-top: 20px;
        }
        th, td {
            text-align: center;
        }
        a {
            margin-top: 20px;
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <h1 class="mb-2 text-center">Buku Tamu</h1>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Timestamp</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Jenis</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($daftar_kunjungan as $entry): ?>
                <tr>
                    <td>
                        <?php echo htmlspecialchars($entry->id); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($entry->timestamp); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($entry->fullname); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($entry->email); ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars($entry->jenis_kunjungan_id); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-primary">&lt;&lt;&lt; kembali</a>
    </div>
</body>

</html>

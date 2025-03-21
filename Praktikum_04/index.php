<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #343a40;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center">Selamat Datang di Perpustakaan STT-NF</h2>
        <p class="text-center">Silahkan isi buku tamu di bawah ini</p>
        <hr />
        <form method="post" action="proses.php">
            <div class="form-group row">
                <label for="fullname" class="col-3 col-form-label">Nama Lengkap</label>
                <div class="col-9">
                    <input id="fullname" name="fullname" type="text" aria-describedby="fullnameHelpBlock"
                        class="form-control" placeholder="Masukkan nama lengkap">
                    <span id="fullnameHelpBlock" class="form-text text-muted">isi nama lengkap kamu.</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-3 col-form-label">Email</label>
                <div class="col-9">
                    <input id="email" name="email" type="email" class="form-control" aria-describedby="emailHelpBlock" placeholder="Masukkan email aktif">
                    <span id="emailHelpBlock" class="form-text text-muted">isi dengan email aktif kamu</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="jenis_kunjungan_id" class="col-3 col-form-label">Jenis Kunjungan</label>
                <div class="col-9">
                    <?php
                    require_once('JenisKunjungan.php');
                    $jenisKunjungan = JenisKunjungan::getAll();
                    ?>
                    <select id="jenis_kunjungan_id" name="jenis_kunjungan_id" class="custom-select">
                        <?php foreach ($jenisKunjungan as $jenis):?>
                        <option value="<?php echo $jenis->id; ?>"><?php echo $jenis->display_name;?></option>
                        <?php endforeach; ?>
                    </select>
                    <span id="jenisKunjunganBlock" class="form-text text-muted">Tujuan kunjungan kamu</span>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-3 col-9">
                    <button name="submit" type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>

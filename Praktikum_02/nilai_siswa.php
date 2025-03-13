<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Form Nilai Siswa</title>

    <style>
        @media (min-width: 426px) {
            form {
                width: 65%;
            }
        }
        .result-box {
            background-color: #f8f9fa;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Sistem Penilaian</a>
            </div>
        </nav>
    </header>

    <main role="main" class="container mt-3">
        <h3>Form Penilaian Siswa</h3>
        <hr />
        <form class="mx-auto" action="nilai_siswa.php" method="POST">
            <div class="form-group row">
                <label for="nama" class="col-5 col-form-label font-weight-bold text-right">Nama Lengkap</label>
                <div class="col-7">
                    <input id="nama" name="nama" placeholder="Nama Lengkap" type="text" required="required" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="matkul" class="col-5 col-form-label font-weight-bold text-right">Mata Kuliah</label>
                <div class="col-7">
                    <select id="mata_kuliah" name="mata_kuliah" class="custom-select" required="required">
                        <option value="DDP">Dasar Dasar Pemrograman</option>
                        <option value="BDI">Basis Data I</option>
                        <option value="PWEB1">Pemrograman Web 1</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="nilai_uts" class="col-5 col-form-label font-weight-bold text-right">Nilai UTS</label>
                <div class="col-7">
                    <input id="nilai_uts" name="nilai_uts" placeholder="Nilai UTS" type="number" class="form-control" required="required"
                        min="0" max="100">
                </div>
            </div>
            <div class="form-group row">
                <label for="nilai_uas" class="col-5 col-form-label font-weight-bold text-right">Nilai UAS</label>
                <div class="col-7">
                    <input id="nilai_uas" name="nilai_uas" placeholder="Nilai UAS" type="number" class="form-control" required="required"
                        min="0" max="100">
                </div>
            </div>
            <div class="form-group row">
                <label for="nilai_tugas" class="col-5 col-form-label font-weight-bold text-right">Nilai
                    Tugas/Praktikum</label>
                <div class="col-7">
                    <input id="nilai_tugas" name="nilai_tugas" placeholder="Nilai Tugas" type="number" class="form-control"
                        required="required" min="0" max="100">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-5 col-7">
                    <button type="submit" name="proses" class="btn btn-primary" value="simpan">Simpan</button>
                </div>
            </div>
        </form>
        <?php
        if(isset($_POST['proses'])) {
        $proses= $_POST['proses'];
        $nama_siswa = $_POST['nama'];
        $mata_kuliah = $_POST['mata_kuliah'];
        $nilai_uts = $_POST['nilai_uts'];
        $nilai_uas = $_POST['nilai_uas'];
        $nilai_tugas = $_POST['nilai_tugas'];
        
        $nilai_akhir = (0.3 * $nilai_uts) + (0.35 * $nilai_uas) + (0.35 * $nilai_tugas);

        if ($nilai_akhir >= 85) {
            $grade = "A";
        } elseif ($nilai_akhir >= 70) {
            $grade = "B";
        } elseif ($nilai_akhir >= 56) {
            $grade = "C";
        } elseif ($nilai_akhir >= 36) {
            $grade = "D";
        } elseif ($nilai_akhir >= 0) {
            $grade = "E";
        } else {
            $grade = "I";
        }

        $status = ($grade == "A" || $grade == "B" || $grade == "C") ? "Lulus" : "Tidak Lulus";

        switch ($grade) {
            case "A":
                $predikat = "Sangat Memuaskan";
                break;
            case "B":
                $predikat = "Memuaskan";
                break;
            case "C":
                $predikat = "Cukup";
                break;
            case "D":
                $predikat = "Kurang";
                break;
            case "E":
                $predikat = "Sangat Kurang";
                break;
            default:
                $predikat = "Tidak Ada";
                break;
        }

        echo '<div class="result-box">';
        echo '<h4 class="mb-3">Hasil Penilaian</h4>';
        echo '<table class="table table-bordered">';
        echo '<tr><td width="30%">Nama</td><td>'.$nama_siswa.'</td></tr>';
        echo '<tr><td>Mata Kuliah</td><td>'.$mata_kuliah.'</td></tr>';
        echo '<tr><td>Nilai UTS</td><td>'.$nilai_uts.'</td></tr>';
        echo '<tr><td>Nilai UAS</td><td>'.$nilai_uas.'</td></tr>';
        echo '<tr><td>Nilai Tugas</td><td>'.$nilai_tugas.'</td></tr>';
        echo '<tr><td>Nilai Akhir</td><td>'.number_format($nilai_akhir, 2).'</td></tr>';
        echo '<tr><td>Grade</td><td>'.$grade.'</td></tr>';
        echo '<tr><td>Status</td><td>'.$status.'</td></tr>';
        echo '<tr><td>Predikat</td><td>'.$predikat.'</td></tr>';
        echo '</table>';
        echo '</div>';
        }
        ?>

    </main>

    <footer class="mt-5" style="bottom: 0; left: 0; right: 0; position: fixed;">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Jibril Ibrahim &copy;<?= date("Y") ?></a>
            </div>
        </nav>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>
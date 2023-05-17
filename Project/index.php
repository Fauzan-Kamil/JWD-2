<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" href="img/logo.png">
    <title>Setoran Tunai Bank Ajaib</title>
</head>
<body>
    <div class="container" >
        <div class="row">
            <div class="col-12 text-center">
                <img src="img/bank.jpg" class="img-fluid" alt="Responsive image">
            </div>
        </div>
    </div>
    <?php
    $cabang = array("Jakarta","Bogor","Bekasi","Depok","Tangerang");
    sort($cabang);
    ?>
    <form action="" method="POST" class="form-label">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="card" style="width: 600px;">
                        <div class="card-header text-center" style="background-color: #007bff; color: #fff;">
                            Form Setoran Bank Ajaib
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="laki-laki" name="jeniskelamin" value="laki-laki">
                                    <label class="form-check-label" for="laki-laki">Laki-laki</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="perempuan" name="jeniskelamin" value="perempuan">
                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="cabang" class="form-label">Cabang</label>
                                <select class="form-select" id="cabang" name="cabang">
                                    <option value="">- Kantor Cabang -</option>
                                    <?php
                                    foreach ($cabang as $view){
                                        echo "<option value='$view'>$view</option>";
                                    }
                                    ?>	
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nominal" class="form-label">Nominal</label>
                                <input type="number" class="form-control" id="nominal" name="nominal">
                            </div>
                            <div class="mb-3">
                                <label for="noRekening" class="form-label">Nomor Rekening</label>
                                <input type="text" class="form-control" id="noRekening" name="noRekening">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php
    $data = file_get_contents('data/setoran-tunai.txt');
    $data = json_decode($data, true);
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $jeniskelamin = $_POST['jeniskelamin'];
        $cabang = $_POST['cabang'];
        $nominal = $_POST['nominal'];
        $noRekening = $_POST['noRekening'];

        // Cek nominal setoran 
        if($nominal < 100000){
            echo "<script>alert('Setoran minimal 100 ribu!')</script>";
        } else {
            echo "<script>alert('Setoran berhasil!')</script>";
            // Biaya admin untuk transaksi dibawah 1 juta
            if($nominal < 1000000){
                $biayaAdmin = 5000;
            } else {
                $biayaAdmin = 0;
            }
            ?>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6">
                        <div class="card mt-4" style="width: 600px;">
                            <div class="card-header text-center" style="background-color: #007bff; color: #fff;">
                                Detail Setoran
                            </div>
                            <div class="card-body">
                                <p>Nama: <?php echo $nama; ?></p>
                                <p>Jenis Kelamin: <?php echo $jeniskelamin; ?></p>
                                <p>Cabang: <?php echo $cabang; ?></p>
                                <p>Nominal: <?php echo $nominal; ?></p>
                                <p>Nomor Rekening: <?php echo $noRekening; ?></p>
                                <p>Biaya Admin: <?php echo $biayaAdmin; ?></p>
                                <p>Total: <?php echo ($nominal + $biayaAdmin); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $newData = array(
                'nama' => $nama,
                'jeniskelamin' => $jeniskelamin,
                'cabang' => $cabang,
                'nominal' => $nominal,
                'noRekening' => $noRekening,
                'biayaAdmin' => $biayaAdmin
            );
            $data[] = $newData;
            $jsonData = json_encode($data);
            file_put_contents('data/setoran-tunai.txt', $jsonData);
            $data_json = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents('data/setoran-tunai.txt', $data_json);
        }
    }
    ?>
    <div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card" style="width: 600px;">
                <div class="card-header text-center" style="background-color: #007bff; color: #fff;">
                    Data Setoran
                </div>
                <div class="card-body">
                    <div class="table table-sm">
                        <table class="table table-success table-striped" >
                            <tr>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Cabang</th>
                                <th>Nominal</th>
                                <th>Nomor Rekening</th>
                                <th>Biaya Admin</th>
                                <th>Total</th>
                            </tr>
                            <?php
                            foreach($data as $view){
                            ?>
                            <tr>
                                <td><?php echo $view['nama']; ?></td>
                                <td><?php echo $view['jeniskelamin']; ?></td>
                                <td><?php echo $view['cabang']; ?></td>
                                <td><?php echo $view['nominal']; ?></td>
                                <td><?php echo $view['noRekening']; ?></td>
                                <td><?php echo $view['biayaAdmin']; ?></td>
                                <td><?php echo ($view['nominal'] + $view['biayaAdmin']); ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
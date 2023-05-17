<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Form Setoran Tunai</title>
</head>
<body>
    <h1 class="display-1" style="text-align: center;">Form Setoran Tunai</h1>
    <?php
    $cabang = array("Jakarta","Bogor","Bekasi","Depok","Tangerang");
    sort($cabang);
    ?>
    <!-- Form Input dengan Tabel -->
    <form action="" method="POST" class="form-label">
        <table class="table table-success table-striped">
            <tr>
                <td><label for="nama">Nama</label></td>
                <td><input type="text" id="nama" name="nama"></td>
            </tr>
            <tr>
                <td><label for="jeniskelamin">Jenis Kelamin</label></td>
                <td>
                    <input type="radio" id="laki-laki" name="jeniskelamin" value="laki-laki">
                    <label for="laki-laki">Laki-laki</label>
                    <input type="radio" id="perempuan" name="jeniskelamin" value="perempuan">
                    <label for="perempuan">Perempuan</label>
                </td>
            </tr>
            <tr>
                <td><label for="cabang">Cabang</label></td>
                <td>
                    <select id="cabang" name="cabang">
                        <option value="">- Kantor Cabang -</option>
                        <?php
                            // Menampilkan dropdown Kantor cabang berdasarkan data pada array $cabang
                            foreach ($cabang as $view){
                                echo "<option value='$view'>$view</option>";
                            }
                        ?>	
                    </select>
                </td>
            </tr>
            <tr> 
                <td><label for="nominal">Nominal</label></td>
                <td><input type="number" id="nominal" name="nominal"></td>
            </tr>
            <tr>
                <td><label for="noRekening">Nomor Rekening</label></td>
                <td><input type="text" id="noRekening" name="noRekening"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" class="btn btn-primary" name="submit">Kirim</button></td>
            </tr>
        </table>
    </form>
    <?php
// Load data setoran-tunai.txt
$data = file_get_contents('setoran-tunai.txt');
$data = json_decode($data, true);

// Tampilkan data setoran
if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $cabang = $_POST['cabang'];
    $nominal = $_POST['nominal'];
    $noRekening = $_POST['noRekening'];

    // Validasi setoran minimal 100 ribu
    if($nominal < 100000){
        // Alert setoran minimal 100 ribu
        echo "<script>alert('Setoran minimal 100 ribu!')</script>";
    } else {
        // Alert setoran berhasil
        echo "<script>alert('Setoran berhasil!')</script>";
        // Bila setoran di bawah 1 juta, ada biaya admin sebesar 5 ribu.
        if($nominal < 1000000){
            $biayaAdmin = 5000;
        } else {
            $biayaAdmin = 0;
        }

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
                file_put_contents('setoran-tunai.txt', $jsonData);
            // Mengubah data menjadi format JSON dengan pretty print
            $data_json = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents('setoran-tunai.txt', $data_json);
        }
    }
    ?>

    <!-- Tampilkan data setoran yang ada di txt -->
    <div class="card">
        <div class="card-header" style="background-color: #007bff; color: #fff;">
            Data Setoran
        </div>
        <div class="card-body">
            <table class="table table-success table-striped">
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
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Tiket Pesawat</title>
    <meta charset="utf-8">
    <!-- Bootstrap -->
    <link href="library\css\bootstrap.min.css" rel="stylesheet">
    <script src="library\js\bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- Image  -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <img src="img\Pesawat.jpg" class="img-fluid" alt="Responsive image" style="width: 100%; height: 400px;">
            </div>
        </div>

    <h1>Pendaftaran Rute Terbang</h1>
    <!-- Start Form Input -->
    <!-- Style Form dengan Bootstrap -->
    <form action="fungsi.php" method="POST" class="form-horizontal">
        <table class="table table-striped" border="1">
            <tr class="form-group">
                <td class="col-sm-2">
                    Maskapai
                    <input type="text" name="maskapai" class="form-control">
                </td>
            </tr>
            <tr>
                <td class="col-sm-2">
                    Bandara Asal
                    <select name="asal" class="form-control">
                        <option value="Soekarno Hatta (CGK)">Soekarno Hatta (CGK)</option>
                        <option value="Abdul Rachman Saleh (MLG)">Abdul Rachman Saleh (MLG)</option>
                        <option value="Husein Sastranegara (BDO)">Husein Sastranegara (BDO)</option>
                        <option value="Juanda (SUB)">Juanda (SUB)</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="col-sm-2">
                    Bandara Tujuan
                    <select name="tujuan" class="form-control">
                        <option value="Ngurah Rai (DPS)">Ngurah Rai (DPS)</option>
                        <option value="Hasanuddin (UPG)">Hasanuddin (UPG)</option>
                        <option value="Inanwatan (INX)">Inanwatan (INX)</option>
                        <option value="Sultan Iskandarmuda (BTJ)">Sultan Iskandarmuda (BTJ)</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="col-sm-2">
                    Harga Tiket
                    <input type="text" name="harga_tiket" id="harga_tiket" class="form-control">
                </td>
            </tr>
            <!-- Button dengan Bootstrap -->
            <tr class="form-group" style="text-align: center">
                <td class="col-sm-2" style="text-align: center">
                    <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                </td>
        </table>
    </form>
    <!-- End Form Input -->
    <h1>Daftar Rute Tersedia</h1>
    <!-- Read Data JSON -->
    <?php
    $data = file_get_contents('data\data.json');

    // Konversi JSON menjadi array asosiatif
    $penerbangan = json_decode($data, true);
    ?>
    
    <!-- Start Table -->
    <table class="table table-striped" border="1">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Maskapai</th>
                <th scope="col">Bandara Asal</th>
                <th scope="col">Bandara Tujuan</th>
                <th scope="col">Harga Tiket</th>
                <th scope="col">Pajak</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <!-- Tampilkan data Baru -->
        <?php
        $no = 1;
        foreach ($penerbangan as $p) :
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $p['maskapai']; ?></td>
                <td><?= $p['asal']; ?></td>
                <td><?= $p['tujuan']; ?></td>
                <td><?= $p['harga_tiket']; ?></td>
                <td><?= $p['pajak']; ?></td>
                <td><?= $p['total']; ?></td>
            </tr>
        <?php endforeach; ?>
        
    </table>
    <!-- End Table -->
</body>
</html>

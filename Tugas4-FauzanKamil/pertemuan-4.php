<!DOCTYPE html>
<html>
<head>
    <title>Form Input</title>
    <meta charset="utf-8">
    <!-- Bootstrap -->
    <link href="library/css/bootstrap.min.css" rel="stylesheet">
    <script src="library/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1>Form Input</h1>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                    </div>
                    <div class="form-group">
                        <label for="hobi">Hobi</label>
                        <select class="form-control" id="hobi" name="hobi">
                            <option value="Korespodensi">Korespodensi</option>
                            <option value="Traveling">Traveling</option>
                            <option value="Shopping">Shopping</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit">Kirim</button>
                </form>
                <?php
                    if(isset($_POST['submit'])) {
                        // Ambil data dari form
                        $nama = $_POST['nama'];
                        $email = $_POST['email'];
                        $hobi = $_POST['hobi'];
                        $alamat = $_POST['alamat'];

                        // Validasi input
                        if(empty($nama) || empty($email) || empty($hobi) || empty($alamat)) {
                            echo '<div class="alert alert-danger" role="alert">Silakan isi semua kolom.</div>';
                        } else {
                            // Tampilkan data yang diinputkan dengan bootstrap
                            echo '<div class="card mt-3">
                                    <div class="card-header" style="background-color: #007bff; color: #fff;">
                                        Data yang diinputkan
                                    </div>
                                    <div class="card-body">
                                        <p>Nama : ' . $nama . '</p>
                                        <p>Email : ' . $email . '</p>
                                        <p>Hobi : ' . $hobi . '</p>
                                        <p>Alamat : ' . $alamat . '</p>
                                    </div>
                                </div>';
                        }
                    }
                    ?>
            </div>
        </div>
    </div>
</body>
</html>

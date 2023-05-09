<!DOCTYPE html>
<html>
<head>
    <title>Pertemuan 2</title>
</head>
<body>
    <h1> Program Menghitung Nilai Mata Kuliah </h1>
    <!-- Form -->
    <form method="post" action="">
        Masukkan Nama <br>
        <input type="text" name="nama" placeholder="Masukkan Nama"> <br>
        Masukkan Nilai Matematika <br>
        <input type="text" name="nilai_Mtk" placeholder="Masukkan Nilai Matematika"> <br>
        Masukkan Nilai Bahasa Inggris <br>
        <input type="text" name="nilai_inggris" placeholder="Masukkan Nilai Bahasa Inggris"><br>
        Masukkan Nilai Indonesia <br>
        <input type="text" name="nilai_indo" placeholder="Masukkan Nilai Indonesia"><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <!-- PHP -->
    <?php
        if(isset($_POST['submit'])){
            $nama = $_POST['nama'];
            $nilai_Mtk = $_POST['nilai_Mtk'];
            $nilai_inggris = $_POST['nilai_inggris'];
            $nilai_indo = $_POST['nilai_indo'];
            $nilai_akhir = ($nilai_Mtk + $nilai_inggris + $nilai_indo) / 3;
            echo "Nama $nama <br>";
            if($nilai_akhir >= 80){
                echo "Nilai $nama, $nilai_akhir, Lulus";
            }elseif($nilai_akhir >= 70){
                echo "Nilai $nama, $nilai_akhir, Lulus";
            }elseif($nilai_akhir >= 60){
                echo "Nilai $nama, $nilai_akhir, Lulus";
            }elseif($nilai_akhir >= 50){
                echo "Nilai $nama, $nilai_akhir, Tidak Lulus";
            }else{
                echo "Nilai $nama, $nilai_akhir, Anda dinyatakan tidak lulus";
            }
        }
        else {
            echo "Silahkan masukkan data";
        }
    ?>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Tugas Pertemuan 1</title>
</head>
<body>
    <h1>Ganjil Genap</h1>
    <form method="post" action="">
        <input type="text" name="bilangan" placeholder="Masukkan Bilangan">
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
        if(isset($_POST['submit'])){
            $bilangan = $_POST['bilangan'];
            if($bilangan % 2 == 0){
                echo "Bilangan $bilangan adalah bilangan genap";
            }else{
                echo "Bilangan $bilangan adalah bilangan ganjil";
            }
        }
    ?>
</body>
</html>
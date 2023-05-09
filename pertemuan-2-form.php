<!DOCTYPE html>
<html>
<head>
    <title>Form Biodata</title>
</head>
<body>
    <h1>Form Biodata</h1>
    <form method="post" action="">
        <label>First Name:</label>
        <input type="text" name="first_name" id="first_name" placeholder="First Name"><br>
        <br>
        <label>Jenis Kelamin:</label>
        <label><input type="radio" name="jenis_kelamin" value="laki-laki">Laki-laki</label>
        <label><input type="radio" name="jenis_kelamin" value="perempuan">Perempuan</label>
        <br>
        <br>
        <label>Hobi:</label>
        <label><input type="checkbox" name="hobi[]" value="membaca">Membaca</label>
        <label><input type="checkbox" name="hobi[]" value="menulis">Menulis</label>
        <label><input type="checkbox" name="hobi[]" value="traveling">Traveling</label>
        <br>
        <br>
        <label>Pendidikan:</label>
        <select name="pendidikan">
            <option value="SD">SD</option>
            <option value="SMP">SMP</option>
            <option value="SMA">SMA</option>
        </select>
        <br>
        <br>
        <label>Alamat:</label>
        <textarea name="alamat" rows="5" cols="40"></textarea>
        <br>
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    if(isset($_POST['submit'])) {
        $first_name = $_POST['first_name'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $hobi = implode(", ", $_POST['hobi']);
        $pendidikan = $_POST['pendidikan'];
        $alamat = $_POST['alamat'];
        echo "<h1>Biodata Anda</h1>";
        echo "First Name: $first_name <br>";
        echo "Jenis Kelamin: $jenis_kelamin <br>";
        echo "Hobi: $hobi <br>";
        echo "Pendidikan: $pendidikan <br>";
        echo "Alamat: $alamat <br>";
    }
    ?>
</body>
</html>
<?php
// Tangkap variabel dari form
$vnama = $_POST["_nama"];
$vgender = $_POST["_gender"];
$vhobby = $_POST["_hobby"];
$vpendidikan = $_POST["_pendidikan"];
$valamat = $_POST["_alamat"];

//Tampilkan datanya
echo "<h2>Biodata Anda</h2>";
echo "<pre>";
echo "Nama       : $vnama <br>";
echo "Gender     : $vgender <br>";
echo "Hobby      : "; 
foreach ($vhobby as $hb) {
echo $hb.", ";
}
echo "<br>Pendidikan : $vpendidikan <br>";
echo "Alamat     : $valamat";
echo "</pre>";
?>

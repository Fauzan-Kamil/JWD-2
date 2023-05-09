<?php
// fungsi untuk penjumlahan
function penjumlahan($a, $b){
    return $a + $b;
}

// fungsi untuk pengurangan
function pengurangan($a, $b){
    return $a - $b;
}

// fungsi untuk perkalian
function perkalian($a, $b){
    return $a * $b;
}

// fungsi untuk pembagian
function pembagian($a, $b){
    // memeriksa apakah nilai $b sama dengan 0
    if($b == 0){
        // jika $b sama dengan 0, kembalikan pesan kesalahan
        return "Error: Pembagi tidak boleh 0!";
    } else {
        // jika tidak, lakukan operasi pembagian
        return $a / $b;
    }
}
$title = "Tugas 2 - Fauzan Kamil";
$bilangan1 = 9;
$bilangan2 = 3;

echo "<h2>" . $title . "</h2>";

// menampilkan bilangan yang akan dioperasikan
echo " Bilangan 1 = " . $bilangan1; 
echo "<br>";
echo " Bilangan 2 = " . $bilangan2;
echo "<br>";
echo "<hr>";

// contoh penggunaan fungsi
echo "<h3>Hasil Operasi Menggunakan Fungsi</h3>";
echo "Penjumlahan " . $bilangan1 . " dan " . $bilangan2 . " adalah " . penjumlahan($bilangan1, $bilangan2) . "<br>";
echo "Pengurangan " . $bilangan1 . " dan " . $bilangan2 . " adalah " . pengurangan($bilangan1, $bilangan2) . "<br>";
echo "Perkalian " . $bilangan1 . " dan " . $bilangan2 . " adalah " . perkalian($bilangan1, $bilangan2) . "<br>";
echo "Pembagian " . $bilangan1 . " dan " . $bilangan2 . " adalah " . pembagian($bilangan1, $bilangan2) . "<br>";

?>

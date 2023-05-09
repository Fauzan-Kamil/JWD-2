<?php
// membuat fungsi
function tambah($a, $b){
    return $a + $b;
}

// memanggil fungsi dan menampilkannya
$angka1 = 15;
$angka2 = 10;
$hasil = tambah($angka1, $angka2);

echo "Penjumlahan " . $angka1 . " dan " . $angka2 . " adalah " . $hasil . ".";
?>

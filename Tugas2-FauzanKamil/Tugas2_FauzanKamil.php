<?php 
$title = "Tugas 2 - Fauzan Kamil";
echo "=================== Bilangan Ganjil Genap 1-100 ===================== <br>";
for ($i=1; $i <= 100; $i++) { 
    if ($i % 2 == 0) {
        echo "$i adalah Bilangan Genap <br>";
    } else {
        echo "$i adalah Bilangan Ganjil <br>";
    }
}
/* Penjelasan :
1. echo "=================== Bilangan Ganjil Genap 1-100 <br> ====================="; adalah menampilkan judul program bilangan ganjil genap 1-100
2. for ($i=1; $i <= 100; $i++) { adalah Membuat perulangan for dengan variabel $i dimulai dari 1 dan berhenti pada 100
3. if ($i % 2 == 0) { adalah membuat kondisi jika $i dibagi 2 sama dengan 0 maka akan menampilkan bilangan genap
4. echo "$i adalah bilangan genap <br>"; adalah menampilkan hasil bilangan genap
5. else { adalah membuat kondisi jika $i dibagi 2 tidak sama dengan 0 maka akan menampilkan bilangan ganjil
6. echo "$i adalah bilangan ganjil <br>"; adalah menampilkan hasil bilangan ganjil
*/ 
?>
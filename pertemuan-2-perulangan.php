<!DOCTYPE html>
<html>
<head>
    <title>Perulangan</title>
</head>
<body>
    <h1>Perulangan</h1>
    <?php
    $bilangan = 10;
    for($i = 1; $i <= $bilangan; $i++){
        if($i % 2 == 0){
            echo "Bilangan $i adalah bilangan genap <br>";
        }
        }
    ?>
</body>
</html>

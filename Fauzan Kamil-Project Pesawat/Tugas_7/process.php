<?php 
    $path = "data.json";
    $flight = file_get_contents($path);
    $data = json_decode($flight, true);
    
    function tax($pdepart, $pdesti){
        $path2 = "depart.json";
        $flight2 = file_get_contents($path2);
        $data2 = json_decode($flight2, true);
        
        $path3 = "destination.json";
        $flight3 = file_get_contents($path3);
        $data3 = json_decode($flight3, true);

        $hargaDepart = 0;
        foreach ($data2 as $depart) {
            if ($depart['depart'] == $pdepart) {
                $hargaDepart = $depart['tax'];
                break;
            }
        }
    
        // cek harga di JSON desti
        $hargaDesti = 0;
        foreach ($data3 as $destination) {
            if ($destination['desti'] == $pdesti) {
                $hargaDesti = $destination['tax'];
                break;
            }
        }

        // jumlahkan harga
        $tax = $hargaDepart + $hargaDesti;

        // return hasil
        return $tax;
    };

    $flight = $_POST["flight"];
    $depart = $_POST["depart"];
    $destination = $_POST["destination"];
    $price = $_POST["price"];
    $tax = tax($depart, $destination);
    $total = $tax + $price;

    $input = array(
        $flight,
        $depart,
        $destination,
        $price,
        $tax,
        $total
    );

    $data[] = $input;

    $data = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents($path, $data);

    header('location: main.php');

?>
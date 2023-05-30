<?php 
    //Import data.json
    $path = "data.json";
    $flight = file_get_contents($path);
    $data = json_decode($flight, true);
    
    //Import depart.json
    $path2 = "depart.json";
    $flight2 = file_get_contents($path2);
    $data2 = json_decode($flight2, true);
    
    //Import destination.json
    $path3 = "destination.json";
    $flight3 = file_get_contents($path3);
    $data3 = json_decode($flight3, true);

    //convert to rupiah
    function rupiah($angka){
        $rupiah = "Rp " . number_format($angka,0,',','.');
        return $rupiah;
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <title>Tugas 7</title>
    </head>
    <body>
        <div class="container">
            <div class="box">
                <center><h1>PENDAFTARAN RUTE PENERBANGAN</h1></center>
                <!-- Form Insert Data -->
                <form action="process.php" method="POST">
                    <div class="form-group">
                        <label for="flight">Flight</label>
                        <input type="text" class="form-control" name="flight" id="flight" placeholder="Masukkan Nama Maskapai">
                    </div>
                    <div class="form-group">
                        <label for="depart">Depart</label>
                        
                        <select type="text" class="form-control" name="depart" id="depart" placeholder="Depart">
                            <option value="" disabled selected>Location</option>
                            <?php foreach($data2 as $d2){
                            $location = $d2['depart'];
                            ?>
                            <option value="<?php echo $location ?>"><?php echo $location ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="destination">Destination</label>
                        <select type="text" class="form-control" name="destination" id="destination" placeholder="Depart">
                            <option value="" disabled selected>Location</option>
                            <?php foreach($data3 as $d3){
                            $location = $d3['desti'];
                            ?>
                            <option value="<?php echo $location ?>"><?php echo $location ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Price</label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="Price">
                    </div>
                    <center><button type="submit" class="btn btn-primary">Submit</button></center>
                </form>

                <br>
                <!-- Form Read Data -->
                <form>
                    <table class="table table-striped table-light table-bordered" id="table">
                        <thead>
                            <tr>
                                <th scope="col"Maskapai</th>
                                <th scope="col">Depart</th>
                                <th scope="col">Destination</th>
                                <th scope="col">Price</th>
                                <th scope="col">Tax</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Looping for retrieve all data -->
                            <?php 
                            asort($data);
                            foreach($data as $data){
                                $airlane = $data[0];
                                $depart = $data[1];
                                $destination = $data[2];
                                $price = $data[3];
                                $tax = $data[4];
                                $total = $data[5];
                            ?>
                            <tr>
                                <td><?php echo $airlane?></td>
                                <td><?php echo $depart?></td>
                                <td><?php echo $destination?></td>
                                <td><?php echo rupiah($price) ?></td>
                                <td><?php echo rupiah($tax) ?></td>
                                <td><?php echo rupiah($total) ?></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>
<style>
    body{
        background-color: #f0f0f1;
    }
</style>
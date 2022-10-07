<?php
    include 'connect.php';

    // $select = "SELECT * From users INNER JOIN sketc ON users.id_energy = sketc.id_sketch";
    // $result = mysqli_query($conn, $select);

    $cost = $_GET["cost"];
    $cost_ds = $_GET["cost_ds"];
    $energy = $_GET["energy"];
    $energy_ds = $_GET["energy_ds"];
    $available_balance = $_GET["available_balance"];

    // $query = "insert into sketc (energy) values ('$energy')";
    // $result = mysqli_query($conn, $query);

    if($available_balance == $energy)
?>
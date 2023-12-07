<?php

include("conexion.php");

if (isset($_POST['agregar_galpon'])) {
    $id = $_POST['numero'];
    $nombre = $_POST['nombre'];
    $ubicacion = $_POST['ubicacion'];

    $query = "INSERT INTO galpones(id,nombre, ubicacion) VALUES ('$id','$nombre','$ubicacion')";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query failed");
    }

    header("Location: Galpones.php");
}

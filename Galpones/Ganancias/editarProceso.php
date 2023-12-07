<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $Ganancia = $_POST["txtGanancia"];
    $Galpon = $_POST["txtGalpon"];
    $Fecha = $_POST["txtFecha"];
    $Origen = $_POST["txtOrigen"];

    $sentencia = $bd->prepare("INSERT INTO ganancias(Ganancia,Galpon,Fecha,Origen) VALUES (?,?,?,?);");
    $resultado = $sentencia->execute([$Ganancia,$Galpon,$Fecha,$Origen]);


    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>
<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtGalpon"]) || empty($_POST["txtFecha"]) || empty($_POST["txtOrigen"])|| empty($_POST["txtGanancia"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $Origen = $_POST["txtOrigen"];
    $Galpon = $_POST["txtGalpon"];
    $Fecha = $_POST["txtFecha"];
    $Ganancia = $_POST["txtGanancia"];
    
    $sentencia = $bd->prepare("INSERT INTO ganancias(Origen,Galpon,Fecha,Ganancia) VALUES (?,?,?,?);");
    $resultado = $sentencia->execute([$Origen,$Galpon,$Fecha,$Ganancia]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>
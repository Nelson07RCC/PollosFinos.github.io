<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtGalpon"]) || empty($_POST["txtFecha"]) || empty($_POST["txtOrigen"])|| empty($_POST["txtPerdidas"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $Perdidas = $_POST["txtPerdidas"];
    $Galpon = $_POST["txtGalpon"];
    $Fecha = $_POST["txtFecha"];
    $Origen = $_POST["txtOrigen"];
    
    $sentencia = $bd->prepare("INSERT INTO gastos(Perdidas,Galpon,Fecha,Origen) VALUES (?,?,?,?);");
    $resultado = $sentencia->execute([$Perdidas,$Galpon,$Fecha,$Origen]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>
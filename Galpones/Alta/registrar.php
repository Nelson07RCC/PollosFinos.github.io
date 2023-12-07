<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtAlta"]) || empty($_POST["txtFecha"]) || empty($_POST["txtOrigen"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $Altas = $_POST["txtAlta"];
    $Galpon = $_POST["txtGalpon"];
    $Fecha = $_POST["txtFecha"];
    $Origen = $_POST["txtOrigen"];
    
    $sentencia = $bd->prepare("INSERT INTO altasgalpon(Altas,Galpon,Fecha,Origen) VALUES (?,?,?,?);");
    $resultado = $sentencia->execute([$Altas,$Galpon,$Fecha,$Origen]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>
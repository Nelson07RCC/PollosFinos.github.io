<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtBajas"]) || empty($_POST["txtFecha"]) ){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $Bajas = $_POST["txtBajas"];
    $Galpon = $_POST["txtGalpon"];
    $Fecha = $_POST["txtFecha"];
    
    
    $sentencia = $bd->prepare("INSERT INTO bajasgalpon(Bajas,Galpon,Fecha) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$Bajas,$Galpon,$Fecha]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>
<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }
    include_once 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $Altas = $_POST["txtAlta"];
    $Galpon = $_POST["txtGalpon"];
    $Fecha = $_POST["txtFecha"];
    $Origen = $_POST["txtOrigen"];

    $sentencia = $bd->prepare("UPDATE altasgalpon SET Altas = ?, Galpon = ?, Fecha = ?, Origen=? where codigo = ?;");
    $resultado = $sentencia->execute([$Altas,$Galpon,$Fecha,$Origen,$codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>
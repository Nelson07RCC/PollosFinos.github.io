<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $Bajas = $_POST["txtBajas"];
    $Galpon = $_POST["txtGalpon"];
    $Fecha = $_POST["txtFecha"];
    
    $sentencia = $bd->prepare("UPDATE bajasgalpon SET Bajas = ?, Galpon = ?, Fecha = ? where codigo = ?;");
    $resultado = $sentencia->execute([$Bajas,$Galpon,$Fecha,$codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>
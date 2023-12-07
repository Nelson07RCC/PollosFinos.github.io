<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }
    include_once 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $Fecha = $_POST["txtFecha"];
    $Galpon = $_POST["txtGalpon"];
    $Cliente = $_POST["txtCliente"];
    $PesoKg = $_POST["txtPesoKg"];
    $Total = $_POST["txtTotal"];
    

    $sentencia = $bd->prepare("UPDATE ventas SET Fecha = ?, Galpon = ?, Cliente = ?, PesoKg = ?, Total = ? where codigo = ?;");
    $resultado = $sentencia->execute([$Fecha,$Galpon,$Cliente,$PesoKg,$Total,$codigo]);
    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>
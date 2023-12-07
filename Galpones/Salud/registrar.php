<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtMedico"]) || empty($_POST["txtGalpon"]) || empty($_POST["txtFecha"])|| empty($_POST["txtVacunas"])|| empty($_POST["txtCoste"])|| empty($_POST["txtAlimento"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $Medico = $_POST["txtMedico"];
    $Galpon = $_POST["txtGalpon"];
    $Fecha = $_POST["txtFecha"];
    $Vacunas = $_POST["txtVacunas"];
    $Coste = $_POST["txtCoste"];
    $Alimento = $_POST["txtAlimento"];
    
    $sentencia = $bd->prepare("INSERT INTO salud(Medico,Galpon,Fecha,Vacunas,Coste,Alimento) VALUES (?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$Medico,$Galpon,$Fecha,$Vacunas,$Coste,$Alimento]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>
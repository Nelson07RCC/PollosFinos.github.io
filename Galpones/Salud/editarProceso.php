<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }
    include_once 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $Medico = $_POST["txtMedico"];
    $Galpon = $_POST["txtGalpon"];
    $Fecha = $_POST["txtFecha"];
    $Vacunas = $_POST["txtVacunas"];
    $Coste = $_POST["txtCoste"];
    $Alimento = $_POST["txtAlimento"];
    

    $sentencia = $bd->prepare("UPDATE salud SET Medico = ?, Galpon = ?, Fecha = ?, Vacunas = ?, Coste = ?, Alimento = ? where codigo = ?;");
    $resultado = $sentencia->execute([$Medico,$Galpon,$Fecha,$Vacunas,$Coste,$Alimento, $codigo]);
    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>
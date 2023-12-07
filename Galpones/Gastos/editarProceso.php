
<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }
    include_once 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $Perdidas = $_POST['txtPerdidas'];
    $Galpon = $_POST["txtGalpon"];
    $Fecha = $_POST["txtFecha"];
    $Origen = $_POST["txtOrigen"];

    $sentencia = $bd->prepare("UPDATE gastos SET Perdidas = ?, Galpon = ?, Fecha = ?, Origen=? where codigo = ?;");
    $resultado = $sentencia->execute([$Perdidas,$Galpon,$Fecha,$Origen,$codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>
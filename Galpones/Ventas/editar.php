<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from ventas where codigo = ?;");
    $sentencia->execute([$codigo]);
    $ventas = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Fecha: </label>
                        <input type="text" class="form-control" name="txtFecha" required 
                        value="<?php echo $ventas->Fecha; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Galpon: </label>
                        <input type="number" class="form-control" name="txtGalpon" autofocus required
                        value="<?php echo $ventas->Galpon; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cliente: </label>
                        <input type="text" class="form-control" name="txtCliente" autofocus required
                        value="<?php echo $ventas->Cliente; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">PesoKg: </label>
                        <input type="text" class="form-control" name="txtPesoKg" autofocus required
                        value="<?php echo $ventas->PesoKg; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Total: </label>
                        <input type="text" class="form-control" name="txtTotal" autofocus required
                        value="<?php echo $ventas->Total; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $ventas->codigo; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>
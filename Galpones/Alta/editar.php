<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from altasgalpon where codigo = ?;");
    $sentencia->execute([$codigo]);
    $altasgalpon = $sentencia->fetch(PDO::FETCH_OBJ);
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
                        <label class="form-label">Alta: </label>
                        <input type="text" class="form-control" name="txtAlta" required 
                        value="<?php echo $altasgalpon->Altas; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Galpon: </label>
                        <input type="number" class="form-control" name="txtGalpon" autofocus required
                        value="<?php echo $altasgalpon->Galpon; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha: </label>
                        <input type="text" class="form-control" name="txtFecha" autofocus required
                        value="<?php echo $altasgalpon->Fecha; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Origen: </label>
                        <input type="text" class="form-control" name="txtOrigen" autofocus required
                        value="<?php echo $altasgalpon->Origen; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $altasgalpon->codigo; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>
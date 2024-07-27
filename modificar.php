<?php
include "modelo/conexion.php";
$id = $_GET['id'];
$sql = $conexion->query("SELECT * FROM venta WHERE id = $id");
$datos = $sql->fetch_object();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estiloregistro.css">
    <link rel="stylesheet" href="librerias/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="librerias/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Modificar Productos</title>
</head>
<body>
<?php include("controlador/controlador_modificar.php"); ?>
<div class="container mt-5">
    <form class="col-4 p-3 m-auto form-container" method="POST" id="modificar" style="background-color:  #35DFCD;">
        <h3 class="text-center text-secondary"><b>Modificar Productos</b></h3>
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del mueble</label>
            <input type="text" class="form-control" name="nombre" value="<?= $datos->mueble ?>">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" name="descripcion" value="<?= $datos->descripcion ?>">
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="text" class="form-control" name="precio" inputmode="numeric" pattern="[0-9]*" value="<?= $datos->precio ?>">
        </div>
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" class="form-control" name="cantidad" inputmode="numeric" pattern="[0-9]*" value="<?= $datos->cantidad ?>">
        </div>
        <div class="mb-3">
            <label for="fecha_venta" class="form-label">Fecha de la venta</label>
            <input type="date" class="form-control" name="fecha_venta" value="<?= $datos->fecha ?>">
        </div>
        <div class="mb-3">
            <label for="tipo_pago" class="form-label">Tipo de pago</label>
            <select class="form-select" name="txtpago">
                <option value="A contado" <?= $datos->tipo_pago == 'A contado' ? 'selected' : '' ?>>A contado</option>
                <option value="A credito" <?= $datos->tipo_pago == 'A credito' ? 'selected' : '' ?>>A crédito</option>
            </select>
        </div>
        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-primary btn-custom" name="btnmodificar" value="ok">Modificar</button>
        </div>
    </form>
</div>
<script src="librerias/js/bootstrap.min.js"></script>
</body>
</html>

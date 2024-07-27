<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="librerias/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="librerias/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>CRUD CON PHP</title>
    <style>
        .btn-center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .btn-custom {
            background-color: #5a9;
            color: white;
        }
        .alert-custom {
            display: none;
            padding: 1rem;
            margin-top: 1rem;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
<h1 class="text-center" style="color: #ffff;">MUEBLERIA LEON</h1>
<div class="container-fluid row">
  <form class="col-3" method="POST">
    <h3 class="text-center text-secondary" style="background-color: palegoldenrod; padding: 1rem;"><b>Registro de muebles</b></h3>
    <?php
     include("controlador/controlador_registrar_producto.php"); 
    include("controlador/controlador_eliminado.php");
    
    ?>
    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre del mueble</label>
      <input type="text" class="form-control" name="nombre">
    </div>
    <div class="mb-3">
      <label for="descripcion" class="form-label">Descripción</label>
      <input type="text" class="form-control" name="descripcion">
    </div>
    <div class="mb-3">
      <label for="precio" class="form-label">Precio</label>
      <input type="text" class="form-control" name="precio" inputmode="numeric" pattern="[0-9]*">
    </div>
    <div class="mb-3">
      <label for="cantidad" class="form-label">Cantidad</label>
      <input type="number" class="form-control" name="cantidad" inputmode="numeric" pattern="[0-9]*">
    </div>
    <div class="mb-3">
      <label for="fecha_venta" class="form-label">Fecha de la venta</label>
      <input type="date" class="form-control" name="fecha_venta">
    </div>
    <div class="mb-3">
      <label for="tipo_pago" class="form-label">Tipo de pago</label>
      <select class="form-select" name="txtpago">
        <option value="A contado">A contado</option>
        <option value="A credito">A crédito</option>
      </select>
    </div>
    <div class="mb-3 btn-center">
      <button type="submit" class="btn btn-primary btn-custom" name="btnregistrar" value="ok">Registrar</button>
    </div>
    <div id="alert-message" class="alert alert-custom"></div>
  </form>

  <div class="col-9 p-1">
    <table class="table table-bordered table-hover">
        <thead class="bg-primary">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre del Mueble</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Fecha de la Venta</th>
                <th scope="col">Tipo de Mueble</th>
                <th scope="col">Monto a Pagar</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
          <?php
          include "modelo/conexion.php";
          $sql = $conexion->query("SELECT * FROM venta");
          while ($datos = $sql->fetch_object()) { ?>
            <tr>
                <td><?= $datos->id ?></td>
                <td><?= $datos->mueble ?></td>
                <td><?= $datos->descripcion ?></td>
                <td><?= $datos->precio ?></td>
                <td><?= $datos->cantidad ?></td>
                <td><?= $datos->fecha ?></td>
                <td><?= $datos->tipo_pago ?></td>
                <td><?= $datos->monto_pagar ?></td>
                <td>
                    <a href="modificar.php?id=<?= $datos->id ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="index.php?id=<?= $datos->id ?>" onclick="return confirmar()" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                </td>

            </tr>
            <?php 
          }
          ?>
        </tbody>
    </table>
  </div>
</div>

<script src="librerias/js/bootstrap.min.js"></script>
<script>
  function confirmar() {
    return confirm('¿Desea eliminar el producto?');
  }
</script>
</body>
</html>

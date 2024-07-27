<?php
if (!empty($_POST['btnregistrar'])) {
    include "modelo/conexion.php";
  
    $mueble = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $fecha = $_POST['fecha_venta'];
    $tipo = $_POST['txtpago'];

    if (!empty($mueble) && !empty($descripcion) && !empty($precio) && !empty($cantidad) && !empty($fecha) && !empty($tipo)) {
        if (is_numeric($precio) && is_numeric($cantidad)) {
            $monto = $cantidad * $precio;

            $registrar = $conexion->query("INSERT INTO venta (mueble, descripcion, precio, cantidad, fecha, tipo_pago, monto_pagar)
                                           VALUES ('$mueble', '$descripcion', '$precio', '$cantidad', '$fecha', '$tipo', '$monto')");

            if ($registrar) {
                $message = "Producto registrado con éxito";
            } else {
                $message = "Error al registrar el producto";
            }
        } else {
            $message = "Precio y Cantidad deben ser números";
        }
    } else {
        $message = "Llenar todos los campos";
    }
    
    echo "<script>
            alert('$message');
            window.history.replaceState(null, null, window.location.pathname);
          </script>";
}
?>

<?php
include "modelo/conexion.php";

if (!empty($_POST['btnmodificar'])) {
    if (!empty($_POST['nombre']) && !empty($_POST['descripcion']) && !empty($_POST['precio']) && !empty($_POST['cantidad']) && !empty($_POST['fecha_venta']) && !empty($_POST['txtpago'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $fecha_venta = $_POST['fecha_venta'];
        $tipo_pago = $_POST['txtpago'];
        $monto = $cantidad * $precio;

        $sql = $conexion->query("UPDATE venta SET 
            mueble='$nombre', 
            descripcion='$descripcion', 
            precio='$precio', 
            cantidad='$cantidad', 
            fecha='$fecha_venta', 
            tipo_pago='$tipo_pago', 
            monto_pagar='$monto' 
            WHERE id=$id");

        if ($sql) {
            header("Location: index.php");
        } else {
            echo "<div class='alert alert-danger'>Error al modificar el producto</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Campos vacíos</div>";
    }
}
?>

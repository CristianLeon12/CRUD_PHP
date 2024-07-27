<?php

include "modelo/conexion.php";

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $eliminar = $conexion->query("DELETE FROM venta WHERE id=$id");

    if ($eliminar) {
        echo "<div class='alert alert-success'>Venta eliminada</div>";
    } else {
        echo "<div class='alert alert-danger'>Error al eliminar</div>";
    }
?>
    <script>
        window.history.replaceState(null, null, window.location.pathname);
    </script>
<?php
}
?>


<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "tu_usuario", "tu_contraseña", "tu_base_de_datos");

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Consulta para obtener las ventas
$consulta = "SELECT * FROM ventas";
$resultado = $conexion->query($consulta);

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
    // Mostrar resultados
    while($fila = $resultado->fetch_assoc()) {
        echo "ID: " . $fila["id"]. " - Fecha: " . $fila["fecha"]. " - Producto: " . $fila["producto"]. " - Cantidad: " . $fila["cantidad"]. "<br>";
    }
} else {
    echo "No hay ventas registradas.";
}

// Cerrar conexión
$conexion->close();
?>


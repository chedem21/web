<?php
$datos = json_decode(file_get_contents('php://input'), true);

$fechaHora = $datos['fechaHora'];
$numeroMesa = $datos['numeroMesa'];
$cliente = $datos['cliente'];
$plato = $datos['plato'];
$precio = $datos['precio'];

// Conexión a la base de datos
$conn = new mysqli('localhost', 'usuario', 'contraseña', 'base_de_datos');

// Verificar conexión
if ($conn->connect_error) {
	die("Conexión fallida: " . $conn->connect_error);
}

// Insertar datos en la base de datos
$sql = "INSERT INTO ventas (fechaHora, numeroMesa, cliente, plato, precio) VALUES ('$fechaHora', '$numeroMesa', '$cliente', '$plato', '$precio')";

if ($conn->query($sql) === TRUE) {
	echo "Venta guardada con éxito";
} else {
	echo "Error al guardar venta: " . $conn->error;
}

$conn->close();
?>
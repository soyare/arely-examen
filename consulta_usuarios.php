<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    echo "Por favor, <a href='login.php'>inicie sesión</a> para ver los usuarios registrados.";
    exit;
}

$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "programacion_web";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

echo "<h2>Usuarios Registrados</h2>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Nombre: " . $row["nombre"]. " - Correo: " . $row["correo"]. " - Carrera: " . $row["carrera"] . "<br>";
    }
} else {
    echo "No hay usuarios registrados.";
}

$conn->close();
?>

<!-- Botón para regresar -->
<div style="margin-top: 20px;">
    <button onclick="window.location.href='login.php'" style="padding: 10px 20px; background-color: #333; color: white; border: none; cursor: pointer;">Regresar</button>
</div>
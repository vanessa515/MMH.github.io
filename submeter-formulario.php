<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos (reemplaza los valores con los de tu servidor)
    $host = "localhost";
    $usuario = "root";
    $contrasena = "";
    $basededatos = "mmh";

    $conexion = mysqli_connect($host, $usuario, $contrasena, $basededatos);

    // Verificar la conexión
    if (!$conexion) {
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }

    // Obtener datos del formulario
    $nombre = $_POST['introducir_nombre'];
    $email = $_POST['introducir_email'];
    $telefono = $_POST['introducir_telefono'];
    $mensaje = $_POST['introducir_mensaje'];

    // Insertar datos en la tabla "Contacto" de la base de datos
    $sql = "INSERT INTO Contacto (nombre, correo_electronico, numero_telefono, mensaje) VALUES ('$nombre', '$email', '$telefono', '$mensaje')";

    if (mysqli_query($conexion, $sql)) {
        // Redireccionar a la página de contacto
        header("Location: Index.html");
        exit(); // Asegura que el script se detiene después de redireccionar
    } else {
        echo "Error al registrar los datos: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
} else {
    echo "Acceso no autorizado";
}
?>

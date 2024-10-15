<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Realiza la autenticación aquí, verifica los datos en tu base de datos
    // Supongamos que tienes una función de autenticación en tu sistema

    if (autenticarUsuario($username, $password)) {
        $_SESSION['usuario'] = $username;

        // Redirección a la página de administrador si el usuario está en la base de datos
        header('Location: cargas.php');
        exit();
    } else {
        // Autenticación fallida, redirige al usuario al formulario de inicio de sesión
        header('Location: login.php');
        exit();
    }
}

// Función de ejemplo, deberías implementar tu propia función de autenticación
function autenticarUsuario($username, $password) {
    // Lógica de autenticación (verificar en la base de datos, etc.)
    // Utiliza sentencias preparadas para prevenir inyecciones SQL
    $conn = new mysqli("localhost", "root", "", "db_laschilcas");

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Utiliza sentencias preparadas para prevenir inyecciones SQL
    $stmt = $conn->prepare("SELECT COUNT(*) FROM tb_usuarios WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    // Retorna true si el usuario está en la base de datos, de lo contrario, false.
    return $count > 0;
}
?>
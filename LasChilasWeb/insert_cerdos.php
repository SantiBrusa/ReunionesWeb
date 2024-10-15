<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_laschilcas";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Capturar los datos del formulario y convertirlos a float
$destetados = floatval($_POST['destetados']);
$pesoventa = floatval($_POST['pesoventa']);
$preciocapon = floatval($_POST['preciocapon']);
$costokg = floatval($_POST['costokg']);

// Iniciar la transacción
$conn->begin_transaction();

try {
    // Insertar datos en la tabla tb_cerdos
    $sql_cerdos= "INSERT INTO tb_cerdos (destetados, pesoventa, preciocapon, costokg)
                    VALUES ('$destetados', '$pesoventa', '$preciocapon', '$costokg')";
    $conn->query($sql_cerdos);

    // Confirmar la transacción
    $conn->commit();
    header('Location: cargas.php');
    exit();
} catch (Exception $e) {
    // Revertir la transacción en caso de error
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}

// Cerrar conexión
$conn->close();
?>

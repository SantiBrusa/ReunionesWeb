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
$alcohol = floatval($_POST['ltsalcohol']);
$biogas = floatval($_POST['biogas']);
$ic = floatval($_POST['ic']);

// Iniciar la transacción
$conn->begin_transaction();

try {
    // Insertar datos en la tabla tb_bioind
    $sql_bioind = "INSERT INTO tb_bioind (ltsalcohol, biogas, ic)
                    VALUES ('$alcohol', '$biogas', '$ic')";
    $conn->query($sql_bioind);

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

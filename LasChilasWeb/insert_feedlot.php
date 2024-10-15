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
$ingresos = floatval($_POST['ingresos']);
$egresos = floatval($_POST['egresos']);
$porcentaje_mortandad = floatval($_POST['porcentaje_mortandad']);
$indice_ocupacion = floatval($_POST['indice_ocupacion']);

$las_chilcas = floatval($_POST['las_chilcas']);
$la_buena_estrella = floatval($_POST['la_buena_estrella']);
$sumaj = floatval($_POST['sumaj']);
$llantay = floatval($_POST['llantay']);
$umpy = floatval($_POST['umpy']);
$ruay = floatval($_POST['ruay']);
$petrogruta = floatval($_POST['petrogruta']);
$noa = floatval($_POST['noa']);
$quickfood = floatval($_POST['quickfood']);

// Iniciar la transacción
$conn->begin_transaction();

try {
    // Insertar datos en la tabla tb_feedlot
    $sql_feedlot = "INSERT INTO tb_feedlot (ingresos, egresos, porMortandad, indiceocup)
                    VALUES ('$ingresos', '$egresos', '$porcentaje_mortandad', '$indice_ocupacion')";
    $conn->query($sql_feedlot);

    // Insertar datos en la tabla hoteleros
    $sql_hoteleros = "INSERT INTO hoteleros (lasChilcas, laBuenaEstrella, sumaj, llantay, umpy, ruay, petroGruta, noa, quickfood) VALUES 
                    ('$las_chilcas', '$la_buena_estrella', '$sumaj', '$llantay', '$umpy', '$ruay', '$petrogruta', '$noa', '$quickfood')";
    $conn->query($sql_hoteleros);

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


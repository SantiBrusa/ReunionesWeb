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

// Recuperar los datos más recientes de tb_feedlot
$sql_feedlot = "SELECT ingresos, egresos, porMortandad, indiceocup FROM tb_feedlot ORDER BY cod DESC LIMIT 1";
$result_feedlot = $conn->query($sql_feedlot);

if ($result_feedlot->num_rows > 0) {
    $row_feedlot = $result_feedlot->fetch_assoc();
    $ingresos = $row_feedlot['ingresos'];
    $egresos = $row_feedlot['egresos'];
    $porcentaje_mortandad = $row_feedlot['porMortandad'];
    $indice_ocupacion = $row_feedlot['indiceocup'];
} else {
    $ingresos = $egresos = $porcentaje_mortandad = $indice_ocupacion = "No hay datos disponibles";
}

// Recuperar el stock de hoteleros
$sql_hoteleros = "SELECT lasChilcas, laBuenaEstrella, sumaj, llantay, umpy, ruay, petroGruta, noa, quickfood 
                  FROM hoteleros ORDER BY cod DESC LIMIT 1";
$result_hoteleros = $conn->query($sql_hoteleros);

if ($result_hoteleros->num_rows > 0) {
    $row_hoteleros = $result_hoteleros->fetch_assoc();
    $las_chilcas = $row_hoteleros['lasChilcas'];
    $la_buena_estrella = $row_hoteleros['laBuenaEstrella'];
    $sumaj = $row_hoteleros['sumaj'];
    $llantay = $row_hoteleros['llantay'];
    $umpy = $row_hoteleros['umpy'];
    $ruay = $row_hoteleros['ruay'];
    $petrogruta = $row_hoteleros['petroGruta'];
    $noa = $row_hoteleros['noa'];
    $quickfood = $row_hoteleros['quickfood'];
} else {
    $las_chilcas = $la_buena_estrella = $sumaj = $llantay = $umpy = $ruay = $petrogruta = $noa = $quickfood = "No disponible";
}

// Recuperar el dato de la tabla
$sql = "SELECT semana FROM tb_semana ORDER BY cod DESC LIMIT 1"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $dato = $row['semana'];
} else {
    $dato = 'No hay datos';
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles2.css">
    <link rel="icon" href="img/logo las chilcas.png" type="image/x-icon">
    <title>Informe Feedlot</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Baskervville+SC&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap');
    </style>
</head>
<body>
    <header>
        <a href="index.php">
            <div id="Logo">
                <img src="img/logo las chilcas.png" alt="LasChilcas">
            </div>
        </a>
        
        <a href="login.php">
            <div id="title">
                <h1>Feedlot</h1>
            </div>
        </a>
        <div id="semana">
            <h3>Semana:<?php echo htmlspecialchars($dato); ?></h3>
        </div>
        
    </header>

    <div id="ing">
        <h2>Ingresos</h2>
        <h3><?php echo $ingresos; ?></h3>
    </div>

    <div id="ing">
        <h2>Egresos</h2>
        <h3><?php echo $egresos; ?></h3>
    </div>

    <div id="ing">
        <h2>Porcentaje Mortandad</h2>
        <h3><?php echo $porcentaje_mortandad; ?> % </h3>
    </div>

    <div id="ing">
        <h2>Indice Ocupacion</h2>
        <h3><?php echo $indice_ocupacion; ?> % </h3>
    </div>

    <div id="ing">
        <h2>Hoteleros</h2>

        <h4>Las Chilcas: <?php echo $las_chilcas; ?></h4>
        <h4>La Buena Estrella: <?php echo $la_buena_estrella; ?></h4>
        <h4>Sumaj: <?php echo $sumaj; ?></h4>
        <h4>Llantay: <?php echo $llantay; ?></h4>
        <h4>Umpy: <?php echo $umpy; ?></h4>
        <h4>Ruay: <?php echo $ruay; ?></h4>
        <h4>PetroGruta: <?php echo $petrogruta; ?></h4>
        <h4>Noa: <?php echo $noa; ?></h4>
        <h4>QuickFood: <?php echo $quickfood; ?></h4>
    </div>

    <footer>
        <p>© 2024 Santino Vissani Brusadin. Todos los derechos reservados.</p>
        <p>Este sitio web y su contenido, incluyendo textos, imágenes, gráficos y logotipos, están protegidos por leyes de derechos de autor y propiedad intelectual. Queda prohibida la reproducción total o parcial sin autorización expresa.</p>
    </footer>
</body>
</html>

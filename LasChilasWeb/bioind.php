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

// Recuperar el dato de la tabla
$sql_bioind = "SELECT ltsalcohol, biogas, ic FROM tb_bioind ORDER BY cod DESC LIMIT 1"; 
$result_bioind = $conn->query($sql_bioind);

if ($result_bioind->num_rows > 0) {
    $row_bioind = $result_bioind->fetch_assoc();
    $ltsalcohol = $row_bioind['ltsalcohol'];
    $biogas = $row_bioind['biogas'];
    $ic = $row_bioind['ic'];
} else {
    $ltsalcohol = $biogas = $ic = "No hay datos disponibles";
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
    <link rel="stylesheet" href="css/styles3.css">
    <link rel="icon" href="img/logo las chilcas.png" type="image/x-icon">
    <title>Informe BioIndustria</title>

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
                <h1>Bio Industria</h1>
            </div>
        </a>
        <div id="semana">
            <h3>Semana:<?php echo htmlspecialchars($dato); ?></h3>
        </div>
        
        
    </header>

    <div id="ing">
        <h2>Litros Alcohol Producido:</h2>
        <h2><?php echo $ltsalcohol; ?></h2>
    </div>
    
    <div id="ing">
        <h2>M3 Biogas producido:</h2>
        <h2><?php echo $biogas; ?></h2>
    </div>
    
    <div id="ing">
        <h2>IC:</h2>
        <h2><?php echo $ic; ?></h2>
    </div>
        
    <footer style="margin-top: 55%">
        <p>© 2024 Santino Vissani Brusadin. Todos los derechos reservados.</p>
        <p>Este sitio web y su contenido, incluyendo textos, imágenes, gráficos y logotipos, están protegidos por leyes de derechos de autor y propiedad intelectual. Queda prohibida la reproducción total o parcial sin autorización expresa.</p>
    </footer>
</body>
</html>
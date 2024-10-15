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

// Manejar la inserción del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['semana'])) {
    $semana = $_POST['semana'];

    // Insertar el valor en la tabla tb_semana
    $sql = "INSERT INTO tb_semana (semana) VALUES ('$semana')";

    if ($conn->query($sql) === TRUE) {
        echo "Datos insertados correctamente.";
    } else {
        echo "Error: " . $conn->error;
    }

    
}

// Consulta para vaciar la tabla tb_semana
$sql_vaciar_semana = "TRUNCATE TABLE tb_semana";

// Verificar si el botón de "Vaciar Tablas" ha sido presionado
if (isset($_POST['vaciar_tablas'])) {
    
    $sql_vaciar_semana= "TRUNCATE TABLE tb_semana";
    
    if ($conn->query($sql_vaciar_semana) === TRUE) {
        echo "La tabla tb_semana ha sido vaciadas correctamente.";
    } else {
        echo "Error al vaciar las tablas: " . $conn->error;
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo las chilcas.png" type="image/x-icon">
    <link rel="stylesheet" href="css/stylesCargas.css">
    <title>ZonaCargaDatos</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Baskervville+SC&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap');
</style>

<style>
        body {
            text-align:center;
        }

        /* Estilos para el botón */
        #vaciar-tablas {
            background-color: #ff4c4c;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }

        #vaciar-tablas:hover {
            background-color: #ff0000;
        }

        
    </style>

<body>
    <header>
        <a href="index.php">
            <div id="Logo">
                <img src="img/logo las chilcas.png" alt="LasChilcas">
            </div>
        </a>
        <div id="informe">
            <h1>Carga De Datos</h1>
        </div>
    </header>
    <div style="margin-bottom:10px;">
        <h2>Ingresa la semana a mostrar</h2>
        <form action="cargas.php" method="post">
            <label for="semana">Valor:</label>
            <input type="text" id="semana" name="semana" required>
            <button type="submit">Guardar</button>
        </form>
    </div>

    <div id="content" style="margin-bottom: 10px;">
        <form method="post" action="">
            <button type="submit" id="vaciar-tablas" name="vaciar_tablas">Borrar Semana</button>
        </form>
    </div>

    <div id="feedlot">
        <a href="datosFeedlot.php">
            <img src="img/pngegg.png" alt="feedlot" width="250vw">

            <h2>feedlot</h2>
        </a>
    </div>

    <div id="cerdos">
        <a href="datosCerdos.php">
            <img src="img/pngegg (1).png" alt="cerdos" width="250vw">

            <h2>cerdos</h2>
        </a>
    </div>

    <div id="bioind">
        <a href="datosBioInd.php">
            <img src="img/pngegg (2).png" alt="BioInd" width="150vw">

            <h2>bio industria</h2>
        </a>
    </div>

    <div id="users">
        <a href="aniadirusuario.php">
            <img src="img/pngegg (3).png" alt="user" width="150vw">

            <h2>Usuarios</h2>
        </a>
    </div>

    <footer>
        <p>© 2024 Santino Vissani Brusadin. Todos los derechos reservados.</p>
        <p>Este sitio web y su contenido, incluyendo textos, imágenes, gráficos y logotipos, están protegidos por leyes de derechos de autor y propiedad intelectual. Queda prohibida la reproducción total o parcial sin autorización expresa.</p>
    </footer>
</body>
</html>
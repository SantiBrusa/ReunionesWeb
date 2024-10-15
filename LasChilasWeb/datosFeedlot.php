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

// Verificar si el botón de "Vaciar Tablas" ha sido presionado
if (isset($_POST['vaciar_tablas'])) {
    // Consulta para vaciar la tabla tb_feedlot
    $sql_vaciar_feedlot = "TRUNCATE TABLE tb_feedlot";
    
    // Consulta para vaciar la tabla hoteleros
    $sql_vaciar_hoteleros = "TRUNCATE TABLE hoteleros";
    
    if ($conn->query($sql_vaciar_feedlot) === TRUE && 
        $conn->query($sql_vaciar_hoteleros) === TRUE) {
        echo "Las tablas tb_feedlot y hoteleros han sido vaciadas correctamente.";
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
    <link rel="stylesheet" href="css/stylesCargas.css">
    <title>CargaFeedlot</title>

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
</head>
<body>

    <header>
        <a href="cargas.php">
            <div id="Logo">
                <img src="img/logo las chilcas.png" alt="LasChilcas">
            </div>
        </a>
        

        <div id="informe">
            <h1>Feedlot</h1>
        </div>
    </header>

    <div id="content">
        <form method="post" action="">
            <button type="submit" id="vaciar-tablas" name="vaciar_tablas">Vaciar Tablas</button>
        </form>
    </div>

    <h2>Insertar Datos en Feedlot</h2>
    <form action="insert_feedlot.php" method="post">
        <label for="ingresos">Ingresos:</label><br>
        <input type="number" step="0.01" name="ingresos" id="ingresos" required><br><br>

        <label for="egresos">Egresos:</label><br>
        <input type="number" step="0.01" name="egresos" id="egresos" required><br><br>

        <label for="porcentaje_mortandad">Porcentaje de Mortandad (%):</label><br>
        <input type="number" step="0.01" name="porcentaje_mortandad" id="porcentaje_mortandad" required><br><br>

        <label for="indice_ocupacion">Índice de Ocupación (%):</label><br>
        <input type="number" step="0.01" name="indice_ocupacion" id="indice_ocupacion" required><br><br>

        <h3>Stock de Hoteleros</h3>
        <label for="las_chilcas">Las Chilcas:</label><br>
        <input type="number" step="0.01" name="las_chilcas" id="las_chilcas" required><br><br>

        <label for="la_buena_estrella">La Buena Estrella:</label><br>
        <input type="number" step="0.01" name="la_buena_estrella" id="la_buena_estrella" required><br><br>

        <label for="sumaj">Sumaj:</label><br>
        <input type="number" step="0.01" name="sumaj" id="sumaj" required><br><br>

        <label for="llantay">Llantay:</label><br>
        <input type="number" step="0.01" name="llantay" id="llantay" required><br><br>

        <label for="umpy">Umpy:</label><br>
        <input type="number" step="0.01" name="umpy" id="umpy" required><br><br>

        <label for="ruay">Ruay:</label><br>
        <input type="number" step="0.01" name="ruay" id="ruay" required><br><br>

        <label for="petrogruta">PetroGruta:</label><br>
        <input type="number" step="0.01" name="petrogruta" id="petrogruta" required><br><br>

        <label for="noa">Noa:</label><br>
        <input type="number" step="0.01" name="noa" id="noa" required><br><br>

        <label for="quickfood">QuickFood:</label><br>
        <input type="number" step="0.01" name="quickfood" id="quickfood" required><br><br>
        <div id="insert">
            <input type="submit" value="Insertar">
        </div>
        
    </form>

    

    
</body>
</html>
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
    
    $sql_vaciar_bioind= "TRUNCATE TABLE tb_bioind";
    
    if ($conn->query($sql_vaciar_bioind) === TRUE) {
        echo "La tabla tb_bioind ha sido vaciadas correctamente.";
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
    <title>CargaBioIndustria</title>

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

    <h2>Insertar Datos en Bio Industria</h2>
    <form action="insert_bioind.php" method="post">
        <label for="ltsalcohol">Litros de Alcohol:</label><br>
        <input type="number" step="0.01" name="ltsalcohol" id="ltsalcohol" required><br><br>

        <label for="biogas">M3 BioGas:</label><br>
        <input type="number" step="0.01" name="biogas" id="biogas" required><br><br>

        <label for="ic">IC:</label><br>
        <input type="number" step="0.01" name="ic" id="ic" required><br><br>

        <div id="insert">
            <input type="submit" value="Insertar">
        </div>
        
    </form>

    

    
</body>
</html>
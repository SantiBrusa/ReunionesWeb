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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Insertar el usuario en la tabla tb_usuarios
    $stmt = $conn->prepare("INSERT INTO tb_usuarios (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "<p style='color:green;'>Usuario añadido correctamente.</p>";
    } else {
        echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
}

// Manejar la eliminación de usuarios
if (isset($_POST['delete_user'])) {
    $user_id = $_POST['delete_user'];

    $stmt = $conn->prepare("DELETE FROM tb_usuarios WHERE cod = ?");
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        echo "<p style='color:green;'>Usuario eliminado correctamente.</p>";
    } else {
        echo "<p style='color:red;'>Error al eliminar el usuario: " . $stmt->error . "</p>";
    }

    $stmt->close();
}

// Obtener los usuarios de la tabla tb_usuarios
$sql = "SELECT cod, username FROM tb_usuarios";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesCargas.css">
    <title>Gestión de Usuarios</title>
    <style>
        #Logo img {
            display: flex;
            margin: auto;
        }


        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        header {
            text-align: center;
            margin-bottom: 20px;
        }
        section {
            width: 80%;
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f8f8f8;
        }
        footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #777;
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

        <h1>Gestión de Usuarios</h1>
    </header>

    <section>
        <h2>Añadir Usuario</h2>
        <form action="aniadirusuario.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Añadir Usuario</button>
        </form>
    </section>

    <section>
        <h2>Usuarios Registrados</h2>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <tr>
                    <th>Cod</th>
                    <th>Username</th>
                    <th>Acciones</th>
                </tr>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row["cod"]; ?></td>
                    <td><?php echo $row["username"]; ?></td>
                    <td>
                        <form method="post" action="aniadirusuario.php" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                            <input type="hidden" name="delete_user" value="<?php echo $row['cod']; ?>">
                            <button type="submit" style="background-color: #dc3545;">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No hay usuarios registrados.</p>
        <?php endif; ?>
    </section>

    <footer>
        <p>© 2024 Santino Vissani Brusadin. Todos los derechos reservados.</p>
    </footer>
</body>
</html>

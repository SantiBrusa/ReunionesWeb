<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo las chilcas.png" type="image/x-icon">
    <link rel="stylesheet" href="css/singStyles.css">
    <title>Ganados GBS - Iniciar Sesión</title>
</head>

<body class="body">

    <header class="header">
        <div id="Logo">
            <img src="img/logo las chilcas.png" alt="LasChilcas">
        </div>
    </header>

    <main class="main">

        <div id="login-form">
            <h2>Iniciar Sesión</h2>
            <form id="form" action="procesar_login.php" method="POST">
                <label for="username">Correo Electrónico:</label>
                <input type="text" id="username" name="username" placeholder="Ingresa tu correo" required>
                <br>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>
                <br>
                <button type="submit">Confirmar</button>
                <button type="button" onclick="cancelar()">Cancelar</button>
            </form>
        </div>

    </main>

    <script>
        function cancelar() {
            // Redirigir al usuario a index.html
            window.location.href = "feedlot.php";
        }
    </script>
</body>

</html>
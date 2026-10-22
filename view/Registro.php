<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta author="Isaknz">
    <title>Registro de usuario</title>
    <link rel="stylesheet" href="../css/Registro.css">
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <form action="../controller/RegistroController.php" method="POST">
            <label for="nombre">User Name</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="apellido">Phone Number</label>
            <input type="text" id="apellido" name="apellido" required>

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <i class="fa-solid fa-eye" id="eyeIcon"></i>

            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <i class="fa-solid fa-eye" id="eyeIcon"></i>

            <button type="submit">Ok</button>
            <button type="button" onclick="window.location.href='Login.php'">Cancel</button>
        </form>
    
</body>
</html>
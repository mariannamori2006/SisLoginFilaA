<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e5e7eb; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .contenedor {
            background-color: #f8f9fa; 
            padding: 40px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
            text-align: center;
        }

        h2 {
            color: #555;
            font-size: 32px;
            font-weight: 500;
            margin-bottom: 30px;
        }

        .caja-gris {
            background-color: #e6e6e6;
            padding: 25px;
            border-radius: 5px;
            text-align: left;
        }

        label {
            display: block;
            color: #666;
            font-size: 14px;
            margin-bottom: 10px;
            font-style: italic;
        }

        input[type="email"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 3px;
            margin-bottom: 20px;
            font-size: 16px;
            box-sizing: border-box;
            background-color: #ffffff;
        }

        button {
            width: 100%;
            padding: 15px;
            background-color: #7297c8; 
            color: white;
            border: none;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #5a7ca8;
        }

        .volver {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #7297c8;
            text-decoration: none;
            font-size: 16px;
        }

        .volver:hover {
            text-decoration: underline;
        }

        .footer {
            margin-top: 40px;
            font-size: 12px;
            color: #999;
            text-align: center;
        }

        .mensaje {
            color: #d9534f;
            text-align: center;
            margin-bottom: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="contenedor">
        <h2>Recuperar Contraseña</h2>

        <?php if(isset($mensaje)): ?>
            <div class="mensaje"><?php echo $mensaje; ?></div>
        <?php endif; ?>

        <div class="caja-gris">
            
            <?php if(!isset($_POST['paso2'])): ?>
                <form action="../controller/RecuperarController.php" method="POST">
                    <label>Introduce tu dirección de correo electrónico</label>
                    <input type="email" name="correo" required>
                    <button type="submit" name="accion" value="buscar_correo">
                        <i class="fa-solid fa-paper-plane"></i> Enviar
                    </button>
                </form>

            <?php else: ?>
                <form action="../controller/RecuperarController.php" method="POST">
                    <input type="hidden" name="correo" value="<?php echo htmlspecialchars($_POST['correo'] ?? ''); ?>">
                    <input type="hidden" name="paso2" value="1">
                    
                    <label>Nueva Contraseña</label>
                    <input type="password" name="nueva_clave" required>
                    
                    <label>Confirmar Contraseña</label>
                    <input type="password" name="confirmar_clave" required>
                    
                    <button type="submit" name="accion" value="cambiar_clave">
                        <i class="fa-solid fa-key"></i> Guardar Clave
                    </button>
                </form>
            <?php endif; ?>

            <a href="../index.php" class="volver">Volver</a>
        </div>

        <div class="footer">
            ©Todos los derechos reservados
        </div>
    </div>

</body>
</html>
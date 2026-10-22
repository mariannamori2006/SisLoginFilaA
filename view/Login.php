<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <style>
    :root {
      --azul-boton: #8A0BD2;
      --azul-boton-hover: #8A0BD2;
      --azul-borde: #4A5C85;
      --texto-titulo: #8A0BD2;
      --texto-suave: #8A8F99;
      --enlace: #8A0BD2;
      --marco: #C4C7CC;
      --fondo: #FFFFFF;
      --fondo-pagina: #E8EAEE;
      --error: #B3392F;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 16px;
      background: var(--fondo-pagina);
      font-family: "Segoe UI", Tahoma, Arial, sans-serif;
      color: var(--texto-titulo);
    }

    /* Tarjeta blanca con marco gris */
    .login {
      width: 100%;
      max-width: 380px;
      min-height: 560px;
      padding: 48px 40px;
      background: var(--fondo);
      border: 1px solid var(--marco);
      box-shadow: 0 6px 18px rgba(0, 0, 0, .12);
    }

    /* Saludo y subtítulo */
    .saludo {
      font-size: 1.6rem;
      font-weight: 500;
      line-height: 1.25;
    }

    .subtitulo {
      margin: 36px 0 28px 65px;
      font-size: 1rem;
      font-weight: 700;
    }

    .subtitulo .morado { color: #8A0BD2; }
    .subtitulo .gris   { color: #8A8F99; }
.subtitulo .gris   { color: #8A8F99; }

    /* Campos: solo línea inferior */
    .campo { margin-bottom: 26px; max-width: 280px; }

    .campo label {
      display: block;
      font-size: .8rem;
      color: var(--texto-suave);
    }

    .campo input {
      width: 100%;
      padding: 6px 0;
      border: none;
      border-bottom: 1.5px solid var(--azul-borde);
      background: transparent;
      font-size: 1rem;
      color: var(--texto-titulo);
      outline: none;
      transition: border-color .2s;
    }

    .campo input:focus { border-bottom-color: var(--azul-boton); }

    /* Enlaces */
    a { color: var(--enlace); text-decoration: none; }
    a:hover, a:focus-visible { text-decoration: underline; }

    .olvido {
      display: block;
      max-width: 280px;
      margin: -8px 0 24px;
      text-align: right;
      font-size: .8rem;
    }

    /* Botón principal */
    .btn-login {
      display: block;
      width: 100%;
      max-width: 280px;
      padding: 12px;
      border: 1px solid var(--azul-borde);
      border-radius: 4px;
      background: var(--azul-boton);
      color: #fff;
      font-size: 1rem;
      cursor: pointer;
      box-shadow: 0 2px 4px rgba(0, 0, 0, .25);
      transition: background .2s;
    }

    .btn-login:hover { background: var(--azul-boton-hover); }
    .btn-login:focus-visible { outline: 3px solid var(--azul-borde); outline-offset: 2px; }

    .crear {
      display: inline-block;
      margin-top: 28px;
      font-size: .85rem;
    }

    /* Mensaje de error */
    .error {
      max-width: 280px;
      margin-bottom: 20px;
      font-size: .85rem;
      color: var(--error);
    }
  </style>
</head>
<body>
  <main class="login">
    <?php if (isset($_SESSION['usuario'])): ?>

      <h1 class="saludo">Hello!<br><?= htmlspecialchars($_SESSION['usuario']) ?></h1>
      <p class="subtitulo">Sesión iniciada</p>
      <a class="crear" href="index.php?salir=1">Cerrar sesión</a>

    <?php else: ?>

      <h1 class="saludo">Hello!<br>Good Morning</h1>
      <p class="subtitulo"><span class="morado">Login</span> <span class="gris">your account</span></p>

      <?php if (!empty($error)): ?>
        <p class="error" role="alert"><?= htmlspecialchars($error) ?></p>
      <?php endif; ?>

      <form method="post" action="index.php">
        <div class="campo">
          <label for="usuario">Username</label>
          <input type="text" id="usuario" name="usuario" value="<?= htmlspecialchars($usuario ?? '') ?>">
        </div>

        <div class="campo">
          <label for="clave">Password</label>
          <input type="password" id="clave" name="clave">
        </div>

        <a class="olvido" href="view/Recuperar.php">forget password?</a>

        <button type="submit" class="btn-login">Login</button>
      </form>

      <a class="crear" href="view/Registro.php">Create Account</a>

    <?php endif; ?>
  </main>
</body>
</html>
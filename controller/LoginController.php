<?php
session_start();
require_once __DIR__ . '/../model/LoginModel.php';

class LoginController
{
    public function index()
    {
        $error = '';
        $usuario = '';

        // Cerrar sesión
        if (isset($_GET['salir'])) {
            session_destroy();
            header('Location: index.php');
            exit;
        }

        // Validación al enviar el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = trim($_POST['usuario'] ?? '');
            $clave   = $_POST['clave'] ?? '';

            if ($usuario === '' || $clave === '') {
                $error = 'Completa el usuario y la contraseña.';
            } else {
                $modelo = new LoginModel();

                if ($modelo->validar($usuario, $clave)) {
                    $_SESSION['usuario'] = $usuario;
                    header('Location: index.php');
                    exit;
                }
                $error = 'Usuario o contraseña incorrectos.';
            }
        }

        require __DIR__ . '/../view/Login.php';
    }
}
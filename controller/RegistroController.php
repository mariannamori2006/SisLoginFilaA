<?php

require_once __DIR__ . '/../model/RegistroModel.php';

function regresar(string $mensaje): void
{
    header(
        'Location: ../view/Registro.php?error=' . urlencode($mensaje),
        true,
        303
    );
    exit;
}

function campo(string $nombre): string
{
    $valor = $_POST[$nombre] ?? '';

    return is_string($valor) ? $valor : '';
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../view/Registro.php');
    exit;
}

$nombre = trim(campo('nombre'));
$telefono = trim(campo('apellido'));
$email = trim(campo('email'));
$password = campo('password');
$confirmPassword = campo('confirm_password');

if (
    $nombre === '' ||
    $telefono === '' ||
    $email === '' ||
    $password === '' ||
    $confirmPassword === ''
) {
    regresar('Completa todos los campos.');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    regresar('El correo electrónico no es válido.');
}

if (
    strlen($nombre) > 100 ||
    strlen($telefono) > 25 ||
    strlen($email) > 150
) {
    regresar('El nombre, teléfono o correo supera la longitud permitida.');
}

if ($password !== $confirmPassword) {
    regresar('Las contraseñas no coinciden.');
}

if (strlen($password) < 8 || strlen($password) > 72) {
    regresar('La contraseña debe tener entre 8 y 72 bytes.');
}

try {
    $registro = new RegistroModel();

    if ($registro->existeEmail($email)) {
        regresar('El correo electrónico ya está registrado.');
    }

    $registro->registrar($nombre, $telefono, $email, $password);

    header('Location: ../view/Login.php?registro=exitoso', true, 303);
    exit;

} catch (PDOException $e) {
    if ((int) ($e->errorInfo[1] ?? 0) === 1062) {
        regresar('El correo electrónico ya está registrado.');
    }

    error_log($e->getMessage());
    regresar('No se pudo completar el registro.');

} catch (Throwable $e) {
    error_log($e->getMessage());
    regresar('Ocurrió un error al procesar el registro.');
}
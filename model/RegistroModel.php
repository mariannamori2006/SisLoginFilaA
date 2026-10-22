<?php

class RegistroModel
{
    private PDO $conexion;

    public function __construct()
    {
        $host = 'localhost';
        $baseDatos = 'sistema_usuarios';
        $usuario = 'root';
        $clave = '';

        $this->conexion = new PDO(
            "mysql:host=$host;dbname=$baseDatos;charset=utf8mb4",
            $usuario,
            $clave,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]
        );
    }

    public function existeEmail(string $email): bool
    {
        $sql = 'SELECT id FROM usuarios WHERE email = :email LIMIT 1';

        $consulta = $this->conexion->prepare($sql);
        $consulta->execute(['email' => $email]);

        return $consulta->fetch() !== false;
    }

    public function registrar(
        string $nombre,
        string $telefono,
        string $email,
        string $password
    ): bool {
        $sql = 'INSERT INTO usuarios (nombre, telefono, email, password)
                VALUES (:nombre, :telefono, :email, :password)';

        $consulta = $this->conexion->prepare($sql);

        return $consulta->execute([
            'nombre' => $nombre,
            'telefono' => $telefono,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);
    }
}
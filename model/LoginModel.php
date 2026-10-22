<?php
class LoginModel
{
    private $usuario = 'admin';
    private $clave   = '1234';

    public function validar($usuario, $clave)
    {
        return $usuario === $this->usuario && $clave === $this->clave;
    }
}
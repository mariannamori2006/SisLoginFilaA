<?php
//Para manejar la recuperación de contraseña
//Simulación ya que aun no hay usuario existente
$correoValido = "admin@correo.com";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';
    $correo = trim($_POST['correo'] ?? '');
    
        if ($accion === 'buscar_correo') {

        //Espacio cuando ahiga usuario en bd

        // Simulamos que lo encontramos siempre para probar el flujo
        if (!empty($correo)) {
            $mensaje = "Correo verificado. Procede a cambiar tu clave.";
            $tipoMensaje = "mensaje";
            $_POST['paso2'] = true; // Para mostrar el paso 2 de recuperación
            require_once '../view/Recuperar.php';
        } else {
            $mensaje = "Por favor ingresa un correo.";
            $tipoMensaje = "error";
            require_once '../view/Recuperar.php';
        }
    }
    
    if ($accion === 'cambiar_clave') {
        $nueva = $_POST['nueva_clave'] ?? '';
        $confirmar = $_POST['confirmar_clave'] ?? '';
        
        if ($nueva === $confirmar && !empty($nueva)) {
            // Aquí a futuro irá: $modelo->actualizarClave($correo, $nueva);
            $mensaje = "¡Contraseña cambiada con éxito! (Simulación)";
            $tipoMensaje = "mensaje";
            // Al terminar, volvemos a mostrar el formulario del paso 1
            unset($_POST['paso2']); 
            require_once '../view/Recuperar.php';
        } else {
            $mensaje = "Las contraseñas no coinciden.";
            $tipoMensaje = "error";
            require_once '../view/Recuperar.php';
        }
    }
} else {
    // Si alguien entra directo al controlador sin formulario, lo devolvemos
    header("Location: ../view/Recuperar.php");
    exit;
}
?>

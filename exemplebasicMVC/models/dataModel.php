<?php
function obtenerDatos($nombre) {
    $datos = [
        'Juan' => '¡Hola, Juan! ¡Bienvenido de nuevo!',
        'María' => '¡Hola, María! ¡Qué alegría verte!',
        'Pedro' => '¡Hola, Pedro! ¡Encantado de saludarte!',
    ];

    $resultado = $datos[$nombre] ?? '¡Hola! No te tengo en mi lista, pero bienvenido!';
    
    return $resultado;
}
?>

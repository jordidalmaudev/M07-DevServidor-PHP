<?php

// Array multidimensional asociativo

$empleadosArray = [
    [
        "id" => 1,
        "nombreCompleto" => "Juan Antonio Lopez Lopez",
        "email" => "ejemplo@ejemplo.com"
    ],
    [
        "id" => 2,
        "nombreCompleto" => "Jordi Herrera Anton",
        "email" => "ejemplo@ejemplo.com",
    ],
    [
        "id" => 3,
        "nombreCompleto" => "Juan Antonio Linde Gutierrez",
        "email" => "ejemplo@ejemplo.com",
    ]
];

// Imprimir por pantalla el array

foreach ($empleadosArray as $empleado) {
    echo "Nombre: " . $empleado["nombreCompleto"] . "\n";
    echo "Id Empleado: " . $empleado["id"] . "\n";
    echo "Email: " . $empleado["email"] . "\n";
    echo "\n";
}

// Convertir a array posicional el multidimensional

$arrayposicional = [];
foreach ($empleadosArray as $empleados) {
    foreach ($empleados as $empleado) {
        array_push($arrayposicional, $empleado);
    }
}

print_r($arrayposicional);

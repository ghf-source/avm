<?php
// asistente/guardar-formulario-completo.php

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['ok' => false, 'error' => 'Método no permitido']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['ok' => false, 'error' => 'Datos inválidos']);
    exit;
}

// Validar campos requeridos (puedes ajustar según necesites)
$camposRequeridos = [
    'apellidos', 'nombres', 'grado', 'telefono', 'correo', 'confirmar_correo',
    'medio_llegada', 'genero', 'factor_rh', 'actividad_extra',
    'motivo_matricula',
    'nombre_acudiente', 'documento_acudiente', 'celular_acudiente',
    'correo_acudiente', 'confirmar_correo_acudiente', 'parentesco'
];

foreach ($camposRequeridos as $campo) {
    if (!isset($input[$campo]) || empty(trim($input[$campo]))) {
        echo json_encode(['ok' => false, 'error' => "Campo faltante: $campo"]);
        exit;
    }
}

// Guardar en archivo (puedes usar base de datos)
$linea = "Fecha: " . date('Y-m-d H:i:s') . " | ";
foreach ($input as $key => $value) {
    $linea .= ucfirst($key) . ": $value | ";
}
$linea .= "\n";

file_put_contents('formulario-completo.txt', $linea, FILE_APPEND | LOCK_EX);

echo json_encode(['ok' => true]);
?>
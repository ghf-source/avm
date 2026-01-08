<?php
// asistente/guardar-datos.php

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

$camposRequeridos = ['fecha_nacimiento', 'genero', 'direccion', 'ciudad'];
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

file_put_contents('datos-complementarios.txt', $linea, FILE_APPEND | LOCK_EX);

echo json_encode(['ok' => true]);
?>
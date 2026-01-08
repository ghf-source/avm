<?php
// asistente/guardar-acudiente.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acudiente_nombre = htmlspecialchars($_POST['acudiente_nombre'] ?? '');
    $acudiente_correo = htmlspecialchars($_POST['acudiente_correo'] ?? '');
    $acudiente_telefono = htmlspecialchars($_POST['acudiente_telefono'] ?? '');
    $tipo_estudiante = htmlspecialchars($_POST['tipo_estudiante'] ?? '');
    $estudiante_nombres = htmlspecialchars($_POST['estudiante_nombres'] ?? '');
    $estudiante_apellidos = htmlspecialchars($_POST['estudiante_apellidos'] ?? '');
    $estudiante_documento = htmlspecialchars($_POST['estudiante_documento'] ?? '');

    if ($acudiente_nombre && $acudiente_correo && $estudiante_nombres && $estudiante_apellidos && $estudiante_documento) {
        $linea = "Acudiente: $acudiente_nombre | Correo: $acudiente_correo | Tel: $acudiente_telefono | " .
                 "Estudiante: $estudiante_nombres $estudiante_apellidos | Tipo: $tipo_estudiante | " .
                 "Doc: $estudiante_documento | Fecha: " . date('Y-m-d H:i:s') . "\n";
        
        file_put_contents('admisiones.txt', $linea, FILE_APPEND | LOCK_EX);
        http_response_code(200);
        echo "Datos guardados";
    } else {
        http_response_code(400);
        echo "Datos incompletos";
    }
} else {
    http_response_code(405);
    echo "Método no permitido";
}
?>
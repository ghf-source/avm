<?php
    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode(['ok' => false, 'error' => 'Método no permitido']);
        exit;
    }

    if (!isset($_FILES['comprobante_deuda'])) {
        echo json_encode(['ok' => false, 'error' => 'No se recibió el archivo']);
        exit;
    }

    $file = $_FILES['comprobante_deuda'];
    $año = date('Y');
    $uploadDir = 'comprobantes/deuda/'.$año."/";
    $allowedTypes = ['pdf', 'png', 'jpg', 'jpeg'];
    $maxSize = 5 * 1024 * 1024; // 5MB

    // Crear carpeta si no existe
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // Validar tamaño
    if ($file['size'] > $maxSize) {
        echo json_encode(['ok' => false, 'error' => 'Archivo demasiado grande']);
        exit;
    }

    // Validar tipo
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowedTypes)) {
        echo json_encode(['ok' => false, 'error' => 'Tipo de archivo no permitido']);
        exit;
    }

    // Usar el nombre original del archivo
    $fileName = $file['name']; // Así de simple
    $filePath = $uploadDir . $fileName;

    //Se valida la estructura del archivo
    $nombre_base = pathinfo($fileName, PATHINFO_FILENAME);
    $patron = '/^\d{5,15}-(20\d{2}(0[1-9]|1[0-2])(0[1-9]|[12]\d|3[01]))-deuda$/';
    
    if (preg_match($patron, $nombre_base, $matches)) {    
        // El formato es correcto. $matches[1] contendrá la fecha "AAAAMMDD"
        $fecha_str = $matches[1]; 
        
        // Extraer año, mes y día de la cadena
        $anio = substr($fecha_str, 0, 4);
        $mes  = substr($fecha_str, 4, 2);
        $dia  = substr($fecha_str, 6, 2);
        
        // Validación lógica con checkdate()
        if (checkdate((int)$mes, (int)$dia, (int)$anio)) {
            //echo "✅ Válido: El archivo '$fileName' es correcto (Formato OK y Fecha Lógica OK).";            
        } else {
            //echo "⚠️ Inválido: Formato OK, pero la fecha '$fecha_str' no es real.";
            echo json_encode(['ok' => false, 'error' => "⚠️ Inválido: Formato OK, pero la fecha '$fecha_str' no es real."]);
            exit;
        }
        
    } else {
        //echo "❌ El nombre de archivo '$fileName' no cumple con el formato requerido.";
        echo json_encode(['ok' => false, 'error' => "❌ El nombre de archivo '$fileName' no cumple con el formato requerido."]);
        exit;
    }

    // Mover archivo con su nombre original
    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        // Registro opcional
        file_put_contents('comprobantes.log', 
            date('Y-m-d H:i:s') . " - Subido: " . $fileName . "\n", 
            FILE_APPEND);
        
        echo json_encode(['ok' => true, 'archivo' => $fileName]);
    } else {
        echo json_encode(['ok' => false, 'error' => 'Error al guardar el archivo. Verifica permisos de escritura.']);
    }
?>
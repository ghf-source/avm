CREATE TABLE `tbl_asistente_virtual` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `documento_estudiante` varchar(255) NOT NULL,
  `a` int(4) UNSIGNED NOT NULL,
  `proceso_iniciado` int(2) UNSIGNED NOT NULL DEFAULT 1,
  `paso` varchar(50) NOT NULL DEFAULT '1',
  `antiguo` int(2) UNSIGNED NOT NULL DEFAULT 0,
  `control_antiguos` int(2) UNSIGNED NOT NULL DEFAULT 0,
  `nuevo` int(2) UNSIGNED NOT NULL DEFAULT 0,
  `id_grado` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `con_deuda` int(2) UNSIGNED NOT NULL DEFAULT 0,
  `deuda` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `control_documentos_invalidos` int(2) NOT NULL DEFAULT 0,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
CREATE TABLE `tbl_asistente_virtual_pasos` (
  `id` int(11) UNSIGNED NOT NULL,
  `paso` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `paso_numero` int(11) UNSIGNED NOT NULL,
  `etiqueta_intencion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
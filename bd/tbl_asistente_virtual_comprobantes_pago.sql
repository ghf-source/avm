CREATE TABLE `tbl_asistente_virtual_comprobantes_pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `documento` varchar(20) NOT NULL,
  `a` int(11) UNSIGNED NOT NULL,
  `tipo` varchar(50) NOT NULL COMMENT 'deuda, matrícula',
  `ruta` varchar(200) NOT NULL,
  `valor` int(11) NOT NULL DEFAULT 0,
  `validado` int(2) UNSIGNED NOT NULL,
  `correo` int(2) NOT NULL DEFAULT 0,
  `rechazado` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

ALTER TABLE `tbl_asistente_virtual_comprobantes_pago`
  ADD UNIQUE KEY `documento` (`documento`,`a`,`tipo`);
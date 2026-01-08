CREATE TABLE `tbl_tipos_documento` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `tipo_documento` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO `tbl_tipos_documento` (`tipo_documento`) VALUES
('TARJETA DE IDENTIDAD'),
('REGISTRO CIVIL'),
('CEDULA'),
('PASAPORTE'),
('PERMISO DE PERMANENCIA TEMPORAL'),
('PERMISO POR PROTECCIÓN TEMPORAL');

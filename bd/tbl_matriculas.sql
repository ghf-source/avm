DROP TABLE IF EXISTS tbl_matriculas;

CREATE TABLE `tbl_matriculas` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `n_matricula` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `estado` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'pre_solicitud',
  `id_estudiante` int(11) NOT NULL,
  `id_grado` int(2) NOT NULL,
  `estado_grado` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `grupo` varchar(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;
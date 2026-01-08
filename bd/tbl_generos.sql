CREATE TABLE `tbl_generos` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `genero` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO `tbl_generos` (`genero`) VALUES
('FEMENINO'),
('MASCULINO');
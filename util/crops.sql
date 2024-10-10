SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `invernadero` (
  `id_invernadero` int(11) NOT NULL,
  `invernadero` varchar(50) NOT NULL,
  `latitud` varchar(20) NOT NULL,
  `longitud` varchar(20) NOT NULL,
  `area` decimal(8,2) NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `permiso` (
  `id_permiso` int(11) NOT NULL,
  `permiso` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `permiso` (`id_permiso`, `permiso`) VALUES
(1, 'index'),
(3, 'Ver invernaderos'),
(4, 'Nuevo invernadero'),
(5, 'Modificar invernadero'),
(6, 'Eliminar invernadero'),
(7, 'Agregar un usuario'),
(8, 'Modificar un usuario'),
(9, 'Eliminar un usuario');

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `rol_permiso` (
  `id_rol` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `seccion` (
  `id_seccion` int(11) NOT NULL,
  `seccion` varchar(50) NOT NULL,
  `area` decimal(8,2) NOT NULL,
  `id_invernadero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `seccion` (`id_seccion`, `seccion`, `area`, `id_invernadero`) VALUES
(2, 'seccion de coliflores minuatura', 500.00, 2);

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `usuario` (`id_usuario`, `correo`, `contrasena`) VALUES
(1, '21031178@itcelaya.edu.mx', '202cb962ac59075b964b07152d234b70'),
(2, 'luislao@itcelaya.edu.mx', 'd16fb36f0911f878998c136191af705e'),
(3, 'l21031178@celaya.tecnm.mx', '900150983cd24fb0d6963f7d28e17f72');

CREATE TABLE `usuario_rol` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `invernadero`
  ADD PRIMARY KEY (`id_invernadero`);

ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id_permiso`);

ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

  ADD PRIMARY KEY (`id_rol`,`id_permiso`),
  ADD KEY `fk_permiso` (`id_permiso`);

ALTER TABLE `seccion`
  ADD PRIMARY KEY (`id_seccion`),
  ADD KEY `fk_id_invernadero_seccion` (`id_invernadero`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo` (`correo`);

ALTER TABLE `usuario_rol`
  ADD PRIMARY KEY (`id_usuario`,`id_rol`);

ALTER TABLE `invernadero`
  MODIFY `id_invernadero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

ALTER TABLE `permiso`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `seccion`
  MODIFY `id_seccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `rol_permiso`
  ADD CONSTRAINT `fk_permiso` FOREIGN KEY (`id_permiso`) REFERENCES `permiso` (`id_permiso`),
  ADD CONSTRAINT `fk_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

ALTER TABLE `seccion`
  ADD CONSTRAINT `fk_id_invernadero_seccion` FOREIGN KEY (`id_invernadero`) REFERENCES `invernadero` (`id_invernadero`);
COMMIT;

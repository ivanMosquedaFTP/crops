-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2024 at 03:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crops`
--

-- --------------------------------------------------------

--
-- Table structure for table `invernadero`
--

CREATE TABLE `invernadero` (
  `id_invernadero` int(11) NOT NULL,
  `invernadero` varchar(50) NOT NULL,
  `latitud` varchar(20) NOT NULL,
  `longitud` varchar(20) NOT NULL,
  `area` decimal(8,2) NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `invernadero`
--

INSERT INTO `invernadero` (`id_invernadero`, `invernadero`, `latitud`, `longitud`, `area`, `fecha_creacion`) VALUES
(1, 'mr. Lucky Broccoli decoy', '20.659853270428727', '-101.2949505852094', 450.00, '2004-09-17'),
(2, 'Mr. Lucky coliflor', '20.6598', '-101.249', 600.00, '2024-09-19'),
(3, 'Invernadero Mr.Ranch', '127.004', '127.0.0.1', 450.00, '2024-09-24'),
(20, 'que no', 'sdfg', 'sdfgs', 2435.00, '2024-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `permiso`
--

CREATE TABLE `permiso` (
  `id_permiso` int(11) NOT NULL,
  `permiso` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permiso`
--

INSERT INTO `permiso` (`id_permiso`, `permiso`) VALUES
(1, 'index'),
(3, 'Ver invernaderos'),
(4, 'Nuevo invernadero'),
(5, 'Modificar invernadero'),
(6, 'Eliminar invernadero'),
(7, 'Agregar un usuario'),
(8, 'Modificar un usuario'),
(9, 'Eliminar un usuario');

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`) VALUES
(1, 'Usuario'),
(2, 'Cliente'),
(3, 'Agricultor'),
(4, 'Administrador');

-- --------------------------------------------------------

--
-- Table structure for table `rol_permiso`
--

CREATE TABLE `rol_permiso` (
  `id_rol` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rol_permiso`
--

INSERT INTO `rol_permiso` (`id_rol`, `id_permiso`) VALUES
(1, 1),
(2, 1),
(3, 1),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(4, 1),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `seccion`
--

CREATE TABLE `seccion` (
  `id_seccion` int(11) NOT NULL,
  `seccion` varchar(50) NOT NULL,
  `area` decimal(8,2) NOT NULL,
  `id_invernadero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `seccion`
--

INSERT INTO `seccion` (`id_seccion`, `seccion`, `area`, `id_invernadero`) VALUES
(2, 'seccion de coliflores minuatura', 500.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `correo`, `contrasena`) VALUES
(1, '21031178@itcelaya.edu.mx', '202cb962ac59075b964b07152d234b70'),
(2, 'luislao@itcelaya.edu.mx', 'd16fb36f0911f878998c136191af705e'),
(3, 'l21031178@celaya.tecnm.mx', '900150983cd24fb0d6963f7d28e17f72');

-- --------------------------------------------------------

--
-- Table structure for table `usuario_rol`
--

CREATE TABLE `usuario_rol` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario_rol`
--

INSERT INTO `usuario_rol` (`id_usuario`, `id_rol`) VALUES
(1, 1),
(1, 2),
(3, 3),
(4, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invernadero`
--
ALTER TABLE `invernadero`
  ADD PRIMARY KEY (`id_invernadero`);

--
-- Indexes for table `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indexes for table `rol_permiso`
--
ALTER TABLE `rol_permiso`
  ADD PRIMARY KEY (`id_rol`,`id_permiso`),
  ADD KEY `fk_permiso` (`id_permiso`);

--
-- Indexes for table `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`id_seccion`),
  ADD KEY `fk_id_invernadero_seccion` (`id_invernadero`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indexes for table `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD PRIMARY KEY (`id_usuario`,`id_rol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invernadero`
--
ALTER TABLE `invernadero`
  MODIFY `id_invernadero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seccion`
--
ALTER TABLE `seccion`
  MODIFY `id_seccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rol_permiso`
--
ALTER TABLE `rol_permiso`
  ADD CONSTRAINT `fk_permiso` FOREIGN KEY (`id_permiso`) REFERENCES `permiso` (`id_permiso`),
  ADD CONSTRAINT `fk_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Constraints for table `seccion`
--
ALTER TABLE `seccion`
  ADD CONSTRAINT `fk_id_invernadero_seccion` FOREIGN KEY (`id_invernadero`) REFERENCES `invernadero` (`id_invernadero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

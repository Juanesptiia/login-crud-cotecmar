-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-04-2024 a las 06:14:19
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cotecmar`
--
CREATE DATABASE IF NOT EXISTS `cotecmar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cotecmar`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bloque`
--
-- Creación: 15-04-2024 a las 03:52:18
-- Última actualización: 17-04-2024 a las 03:49:44
--

CREATE TABLE `bloque` (
  `IDbloque` varchar(11) NOT NULL,
  `nombre_bloque` varchar(20) NOT NULL,
  `proyecto_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bloque`
--

INSERT INTO `bloque` (`IDbloque`, `nombre_bloque`, `proyecto_id`) VALUES
('100-2210', '2210', 'OPV'),
('130-1110', '1110', 'BICM'),
('130-3510', '3510', 'BICM'),
('135-1110', '2210', 'BALC'),
('135-3310', '3310', 'BALC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piezas`
--
-- Creación: 17-04-2024 a las 00:56:55
-- Última actualización: 17-04-2024 a las 03:46:47
--

CREATE TABLE `piezas` (
  `IDpieza` int(11) NOT NULL,
  `nombre_pieza` varchar(20) NOT NULL,
  `peso_teorico` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `piezas`
--

INSERT INTO `piezas` (`IDpieza`, `nombre_pieza`, `peso_teorico`) VALUES
(1, 'B01', '4'),
(2, 'A02', '20'),
(3, 'H12', '16'),
(4, 'R23', '8'),
(5, 'J25', '11'),
(6, 'U23', '5'),
(7, 'E29', '8'),
(8, 'E21', '18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--
-- Creación: 14-04-2024 a las 15:14:22
-- Última actualización: 17-04-2024 a las 03:47:48
--

CREATE TABLE `proyecto` (
  `IDproyecto` varchar(10) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`IDproyecto`, `nombre`) VALUES
('BALC', 'Buque DA'),
('BICM', 'Oceanografico'),
('BRF', 'Recfluvial'),
('OPV', 'Offshore');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--
-- Creación: 16-04-2024 a las 16:12:50
-- Última actualización: 17-04-2024 a las 03:55:15
--

CREATE TABLE `reportes` (
  `pieza_id` int(11) NOT NULL,
  `peso_real` varchar(10) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `id_proyecto` varchar(10) NOT NULL,
  `bloque_id` varchar(11) NOT NULL,
  `fecha_reg` date NOT NULL,
  `usuario_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`pieza_id`, `peso_real`, `estado`, `id_proyecto`, `bloque_id`, `fecha_reg`, `usuario_id`) VALUES
(1, '4.5', 'Fabricado', 'BALC', '100-2210', '2024-04-17', 'Gabriel'),
(3, '16.6', 'Fabricado', 'OPV', '135-1110', '2024-04-17', 'Sergio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--
-- Creación: 14-04-2024 a las 15:33:29
-- Última actualización: 16-04-2024 a las 16:29:49
--

CREATE TABLE `usuarios` (
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `contraseña`) VALUES
('Gabriel', '1111'),
('luis', '0000'),
('Sergio', '2222');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bloque`
--
ALTER TABLE `bloque`
  ADD PRIMARY KEY (`IDbloque`),
  ADD KEY `proyecto_id` (`proyecto_id`);

--
-- Indices de la tabla `piezas`
--
ALTER TABLE `piezas`
  ADD PRIMARY KEY (`IDpieza`),
  ADD UNIQUE KEY `nombre_pieza` (`nombre_pieza`),
  ADD UNIQUE KEY `nombre_pieza_2` (`nombre_pieza`),
  ADD UNIQUE KEY `IDpieza` (`IDpieza`);
ALTER TABLE `piezas` ADD FULLTEXT KEY `nombre_pieza_3` (`nombre_pieza`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`IDproyecto`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `pieza_id` (`pieza_id`),
  ADD KEY `id_proyecto` (`id_proyecto`),
  ADD KEY `bloque_id` (`bloque_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `piezas`
--
ALTER TABLE `piezas`
  MODIFY `IDpieza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=573;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bloque`
--
ALTER TABLE `bloque`
  ADD CONSTRAINT `bloque_ibfk_1` FOREIGN KEY (`proyecto_id`) REFERENCES `proyecto` (`IDproyecto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `reportes_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reportes_ibfk_2` FOREIGN KEY (`pieza_id`) REFERENCES `piezas` (`IDpieza`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reportes_ibfk_4` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`IDproyecto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reportes_ibfk_5` FOREIGN KEY (`bloque_id`) REFERENCES `bloque` (`IDbloque`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2022 a las 04:36:35
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `qrparking`
--
CREATE DATABASE IF NOT EXISTS `qrparking` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `qrparking`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `minuta`
--

DROP TABLE IF EXISTS `minuta`;
CREATE TABLE IF NOT EXISTS `minuta` (
  `Id` int(10) NOT NULL,
  `Placa` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Hora_entrada` datetime DEFAULT NULL,
  `Hora_salida` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `minuta`
--

INSERT INTO `minuta` (`Id`, `Placa`, `Hora_entrada`, `Hora_salida`) VALUES
(5, '0', '2022-06-28 06:59:49', '2022-06-28 07:01:13'),
(6, '0', '2022-06-28 07:27:52', '2022-06-28 07:28:28'),
(7, 'JAF28D', '2022-06-28 08:20:49', '2022-06-28 08:22:14'),
(8, '20', '2022-06-28 08:24:47', NULL),
(9, '7', '2022-06-28 08:25:39', NULL),
(10, 'GER87F', '2022-06-28 08:26:03', '2022-06-28 08:33:38'),
(11, 'JAF28D', '2022-06-28 08:26:42', NULL),
(12, 'JOR48', '2022-06-28 08:33:23', NULL),
(13, 'ASDSAD', '2022-06-28 08:34:03', NULL),
(14, 'dfe390', '2022-06-28 08:41:06', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `Id` int(10) NOT NULL,
  `Rol` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`Id`, `Rol`) VALUES
(1, 'Administrador'),
(2, 'Usuario'),
(3, 'Personal Seguridad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_documento`
--

DROP TABLE IF EXISTS `tipos_documento`;
CREATE TABLE IF NOT EXISTS `tipos_documento` (
  `Id` int(10) NOT NULL,
  `Tipo` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tipos_documento`
--

INSERT INTO `tipos_documento` (`Id`, `Tipo`) VALUES
(1, 'Tarjeta de Identidad'),
(2, 'Cedula de Ciudadania'),
(3, 'Pasaporte'),
(5, 'Cedula Extranjeria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vehiculo`
--

DROP TABLE IF EXISTS `tipo_vehiculo`;
CREATE TABLE IF NOT EXISTS `tipo_vehiculo` (
  `Id` int(11) NOT NULL,
  `Tipo_Vehiculo` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_vehiculo`
--

INSERT INTO `tipo_vehiculo` (`Id`, `Tipo_Vehiculo`) VALUES
(1, 'Bicicleta'),
(2, 'Motocicleta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_u` int(10) NOT NULL,
  `Nombre_Completo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Id_Tipo_Documento` int(10) DEFAULT NULL,
  `Numero_identificacion` bigint(10) NOT NULL DEFAULT '0',
  `Id_Rol` int(5) DEFAULT NULL,
  `Num_Telefono` bigint(20) DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Id_Tipo_Vehiculo` int(5) DEFAULT NULL,
  `Placa_NumMarco` varchar(10) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Foto_Vehiculo` longblob,
  `Contrasena` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_u`, `Nombre_Completo`, `Id_Tipo_Documento`, `Numero_identificacion`, `Id_Rol`, `Num_Telefono`, `Email`, `Id_Tipo_Vehiculo`, `Placa_NumMarco`, `Foto_Vehiculo`, `Contrasena`) VALUES
(1, 'Administrador', 1, 11111, 1, 2147483647, 'administrador@gmial.com', 1, NULL, NULL, '321'),
(6, 'Personal Seguridad #1', 2, 22222, 3, 3118108054, 'dhfgfdg@hasdjasd.com', 2, '5478', NULL, 'sss'),
(11, 'victor', 2, 45678, 2, 3008345460, 'victor@hotmail.com', 2, '4569', '', 'III'),
(13, 'Julian Serna', 3, 888888, 2, 546154, 'javier@gmail.com', 2, 'gui78f', 0x73746576652e6a7067, 'fff'),
(12, 'PECADORA', 2, 987654, 2, 30045878, 'victor@hotmail.com', 2, '7876', 0x736f6669612e6a7067, 'uuu'),
(2, 'Julian', 2, 7841213, 2, 3158796878, 'julian@gmail.com', 2, 'JOR48', '', 'qqq'),
(3, 'Javier Buitrago', 2, 7896453, 2, 3008345497, 'javier@gmail.com', 2, 'GER87F', '', 'EEE'),
(4, 'Daniel Rodriguez', 2, 12338888, 2, 3008345497, 'daniel.rodriguez8888@misena.edu.co', 2, 'JAF28D', '', 'ppp');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_usuarios`
--
DROP VIEW IF EXISTS `vista_usuarios`;
CREATE TABLE IF NOT EXISTS `vista_usuarios` (
`id_u` int(10)
,`Nombre_Completo` varchar(100)
,`Rol` varchar(25)
,`Tipo` varchar(25)
,`Numero_identificacion` bigint(10)
,`Tipo_Vehiculo` varchar(25)
,`Placa_NumMarco` varchar(10)
,`Email` varchar(100)
,`Num_Telefono` bigint(20)
,`Contrasena` varchar(100)
,`Foto_Vehiculo` longblob
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_usuarios`
--
DROP TABLE IF EXISTS `vista_usuarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_usuarios` AS select `usuarios`.`id_u` AS `id_u`,`usuarios`.`Nombre_Completo` AS `Nombre_Completo`,`roles`.`Rol` AS `Rol`,`tipos_documento`.`Tipo` AS `Tipo`,`usuarios`.`Numero_identificacion` AS `Numero_identificacion`,`tipo_vehiculo`.`Tipo_Vehiculo` AS `Tipo_Vehiculo`,`usuarios`.`Placa_NumMarco` AS `Placa_NumMarco`,`usuarios`.`Email` AS `Email`,`usuarios`.`Num_Telefono` AS `Num_Telefono`,`usuarios`.`Contrasena` AS `Contrasena`,`usuarios`.`Foto_Vehiculo` AS `Foto_Vehiculo` from (((`usuarios` join `roles`) join `tipos_documento`) join `tipo_vehiculo`) where ((`usuarios`.`Id_Rol` = `roles`.`Id`) and (`usuarios`.`Id_Tipo_Documento` = `tipos_documento`.`Id`) and (`usuarios`.`Id_Tipo_Vehiculo` = `tipo_vehiculo`.`Id`));

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `minuta`
--
ALTER TABLE `minuta`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Num_documento` (`Placa`),
  ADD KEY `Num_documento_2` (`Placa`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tipos_documento`
--
ALTER TABLE `tipos_documento`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tipo_vehiculo`
--
ALTER TABLE `tipo_vehiculo`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Numero_identificacion`),
  ADD KEY `Id_Tipo_Documento` (`Id_Tipo_Documento`,`Id_Rol`,`Id_Tipo_Vehiculo`),
  ADD KEY `Id_Rol` (`Id_Rol`),
  ADD KEY `Id_Tipo_Vehiculo` (`Id_Tipo_Vehiculo`),
  ADD KEY `Placa_NumMarco` (`Placa_NumMarco`),
  ADD KEY `id_u` (`id_u`),
  ADD KEY `Numero_identificacion` (`Numero_identificacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `minuta`
--
ALTER TABLE `minuta`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `tipo_vehiculo`
--
ALTER TABLE `tipo_vehiculo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_u` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Id_Rol`) REFERENCES `roles` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`Id_Tipo_Documento`) REFERENCES `tipos_documento` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`Id_Tipo_Vehiculo`) REFERENCES `tipo_vehiculo` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

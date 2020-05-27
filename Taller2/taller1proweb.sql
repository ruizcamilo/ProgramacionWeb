-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2020 a las 06:45:10
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taller1proweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `cedula` char(100) DEFAULT NULL,
  `nombre` char(100) DEFAULT NULL,
  `apellido` char(100) DEFAULT NULL,
  `email` char(100) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `cedula`, `nombre`, `apellido`, `email`, `edad`) VALUES
(1, '99999', 'Camilo', 'Ruiz', 'ruiz@camilo.com', 21),
(3, '93654', 'Peter', 'Griffin', 'peter@gmail.com', 45),
(5, '1111', 'Vane', 'Rucho', 'oaskoaska@mail.com', 25),
(7, '12345', 'Camilo', 'Cruz', 'crackmilo@ui.com', 84),
(9, '1018', 'Hugo', 'Boris', 'boris@hugo.com', 23),
(10, '1019', 'Vane', 'Puli', 'pulivane@suptm.com', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombreusuario` char(100) NOT NULL,
  `rol` char(20) NOT NULL,
  `contrasena` char(200) NOT NULL,
  `cedula` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombreusuario`, `rol`, `contrasena`, `cedula`) VALUES
(8, 'elstormy', 'admin', '$6$rounds=5000$rucrypt$LodPXNOrDTK1cb3.hATGYgE6qVvdTiD8dBuWttFU7qO/D8K1r2psQZYJJ5Bww3VszfpBBseDQtCpNg.wA2EFx/', '99999'),
(10, 'ads', 'usuario', '$6$rounds=5000$rucrypt$jxrsrUbgnhKthVTgkTSfocd4kNmuORKt9qW9pSWzj/pFtMZ7tCQOM0vEssk5u6DZrSJoqkkXHADg05K.1UPMz1', '1111');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombreusuario` (`nombreusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

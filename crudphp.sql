-- phpMyAdmin SQL Dump
-- version 4.5.5.1deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-05-2016 a las 03:18:55
-- Versión del servidor: 5.6.28-1
-- Versión de PHP: 5.6.19-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crudphp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `codigo` tinyint(4) NOT NULL,
  `descripcion` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`codigo`, `descripcion`) VALUES
(12, 'Jefe Proyecto'),
(23, 'Analista'),
(32, 'Desarrollador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `rut` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cod_cargo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`rut`, `nombre`, `email`, `telefono`, `cod_cargo`) VALUES
('10123123-1', 'Jorge Hochstetter', 'j.hochstetter@ufrontera.cl', '98769876', 12),
('12345678-9', 'Fernando Fernandez', 'f.fernandez01@ufromail.cl', '12121212', 32),
('16234543-6', 'Ricardo Uriel', 'rick@gmail.us', '8896337', 12),
('17832323-5', 'Juana Nieves', 'j.nieves@gmail.us', '9872937', 23),
('182345678-', 'Rodrigo Rodriguez', 'r.rodriguez02@ufromail.cl', '23232323', 23),
('18323434-3', 'Jon Snow', 'jon@gmail.us', '9292137', 32),
('18683667-7', 'Pedro Manriquez', 'ptrmanriquez@gmail.com', '84823178', 32),
('18789323-2', 'Homero Simpsons', 'homer@gmail.us', '9892337', 32);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`rut`),
  ADD KEY `cod_cargo` (`cod_cargo`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `contacto_ibfk_1` FOREIGN KEY (`cod_cargo`) REFERENCES `cargo` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

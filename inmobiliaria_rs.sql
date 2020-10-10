-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-10-2020 a las 21:38:47
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inmobiliaria_rs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Administradores`
--

CREATE TABLE `Administradores` (
  `Mail` varchar(255) NOT NULL,
  `Nombre_Administrador` varchar(255) NOT NULL,
  `Contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Administradores`
--

INSERT INTO `Administradores` (`Mail`, `Nombre_Administrador`, `Contraseña`) VALUES
('ivanemanuel315@gmail.com', 'Ivan315', 'admin110');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Propiedades`
--

CREATE TABLE `Propiedades` (
  `ID_Propiedad` int(11) NOT NULL,
  `Título` varchar(255) NOT NULL,
  `Dirección` varchar(255) NOT NULL,
  `ID_Tipo` tinyint(4) NOT NULL,
  `Piso` tinyint(4) DEFAULT NULL,
  `Departamento` varchar(20) DEFAULT NULL,
  `Descripción` text DEFAULT NULL,
  `Localidad` varchar(255) NOT NULL,
  `Categoría` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tipos_Propiedades`
--

CREATE TABLE `Tipos_Propiedades` (
  `ID_Tipo` tinyint(11) NOT NULL,
  `Nombre_Tipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Tipos_Propiedades`
--

INSERT INTO `Tipos_Propiedades` (`ID_Tipo`, `Nombre_Tipo`) VALUES
(1, 'Casa'),
(2, 'Departamento'),
(3, 'Galpón'),
(4, 'Terreno'),
(5, 'Lote');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Administradores`
--
ALTER TABLE `Administradores`
  ADD PRIMARY KEY (`Mail`);

--
-- Indices de la tabla `Propiedades`
--
ALTER TABLE `Propiedades`
  ADD PRIMARY KEY (`ID_Propiedad`),
  ADD KEY `ID_Tipo` (`ID_Tipo`);

--
-- Indices de la tabla `Tipos_Propiedades`
--
ALTER TABLE `Tipos_Propiedades`
  ADD PRIMARY KEY (`ID_Tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Propiedades`
--
ALTER TABLE `Propiedades`
  MODIFY `ID_Propiedad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Tipos_Propiedades`
--
ALTER TABLE `Tipos_Propiedades`
  MODIFY `ID_Tipo` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Propiedades`
--
ALTER TABLE `Propiedades`
  ADD CONSTRAINT `Propiedades_ibfk_1` FOREIGN KEY (`ID_Tipo`) REFERENCES `Tipos_Propiedades` (`ID_Tipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

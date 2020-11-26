-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2020 a las 14:49:04
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

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
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` tinyint(4) NOT NULL,
  `Mail` varchar(30) NOT NULL,
  `Nombre_Administrador` varchar(20) NOT NULL,
  `Contraseña` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `Mail`, `Nombre_Administrador`, `Contraseña`) VALUES
(1, 'ivanemanuel315@gmail.com', 'Iván', 'admin110'),
(3, 'jereet_31@gmail.com', 'Jere', 'jere110');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE `localidades` (
  `id` tinyint(11) NOT NULL,
  `localidad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`id`, `localidad`) VALUES
(1, 'Bahía Blanca'),
(2, 'Monte Hermoso'),
(3, 'CABA'),
(4, 'Punta Alta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedades`
--

CREATE TABLE `propiedades` (
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

--
-- Volcado de datos para la tabla `propiedades`
--

INSERT INTO `propiedades` (`ID_Propiedad`, `Título`, `Dirección`, `ID_Tipo`, `Piso`, `Departamento`, `Descripción`, `Localidad`, `Categoría`) VALUES
(1, 'Thompson 550, CASA, Lote de 7,95X61,63', 'Thompson 550', 1, NULL, NULL, 'Thompson 550 - Apto oficinas o comercios.\r\nRecepción\r\n2 Livings\r\n3 dormitorios\r\n2 baños\r\nCocina\r\nLavadero independiente.\r\nGran galpón con cocina, baño, asadores.\r\nPatio con piso de material, bomba y drenaje de agua.\r\n350mts cubiertos en total.\r\nLote de 7,90 x 62 mts.', 'Bahía Blanca', 'Venta'),
(2, 'Ramon y Cajal 4100, CASA, Lote de 400 M2', 'Ramon y Cajal 4100', 1, NULL, NULL, 'Importante propiedad en Barrio Patagonia.\r\n3 Dormitorios, 1 en suite con vestidor.\r\n3 baños.\r\nLiving, cocina comedor y lavadero.\r\nOficina/dormitorio en planta alta con gran balcón.\r\nPileta 5.5x10.5mts. Bomba y sisterna\r\nQuincho con parrilla y baño.\r\nGalpón.\r\nLote de 40x100mts con arbolado perimetral, riego por aspersión y portón eléctrico.', 'Bahía Blanca', 'Venta'),
(3, 'Uruguay 113, DUPLEX, 115 MTS cubiertos, Barrio Universitario', 'Uruguay 113', 1, NULL, NULL, 'Barrio Universitario - Uruguay 113\r\n115mts cubiertos.\r\n1 dormitorio equipado con aire acondicionado frio/calor.\r\nLiving amplio.\r\nCocina independiente.\r\nOficina en altos.\r\nBaño completo.\r\nTerraza.\r\nCochera.', 'Bahía Blanca', 'Venta'),
(4, 'Amplio Terreno de 837 m2 (20x42) en Barrio Molina Campos (Patagonia)', 'Rehue 260, Parcela 7 ', 4, NULL, NULL, 'Barrio Molina Campos (Patagonia).\r\nAmplio Terreno de 837 m2 (20x42) en Rehue 260, Parcela 7 (entre Las Heras y Belgrano).\r\nApto para construcción Bifamiliar/Duplex hasta 3 pisos (zona RP2(2)). \r\nTodos los servicios: Agua, Luz y Gas.', 'Bahía Blanca', 'Venta'),
(5, 'Terreno en Barrio Mercich de 37,5 mts de frente por 65 mts de fondo', 'Barrio Mercich (Frente a Pago Chico) ', 4, NULL, NULL, 'Barrio Mercich (Frente a Pago Chico) \r\n(Ubicación: https://goo.gl/maps/mBjpeA8BZAXu3skJA  )\r\nTerreno de 37,5 mts de frente por 65 mts de fondo. \r\nAlambrado olímpico y tranquera.\r\nServicios de Luz y agua.\r\nCasa a terminar (falta terminar de hacer conexión de agua, detalles en el interior y pintura interior) .\r\n2 habitaciones \r\nLiving.\r\nCocina.\r\nBaño.\r\nGalpon.', 'Bahía Blanca', 'Venta'),
(6, 'Castelli 455, Departamento en venta, 61 M2', 'Castelli 455', 2, NULL, NULL, 'Castelli 455\r\nDepartamento en venta primer piso.\r\n2 habitaciones.\r\nCocina independiente.\r\nBalcón al frente.\r\nBaño.\r\nCochera.\r\n61mts2', 'Bahía Blanca', 'Venta'),
(7, 'Moreno 529, Departamento de 1D a estrenar', 'Moreno 529', 2, 1, 'D', 'Departamento de 1D a estrenar.\r\nMoreno 529\r\nHermoso departamento al frente.\r\n1 dormitorio con calefacción por radiador, placard y vista al frente.\r\nAmplio living comedor con cocina integrada y barra.\r\nBalcón.\r\nBaño completo con griferia y accesorios FV.', 'Bahía Blanca', 'Venta'),
(8, 'Lote en Patagonia, 19x27 mts', 'Lote en Patagonia', 1, NULL, NULL, 'Lote en Patagonia.\r\n19x27 mts.\r\nBifamiliar.\r\nTodos los servicios.\r\nExcelente ubicación. ', 'Bahía Blanca', 'Venta'),
(9, 'Casa Avellaneda 2200 en Venta o Permuta por Lotes en Barrio La Cañada o El Maiten', 'Avellaneda 2200', 1, NULL, NULL, 'Casa Avellaneda 2200\r\nCasa en Venta o Permuta por Lotes en Barrio La Cañada o El Maiten\r\nLiving\r\n3 Dormitorios\r\n2 baños.\r\nLavadero\r\nQuincho 50mts.\r\nParrilla\r\nAmplio garaje 2 vehiculos\r\n160mts cubiertos\r\nSobre un lote de 273mts2', 'Bahía Blanca', 'Venta'),
(10, 'Lotes Barrio San Agustín Lotes de 17x37 mts', 'Lotes Barrio San Agustín', 4, NULL, NULL, 'Lotes Barrio San Agustín\r\nVenta individual o en conjunto.\r\nLotes de 17x37 mts.\r\nNivelados.\r\nAlambrado perimetral.', 'Bahía Blanca', 'Venta'),
(11, 'Casa en Tucumán 1100', 'Tucumán 1100', 1, NULL, NULL, 'Casa en Tucumán 1100.\r\n2 dormitorios.\r\nLiving.\r\nComedor.\r\nCocina.\r\nGarage.\r\nPatio.\r\nQuincho con baño.', 'Bahía Blanca', 'Venta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_propiedades`
--

CREATE TABLE `tipos_propiedades` (
  `ID_Tipo` tinyint(11) NOT NULL,
  `Nombre_Tipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos_propiedades`
--

INSERT INTO `tipos_propiedades` (`ID_Tipo`, `Nombre_Tipo`) VALUES
(1, 'Casa'),
(2, 'Departamento'),
(3, 'Galpón'),
(4, 'Terreno'),
(5, 'Lote');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `propiedades`
--
ALTER TABLE `propiedades`
  ADD PRIMARY KEY (`ID_Propiedad`),
  ADD KEY `ID_Tipo` (`ID_Tipo`);

--
-- Indices de la tabla `tipos_propiedades`
--
ALTER TABLE `tipos_propiedades`
  ADD PRIMARY KEY (`ID_Tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
  MODIFY `id` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `propiedades`
--
ALTER TABLE `propiedades`
  MODIFY `ID_Propiedad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipos_propiedades`
--
ALTER TABLE `tipos_propiedades`
  MODIFY `ID_Tipo` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `propiedades`
--
ALTER TABLE `propiedades`
  ADD CONSTRAINT `Propiedades_ibfk_1` FOREIGN KEY (`ID_Tipo`) REFERENCES `tipos_propiedades` (`ID_Tipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

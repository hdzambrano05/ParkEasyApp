-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2023 a las 03:52:45
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parkeasyback`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Cedula` varchar(15) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `CorreoElectronico` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Cedula`, `Nombre`, `Apellido`, `Telefono`, `CorreoElectronico`) VALUES
('1004191801', 'Jeison', 'Maigual', '3234724931 ', 'jeison@hotmail.com'),
('1004232350', 'harold', 'zambrano', '3207202294 ', 'harold1299@hotmail.com'),
('10042323502', 'harold', 'zambrano', '3207202294 ', 'harold1299@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espaciosparqueo`
--

CREATE TABLE `espaciosparqueo` (
  `Numero_Espacio` varchar(10) NOT NULL,
  `Tipo` varchar(20) DEFAULT NULL,
  `Disponible` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `ID_Reserva` int(11) NOT NULL,
  `Cedula_Cliente` varchar(15) DEFAULT NULL,
  `Placa_Vehiculo` varchar(10) DEFAULT NULL,
  `Fecha_Inicio` date DEFAULT NULL,
  `Hora_Inicio` time DEFAULT NULL,
  `Fecha_Final` date DEFAULT NULL,
  `Hora_Final` time DEFAULT NULL,
  `Numero_Espacio` varchar(10) DEFAULT NULL,
  `Estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `Placa` varchar(10) NOT NULL,
  `Color` varchar(20) DEFAULT NULL,
  `Tipo` varchar(20) DEFAULT NULL,
  `Cedula` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`Placa`, `Color`, `Tipo`, `Cedula`) VALUES
('atv20f', 'gris', 'Moto', '1004232350'),
('atv20fs', 'gris', 'Carro', '1004232350');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Cedula`);

--
-- Indices de la tabla `espaciosparqueo`
--
ALTER TABLE `espaciosparqueo`
  ADD PRIMARY KEY (`Numero_Espacio`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`ID_Reserva`),
  ADD KEY `Cedula_Cliente` (`Cedula_Cliente`),
  ADD KEY `Placa_Vehiculo` (`Placa_Vehiculo`),
  ADD KEY `Numero_Espacio` (`Numero_Espacio`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`Placa`),
  ADD KEY `Cedula` (`Cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `ID_Reserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`Cedula_Cliente`) REFERENCES `clientes` (`Cedula`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`Placa_Vehiculo`) REFERENCES `vehiculos` (`Placa`),
  ADD CONSTRAINT `reservas_ibfk_3` FOREIGN KEY (`Numero_Espacio`) REFERENCES `espaciosparqueo` (`Numero_Espacio`);

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`Cedula`) REFERENCES `clientes` (`Cedula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

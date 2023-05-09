-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 29-04-2023 a las 16:36:28
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cuponeralis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `IdCategoria` int NOT NULL AUTO_INCREMENT,
  `NombreCategoria` varchar(25) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  PRIMARY KEY (`IdCategoria`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`IdCategoria`, `NombreCategoria`) VALUES
(1, 'Estetica'),
(2, 'Automoviles y carrocería'),
(3, 'Comida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `IdCliente` int NOT NULL AUTO_INCREMENT,
  `Nombres` varchar(50) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Apellidos` varchar(50) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Dui` varchar(9) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Telefono` varchar(8) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Correo` varchar(50) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Direccion` varchar(100) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Clave` varchar(100) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Estado` varchar(20) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Token` varchar(7) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  PRIMARY KEY (`IdCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`IdCliente`, `Nombres`, `Apellidos`, `Dui`, `Telefono`, `Correo`, `Direccion`, `Clave`, `Estado`, `Token`) VALUES
(3, 'Neivy', 'Acuna', '987321456', '72540178', 'erikaacuna671@gmail.com', 'vvvv', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Activo', '1AB519');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuponr`
--

DROP TABLE IF EXISTS `cuponr`;
CREATE TABLE IF NOT EXISTS `cuponr` (
  `IdCuponR` varchar(50) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `IdEmpresaR` varchar(6) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Titulo` varchar(25) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `PrecioRegular` decimal(7,2) NOT NULL,
  `PrecioOferta` decimal(7,2) NOT NULL,
  `PrecioCupon` decimal(7,2) NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaFin` date NOT NULL,
  `FechaLimiteUso` date NOT NULL,
  `Descripcion` varchar(300) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `OtrosDetalles` varchar(300) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Disponibilidad` int NOT NULL,
  `imagen` varchar(300) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `CantidadVendido` int NOT NULL,
  `Estado` int NOT NULL,
  PRIMARY KEY (`IdCuponR`),
  KEY `IdEmpresaR` (`IdEmpresaR`),
  KEY `Estado` (`Estado`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `cuponr`
--

INSERT INTO `cuponr` (`IdCuponR`, `IdEmpresaR`, `Titulo`, `PrecioRegular`, `PrecioOferta`, `PrecioCupon`, `FechaInicio`, `FechaFin`, `FechaLimiteUso`, `Descripcion`, `OtrosDetalles`, `Disponibilidad`, `imagen`, `CantidadVendido`, `Estado`) VALUES
('CUP0001', 'EMP001', 'Limpieza facial', '130.00', '20.00', '1.25', '2023-04-01', '2023-02-28', '2023-03-09', '¡Paga $20 en Lugar de $130 por 2 Sesiones de Limpieza Facial', 'Canjeable', 0, 'facial.jpg', 7, 1),
('CUP0002', 'EMP002', 'Lavado de tapiceria', '38.00', '18.50', '1.25', '2023-03-02', '2023-05-14', '2023-06-14', '¡Paga $18.50 en Lugar de $38 por Lavado de Tapicería de Vehículo a Domicilio!', 'Canjeable fácil, restricciones aplican', 10, 'tapiceria.jpg', 2, 1),
('CUP0003', 'EMP003', 'Polarizado', '62.00', '30.00', '1.25', '2023-04-06', '2023-05-11', '2023-06-16', '¡Paga $30 en Lugar de $62 po', 'Fácil uso', 8, 'polarizado.jpg', 2, 1),
('CUP0004', 'EMP004', 'Corte de cabello', '36.00', '10.00', '1.25', '2023-04-06', '2023-06-14', '2023-04-13', '¡Paga $10 en Lugar de $36 por Paquetes de Servicios a Elección: A) 4 Lavados + 4 Cortes de Cabello + 4 Aplicaciones de Cera o Gel o B) 3 Cortes de Cabello + 3 Lavados + 1 Corte y 1 Lavado de Barba!', 'Puedes compartir tu cupón—la oportunidad perfecta para pasar un rato agradable entre machos con tu papá, tu hijo, tu mejor amigo o quien quieras.', 13, 'barberia.jpg', 9, 1),
('CUP0005', 'EMP005', 'Banquete de costillas', '61.86', '39.95', '1.25', '2023-04-06', '2023-03-08', '2023-04-13', 'Banquete Ribs & BBQ para 4 personas: Smokehouse + Pulled Pork Nachos + Flavored Limonade', '', 29, 'costillas.jpg', 0, 1),
('CUP0006', 'EMP006', 'Taquiza', '22.95', '11.45', '1.25', '2023-04-06', '2023-03-08', '2023-04-13', '¡Paga $11.50 en Lugar de $22.9', 'Taquiza con 12 tacos de tortilla doble con queso fundido y carne de tu elección—pollo, pastor, hawaiana o mixta. Todos acompañados de su chimol y sus ricas salsas picantes y no picantes, incluye 4 deliciosos caldos de birria.', 12, 'tacos.jpg', 4, 1),
('CUP0007', 'EMP007', 'Examenes de laboratorio', '147.50', '18.00', '1.25', '2023-04-08', '2023-05-09', '2023-05-09', '¡Paga $18 en Lugar de $14', '28 exámenes de laboratorio que evaluarán los problemas más habituales de salud y que son un riesgo para tu vida: enfermedades cardiovasculares, sobrepeso, niveles de colesterol elevados, mala circulación, artritis, hipertensión arterial o diabetesa.', 14, 'laboratorio.jpg', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuponv`
--

DROP TABLE IF EXISTS `cuponv`;
CREATE TABLE IF NOT EXISTS `cuponv` (
  `IdCuponV` varchar(150) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `IdVenta` varchar(15) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `IdCupon` varchar(150) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `IdCliente` varchar(50) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Estado` varchar(15) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  PRIMARY KEY (`IdCuponV`),
  KEY `IdVenta` (`IdVenta`),
  KEY `IdCupon` (`IdCupon`)
) ENGINE=MyISAM AUTO_INCREMENT=128856421 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `cuponv`
--

INSERT INTO `cuponv` (`IdCuponV`, `IdVenta`, `IdCupon`, `IdCliente`, `Estado`) VALUES
('EMP0076268628', '117', 'CUP0007', '3', 'disponible'),
('EMP0073375622', '117', 'CUP0007', '3', 'disponible'),
('EMP0061748174', '116', 'CUP0006', '3', 'disponible'),
('EMP0067237945', '116', 'CUP0006', '3', 'disponible'),
('EMP0064330949', '116', 'CUP0006', '3', 'disponible'),
('EMP0060312411', '116', 'CUP0006', '3', 'disponible'),
('EMP0044753016', '115', 'CUP0004', '3', 'disponible'),
('EMP0047392765', '115', 'CUP0004', '3', 'disponible'),
('EMP0014010043', '114', 'CUP0001', '3', 'disponible'),
('EMP0025484693', '113', 'CUP0002', '1', 'disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE IF NOT EXISTS `empleado` (
  `IdEmpleado` varchar(100) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `IdEmpresaR` varchar(6) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Nombres` varchar(50) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Apellidos` varchar(50) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Telefono` varchar(8) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Correo` varchar(50) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Clave` varchar(200) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Rol` int NOT NULL,
  `Rubro` varchar(50) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  PRIMARY KEY (`IdEmpleado`),
  KEY `IdEmpresaR` (`IdEmpresaR`),
  KEY `Rol` (`Rol`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`IdEmpleado`, `IdEmpresaR`, `Nombres`, `Apellidos`, `Telefono`, `Correo`, `Clave`, `Rol`, `Rubro`) VALUES
('TRA001', 'EMP001', 'Luis Alejandro', 'Rosales', '74148523', 'luis.lemus@hotmail.com', '123456', 1, 'Gerente'),
('TRA002', 'EMP002', 'Abigail', 'Acuna', '78963214', 'luciapena@hotmail.com', '1235', 2, 'CEO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresar`
--

DROP TABLE IF EXISTS `empresar`;
CREATE TABLE IF NOT EXISTS `empresar` (
  `IdEmpresaR` varchar(6) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `IdCategeoria` int NOT NULL,
  `NombreEmpresa` varchar(50) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Direccion` varchar(100) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `NombreContacto` varchar(25) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Telefono` varchar(8) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Correo` varchar(50) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Comision` decimal(2,2) NOT NULL,
  `Clave` varchar(20) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Rol` int NOT NULL,
  PRIMARY KEY (`IdEmpresaR`),
  KEY `IdCategoria` (`IdCategeoria`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `empresar`
--

INSERT INTO `empresar` (`IdEmpresaR`, `IdCategeoria`, `NombreEmpresa`, `Direccion`, `NombreContacto`, `Telefono`, `Correo`, `Comision`) VALUES
('EMP004', 1, 'MAAC', 'vvvv', 'abby', '78451232', 'abby@123.com', '0.50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadocupon`
--

DROP TABLE IF EXISTS `estadocupon`;
CREATE TABLE IF NOT EXISTS `estadocupon` (
  `IdEstado` int NOT NULL,
  `NombreEstado` varchar(50) NOT NULL,
  PRIMARY KEY (`IdEstado`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `estadocupon`
--

INSERT INTO `estadocupon` (`IdEstado`, `NombreEstado`) VALUES
(1, 'Activo'),
(2, 'Canjeado'),
(3, 'Vencido'),
(4, 'En Espera'),
(5, 'Descartadas'),
(6, 'Rechazadas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `IdRol` int NOT NULL,
  `NombreRol` varchar(50) NOT NULL,
  PRIMARY KEY (`IdRol`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`IdRol`, `NombreRol`) VALUES
(1, 'Administrador'),
(2, 'AdministradorEmpresa'),
(3, 'Empleado'),
(4, 'Clientes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE IF NOT EXISTS `venta` (
  `IdVenta` int NOT NULL AUTO_INCREMENT,
  `IdCuponR` varchar(150) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `IdCliente` int NOT NULL,
  `Cantidad` int NOT NULL,
  `FechaCompra` date NOT NULL,
  `Estado` int NOT NULL,
  PRIMARY KEY (`IdVenta`),
  KEY `IdCuponR` (`IdCuponR`),
  KEY `IdCliente` (`IdCliente`),
  KEY `Estado` (`Estado`)
) ENGINE=MyISAM AUTO_INCREMENT=118 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`IdVenta`, `IdCuponR`, `IdCliente`, `Cantidad`, `FechaCompra`, `Estado`) VALUES
(117, 'CUP0007', 3, 2, '2023-04-20', 1),
(116, 'CUP0006', 3, 4, '2023-04-20', 1),
(115, 'CUP0004', 3, 2, '2023-04-20', 1),
(114, 'CUP0001', 3, 1, '2023-04-20', 1),
(113, 'CUP0002', 1, 1, '2023-04-20', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

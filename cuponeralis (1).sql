-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-04-2023 a las 02:01:32
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

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
  `NombreCategoria` varchar(25) COLLATE utf16_spanish_ci NOT NULL,
  PRIMARY KEY (`IdCategoria`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`IdCategoria`, `NombreCategoria`) VALUES
(1, 'Belleza');

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
  `Token` varchar(6) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  PRIMARY KEY (`IdCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`IdCliente`, `Nombres`, `Apellidos`, `Dui`, `Telefono`, `Correo`, `Direccion`, `Clave`, `Estado`, `Token`) VALUES
(1, 'Abigail', 'Acuna', '987321456', '78451236', 'acuaabigail@yahoo.com', 'aaaa', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Activo', '733BDF'),
(3, 'Neivy', 'Acuna', '987321456', '72540178', 'erikaacuna671@gmail.com', 'aaaa', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Activo', '1AB519');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuponr`
--

DROP TABLE IF EXISTS `cuponr`;
CREATE TABLE IF NOT EXISTS `cuponr` (
  `IdCuponR` varchar(50) COLLATE utf16_spanish_ci NOT NULL,
  `IdEmpresaR` varchar(6) COLLATE utf16_spanish_ci NOT NULL,
  `Titulo` varchar(25) COLLATE utf16_spanish_ci NOT NULL,
  `PrecioRegular` decimal(7,2) NOT NULL,
  `PrecioOferta` decimal(7,2) NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaFin` date NOT NULL,
  `FechaLimiteUso` date NOT NULL,
  `Descripcion` varchar(300) COLLATE utf16_spanish_ci NOT NULL,
  `OtrosDetalles` varchar(300) COLLATE utf16_spanish_ci NOT NULL,
  `Disponibilidad` int NOT NULL,
  `Estado` varchar(25) COLLATE utf16_spanish_ci NOT NULL,
  `imagen` varchar(300) COLLATE utf16_spanish_ci NOT NULL,
  `CantidadVendido` int NOT NULL,
  PRIMARY KEY (`IdCuponR`),
  KEY `IdEmpresaR` (`IdEmpresaR`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `cuponr`
--

INSERT INTO `cuponr` (`IdCuponR`, `IdEmpresaR`, `Titulo`, `PrecioRegular`, `PrecioOferta`, `FechaInicio`, `FechaFin`, `FechaLimiteUso`, `Descripcion`, `OtrosDetalles`, `Disponibilidad`, `Estado`, `imagen`, `CantidadVendido`) VALUES
('CUP0001', 'EMP001', 'Cupón de Belleza', '15.99', '0.00', '2023-02-01', '2023-02-28', '2023-03-09', 'Cupon 10/10', 'Canjeable', 15, 'Activo', 'cuponmasaje.jpg', 0),
('CUP0002', 'EMP002', 'Cupón deRopa', '20.32', '0.00', '2023-02-02', '2023-03-08', '2023-02-01', 'Cupón de ropa sensacional', 'Canjeable fácil, restricciones aplican', 10, 'Activo', 'cuponmasaje.jpg', 0),
('CUP0003', 'EMP003', 'Cupón de Masajes', '25.00', '23.00', '2023-04-06', '2023-05-11', '2023-06-16', 'El mejor masaje, al mejor precio', 'Fácil uso', 15, 'Activo', 'cuponmasaje.jpg', 0),
('CUP0004', 'EMP004', 'Cupón prueba', '2.35', '1.99', '2023-04-06', '2023-06-14', '2023-04-13', 'cc', 'cccvv', 10, 'Activo', 'cuponprueba.jpg', 0),
('CUP0005', 'EMP005', 'Cupon de Cirugia', '1200.00', '0.00', '2023-04-06', '2023-03-08', '2023-04-13', 'Cupón 10/10 cirugia', '', 10, 'Activo', 'cuponbelleza.jpg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuponv`
--

DROP TABLE IF EXISTS `cuponv`;
CREATE TABLE IF NOT EXISTS `cuponv` (
  `IdCuponV` varchar(150) COLLATE utf16_spanish_ci NOT NULL,
  `IdVenta` varchar(15) COLLATE utf16_spanish_ci NOT NULL,
  `IdCupon` varchar(150) COLLATE utf16_spanish_ci NOT NULL,
  `IdCliente` varchar(50) COLLATE utf16_spanish_ci NOT NULL,
  `Estado` varchar(15) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  PRIMARY KEY (`IdCuponV`),
  KEY `IdVenta` (`IdVenta`),
  KEY `IdCupon` (`IdCupon`)
) ENGINE=MyISAM AUTO_INCREMENT=128856421 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE IF NOT EXISTS `empleado` (
  `IdEmpleado` int NOT NULL AUTO_INCREMENT,
  `IdEmpresaR` varchar(6) COLLATE utf16_spanish_ci NOT NULL,
  `Nombres` varchar(50) COLLATE utf16_spanish_ci NOT NULL,
  `Apellidos` varchar(50) COLLATE utf16_spanish_ci NOT NULL,
  `Cargo` varchar(20) COLLATE utf16_spanish_ci NOT NULL,
  `Telefono` varchar(8) COLLATE utf16_spanish_ci NOT NULL,
  `Correo` varchar(50) COLLATE utf16_spanish_ci NOT NULL,
  `Clave` varchar(25) COLLATE utf16_spanish_ci NOT NULL,
  PRIMARY KEY (`IdEmpleado`),
  KEY `IdEmpresaR` (`IdEmpresaR`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresar`
--

DROP TABLE IF EXISTS `empresar`;
CREATE TABLE IF NOT EXISTS `empresar` (
  `IdEmpresaR` varchar(6) COLLATE utf16_spanish_ci NOT NULL,
  `IdCategeoria` int NOT NULL,
  `NombreEmpresa` varchar(50) COLLATE utf16_spanish_ci NOT NULL,
  `Direccion` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `NombreContacto` varchar(25) COLLATE utf16_spanish_ci NOT NULL,
  `Telefono` varchar(8) COLLATE utf16_spanish_ci NOT NULL,
  `Correo` varchar(50) COLLATE utf16_spanish_ci NOT NULL,
  `Rubro` varchar(25) COLLATE utf16_spanish_ci NOT NULL,
  `Comision` decimal(2,2) NOT NULL,
  PRIMARY KEY (`IdEmpresaR`),
  KEY `IdCategoria` (`IdCategeoria`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `empresar`
--

INSERT INTO `empresar` (`IdEmpresaR`, `IdCategeoria`, `NombreEmpresa`, `Direccion`, `NombreContacto`, `Telefono`, `Correo`, `Rubro`, `Comision`) VALUES
('EMP001', 1, 'MAC', 'Empresa de belleza extranjera', 'Lic.Carolina Herrera', '78451232', 'hola123@gmail.com', 'Gerente', '0.99');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE IF NOT EXISTS `venta` (
  `IdVenta` int NOT NULL AUTO_INCREMENT,
  `IdCuponR` varchar(150) COLLATE utf16_spanish_ci NOT NULL,
  `IdCliente` int NOT NULL,
  `Cantidad` int NOT NULL,
  `FechaCompra` date NOT NULL,
  PRIMARY KEY (`IdVenta`),
  KEY `IdCuponR` (`IdCuponR`),
  KEY `IdCliente` (`IdCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

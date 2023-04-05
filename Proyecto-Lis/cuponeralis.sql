-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 05, 2023 at 06:24 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuponeralis`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `IdCategoria` int NOT NULL AUTO_INCREMENT,
  `NombreCategoria` varchar(25) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  PRIMARY KEY (`IdCategoria`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`IdCategoria`, `NombreCategoria`) VALUES
(1, 'Belleza');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`IdCliente`, `Nombres`, `Apellidos`, `Dui`, `Telefono`, `Correo`, `Direccion`, `Clave`, `Estado`, `Token`) VALUES
(1, 'Karletty', 'Elías', '064233796', '71499587', 'karletty.carolina@gmail.com', 'Soyapango', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Activo', '9EDD27'),
(2, 'Anthony', 'Ortega', '987654321', '78956458', 'io.ortega.tony@gmail.com', 'prueba', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Inactivo', '65B600');

-- --------------------------------------------------------

--
-- Table structure for table `cuponr`
--

DROP TABLE IF EXISTS `cuponr`;
CREATE TABLE IF NOT EXISTS `cuponr` (
  `IdCuponR` varchar(50) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `IdEmpresaR` varchar(6) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Titulo` varchar(25) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `PrecioRegular` decimal(7,2) NOT NULL,
  `PrecioOferta` decimal(7,2) NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaFin` date NOT NULL,
  `FechaLimiteUso` date NOT NULL,
  `CantidadLimite` int NOT NULL,
  `Descripcion` varchar(300) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `OtrosDetalles` varchar(300) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Disponibilidad` int NOT NULL,
  `Estado` varchar(25) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `imagen` varchar(300) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `CantidadVendido` int NOT NULL,
  PRIMARY KEY (`IdCuponR`),
  KEY `IdEmpresaR` (`IdEmpresaR`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Dumping data for table `cuponr`
--

INSERT INTO `cuponr` (`IdCuponR`, `IdEmpresaR`, `Titulo`, `PrecioRegular`, `PrecioOferta`, `FechaInicio`, `FechaFin`, `FechaLimiteUso`, `CantidadLimite`, `Descripcion`, `OtrosDetalles`, `Disponibilidad`, `Estado`, `imagen`, `CantidadVendido`) VALUES
('1', '1', 'Cupón de Belleza', '15.99', '13.99', '2023-02-01', '2023-02-28', '2023-03-09', 10, 'Cupon 10/10', 'Canjeable', 10, 'Activo', 'cuponmasaje.jpg', 0),
('3', '1', 'Cupón deRopa', '20.32', '19.50', '2023-02-02', '2023-03-08', '2023-02-01', 15, 'Cupón de ropa sensacional', 'Canjeable fácil, restricciones aplican', 15, 'Activo', 'cuponmasaje.jpg', 0),
('5', '1', 'Cupón de Masajes', '25.00', '23.00', '2023-04-06', '2023-05-11', '2023-06-16', 13, 'El mejor masaje, al mejor precio', 'Fácil uso', 13, 'Activo', 'cuponmasaje.jpg', 0),
('6', '1', 'Cupón prueba', '2.35', '1.99', '2023-04-06', '2023-06-14', '2023-04-13', 20, 'cc', 'cccvv', 20, 'Activo', 'cuponprueba.jpg', 0),
('CUP00001', 'E00001', 'Cupon de Cirugia', '1200.00', '1000.00', '2023-04-06', '2023-03-08', '2023-04-13', 10, 'Cupón 10/10 cirugia', '', 10, 'Activo', 'cuponbelleza.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cuponv`
--

DROP TABLE IF EXISTS `cuponv`;
CREATE TABLE IF NOT EXISTS `cuponv` (
  `IdCuponV` int NOT NULL AUTO_INCREMENT,
  `IdVenta` varchar(15) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `IdCupon` int NOT NULL,
  `IdCliente` varchar(50) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Estado` varchar(15) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  PRIMARY KEY (`IdCuponV`),
  KEY `IdVenta` (`IdVenta`),
  KEY `IdCupon` (`IdCupon`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Dumping data for table `cuponv`
--

INSERT INTO `cuponv` (`IdCuponV`, `IdVenta`, `IdCupon`, `IdCliente`, `Estado`) VALUES
(49, '1-3774036', 3, 'karletty.carolina@gmail.com', 'disponible'),
(48, '1-3003638', 1, 'karletty.carolina@gmail.com', 'disponible'),
(50, '1-0830661', 1, 'Array', 'disponible'),
(51, '1-6548397', 3, 'Array', 'disponible'),
(52, '1-4755117', 3, 'Array', 'disponible'),
(53, '1-1931807', 3, 'Array', 'disponible'),
(54, '1-3712674', 3, 'Array', 'disponible'),
(55, '1-8492378', 1, 'Array', 'disponible'),
(56, '1-6529307', 1, 'Array', 'disponible'),
(57, '1-6566598', 1, 'Array', 'disponible'),
(58, '1-9519943', 1, '1', 'disponible'),
(59, '1-4446783', 1, '1', 'disponible'),
(60, '1-2951610', 3, '1', 'disponible'),
(61, '1-9421390', 3, '1', 'disponible');

-- --------------------------------------------------------

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE IF NOT EXISTS `empleado` (
  `IdEmpleado` int NOT NULL AUTO_INCREMENT,
  `IdEmpresaR` varchar(6) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Nombres` varchar(50) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Apellidos` varchar(50) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Cargo` varchar(20) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Telefono` varchar(8) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Correo` varchar(50) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Clave` varchar(25) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  PRIMARY KEY (`IdEmpleado`),
  KEY `IdEmpresaR` (`IdEmpresaR`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `empresar`
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
  `Rubro` varchar(25) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Comision` decimal(2,2) NOT NULL,
  PRIMARY KEY (`IdEmpresaR`),
  KEY `IdCategoria` (`IdCategeoria`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Dumping data for table `empresar`
--

INSERT INTO `empresar` (`IdEmpresaR`, `IdCategeoria`, `NombreEmpresa`, `Direccion`, `NombreContacto`, `Telefono`, `Correo`, `Rubro`, `Comision`) VALUES
('1', 1, 'MAC', 'Empresa de belleza extranjera', 'Lic.Carolina Herrera', '78451232', 'hola123@gmail.com', 'Gerente', '0.99');

-- --------------------------------------------------------

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE IF NOT EXISTS `venta` (
  `IdVenta` int NOT NULL AUTO_INCREMENT,
  `IdCuponR` int NOT NULL,
  `IdCliente` int NOT NULL,
  `Cantidad` int NOT NULL,
  `FechaCompra` date NOT NULL,
  PRIMARY KEY (`IdVenta`),
  KEY `IdCuponR` (`IdCuponR`),
  KEY `IdCliente` (`IdCliente`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 11, 2023 at 04:43 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`IdCategoria`, `NombreCategoria`) VALUES
(1, 'Estetica'),
(2, 'Automoviles y carrocería'),
(3, 'Comida'),
(4, 'Salud');

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
  `Token` varchar(7) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  PRIMARY KEY (`IdCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`IdCliente`, `Nombres`, `Apellidos`, `Dui`, `Telefono`, `Correo`, `Direccion`, `Clave`, `Estado`, `Token`) VALUES
(3, 'Neivy', 'Acuna', '987321456', '72540178', 'erikaacuna671@gmail.com', 'vvvv', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Activo', '1AB519'),
(5, 'aby', 'Ortega', '987654321', '78956458', 'acuaabigail@yahoo.com', 'prueba', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Inactivo', 'B162C6'),
(6, 'Anthony', 'Ortega', '987654321', '78956458', 'io.ortega.tony@gmail.com', 'prueba', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Activo', '77C957');

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
-- Dumping data for table `cuponr`
--

INSERT INTO `cuponr` (`IdCuponR`, `IdEmpresaR`, `Titulo`, `PrecioRegular`, `PrecioOferta`, `PrecioCupon`, `FechaInicio`, `FechaFin`, `FechaLimiteUso`, `Descripcion`, `OtrosDetalles`, `Disponibilidad`, `imagen`, `CantidadVendido`, `Estado`) VALUES
('CUP0001', 'EMP001', 'Limpieza facial', '130.00', '20.00', '1.25', '2023-04-01', '2023-05-14', '2023-05-19', '¡Paga $20 en Lugar de $130 por 2 Sesiones de Limpieza Facial', 'Canjeable', 20, 'facial.jpg', 0, 1),
('CUP0002', 'EMP002', 'Lavado de tapiceria', '38.00', '18.50', '1.25', '2023-03-02', '2023-05-16', '2023-06-14', '¡Paga $18.50 en Lugar de $38 por Lavado de Tapicería de Vehículo a Domicilio!', 'Canjeable fácil, restricciones aplican', 15, 'tapiceria.jpg', 0, 1),
('CUP0003', 'EMP003', 'Polarizado', '62.00', '30.00', '1.25', '2023-04-06', '2023-05-13', '2023-06-16', '¡Paga $30 en Lugar de $62 po', 'Fácil uso', 30, 'polarizado.jpg', 0, 1),
('CUP0004', 'EMP004', 'Corte de cabello', '36.00', '10.00', '1.25', '2023-05-21', '2023-06-14', '2023-06-29', '¡Paga $10 en Lugar de $36 por Paquetes de Servicios a Elección: A) 4 Lavados + 4 Cortes de Cabello + 4 Aplicaciones de Cera o Gel o B) 3 Cortes de Cabello + 3 Lavados + 1 Corte y 1 Lavado de Barba!', 'Puedes compartir tu cupón con quien quieras', 10, 'barberia.jpg', 0, 1),
('CUP0005', 'EMP005', 'Banquete de costillas', '61.86', '39.95', '1.25', '2023-04-06', '2023-05-14', '2023-06-08', 'Banquete Ribs & BBQ para 4 personas: Smokehouse + Pulled Pork Nachos + Flavored Limonade', 'Ricas costillas BBQ', 29, 'costillas.jpg', 0, 1),
('CUP0006', 'EMP006', 'Taquiza', '22.95', '11.45', '1.25', '2023-05-06', '2023-06-18', '2023-06-30', '¡Paga $11.50 en Lugar de $22.9', 'Taquiza con 12 tacos de tortilla doble con queso fundido y carne de tu elección', 12, 'tacos.jpg', 0, 1),
('CUP0007', 'EMP007', 'Examenes de laboratorio', '147.50', '18.00', '1.25', '2023-04-08', '2023-05-09', '2023-05-09', '¡Paga $18 en Lugar de $14', '28 exámenes de laboratorio que evaluarán los problemas más habituales de salud', 14, 'laboratorio.jpg', 0, 1),
('CUP0009', 'EMP008', 'Titulo Prueba', '23.69', '24.12', '23.69', '2023-05-11', '2023-05-11', '2023-05-11', 'Descripcion Prueba', 'Detalles Prueba', 12, 'uñas.jpg', 0, 6),
('CUP0008', 'EMP008', 'Titulo Pruebaaaaaa', '23.69', '24.12', '24.12', '2023-05-18', '2023-05-18', '2023-05-18', 'Descripcion Prueba', 'Detalles Prueba', 10, 'tapiceria.jpg', 2, 1),
('CUP0015', 'EMP008', 'Titulo Pruebaaaaaa', '23.69', '24.12', '23.69', '2023-05-20', '2023-05-27', '2023-05-30', 'Descripcion Prueba', 'Detalles Prueba', 12, 'masajes.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cuponv`
--

DROP TABLE IF EXISTS `cuponv`;
CREATE TABLE IF NOT EXISTS `cuponv` (
  `IdCuponV` varchar(150) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `IdVenta` varchar(15) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `IdCupon` varchar(150) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `IdCliente` varchar(50) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Estado` int NOT NULL,
  PRIMARY KEY (`IdCuponV`),
  KEY `IdVenta` (`IdVenta`),
  KEY `IdCupon` (`IdCupon`),
  KEY `Estado` (`Estado`)
) ENGINE=MyISAM AUTO_INCREMENT=128856421 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Dumping data for table `cuponv`
--

INSERT INTO `cuponv` (`IdCuponV`, `IdVenta`, `IdCupon`, `IdCliente`, `Estado`) VALUES
('EMP0085563324', '128', 'CUP0008', '6', 1),
('EMP0084002940', '128', 'CUP0008', '6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE IF NOT EXISTS `empleado` (
  `IdEmpleado` varchar(100) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `IdEmpresaR` varchar(6) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Nombres` varchar(50) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Apellidos` varchar(50) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Telefono` varchar(8) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Rol` int NOT NULL,
  PRIMARY KEY (`IdEmpleado`),
  KEY `IdEmpresaR` (`IdEmpresaR`),
  KEY `Rol` (`Rol`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Dumping data for table `empleado`
--

INSERT INTO `empleado` (`IdEmpleado`, `IdEmpresaR`, `Nombres`, `Apellidos`, `Telefono`, `email`, `password`, `Rol`) VALUES
('TRA001', 'EMP008', 'Abby', 'Ortega', '78904523', 'acuaabigail@yahoo.com', '7fc3c90ecca98ae5f94cb1a0698e191d9eaafed6f912f0d84d87ccbb346cb577', 3);

--
-- Triggers `empleado`
--
DROP TRIGGER IF EXISTS `empleado_delete_trigger`;
DELIMITER $$
CREATE TRIGGER `empleado_delete_trigger` AFTER DELETE ON `empleado` FOR EACH ROW BEGIN
  DELETE FROM usuarios WHERE Email = OLD.Email;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `empleado_insert_trigger`;
DELIMITER $$
CREATE TRIGGER `empleado_insert_trigger` AFTER INSERT ON `empleado` FOR EACH ROW BEGIN
  INSERT INTO usuarios (Email, Password, Rol, Password_c)
  VALUES (NEW.Email, NEW.Password, 3, 0); -- Asigna el rol correspondiente para empleados (2)
END
$$
DELIMITER ;

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
  `Email` varchar(50) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Comision` decimal(2,2) NOT NULL,
  `Password` varchar(200) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Rol` int NOT NULL,
  PRIMARY KEY (`IdEmpresaR`),
  KEY `IdCategoria` (`IdCategeoria`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Dumping data for table `empresar`
--

INSERT INTO `empresar` (`IdEmpresaR`, `IdCategeoria`, `NombreEmpresa`, `Direccion`, `NombreContacto`, `Telefono`, `Email`, `Comision`, `Password`, `Rol`) VALUES
('EMP005', 3, 'Porkys', 'Carretera de Oro', 'Freddy Treminio', '65789780', 'porkyporky@gmail.com', '0.50', 'fcf9dfa0cc2a315c998397574f0a134e23488a3ffe8b3e0099d59cec5cceaf74', 2),
('EMP004', 1, 'Machos Barbershop', 'Calle La Sultana', 'Alexander Martinez', '71247845', 'machos@gmail.com', '0.80', '1b433e62aeeb1859ec07ffb491eb16bf75436832ae3df04f902b09b1bf4c9a2e', 2),
('EMP003', 2, 'V-Kooler', 'Final, C. La Mascota 986, San Salvador', 'Anthony Ortega', '78965282', 'vkooler@gmail.com', '0.90', '502b57329c7758a53531b74ebc0b2503b5f3fe9d2c9566352feb276c32f77816', 2),
('EMP002', 2, 'CyC Carwash', 'Calle 29 de Noviembre', 'Juan Garcia', '65438765', 'cyccarwash@gmail.com', '0.70', 'f2a0790aa7a6181d4cb9e9c50438f6c32ce4b3b419d56f35ad4dad57e47612b9', 2),
('EMP001', 1, 'Clinica Beauty', 'Colonia Escalón', 'Sol Leon', '71245765', 'clinicabeauty@gmail.com', '0.80', 'e2367dcfb92268df50b041025bd81b917a26f5bd745b75096afa77aa9eff0f5e', 2),
('EMP006', 3, 'LocoLoco', 'Zona Rosa', 'Abigail Melara', '75643212', 'locoloco@gmail.com', '0.60', 'b8aeb03384cbe321da8b44443df3ab044dda264aa1c6b10d1e60c6c804882560', 2),
('EMP007', 4, 'Laboratorio Clinico Naron', 'Edificios Morados', 'Katherine Saravia', '78904321', 'clinicanaron@gmail.com', '0.58', '8912f11a6c7b703a8f5f7bcba0e7941dd10e4209411b673613faa322eb7b63de', 2),
('EMP008', 1, 'Empresa de prueba', 'Tucora', 'Yo', '78904523', 'io.ortega.tony@gmail.com', '0.80', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 2);

--
-- Triggers `empresar`
--
DROP TRIGGER IF EXISTS `empresar_delete_trigger`;
DELIMITER $$
CREATE TRIGGER `empresar_delete_trigger` AFTER DELETE ON `empresar` FOR EACH ROW BEGIN
  DELETE FROM usuarios WHERE Email = OLD.Email;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `empresar_insert_trigger`;
DELIMITER $$
CREATE TRIGGER `empresar_insert_trigger` AFTER INSERT ON `empresar` FOR EACH ROW BEGIN
  INSERT INTO usuarios (Email, Password, Rol, Password_c)
  VALUES (NEW.Email, NEW.Password, 2, 0); -- Asigna el rol correspondiente para empresas (2)
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `estadocupon`
--

DROP TABLE IF EXISTS `estadocupon`;
CREATE TABLE IF NOT EXISTS `estadocupon` (
  `IdEstado` int NOT NULL,
  `NombreEstado` varchar(50) NOT NULL,
  PRIMARY KEY (`IdEstado`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `estadocupon`
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
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `IdRol` int NOT NULL,
  `NombreRol` varchar(50) NOT NULL,
  PRIMARY KEY (`IdRol`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`IdRol`, `NombreRol`) VALUES
(1, 'Administrador'),
(2, 'AdministradorEmpresa'),
(3, 'Empleado'),
(4, 'Clientes');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Rol` int NOT NULL,
  `Email` varchar(50) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Password` varchar(200) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `Password_c` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Rol` (`Rol`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Rol`, `Email`, `Password`, `Password_c`) VALUES
(1, 1, 'Administrador', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1),
(2, 2, 'AdministradorEmpresa', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 0),
(3, 3, 'Empleado', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1),
(14, 3, 'acuaabigail@yahoo.com', '7fc3c90ecca98ae5f94cb1a0698e191d9eaafed6f912f0d84d87ccbb346cb577', 0),
(13, 2, 'io.ortega.tony@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1);

--
-- Triggers `usuarios`
--
DROP TRIGGER IF EXISTS `usuario_update_password_trigger`;
DELIMITER $$
CREATE TRIGGER `usuario_update_password_trigger` AFTER UPDATE ON `usuarios` FOR EACH ROW BEGIN
  IF NEW.Password <> OLD.Password THEN
    -- Actualizar en la tabla empleado
    UPDATE empleado SET Password = NEW.Password WHERE Email = NEW.Email;
    -- Actualizar en la tabla empresar
    UPDATE empresar SET Password = NEW.Password WHERE Email = NEW.Email;
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE IF NOT EXISTS `venta` (
  `IdVenta` int NOT NULL AUTO_INCREMENT,
  `IdCuponR` varchar(150) CHARACTER SET utf16 COLLATE utf16_spanish_ci NOT NULL,
  `IdCliente` int NOT NULL,
  `Cantidad` int NOT NULL,
  `FechaCompra` date NOT NULL,
  PRIMARY KEY (`IdVenta`),
  KEY `IdCuponR` (`IdCuponR`),
  KEY `IdCliente` (`IdCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Dumping data for table `venta`
--

INSERT INTO `venta` (`IdVenta`, `IdCuponR`, `IdCliente`, `Cantidad`, `FechaCompra`) VALUES
(128, 'CUP0008', 6, 2, '2023-05-11');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

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
CREATE DATABASE `cuponeralis`;
USE `cuponeralis`;
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
(1, 'Estetica'),
(2, 'Automoviles y carrocería'),
(3, 'Comida'),
(4, 'Salud');

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
  `PrecioCupon` decimal(7,2) NOT NULL,
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

INSERT INTO `cuponr` (`IdCuponR`, `IdEmpresaR`, `Titulo`, `PrecioRegular`, `PrecioOferta`,`PrecioCupon`, `FechaInicio`, `FechaFin`, `FechaLimiteUso`, `Descripcion`, `OtrosDetalles`, `Disponibilidad`, `Estado`, `imagen`, `CantidadVendido`) VALUES
('CUP0001', 'EMP001', 'Limpieza facial', '130.00', '20.00', '1.25' , '2023-04-01', '2023-02-28', '2023-03-09', '¡Paga $20 en Lugar de $130 por 2 Sesiones de Limpieza Facial Profunda con: 1 Microdermoabrasión con Punta de Diamante + 1 Extracción de Puntos Negros con Vapor de Ozono + 2 Exfoliaciones + 2 Aplicaciones de Serum + 2 Crioterapias y Más!', 'Canjeable', 15, 'Activo', 'facial.jpg', 0),
('CUP0002', 'EMP002', 'Lavado de tapiceria', '38.00', '18.50', '1.25' ,'2023-03-02', '2023-05-14', '2023-06-14', '¡Paga $18.50 en Lugar de $38 por Lavado de Tapicería de Vehículo a Domicilio!', 'Canjeable fácil, restricciones aplican', 11, 'Activo', 'tapiceria.jpg', 0),
('CUP0003', 'EMP003', 'Polarizado', '62.00', '30.00','1.25' , '2023-04-06', '2023-05-11', '2023-06-16', '¡Paga $30 en Lugar de $62 por Polarizado Automotriz con Garantía de 6 Meses + Pulido de Silvines + Car Wash Completo (Lavado, Aspirado y Pasteado a Mano) + Revisión de 21 Puntos!', 'Fácil uso', 20, 'Activo', 'polarizado.jpg', 0),
('CUP0004', 'EMP004', 'Corte de cabello', '36.00', '10.00', '1.25' ,'2023-04-06', '2023-06-14', '2023-04-13', '¡Paga $10 en Lugar de $36 por Paquetes de Servicios a Elección: A) 4 Lavados + 4 Cortes de Cabello + 4 Aplicaciones de Cera o Gel o B) 3 Cortes de Cabello + 3 Lavados + 1 Corte y 1 Lavado de Barba!', 'Puedes compartir tu cupón—la oportunidad perfecta para pasar un rato agradable entre machos con tu papá, tu hijo, tu mejor amigo o quien quieras.', 15, 'Activo', 'barberia.jpg', 0),
('CUP0005', 'EMP005', 'Banquete de costillas', '61.86', '39.95','1.25' , '2023-04-06', '2023-03-08', '2023-04-13', 'Banquete Ribs & BBQ para 4 personas: Smokehouse + Pulled Pork Nachos + Flavored Limonade', '', 29, 'Activo', 'costillas.jpg', 0),
('CUP0006', 'EMP006', 'Taquiza', '22.95', '11.45','1.25' , '2023-04-06', '2023-03-08', '2023-04-13', '¡Paga $11.50 en Lugar de $22.95 por Taquiza que Incluye: 1 Libra de Carne a Elección entre Pollo, Pastor, Hawaiana o Mixta + 12 Tacos de Doble Tortilla con Queso Fundido + 4 Caldos de Birria + Acompañamientos!', 'Taquiza con 12 tacos de tortilla doble con queso fundido y carne de tu elección—pollo, pastor, hawaiana o mixta. Todos acompañados de su chimol y sus ricas salsas picantes y no picantes, incluye 4 deliciosos caldos de birria.', 16, 'Activo', 'tacos.jpg', 0),
('CUP0007', 'EMP007', 'Examenes de laboratorio', '147.50', '18.00','1.25' , '2023-04-08', '2023-05-09', '2023-05-09', '¡Paga $18 en Lugar de $147.50 por 28 Exámenes de Laboratorio Clínico: Glucosa, Colesterol, Trigliceridos, Creatinina y Más!', '28 exámenes de laboratorio que evaluarán los problemas más habituales de salud y que son un riesgo para tu vida: enfermedades cardiovasculares, sobrepeso, niveles de colesterol elevados, mala circulación, artritis, hipertensión arterial o diabetesa.', 16, 'Activo', 'laboratorio.jpg', 0),
('CUP0008', 'EMP008', 'Masajes ', '147.50', '18.00','1.25' , '2023-04-08', '2023-05-09', '2023-05-09', '¡Paga $19.20 en Lugar de $60 por 2 Masajes Relajantes + 2 Masajes de Piedras Calientes + 2 Masajes Craneofacial + 2 Reflexologías!', 'Cada sesión tiene una duración de 45 minutos. Si quieres puedes compartir el cupón o disfrutar tu solo de ambas sesiones, los aceites utilizados en los masajes son 100% naturales extraídos del Mar Muerto en Israel—una combinación de minerales que nutren la piel, mientras te relajas.', 10, 'Activo', 'masajes.jpg', 0);

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
('EMP001', 1, 'Clínica Dra Pamela Rodríguez', 'Medicentro Plaza, Colonia Medica Local 19, Nivel 1', 'Lic.Carolina Herrera', '78451232', 'hola123@gmail.com', 'Secretaria', '0.99'),
('EMP002', 2, 'Multiservicios A W', '33 av. Norte residencial decapoli. Centro comercial metro ganga, San Salvador, El Salvador', 'Fernando Bonilla', '72346789', 'febonilla@gmail.com', 'Empleado', '0.75'),
('EMP003', 2, 'Taller Gran Turismo El Salvador', 'Calle Chiltiupan, Santa Tecla, El Salvador Santa Tecla (El Salvador), Departamento de La Libertad', 'Melvin Carias', '79357645', 'carias04@gmail.com', 'Gerente', '0.64'),
('EMP004', 1, 'Machos Barber Shop', 'PQ47+JPR, San Salvador', 'Gerardo Palacios', '65786543', 'gerardo33@gmail.com', 'Gerente', '0.80'),
('EMP005', 3, 'Ribs & Bones', 'Centro Comercial Multiplaza, Primer nivel, Las Terrazas, Antiguo Cuscatlán, La Libertad, El Salvado', 'Daniela Rivas', '78652134', 'danrivas23@gmail.com', 'Gerente', '0.85'),
('EMP006', 3, 'Las Trajineras', '79 Av Sur 455, San Salvador', 'Gabriela Romero', '78652134', 'gaby02@gmail.com', 'Gerente', '0.75'),
('EMP007', 4, 'Laboratorio Clinico Jireh', '85 Avenida Norte, local 3 C Paseo General Escalón Col. Escalón, San Salvador 0016-800\r\nMostra', 'Daniela Anzora', '77634576', 'anzora12@gmail.com', 'Recepcionista', '0.88'),
('EMP008', 4, 'Mar de Vida Minerales y Spa', '79 Av. Norte, Plaza Maya Cristal local 9 Colonia Escalon, San Salvador 0016800', 'Marcos Granillo', '78654321', 'mbeat05@gmail.com', 'Encargado de marketing', '0.80');

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

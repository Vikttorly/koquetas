-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-08-2016 a las 21:11:15
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `koquetas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `cedula` int(8) NOT NULL,
  `nombre` text,
  `telefono` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compraproducto`
--

CREATE TABLE IF NOT EXISTS `compraproducto` (
`id` int(5) NOT NULL,
  `proveedor` int(5) DEFAULT NULL,
  `producto` int(5) DEFAULT NULL,
  `fechaAdquisicion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cantidad` int(4) DEFAULT NULL,
  `precio` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
`idFactura` int(7) NOT NULL,
  `idProducto` int(5) DEFAULT NULL,
  `idUsuario` int(2) DEFAULT NULL,
  `cliente` int(8) DEFAULT NULL,
  `monto` float DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
`idProducto` int(5) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `precio` float DEFAULT NULL,
  `existencia` int(4) DEFAULT NULL,
  `fechaAdquisicion` date DEFAULT NULL,
  `proveedor` int(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombre`, `precio`, `existencia`, `fechaAdquisicion`, `proveedor`) VALUES
(1, 'colitas', 1.332, 123, '2016-08-09', 2),
(2, 'labial', 1.3231, 23123, '2016-08-09', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
`idProveedor` int(4) NOT NULL,
  `nombre` varchar(90) DEFAULT NULL,
  `rif` varchar(15) NOT NULL,
  `telefono1` int(11) DEFAULT NULL,
  `telefono2` int(11) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `nombre`, `rif`, `telefono1`, `telefono2`, `direccion`) VALUES
(1, 'qweqweqwe', '123123', 1231231, 0, '3qweqweq'),
(2, '123123123121e12e', 'qweqweqwe', 2147483647, 0, 'qweqweqwe'),
(3, '12312312312eqwqweqw', '123123', 312312312, 0, 'qweqweqwe'),
(4, 'qweqweqweqwe', '1231213123', 2147483647, 0, '123123123qeqweqwe'),
(5, 'wqeqweqweqwe', '12312312e', 123123123, 0, '1eqweqweqwe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`idUsuario` int(2) NOT NULL,
  `nombre` text,
  `clave` varchar(45) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `privilegios` char(1) DEFAULT NULL,
  `pSecreta` varchar(45) DEFAULT NULL,
  `rSecreta` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `clave`, `usuario`, `privilegios`, `pSecreta`, `rSecreta`) VALUES
(1, 'admin', '123456', 'admin', 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventaproducto`
--

CREATE TABLE IF NOT EXISTS `ventaproducto` (
  `idProducto` int(5) DEFAULT NULL,
  `idFactura` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `compraproducto`
--
ALTER TABLE `compraproducto`
 ADD PRIMARY KEY (`id`), ADD KEY `proveedor` (`proveedor`), ADD KEY `producto` (`producto`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
 ADD PRIMARY KEY (`idFactura`), ADD KEY `idUsuario` (`idUsuario`), ADD KEY `cliente` (`cliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
 ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
 ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `ventaproducto`
--
ALTER TABLE `ventaproducto`
 ADD KEY `idProducto` (`idProducto`), ADD KEY `idFactura` (`idFactura`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compraproducto`
--
ALTER TABLE `compraproducto`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
MODIFY `idFactura` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
MODIFY `idProducto` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
MODIFY `idProveedor` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `idUsuario` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

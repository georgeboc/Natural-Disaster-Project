-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Servidor: sql102.arredemo.org
-- Tiempo de generación: 25-01-2016 a las 10:12:46
-- Versión del servidor: 5.6.27-76.0
-- Versión de PHP: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `adm_14010438_DB`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tabla`
--

CREATE TABLE IF NOT EXISTS `Tabla` (
  `Longitud` varchar(99) NOT NULL,
  `Latitud` varchar(99) NOT NULL,
  `DesastreNatural` varchar(99) NOT NULL,
  `Intensidad` int(3) NOT NULL,
  `IP` varchar(99) NOT NULL,
  `Tiempo` varchar(99) NOT NULL,
  `LocalizacionIMG` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Tabla`
--

INSERT INTO `Tabla` (`Longitud`, `Latitud`, `DesastreNatural`, `Intensidad`, `IP`, `Tiempo`, `LocalizacionIMG`) VALUES
('41.608519', '0.6242388', 'Incendio Forestal', 98, '213.143.48.190', 'February 22, 2014, 5:59 am', ''),
('41.608519', '0.6242388', 'Incendio Forestal', 98, '213.143.48.190', 'February 22, 2014, 5:59 am', ''),
('56.6', '41.2', 'Incendio Forestal', 86, '91.126.253.158', 'January 14, 2014, 7:13 am', 'incendio1.jpg'),
('34.45', '23.1', 'Incendio Forestal', 80, '91.126.253.158', 'January 14, 2014, 7:13 am', 'incendiosforestal.jpg.jpeg'),
('41.23', '23.56', 'Huracan', 75, '91.126.253.158', 'January 14, 2014, 7:09 am', 'huracan1.jpg'),
('41.608519', '0.6242388', 'Incendio Forestal', 98, '213.143.48.190', 'February 22, 2014, 5:58 am', ''),
('41.608519', '0.6242388', 'Incendio Forestal', 98, '213.143.48.190', 'February 22, 2014, 5:58 am', ''),
('41.60884', '0.6242388', 'Huracan', 50, '193.144.12.12', 'February 22, 2014, 5:41 am', ''),
('41.60884', '0.6242388', 'Huracan', 50, '193.144.12.12', 'February 22, 2014, 5:41 am', ''),
('41.60451', '0.6242388', 'Inundacion', 75, '95.21.231.138', 'February 22, 2014, 4:55 pm', ''),
('41.60451', '0.6242388', 'Inundacion', 75, '95.21.231.138', 'February 22, 2014, 4:55 pm', ''),
('44.9', '56.1', 'Incendi', 10, '91.126.253.158', 'March 4, 2014, 4:44 am', ''),
('44.6', '55.1', 'Inundacion', 100, '91.126.253.158', 'March 4, 2014, 4:44 am', ''),
('56.2', '5.1', 'Incendi', 20, '91.126.253.158', 'March 4, 2014, 4:44 am', ''),
('56.2', '5.1', 'Incendi', 20, '91.126.253.158', 'March 4, 2014, 4:44 am', ''),
('56.2', '5.1', 'Incendi', 20, '91.126.253.158', 'March 4, 2014, 4:44 am', ''),
('56.2', '5.1', 'Incendi', 20, '91.126.253.158', 'March 4, 2014, 4:44 am', ''),
('56.2', '5.1', 'Incendi', 20, '91.126.253.158', 'March 4, 2014, 4:44 am', ''),
('56.2', '5.1', 'Incendi', 20, '91.126.253.158', 'March 4, 2014, 4:44 am', ''),
('56.2', '5.1', 'Incendi', 20, '91.126.253.158', 'March 4, 2014, 4:44 am', ''),
('56.2', '5.1', 'Incendi', 20, '91.126.253.158', 'March 4, 2014, 4:44 am', ''),
('56.2', '5.1', 'Incendi', 20, '91.126.253.158', 'March 4, 2014, 4:44 am', ''),
('56.2', '5.1', 'Incendi', 20, '91.126.253.158', 'March 4, 2014, 4:44 am', ''),
('56.2', '5.1', 'Incendi', 20, '91.126.253.158', 'March 4, 2014, 4:44 am', ''),
('56.2', '5.1', 'Incendi', 20, '91.126.253.158', 'March 4, 2014, 4:44 am', ''),
('56.2', '5.1', 'Incendi', 20, '91.126.253.158', 'March 4, 2014, 4:44 am', ''),
('56.2', '5.1', 'Incendi', 20, '91.126.253.158', 'March 4, 2014, 4:44 am', ''),
('56.2', '5.1', 'Incendi', 20, '91.126.253.158', 'March 4, 2014, 4:44 am', ''),
('56.2', '5.1', 'Incendi', 20, '91.126.253.158', 'March 4, 2014, 4:44 am', ''),
('56.2', '5.1', 'Incendi', 20, '91.126.253.158', 'March 4, 2014, 4:44 am', ''),
('56.2', '5.1', 'Incendi', 20, '91.126.253.158', 'March 4, 2014, 4:44 am', ''),
('56.2', '5.1', 'Incendi', 20, '91.126.253.158', 'March 4, 2014, 4:44 am', ''),
('56.2', '5.1', 'Incendi', 20, '91.126.253.158', 'March 4, 2014, 4:44 am', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

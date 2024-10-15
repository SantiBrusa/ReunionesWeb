-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 25-08-2024 a las 15:39:14
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
-- Base de datos: `db_laschilcas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoteleros`
--

DROP TABLE IF EXISTS `hoteleros`;
CREATE TABLE IF NOT EXISTS `hoteleros` (
  `cod` int NOT NULL AUTO_INCREMENT,
  `lasChilcas` int NOT NULL,
  `laBuenaEstrella` int NOT NULL,
  `sumaj` int NOT NULL,
  `llantay` int NOT NULL,
  `umpy` int NOT NULL,
  `ruay` int NOT NULL,
  `petroGruta` int NOT NULL,
  `noa` int NOT NULL,
  `quickfood` int NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_bioind`
--

DROP TABLE IF EXISTS `tb_bioind`;
CREATE TABLE IF NOT EXISTS `tb_bioind` (
  `cod` int NOT NULL AUTO_INCREMENT,
  `ltsalcohol` float NOT NULL,
  `biogas` float NOT NULL,
  `ic` float NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cerdos`
--

DROP TABLE IF EXISTS `tb_cerdos`;
CREATE TABLE IF NOT EXISTS `tb_cerdos` (
  `cod` int NOT NULL AUTO_INCREMENT,
  `destetados` float NOT NULL,
  `pesoventa` float NOT NULL,
  `preciocapon` float NOT NULL,
  `costokg` float NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_feedlot`
--

DROP TABLE IF EXISTS `tb_feedlot`;
CREATE TABLE IF NOT EXISTS `tb_feedlot` (
  `cod` int NOT NULL AUTO_INCREMENT,
  `ingresos` float NOT NULL,
  `egresos` float NOT NULL,
  `indiceocup` float NOT NULL,
  `porMortandad` float NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_semana`
--

DROP TABLE IF EXISTS `tb_semana`;
CREATE TABLE IF NOT EXISTS `tb_semana` (
  `cod` int NOT NULL AUTO_INCREMENT,
  `semana` varchar(15) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

DROP TABLE IF EXISTS `tb_usuarios`;
CREATE TABLE IF NOT EXISTS `tb_usuarios` (
  `cod` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`cod`, `username`, `password`) VALUES
(10, 'martabrusadin', '27868951');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

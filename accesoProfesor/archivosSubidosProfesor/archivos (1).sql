-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2022 a las 20:46:12
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alumnos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `archivo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`user_id`, `name`, `titulo`, `archivo`) VALUES
(2, 'henry.cantoral', 'Despliegue', 'Despliegue.pdf'),
(2, 'henry.cantoral', 'Despliegue', 'Despliegue.pdf'),
(2, 'henry.cantoral', 'Despliegue', 'Despliegue.pdf'),
(2, 'henry.cantoral', 'Despliegue', 'Despliegue.pdf'),
(2, 'henry.cantoral', 'Despliegue', 'Despliegue.pdf'),
(2, 'henry.cantoral', 'Despliegue', 'Despliegue.pdf'),
(2, 'henry.cantoral', 'Despliegue', 'Despliegue.pdf');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

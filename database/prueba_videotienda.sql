-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-05-2019 a las 06:31:06
-- Versión del servidor: 5.7.26-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba_videotienda`
--
CREATE DATABASE IF NOT EXISTS `prueba_videotienda` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `prueba_videotienda`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `sinopsis` varchar(45) DEFAULT NULL,
  `anio` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `titulo`, `sinopsis`, `anio`) VALUES
(1, 'Terminator', 'La super sinopsis                        ', '1984'),
(2, 'Karate Kid', 'La super sinopsis                        ', '1984'),
(4, 'Gremlinss', 'Sinopsis                                     ', '1984'),
(5, 'Indiana Jones el Templo Maldito', 'Sinopsis                        ', '1984'),
(6, 'Volver al futuro', 'Sinopsis                        ', '1985'),
(8, 'Africa Mia', 'obs                        ', '1985'),
(9, 'Cocoon', 'obs                        ', '1985'),
(10, 'Rambo 2', 'Obs                        ', '1985'),
(11, 'La mosca', 'obs', '1986'),
(12, 'Vengadores Juego Final', '           Los vengadores             ', '2019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nickname` varchar(50) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nickname`, `nombre`, `password`) VALUES
('Administrador', 'Harold', '80a92f0efca942d67809dbcb3acae7a9');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nickname`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

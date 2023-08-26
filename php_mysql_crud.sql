-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-08-2023 a las 06:47:52
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_mysql_crud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE `formulario` (
  `id` int(11) NOT NULL,
  `dni` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `edad` int(11) NOT NULL,
  `fecha_nac` date NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`id`, `dni`, `nombre`, `apellido`, `edad`, `fecha_nac`, `estado`) VALUES
(38, '11111111111', '1111111', '', 1111111, '2011-11-11', 0),
(39, 'prueba', 'prueba', '', 0, '0000-00-00', 0),
(40, 'aaaaaaaaaaa', 'aaaaaaaaa', '', 0, '0000-00-00', 0),
(42, '111111', '11111111', '', 11111111, '2011-11-01', 0),
(43, '222222222222', '222222222', '', 222222222, '0000-00-00', 0),
(44, '33333333', '333333333', '', 33333333, '0000-00-00', 0),
(45, '222222', '222222', '', 2, '0000-00-00', 0),
(47, '22222222222222222222', '2222222222', '', 2222222, '0000-00-00', 0),
(49, '44444', '4444', '444', 4444, '2023-08-24', 0),
(62, '5555', '5', '5', 5, '2023-08-25', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`id`, `titulo`, `descripcion`, `creacion`) VALUES
(2, 'aa', 'aaaaa', '2023-07-04 13:41:40'),
(3, 'aa', 'aaaaa', '2023-07-04 13:43:08'),
(4, 'aaa', 'eeeeeeee', '2023-07-04 13:43:13'),
(5, 'prueba', '1', '2023-07-04 13:43:43'),
(6, '', '', '2023-07-04 14:08:48'),
(7, '', '', '2023-07-04 14:09:17'),
(8, 'aa', 'aa', '2023-07-04 14:09:22'),
(9, 'aa', 'aa', '2023-07-04 14:10:23'),
(10, 'aa', 'aa', '2023-07-04 14:12:29'),
(11, 'aa', 'aa', '2023-07-04 14:13:30'),
(12, 'aa', 'aa', '2023-07-04 14:14:49'),
(13, 'AA', 'AA', '2023-07-04 14:14:59'),
(14, '767', '77', '2023-07-04 14:16:26'),
(15, 'aa', 'aaaa', '2023-07-04 14:16:59'),
(16, 'aa', 'aa', '2023-07-04 14:20:05'),
(17, 'aa', 'aa', '2023-07-04 14:20:57'),
(18, 'aa', 'a', '2023-07-04 14:24:11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `formulario`
--
ALTER TABLE `formulario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

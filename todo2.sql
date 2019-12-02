-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2019 a las 02:06:55
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `todo2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(11) NOT NULL,
  `tareas` varchar(30) NOT NULL,
  `finalizada` tinyint(1) NOT NULL,
  `FechaCreada` date NOT NULL,
  `FechaFinalizada` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `tareas`, `finalizada`, `FechaCreada`, `FechaFinalizada`) VALUES
(69, 'quimica    ', 1, '2019-11-05', '0000-00-00'),
(71, 'quimica ', 0, '2019-11-04', '0000-00-00'),
(72, 'quimica  50 ', 1, '2019-11-04', '0000-00-00'),
(73, 'quimica  50', 1, '2019-11-14', NULL),
(74, 'mate3', 1, '2019-11-14', NULL),
(75, 'quimica', 1, '2019-11-14', NULL),
(76, 'mate3', 0, '2019-11-14', NULL),
(77, 'mate4', 1, '2019-11-14', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `contrasenia` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nombre_completo` varchar(20) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre_usuario`, `contrasenia`, `email`, `nombre_completo`, `fecha`) VALUES
(26, 'mai', '$2y$10$qRMfF1mGmdxQw', 'mairasaideduarte@hotmail.es', 'maira duarte', '2019-11-06'),
(27, 'franco', '$2y$10$R4noel61fCCcWO.lKwYPAevmqtVK/0/Ft3zQjCoELV7DFASEfC1zi', 'mairasaideduarte@hotmail.es', 'maira duarte', '2019-11-07'),
(64, 'my', '$2y$10$T9R4MUUD/1XxLhLzT0alPuZuMXildXdtNAAetLTiBMF7sJrjbQKCi', 'mairasaideduarte@hotmail.es', 'maira duarte', '2019-11-15'),
(65, 'mau', '$2y$10$nE2T3j5meEBHOzMQJdJuWOlV9yOjlO8CllefVCOe.MvlXL5Kx7Rmi', 'mairasaideduarte@hotmail.es', 'maira duarte', '2019-11-15'),
(66, 'patri', '$2y$10$TeMX5Ugnh0fl1CV7iYNGKO5nWUWW9rO/3ECzIzxW1L21KYTN6oU.i', 'mairasaideduarte@hotmail.es', 'maira duarte', '2019-11-15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

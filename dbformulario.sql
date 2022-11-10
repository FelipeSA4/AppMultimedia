-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2022 a las 07:37:18
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbformulario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_form`
--

CREATE TABLE `tabla_form` (
  `id` int(5) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(35) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `correo` varchar(35) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tabla_form`
--

INSERT INTO `tabla_form` (`id`, `nombre`, `apellido`, `usuario`, `correo`, `password`) VALUES
(1, 'Felipe', 'Santiago Aguilar', 'Felipe44', 'felipe@gmail.com', '$2y$10$kiw9yxIbpSEuMcWM28z7QOF3.YIXEdjVKMs13kNjOREyqlRfoIN8m'),
(2, 'Santiago', 'Martines Sanches', 'Santiago11', 'santiago@gmail.com', '$2y$10$OsGg1iYrsOuDLW5GmLh/Huy0Wi2nr68WsTPw6HQGux5/DqJUwGxsm'),
(3, 'Luis ', 'Mendoza Gonzales', 'Luis44', 'luis@gmail.com', '$2y$10$Wp2furWMmVmrzSJpRvR8V.cLSI0wjrbjHP/9GGVsgr3lN.MYN14l2'),
(4, 'Felipe', 'Martines Sanches', 'Felipe4', 'felipe1@gmail.com', '$2y$10$yBTgRmA679YSNzeX30SO/uUchB/PqQ62HGZA.z0EWW7Z6Za7i1l8i');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tabla_form`
--
ALTER TABLE `tabla_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tabla_form`
--
ALTER TABLE `tabla_form`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

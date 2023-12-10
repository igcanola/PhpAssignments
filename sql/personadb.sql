-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2023 a las 04:28:15
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `personadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detperson`
--

CREATE TABLE `detperson` (
  `id_person` int(11) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `phone` int(10) NOT NULL,
  `faddress` varchar(50) DEFAULT NULL,
  `postal_code` varchar(10) NOT NULL,
  `country` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detperson`
--

INSERT INTO `detperson` (`id_person`, `fname`, `phone`, `faddress`, `postal_code`, `country`, `email`) VALUES
(1, 'Ingrid Canola', 2147483647, '2575 Danforth Av', 'M4C 1L5', 'Canadá', 'inginelacanola@gmail'),
(2, 'Ingrid Canola', 2147483647, '2575 Danforth Av', 'M4C 1L5', 'Canadá', 'inginelacanola@gmail'),
(7, 'Miguel', 55555555, '', 'M4E 2N1', 'Canada', 'miespinoza@gmail.com'),
(11, 'lola', 985940002, 'centro', '593', 'Ecuador', 'sfsdfsdf@hh.com'),
(28, 'Ingrid Canola', 2147483647, '2575 Danforth Av', 'M4C 1L5', 'Canadá', 'inginelacanola@gmail'),
(29, 'Ingrid Canola', 2147483647, '2575 Danforth Av', 'M4C 1L5', 'Canadá', 'inginelacanola@gmail'),
(30, 'Ingrid Canola', 2147483647, '2575 Danforth Av', 'M4C 1L5', 'Canadá', 'inginelacanola@gmail');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `name`, `image`) VALUES
(1, 'IMG_20210604_190244.jpg', './uploads/IMG_20210604_190244.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phpadmins`
--

CREATE TABLE `phpadmins` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(75) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users1`
--

CREATE TABLE `users1` (
  `id` int(11) UNSIGNED NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users1`
--

INSERT INTO `users1` (`id`, `password`, `email`) VALUES
(1, '$2y$10$5W/4usgzDLvjyiCaZyqBJ.cnQfYH32sfUcEDmj5H9/QoiTSSkjMnO', 'inginelacanola@gmail.com'),
(4, '$2y$10$uX9ZwpllBnCBEuaNro458u1X2ThOJCHVc0QhFnBbDH92HEyam2w3C', '200554473@student.georgianc.on.ca');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detperson`
--
ALTER TABLE `detperson`
  ADD PRIMARY KEY (`id_person`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `phpadmins`
--
ALTER TABLE `phpadmins`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detperson`
--
ALTER TABLE `detperson`
  MODIFY `id_person` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `phpadmins`
--
ALTER TABLE `phpadmins`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users1`
--
ALTER TABLE `users1`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

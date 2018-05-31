-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2018 a las 16:05:40
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `red_social`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `msg`
--

CREATE TABLE `msg` (
  `id_msg` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `titulo` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cuerpo` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `nick_msg` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `msg`
--

INSERT INTO `msg` (`id_msg`, `fecha`, `titulo`, `cuerpo`, `nick_msg`, `imagen`) VALUES
(1, '2018-05-24 14:05:31', 'prueba1', 'El mensaje es, en el sentido más general, el objeto de la comunicación. Está definido como la información o enunciado verbal que el emisor envía al receptor a través de un canal de comunicación o medio de comunicación determinado (por ejemplo, el habla o la escritura)', 'costy', 'gato1.jpg'),
(2, '2018-05-24 14:06:34', 'Electronic', 'Se denomina mensaje electrónico (o carta electrónica) a aquel que hace uso del correo electrónico. Es el equivalente electrónico a la carta tradicional, manuscrita o impresa normalmente en papel y que viaja físicamente por correo.', 'rick', 'gato2.jpg'),
(3, '2018-05-24 14:07:26', 'instant', 'Hoy en día también se utiliza el término mensajería instantánea para todos los sistemas de telecomunicaciones que permiten enviar mensajes escritos de manera inmediata a usuarios conectados a una red que proporciona este servicio.', 'andy', 'gato3.jpg'),
(4, '2018-05-29 15:55:08', 'Mensaje imagen', 'En redacción, un texto breve que, en lenguaje simple, transmita información a una persona que se encuentra ausente al momento de redactarlo.', 'andy', 'gato4.jpg'),
(5, '2018-05-29 15:56:00', 'MensajeSinImagen', 'Se denomina mensaje electrónico (o carta electrónica) a aquel que hace uso del correo electrónico. Es el equivalente electrónico a la carta tradicional, manuscrita o impresa normalmente en papel y que viaja físicamente por correo.', 'andy', 'gato1.jpg'),
(6, '2018-05-29 15:56:46', 'Sin imagen', 'Hoy en día también se utiliza el término mensajería instantánea para todos los sistemas de telecomunicaciones que permiten enviar mensajes escritos de manera inmediata a usuarios conectados a una red que proporciona este servicio.', 'costyn1', 'gato5.jpg'),
(8, '2018-05-30 15:37:05', 'gato prueba', 'bla gato', 'costyn1', 'gato1.jpg'),
(9, '2018-05-30 16:10:47', 'gato prueba', 'bla gato', 'costyn1', 'gato1.jpg'),
(18, '2018-05-30 16:22:54', '', 'cansado', 'costyn1', 'gato4.jpg'),
(26, '2018-05-30 17:26:36', '', 'ascdqa', 'costyn1', NULL),
(27, '2018-05-30 17:27:43', '', 'sdcfs', 'costyn1', NULL),
(28, '2018-05-30 17:29:31', '', 'qxsqa', 'costyn1', NULL),
(29, '2018-05-30 17:39:37', '', 'asdfa', 'costyn1', NULL),
(30, '2018-05-30 17:51:50', '', 'cubo', 'costyn1', NULL),
(31, '2018-05-30 17:53:34', '', 'hola', 'costyn1', NULL),
(32, '2018-05-30 17:57:15', '', 'eohhh', 'costyn1', 'C:/xampp2/htdocs/feisbuk/uploads/gato5.jpg'),
(33, '2018-05-30 18:07:10', '', 'uiop', 'costyn1', 'C:/xampp2/htdocs/feisbuk/uploads/gato61.jpg'),
(34, '2018-05-30 18:11:05', '', 'ert', 'costyn1', 'C:/xampp2/htdocs/feisbuk/uploads/perro1.jpg'),
(35, '2018-05-30 18:14:30', '', 'dyhjgy', 'costyn1', 'C:/xampp2/htdocs/feisbuk/uploads/perro2.jpg'),
(36, '2018-05-31 13:44:34', '', 'perro3', 'costyn1', NULL),
(37, '2018-05-31 13:47:28', '', 'perro1', 'costyn1', 'perro11.jpg'),
(38, '2018-05-31 13:49:57', '', 'gato2 succes', 'costyn1', 'gato21.jpg'),
(39, '2018-05-31 14:01:24', '', 'gatito bonito', 'costyn1', 'gato1.jpg'),
(40, '2018-05-31 14:02:11', '', 'gatito subido', 'costyn1', 'gato4.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rsp`
--

CREATE TABLE `rsp` (
  `id_rsp` int(11) NOT NULL,
  `fecha_rsp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cuerpo_rsp` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `id_padre` int(11) NOT NULL,
  `nick_rsp` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rsp`
--

INSERT INTO `rsp` (`id_rsp`, `fecha_rsp`, `cuerpo_rsp`, `id_padre`, `nick_rsp`) VALUES
(1, '2018-05-24 14:08:29', 'En redacción, un texto breve que, en lenguaje simple, transmita información a una persona que se encuentra ausente al momento de redactarlo.', 2, ''),
(2, '2018-05-24 14:09:30', 'Cualquier pensamiento o idea expresado brevemente, y preparado para su transmisión por cualquier medio de comunicación.', 3, ''),
(3, '2018-05-24 14:10:24', 'Una cantidad arbitraria de información cuyo inicio y final están definidos o son identificables.', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `nick` varchar(40) COLLATE utf8_spanish_ci NOT NULL COMMENT 'user name',
  `email` varchar(80) COLLATE utf8_spanish_ci NOT NULL COMMENT 'email usuario',
  `datosContacto` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'datos direccion usuario ',
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'fecha alta',
  `fecha_baja` timestamp NULL DEFAULT NULL,
  `pass` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`nick`, `email`, `datosContacto`, `fecha_alta`, `fecha_baja`, `pass`) VALUES
('andy', 'andres@gmail.com', 'calle binar nr 36, Barcelona', '2018-05-24 13:42:54', NULL, 0x0123),
('costy', 'constantyn@gmail.com', 'calle santa Nr 90, Valencia', '2018-05-24 13:42:10', NULL, 0x0123),
('costyn1', 'costyn1@yahoo.com', NULL, '2018-05-25 15:37:32', NULL, 0x313233),
('rick', 'rickardo@gmail.com', 'Calle avennsis, nr 37 Castellon', '2018-05-24 13:40:58', NULL, 0x0123);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id_msg`),
  ADD KEY `nick_msg` (`nick_msg`);

--
-- Indices de la tabla `rsp`
--
ALTER TABLE `rsp`
  ADD PRIMARY KEY (`id_rsp`),
  ADD KEY `id_padre` (`id_padre`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nick`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `msg`
--
ALTER TABLE `msg`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `rsp`
--
ALTER TABLE `rsp`
  MODIFY `id_rsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `msg`
--
ALTER TABLE `msg`
  ADD CONSTRAINT `msg_ibfk_1` FOREIGN KEY (`nick_msg`) REFERENCES `user` (`nick`);

--
-- Filtros para la tabla `rsp`
--
ALTER TABLE `rsp`
  ADD CONSTRAINT `rsp_ibfk_1` FOREIGN KEY (`id_padre`) REFERENCES `msg` (`id_msg`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

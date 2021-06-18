-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 17-06-2021 a las 04:54:49
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `panel_control`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_email` (IN `p_correo` VARCHAR(200))  BEGIN
	SELECT usu_correo, est FROM tm_usuario WHERE usu_correo=p_correo AND est=1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_tmusuario` (IN `p_nom` VARCHAR(150), IN `p_correo` VARCHAR(200), IN `p_foto` VARCHAR(255), IN `p_pass` VARCHAR(255))  BEGIN
	INSERT INTO tm_usuario(usu_nom, usu_correo, foto, usu_pass, est) VALUES (p_nom, p_correo, p_foto, p_pass, 1);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comendarios`
--

CREATE TABLE `comendarios` (
  `usuario` varchar(30) NOT NULL,
  `usu_correo` varchar(255) DEFAULT NULL,
  `fecha` varchar(50) DEFAULT NULL,
  `comendario` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comendarios`
--

INSERT INTO `comendarios` (`usuario`, `usu_correo`, `fecha`, `comendario`) VALUES
('Mr Destroyer', 'oscarbg04262000@gmail.com', '2021-06-08 02:52:34', 'Hola este es mi primer comentario'),
('Mr Destroyer', 'oscarbg04262000@gmail.com', '2021-06-11 11:56:02', 'Hola  soy nuevo'),
('Laura Lopez', 'lau@gmail.com', '2021-06-15 07:29:15', 'Hola soy laura \n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `ruta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `ruta`) VALUES
(1, 'Musical', 'imagenes/logo.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadistica`
--

CREATE TABLE `estadistica` (
  `year` int(11) DEFAULT NULL,
  `moth` int(11) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `user` varchar(30) DEFAULT NULL,
  `view` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadistica`
--

INSERT INTO `estadistica` (`year`, `moth`, `day`, `user`, `view`) VALUES
(2021, 6, NULL, 'juan@gmail.com', 2),
(2021, 6, NULL, 'ivan@gmail.com', 2),
(2021, 6, NULL, 'oscarbg04262000@gmail.com', 2),
(2021, 6, 8, 'alber@gmail.com', 10),
(2021, 6, 8, 'anonimo@gmail.com', 3),
(2021, 6, 11, 'anonimo@gmail.com', 4),
(2021, 6, 11, 'juan@gmail.com', 1),
(2021, 6, 11, 'ivan@gmail.com', 3),
(2021, 1, 1, 'anonimo@gmail.com', 30),
(2021, 2, 5, 'anonimo@gmail.com', 50),
(2021, 3, 10, 'anonimo@gmail.com', 56),
(2021, 4, 4, 'anonimo@gmail.com', 38),
(2021, 5, 20, 'anonimo@gmail.com', 72),
(2021, 6, 11, 'oscarbg04262000@gmail.com', 2),
(2021, 6, 12, 'anonimo@gmail.com', 97),
(2021, 6, 14, 'anonimo@gmail.com', 4),
(2021, 6, 15, 'anonimo@gmail.com', 2),
(2021, 6, 15, 'lau@gmail.com', 12),
(2021, 6, 15, 'ivan@gmail.com', 15),
(2021, 6, 16, 'anonimo@gmail.com', 109),
(2021, 6, 16, 'alber@gmail.com', 91);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_usuario`
--

CREATE TABLE `tm_usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_nom` varchar(150) DEFAULT NULL,
  `usu_correo` varchar(200) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `usu_pass` varchar(255) DEFAULT NULL,
  `est` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tm_usuario`
--

INSERT INTO `tm_usuario` (`usu_id`, `usu_nom`, `usu_correo`, `foto`, `usu_pass`, `est`) VALUES
(16, 'Juan lopez', 'juan@gmail.com', 'https://image.freepik.com/vector-gratis/perfil-empresario-dibujos-animados_18591-58479.jpg', '123', 0),
(17, 'Ivan Bautista', 'ivan@gmail.com', 'https://image.freepik.com/vector-gratis/perfil-empresario-dibujos-animados_18591-58479.jpg', '123', 1),
(18, 'Mr Destroyer', 'oscarbg04262000@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14Gjadfj9YS8dWJR6mCTjvFwhBYuwg1vKtAkcdlN6=s96-c', '123456', 1),
(19, 'Alberto Lopez', 'alber@gmail.com', 'https://image.freepik.com/vector-gratis/perfil-empresario-dibujos-animados_18591-58479.jpg', '123', 1),
(20, 'Laura Lopez', 'lau@gmail.com', 'https://image.freepik.com/vector-gratis/perfil-empresario-dibujos-animados_18591-58479.jpg', '123', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombrep` varchar(30) NOT NULL,
  `paterno` varchar(30) NOT NULL,
  `materno` varchar(30) NOT NULL,
  `id` int(10) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `clave` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombrep`, `paterno`, `materno`, `id`, `Nombre`, `clave`, `Email`, `foto`) VALUES
('Oscar', 'Bautista', 'Gaytan', 1, 'root', 'tor', 'oscar04@dragon.com', 'imagenes/love.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tm_usuario`
--
ALTER TABLE `tm_usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tm_usuario`
--
ALTER TABLE `tm_usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

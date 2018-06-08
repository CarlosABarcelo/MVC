-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-06-2018 a las 07:09:23
-- Versión del servidor: 5.5.58-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.22

SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `academia`
--
CREATE DATABASE IF NOT EXISTS `academia` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE academia;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Categorias`
--

CREATE TABLE IF NOT EXISTS `Categorias` (
  `id` int(55) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `id_padre` int(55) DEFAULT NULL,
  PRIMARY KEY (`id`)
) TYPE=InnoDB  AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `Categorias`
--

INSERT INTO `Categorias` (`id`, `nombre`, `descripcion`, `color`, `id_padre`) VALUES
(12, '1º ESO', 'Primer Curso de la ESO', 'blue', 0),
(13, '2º ESO', 'Segundo Curso de la ESO', 'blue', 0),
(14, '3º ESO', 'Tercer Curso de la ESO', 'blue', 0),
(15, '4º ESO', 'Cuarto Curso de la ESO', 'blue', 0),
(16, '1º Bachillerato', 'Primer Curso de Bachillerato', 'orange', 0),
(17, '2º Bachillerato', 'Segundo Curso de Bachillerato', 'orange', 0),
(18, 'Matemáticas', 'Curso de Matemáticas de 1ºESO', 'blue', 12),
(19, 'Matemáticas', 'Matemáticas de 2º Eso', 'blue', 13),
(20, 'Matemáticas', 'Matemáticas de 3º Eso', 'blue', 14),
(21, 'Matemáticas', 'Matemáticas de 4º Eso', 'blue', 15),
(22, 'Matemáticas', 'Matemáticas 1 Bachillerato', 'orange', 16),
(23, 'Matemáticas', 'Matemáticas 2 Bachillerato', '#ffa500', 17),
(25, 'Lengua', 'Lengua Castellana de 3ºESO', '#ffff00', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Entradas`
--

CREATE TABLE IF NOT EXISTS `Entradas` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `autor` varchar(50) DEFAULT NULL,
  `contenido` longtext,
  `resumen` tinytext,
  `fecha_creacion` timestamp NOT NULL,
  `id_categoria` int(25) DEFAULT NULL,
  `privado` tinyint(1) DEFAULT NULL,
  `fichero` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) TYPE=InnoDB  AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `Entradas`
--

INSERT INTO `Entradas` (`id`, `titulo`, `slug`, `autor`, `contenido`, `resumen`, `fecha_creacion`, `id_categoria`, `privado`, `fichero`) VALUES
(25, 'Sumas y Restas con número Enteros', 'sumas-y-restas-con-numero-enteros', 'Carlos', '<p>Efect&uacute;a las siguientes operaciones.-</p>\r\n\r\n<p>a)</p>\r\n\r\n<p>&ndash;5 + (3 + 2) =</p>\r\n\r\n<p>b)</p>\r\n\r\n<p>(7 + 2) &ndash; (13 &ndash; 6) =</p>\r\n\r\n<p>c)</p>\r\n\r\n<p>-6 &ndash; (5 &ndash; 12) =</p>\r\n\r\n<p>d)</p>\r\n\r\n<p>&ndash;13 + 3&ndash; ( &ndash; 18) =</p>\r\n\r\n<p>e)</p>\r\n\r\n<p>&ndash;7 &ndash; 4 +21=</p>\r\n\r\n<p>f)</p>\r\n\r\n<p>3 + (5 &ndash; 2) &ndash; 6 &ndash; (3 &ndash; 7) =</p>\r\n', 'Operaciones con numeros enteros , ejercicios de clase de la -a- a la -f-', '2018-05-16 00:01:24', 19, 0, '/uploads/05-30-2018-1:57am-user2.jpg'),
(26, 'Ejercicios de Números enteros 2º Parte', 'ejercicios-de-numeros-enteros-2-parte', 'Carlos', '<p>g) -5 &ndash; (-3) + (12 &ndash; 5) + 6 = h) 4 &ndash; 3 &ndash; 2 &ndash; 6 + 5 &ndash; 4 + 3 &ndash; 2 &ndash; 5 = i) 78 &ndash; [(23 &ndash; 15) + 6 &ndash; (2 &ndash; 12)] = j) [(3 &ndash; 6) &ndash; (5 &ndash; 15)] &ndash; [9 &ndash; (3 &ndash; 12)] = k) 45 + 30 + [34 &ndash; (25 + 15) + (3 + 7)] = l) -6+5 &ndash; (5 &ndash; 12) = m) &ndash;13+10 + 3&ndash; ( &ndash; 18) = n) &ndash;7- 20 &ndash; 4 +21= o) 3 + (-5 &ndash; 2) &ndash; 6 &ndash; (3+ 7) = p) -5 &ndash; (+3) + (12 &ndash; 5) - 6 = q)<br />\n4 &ndash; 3 + 2 &ndash; 6 + 5 &ndash; 4 + 3 &ndash;10 &ndash; 5 =</p>\n', 'Operaciones con numeros enteros , ejercicios de clase de la -g- a la -q-', '2018-05-16 00:10:21', 18, 1, '/uploads/05-30-2018-1:57am-Examen_MVC.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Mensajes`
--

CREATE TABLE IF NOT EXISTS `Mensajes` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mensaje` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) TYPE=InnoDB  AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `Mensajes`
--

INSERT INTO `Mensajes` (`id`, `nombre`, `email`, `mensaje`) VALUES
(1, 'Carlos Alarcón Barceló', 'carlos25752@msn.com', 'Esto es un mensaje de prueba'),
(2, 'asd', 'carlos25752@msn.com', ''),
(3, 'asd', 'carlos25752@msn.com', 'dassd'),
(4, 'Agustino', 'Eugrasio@msn.ref', 'aspofjaposf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE IF NOT EXISTS `Usuarios` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `profesor` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) TYPE=InnoDB  AUTO_INCREMENT=49 ;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`id`, `email`, `password`, `nombre`, `imagen`, `profesor`) VALUES
(1, 'iescierva.carlos@gmail.com', '123456', 'Carlos Abrisqueta', '/uploads/05-31-2018-12:27am-fictioninfluence_list_homersimpson.jpg', 1),
(48, 'carlos25752@msn.com', '123456', 'Carlos Alarcón', '/uploads/05-29-2018-3:06pm-user2.jpg', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

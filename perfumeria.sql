-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2017 a las 03:03:10
-- Versión del servidor: 5.6.17-log
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `perfumeria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE IF NOT EXISTS `articulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `precio` float NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `urlimagen` varchar(255) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id`, `nombre`, `descripcion`, `precio`, `activo`, `urlimagen`, `categoria`) VALUES
(1, 'Prada', 'Este perfume te conquitara ', 560, 1, 'perfume-hombre-1.png', 'Hombres'),
(2, '212 VIP Men', 'Gran perfume muy recomendado', 300, 1, 'perfume-hombre-2.png', 'Hombres'),
(3, 'IDOLE dream', 'Este perfume la hará ver muy bella', 350, 1, 'perfume-4.png', 'Mujeres'),
(5, 'Kids', 'Es un perfume economico', 50, 1, 'perfume-nino-7.png', 'Niños'),
(6, 'Florimonti victor', 'Perfume delicioso', 400, 1, 'perfume-2.png', 'Mujeres'),
(7, 'Funda celular', 'color negro', 70, 1, 'funda_fea.jpg', 'celular'),
(8, 'Frazadita de bebe', 'Ideal para el invierno', 150, 1, 'frazada_de_bebe.jpg', 'Ropa para bebes'),
(9, 'Vidrio Templado Logitech', 'Lo mejor para proteger la pantalla de su smartphone', 120, 1, 'vidrio_temlado_logitech.jpg', 'celular'),
(10, 'Muste', 'Aroma para bebe hipoalergénico  ', 30, 1, 'perfumes-bebe-1.png', 'Bebes'),
(11, 'Hypnotic Poison Doic', 'La pasion no tendra limites', 500, 1, 'perfume-3.png', 'Mujeres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfume`
--

CREATE TABLE IF NOT EXISTS `perfume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `precio` float NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `urlimagen` varchar(255) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `perfume`
--

INSERT INTO `perfume` (`id`, `nombre`, `descripcion`, `precio`, `activo`, `urlimagen`, `categoria`) VALUES
(1, 'Prada', 'Este perfume te conquitara ', 560, 0, 'perfume-hombre-1.png', 'Hombres'),
(2, '212 VIP Men', 'Gran perfume muy recomendado', 300, 1, 'perfume-hombre-2.png', 'Hombres'),
(3, 'IDOLE dream', 'Este perfume la hará ver muy bella', 350, 1, 'perfume-4.png', 'Mujeres'),
(5, 'Kids', 'Es un perfume economico', 50, 1, 'perfume-nino-7.png', 'Niños'),
(6, 'Florimonti victor', 'Perfume delicioso', 400, 1, 'perfume-2.png', 'Mujeres'),
(7, 'Funda celular', 'color azul', 70, 1, 'perfume-4.png', 'celular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccione`
--

CREATE TABLE IF NOT EXISTS `seccione` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `contenido` text,
  `urlimagen` varchar(255) DEFAULT NULL,
  `seccion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `seccione`
--

INSERT INTO `seccione` (`id`, `titulo`, `contenido`, `urlimagen`, `seccion`) VALUES
(1, 'Maria Jose Moya', '<p>Soy una profesional en asesoramiento de imagen, con basta experiencia en mercado técnica y venta de productos. A lo largo de mi vida profesional he trabajado en importantes empresas de nombre reconocido, en las cuales logre aprender mucho de cada una. Decidí abrir mi propio emprendimiento con el objetivo de brindarle a usted la mejor calidad de perfumes junto a la mejor atención a la hora de elegir lo que comprara.</p>\r\n\r\n<p><img alt="" src="http://cdn.ulisesinteractive.com/edpformacion/size/w/260x650/img/2014/19/536b629346748.jpg" /></p>\r\n', NULL, 'acerca de'),
(2, NULL, '<p>\n                                Domicilio: Sarasa 3546, Bermejo, Mendoza, Argentina\n                            </p>\n                            <p>\n                                Telefono: 4445566\n                            </p>\n                            <p>\n                                Escribenos a <a href="mailto:victor.ariel.perez@gmail.com">victor.ariel.perez@gmail.com</a>\n                            </p>', NULL, 'contacto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `user` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `user`, `password`) VALUES
(1, 'viktor', 'perez', 'vperez', '1234');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

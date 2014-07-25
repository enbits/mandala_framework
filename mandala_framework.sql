-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-07-2014 a las 17:22:30
-- Versión del servidor: 5.5.37-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mandala_framework`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`) VALUES
(1, 'This Is A Title', 'Duis non nunc mi. Aenean ornare pharetra mauris, sed scelerisque tellus tincidunt sed. Vestibulum et laoreet nunc, at lobortis risus. Morbi eget ligula blandit quam imperdiet pulvinar ut eu nunc. Quisque massa eros, adipiscing quis bibendum vitae, pellentesque nec lectus. Aenean consectetur in lacus sagittis lobortis. Donec consectetur pretium nunc, sit amet tristique lectus euismod sed. Maecenas laoreet rhoncus massa vel eleifend. Vestibulum et ornare ipsum. Duis semper venenatis enim eleifend feugiat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\r\n\r\nDonec at risus pellentesque, bibendum dui ac, cursus lorem. Suspendisse vel suscipit eros. Suspendisse vehicula tincidunt turpis, eu congue enim posuere at. In condimentum mi tincidunt molestie commodo. Morbi convallis dolor eu eros porttitor vehicula. Morbi eros orci, mollis non congue sit amet, varius eu nibh. Ut ultrices felis velit, sit amet fermentum erat placerat sit amet. Maecenas ornare commodo turpis, quis congue justo tristique ac. Ut tempus aliquet est, et posuere ipsum iaculis tristique. Nulla euismod, turpis at faucibus commodo, dui nisl ornare odio, non viverra nunc lorem eget nisl. Nam sed ullamcorper nulla. Nam fringilla pharetra lorem ut pulvinar. Proin hendrerit leo purus, ut egestas velit consequat at. Maecenas placerat sit amet nulla at imperdiet.'),
(2, 'This Is Another TItle', 'Proin vitae velit sed nibh tristique mattis eu a quam. Vestibulum eu lorem molestie, ultrices nunc in, dignissim sapien. Suspendisse turpis enim, malesuada vel nisi vitae, pulvinar laoreet lectus. Suspendisse potenti. Curabitur metus quam, pellentesque et elit quis, semper scelerisque sem. Curabitur sagittis augue eu ligula varius, eu sollicitudin felis convallis. Ut blandit lorem volutpat, pulvinar diam vel, pellentesque enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Curabitur vel sapien velit. Nunc id nisl pretium nulla porta ultricies vitae ut nisi. Nam non enim pellentesque, pretium mauris a, ornare velit. Fusce leo urna, viverra ac pellentesque at, tristique cursus erat. Nulla mollis consequat tellus, quis rutrum ligula mattis sit amet. Sed quis tortor lobortis, elementum mi nec, pharetra est. In sit amet mattis metus.\r\n\r\nMauris volutpat, sapien sit amet ultrices sagittis, tortor mauris lobortis nisl, ut convallis mi quam quis est. Curabitur lacus ligula, accumsan id est eu, vehicula vestibulum enim. Duis iaculis risus ut sapien pulvinar gravida. Sed id blandit magna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec vitae nisi justo. Integer eu odio sed mi vulputate eleifend. Vivamus risus risus, aliquam at lectus non, sagittis condimentum neque. In et adipiscing nisl, quis laoreet nunc. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2016 a las 03:52:45
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `muestraarte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_administradores`
--

CREATE TABLE IF NOT EXISTS `px_administradores` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `perfil_id` bigint(20) DEFAULT NULL,
  `codigo_area_id` bigint(20) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `clave` varchar(50) DEFAULT NULL,
  `apellido_paterno` varchar(50) DEFAULT NULL,
  `apellido_materno` varchar(50) DEFAULT NULL,
  `fono` decimal(9,0) DEFAULT NULL,
  `comentario_count` int(11) DEFAULT NULL,
  `tienda_count` int(11) DEFAULT NULL,
  `foto_perfil` varchar(100) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `px_administradores`
--

INSERT INTO `px_administradores` (`id`, `perfil_id`, `codigo_area_id`, `nombres`, `email`, `clave`, `apellido_paterno`, `apellido_materno`, `fono`, `comentario_count`, `tienda_count`, `foto_perfil`, `activo`, `created`, `modified`) VALUES
(1, NULL, NULL, NULL, 'desarrollo@brandon.cl', '7bcce781ced6b79c023ae849784f24b93cb1f84e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-10-01 01:23:47', '2016-10-01 01:23:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_albumnes`
--

CREATE TABLE IF NOT EXISTS `px_albumnes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tienda_id` bigint(20) DEFAULT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `descripcion` text,
  `activo` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modifed` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_albumn_imagenes`
--

CREATE TABLE IF NOT EXISTS `px_albumn_imagenes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `albumn_id` bigint(20) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_carruseles`
--

CREATE TABLE IF NOT EXISTS `px_carruseles` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `parrafo` text,
  `boton_activo` tinyint(4) DEFAULT NULL,
  `boton_link` varchar(200) DEFAULT NULL,
  `boton_texto` varchar(25) DEFAULT NULL,
  `carrusel_imagenes_count` bigint(20) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_carrusel_imagenes`
--

CREATE TABLE IF NOT EXISTS `px_carrusel_imagenes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `carrusel_id` bigint(20) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `descripcion` text,
  `orden` int(11) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_categorias`
--

CREATE TABLE IF NOT EXISTS `px_categorias` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `descripcion` text,
  `imagen_principal` varchar(150) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_categorias_productos`
--

CREATE TABLE IF NOT EXISTS `px_categorias_productos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `categoria_id` bigint(20) NOT NULL,
  `producto_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_codigo_areas`
--

CREATE TABLE IF NOT EXISTS `px_codigo_areas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `codigo_pais` decimal(2,0) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_colores`
--

CREATE TABLE IF NOT EXISTS `px_colores` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `producto_id` bigint(20) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_compras`
--

CREATE TABLE IF NOT EXISTS `px_compras` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `administrador_id` bigint(20) DEFAULT NULL,
  `estado_compra_id` bigint(20) DEFAULT NULL,
  `oc` varchar(26) DEFAULT NULL,
  `total` int(100) DEFAULT NULL,
  `producto_count` bigint(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_compras_productos`
--

CREATE TABLE IF NOT EXISTS `px_compras_productos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `compra_id` bigint(20) NOT NULL,
  `producto_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_configuracion`
--

CREATE TABLE IF NOT EXISTS `px_configuracion` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `titulo_sitio` varchar(50) DEFAULT NULL,
  `shorcut_sitio` varchar(100) DEFAULT NULL,
  `logo_sitio` varchar(150) DEFAULT NULL,
  `descripcion` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_contenidos`
--

CREATE TABLE IF NOT EXISTS `px_contenidos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pagina_id` bigint(20) DEFAULT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `cuerpo` text,
  `imagen` varchar(100) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_dimensiones`
--

CREATE TABLE IF NOT EXISTS `px_dimensiones` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `producto_id` bigint(20) DEFAULT NULL,
  `alto` decimal(10,2) DEFAULT NULL,
  `ancho` decimal(10,2) DEFAULT NULL,
  `largo` decimal(10,2) DEFAULT NULL,
  `cuadrados` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_direcciones`
--

CREATE TABLE IF NOT EXISTS `px_direcciones` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tienda_id` bigint(20) DEFAULT NULL,
  `icono_id` bigint(20) DEFAULT NULL,
  `villa_pobla` varchar(200) DEFAULT NULL,
  `calle_pasaje` varchar(200) DEFAULT NULL,
  `numero` varchar(30) DEFAULT NULL,
  `referencia` text,
  `latitud` varchar(30) DEFAULT NULL,
  `longitud` varchar(30) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_estado_compras`
--

CREATE TABLE IF NOT EXISTS `px_estado_compras` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `estado` varchar(30) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_etiquetas`
--

CREATE TABLE IF NOT EXISTS `px_etiquetas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `productos_count` bigint(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_etiquetas_productos`
--

CREATE TABLE IF NOT EXISTS `px_etiquetas_productos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `etiqueta_id` bigint(20) NOT NULL,
  `producto_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_fonos`
--

CREATE TABLE IF NOT EXISTS `px_fonos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tienda_id` bigint(20) DEFAULT NULL,
  `codigo_area_id` bigint(20) DEFAULT NULL,
  `icono_id` bigint(20) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `fono` decimal(9,0) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_iconos`
--

CREATE TABLE IF NOT EXISTS `px_iconos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `icono` varchar(20) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_modulos`
--

CREATE TABLE IF NOT EXISTS `px_modulos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `controlador` varchar(100) DEFAULT NULL,
  `icono` varchar(20) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_modulos_perfiles`
--

CREATE TABLE IF NOT EXISTS `px_modulos_perfiles` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `perfil_id` bigint(20) NOT NULL,
  `modulo_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_paginas`
--

CREATE TABLE IF NOT EXISTS `px_paginas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `carrusel_id` bigint(20) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `cuerpo` text,
  `imagen_principal` varchar(150) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_perfiles`
--

CREATE TABLE IF NOT EXISTS `px_perfiles` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(50) DEFAULT NULL,
  `descripcion` text,
  `activo` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `px_perfiles`
--

INSERT INTO `px_perfiles` (`id`, `perfil`, `descripcion`, `activo`, `created`, `modified`) VALUES
(1, 'Super administrador', 'Control total del sistema', 1, '2016-10-01 01:24:41', '2016-10-01 01:24:41'),
(2, 'Administrador', 'Encargado del control de la/s tienda/s', 1, '2016-10-01 01:25:26', '2016-10-01 01:25:26'),
(3, 'Cliente', 'Perfil para los clientes del sistema', 1, '2016-10-01 01:25:49', '2016-10-01 01:25:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_productos`
--

CREATE TABLE IF NOT EXISTS `px_productos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tienda_id` bigint(20) DEFAULT NULL,
  `sku` varchar(25) DEFAULT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `descripcion_corta` text,
  `descripcion_completa` text,
  `imagen_principal` varchar(150) DEFAULT NULL,
  `imagen_miniatura` varchar(150) DEFAULT NULL,
  `precio_normal` varchar(15) DEFAULT NULL,
  `porcentaje_descuento` decimal(2,0) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_producto_imagenes`
--

CREATE TABLE IF NOT EXISTS `px_producto_imagenes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `producto_id` bigint(20) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_red_sitios`
--

CREATE TABLE IF NOT EXISTS `px_red_sitios` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `configuracion_id` bigint(20) DEFAULT NULL,
  `icono_id` bigint(20) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_red_sociales`
--

CREATE TABLE IF NOT EXISTS `px_red_sociales` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tienda_id` bigint(20) DEFAULT NULL,
  `icono_id` bigint(20) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_tiendas`
--

CREATE TABLE IF NOT EXISTS `px_tiendas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `administrador_id` bigint(20) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `descripcion` text,
  `imagen_principal` varchar(150) DEFAULT NULL,
  `imagen_portada` varchar(150) DEFAULT NULL,
  `visitas` int(11) DEFAULT NULL,
  `producto_activo_count` bigint(20) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_tienda_contactos`
--

CREATE TABLE IF NOT EXISTS `px_tienda_contactos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tienda_id` bigint(20) DEFAULT NULL,
  `administrador_id` bigint(20) DEFAULT NULL,
  `tipo_contacto_id` bigint(20) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `fono` decimal(9,0) DEFAULT NULL,
  `mensaje` text,
  `origen` varchar(150) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px_tipo_contactos`
--

CREATE TABLE IF NOT EXISTS `px_tipo_contactos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

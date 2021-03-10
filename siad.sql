-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 16-11-2019 a las 02:29:17
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `somoshumboldt`
--
DROP DATABASE IF EXISTS `somoshumboldt`;
CREATE DATABASE IF NOT EXISTS `somoshumboldt` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `somoshumboldt`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `sp_consultar_carreras`$$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_consultar_carreras` ()  MODIFIES SQL DATA
    SQL SECURITY INVOKER
SELECT * FROM tbl_carreras$$

DROP PROCEDURE IF EXISTS `sp_consultar_categorias`$$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_consultar_categorias` ()  MODIFIES SQL DATA
    SQL SECURITY INVOKER
SELECT * FROM tbl_categorias$$

DROP PROCEDURE IF EXISTS `sp_consultar_denuncia`$$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_consultar_denuncia` (IN `vticket` VARCHAR(10))  MODIFIES SQL DATA
    SQL SECURITY INVOKER
BEGIN
SELECT * FROM tbl_denuncias
INNER JOIN tbl_carreras ON tbl_denuncias.carrera = tbl_carreras.IDC
INNER JOIN tbl_sedes ON tbl_denuncias.sede = tbl_sedes.IDS
INNER JOIN tbl_categorias ON tbl_denuncias.categoria = tbl_categorias.IDCAT
WHERE ticket = vticket;
END$$

DROP PROCEDURE IF EXISTS `sp_consultar_denuncias`$$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_consultar_denuncias` ()  MODIFIES SQL DATA
    SQL SECURITY INVOKER
BEGIN
SELECT * FROM tbl_denuncias
INNER JOIN tbl_carreras ON tbl_denuncias.carrera = tbl_carreras.IDC
INNER JOIN tbl_sedes ON tbl_denuncias.sede = tbl_sedes.IDS
INNER JOIN tbl_categorias ON tbl_denuncias.categoria = tbl_categorias.IDCAT
order by ID desc;
END$$

DROP PROCEDURE IF EXISTS `sp_consultar_denuncias_publicas`$$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_consultar_denuncias_publicas` ()  MODIFIES SQL DATA
    SQL SECURITY INVOKER
BEGIN
SELECT * FROM tbl_denuncias
INNER JOIN tbl_carreras ON tbl_denuncias.carrera = tbl_carreras.IDC
INNER JOIN tbl_sedes ON tbl_denuncias.sede = tbl_sedes.IDS
INNER JOIN tbl_categorias ON tbl_denuncias.categoria = tbl_categorias.IDCAT
WHERE tbl_denuncias.publico = 1
order by ID desc limit 5;
END$$

DROP PROCEDURE IF EXISTS `sp_consultar_filtros_denuncias_publicas`$$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_consultar_filtros_denuncias_publicas` (IN `vsede` INT, IN `vcate` INT, IN `vcarr` INT, IN `viden` INT, IN `limsup` INT, IN `liminf` INT)  MODIFIES SQL DATA
    SQL SECURITY INVOKER
BEGIN

DECLARE sqlsedecond text;
DECLARE sqlcatecond text;
DECLARE sqlcarrcond text;
DECLARE sqlidencond text;

IF vsede != -1 THEN
	SET sqlsedecond = CONCAT(" = ",vsede);
ELSE
	SET sqlsedecond = " != -1";
END IF;

IF vcate != -1 THEN
	SET sqlcatecond = CONCAT(" = ",vcate);
ELSE
	SET sqlcatecond = " != -1";
END IF;

IF vcarr != -1 THEN
	SET sqlcarrcond = CONCAT(" = ",vcarr);
ELSE
	SET sqlcarrcond = " != -1";
END IF;

IF viden != -1 THEN
	SET sqlidencond = CONCAT(" = ",viden);
ELSE
	SET sqlidencond = " != -1";
END IF;

SET @sql = CONCAT(
"SELECT * FROM `tbl_denuncias` INNER JOIN tbl_carreras ON tbl_denuncias.carrera = tbl_carreras.IDC
INNER JOIN tbl_sedes ON tbl_denuncias.sede = tbl_sedes.IDS
INNER JOIN tbl_categorias ON tbl_denuncias.categoria = tbl_categorias.IDCAT WHERE tbl_denuncias.sede ",sqlsedecond," AND tbl_denuncias.categoria ",sqlcatecond," AND tbl_denuncias.carrera ",sqlcarrcond," AND ID ",sqlidencond," AND tbl_denuncias.publico = 1 ORDER BY ID DESC limit ",limsup,",",liminf);

PREPARE stmt FROM @sql;
EXECUTE stmt;
END$$

DROP PROCEDURE IF EXISTS `sp_consultar_sedes`$$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_consultar_sedes` ()  MODIFIES SQL DATA
    SQL SECURITY INVOKER
SELECT * FROM tbl_sedes$$

DROP PROCEDURE IF EXISTS `sp_consultar_ticket`$$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_consultar_ticket` (IN `vticket` VARCHAR(10))  MODIFIES SQL DATA
    SQL SECURITY INVOKER
BEGIN
select ticket from tbl_denuncias where ticket=vticket;
END$$

DROP PROCEDURE IF EXISTS `sp_consultar_total_num_denuncias`$$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_consultar_total_num_denuncias` ()  MODIFIES SQL DATA
    SQL SECURITY INVOKER
BEGIN
SELECT COUNT(*) total FROM tbl_denuncias;
END$$

DROP PROCEDURE IF EXISTS `sp_consultar_total_num_denuncias_publicas`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultar_total_num_denuncias_publicas` (IN `vsede` INT, IN `vcate` INT, IN `vcarr` INT, IN `viden` INT)  NO SQL
BEGIN

DECLARE sqlsedecond text;
DECLARE sqlcatecond text;
DECLARE sqlcarrcond text;
DECLARE sqlidencond text;

IF vsede != -1 THEN
	SET sqlsedecond = CONCAT(" = ",vsede);
ELSE
	SET sqlsedecond = " != -1";
END IF;

IF vcate != -1 THEN
	SET sqlcatecond = CONCAT(" = ",vcate);
ELSE
	SET sqlcatecond = " != -1";
END IF;

IF vcarr != -1 THEN
	SET sqlcarrcond = CONCAT(" = ",vcarr);
ELSE
	SET sqlcarrcond = " != -1";
END IF;

IF viden != -1 THEN
	SET sqlidencond = CONCAT(" = ",viden);
ELSE
	SET sqlidencond = " != -1";
END IF;

SET @sql = CONCAT(
"SELECT COUNT(*) total FROM tbl_denuncias WHERE tbl_denuncias.sede ",sqlsedecond," AND tbl_denuncias.categoria ",sqlcatecond," AND tbl_denuncias.carrera ",sqlcarrcond," AND ID ",sqlidencond," AND tbl_denuncias.publico = 1");

PREPARE stmt FROM @sql;
EXECUTE stmt;
END$$

DROP PROCEDURE IF EXISTS `sp_login_adm`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_login_adm` (IN `vuser` VARCHAR(10) CHARSET utf8, IN `vpass` VARCHAR(10) CHARSET utf8)  MODIFIES SQL DATA
    SQL SECURITY INVOKER
SELECT * FROM tbl_adm_usuarios WHERE vpass = contrasena AND vuser = usuario$$

DROP PROCEDURE IF EXISTS `sp_procesar_denuncia`$$
CREATE DEFINER=`root`@`%` PROCEDURE `sp_procesar_denuncia` (IN `vticket` VARCHAR(10), IN `vdenuncia` TEXT, IN `vcarrera` VARCHAR(50), IN `vsede` VARCHAR(50), IN `vcategoria` VARCHAR(50), IN `vasunto` VARCHAR(50), IN `vfecha` DATETIME)  MODIFIES SQL DATA
    SQL SECURITY INVOKER
BEGIN
insert into tbl_denuncias(
    ticket,
    denuncia,
    carrera,
    sede,
    categoria,
    asunto,
    fechacrea
    )
    values
    (
    vticket,
    vdenuncia,
    vcarrera,
    vsede,
    vcategoria,
    vasunto,
	sysdate()
    );
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_adm_usuarios`
--

DROP TABLE IF EXISTS `tbl_adm_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_adm_usuarios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(10) NOT NULL,
  `contrasena` varchar(25) NOT NULL,
  `rol` varchar(10) NOT NULL DEFAULT 'op',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_adm_usuarios`
--

INSERT INTO `tbl_adm_usuarios` (`ID`, `usuario`, `contrasena`, `rol`) VALUES
(1, 'SUPER', 'SUPER', 'su');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_carreras`
--

DROP TABLE IF EXISTS `tbl_carreras`;
CREATE TABLE IF NOT EXISTS `tbl_carreras` (
  `IDC` int(11) NOT NULL,
  `carrera` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IDC`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_carreras`
--

INSERT INTO `tbl_carreras` (`IDC`, `carrera`) VALUES
(1, 'Administracion de Empresas'),
(2, 'Administración de empresas mención turismo'),
(3, 'Comercio Internacional'),
(4, 'Contaduría'),
(5, 'Economía'),
(6, 'Educación mención inglés'),
(7, 'ING. Informática'),
(8, 'ING. Mantenimiento de Obras'),
(9, 'Publicidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categorias`
--

DROP TABLE IF EXISTS `tbl_categorias`;
CREATE TABLE IF NOT EXISTS `tbl_categorias` (
  `IDCAT` int(11) NOT NULL,
  `categoria` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IDCAT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_categorias`
--

INSERT INTO `tbl_categorias` (`IDCAT`, `categoria`) VALUES
(1, 'Administacion'),
(2, 'CE'),
(3, 'Docente'),
(4, 'Estudiantado'),
(5, 'Gremios Estudiantiles'),
(6, 'Infraestructura'),
(7, 'Seguridad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_denuncias`
--

DROP TABLE IF EXISTS `tbl_denuncias`;
CREATE TABLE IF NOT EXISTS `tbl_denuncias` (
  `ID` int(50) NOT NULL AUTO_INCREMENT,
  `denuncia` text COLLATE utf8_unicode_ci NOT NULL,
  `carrera` int(50) NOT NULL,
  `sede` int(50) NOT NULL,
  `categoria` int(50) NOT NULL,
  `asunto` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fechacrea` datetime NOT NULL,
  `ticket` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `respuesta` text COLLATE utf8_unicode_ci,
  `estadodenuncia` tinyint(1) NOT NULL DEFAULT '0',
  `publico` tinyint(1) NOT NULL DEFAULT '1',
  `destacado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `carrera` (`carrera`),
  KEY `categoria` (`categoria`),
  KEY `sede` (`sede`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `tbl_denuncias`
--

INSERT INTO `tbl_denuncias` (`ID`, `denuncia`, `carrera`, `sede`, `categoria`, `asunto`, `fechacrea`, `ticket`, `respuesta`, `estadodenuncia`, `publico`, `destacado`) VALUES
(1, 'esta es una denuncia de prueba para verificar que el sistema funciona de manera correcta con la verificacion del captcha', 1, 1, 1, 'prueba denuncia 1', '2019-05-29 19:08:13', 'Q4ZI2GP5X4', NULL, 0, 1, 0),
(2, 'asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd', 1, 3, 3, 'asdasdasdasdasdasd', '2019-05-29 19:09:09', 'AUQZG9D387', NULL, 0, 1, 0),
(3, 'teststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststeststests', 1, 1, 1, 'teststeststeststeststests', '2019-05-30 20:09:55', 'UWRRD1TDAT', NULL, 0, 1, 0),
(4, 'asdasdasdasdasdasdasdasdasdasdasdasdasdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 2, 1, 2, 'asdasdadasd', '2019-05-30 20:11:51', 'NHQ2UKCKA7', NULL, 0, 1, 0),
(5, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 9, 1, 2, 'asdasdasdsadasd', '2019-05-30 20:16:07', '141XXLWSFY', NULL, 0, 1, 0),
(6, 'asdasdasd asdasdasdas asdasdasd asdasdasd asdasdasdas asdasdasd asdasdasd asdasdasdas asdasdasd asdasdasd asdasdasdas asdasdasd asdasdasd asdasdasdas asdasdasd asdasdasd asdasdasdas asdasdasd vasdasdasd asdasdasdas asdasdasd asdasdasd asdasdasdas asdasdasd asdasdasd asdasdasdas asdasdasd', 7, 2, 6, 'asdasdasda asda sdasd', '2019-05-30 20:34:20', 'B5712WK4DB', NULL, 0, 1, 0),
(7, 'sdasdasd asdasdasd sdasdasd asdasdasd sdasdasd asdasdasd sdasdasd asdasdasd sdasdasd asdasdasd sdasdasd asdasdasd sdasdasd asdasdasd sdasdasd asdasdasd sdasdasd asdasdasd sdasdasd asdasdasd sdasdasd asdasdasd sdasdasd asdasdasd sdasdasd asdasdasd sdasdasd asdasdasd', 3, 5, 2, 'asdasdasdasdasdasd', '2019-06-06 09:53:57', 'THI61AJFVD', NULL, 0, 1, 0),
(8, 'asdasdasdasasc \'asdasdcacas asdasdcacasasdasdcacasasdasdcacasasdasdcacasasdasdcacasasdasdcacasasdasdcacasasdasdcacasasdasdcacasasdasdcacasasdasdcacasasdasdcacasasdasdcacas', 6, 2, 1, 'asasdasddasdas \'', '2019-06-06 10:11:37', 'G7TIENH1U3', NULL, 0, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sedes`
--

DROP TABLE IF EXISTS `tbl_sedes`;
CREATE TABLE IF NOT EXISTS `tbl_sedes` (
  `IDS` int(11) NOT NULL,
  `sede` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IDS`),
  KEY `ID` (`IDS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_sedes`
--

INSERT INTO `tbl_sedes` (`IDS`, `sede`) VALUES
(1, 'Bellas Artes'),
(2, 'El Bosque'),
(3, 'Los Dos Caminos'),
(4, 'Núcleo Valencia'),
(5, 'Plaza Venezuela');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_denuncias`
--
ALTER TABLE `tbl_denuncias`
  ADD CONSTRAINT `tbl_denuncias_ibfk_1` FOREIGN KEY (`carrera`) REFERENCES `tbl_carreras` (`IDC`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_denuncias_ibfk_2` FOREIGN KEY (`categoria`) REFERENCES `tbl_categorias` (`IDCAT`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_denuncias_ibfk_3` FOREIGN KEY (`sede`) REFERENCES `tbl_sedes` (`IDS`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

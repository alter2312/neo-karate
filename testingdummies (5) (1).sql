-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2023 a las 15:06:16
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
-- Base de datos: `testingdummies`
--
CREATE DATABASE IF NOT EXISTS `testingdummies` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `testingdummies`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asiste`
--

DROP TABLE IF EXISTS `asiste`;
CREATE TABLE `asiste` (
  `IDTorneo` int(11) NOT NULL,
  `IDUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coach`
--

DROP TABLE IF EXISTS `coach`;
CREATE TABLE `coach` (
  `CI` int(8) NOT NULL,
  `Nombre` varchar(11) NOT NULL,
  `Apellido` varchar(11) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `contraseña` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `coach`
--

INSERT INTO `coach` (`CI`, `Nombre`, `Apellido`, `Telefono`, `contraseña`) VALUES
(12345678, 'asd', 'asd', 124535678, ''),
(55377135, 'Alter', 'Olsztyn', 99004321, ''),
(55422733, 'Fabrizio', 'Gomez', 93332257, ''),
(55433333, 'Melanie', 'Cardozo', 97304444, ''),
(55499733, 'Fabian', 'Martinez', 97302257, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competidor`
--

DROP TABLE IF EXISTS `competidor`;
CREATE TABLE `competidor` (
  `IDCompetidor` int(11) NOT NULL,
  `CI` int(8) NOT NULL,
  `Fecha_Nac` date NOT NULL,
  `Nombre` varchar(11) NOT NULL,
  `Apellido` varchar(11) NOT NULL,
  `Genero` enum('Masculino','Femenino','','') NOT NULL,
  `IDDojo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `competidor`
--

INSERT INTO `competidor` (`IDCompetidor`, `CI`, `Fecha_Nac`, `Nombre`, `Apellido`, `Genero`, `IDDojo`) VALUES
(1, 55499749, '2005-11-11', 'Juan', 'Gomez', 'Masculino', 1),
(2, 55499748, '2005-11-10', 'Juana', 'Gomez', 'Femenino', 2),
(3, 25499749, '2003-11-11', 'Pedro', 'Jimenes', 'Masculino', 1),
(4, 55439749, '2000-08-11', 'Franco', 'Luneli', 'Masculino', 2),
(5, 55377135, '2005-09-20', 'Alter', 'Olsztyn', 'Masculino', 1),
(6, 55377135, '2005-09-20', 'Alter', 'Olsztyn', 'Masculino', 1),
(7, 55377135, '2005-09-20', 'Alter', 'Olsztyn', 'Masculino', 1),
(8, 55377135, '2005-09-20', 'Alter', 'Olsztyn', 'Masculino', 1),
(9, 55377135, '2005-09-20', 'Alter', 'Olsztyn', 'Masculino', 1),
(10, 55377135, '2005-09-20', 'Alter', 'Olsztyn', 'Masculino', 1),
(11, 55377135, '2005-09-20', 'Alter', 'Olsztyn', 'Masculino', 1),
(12, 55377135, '2005-09-20', 'Alter', 'Olsztyn', 'Masculino', 1),
(13, 55377135, '2005-09-20', 'Alter', 'Olsztyn', 'Masculino', 1),
(14, 55377135, '2005-09-20', 'Alter', 'Olsztyn', 'Masculino', 1),
(15, 55377135, '2005-09-20', 'Alter', 'Olsztyn', 'Masculino', 1),
(16, 55377135, '2005-09-20', 'Alter', 'Olsztyn', 'Masculino', 1),
(17, 55377135, '2005-09-20', 'Alter', 'Olsztyn', 'Masculino', 1),
(18, 55377135, '2005-09-20', 'Alter', 'Olsztyn', 'Masculino', 1),
(19, 55377135, '2005-09-20', 'Alter', 'Olsztyn', 'Masculino', 1),
(20, 55377135, '2005-09-20', 'Alter', 'Olsztyn', 'Masculino', 1),
(21, 55377135, '2005-09-20', 'Alter', 'Olsztyn', 'Masculino', 1),
(22, 55377135, '2005-09-20', 'Alter', 'Olsztyn', 'Masculino', 1),
(23, 55377157, '2005-09-20', 'Shajar', 'Olsztyn', 'Masculino', 2),
(25, 48225578, '1964-12-12', 'Luis', 'Pepe', 'Masculino', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compite`
--

DROP TABLE IF EXISTS `compite`;
CREATE TABLE `compite` (
  `IDEquipo` int(11) NOT NULL,
  `IDTorneo` int(11) NOT NULL,
  `Categoria` enum('12/13','14/15','16/17','18/mayores') NOT NULL,
  `Puesto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `compite`
--

INSERT INTO `compite` (`IDEquipo`, `IDTorneo`, `Categoria`, `Puesto`) VALUES
(1, 35, '16/17', 0),
(1, 37, '16/17', 0),
(3, 35, '18/mayores', 0),
(3, 37, '18/mayores', 0),
(4, 35, '18/mayores', 0),
(4, 37, '18/mayores', 0),
(5, 35, '18/mayores', 0),
(5, 37, '18/mayores', 0),
(6, 35, '18/mayores', 0),
(6, 37, '18/mayores', 0),
(7, 35, '18/mayores', 0),
(7, 37, '18/mayores', 0),
(8, 35, '18/mayores', 0),
(8, 37, '18/mayores', 0),
(9, 35, '18/mayores', 0),
(9, 37, '18/mayores', 0),
(10, 35, '18/mayores', 0),
(10, 37, '18/mayores', 0),
(11, 35, '18/mayores', 0),
(11, 37, '18/mayores', 0),
(12, 35, '18/mayores', 0),
(12, 37, '18/mayores', 0),
(13, 35, '18/mayores', 0),
(13, 37, '18/mayores', 0),
(14, 35, '18/mayores', 0),
(14, 37, '18/mayores', 0),
(15, 35, '18/mayores', 0),
(15, 37, '18/mayores', 0),
(16, 35, '18/mayores', 0),
(16, 37, '18/mayores', 0),
(17, 35, '18/mayores', 0),
(17, 37, '18/mayores', 0),
(18, 35, '18/mayores', 0),
(18, 37, '18/mayores', 0),
(19, 35, '18/mayores', 0),
(19, 37, '18/mayores', 0),
(20, 35, '18/mayores', 0),
(20, 37, '18/mayores', 0),
(21, 35, '18/mayores', 0),
(21, 37, '18/mayores', 0),
(22, 35, '18/mayores', 0),
(22, 37, '18/mayores', 0),
(36, 35, '18/mayores', 0),
(36, 37, '18/mayores', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componen`
--

DROP TABLE IF EXISTS `componen`;
CREATE TABLE `componen` (
  `IDEquipo` int(11) NOT NULL,
  `IDRonda` int(11) NOT NULL,
  `IDTorneo` int(11) NOT NULL,
  `Resultado` enum('Gano','Perdio','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conforma`
--

DROP TABLE IF EXISTS `conforma`;
CREATE TABLE `conforma` (
  `IDCompetidor` int(11) NOT NULL,
  `IDEquipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `conforma`
--

INSERT INTO `conforma` (`IDCompetidor`, `IDEquipo`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2),
(5, 35),
(23, 37),
(23, 38),
(23, 39),
(23, 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `constituye`
--

DROP TABLE IF EXISTS `constituye`;
CREATE TABLE `constituye` (
  `IDEquipo` int(11) NOT NULL,
  `IDRonda` int(11) NOT NULL,
  `NumKata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `constituye`
--

INSERT INTO `constituye` (`IDEquipo`, `IDRonda`, `NumKata`) VALUES
(3, 1, 3),
(4, 1, 4),
(1, 2, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dirige`
--

DROP TABLE IF EXISTS `dirige`;
CREATE TABLE `dirige` (
  `CI` int(8) NOT NULL,
  `IDDojo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `dirige`
--

INSERT INTO `dirige` (`CI`, `IDDojo`) VALUES
(55377135, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dojo`
--

DROP TABLE IF EXISTS `dojo`;
CREATE TABLE `dojo` (
  `IDDojo` int(11) NOT NULL,
  `NombreDojo` varchar(30) NOT NULL,
  `Escuela` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `dojo`
--

INSERT INTO `dojo` (`IDDojo`, `NombreDojo`, `Escuela`) VALUES
(1, 'Dojo1', 'Escuela1'),
(2, 'Dojo2', 'Escuela2'),
(3, 'Dojo3', 'Escuela1'),
(4, 'Dojo4', 'Escuela2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

DROP TABLE IF EXISTS `equipo`;
CREATE TABLE `equipo` (
  `IDEquipo` int(11) NOT NULL,
  `IDCompetidor` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`IDEquipo`, `IDCompetidor`, `Cantidad`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 15, 1),
(16, 16, 1),
(17, 17, 1),
(18, 18, 1),
(19, 19, 1),
(20, 20, 1),
(21, 21, 1),
(22, 22, 1),
(23, 5, 3),
(24, 5, 3),
(25, 5, 3),
(26, 5, 3),
(27, 5, 3),
(28, 5, 3),
(29, 5, 3),
(30, 5, 3),
(31, 5, 3),
(32, 5, 3),
(33, 5, 3),
(34, 5, 3),
(35, 5, 3),
(36, 23, 1),
(37, 5, 3),
(38, 5, 3),
(39, 5, 3),
(40, 5, 3),
(41, 25, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kata`
--

DROP TABLE IF EXISTS `kata`;
CREATE TABLE `kata` (
  `NumKata` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `kata`
--

INSERT INTO `kata` (`NumKata`, `Nombre`) VALUES
(1, 'Anan'),
(2, 'Anan Dai'),
(3, 'Ananko'),
(4, 'Aoyagi'),
(5, 'Bassai'),
(6, 'Bassai Dai'),
(7, 'Bassai Sho'),
(8, 'Chatanyara Kusanku'),
(9, 'Chibana No Kushanku'),
(10, 'Chinte'),
(11, 'Chinto'),
(12, 'Empi'),
(13, 'Fukyugata Ichi'),
(14, 'Fukyugata Ni'),
(15, 'Gankaku'),
(16, 'Garyu'),
(17, 'Gekisai (Geksai) 1'),
(18, 'Gekisai (Geksai) 2'),
(19, 'Gojushiho'),
(20, 'Gojushiho Dai'),
(21, 'Gojushaho Sho'),
(22, 'Hakucho'),
(23, 'Hangetsu'),
(24, 'Haufa (Haffa)'),
(25, 'Heian Shodan'),
(26, 'Heian Nidan'),
(27, 'Heian Sandan'),
(28, 'Heian Yondan'),
(29, 'Heian Godan'),
(30, 'Heiku'),
(31, 'Ishimine Bassai'),
(32, 'Itosu Rohai Shodan'),
(33, 'Itosu Rohai Nidan'),
(34, 'Itosu Rohai Sandan'),
(35, 'Jün'),
(36, 'Jion'),
(37, 'Jitte'),
(38, 'Juroku'),
(39, 'Kanchin'),
(40, 'Kanku Dai'),
(41, 'Kanku Sho'),
(42, 'Kanshu'),
(43, 'Kishimoto No Kushanku'),
(44, 'Kousoukum'),
(45, 'Kousoukum Dai'),
(46, 'Kousoukun Sho'),
(47, 'Kururunfa'),
(48, 'Kusanku'),
(49, 'Kyan No Chinto'),
(50, 'Kyan No Wanshu'),
(51, 'Matsukaze'),
(52, 'Matsumura Bassai'),
(53, 'Matsumura Rohai'),
(54, 'Meikyo'),
(55, 'Myojo'),
(56, 'Naifanchin Shodan'),
(57, 'Naifanchin Nidan'),
(58, 'Naifanchin Sandan'),
(59, 'Naihanchi'),
(60, 'Nijushiho'),
(61, 'Nipaipo'),
(62, 'Niseishi'),
(63, 'Ohan'),
(64, 'Ohan Dai'),
(65, 'Oyadomari No Passai'),
(66, 'Pachu'),
(67, 'Paiku'),
(68, 'Papuren'),
(69, ' Passai'),
(70, 'Pinan Shodan'),
(71, 'Pinan Nidan'),
(72, 'Pinan Sandan'),
(73, 'Pinan Yondan'),
(74, 'Pinan Godan'),
(75, 'Rohai'),
(76, 'Saifa'),
(77, 'Sanchin'),
(78, 'Sansai'),
(79, 'Sanseiru'),
(80, 'Sanseru'),
(81, 'Seichin'),
(82, 'Seienchin (Seiyunchin)'),
(83, 'Seipai'),
(84, 'Seiryu'),
(85, 'Seishan'),
(86, 'Seisan (Sesan)'),
(87, 'Shiho Kousoukun'),
(88, 'Shinpa'),
(89, 'Shinsei'),
(90, 'Shisochin'),
(91, 'Sochin'),
(92, 'Suparinpei'),
(93, 'Tekki Shodan'),
(94, 'Tekki Nidan'),
(95, 'Tekki Sandan'),
(96, 'Tensho'),
(97, 'Temari Bassai'),
(98, 'Unshu'),
(99, 'Unsu'),
(100, 'Useishi'),
(101, 'Wankan'),
(102, 'Wanshu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llave`
--

DROP TABLE IF EXISTS `llave`;
CREATE TABLE `llave` (
  `IDLlave` int(11) NOT NULL,
  `Color` enum('Ao','Aka','','') NOT NULL,
  `Categoria` enum('12/13','14/15','16/17','18/mayores') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `llave`
--

INSERT INTO `llave` (`IDLlave`, `Color`, `Categoria`) VALUES
(1, 'Ao', '12/13'),
(2, 'Aka', '14/15'),
(3, 'Aka', '12/13'),
(4, 'Ao', '14/15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntaje`
--

DROP TABLE IF EXISTS `puntaje`;
CREATE TABLE `puntaje` (
  `IDPuntaje` int(11) NOT NULL,
  `IDEquipo` int(11) NOT NULL,
  `IDUsuario` int(11) NOT NULL,
  `IDRonda` int(11) NOT NULL,
  `NumKata` int(11) NOT NULL,
  `Puntaje` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `puntaje`
--

INSERT INTO `puntaje` (`IDPuntaje`, `IDEquipo`, `IDUsuario`, `IDRonda`, `NumKata`, `Puntaje`) VALUES
(1, 1, 3, 2, 1, 5.20),
(2, 2, 3, 2, 2, 9.00),
(3, 3, 3, 1, 3, 6.20),
(4, 4, 3, 1, 4, 6.20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `realiza`
--

DROP TABLE IF EXISTS `realiza`;
CREATE TABLE `realiza` (
  `IDEquipo` int(11) NOT NULL,
  `NumKata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `realiza`
--

INSERT INTO `realiza` (`IDEquipo`, `NumKata`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ronda`
--

DROP TABLE IF EXISTS `ronda`;
CREATE TABLE `ronda` (
  `IDRonda` int(11) NOT NULL,
  `IDLlave` int(11) NOT NULL,
  `EstadoRonda` enum('Inicializada','Finalizada','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ronda`
--

INSERT INTO `ronda` (`IDRonda`, `IDLlave`, `EstadoRonda`) VALUES
(1, 1, 'Finalizada'),
(2, 2, 'Inicializada'),
(3, 3, 'Finalizada'),
(4, 4, 'Inicializada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seencuentraen`
--

DROP TABLE IF EXISTS `seencuentraen`;
CREATE TABLE `seencuentraen` (
  `IDEquipo` int(11) NOT NULL,
  `IDLlave` int(11) NOT NULL,
  `IDTorneo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneo`
--

DROP TABLE IF EXISTS `torneo`;
CREATE TABLE `torneo` (
  `IDTorneo` int(11) NOT NULL,
  `EstadoTorneo` enum('Inicializado','Finalizado','','') NOT NULL,
  `Fecha` date NOT NULL,
  `Genero` enum('Masculino','Femenino','','') NOT NULL,
  `Tipo` enum('Individual','Grupal','','') NOT NULL,
  `Ubicacion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `torneo`
--

INSERT INTO `torneo` (`IDTorneo`, `EstadoTorneo`, `Fecha`, `Genero`, `Tipo`, `Ubicacion`) VALUES
(6, 'Finalizado', '2023-11-05', 'Masculino', 'Individual', 'asd'),
(7, 'Finalizado', '2005-09-20', 'Masculino', 'Individual', 'asdasd'),
(8, 'Finalizado', '2005-09-20', 'Masculino', 'Individual', 'asdasd'),
(9, 'Inicializado', '1200-10-20', 'Masculino', 'Individual', 'adsadsadas'),
(10, 'Inicializado', '1200-10-20', 'Masculino', 'Individual', 'adsadsadas'),
(11, 'Inicializado', '2023-11-20', 'Masculino', 'Individual', 'adsssss'),
(12, 'Inicializado', '2023-11-20', 'Masculino', 'Individual', 'adsssss'),
(13, 'Inicializado', '2023-11-20', 'Masculino', 'Individual', 'adsssss'),
(14, 'Inicializado', '2023-11-20', 'Masculino', 'Individual', 'adsssss'),
(15, 'Inicializado', '2023-11-20', 'Masculino', 'Individual', 'adsssss'),
(16, 'Inicializado', '2023-11-20', 'Masculino', 'Individual', 'adsssss'),
(17, 'Inicializado', '2023-11-20', 'Masculino', 'Individual', 'adsssss'),
(18, 'Inicializado', '2023-11-20', 'Masculino', 'Individual', 'adsssss'),
(19, 'Inicializado', '2023-11-20', 'Masculino', 'Individual', 'adsssss'),
(20, 'Inicializado', '2023-11-20', 'Masculino', 'Individual', 'adsssss'),
(21, 'Inicializado', '2023-11-20', 'Masculino', 'Individual', 'adsssss'),
(22, 'Inicializado', '2023-11-20', 'Masculino', 'Individual', 'adsssss'),
(23, 'Inicializado', '2023-11-20', 'Masculino', 'Individual', 'adsssss'),
(24, 'Inicializado', '1233-09-20', 'Masculino', 'Individual', 'asdddd'),
(25, 'Inicializado', '1233-09-20', 'Masculino', 'Individual', 'asdddd'),
(26, 'Inicializado', '2023-10-20', 'Masculino', 'Individual', 'asd'),
(27, 'Inicializado', '2023-10-20', 'Masculino', 'Individual', 'asd'),
(28, 'Inicializado', '2023-10-20', 'Masculino', 'Individual', 'asd'),
(29, 'Inicializado', '2023-10-20', 'Masculino', 'Individual', 'asd'),
(30, 'Inicializado', '2023-10-20', 'Masculino', 'Grupal', 'asd'),
(31, 'Inicializado', '2023-10-20', 'Masculino', 'Grupal', 'asd'),
(32, 'Inicializado', '2023-10-20', 'Masculino', 'Grupal', 'asd'),
(33, 'Inicializado', '2023-11-06', 'Masculino', 'Individual', 'asddddddd'),
(34, 'Inicializado', '2023-11-06', 'Masculino', 'Individual', 'VBartigas'),
(35, 'Inicializado', '2023-11-06', 'Masculino', 'Individual', 'VBartigas'),
(36, 'Inicializado', '2023-11-06', 'Masculino', 'Individual', 'VBartigas'),
(37, 'Inicializado', '2023-11-06', 'Masculino', 'Individual', 'VBartigas'),
(38, 'Inicializado', '0000-00-00', '', '', ''),
(39, 'Inicializado', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `IDUsuario` int(11) NOT NULL,
  `GrupoUsuario` enum('AdministradorBDKarate','Juez','Juez1','Administrador') NOT NULL,
  `Contraseña` varchar(30) NOT NULL,
  `Nombre` enum('Juez1','Juez2','Juez3','Juez4','Juez5','Juez6','Juez7','Administrador','AdministradorBDKarate') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IDUsuario`, `GrupoUsuario`, `Contraseña`, `Nombre`) VALUES
(1, 'Administrador', 'Administrador', 'Administrador'),
(2, 'AdministradorBDKarate', 'AdministradorBDKarate', 'AdministradorBDKarate'),
(3, 'Juez1', 'Juez', 'Juez1'),
(4, 'Juez', 'Juez', 'Juez2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asiste`
--
ALTER TABLE `asiste`
  ADD PRIMARY KEY (`IDTorneo`,`IDUsuario`),
  ADD KEY `IDUsuario` (`IDUsuario`),
  ADD KEY `IDTorneo` (`IDTorneo`);

--
-- Indices de la tabla `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`CI`);

--
-- Indices de la tabla `competidor`
--
ALTER TABLE `competidor`
  ADD PRIMARY KEY (`IDCompetidor`),
  ADD KEY `IDDojo` (`IDDojo`);

--
-- Indices de la tabla `compite`
--
ALTER TABLE `compite`
  ADD PRIMARY KEY (`IDEquipo`,`IDTorneo`),
  ADD KEY `IDTorneo` (`IDTorneo`),
  ADD KEY `IDEquipo` (`IDEquipo`);

--
-- Indices de la tabla `componen`
--
ALTER TABLE `componen`
  ADD PRIMARY KEY (`IDEquipo`,`IDRonda`,`IDTorneo`),
  ADD KEY `IDTorneo` (`IDTorneo`),
  ADD KEY `IDRonda` (`IDRonda`),
  ADD KEY `IDEquipo` (`IDEquipo`);

--
-- Indices de la tabla `conforma`
--
ALTER TABLE `conforma`
  ADD PRIMARY KEY (`IDCompetidor`,`IDEquipo`),
  ADD KEY `IDEquipo` (`IDEquipo`),
  ADD KEY `IDCompetidor` (`IDCompetidor`);

--
-- Indices de la tabla `constituye`
--
ALTER TABLE `constituye`
  ADD PRIMARY KEY (`IDEquipo`,`NumKata`),
  ADD KEY `IDRonda` (`IDRonda`),
  ADD KEY `NumKata` (`NumKata`),
  ADD KEY `IDEquipo` (`IDEquipo`);

--
-- Indices de la tabla `dirige`
--
ALTER TABLE `dirige`
  ADD PRIMARY KEY (`IDDojo`),
  ADD KEY `CI` (`CI`),
  ADD KEY `IDDojo` (`IDDojo`);

--
-- Indices de la tabla `dojo`
--
ALTER TABLE `dojo`
  ADD PRIMARY KEY (`IDDojo`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`IDEquipo`),
  ADD KEY `IDCompetidor` (`IDCompetidor`);

--
-- Indices de la tabla `kata`
--
ALTER TABLE `kata`
  ADD PRIMARY KEY (`NumKata`);

--
-- Indices de la tabla `llave`
--
ALTER TABLE `llave`
  ADD PRIMARY KEY (`IDLlave`);

--
-- Indices de la tabla `puntaje`
--
ALTER TABLE `puntaje`
  ADD PRIMARY KEY (`IDPuntaje`),
  ADD KEY `IDEquipo` (`IDEquipo`),
  ADD KEY `IDUsuario` (`IDUsuario`),
  ADD KEY `IDRonda` (`IDRonda`),
  ADD KEY `NumKata` (`NumKata`);

--
-- Indices de la tabla `realiza`
--
ALTER TABLE `realiza`
  ADD PRIMARY KEY (`IDEquipo`,`NumKata`),
  ADD KEY `NumKata` (`NumKata`),
  ADD KEY `IDEquipo` (`IDEquipo`);

--
-- Indices de la tabla `ronda`
--
ALTER TABLE `ronda`
  ADD PRIMARY KEY (`IDRonda`),
  ADD KEY `IDLlave` (`IDLlave`);

--
-- Indices de la tabla `seencuentraen`
--
ALTER TABLE `seencuentraen`
  ADD PRIMARY KEY (`IDEquipo`,`IDLlave`,`IDTorneo`),
  ADD KEY `IDLlave` (`IDLlave`),
  ADD KEY `IDTorneo` (`IDTorneo`),
  ADD KEY `IDEquipo` (`IDEquipo`);

--
-- Indices de la tabla `torneo`
--
ALTER TABLE `torneo`
  ADD PRIMARY KEY (`IDTorneo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IDUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `competidor`
--
ALTER TABLE `competidor`
  MODIFY `IDCompetidor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dojo`
--
ALTER TABLE `dojo`
  MODIFY `IDDojo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `IDEquipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `kata`
--
ALTER TABLE `kata`
  MODIFY `NumKata` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `llave`
--
ALTER TABLE `llave`
  MODIFY `IDLlave` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `puntaje`
--
ALTER TABLE `puntaje`
  MODIFY `IDPuntaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ronda`
--
ALTER TABLE `ronda`
  MODIFY `IDRonda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `torneo`
--
ALTER TABLE `torneo`
  MODIFY `IDTorneo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IDUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asiste`
--
ALTER TABLE `asiste`
  ADD  FOREIGN KEY (`IDTorneo`) REFERENCES `torneo` (`IDTorneo`),
  ADD  FOREIGN KEY (`IDUsuario`) REFERENCES `usuarios` (`IDUsuario`);

--
-- Filtros para la tabla `competidor`
--
ALTER TABLE `competidor`
  ADD  FOREIGN KEY (`IDDojo`) REFERENCES `dojo` (`IDDojo`);

--
-- Filtros para la tabla `compite`
--
ALTER TABLE `compite`
  ADD  FOREIGN KEY (`IDTorneo`) REFERENCES `torneo` (`IDTorneo`),
  ADD  FOREIGN KEY (`IDEquipo`) REFERENCES `equipo` (`IDEquipo`);

--
-- Filtros para la tabla `componen`
--
ALTER TABLE `componen`
  ADD  FOREIGN KEY (`IDTorneo`) REFERENCES `torneo` (`IDTorneo`),
  ADD  FOREIGN KEY (`IDEquipo`) REFERENCES `equipo` (`IDEquipo`),
  ADD  FOREIGN KEY (`IDRonda`) REFERENCES `ronda` (`IDRonda`);

--
-- Filtros para la tabla `conforma`
--
ALTER TABLE `conforma`
  ADD  FOREIGN KEY (`IDCompetidor`) REFERENCES `competidor` (`IDCompetidor`),
  ADD  FOREIGN KEY (`IDEquipo`) REFERENCES `equipo` (`IDEquipo`);

--
-- Filtros para la tabla `constituye`
--
ALTER TABLE `constituye`
  ADD  FOREIGN KEY (`IDEquipo`) REFERENCES `equipo` (`IDEquipo`),
  ADD  FOREIGN KEY (`IDRonda`) REFERENCES `ronda` (`IDRonda`),
  ADD  FOREIGN KEY (`NumKata`) REFERENCES `kata` (`NumKata`);

--
-- Filtros para la tabla `dirige`
--
ALTER TABLE `dirige`
  ADD  FOREIGN KEY (`CI`) REFERENCES `coach` (`CI`),
  ADD  FOREIGN KEY (`IDDojo`) REFERENCES `dojo` (`IDDojo`);

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD  FOREIGN KEY (`IDCompetidor`) REFERENCES `competidor` (`IDCompetidor`);

--
-- Filtros para la tabla `puntaje`
--
ALTER TABLE `puntaje`
  ADD  FOREIGN KEY (`IDEquipo`) REFERENCES `equipo` (`IDEquipo`),
  ADD  FOREIGN KEY (`IDUsuario`) REFERENCES `usuarios` (`IDUsuario`),
  ADD  FOREIGN KEY (`IDRonda`) REFERENCES `ronda` (`IDRonda`),
  ADD  FOREIGN KEY (`NumKata`) REFERENCES `kata` (`NumKata`);

--
-- Filtros para la tabla `realiza`
--
ALTER TABLE `realiza`
  ADD   FOREIGN KEY (`IDEquipo`) REFERENCES `equipo` (`IDEquipo`),
  ADD   FOREIGN KEY (`NumKata`) REFERENCES `kata` (`NumKata`);

--
-- Filtros para la tabla `ronda`
--
ALTER TABLE `ronda`
  ADD   FOREIGN KEY (`IDLlave`) REFERENCES `llave` (`IDLlave`);

--
-- Filtros para la tabla `seencuentraen`
--
ALTER TABLE `seencuentraen`
  ADD   FOREIGN KEY (`IDEquipo`) REFERENCES `equipo` (`IDEquipo`),
  ADD   FOREIGN KEY (`IDLlave`) REFERENCES `llave` (`IDLlave`),
  ADD  FOREIGN KEY (`IDTorneo`) REFERENCES `torneo` (`IDTorneo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 04-06-2019 a las 03:42:53
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tutorias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `matricula` varchar(128) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `id_tutor` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`matricula`, `nombre`, `id_carrera`, `id_tutor`) VALUES
('1530012', 'Carla Perez', 1, '1450002'),
('1530019', 'Pedro Perales', 1, '1500235'),
('1530031', 'Ana Gomez', 1, '1500235'),
('1530033', 'Ana Gomez', 1, '1500231'),
('1530061', 'Erick Elizondo Rodriguez', 2, '1500235'),
('1530201', 'Luis Perales', 1, '1550002');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_materia`
--

CREATE TABLE `alumno_materia` (
  `id_alumno` int(128) NOT NULL,
  `id_materia` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno_materia`
--

INSERT INTO `alumno_materia` (`id_alumno`, `id_materia`) VALUES
(1530012, 2),
(1530012, 7),
(1530012, 1),
(1530019, 1),
(1530201, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id`, `nombre`) VALUES
(1, 'Ing. en Tecnologias de la Informacion'),
(2, 'Lic. en Gestion y Administracion de Pequenas y Medianas Empresas'),
(4, 'Ing. en Tecnologias de la Manufactura'),
(5, 'Ing. en Sistemas Automotrices'),
(7, 'Ing. en Ciencias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL,
  `clave` varchar(128) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `cuatrimestre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `clave`, `id_carrera`, `cuatrimestre`) VALUES
(1, 'ITI-2019', 1, 8),
(2, 'ITI-2019-PO666', 1, 6),
(3, 'ITI-2019-PO', 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `num_empleado` varchar(128) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`num_empleado`, `nombre`, `email`, `password`, `id_carrera`, `nivel`) VALUES
('1450002', 'Juan Torres123', 'jt@upv.edu.mx123', '12345', 1, 1),
('1500231', 'Ramon Hernandez Rodriguez', 'superadmin@upv.edu.mx', 'superadmin', 1, 1),
('1500235', 'Jose Ramirez Perez', 'maestro@upv.edu.mx', 'maestro', 1, 0),
('1523122', 'Carlos Perales', 'ca@upv.edu.mx', '12345', 2, 0),
('1540213', 'Pedro Perales', 'pe@upv.edu.mx', '12345', 1, 1),
('1550002', 'Jose Carrizales', 'jose@upv.edu.mx', '12345', 2, 0),
('332312', 'Pancho ROdrigues kk', '1630066@asdasd.com', 'admin', 1, 1),
('3323122', 'EL maestro nuevp', '1636666@asdasd.com', 'admin', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `nombre_corto` varchar(10) NOT NULL,
  `num_empleado` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `nombre`, `nombre_corto`, `num_empleado`) VALUES
(1, 'Algoritmos', 'ALG', '1500235'),
(2, 'Ingles I', 'ING-1', '1500231'),
(3, 'programacion web', 'pwb', '1500231'),
(7, 'Inges II', 'ING-2', '1540213');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_grupo`
--

CREATE TABLE `materia_grupo` (
  `id_materia` int(128) NOT NULL,
  `id_grupo` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia_grupo`
--

INSERT INTO `materia_grupo` (`id_materia`, `id_grupo`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion_alumnos`
--

CREATE TABLE `sesion_alumnos` (
  `matricula_alumno` varchar(128) NOT NULL,
  `id_sesion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sesion_alumnos`
--

INSERT INTO `sesion_alumnos` (`matricula_alumno`, `id_sesion`) VALUES
('1530201', 86),
('1530012', 89),
('1530012', 87),
('1530012', 90);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion_tutoria`
--

CREATE TABLE `sesion_tutoria` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `tipo` varchar(128) NOT NULL,
  `tema` varchar(128) NOT NULL,
  `num_maestro` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sesion_tutoria`
--

INSERT INTO `sesion_tutoria` (`id`, `fecha`, `hora`, `tipo`, `tema`, `num_maestro`) VALUES
(86, '2018-05-28', '15:12:00', 'Grupal', 'Internet', '1500235'),
(87, '2018-05-30', '17:55:00', 'Grupal', 'Tecnologias', '1500235'),
(89, '2019-06-05', '04:03:00', 'Grupal', 'TemaDeAlgo', '1500231'),
(90, '2019-06-27', '12:12:00', 'Grupal', 'TEma de alumno sin cuenta', '1500231');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `tipo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `pass`, `email`, `tipo`) VALUES
(3, 'admin111xxx', 'admin111xxx', 'mario@mario.com', 'Admin'),
(4, 'admin1234', 'admin', 'asdasd@asd.com', 'Admin'),
(5, 'admin', 'admin', 'asdasd@a.com', 'Admin'),
(6, 'mario', 'mario', 'asdasd@a.com', 'Recepcionista');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `id_tutor` (`id_tutor`),
  ADD KEY `id_carrera` (`id_carrera`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`num_empleado`),
  ADD KEY `id_carrera` (`id_carrera`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sesion_alumnos`
--
ALTER TABLE `sesion_alumnos`
  ADD KEY `matricula_alumno` (`matricula_alumno`),
  ADD KEY `id_sesion` (`id_sesion`);

--
-- Indices de la tabla `sesion_tutoria`
--
ALTER TABLE `sesion_tutoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `num_maestro` (`num_maestro`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `sesion_tutoria`
--
ALTER TABLE `sesion_tutoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id`),
  ADD CONSTRAINT `alumnos_ibfk_2` FOREIGN KEY (`id_tutor`) REFERENCES `maestros` (`num_empleado`);

--
-- Filtros para la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD CONSTRAINT `maestros_ibfk_1` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id`);

--
-- Filtros para la tabla `sesion_alumnos`
--
ALTER TABLE `sesion_alumnos`
  ADD CONSTRAINT `sesion_alumnos_ibfk_1` FOREIGN KEY (`matricula_alumno`) REFERENCES `alumnos` (`matricula`),
  ADD CONSTRAINT `sesion_alumnos_ibfk_2` FOREIGN KEY (`id_sesion`) REFERENCES `sesion_tutoria` (`id`);

--
-- Filtros para la tabla `sesion_tutoria`
--
ALTER TABLE `sesion_tutoria`
  ADD CONSTRAINT `sesion_tutoria_ibfk_1` FOREIGN KEY (`num_maestro`) REFERENCES `maestros` (`num_empleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

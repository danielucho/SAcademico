-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-08-2022 a las 02:45:29
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `id` int(11) NOT NULL,
  `observacion` varchar(255) NOT NULL,
  `carrera_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `docente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asignacion`
--

INSERT INTO `asignacion` (`id`, `observacion`, `carrera_id`, `materia_id`, `docente_id`) VALUES
(1, 'Ninguna', 9, 98, 9),
(2, 'Ninguna', 10, 99, 3),
(3, 'Ninguna', 16, 93, 3),
(4, 'Ninguna', 16, 95, 3),
(5, 'Ninguna', 10, 100, 3),
(6, 'Ninguna', 10, 102, 3),
(7, 'Ninguna', 16, 94, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cod_carrera` varchar(255) NOT NULL,
  `tipo_carrera` varchar(255) NOT NULL,
  `nivel_carrera` varchar(255) NOT NULL,
  `duracion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id`, `nombre`, `cod_carrera`, `tipo_carrera`, `nivel_carrera`, `duracion`) VALUES
(9, 'SECRETARIADO', 'SEC', 'SEMESTRAL', 'CAPACITACIÓN', 'MEDIO AÑO'),
(10, 'BELLEZA INTEGRAL', 'BI', 'SEMESTRAL', 'TÉCNICO MEDIO', '2 AÑOS'),
(11, 'GASTRONIMIA Y ALIMENTACIÓN', 'GA', 'SEMESTRAL', 'TÉCNICO MEDIO', '2 AÑOS'),
(13, 'CONFECCIÓN TEXTIL', 'CT', 'SEMESTRAL', 'TÉCNICO MEDIO', '2 AÑOS'),
(14, 'METAL MECANICA', 'MM', 'SEMESTRAL', 'TÉCNICO AUXILIAR', '2 AÑOS'),
(15, 'ELECTRICIDAD INDUSTRIAL', 'EI', 'SEMESTRAL', 'TÉCNICO MEDIO', '2 AÑOS'),
(16, 'CONTABILIDAD', 'CON', 'SEMESTRAL', 'TÉCNICO MEDIO', '2 AÑOS'),
(17, 'SECRETARIADO EJECUTIVO', 'SE', 'SEMESTRAL', 'TÉCNICO AUXILIAR', '2 AÑOS'),
(18, 'PARVULARIA', 'PAR', 'SEMESTRAL', 'TÉCNICO MEDIO', '2 AÑOS'),
(19, 'SISTEMAS INFORMATICOS', 'SI', 'SEMESTRAL', 'TÉCNICO MEDIO', '2 AÑOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera_materia`
--

CREATE TABLE `carrera_materia` (
  `id` int(11) NOT NULL,
  `semestre` int(11) NOT NULL,
  `carrera_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `dia` varchar(15) DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `nivel` varchar(15) DEFAULT NULL,
  `paralelo` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrera_materia`
--

INSERT INTO `carrera_materia` (`id`, `semestre`, `carrera_id`, `materia_id`, `dia`, `hora_inicio`, `hora_fin`, `nivel`, `paralelo`) VALUES
(9, 0, 10, 99, 'Lunes', '17:00:00', '22:00:00', 'BASICO', 'B'),
(10, 0, 10, 100, 'Lunes', '17:00:00', '22:00:00', 'AUXILIAR', 'A'),
(11, 0, 10, 101, 'Martes', '19:00:00', '22:00:00', 'BASICO', 'B'),
(12, 0, 10, 102, 'Jueves', '19:00:00', '22:00:00', 'BASICO', 'B'),
(13, 0, 16, 94, 'Lunes', '19:00:00', '22:00:00', 'BASICO', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`id`, `persona_id`, `tipo`) VALUES
(3, 12, 'Interino'),
(9, 53, 'Titular y Coordinador'),
(10, 55, 'Titular y Coordinador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `observacion` varchar(255) NOT NULL,
  `habilitar` varchar(2) NOT NULL DEFAULT 'si'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `persona_id`, `observacion`, `habilitar`) VALUES
(13, 51, 'Ninguno', 'si'),
(14, 52, 'Ninguno', 'si'),
(15, 54, 'Ninguno', 'si'),
(16, 56, 'Ninguno', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id` int(11) NOT NULL,
  `periodo` varchar(2) DEFAULT NULL,
  `gestion` varchar(4) NOT NULL,
  `estudiante_id` int(11) NOT NULL,
  `materia_id` int(11) DEFAULT NULL,
  `carrera_id` int(11) DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `carrera_materia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`id`, `periodo`, `gestion`, `estudiante_id`, `materia_id`, `carrera_id`, `semestre`, `carrera_materia_id`) VALUES
(182, 'II', '2022', 13, NULL, NULL, NULL, 10),
(183, 'II', '2022', 16, NULL, NULL, NULL, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardixta`
--

CREATE TABLE `kardixta` (
  `id` int(11) NOT NULL,
  `rol` varchar(255) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `observacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `kardixta`
--

INSERT INTO `kardixta` (`id`, `rol`, `codigo`, `persona_id`, `observacion`) VALUES
(5, 'Administrador', 'admin', 9, 'Ninguna'),
(6, 'Administrador', 'PCC101094', 49, 'Ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cod_materia` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id`, `nombre`, `cod_materia`, `descripcion`) VALUES
(93, 'MATEMATICA APLICADA FINANCIERA', 'MAT-APLI', ''),
(94, 'CONTABILIDAD BASICA', 'CONT-BAS', ''),
(95, 'DOCUMENTOS MERCANTILES', 'DOC-MER', ''),
(96, 'DOCUMENTOS MERCANTILES', 'DOC-MER', ''),
(97, 'REDACCION Y CORRESPONDENCIA I', 'RED-CORR-I', ''),
(98, 'MECANOGRAFIA', 'MEC', ''),
(99, 'RELACIONES HUMANAS', 'REL-HUM', ''),
(100, 'ESTETIACA DE MANOS Y PIES', 'EST-MAN-PIE', ''),
(101, 'CORTES BASICOS', 'COR-BAS', ''),
(102, 'ESTETICA FACIAL', 'EST-FAC', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `id` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `observacion` varchar(255) NOT NULL,
  `inscripcion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nota`
--

INSERT INTO `nota` (`id`, `nota`, `observacion`, `inscripcion_id`) VALUES
(4, 51, 'Ninguno', 183);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `ci` varchar(10) NOT NULL,
  `paterno` varchar(255) NOT NULL,
  `materno` varchar(255) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `celular` varchar(10) NOT NULL,
  `nacimiento` date NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `correo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `ci`, `paterno`, `materno`, `nombres`, `celular`, `nacimiento`, `direccion`, `foto`, `estado`, `correo`) VALUES
(8, '9122770', 'GOMEZ', 'BOLAÑOS', 'ROBERTO', '78965412', '2021-09-01', 'ENRIQUE SEGOVIANO', 'img.png', 'SI', NULL),
(9, '787878', 'DANIEL', 'COPA', 'BOBARIN', '71970724', '1994-05-15', 'ZONA MUNAYPATA', '', 'SI', NULL),
(10, '430311100', 'AVERANGA', 'MAYTA', 'RONALD', '71203902', '1990-04-08', 'ASDASDASD', '', 'SI', ''),
(11, '9121702', 'CORI', 'ALVAREZ', 'ROGER', '69758585', '1993-07-25', 'Z/ MUNAYPATA C/ FRANZ TAMAYO', 'ROGER.JPG', 'SI', NULL),
(12, '123', 'MARTA', 'SANCHEZ', 'JUSTA', '79707039', '2022-04-21', '', '', 'SI', NULL),
(13, '2920311', 'PEREZ', 'TICONA', 'BERNABE', '67544490', '2022-04-22', '', '', 'SI', ''),
(14, '', '', '', '', '', '0000-00-00', '', '', 'SI', NULL),
(20, '77777', 'ALANOCA', 'SOLIZ', 'BRUNO', '76501211', '2021-09-08', 'ASDASDASD', 'adad', 'SI', NULL),
(21, '123', 'SALINAZ', 'DURAN', 'MARIOIM', '6954030', '2022-04-22', '', '', 'SI', NULL),
(22, '123', 'COPAAA', 'BOBARIN', 'FELIPEEEEEE', '123', '2022-04-22', '', '', 'SI', NULL),
(23, '123', 'COPA', 'BOBARIN', 'FELIPE', '123', '2022-04-22', '', '', 'SI', NULL),
(24, '123', 'COPA', 'BOBARIN', 'FELIPEEEEEEASAS', '123', '2022-04-22', '', '', 'SI', NULL),
(25, '123', 'COPA', 'BOBARIN', 'FELIPEEEEEEASAS', '123', '2022-04-22', '', '', 'SI', NULL),
(26, '123', 'COPA', 'BOBARIN', 'FELIPE', '123', '2022-04-22', '', '', 'SI', NULL),
(27, '7107072', 'PEREZ', 'CHAVEZ', 'MITON', '7197024', '2005-01-19', '', '', 'SI', NULL),
(31, '7197221', '', '', '', '', '0000-00-00', '', '', 'SI', NULL),
(40, '123456', 'COPA', 'BOBARIN', 'DANIEL', '71970724', '1994-05-12', '', '../perfil/', 'SI', ''),
(45, '', '', '', '', '', '0000-00-00', '', '../perfil/', 'SI', ''),
(46, 'qw', 'QW', '', 'QW', '', '0000-00-00', '', '../perfil/', 'SI', ''),
(48, '6766838', 'COPA', 'BOBARIN', 'DANIEL', '', '1994-05-26', '', '../perfil/', 'SI', ''),
(49, '1234567', 'PACARI', 'CHOQUE', 'CINDEL', '', '1994-10-10', '', '', 'SI', NULL),
(51, '12345678', 'TEST2', 'TEST2', 'TEST2', '', '1991-02-02', '', '', 'SI', ''),
(52, '1234', 'Q', 'Q', 'Q', '', '1994-03-03', '', '../perfil/', 'SI', ''),
(53, '1111', 'TEST', 'TEST', 'TEST', '', '1990-05-05', '', '', 'SI', NULL),
(54, '4782047', 'CADENA', 'MAMANI', 'YOMAR AQUELINA', '', '1980-04-23', '', '../perfil/', 'SI', ''),
(55, '6766838', 'COPA', 'BOBARIN', 'DANIEL', '', '1994-05-26', '', '', 'SI', NULL),
(56, '10101010', 'PRUEBA', 'PRUEBA', 'PRUEBA', '', '1990-07-26', '', '../perfil/', 'SI', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pertenece_carrera`
--

CREATE TABLE `pertenece_carrera` (
  `id` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  `estudiante_id` int(11) NOT NULL,
  `carrera_id` int(11) NOT NULL,
  `semestre` int(11) DEFAULT NULL,
  `estado` varchar(15) DEFAULT 'activo',
  `nivel` varchar(15) DEFAULT NULL,
  `paralelo` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pertenece_carrera`
--

INSERT INTO `pertenece_carrera` (`id`, `matricula`, `estudiante_id`, `carrera_id`, `semestre`, `estado`, `nivel`, `paralelo`) VALUES
(95, 14, 13, 10, 2, 'activo', 'Auxiliar', 'A'),
(96, 15, 16, 16, 2, 'activo', 'Basico', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `persona_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `password`, `persona_id`) VALUES
(6, 'GBR010921', '789456', 8),
(7, 'admin', 'admin', 9),
(23, 'PCC101094', 'admin', 49),
(29, 'CBD260594', '1234', 55),
(30, 'PPP260790', '1234', 56);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carrera_id` (`carrera_id`),
  ADD KEY `docente_id` (`docente_id`),
  ADD KEY `materia_id` (`materia_id`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carrera_materia`
--
ALTER TABLE `carrera_materia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carrera_id` (`carrera_id`),
  ADD KEY `materia_id` (`materia_id`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persona_id` (`persona_id`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persona_id` (`persona_id`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estudiante_id` (`estudiante_id`),
  ADD KEY `materia_id` (`materia_id`),
  ADD KEY `carrera_id` (`carrera_id`);

--
-- Indices de la tabla `kardixta`
--
ALTER TABLE `kardixta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persona_id` (`persona_id`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inscripcion_id` (`inscripcion_id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pertenece_carrera`
--
ALTER TABLE `pertenece_carrera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carrera_id` (`carrera_id`),
  ADD KEY `estudiante_id` (`estudiante_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persona_id` (`persona_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `carrera_materia`
--
ALTER TABLE `carrera_materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT de la tabla `kardixta`
--
ALTER TABLE `kardixta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `nota`
--
ALTER TABLE `nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `pertenece_carrera`
--
ALTER TABLE `pertenece_carrera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD CONSTRAINT `asignacion_ibfk_1` FOREIGN KEY (`carrera_id`) REFERENCES `carrera` (`id`),
  ADD CONSTRAINT `asignacion_ibfk_2` FOREIGN KEY (`docente_id`) REFERENCES `docente` (`id`),
  ADD CONSTRAINT `asignacion_ibfk_3` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`id`);

--
-- Filtros para la tabla `carrera_materia`
--
ALTER TABLE `carrera_materia`
  ADD CONSTRAINT `carrera_materia_ibfk_1` FOREIGN KEY (`carrera_id`) REFERENCES `carrera` (`id`),
  ADD CONSTRAINT `carrera_materia_ibfk_2` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`id`);

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `docente_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `inscripcion_ibfk_1` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiante` (`id`),
  ADD CONSTRAINT `inscripcion_ibfk_2` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`id`),
  ADD CONSTRAINT `inscripcion_ibfk_3` FOREIGN KEY (`carrera_id`) REFERENCES `carrera` (`id`);

--
-- Filtros para la tabla `kardixta`
--
ALTER TABLE `kardixta`
  ADD CONSTRAINT `kardixta_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`inscripcion_id`) REFERENCES `inscripcion` (`id`);

--
-- Filtros para la tabla `pertenece_carrera`
--
ALTER TABLE `pertenece_carrera`
  ADD CONSTRAINT `pertenece_carrera_ibfk_1` FOREIGN KEY (`carrera_id`) REFERENCES `carrera` (`id`),
  ADD CONSTRAINT `pertenece_carrera_ibfk_2` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiante` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

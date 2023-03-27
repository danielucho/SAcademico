
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
(11, 'GASTRONIMIA Y ALIMENTACIÓN', 'GA', 'GA', 'TÉCNICO MEDIO', '2 AÑOS'),
(12, 'PARVULARIA', 'PAR', 'PAR', 'TÉCNICO MEDIO', '2 AÑOS'),
(13, 'CONFECCIÓN TEXTIL', 'CT', 'CT', 'TÉCNICO MEDIO', '2 AÑOS'),
(14, 'METAL MECANICA', 'MM', 'MM', 'TÉCNICO MEDIO', '2 AÑOS'),
(15, 'ELECTRICIDAD INDUSTRIAL', 'EI', 'EI', 'TÉCNICO MEDIO', '2 AÑOS'),
(16, 'CONTABILIDAD', 'CON', 'CON', 'TÉCNICO MEDIO', '2 AÑOS'),
(17, 'SECRETARIADO EJECUTIVO', 'SE', 'SE', 'TÉCNICO MEDIO', '2 AÑOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera_materia`
--

CREATE TABLE `carrera_materia` (
  `id` int(11) NOT NULL,
  `semestre` int(11) NOT NULL,
  `carrera_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(4, 33, 'Interino'),
(5, 34, 'Interino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `observacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `persona_id`, `observacion`) VALUES
(2, 8, 'Ninguno'),
(3, 10, 'Ninguno'),
(4, 11, 'Ninguno'),
(5, 13, 'Ninguno'),
(6, 15, 'Ninguno'),
(7, 35, 'Ninguno'),
(8, 39, 'Ninguno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id` int(11) NOT NULL,
  `periodo` varchar(2) NOT NULL,
  `gestion` varchar(4) NOT NULL,
  `estudiante_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `carrera_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`id`, `periodo`, `gestion`, `estudiante_id`, `materia_id`, `carrera_id`) VALUES
(33, 'I', '2022', 3, 1, 9);

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
(5, 'Administrador', 'admin', 9, 'Ninguna');

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
(1, 'Historia y evolución de la industria de la hospitalidad', 'AAA - 111', 'Nuevo contenido de la materia'),
(2, 'Teorìa del turismo', 'AAA - 112', ''),
(3, 'Administración I', 'AAA - 113', ''),
(4, 'Geografía turística de Bolivia', 'AAA - 114', ''),
(5, 'Administración II', 'AAA - 115', ''),
(6, 'Metodología de la investigación', 'AAA - 116', ''),
(7, 'Organización y gestión hotelera', 'AAA - 117', ''),
(8, 'Historia y desarrollo de las sociedades', 'AAA - 118', ''),
(9, 'Gestión y tecnología de alojamiento I', 'AAA - 119', ''),
(10, 'Impacto ambiental de la actividad hotelera', 'AAA - 120', ''),
(11, 'Gestión y tecnología de alojamiento II', 'AAA - 121', ''),
(12, 'Eficiencia energética y energías renovables', 'AAA - 122', ''),
(13, 'Tecnología del área de recepción I', 'AAA - 211', ''),
(14, 'Inglés I', 'AAA - 212', ''),
(15, 'Tecnología del área de recepción II', 'AAA - 213', ''),
(16, 'Inglés II', 'AAA - 214', ''),
(17, 'Tecnología del área de recepción III', 'AAA - 215', ''),
(18, 'Inglés III', 'AAA - 216', ''),
(19, 'Contabilidad I', 'AAA - 217', ''),
(20, 'Aymara I', 'AAA - 218', ''),
(21, 'Contabilidad II', 'AAA - 219', ''),
(22, 'Aymara II', 'AAA - 220', ''),
(23, 'Control de costos en habitaciones', 'AAA - 221', ''),
(24, 'Lavandería', 'AAA - 222', ''),
(25, 'Normativa turística I', 'AAA - 311', ''),
(26, 'Seguridad en establecimientos de hospedaje', 'AAA - 312', ''),
(27, 'Normativa turística II', 'AAA - 313', ''),
(28, 'Organización del servicio de mantenimiento', 'AAA - 314', ''),
(29, 'Diseño y equipamiento de eco-hoteles I', 'AAA - 315', ''),
(30, 'Legislación laboral aplicada', 'AAA - 316', ''),
(31, 'Diseño y equipamiento de eco-hoteles II', 'AAA - 317', ''),
(32, 'Gestión de recursos humanos I', 'AAA - 318', ''),
(33, 'Estadistica aplicada I', 'AAA - 319', ''),
(34, 'Gestión de recursos humanos II', 'AAA - 320', ''),
(35, 'Estadistica aplicada II', 'AAA - 321', ''),
(36, 'Atención al cliente', 'AAA - 322', ''),
(37, 'Fundamentos de la organización en A y B', 'AAA - 411', ''),
(38, 'Inocuidad y control de calidad en los alimentos', 'AAA - 412', ''),
(39, 'Organización y gestión de la cocina', 'AAA - 413', ''),
(40, 'Higiene y manipulación de alimentos', 'AAA - 414', ''),
(41, 'Cocina básica I', 'AAA - 415', ''),
(42, 'Fundamentos de nutrición', 'AAA - 416', ''),
(43, 'Cocina básica II', 'AAA - 417', ''),
(44, 'Ingeniería de menús y diseños de cartas', 'AAA - 418', ''),
(45, 'Cocina básica III', 'AAA - 419', ''),
(46, 'Organización y gestión del bar y restaurante', 'AAA - 420', ''),
(47, 'Restaurantes temáticos y restaurantes sostenibles', 'AAA - 421', ''),
(48, 'Pensamiento contemporáneo y cosmovisiones', 'AAA - 422', ''),
(49, 'Prácticas de etiqueta y protocolo en el restaurante I', 'AAA - 511', ''),
(50, 'Tecnología y técnicas del bar I', 'AAA - 512', ''),
(51, 'Prácticas de etiqueta y protocolo en el restaurante II', 'AAA - 513', ''),
(52, 'Tecnología y técnicas del bar II', 'AAA - 514', ''),
(53, 'Organización y gestión del depto. De eventos y banquetes I', 'AAA - 515', ''),
(54, 'Enología y cata de vinos I', 'AAA - 516', ''),
(55, 'Costos en alimentos y bebidas I', 'AAA - 517', ''),
(56, 'Enología y cata de vinos II', 'AAA - 518', ''),
(57, 'Costos en alimentos y bebidas II', 'AAA - 519', ''),
(58, 'Prácticas sostenibles para hoteles y restaurantes', 'AAA - 520', ''),
(59, 'Costos en alimentos y bebidas III', 'AAA - 521', ''),
(60, 'Certificaciones mundiales a la calidad y sostenibilidad', 'AAA - 522', ''),
(61, 'Fundamentos de marketing', 'AAA - 611', ''),
(62, 'Estrucutra del mercado turístico boliviano', 'AAA - 612', ''),
(63, 'Plan de marketing I', 'AAA - 613', ''),
(64, 'Ética y deontología profesional I', 'AAA - 614', ''),
(65, 'Plan de marketing II', 'AAA - 615', ''),
(66, 'Ética y deontología profesional II', 'AAA - 616', ''),
(67, 'Técnicas de comercialización', 'AAA - 617', ''),
(68, 'Innovación técnica y tecnología en la hotelería del siglo XXI', 'AAA - 618', ''),
(69, 'Diseño de material promocional', 'AAA - 619', ''),
(70, 'Formulación y evaluación de proyectos I', 'AAA - 620', ''),
(71, 'Marketing directo', 'AAA - 621', ''),
(72, 'Formulación y evaluación de proyectos II', 'AAA - 622', '');

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
(9, '787878', 'DANIEL', 'COPA', 'BOBARIN', '71970724', '1994-05-15', 'ZONA MUNAYPATA', 'image.jpg', 'SI', NULL),
(10, '430311100', 'AVERANGA', 'MAYTA', 'RONALD', '71203902', '1990-04-08', 'ASDASDASD', '', 'SI', NULL),
(11, '9121702', 'CORI', 'ALVAREZ', 'ROGER', '69758585', '1993-07-25', 'Z/ MUNAYPATA C/ FRANZ TAMAYO', 'ROGER.JPG', 'SI', NULL),
(12, '123', 'MARTA', 'SANCHEZ', 'JUSTA', '79707039', '2022-04-21', '', '', 'SI', NULL),
(13, '2920311', 'PEREZ', 'TICONA', 'BERNABE', '67544490', '2022-04-22', '', '', 'SI', NULL),
(14, '', '', '', '', '', '0000-00-00', '', '', 'SI', NULL),
(15, '3023111', 'GARCIA', 'GARNIZA', 'FERNANDO', '60696950', '2022-04-24', 'PORTADA', '', 'SI', NULL),
(20, '77777', 'ALANOCA', 'SOLIZ', 'BRUNO', '76501211', '2021-09-08', 'ASDASDASD', 'adad', 'SI', NULL),
(21, '123', 'SALINAZ', 'DURAN', 'MARIOIM', '6954030', '2022-04-22', '', '', 'SI', NULL),
(22, '123', 'COPAAA', 'BOBARIN', 'FELIPEEEEEE', '123', '2022-04-22', '', '', 'SI', NULL),
(23, '123', 'COPA', 'BOBARIN', 'FELIPE', '123', '2022-04-22', '', '', 'SI', NULL),
(24, '123', 'COPA', 'BOBARIN', 'FELIPEEEEEEASAS', '123', '2022-04-22', '', '', 'SI', NULL),
(25, '123', 'COPA', 'BOBARIN', 'FELIPEEEEEEASAS', '123', '2022-04-22', '', '', 'SI', NULL),
(26, '123', 'COPA', 'BOBARIN', 'FELIPE', '123', '2022-04-22', '', '', 'SI', NULL),
(27, '7107072', 'PEREZ', 'CHAVEZ', 'MITON', '7197024', '2005-01-19', '', '', 'SI', NULL),
(31, '7197221', '', '', '', '', '0000-00-00', '', '', 'SI', NULL),
(33, '659431', 'CUAQUIRA', 'CHOQUE', 'SILVIA', '76019110', '1990-03-10', '', '', 'SI', NULL),
(34, '67668483', 'POLO', 'QUISPE', 'MARIA', '7192312', '1880-05-01', 'MUNAYPATA', '', 'SI', NULL),
(35, '5744333', 'LUNA', 'LUNA', 'IRIS', '7193210', '1890-03-12', '', '', 'SI', 'iri_a@gmail.com'),
(39, '494912', 'QUISPE', 'TINCUTA', 'ALEX', '7393000', '1995-05-26', '', '../perfil/3.png', 'SI', 'alex@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pertenece_carrera`
--

CREATE TABLE `pertenece_carrera` (
  `id` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  `estudiante_id` int(11) NOT NULL,
  `carrera_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pertenece_carrera`
--

INSERT INTO `pertenece_carrera` (`id`, `matricula`, `estudiante_id`, `carrera_id`) VALUES
(17, 1, 3, 11);

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
(8, 'BBB080921', 'abc', 10),
(10, 'CBD210422', '123456', 12),
(11, 'CBF220422', '123456', 13),
(12, 'CBD240422', '123456', 15),
(13, 'CCD100390', '123456', 33),
(14, 'PQM010580', '123456', 34),
(15, 'LLI120390', '123456', 35),
(16, 'QTA260595', '123456', 39);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `carrera_materia`
--
ALTER TABLE `carrera_materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `kardixta`
--
ALTER TABLE `kardixta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `nota`
--
ALTER TABLE `nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `pertenece_carrera`
--
ALTER TABLE `pertenece_carrera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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

-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2024 a las 04:05:13
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `soma_helpdesk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_roles`
--

CREATE TABLE `t_cat_roles` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(245) NOT NULL,
  `descripcion` varchar(245) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_cat_roles`
--

INSERT INTO `t_cat_roles` (`id_rol`, `nombre`, `descripcion`) VALUES
(1, 'soporte', 'Es un cliente'),
(2, 'admin', 'Es Admin'),
(3, 'tecnico', 'Es un tecnico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_persona`
--

CREATE TABLE `t_persona` (
  `id_persona` int(11) NOT NULL,
  `paterno` varchar(245) NOT NULL,
  `materno` varchar(245) DEFAULT NULL,
  `nombre` varchar(245) NOT NULL,
  `fecha_nacimiento` varchar(245) NOT NULL,
  `sexo` varchar(2) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `correo` varchar(245) DEFAULT NULL,
  `fechaInsert` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_persona`
--

INSERT INTO `t_persona` (`id_persona`, `paterno`, `materno`, `nombre`, `fecha_nacimiento`, `sexo`, `telefono`, `correo`, `fechaInsert`) VALUES
(1, 'Help', 'Desk', 'Maria Cris', '2022-11-08', 'M', '3203623366', 'helpdesk@gmail.com', '2022-10-28 19:32:25'),
(16, 'oficina', '', 'soporte', '2024-11-10', 'F', '', '', '2024-11-10 12:17:17'),
(17, 'Campo', '', 'Tecnico', '2024-11-10', 'F', '', '', '2024-11-10 12:17:53'),
(18, '1', '1', '1', '2024-11-10', 'F', '1', '1', '2024-11-10 12:51:42'),
(19, '2', '2', '2', '2024-11-11', 'F', '2', '2', '2024-11-10 14:12:59'),
(20, '3', '3', '3', '2024-11-10', 'F', '3', '3', '2024-11-10 20:20:32'),
(21, 'Sanchez', 'Florez', 'Carlos', '1998-02-03', 'M', '3581593574', 'mail@gmail.com', '2024-11-10 23:47:38'),
(22, 'Arroyo', 'Matapi', 'Juan', '2024-11-01', 'F', '3585698545', 'mailmapati', '2024-11-12 20:32:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_session`
--

CREATE TABLE `t_session` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_sesion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_tickets`
--

CREATE TABLE `t_tickets` (
  `id_tickets` int(11) NOT NULL,
  `nombre_cliente` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `celular` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `zona` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_actividad` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `hora` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `tecnico` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `auxiliar` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `estado_tickets` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `t_tickets`
--

INSERT INTO `t_tickets` (`id_tickets`, `nombre_cliente`, `celular`, `direccion`, `zona`, `tipo_actividad`, `fecha`, `hora`, `tecnico`, `auxiliar`, `descripcion`, `estado_tickets`) VALUES
(1, 'Ramiro', '0', 'cra 1', 'Coello', 'mantenimiento fibra', '10/11/2024', '02:30 pm', '', '', 'fibra rota', 1),
(2, 'Carlos Gomez', '3205821658', 'cra 1 # 52 38', 'Coello', 'Mantenimiento Antena', '02/03/2024', '10:00 a.m', 'Andres Cruz', 'Edwin Lopez', 'Antena desalineada, llevar escalera', 2),
(3, 'Matias Gomez', '3205821658', 'cra 1 # 52 38', 'Coello', 'Mantenimiento Antena', '02/03/2024', '10:00 a.m', 'Andres Cruz', 'Edwin Lopez', 'Antena desalineada, llevar escalera', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

CREATE TABLE `t_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `usuario` varchar(245) NOT NULL,
  `password` varchar(245) NOT NULL,
  `ubicacion` text,
  `activo` int(11) NOT NULL DEFAULT '1',
  `fecha_insert` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`id_usuario`, `id_rol`, `id_persona`, `usuario`, `password`, `ubicacion`, `activo`, `fecha_insert`) VALUES
(5, 2, 1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', NULL, 1, NULL),
(6, 1, 16, 'soporte', '97173f85e40441cc63f643162a756ed8f615502e', '', 1, NULL),
(7, 3, 17, 'tecnico', '047e19bf658ccca0dfe3617c1fad3bdce9b4fdec', '', 1, NULL),
(8, 1, 18, '1', '356a192b7913b04c54574d18c28d46e6395428ab', '', 1, NULL),
(11, 1, 21, 'Carlos', '65184963b4f0c19f14cca0016b5b92ecc62d9df4', 'Coello', 1, NULL),
(12, 2, 22, 'matapi', '06654e7f5959df01ecda457c502dce856fae2f86', 'cc', 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_cat_roles`
--
ALTER TABLE `t_cat_roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `t_session`
--
ALTER TABLE `t_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkSession_idx` (`id_usuario`);

--
-- Indices de la tabla `t_tickets`
--
ALTER TABLE `t_tickets`
  ADD PRIMARY KEY (`id_tickets`);

--
-- Indices de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fkPersona_idx` (`id_persona`),
  ADD KEY `fkRoles_idx` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_cat_roles`
--
ALTER TABLE `t_cat_roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `t_session`
--
ALTER TABLE `t_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_tickets`
--
ALTER TABLE `t_tickets`
  MODIFY `id_tickets` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_session`
--
ALTER TABLE `t_session`
  ADD CONSTRAINT `fkSession` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD CONSTRAINT `fkPersona` FOREIGN KEY (`id_persona`) REFERENCES `t_persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkRoles` FOREIGN KEY (`id_rol`) REFERENCES `t_cat_roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

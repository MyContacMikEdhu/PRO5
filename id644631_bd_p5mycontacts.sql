-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-01-2017 a las 18:24:46
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id644631_bd_p5mycontacts`
--
CREATE DATABASE IF NOT EXISTS `id644631_bd_p5mycontacts` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `id644631_bd_p5mycontacts`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contactos`
--

CREATE TABLE `tbl_contactos` (
  `cont_id` int(11) NOT NULL,
  `cont_nombre` varchar(15) NOT NULL,
  `cont_apellido` varchar(35) NOT NULL,
  `cont_correo` varchar(50) NOT NULL,
  `cont_dir_casa` varchar(200) NOT NULL,
  `cont_dir_otro` varchar(200) NOT NULL,
  `cont_tlf` varchar(9) NOT NULL,
  `cont_movil` varchar(9) NOT NULL,
  `cont_fecha_n` date NOT NULL,
  `cont_tipo` enum('Familia','Amigos','Trabajo','Otro') NOT NULL,
  `usu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_correo` varchar(50) NOT NULL,
  `usu_pass` varchar(15) NOT NULL,
  `usu_dir_casa` varchar(200) NOT NULL,
  `usu_dir_otro` varchar(200) NOT NULL,
  `usu_tlf` varchar(9) NOT NULL,
  `usu_movil` varchar(9) NOT NULL,
  `usu_estado` tinyint(1) NOT NULL,
  `usu_nombre` varchar(15) NOT NULL,
  `usu_apellidos` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_contactos`
--
ALTER TABLE `tbl_contactos`
  ADD PRIMARY KEY (`cont_id`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_contactos`
--
ALTER TABLE `tbl_contactos`
  MODIFY `cont_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

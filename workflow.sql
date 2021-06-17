-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 05:33 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workflow`
--

-- --------------------------------------------------------

--
-- Table structure for table `cargatrabajo`
--

CREATE TABLE `cargatrabajo` (
  `idCarga` int(11) NOT NULL,
  `codFlujo` varchar(3) NOT NULL,
  `codProceso` varchar(3) NOT NULL,
  `Peso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cargatrabajo`
--

INSERT INTO `cargatrabajo` (`idCarga`, `codFlujo`, `codProceso`, `Peso`) VALUES
(1, 'F1', 'P4', 5),
(2, 'F3', 'P5', 7),
(3, 'F3', 'P8', 3);

-- --------------------------------------------------------

--
-- Table structure for table `documento`
--

CREATE TABLE `documento` (
  `id` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `ci` varchar(200) NOT NULL,
  `certNaci` varchar(200) NOT NULL,
  `certLegalizado` varchar(200) NOT NULL,
  `nroTramite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documento`
--

INSERT INTO `documento` (`id`, `idAlumno`, `ci`, `certNaci`, `certLegalizado`, `nroTramite`) VALUES
(57, 1, 'documentos/1/ci.jpg', 'documentos/1/cn.jpg', 'documentos/1/fl.jpg', 38),
(59, 21, 'documentos/21/ci_1.jpg', 'documentos/21/cn_1.jpg', 'documentos/21/fl_1.jpg', 41),
(62, 22, 'documentos/22/ci_2.jpg', 'documentos/22/cn_3.jpg', 'documentos/22/fl_2.jpg', 64),
(63, 22, 'documentos/22/ci_2.jpg', 'documentos/22/cn_3.jpg', 'documentos/22/fl_2.jpg', 67);

-- --------------------------------------------------------

--
-- Table structure for table `flujo`
--

CREATE TABLE `flujo` (
  `Flujo` varchar(3) DEFAULT NULL,
  `proceso` varchar(3) DEFAULT NULL,
  `tipoproceso` varchar(3) DEFAULT NULL,
  `roles` varchar(2) DEFAULT NULL,
  `procesosiguiente` varchar(3) DEFAULT NULL,
  `formulario` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flujo`
--

INSERT INTO `flujo` (`Flujo`, `proceso`, `tipoproceso`, `roles`, `procesosiguiente`, `formulario`) VALUES
('F1', 'P1', 'P', 'U', 'P2', 'Notas'),
('F1', 'P2', 'P', 'U', 'P3', 'checkDocumentos'),
('F1', 'P3', 'S', 'U', 'P4', 'SubidaDocumentos'),
('F1', 'P4', 'C', 'K', NULL, 'Condicionante'),
('F1', 'P5', 'P', 'K', 'P6', 'Informe'),
('F1', 'P6', 'P', 'K', 'P7', 'AnotarDoc'),
('F1', 'P7', 'P', 'U', 'Fin', 'Notificar'),
('F1', 'P8', 'P', 'U', 'Fin', 'notificarProblema'),
('F2', 'P1', 'P', 'K', 'Fin', 'listar'),
('F3', 'P1', 'P', 'U', 'P2', 'solicitudCarta'),
('F3', 'P2', 'P', 'U', 'P3', 'compraFormulario'),
('F3', 'P3', 'P', 'U', 'P4', 'llenarFormulario'),
('F3', 'P4', 'C', 'G', NULL, 'verificarLlenado'),
('F3', 'P5', 'C', 'K', NULL, 'aprobarFormulario'),
('F3', 'P6', 'P', 'G', 'P7', 'enviarDecano'),
('F3', 'P7', 'P', 'D', 'P8', 'agregarFirma'),
('F3', 'P8', 'C', 'K', NULL, 'verificaEnviaCarta'),
('F3', 'P9', 'P', 'U', 'Fin', 'cartaEntregada'),
('F3', 'P10', 'P', 'U', 'Fin', 'notificarError'),
('F4', 'P1', 'P', 'K', 'P2', 'solicitudVacacion'),
('F4', 'P2', 'C', 'R', NULL, 'evaluarSolicitud'),
('F4', 'P3', 'P', 'K', 'Fin', 'notificarAprobacion'),
('F4', 'P4', 'P', 'K', 'Fin', 'notificarRechazo');

-- --------------------------------------------------------

--
-- Table structure for table `formularioestudianteregular`
--

CREATE TABLE `formularioestudianteregular` (
  `id` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `nroTramite` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `aPaterno` varchar(15) NOT NULL,
  `aMaterno` varchar(15) NOT NULL,
  `ci` int(10) NOT NULL,
  `matricula` int(7) NOT NULL,
  `carrera` varchar(20) NOT NULL,
  `facultad` varchar(30) NOT NULL,
  `ciudad` varchar(15) NOT NULL,
  `firmaDecano` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formularioestudianteregular`
--

INSERT INTO `formularioestudianteregular` (`id`, `idAlumno`, `nroTramite`, `nombre`, `aPaterno`, `aMaterno`, `ci`, `matricula`, `carrera`, `facultad`, `ciudad`, `firmaDecano`) VALUES
(22, 1, 99, 'Sergio Alejandro', 'Paucara', 'Saca', 123456, 789789, 'Informatica', 'Ciencias Puras y Naturales', 'La Paz', 'documentos/25/firma.jpg'),
(23, 1, 109, 'Sergio', 'Paucara', 'Saca', 123456, 456461, 'Informatica', 'Ciencias Puras y Naturales', 'La Paz', ''),
(24, 1, 110, 'sergio', 'pp', 'pp', 456, 5456, 'Informatica', 'Ciencias Puras y Naturales', 'La Paz', ''),
(25, 1, 111, 'Sergio', 'Perez', 'Perez', 55, 555, '5555', '555', '5555', ''),
(26, 1, 112, 'Sergio', 'fw', 'Perez', 14, 456, '15661', '156561', '51', 'documentos/25/dinosaurios-famosos.jpg'),
(27, 1, 121, 'Sergio Alex', 'Paucara', 'Saca', 123456, 789, 'Informatica', 'Ciencias Puras y Naturales', 'La Paz', 'documentos/25/labo.png'),
(28, 1, 122, '123', '123', '123', 123, 123, '123', '123', '123', ''),
(29, 1, 123, '456', '456', '456', 456, 456, '456', '456', '456', ''),
(30, 22, 127, 'Daniel', 'Sanchez', 'Perez', 1555, 54645, 'Matematica', 'Ciencias Puras y Naturales', 'La Paz', 'documentos/25/lago4.png');

-- --------------------------------------------------------

--
-- Table structure for table `informe`
--

CREATE TABLE `informe` (
  `id` int(11) NOT NULL,
  `idTramite` int(11) NOT NULL,
  `observacion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informe`
--

INSERT INTO `informe` (`id`, `idTramite`, `observacion`) VALUES
(11, 41, 'mejorar calidad'),
(12, 38, ''),
(15, 64, 'baja calidada'),
(16, 67, ''),
(17, 67, 'holo');

-- --------------------------------------------------------

--
-- Table structure for table `iniciales`
--

CREATE TABLE `iniciales` (
  `tipo` varchar(20) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iniciales`
--

INSERT INTO `iniciales` (`tipo`, `valor`) VALUES
('nrotramite', 127);

-- --------------------------------------------------------

--
-- Table structure for table `procesocondicion`
--

CREATE TABLE `procesocondicion` (
  `codFlujo` varchar(3) NOT NULL,
  `codProceso` varchar(3) NOT NULL,
  `codSi` varchar(3) NOT NULL,
  `codNo` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `procesocondicion`
--

INSERT INTO `procesocondicion` (`codFlujo`, `codProceso`, `codSi`, `codNo`) VALUES
('F1', 'P4', 'P5', 'P8'),
('F3', 'P4', 'P5', 'P10'),
('F3', 'P5', 'P6', 'P10'),
('F3', 'P8', 'P9', 'P10'),
('F4', 'P2', 'P3', 'P4');

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `codRol` varchar(1) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`codRol`, `tipo`) VALUES
('U', 'Alumno'),
('K', 'Kardex'),
('D', 'Decano'),
('G', 'Gestiones'),
('R', 'Director');

-- --------------------------------------------------------

--
-- Table structure for table `seguimiento`
--

CREATE TABLE `seguimiento` (
  `nroTramite` int(11) DEFAULT NULL,
  `codFlujo` varchar(3) DEFAULT NULL,
  `codProceso` varchar(3) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `fechaini` datetime DEFAULT NULL,
  `fechafin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seguimiento`
--

INSERT INTO `seguimiento` (`nroTramite`, `codFlujo`, `codProceso`, `usuario`, `fechaini`, `fechafin`) VALUES
(38, 'F1', 'P1', 1, '2021-04-19 00:00:00', '2021-06-14 18:16:22'),
(38, 'F1', 'P2', 1, '2021-05-27 11:11:46', '2021-06-14 18:16:22'),
(38, 'F1', 'P3', 1, '2021-05-27 11:11:56', '2021-06-14 18:16:22'),
(38, 'F1', 'P4', 20, '2021-05-27 11:12:26', '2021-06-14 18:39:57'),
(38, 'F1', 'P8', 1, '2021-05-27 11:15:43', '2021-06-14 18:16:22'),
(39, 'F1', 'P1', 1, '2021-04-19 00:00:00', '2021-06-14 18:16:22'),
(39, 'F1', 'P2', 1, '2021-05-27 11:17:07', '2021-06-14 18:16:22'),
(39, 'F1', 'P3', 1, '2021-05-27 11:17:09', '2021-06-14 18:16:22'),
(39, 'F1', 'P4', 20, '2021-05-27 11:17:18', '2021-06-14 18:39:57'),
(39, 'F1', 'P5', 20, '2021-05-27 11:17:29', '2021-06-14 18:39:57'),
(39, 'F1', 'P6', 20, '2021-05-27 11:17:36', '2021-06-14 18:39:57'),
(39, 'F1', 'P7', 1, '2021-05-27 11:17:53', '2021-06-14 18:16:22'),
(41, 'F1', 'P1', 21, '2021-04-19 00:00:00', '2021-05-27 11:19:22'),
(41, 'F1', 'P2', 21, '2021-05-27 11:19:22', '2021-05-27 11:19:26'),
(41, 'F1', 'P3', 21, '2021-05-27 11:19:26', '2021-05-27 11:21:15'),
(41, 'F1', 'P4', 20, '2021-05-27 11:21:15', '2021-06-14 18:39:57'),
(41, 'F1', 'P5', 20, '2021-05-27 11:22:28', '2021-06-14 18:39:57'),
(41, 'F1', 'P6', 20, '2021-05-27 11:22:35', '2021-06-14 18:39:57'),
(41, 'F1', 'P7', 21, '2021-05-27 11:22:41', '2021-05-27 11:25:48'),
(38, 'F1', 'P5', 20, '2021-05-27 16:26:45', '2021-06-14 18:39:57'),
(38, 'F1', 'P6', 20, '2021-05-27 16:26:57', '2021-06-14 18:39:57'),
(38, 'F1', 'P7', 1, '2021-05-27 16:27:01', '2021-06-14 18:16:22'),
(61, 'F2', 'P1', 20, '2021-05-30 20:35:20', '2021-06-14 18:39:57'),
(62, 'F1', 'P1', 1, '2021-06-07 12:19:31', '2021-06-14 18:16:22'),
(62, 'F1', 'P2', 1, '2021-06-07 12:19:57', '2021-06-14 18:16:22'),
(62, 'F1', 'P3', 1, '2021-06-07 12:20:17', '2021-06-14 18:16:22'),
(63, 'F2', 'P1', 20, '2021-06-07 12:21:46', '2021-06-14 18:39:57'),
(64, 'F1', 'P1', 22, '2021-06-07 12:24:15', '2021-06-14 18:38:06'),
(64, 'F1', 'P2', 22, '2021-06-07 12:25:59', '2021-06-14 18:38:06'),
(64, 'F1', 'P3', 22, '2021-06-07 12:26:01', '2021-06-14 18:38:06'),
(64, 'F1', 'P4', 20, '2021-06-07 12:49:33', '2021-06-14 18:39:57'),
(64, 'F1', 'P5', 20, '2021-06-07 12:50:29', '2021-06-14 18:39:57'),
(64, 'F1', 'P6', 20, '2021-06-07 12:50:38', '2021-06-14 18:39:57'),
(64, 'F1', 'P7', 22, '2021-06-07 12:50:47', '2021-06-14 18:38:06'),
(99, 'F3', 'P1', 1, '2021-06-16 21:03:06', '2021-06-16 21:03:24'),
(99, 'F3', 'P2', 1, '2021-06-16 21:03:24', '2021-06-16 21:03:25'),
(99, 'F3', 'P3', 1, '2021-06-16 21:03:25', '2021-06-16 21:04:34'),
(99, 'F3', 'P4', 24, '2021-06-16 21:04:34', '2021-06-16 21:05:26'),
(99, 'F3', 'P5', 20, '2021-06-16 21:05:26', '2021-06-16 21:05:36'),
(99, 'F3', 'P6', 24, '2021-06-16 21:05:36', '2021-06-16 21:06:01'),
(99, 'F3', 'P7', 25, '2021-06-16 21:06:01', '2021-06-16 21:06:57'),
(99, 'F3', 'P8', 20, '2021-06-16 21:06:57', '2021-06-16 21:07:17'),
(99, 'F3', 'P9', 1, '2021-06-16 21:07:17', '2021-06-16 21:08:14'),
(127, 'F3', 'P1', 22, '2021-06-16 23:29:08', '2021-06-16 23:29:13'),
(127, 'F3', 'P2', 22, '2021-06-16 23:29:13', '2021-06-16 23:29:15'),
(127, 'F3', 'P3', 22, '2021-06-16 23:29:15', '2021-06-16 23:29:35'),
(127, 'F3', 'P4', 24, '2021-06-16 23:29:35', '2021-06-16 23:29:47'),
(127, 'F3', 'P5', 20, '2021-06-16 23:29:47', '2021-06-16 23:30:05'),
(127, 'F3', 'P6', 24, '2021-06-16 23:30:05', '2021-06-16 23:30:15'),
(127, 'F3', 'P7', 25, '2021-06-16 23:30:15', '2021-06-16 23:30:33'),
(127, 'F3', 'P8', 20, '2021-06-16 23:30:33', '2021-06-16 23:30:55'),
(127, 'F3', 'P9', 22, '2021-06-16 23:30:55', '2021-06-16 23:31:13');

-- --------------------------------------------------------

--
-- Table structure for table `solicitudvacacion`
--

CREATE TABLE `solicitudvacacion` (
  `id` int(11) NOT NULL,
  `idRol` int(11) NOT NULL,
  `nroTramite` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fechaIni` date NOT NULL,
  `fechaFin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solicitudvacacion`
--

INSERT INTO `solicitudvacacion` (`id`, `idRol`, `nroTramite`, `nombre`, `fechaIni`, `fechaFin`) VALUES
(6, 20, 100, 'Juan Perez Perez', '2021-06-10', '2021-06-26'),
(7, 23, 101, 'Virginia Holi holi', '2021-06-04', '2021-06-27'),
(8, 23, 102, 'Virginia Perez', '2021-06-11', '2021-07-02'),
(9, 23, 103, 'aaaa', '2021-06-06', '2021-06-26'),
(10, 23, 104, 'Juan 46', '2021-06-06', '2021-07-03'),
(11, 23, 105, 'virg', '2021-06-18', '2021-07-02'),
(12, 23, 106, 'viriginia', '2021-06-04', '2021-06-26'),
(13, 23, 107, '123456789', '2021-06-13', '2021-06-26'),
(14, 20, 108, 'Zulema Holi', '2021-06-05', '2021-07-03'),
(15, 23, 113, 'Virginia 555', '2021-06-24', '2021-06-28'),
(16, 23, 114, 'virgen 456', '0000-00-00', '2021-06-25'),
(17, 23, 115, 'virgeag', '2021-06-06', '2021-06-20'),
(18, 23, 117, '4564', '2021-06-06', '2021-06-19'),
(19, 23, 118, 'virafwfaw', '2021-06-06', '2021-06-24'),
(20, 20, 119, 'zuezul', '2021-06-26', '2021-06-09'),
(21, 23, 120, 'alalal', '2021-06-13', '2021-06-25'),
(22, 20, 124, 'Zulema', '2021-06-06', '2021-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `rol` varchar(1) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `rol`, `usuario`, `password`) VALUES
(1, 'U', 'sergio', '123456'),
(20, 'K', 'zulema', '123456'),
(21, 'U', 'juan', '123456'),
(22, 'U', 'daniel', '123456'),
(23, 'K', 'virginia', '123456'),
(24, 'G', 'maria', '123456'),
(25, 'D', 'grover', '123456'),
(26, 'R', 'jose', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cargatrabajo`
--
ALTER TABLE `cargatrabajo`
  ADD PRIMARY KEY (`idCarga`);

--
-- Indexes for table `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formularioestudianteregular`
--
ALTER TABLE `formularioestudianteregular`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informe`
--
ALTER TABLE `informe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solicitudvacacion`
--
ALTER TABLE `solicitudvacacion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cargatrabajo`
--
ALTER TABLE `cargatrabajo`
  MODIFY `idCarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `documento`
--
ALTER TABLE `documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `formularioestudianteregular`
--
ALTER TABLE `formularioestudianteregular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `informe`
--
ALTER TABLE `informe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `solicitudvacacion`
--
ALTER TABLE `solicitudvacacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

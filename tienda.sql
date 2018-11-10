-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-04-2018 a las 16:01:26
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrusel`
--

CREATE TABLE `carrusel` (
  `idcarrusel` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idcategoria` int(11) NOT NULL,
  `idestatus` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategoria`, `idestatus`, `nombre`) VALUES
(1, 1, 'Componentes de Pc'),
(2, 1, 'Tarjetas Madres'),
(3, 1, 'Memorias Ram'),
(4, 1, 'Discos Duros'),
(5, 1, 'Monitores'),
(6, 1, 'Computadoras'),
(7, 1, 'Impresoras y Plotters'),
(8, 1, 'Accesorios de Pc'),
(9, 1, 'Pen Drives'),
(10, 1, 'Laptops'),
(17, 1, 'Cartuchos, Tintas y Toner'),
(18, 1, 'Software'),
(19, 1, 'Quemadoras y discos Virgenes'),
(20, 1, 'Registradoras y Puntos de Venta'),
(21, 1, 'Tablets y Accesorios'),
(22, 1, 'Tarjetas de Video y Captura'),
(23, 1, 'Procesadores'),
(24, 1, 'Proyectores y Pantallas'),
(25, 1, 'Accesorios para Laptops'),
(26, 1, 'Mouses'),
(27, 1, 'Redes Inalámbricas'),
(28, 1, 'Consolas y videojuegos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `idestatus` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`idestatus`, `nombre`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `idmarca` int(11) NOT NULL,
  `idestatus` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`idmarca`, `idestatus`, `nombre`) VALUES
(1, 1, 'Soneview'),
(2, 1, 'Samsung'),
(3, 1, 'Huawei'),
(4, 1, 'Microsoft'),
(5, 1, 'Toshiba'),
(6, 1, 'Hp'),
(7, 1, 'Sony Vaio'),
(8, 1, 'Acer'),
(9, 1, 'Compaq'),
(10, 1, 'Lenovo'),
(11, 1, 'Apple'),
(12, 1, 'Dell'),
(13, 1, 'Epson'),
(14, 1, 'LG'),
(15, 1, 'Genius'),
(16, 1, 'Asrock'),
(17, 1, 'Intel'),
(19, 1, 'Sentey'),
(20, 1, 'Asus'),
(21, 1, 'Siragon'),
(22, 1, 'Otras'),
(23, 1, 'Sony Playstation');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL,
  `idestatus` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `idmarca` int(11) NOT NULL,
  `idtipoproducto` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `cantidad` int(6) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` mediumtext NOT NULL,
  `fecharegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `idestatus`, `idusuario`, `idcategoria`, `idmarca`, `idtipoproducto`, `nombre`, `cantidad`, `precio`, `descripcion`, `fecharegistro`) VALUES
(1, 1, 7, 26, 15, 2, 'Mouse Retractil Mini Genius', 1, '1200.00', 'Mouse Retractil Mini Genius Microtravel Usb Optico Laptop Pc', '2015-04-20'),
(2, 1, 7, 7, 13, 3, 'Impresora Epson Expression', 1, '29900.00', 'Impresora Epson Expression Xp-211 Multifuncional Wi-fi', '2015-04-20'),
(3, 1, 7, 5, 2, 1, 'Monitor+tv Samsung,aoc,lg', 1, '47000.00', 'Monitor 19 pulgadas LED Nuevo - MARCA SAMSUMG. Entrada de Video HDMI - RCA- VGA.', '2015-04-20'),
(4, 1, 2, 8, 4, 3, 'Teclado Microsoft', 1, '3000.00', 'Teclado Microsoft Multimedia\r\n\r\nInalambrico (USB)\r\n\r\nModelo: 1392 1496', '2015-04-20'),
(5, 1, 1, 4, 5, 1, 'Disco Duro Externo', 1, '19990.00', 'Disco Duro Externo Portatil De 1tb 1000gb Usb 3.0 Y 2.0', '2015-04-20'),
(6, 1, 4, 2, 16, 1, 'Tarjeta Madre Asrock H61m-vg3', 1, '13900.00', 'CPU	- Soporta la tercera y segunda generación de procesador Intel® Core™ i7 / i5 / i3 / Xeon® / Pentium® / Celeron® en el paquete LGA1155\r\n- Soporta tecnología Intel® Turbo Boost 2.0\r\n- Soporta Procesador Intel® K-Series\r\n- Soporta tecnología Hyper-Threading\r\nChipset	- Intel® H61\r\n- Compatible con la tecnología Intel® Rapid Start y Tecnología Smart Connect\r\n\r\n*La tecnología Intel® Rapid Start y la Tecnología Smart Connect, sólo son compatibles con Sistema Operativo Windows® 7 o versiones posteriores.\r\nMemoria	- Tecnología de memoria Dual Channel DDR3\r\n- 2 x RANURAS DDR3 DIMM\r\n- Soporta memoria DDR3 1600/1333/1066 non-ECC, un-buffered\r\n- Máxima capacidad de memoria del sistema: 16GB*\r\n- Soporta Intel® Extreme Memory Profile (XMP) 1.3 / 1.2 con procesador Intel® CPU Ivy Bridge\r\n\r\n*Debido a la limitación del sistema operativo, el tamaño de la memoria actual puede ser menos que 4GB para la reserva del uso del sistema bajo operativo Windows® 32-bit. Para Windows® 64-bit con CPU de 64-bit no hay tal limitación.\r\n\r\n**La frecuencia de DRAM más alta soportada depende de la CPU que haya instalado. Para conocer las especificaciones detalladas de la CPU, consulte la web oficial de Intel.\r\nBIOS	- 32Mb AMI UEFI Legal BIOS con soporte GUI\r\n- Soporta \"Plug y Play\"\r\n- ACPI 1.1 conforme Wake Up Events\r\n- Soporta jumperfree\r\n- Soporta SMBIOS 2.3.1', '2015-04-21'),
(7, 1, 8, 1, 19, 3, 'Case Sentey Usb 3.0', 1, '17000.00', 'CPU	- Soporta la tercera y segunda generación de procesador Intel® Core™ i7 / i5 / i3 / Xeon® / Pent', '2015-04-21'),
(8, 1, 3, 8, 6, 1, 'Impresora Multifuncional Hp 30', 3, '27999.00', 'IMPRESORA MULTIFUNCIONAL HP DESKJET 3050 CON SISTEMA DE TINTA CONTINUO\r\n \r\nIMPRIME, ESCANEA Y SACACOPIAS', '2015-04-27'),
(9, 1, 1, 26, 4, 3, 'Mouse Microsoft Sculpt Inalámb', 8, '4550.00', ' 	\r\n1.Diseño ergonómico avanzado\r\nEl diseño ergonómico avanzado fomenta las posturas naturales de la mano y la muñeca.\r\n2.Ángulo y altura del mouse\r\nLa altura y el ángulo del mouse están diseñados para colocar la muñeca en una posición cómoda y reduce la presión en la zona del túnel carpiano.\r\n3.Hendidura de pulgar\r\nLa hendidura de pulgar ayuda a mantener la posición ergonómica correcta de la mano y la muñeca.\r\n4.Botón Windows\r\nBotón Windows para obtener acceso con un solo toque a la pantalla Inicio.\r\n5.Botón Atrás\r\nBotón Atrás para una navegación más rápida.\r\n6.Desplazamiento en cuatro direcciones\r\nDesplácese hacia la izquierda, derecha, adelante y atrás. Navegue rápidamente por todos sus proyectos con velocidad y eficiencia.', '2015-04-27'),
(10, 1, 7, 8, 4, 1, 'Teclado Microsoft 3000 Curve', 3, '1890.00', 'Teclado Microsoft 3000 Curve Ergonómico Alámbrico.\r\n\r\n1.Contorno: Es familiar, es moderno	 \r\n 	\r\nTodas las teclas tienen el mismo tamaño y están en un lugar familiar, incluso con el Comfort Curve. El diseño delgado, brillante ahorra espacio y caracteriza su escritorio.\r\n\r\n \r\n 	2.Contorno: Es familiar, es moderno	 \r\n 	\r\nEl diseño Comfort Curve de Microsoft favorece una posición natural de la muñeca, además es fácil de usar.\r\n\r\n \r\n 	3.Cómodas teclas de acceso multimedia	 \r\n 	\r\nControle su música y videos, y abra la Calculadora con el toque de una tecla.', '2015-04-27'),
(11, 1, 7, 8, 22, 3, 'Mouse Pad Multimedia Usb', 50, '1398.00', 'Mouse Pad Multimedia Usb Con Luz Led Y Hub Usb 4 Puertos\r\n\r\n\r\n* 4 puertos USB 2.0 ; transmisión de alta velocidad y descarga\r\n* Fácil de ir a la Internet por un botón, comprobar el correo electrónico , usar la calculadora , buscar en el equipo, controlar el volumen y encendido / apagado\r\n* Se puede configurar su página web como la página web principal.\r\n* Valentía Superb LED cegadora te hace trabajar cómodamente.\r\n* Apto para cualquier tipo de ratón para moverse en ella libremente.\r\n* Requisitos del sistema: Windows Me / 2000 / XP / Win 7 y 8 MAC OS ; sin drivers', '2015-04-30'),
(12, 1, 4, 8, 15, 3, 'Cornetas Home Theater Genius', 15, '17500.00', 'Home Theater Genius Sw-5.1 1020\r\n\r\nTAMAÑO\r\nSUBWOOFER: 170X230X180 MM\r\nSATELITE : 82X111X68\r\nDIAMETRO DE DIAFRAGMA\r\nSUBWOOFER 4\"\r\nSATELITE 2.5\"\r\nFRECUENCIA DE RESPUESTA 170 HZ - 20 HZ\r\nRMS 26 WATTS\r\nRELACION SEÑAL-RUIDO 80 dB\r\nPESO TOTAL 3.283 GR\r\nSUBWOOFER 14.5 WATTS\r\nSATELITE 2.3 WATTS X 5', '0000-00-00'),
(13, 1, 3, 8, 22, 3, 'Control Remoto Usb Inalambrico', 30, '2198.00', 'DATOS TECNICOS\r\n- Usb para computador\r\n- Mouse Wireless\r\n- Máximo 18 metros de alcance\r\n- Para Windows: 2000, XP, MCE, Vista, Win 7\r\n- No necesita driver es plug & Play\r\n- Soporta Software: WMP, Realplayer, KMplayer, TTplay, WinDVD, PowerDVD\r\n- Cable Retráctil para Receptor\r\n- Medidas Control Remoto: 5,1 x 12,2 x 1cm\r\n\r\nControla tu pc a distancia completamente, puedes mover el mouse, tiene tecla de click derecho e izquiero, y además, muchas teclas para controlar programas de música y video. Incluso, puedes escribir a distancia, usando el teclado que incluye el control, Imaginate todos los usos que puedes darle a este control! Ver películas desde el sillón , apagar la pc distancia, abrir videos, cargar subtitulos, pausar, adelantar, retroceder, escuchar tu música , puedes subir y bajar volumen, todo sin moverte de tu lugar!', '2015-05-04'),
(14, 1, 7, 8, 20, 3, 'Lector De Memorias', 50, '250.00', '', '2015-05-04'),
(15, 1, 8, 8, 15, 3, 'Cornetas Genius Gaming', 8, '20999.00', 'Bocinas Genius SW-G2.1 1250 con subwoofer\r\n\r\nBocinas Genius SW-G2.1 1250 con subwoofer, MDF. Genius te trae el disfrute de graves increíble para los amantes de la música y los juegos con este nuevo sistema de altavoces, SW-G2.1 1250. El subwoofer utiliza un avanzado 5,25 \"unidad de disco en un gabinete de MDF ultra rígido bordo, por lo que puede ser abarcada por el bajo sólido, profundo y prolongado. Los altavoces satélite con curvas magnéticamente blindados 3 \"conos de gama media ofrecen plena y bien equilibrada de sonido detallado. El cuadro de control individual hace que sea fácil para ajustar el volumen y el bajo. También hay micrófono en la caja de control para chatear con los compañeros de juego en línea. SW-G2.1 1250 tiene una entrada de 3.5mm estándar para juegos de PC y los usuarios MP3/CD jugadores, y un conector para 2RCA para videoconsolas, reproductores de DVD y los oyentes de televisión. También tiene un conector de auriculares para escucha privada. Así que no lo dude más, la experiencia de los 38 vatios de sonido dinámico en pleno auge de la 1250 SW-G2.1.  \r\n\r\nCaracteristicas \r\n\r\n- Total de potencia de salida de 38 vatios (RMS)\r\n- Gabinete de madera con subwoofer de graves ricos y profundos\r\n- Curvas altavoces satélite con el diseño del gancho\r\n- Ajuste de volumen y bajo los controles\r\n- MIC en línea para hablar con otros jugadores del juego\r\n- Toma de auriculares para escucha privada\r\n- Dos tomas de entrada para PC / TV / DVD / dispositivos de juego\r\n\r\nEspecificaciones Tecnicas\r\n\r\n- RMS (Watts): 38\r\n- Relación señal a ruido: 90 dB\r\n- Bajo / Tono: Bajo\r\n- Micrófono Jack\r\n- Cable de control\r\n- Control de volumend\r\n- Encendido / apagado\r\n- Potencia total de salida (vatios): 38 vatios\r\n- Satélite: 9 vatios (cada canal)\r\n- Subwoofer: 20 vatios\r\n\r\n \r\n', '2015-05-04'),
(16, 1, 7, 8, 22, 3, 'Corneta 2.1 Subwoofer', 5, '12999.00', 'Especial para laptop pc computadora MP3 MP5 Celulares etc. Conexion 3.5mm\r\n\r\nVoz excelente, Altavoz refinado 2.1\r\nDiseño contra magnetismo, bajoa frecuencia y fuerte.\r\nGran super base le ofrece el sonido de alta calidad\r\n\r\nSatelites:\r\n\r\n\r\nPotencia de salida del Subwoofer:4.5W\r\n\r\nPotencia de salida del satelite 2Wx2', '2015-05-04'),
(17, 1, 3, 10, 8, 3, 'Acer Aspire - 2.1 Ghz - 3gb', 2, '39999.00', 'Acer Aspire - 2.1 Ghz - 3gb Ddr2 - Dd 120gb - Webcam - Wi-fi\r\n\r\n', '2015-05-04'),
(18, 1, 8, 10, 10, 3, 'Laptop Portatil Lenovo Ideapad', 1, '114990.00', 'Laptop Portatil Lenovo Ideapad 500gb Led Hd 14 Wifi Usb W8', '2015-05-04'),
(19, 1, 3, 10, 21, 1, 'Laptop Siragon Potente Win 8', 3, '104859.00', '\r\n\r\n* PROCESADOR: AMD Dual-Core C-60 de 1.0GHz / 2MB de Cache\r\n* MEMORIA RAM: 4GB. RAM.\r\n* MEMORIA DE ALMACENAMIENTO: 2Mb Memoria Cache / Dos (2) ranuras para expansión de memoria hasta 8GB (Soporte para modulos de 1GB, 2GB ó 4GB).\r\n* MEMORIA DISCO DURO DE 500GB.\r\n* PANTALLA: Graficos H \r\n* SISTEMA OPERATIVO: SO Microsoft Windows® 8 Home Premium (Version 64bit)\r\n* Web Cam. Wifi.\r\n* Entradas: HDMI. USB. VGA. LAN.\r\n* RANURA LECTORA DE CD \r\n', '2015-05-04'),
(20, 1, 4, 28, 23, 2, 'Ps4 Sony Playstation', 3, '97979.00', '* PROCESADOR: Procesador adaptado de un solo chip/\r\n                            CPU: x86-64 AMD “Jaguar” de baja potencia, 8 núcleos/\r\n                            GPU: 1.84 TFLOPS, motor AMD Radeon™ Graphics Core Next\r\n\r\n* MEMORIA: GDDR5 8GB\r\n\r\n* Unidad de disco duro:  500GB\r\n\r\n* Unidad óptica; BD 6xCAV / DVD 8xCAV\r\n\r\n* Comunicación: Ethernet (10BASE-T, 100BASE-TX, 1000BASE-T)\r\n                            EEE 802.11 b/g/n\r\n                            Bluetooth® 2.1 (EDR)\r\n\r\n* Salida AV: HDMI\r\n                     Salida digital (óptica)', '2015-05-04'),
(21, 1, 3, 21, 2, 1, 'Galaxy Tab Samsung', 10, '145559.00', 'Galaxy Tab S Potente 3gb Ram Wifi Samsung 10.5 Uhd Amoled Hu\r\n\r\n* PROCESADOR: Exynos™ 5 Octa (1.9Ghz Quadcore + 1.3 Ghz Quadcore)\r\n* CONECTIVIDAD: Wifi. \r\n* RESOLUCION: Cam. Frontal. 2.1 MegaPixeles. Cam. Trasera. 8.0 Mega Pixeles.\r\n* CONEXIONES: Wi-Fi®, 802.11 a/b/g/n/ac MIMO, (2.4Ghz + 5.0 Ghz)\r\n                            Bluetooth 4.0\r\n* MEMORIA RAM: 3GB RAM\r\n* MEMORIA DE ALMACENAMIENTO: 16GB\r\n* SISTEMA OPERATIVO: Android™ 4.4, KitKat', '2015-05-04'),
(22, 1, 4, 8, 2, 2, 'Inalambrica Corneta Samsung', 9, '35300.00', 'Inalambrica Corneta Samsung Audio Portable Mejor Q Bose Blue\r\n\r\n* Cargador Micro. Bluetooth 3.0\r\n\r\n* Bluetooth 3.0\r\n\r\n* Botones: Encendido-Apagado, Bluetooth, Play-Pause, Volume, Contestador Llamada\r\n\r\n* Auto-Conexion.\r\n\r\n* Tipo de Conexion : Bluetooh / USB/ NFC ', '2015-05-04'),
(23, 1, 7, 21, 22, 2, 'Tablet 7 Android Flash', 17, '15699.00', 'Combo Tablet 7 Android Flash Estuche + Teclado + Lapiz Tabla\r\n\r\nANDROID 4.4 KITKAT\r\nPUERTO HDMI\r\n8GB MEMORIA INTERNA\r\n\r\nTABLET CON FLASH Y SPEAKER ESTEREO', '2015-05-04'),
(24, 1, 10, 10, 10, 1, 'laptop lenovo', 1, '40000.00', 'Laptop Lenovo usada  (poco uso).', '2015-05-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rproductofoto`
--

CREATE TABLE `rproductofoto` (
  `idproductofoto` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rproductofoto`
--

INSERT INTO `rproductofoto` (`idproductofoto`, `idproducto`) VALUES
(1, 1),
(2, 1),
(10, 1),
(3, 2),
(7, 2),
(8, 2),
(9, 2),
(4, 3),
(14, 4),
(15, 4),
(16, 4),
(11, 5),
(12, 5),
(13, 5),
(17, 6),
(19, 7),
(20, 7),
(22, 8),
(23, 9),
(24, 10),
(25, 10),
(26, 10),
(27, 11),
(28, 11),
(29, 11),
(30, 12),
(31, 12),
(32, 13),
(33, 13),
(34, 13),
(35, 14),
(36, 14),
(37, 15),
(38, 15),
(39, 15),
(40, 15),
(41, 16),
(42, 16),
(43, 17),
(67, 18),
(47, 19),
(48, 19),
(49, 19),
(50, 20),
(51, 20),
(52, 20),
(53, 20),
(54, 21),
(55, 21),
(56, 21),
(57, 22),
(58, 22),
(59, 22),
(60, 22),
(61, 23),
(62, 23),
(63, 23),
(64, 23),
(65, 23),
(68, 24),
(72, 24),
(73, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoproducto`
--

CREATE TABLE `tipoproducto` (
  `idtipoproducto` int(11) NOT NULL,
  `idestatus` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipoproducto`
--

INSERT INTO `tipoproducto` (`idtipoproducto`, `idestatus`, `nombre`) VALUES
(1, 1, 'Nomal'),
(2, 1, 'Oferta'),
(3, 1, 'Liquidación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuarios`
--

CREATE TABLE `tipousuarios` (
  `idtipousuario` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipousuarios`
--

INSERT INTO `tipousuarios` (`idtipousuario`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Operador'),
(3, 'Vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `idubicacion` int(11) NOT NULL,
  `idestatus` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`idubicacion`, `idestatus`, `nombre`) VALUES
(1, 1, 'Carabobo'),
(2, 1, 'Aragua'),
(3, 1, 'Lara'),
(4, 1, 'Cojedes'),
(5, 1, 'Distrito Capital');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `idestatus` int(11) NOT NULL,
  `idtipousuario` int(11) NOT NULL,
  `idubicacion` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefonos` varchar(50) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `fecharegistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `idestatus`, `idtipousuario`, `idubicacion`, `nombre`, `apellido`, `correo`, `telefonos`, `clave`, `fecharegistro`) VALUES
(1, 1, 1, 1, 'Blanca Dautant', '', 'blk_7@hotmail.com', '04244949379', '1234', '2015-04-20'),
(2, 1, 2, 2, 'Carlos Lopez', '', 'charlielp@gmail.com', '04163456427', '0000', '2015-04-20'),
(3, 1, 3, 3, 'Luisa Ortega', '', 'luisao75@gmail.com', '04128543955', '123456', '2015-04-26'),
(4, 1, 3, 1, 'Mario Hernandez', '', 'herdzmrio@hotmail.com', '04244783455', '123456', '2015-04-26'),
(7, 1, 3, 5, 'Sonia Dugarte', '', 'soniaadwt@gmail.com', '04160458219', '123456', '2015-04-26'),
(8, 1, 3, 4, 'Victor Correa', '', 'vmanuelch@gmail.com', '04124453262', '123456', '2015-04-26'),
(9, 1, 3, 4, 'jose', 'hurtado', 'josehurt@hotmail.com', '04148883697', '1234', '2015-05-20'),
(10, 1, 3, 3, 'orlando', 'fonseca', 'fonsecorl333@gmail.com', '04243857691', '1234', '2015-05-20'),
(14, 1, 3, 1, 'carlos', 'perez', 'juanppp9@gmail.com', '', '1111', '2015-05-20'),
(15, 1, 3, 4, 'jose', 'gonzalez', 'josegggg@hotmail.com', '', '2356', '2015-05-20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrusel`
--
ALTER TABLE `carrusel`
  ADD PRIMARY KEY (`idcarrusel`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategoria`),
  ADD KEY `idestatus` (`idestatus`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`idestatus`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`idmarca`),
  ADD KEY `idestatus` (`idestatus`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `idestatus` (`idestatus`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idcategoria` (`idcategoria`),
  ADD KEY `idmarca` (`idmarca`),
  ADD KEY `idtipoproducto` (`idtipoproducto`);

--
-- Indices de la tabla `rproductofoto`
--
ALTER TABLE `rproductofoto`
  ADD PRIMARY KEY (`idproductofoto`),
  ADD KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `tipoproducto`
--
ALTER TABLE `tipoproducto`
  ADD PRIMARY KEY (`idtipoproducto`),
  ADD KEY `idestatus` (`idestatus`);

--
-- Indices de la tabla `tipousuarios`
--
ALTER TABLE `tipousuarios`
  ADD PRIMARY KEY (`idtipousuario`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`idubicacion`),
  ADD KEY `idestatus` (`idestatus`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `idestatus` (`idestatus`),
  ADD KEY `idubicacion` (`idubicacion`),
  ADD KEY `idtipousuario` (`idtipousuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrusel`
--
ALTER TABLE `carrusel`
  MODIFY `idcarrusel` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `idestatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `idmarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `rproductofoto`
--
ALTER TABLE `rproductofoto`
  MODIFY `idproductofoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT de la tabla `tipoproducto`
--
ALTER TABLE `tipoproducto`
  MODIFY `idtipoproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipousuarios`
--
ALTER TABLE `tipousuarios`
  MODIFY `idtipousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `idubicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `categorias_ibfk_1` FOREIGN KEY (`idestatus`) REFERENCES `estatus` (`idestatus`);

--
-- Filtros para la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD CONSTRAINT `marcas_ibfk_1` FOREIGN KEY (`idestatus`) REFERENCES `estatus` (`idestatus`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idestatus`) REFERENCES `estatus` (`idestatus`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`),
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`idcategoria`),
  ADD CONSTRAINT `productos_ibfk_4` FOREIGN KEY (`idmarca`) REFERENCES `marcas` (`idmarca`),
  ADD CONSTRAINT `productos_ibfk_5` FOREIGN KEY (`idtipoproducto`) REFERENCES `tipoproducto` (`idtipoproducto`);

--
-- Filtros para la tabla `rproductofoto`
--
ALTER TABLE `rproductofoto`
  ADD CONSTRAINT `rproductofoto_ibfk_1` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`);

--
-- Filtros para la tabla `tipoproducto`
--
ALTER TABLE `tipoproducto`
  ADD CONSTRAINT `tipoproducto_ibfk_1` FOREIGN KEY (`idestatus`) REFERENCES `estatus` (`idestatus`);

--
-- Filtros para la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD CONSTRAINT `ubicacion_ibfk_1` FOREIGN KEY (`idestatus`) REFERENCES `estatus` (`idestatus`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idestatus`) REFERENCES `estatus` (`idestatus`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`idubicacion`) REFERENCES `ubicacion` (`idubicacion`),
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`idtipousuario`) REFERENCES `tipousuarios` (`idtipousuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

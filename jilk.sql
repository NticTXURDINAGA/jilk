-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-05-2017 a las 12:24:30
-- Versión del servidor: 5.7.18-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jilk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ik`
--

CREATE TABLE `ik` (
  `Kcod` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Idni` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `IKempfct` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `IKcont` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `IKdual` varchar(4) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ik`
--

INSERT INTO `ik` (`Kcod`, `Idni`, `IKempfct`, `IKcont`, `IKdual`) VALUES
('FI17IFCDW3', '14259354K', '', '', ''),
('FI17IFCSM2', '30598554K', '', '', ''),
('FI17IFCDW3', '14257372V', '', '', 'DUAL'),
('FI17IFCDW3', '30603436G', '', '', ''),
('FI17IFCDW3', '20187219G', '', '', ''),
('FI17IFCSM2', '16033829T', '', '', ''),
('FI17IFCDW3', '72403186Z', '', '', ''),
('FI17IFCDW3', '11910419F', '', '', ''),
('FI17IFCSM2', '16576977A', '', '', ''),
('FI17IFCDW3', '11910606X', '', '', ''),
('FI17IFCDW3', '14241514Y', '', '', ''),
('FI17IFCSM2', '11911021B', '', '', ''),
('FI17IFCDW3', '72093488B', '', '', 'DUAL'),
('FI17IFCDW3', '15383483W', '', '', ''),
('FI17IFCDW3', '11910726S', '', '', ''),
('FI17IFCSM2', '30639477G', '', '', 'DUAL'),
('FI17IFCDW3', '16057219E', '', '', 'DUAL'),
('FI17IFCDW3', '30657410C', '', '', ''),
('FI17IFCSM2', '78903615E', '', '', ''),
('FI17IFCSM2', '30590633N', '', '', ''),
('FI17IFCSM2', '20175988C', '', '', ''),
('FI17IFCDW3', '45622151H', '', '', ''),
('FI17IFCSM2', '72093488B', '', '', ''),
('FI17IFCSM2', '15383483W', '', '', ''),
('FI17IFCSM2', '11910726S', '', '', ''),
('FI17IFCDW3', '30639477G', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ikasle`
--

CREATE TABLE `ikasle` (
  `Idni` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `Inombrea` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Imail` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Itelefono` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `Iact` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Iest` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Idact` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Idest` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Iacts` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Iemp` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Itime` datetime DEFAULT NULL,
  `Itipo` varchar(5) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Icurri` text COLLATE utf8_spanish_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ikasle`
--

INSERT INTO `ikasle` (`Idni`, `Inombrea`, `Imail`, `Itelefono`, `Iact`, `Iest`, `Idact`, `Idest`, `Iacts`, `Iemp`, `Itime`, `Itipo`, `Icurri`) VALUES
('16033829T', 'ASENSIO PEDRERO , M. JULIA', 'jasensio@fptxurdinaga.com', '667283112', '', '', '', '', '', '', NULL, NULL, NULL),
('72403186Z', 'AYALA FERNANDEZ MAIDER', 'mayala@fptxurdinaga.com', '653018107', '', '', '', 'DEST', '', '', NULL, NULL, NULL),
('11910419F', 'CORRALES PETRALANDA , JAIME', 'jaime.corrales@fptxurdinaga.com', '647752187', '', '', '', '', '', '', NULL, NULL, NULL),
('16576977A', 'DE MIGUEL AJAMIL , JOSE MARIA', 'txemama@fptxurdinaga.com', '944157474', '', '', '', '', '', '', NULL, NULL, NULL),
('11910606X', 'ETXEBARRIA ARTETXE, KEPA', 'ketxebarria@fptxurdinaga.com', '944567084', '', 'ESTU', '', '', '', '', NULL, NULL, NULL),
('14241514Y', 'FERNANDEZ FERNANDEZ , JOSE MANUEL', 'jm@fptxurdinaga.com', '630261825', 'TRAB', '', '', '', '', '', NULL, NULL, NULL),
('11911021B', 'GARCIA BLAZQUEZ , ALBERTO', 'alberto.garcia@fptxurdinaga.com', '656723563', '', '', '', '', '', '', '2017-05-10 11:35:49', 'A', '&lt;p&gt;&lt;span style=&quot;color: #ff6600;&quot;&gt;La joven que caus&amp;oacute; la tragedia &lt;/span&gt;de Oliva &lt;span id=&quot;U30245837503YyH&quot;&gt;no pod&amp;iacute;a conducir&lt;/span&gt; su Ford Mondeo ni ning&amp;uacute;n otro veh&amp;iacute;culo&lt;span id=&quot;U30245837503XCC&quot;&gt; desde hace cuatro a&amp;ntilde;os&lt;/span&gt;. Mavi S. C., de 28 a&amp;ntilde;os, fue condenada en un juicio r&amp;aacute;pido en 2013 a trabajos comunitarios tras dar positivo en un control de alcoholemia, y la sentencia tambi&amp;eacute;n estableci&amp;oacute; la retirada del carn&amp;eacute; durante ocho meses y dos d&amp;iacute;as. Seg&amp;uacute;n informan desde &lt;a href=&quot;http://www.lasprovincias.es/&quot;&gt;lasprovincias.es&lt;/a&gt;, despu&amp;eacute;s de cumplir la pena,&lt;span id=&quot;U30245837503yE&quot;&gt; la joven no realiz&amp;oacute; el curso de reeducaci&amp;oacute;n y sensibilizaci&amp;oacute;n vial, un requisito indispensable&lt;/span&gt; y exigido por la Ley de Tr&amp;aacute;fico para volver a conducir, por lo que si hubiese sido parada en un control le habr&amp;iacute;an inmovilizado el coche y le habr&amp;iacute;an impuesto tambi&amp;eacute;n una multa de 200 euros por una infracci&amp;oacute;n administrativa.&lt;/p&gt;\r\n745.html&quot;&gt;Perfil de la c'),
('72093488B', 'GARCIA NOVALES, CARLOS', 'carlosgarcia@fptxurdinaga.com', '696476485', '', 'ESTU', 'DTRA', '', 'SI', '', NULL, NULL, NULL),
('15383483W', 'GARITAGOITIA ELGOIBAR, ESTEBAN', 'goixal@gmail.com', '656760245', '', '', '', '', '', '', NULL, NULL, NULL),
('11910726S', 'INSAUSTI PEÃ‘A , JOSE MANUEL', 'jminsausti@fptxurdinaga.com', '635734819', '', '', '', '', '', '', NULL, NULL, NULL),
('30639477G', 'LECUE ALCORTA , ELIXABETE', 'elekue@fptxurdinaga.com', '944761658', 'TRAB', '', '', '', '', '', NULL, NULL, NULL),
('16057219E', 'OLEA IZARRA ROMAN', 'rolea@fptxurdinaga.com', '610642920', '', '', '', '', '', '', NULL, NULL, NULL),
('30657410C', 'OMAETXEBARRIA IBARRA, PAULO', 'pauloomaib@gmail.com', '655708127', '', 'ESTU', '', 'DEST', '', '', NULL, NULL, NULL),
('78903615E', 'OÃ‘ATE GARDEAZABAL,ENEKO ASIER', 'asier@fptxurdinaga.com', '646412017', '', '', '', '', '', '', NULL, NULL, NULL),
('30590633N', 'PEREZ ELORRIETA, MODESTO', 'modestoperez@fptxurdinaga.com', '658748148', '', '', '', '', '', '', NULL, NULL, NULL),
('20175988C', 'PIÃ‘EIRO GOMEZ , JOSE MANUEL', 'administratzailea@fptxurdinaga.com', '609873598', 'TRAB', '', '', '', 'SI', '', NULL, NULL, NULL),
('20187219G', 'PUEYO ZAMARREÃ‘O , JOSE VICENTE', 'jovipueyo@fptxurdinaga.com', '680214761', '', '', '', '', '', '', NULL, NULL, NULL),
('14257372V', 'RODRIGUEZ FERNANDEZ , GUILLERMO', 'guillermonnn@gmail.com', '6877383877', '', 'ESTU', '', 'DESTU', '', 'LEMBER', '2017-05-10 11:25:52', 'A', '&lt;h4&gt;El top 50 de la cocina tendr&amp;aacute; un impacto de m&amp;aacute;s de 100 millones&lt;/h4&gt;\r\n&lt;div class=&quot;Subtitulo&quot;&gt;\r\n&lt;p class=&quot;Normal&quot;&gt;The World&amp;rsquo;s Best Restaurants presenta en Londres a Bilbao como sede de su gala en junio de 2018&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;p class=&quot;FuenteFecha&quot;&gt;Mi&amp;eacute;rcoles, 10 de Mayo de 2017 - Actualizado a las 06:02h&lt;/p&gt;\r\n&lt;div class=&quot;Herramientas&quot;&gt;\r\n&lt;div class=&quot;ComentariosVotos&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;&quot;&gt;\r\n&lt;div class=&quot;FotoGaleria&quot;&gt;&lt;img src=&quot;http://static.deia.com/images/2017/05/10/1rest_4625_1.jpg&quot; alt=&quot;El cocinero australiano Brett Graham, junto a Unai Rementeria, Elena Arzak y Eneko Atxa, ayer en Londres.&quot; /&gt;\r\n&lt;div class=&quot;PieFoto&quot;&gt;\r\n&lt;p&gt;El cocinero australiano Brett Graham, junto a Unai Rementeria, Elena Arzak y Eneko Atxa, ayer en Londres. (Foto: DFB)&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;Texto&quot;&gt;\r\n&lt;p&gt;&lt;strong&gt;La organizaci&amp;oacute;n de The World&amp;rsquo;s 50 Best Restaurants present&amp;oacute; ayer oficialmente en Londres la elecci&amp;oacute;n de Bilbao como sede de la pr&amp;oacute;xima edici&amp;oacute;n del evento. M&amp;aacute;s all&amp;aacute; de que la cita concentrar&amp;aacute; la atenci&amp;oacute;n del mundo de la gastronom&amp;iacute;a, tambi&amp;eacute;n se traducir&amp;aacute; en n&amp;uacute;meros. El impacto econ&amp;oacute;mico ser&amp;aacute; superior a los 80 millones de euros, esa es la cifra que se alcanz&amp;oacute; en la edici&amp;oacute;n de hace dos a&amp;ntilde;os, en Nueva York, solo en lo relativo al &amp;aacute;mbito de impacto en la prensa y las redes sociales. Sin embargo, ah&amp;iacute; no est&amp;aacute;n incluidos los ingresos que se generan con las visitas de los chefs invitados, los medios de comunicaci&amp;oacute;n y los patrocinadores. Tampoco el efecto llamada a turistas antes y despu&amp;eacute;s de la cita. De este modo, la cifra final podr&amp;iacute;a superar con relativa facilidad los 100 millones de euros. Toda una demostraci&amp;oacute;n de fuerza de la industria gastron&amp;oacute;mica vizcaina.&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;El evento se celebrar&amp;aacute; a mediados de junio del pr&amp;oacute;ximo a&amp;ntilde;o -todav&amp;iacute;a no se ha hecho p&amp;uacute;blica la fecha concreta-. Lo habitual es que se celebre una cena de gala un lunes y que la entrega de premios se realice al d&amp;iacute;a siguiente. Los asistentes llegan a la ciudad durante el fin de semana, lo que garantiza varios d&amp;iacute;as de ocupaci&amp;oacute;n hotelera. Adem&amp;aacute;s, la Diputaci&amp;oacute;n de Bizkaia va a organizar actividades paralelas durante los d&amp;iacute;as previos en diferentes enclaves gastron&amp;oacute;micos vizcainos y no se descarta extenderlas a otros lugares de Euskadi. Se pretende dar tambi&amp;eacute;n protagonismo a las escuelas de hosteler&amp;iacute;a de Artxanda y Leioa, as&amp;iacute; como al Basque Culinary Center.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;El diputado general de Bizkaia, Unai Rementeria, particip&amp;oacute; ayer en la presentaci&amp;oacute;n a nivel mundial -asistieron cuarenta medios de comunicaci&amp;oacute;n internacionales, entre ellos el &lt;em&gt;Financial Times&lt;/em&gt;- del encuentro, que compite con las estrellas Michelin en prestigio. Tambi&amp;eacute;n estuvo presente el director general de la empresa que organiza el Word&amp;rsquo;s 50 Best Restaurants, Charles Reed, quien destac&amp;oacute; el perfil tur&amp;iacute;stico de Bizkaia, y record&amp;oacute; que hasta ahora solo han acogido el evento tres ciudades en el mundo: Londres, Nueva York y Melbourne.&lt;/p&gt;\r\n&lt;/div&gt;'),
('30603436G', 'RODRIGUEZ FERNANDEZ , JUAN JOSE', 'ikasburua@fptxurdinaga.com', '647569173', '', '', '', 'DEST', '', '', NULL, NULL, NULL),
('30598554K', 'SANCHEZ ALEGRIA , SOLEDAD', 'masaal10@yahoo.es', '605747555', '', '', '', '', '', '', NULL, NULL, NULL),
('14259354K', 'VALVERDE RODRIGUEZ RAQUEL', 'rvalverde@fptxurdinaga.com', '699305304', '', '', '', '', '', '', NULL, NULL, NULL),
('45622151H', 'ZUÃ‘IGA POTES , URKO', 'urzuniga@fptxurdinaga.com', '650619850', '', 'ESTU', '', '', '', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kurso`
--

CREATE TABLE `kurso` (
  `Kcod` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Kurso` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `kurso`
--

INSERT INTO `kurso` (`Kcod`, `Kurso`) VALUES
('FI17IFCSM2', '2016/2017 Fami: IFC Grad: 2 SM TÃ©cnico en Sistemas MicroinformÃ¡ticos y Redes (LOE)  '),
('FI17IFCDW3', '2016/2017 Fami: IFC Grad: 3 DW TÃ©cnico Superior en Desarrollo de Aplicaciones Web (LOE)   ');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ik`
--
ALTER TABLE `ik`
  ADD PRIMARY KEY (`Kcod`,`Idni`);
ALTER TABLE `ik` ADD FULLTEXT KEY `indiceik` (`IKempfct`,`IKcont`);
ALTER TABLE `ik` ADD FULLTEXT KEY `IKempfct` (`IKempfct`,`IKcont`,`IKdual`);

--
-- Indices de la tabla `ikasle`
--
ALTER TABLE `ikasle`
  ADD PRIMARY KEY (`Idni`),
  ADD UNIQUE KEY `Itelefono` (`Itelefono`),
  ADD UNIQUE KEY `Imail` (`Imail`),
  ADD KEY `Iacts` (`Iacts`);
ALTER TABLE `ikasle` ADD FULLTEXT KEY `Iindice` (`Idni`,`Inombrea`,`Imail`,`Itelefono`,`Iact`,`Iest`,`Idact`,`Idest`,`Iacts`,`Iemp`,`Itipo`,`Icurri`);

--
-- Indices de la tabla `kurso`
--
ALTER TABLE `kurso`
  ADD PRIMARY KEY (`Kcod`),
  ADD UNIQUE KEY `Kcod` (`Kcod`);
ALTER TABLE `kurso` ADD FULLTEXT KEY `Kcod_2` (`Kcod`,`Kurso`);
ALTER TABLE `kurso` ADD FULLTEXT KEY `Kcod_3` (`Kcod`,`Kurso`);
ALTER TABLE `kurso` ADD FULLTEXT KEY `finder` (`Kcod`,`Kurso`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

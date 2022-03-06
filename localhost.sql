-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2022 at 10:07 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthone`
--
CREATE DATABASE IF NOT EXISTS `healthone` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `healthone`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `picture`) VALUES
(1, 'Roeitrainer', 'categories/roeitrainer.jpg'),
(2, 'Crosstrainer', 'categories/crosstrainer.jpg'),
(3, 'Hometrainer', 'categories/hometrainer.jpg'),
(4, 'Loopband', 'categories/loopband.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `openingstijden`
--

CREATE TABLE `openingstijden` (
  `id` int(7) NOT NULL,
  `day` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `openingstijden`
--

INSERT INTO `openingstijden` (`id`, `day`, `time`) VALUES
(1, 'Maandag', '7:00 tot 20:00'),
(2, 'Dinsdag', '8:00 tot 20:00'),
(3, 'Woensdag', '7:00 tot 20:00'),
(4, 'Donderdag', '8:00 tot 20:00'),
(5, 'Vrijdag', '7:00 tot 21:30'),
(6, 'Zaterdag', '8:00 tot 13:00'),
(7, 'Zondag', '8:00 tot 13:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `picture`, `description`, `category_id`) VALUES
(1, 'VirtuFit CTR 3.0i Ergometer Crosstrainer', 'img/categories/crosstrainer/crt1.png', 'Train op een van de meest effectieve manieren met de VirtuFit CTR 3.0i Crosstrainer. Met deze crosstrainer train je je gehele lichaam, van je benen en armen tot je core. En dat op een fijne en soepele manier. Met 32 weerstandsniveaus en 18 verschillende trainingsprogramma\'s zet je iedere keer net dat stapje extra. En je prestaties? Die zie je terug op het ultramoderne LCD display mét bluetooth.\r\n', 2),
(2, 'VirtuFit Elite FDR 2.5i Semi-Pro Crosstrainer ', 'img/categories/crosstrainer/crt2.jpeg', 'De stevige en slijtbestendige VirtuFit Elite FDR 2.5i Semi-Pro Crosstrainer geeft je een stille, vloeiende oefening, zelfs op de hoogste snelheid. Dit apparaat heeft alles in huis om optimaal te trainen. Het zware vliegwiel zorgt voor een vloeiende en prettige beweging. De VirtuFit Elite FDR 2.5i Semi-Pro Crosstrainer is voorzien van een dubbele geleiding wat zorgt voor een stille en stabiele training. De wielen van de dubbele geleiding zijn slijtvast en gelagerd en hierdoor onderhoudsvrij.', 2),
(3, 'Flow Fitness Glider DCT2500i Crosstrainer', 'img/categories/crosstrainer/crt3.jpeg', 'Een training met de Flow Fitness Glider DCT2500i Crosstrainer is een training met enorm veel variaties. Dankzij de bluetooth ontvanger is dit fitnessapparaat geschikt voor gebruik met populaire apps als Kinomap en iConsole. Daarnaast beschikt de crosstrainer ook nog eens over 24 programma\'s die je gewoon via het LCD scherm volgt en over 16 verschillende trainingsniveaus.', 2),
(4, 'Bowflex Max Trainer M10', 'img/categories/crosstrainer/crt4.png', 'De Bowflex Max Trainer M10 combineert een crosstrainer en een stepper in één fitnessapparaat. Hierdoor kun je alle spieren in je lichaam intensief trainen. Je verbrandt veel calorieën doordat je verschillende spiergroepen tegelijkertijd aan het trainen bent. De Bowflex Max M10 bevat innovatieve functies zoals connectivity met Netflix & Amazon Prime, gepersonaliseerde coaching, upper-body trainingsprogramma’s en high-intensity intervaltrainingen.', 2),
(5, 'Nautilus E628 Crosstrainer', 'img/categories/crosstrainer/crt5.png', 'De Nautilus E628 Crosstrainer is niet te vergelijken met een normale crosstrainer voor thuisgebruik. Deze crosstrainer is specifiek gericht op fanatieke sporters die puur prestatiegericht trainen en het allerbeste uit zichzelf willen halen.', 2),
(6, 'Matrix E50 Crosstrainer', 'img/categories/crosstrainer/crt6.jpeg', 'Ga voor een full body workout zonder je gewrichten te belasten met de Matrix E50 Elliptical Crosstrainer - XR. Deze crosstrainer is niet alleen mooi vormgegeven, maar is ook nog eens voorzien van de beste technische snufjes. Met de PerfectStride technologie combineert dit apparaat de ideale staplengte met een ergonomische en correcte plaatsing van je voet. ', 2),
(7, 'WaterRower Oak', 'img/categories/roeitrainer/rt1.jpeg', 'Met de WaterRower Oak simuleer je een realistische roeitraining in je eigen woonkamer. Deze roeitrainer werkt met hydraulische weerstand, waardoor de weerstand zwaarder wordt naarmate je meer kracht zet. Dit maakt het ideaal voor intervaltraining. U kunt uw voeten stevig op de verstelbare voetsteunen zetten. En dankzij de ergonomisch gevormde zitting zit je de hele training comfortabel. Ook lange mensen kunnen zonder problemen gebruik maken van de roeitrainer, omdat de rails extra lang zijn. Na de training rolt u de WaterRower Oak eenvoudig weg met de transportwielen en klapt u de rugleuning op voor compacte opslag. Let op: u dient dit product bij ontvangst zelf in elkaar te zetten.', 1),
(8, 'Tunturi FitRow 70 Water', 'img/categories/roeitrainer/rt2.png', 'Met de Tunturi FitRow 70 Water krijg je een uitdagende workout die realistisch aanvoelt dankzij de hydraulische weerstand. De natuurlijke weerstand belast uw gewrichten niet zo veel als magnetische weerstand. Bovendien wordt uw training veeleisender als u sneller roeit. De machine heeft 8 weerstandsniveaus om de weerstand goed te reguleren, zodat je stap voor stap je inspanningen kunt verhogen. Wil je niet zelf een training samenstellen, dan kun je gebruik maken van een van de 3 voorgeprogrammeerde trainingsprogramma\'s. In het overzichtelijke overzicht op het scherm zie je onder andere de afgelegde afstand, tijd en verbrande calorieën. De roeitrainer is deels inklapbaar en heeft transportwielen, zodat je hem na gebruik makkelijk ruimtebesparend opbergt.', 1),
(10, 'WaterRower Shadow', 'img/categories/roeitrainer/rt4.jpeg', 'Waan je op het water met de WaterRower Shadow. Dat komt omdat de roeitrainer werkt op hydraulische weerstand. Wanneer je begint te roeien, draait het water in de tank rond. Hoe sneller je gaat, hoe meer weerstand je voelt. Zo krijg je een realistische roeiervaring tijdens je training. Bovendien is de hydraulische weerstand nagenoeg geruisloos en worden uw gewrichten minder belast. Dit verkleint de kans op blessures. Op het display zie je je trainingsafstand, wattage, slagfrequentie en hartslag. Op zoek naar een grotere uitdaging? Sluit je laptop via de USB-kabel aan op de roeitrainer. Met de We Row-software kun je je trainingsresultaten bekijken en racen tegen je vrienden en familie.', 1),
(11, 'WaterRower A1 Home', 'img/categories/roeitrainer/rt5.jpeg\r\n', 'Roeien alsof je op het water bent. Zo voelt het als je traint met de WaterRower A1 Home. Zodra je de hendels van deze essenhouten roeitrainer naar je toe trekt, begint het water in de bak te rollen. Dit zorgt niet alleen voor een ontspannen, zacht geluid. Doordat de A1 Home waterafstotend werkt, wordt er geen druk uitgeoefend op je gewrichten. De weerstand bepaal je aan de hand van de hoeveelheid kracht waarmee je roeit. In de tussentijd kunt u uw voortgang zien op de prestatiemonitor. Nog land in zicht?', 1),
(12, 'Tunturi FitRow 40', 'img/categories/roeitrainer/rt6.png', 'De Tunturi FitRow 40 is een instapmodel roeitrainer waar ook de fanatieke roeier gebruik van kan maken. De machine heeft 8 weerstandsniveaus, waardoor je zelf bepaalt hoe zwaar je training is. De grote knoppen op het scherm zorgen ervoor dat de machine eenvoudig in te stellen is. Daarnaast laat het scherm je belangrijke trainingsgegevens zien, zoals de tijd, verbrande calorieën en het aantal slagen. Als je die gegevens niet wilt zien, kun je je tablet op de tablethouder leggen en een filmpje kijken. De banden op de voetsteunen zetten je voeten gemakkelijk vast. Als je klaar bent, klap je de roeitrainer in en rol je hem met behulp van de wieltjes gemakkelijk in een hoek van de kamer.', 1),
(13, 'Tunturi Performance E50 Hometrainer', 'img/categories/hometrainer/hmt1.jpeg', 'De Tunturi Performance E50 Hometrainer maakt je training breder. De vele programma variaties bieden je zowel uitdaging als afwisseling. De Performance E50 hometrainer heeft er 20. Een handmatig programma voor volledige controle, vier beginner programma\'s, 4 gevorderden programma\'s, 4 sporty programma\'s, 4 hartslag gestuurde programma\'s, een wattage programma, een hartslag herstel programma en een body fat programma. Het wattage programma reikt van 10 tot 350 Watt in stappen van 5 Watt. De meeste van deze programma\'s passen zelf de weerstand van de hometrainer aan. Natuurlijk kun je altijd zelf een andere weerstand instellen als je wilt met de draaiknop op het display. Voor meer trainingsmogelijkheden kun je de apps iConsole+ , Kinomap, Tunturi routes en Zwift downloaden op je smartphone of tablet, deze plaats je vervolgens in de ingebouwde tablethouder.', 3),
(14, 'Flow Fitness Pro UB5i Upright Bike Hometrainer', 'img/categories/hometrainer/hmt2.jpeg', 'De nieuwe Flow Fitness Pro UB5i Upright Bike Hometrainer is dé hometrainer voor professioneel gebruik. Het robuuste en stabiele ontwerp, het comfortable zadel en het gebruiksvriendelijke display zijn slechts enkele eigenschappen die van de UB5i een fitnessapparaat uit het hogere segment maken.', 3),
(15, 'Matrix U50 Hometrainer - XR', 'img/categories/hometrainer/hmt3.jpeg', 'De Matrix U50 Hometrainer - XR biedt alles wat je gewend bent van een professionele hometrainer in de sportschool, maar dan voor gebruik in je eigen huis. De fitnessapparaten van Matrix zijn krachtig, innovatief, stijlvol en hebben een lange levensduur. Dit alles zie je terug in de U50 Hometrainer.', 3),
(16, 'Nautilus U628 - Hometrainer - Black ', 'img/categories/hometrainer/hmt4.jpeg', 'Deze nieuwe lijn van Nautilus is specifiek gericht op fanatieke sporters die puur prestatiegericht trainen. De lijn van Nautilus is niet te vergelijken met normale fitnessapparatuur voor thuisgebruik.\r\n\r\nDe Nautilus beschikt over 29 trainingsprogramma\'s op basis van interval, uitdagingen, gewichtscontrole en hartslag. Door de combinatie van weerstand en automatische hellingshoek is geen enkele training saai. De U628 is voorzien van twee STN LCD schermen met blauwe achtergrondverlichting voor een betere weergave van je trainingsgegevens. De weerstand van de Nautilus word geregeld door een EN 957 klasse S EMS systeem waardoor de gegeneerde wattage uiterst accuraat wordt weergegeven.', 3),
(17, 'Schwinn Airdyne AD8 Pro Total Fitness Bike', 'img/categories/hometrainer/hmt5.jpeg', 'De nieuwe Schwinn Airdyne AD8 PRO is de belichaming van de enorme reputatie van Schwinn met volledige aanpassing aan alles wat de fanatieke sporter van tegenwoordig verwacht van een training. De Schwinn AD8 PRO Total Fitness Bike is gebouwd om lang mee te gaan en om enorm zware HIIT trainingen te weerstaan. Elk detail is ontworpen en gekozen voor prestaties en duurzaamheid.\r\n', 3),
(18, 'Tunturi Competence F40 Hometrainer', 'img/categories/hometrainer/hmt6.jpeg', 'De Tunturi Competence F40 Hometrainer heeft goede eigenschappen om thuis lange fietstochten af te leggen. Deze toegankelijke hometrainer heeft een lage opstap en een snelstart functie om direct te beginnen. De draaiknop op het display schakelt tussen de 32 verschillende weerstand niveaus om je op je eigen manier te laten trainen. Je kunt ook met programma\'s je niveau kiezen en de weerstand automatisch laten aanpassen. De F40 hometrainer heeft 4 beginner programma\'s, 4 gevorderden programma\'s en 4 sport programma\'s. Verder vind je tussen de 19 programma\'s van deze hometrainer 4 hartslag gestuurde programma\'s, een hartslag herstel test, een body fat programma en het handmatige programma waarmee je zelf alles in stelt. Deze programma\'s kun je uitbreiden met de i-Console+ app, KinoMap app, Tunturi Routes en Zwift via je Android of iOS smartphone of tablet.', 3),
(19, 'Bowflex Loopband 56 met Decline en Touchscreen ', 'img/categories/loopband/lpb1.jpeg', 'Met een extra groot loopoppervlak van maar liefst 56 x 152 cm en de mogelijkheid om zowel bergafwaarts- als bergopwaarts (-5% tot +20%) te trainen is de Bowflex Loopband 56 een unieke loopband waarbij je alle mogelijkheden hebt om je prestaties te verbeteren. Naast de vele opties via Explore the World en JRNY heeft deze loopband ook 16 standaardprogramma\'s ingebouwd zodat je ook zonder connectie met een smart device kunt kiezen uit vele mogelijkheden. Deze loopband is geschikt voor zowel thuisgebruik als zakelijk gebruik zoals in een fysiopraktijk, hotel, school of kazerne.', 4),
(20, 'VirtuFit Elite TR-500i Loopband', 'img/categories/loopband/lpb2.jpeg', 'De VirtuFit Elite TR-500i Loopband is ontworpen voor serieuze hardlopers. Zo\'n loopband heeft andere eigenschappen dan een model waar je een uurtje in het weekend op loopt. De VirtuFit Elite TR-500i is gemaakt van betere materialen en geschikt voor intensief gebruik. Hij heeft weinig onderhoud nodig en waarschuwt je bovendien als het tijd wordt om de band te smeren. Smeerolie om de band te onderhouden is bij deze loopband meegeleverd.', 4),
(21, 'Flow Fitness DTM400i Loopband', 'img/categories/loopband/lpb3.png', 'Direct aan de slag met je conditie en je calorieën. De Flow Fitness DTM 400i Loopband heb je in no time in elkaar en de simpele \"touch\" bediening is direct duidelijk. Deze sterke loopband heeft een stille 2.5 pk motor met een maximum snelheid van 14 km/u, welke instelbaar isin stappen van 0,2 km/u.\r\n', 4),
(22, 'Finnlo Technum IV USB Loopband', 'img/categories/loopband/lpb4.jpeg', 'De Finnlo Technum IV USB Loopband komt uit de nieuwe generatie Finnlo Loopbanden. Het is een loopband die technische kwaliteit en een mooie vormgeving combineert om thuis stevig te sporten. ', 4),
(23, 'Matrix TF50 Loopband - XR', 'img/categories/loopband/lpb5.jpeg', 'Ervaar een natuurlijke en professionele hardlooptraining in je eigen huis met de Matrix TF50 Loopband. Dit stevige frame met geavanceerde loopband is de beste van deze tijd en dat merk je direct. In combinatie met de Matrix XR Console heb je ook nog eens de mogelijkheid om gebruik te maken van verschillende programma\'s en ben je verbonden met je favoriete trainings apps.', 4),
(24, 'Flow Fitness Runner DTM2000i Loopband', 'img/categories/loopband/lpb6.jpeg', 'De Flow Fitness Runner DTM2000i Loopband is een krachtige loopband die je van alle gemakken voorziet. Het is een sterk apparaat met vele technische snufjes. Een ideale keuze als je op zoek bent naar een loopband voor thuis.\r\n', 4),
(49, 'Roeitrainer', 'img/categories/roeitrainer/9723260d43ced20402a02a11f4f6c5d6.jpeg', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `stars` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `name`, `date`, `description`, `stars`, `product_id`) VALUES
(22, 'Jacob', '2022-03-06', 'Goed', 2, 2),
(23, 'Jacob', '2022-03-06', 'test', 5, 2),
(24, 'Dinesh', '2022-03-06', 'Goede aparaat', 4, 11),
(25, 'Bob', '2022-03-06', 'Goed', 3, 13);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `role` enum('member','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `first_name`, `last_name`, `role`) VALUES
(1, 'admin_dinesh@hotmail.com', 'adminDinesh', 'Dinesh', 'Alias', 'admin'),
(3, 'member_dinesh@hotmail.com', 'memberBob', 'Bob', 'Test', 'member'),
(13, 'teststudent@gmail.com', 'test123', 'Dinesh', 'Alias', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `openingstijden`
--
ALTER TABLE `openingstijden`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `openingstijden`
--
ALTER TABLE `openingstijden`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

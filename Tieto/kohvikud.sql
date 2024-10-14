-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Loomise aeg: Mai 17, 2024 kell 12:34 PL
-- Serveri versioon: 10.4.32-MariaDB
-- PHP versioon: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Andmebaas: `kohvikud`
--

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `hinnangud`
--

CREATE TABLE `hinnangud` (
  `id` int(6) NOT NULL,
  `nimi` varchar(255) NOT NULL,
  `kommentaar` varchar(255) NOT NULL,
  `hinnang` int(2) NOT NULL,
  `toidukohad_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Andmete tõmmistamine tabelile `hinnangud`
--

INSERT INTO `hinnangud` (`id`, `nimi`, `kommentaar`, `hinnang`, `toidukohad_id`) VALUES
(1, 'Rolfson, Bogisich and Bruen', 'In congue. Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst.', 7, 32),
(2, 'Connelly LLC', 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices', 6, 78),
(3, 'Lebsack-VonRueden', 'Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius.', 9, 85),
(4, 'Ebert Inc', 'Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.', 8, 7),
(5, 'Turner LLC', 'Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus.', 4, 57),
(6, 'Adams-Ledner', 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', 9, 46),
(7, 'Krajcik-Steuber', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus.', 9, 82),
(8, 'Kuphal Group', 'Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae', 8, 6),
(9, 'Steuber-Murray', 'Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula.', 7, 77),
(10, 'Crist, Shields and Gerlach', 'Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat du', 3, 34),
(11, 'Greenholt, Schultz and Ondricka', 'Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', 4, 61),
(12, 'Reinger-Runolfsson', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pha', 4, 36),
(13, 'Sauer LLC', 'Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue.', 3, 46),
(14, 'Wolff, Stoltenberg and Stiedemann', 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus.', 8, 92),
(15, 'Schaefer-McKenzie', 'In eleifend quam a odio. In hac habitasse platea dictumst.', 2, 43),
(16, 'Dickens, Bradtke and Connelly', 'Praesent lectus. Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis. Duis consequat dui nec nisi volut', 7, 51),
(17, 'Barrows-Bradtke', 'In sagittis dui vel nisl.', 8, 72),
(18, 'Hettinger-O\'Keefe', 'Nulla suscipit ligula in lacus. Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam. Nam tristique tortor eu pede.', 7, 95),
(19, 'Hackett, Hansen and Oberbrunner', 'Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis. Sed ante. Viv', 8, 72),
(20, 'Moore, Jaskolski and Rolfson', 'Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculi', 8, 13),
(21, 'Wiegand, Zboncak and Howe', 'Nunc rhoncus dui vel sem. Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', 3, 3),
(22, 'Schmidt LLC', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo.', 4, 33),
(23, 'O\'Reilly, Brekke and Runolfsdottir', 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pell', 5, 51),
(24, 'Daugherty Inc', 'Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae', 7, 44),
(25, 'Pfannerstill, Robel and Schumm', 'Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo.', 4, 11),
(26, 'Hilpert, Borer and Rogahn', 'Mauris sit amet eros. Suspendisse accumsan tortor quis turpis. Sed ante. Vivamus tortor.', 10, 75),
(27, 'Hyatt, Price and Schuster', 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem.', 9, 37),
(28, 'Greenholt-Durgan', 'In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit.', 2, 7),
(29, 'Ratke-Mills', 'Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl. Nunc nisl. Duis', 10, 72),
(30, 'Carter, Okuneva and Hermann', 'Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem. Sed sagittis. Nam congue, risus semper porta volutpat, quam pede', 10, 47),
(31, 'Windler-Rempel', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 7, 31),
(32, 'Stoltenberg, Wiegand and Kuvalis', 'Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus. Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus ', 7, 70),
(33, 'Gutkowski and Sons', 'In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vita', 9, 53),
(34, 'Spencer, Rau and Cormier', 'Aliquam sit amet diam in magna bibendum imperdiet.', 3, 84),
(35, 'Reynolds, Pfeffer and D\'Amore', 'Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio.', 6, 42),
(36, 'Kihn, Will and Block', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et t', 10, 61),
(37, 'Block-Steuber', 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel ', 7, 1),
(38, 'Shields-Legros', 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam portt', 7, 84),
(39, 'Yundt-Rutherford', 'In congue. Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus. Nulla ut erat id mauris vulputate elementum.', 1, 38),
(40, 'Schaden-Hilll', 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 5, 90),
(41, 'Koch, Herzog and King', 'Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla.', 2, 69),
(42, 'Leannon LLC', 'Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio.', 4, 82),
(43, 'Gerlach-Gerlach', 'Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, lu', 9, 67),
(44, 'Lang, Hilpert and Koepp', 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcor', 6, 13),
(45, 'Jacobs Group', 'Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 5, 87),
(46, 'Langworth-Altenwerth', 'Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.', 4, 46),
(47, 'Rau and Sons', 'Fusce consequat. Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa.', 1, 43),
(48, 'Ankunding Inc', 'Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio.', 3, 25),
(49, 'Herzog Group', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', 4, 19),
(50, 'Reichert, Herzog and Lueilwitz', 'Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.', 2, 15),
(51, 'Roberts, Emard and Boyer', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum. Proin eu mi.', 5, 67),
(52, 'Barton Group', 'Aliquam erat volutpat. In congue. Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius.', 8, 74),
(53, 'Mosciski Inc', 'Nunc purus. Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio.', 5, 31),
(54, 'Barrows, Howell and McGlynn', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id', 8, 7),
(55, 'Metz, Casper and Daniel', 'Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo.', 8, 84),
(56, 'Flatley-Roberts', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula ve', 7, 47),
(57, 'Heller-Rempel', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus.', 4, 44),
(58, 'Kemmer LLC', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan', 2, 47),
(59, 'Ryan, Nienow and Koch', 'Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue. Vestibulum rutrum rutrum neque.', 10, 33),
(60, 'Swaniawski, Spinka and Feeney', 'Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia C', 2, 78),
(61, 'Blanda, Durgan and Kerluke', 'Proin risus. Praesent lectus. Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis. Duis consequat dui n', 3, 62),
(62, 'O\'Kon-Boyle', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus. Curabi', 5, 17),
(63, 'Leuschke, Reilly and Schimmel', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus.', 4, 27),
(64, 'Champlin-Hessel', 'Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tin', 7, 68),
(65, 'O\'Kon, Bogisich and Bins', 'Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat. In congue. Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst.', 5, 91),
(66, 'Wiza and Sons', 'Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus', 10, 8),
(67, 'Parisian-Yost', 'Nulla suscipit ligula in lacus. Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', 7, 51),
(68, 'Klein LLC', 'Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti.', 3, 33),
(69, 'Erdman-Marquardt', 'Donec ut dolor.', 4, 13),
(70, 'Becker Group', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique.', 5, 15),
(71, 'Quigley Inc', 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti. In eleifend quam a odio.', 5, 52),
(72, 'Jakubowski Group', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices.', 4, 11),
(73, 'Conn, White and Roob', 'Ut tellus.', 4, 10),
(74, 'Metz Inc', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus. Curabi', 2, 40),
(75, 'Ullrich LLC', 'Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet.', 6, 23),
(76, 'Davis, Rowe and Barton', 'Suspendisse accumsan tortor quis turpis. Sed ante. Vivamus tortor. Duis mattis egestas metus. Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet', 1, 88),
(77, 'Casper-Schumm', 'Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.', 5, 71),
(78, 'Fahey, Turcotte and Kohler', 'Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat', 8, 89),
(79, 'Medhurst, Nader and Ritchie', 'Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis. Sed ante. Vivamus tortor.', 5, 56),
(80, 'Heller, Dickinson and West', 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', 3, 28),
(81, 'Larkin, Mayer and Windler', 'Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tri', 7, 87),
(82, 'Bahringer and Sons', 'Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', 7, 16),
(83, 'Schultz, Jerde and Bechtelar', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis. Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus. Mauris eni', 3, 80),
(84, 'Murazik Group', 'Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue.', 9, 98),
(85, 'Spinka-Mraz', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id', 4, 31),
(86, 'Braun LLC', 'Duis mattis egestas metus. Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in fauci', 7, 49),
(87, 'Farrell and Sons', 'Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing', 2, 94),
(88, 'Sawayn Group', 'Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis. Donec semper sapien a libero.', 8, 39),
(89, 'Hammes-Bechtelar', 'In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vita', 6, 47),
(90, 'Cronin, Schaefer and Sauer', 'Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sa', 5, 36),
(91, 'Hoeger Group', 'Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros.', 6, 16),
(92, 'Yundt-Hodkiewicz', 'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi. Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, v', 6, 34),
(93, 'Jast, Schowalter and Konopelski', 'Vivamus tortor. Duis mattis egestas metus. Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum', 9, 13),
(94, 'Ebert-Smith', 'Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lo', 6, 87),
(95, 'Keeling-Torphy', 'Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst.', 8, 92),
(96, 'Lemke and Sons', 'Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices. Phasellus', 10, 86),
(97, 'Hackett-Grimes', 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.', 10, 44),
(98, 'Rodriguez Inc', 'Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.', 8, 59),
(99, 'Paucek-Schmidt', 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat. In congue. Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea di', 8, 34),
(100, 'Gerlach, Heller and Kessler', 'Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 2, 35);

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `toidukohad`
--

CREATE TABLE `toidukohad` (
  `id` int(6) NOT NULL,
  `nimi` varchar(255) NOT NULL,
  `asukoht` varchar(255) NOT NULL,
  `keskmine_hinne` double NOT NULL,
  `hinnatud` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Andmete tõmmistamine tabelile `toidukohad`
--

INSERT INTO `toidukohad` (`id`, `nimi`, `asukoht`, `keskmine_hinne`, `hinnatud`) VALUES
(1, 'Bil', 'Asopós', 9.3, 7),
(2, 'Antoni', 'Kainan', 6.9, 85),
(3, 'Christine', 'Kanye', 2.5, 42),
(4, 'Raynor', 'Guazacapán', 5.4, 37),
(5, 'Vin', 'Alibago', 6.6, 95),
(6, 'Lurline', 'Goascorán', 6.6, 56),
(7, 'Florina', 'Providencia', 8.6, 33),
(8, 'Dean', 'Tuateta', 3.4, 94),
(9, 'Klaus', 'Lille', 3, 84),
(10, 'Norah', 'Xinsheng', 1.2, 40),
(11, 'Cristiano', 'Krajan', 4.4, 21),
(12, 'Eduardo', 'Leigongmiao', 9.5, 31),
(13, 'Ronnica', 'Siayan', 4.6, 32),
(14, 'Dore', 'Sidi Redouane', 3.3, 4),
(15, 'Dermot', 'Kungsör', 4.8, 77),
(16, 'Ginger', 'Bieligutai', 6.6, 65),
(17, 'Giusto', 'Sirnarasa', 1.7, 15),
(18, 'Patrizius', 'Tantu', 6.5, 88),
(19, 'Nelia', 'Litein', 2, 8),
(20, 'Candace', 'Gudja', 5.5, 35),
(21, 'Godfry', 'København', 9.5, 60),
(22, 'Michaela', 'Kítsi', 8.9, 82),
(23, 'Donella', 'Mullsjö', 2.1, 95),
(24, 'Stacy', 'San Celestio', 9.2, 26),
(25, 'Ulises', 'Mengla', 2.8, 18),
(26, 'Tully', 'Dzerzhinskiy', 2.6, 82),
(27, 'Tootsie', 'Pom Prap Sattru Phai', 5.5, 29),
(28, 'Lars', 'Linköping', 5, 31),
(29, 'Viki', 'Hengqiao', 6.8, 70),
(30, 'Corbet', 'Oujiangcha', 1.7, 34),
(31, 'Fionnula', 'Babice', 2.3, 100),
(32, 'Erhard', 'Bintuni', 8.5, 90),
(33, 'Susanetta', 'Mallow', 7.2, 21),
(34, 'Emory', 'Örebro', 7.6, 44),
(35, 'Chrystal', 'Huangdimiao', 1.6, 70),
(36, 'Tanner', 'Pittsburgh', 4.7, 92),
(37, 'Vern', 'Pailiao', 4.9, 100),
(38, 'Donnajean', 'Brant', 5.2, 51),
(39, 'Mel', 'Xique Xique', 1.1, 14),
(40, 'Violette', 'Littleton', 3.9, 40),
(41, 'Chiquita', 'Siukh', 8, 95),
(42, 'Elsey', 'El Hajeb', 2.4, 78),
(43, 'Hank', 'Mimbaan Timur', 2.3, 99),
(44, 'Fania', 'Waitakere', 1, 22),
(45, 'Lorne', 'Blagaj', 3.4, 16),
(46, 'Camel', 'Novallas', 4.1, 93),
(47, 'Marleen', 'Amboise', 2.9, 98),
(48, 'Betti', 'Janakpur', 1.1, 25),
(49, 'Kristo', 'Tunjë', 1.2, 20),
(50, 'Alford', 'Turenki', 2.3, 64),
(51, 'Veronika', 'Itapaci', 3.9, 36),
(52, 'Lew', 'Konduga', 5.6, 7),
(53, 'Natala', 'Masape', 8.4, 34),
(54, 'Ram', 'Makoua', 9.5, 59),
(55, 'Rowney', 'Amagasaki', 9.9, 45),
(56, 'Pierson', 'Adstock', 6.2, 71),
(57, 'Lydia', 'Cockburn Town', 9.6, 68),
(58, 'Arlen', 'Shuanghe', 1.1, 50),
(59, 'Ulrick', 'Sobotka', 7.4, 33),
(60, 'Kania', 'Nivnice', 9, 93),
(61, 'Donnajean', 'Duncans', 7.7, 66),
(62, 'Hew', 'Taposan', 5, 72),
(63, 'Lexis', 'Vágia', 8.1, 87),
(64, 'Kassandra', 'Bantengan', 9.5, 62),
(65, 'Margarette', 'Hod HaSharon', 3.2, 71),
(66, 'Vera', 'Shanmu', 1.4, 83),
(67, 'Maje', 'Um Jar Al Gharbiyya', 1.1, 44),
(68, 'Rochester', 'Bāsawul', 8.3, 62),
(69, 'Nico', 'Nidri', 5.6, 45),
(70, 'Torry', 'Alung', 3.3, 8),
(71, 'Anya', 'Pásion', 6.3, 64),
(72, 'Brenda', 'Gagarin', 2.9, 59),
(73, 'Faustina', 'Thawi Watthana', 8.2, 46),
(74, 'Rusty', 'Trelleborg', 5.1, 100),
(75, 'Jewelle', 'Pampamarca', 1.6, 44),
(76, 'Rhoda', 'Thaton', 8.8, 35),
(77, 'Cleavland', 'Obršani', 7.7, 16),
(78, 'Terry', 'Guangshan', 4.2, 62),
(79, 'Nina', 'Mount Ayliff', 9.4, 71),
(80, 'Carlina', 'Starokucherganovka', 5.9, 37),
(81, 'Arley', 'Korydallós', 9.1, 47),
(82, 'Ignatius', 'Chadi', 9.8, 93),
(83, 'Everard', 'Aurillac', 6.6, 84),
(84, 'Shirlee', 'Kowang Utara', 7.8, 27),
(85, 'Dalila', 'Sävedalen', 5.5, 35),
(86, 'Lionello', 'Lianshi', 5.4, 88),
(87, 'Kingston', 'Chaem Luang', 3.7, 83),
(88, 'Aridatha', 'Radzyń Chełmiński', 6.7, 35),
(89, 'Davie', 'Maroua', 2.5, 94),
(90, 'Juditha', 'Quiling', 3.4, 24),
(91, 'Carlyn', 'Cacoal', 6.8, 61),
(92, 'Lucienne', 'Luna', 4.1, 62),
(93, 'Winnah', 'Kstovo', 6, 84),
(94, 'Thaine', 'Caaguazú', 1, 99),
(95, 'Merrily', 'Masis', 4.8, 87),
(96, 'Randall', 'Baishuiyang', 4.5, 64),
(97, 'Chelsey', 'Vryburg', 6.2, 30),
(98, 'Costa', 'Diré', 4.4, 40),
(99, 'Emmi', 'Begang', 3.7, 39),
(100, 'Beulah', 'Jiuzhen', 1.3, 92);

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `hinnangud`
--
ALTER TABLE `hinnangud`
  ADD PRIMARY KEY (`id`);

--
-- Indeksid tabelile `toidukohad`
--
ALTER TABLE `toidukohad`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `hinnangud`
--
ALTER TABLE `hinnangud`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT tabelile `toidukohad`
--
ALTER TABLE `toidukohad`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 24, 2016 at 12:23 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `860332`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `email`, `ts`) VALUES
(0, 'first', 'first', 'first@gmail.com', '2015-07-09 15:02:56'),
(1, 'furtula', 'register91', 'furtula@live.com', '2015-06-15 12:57:41'),
(2, 'second', 'second', 'second@gmail.com', '2015-08-13 23:12:01'),
(3, 'marko.markovic', 'qwerty1234', 'marko.markovic@gmail.com', '2015-10-19 20:20:12');

-- --------------------------------------------------------

--
-- Table structure for table `bexpression`
--

CREATE TABLE IF NOT EXISTS `bexpression` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE utf8_bin NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `desc` varchar(50) COLLATE utf8_bin NOT NULL,
  `formula` varchar(50) COLLATE utf8_bin NOT NULL,
  `pre` varchar(50) COLLATE utf8_bin NOT NULL,
  `suf` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=142 ;

--
-- Dumping data for table `bexpression`
--

INSERT INTO `bexpression` (`id`, `type`, `name`, `desc`, `formula`, `pre`, `suf`) VALUES
(3, 'Operacije', 'Razlomak', 'square/square', '()/()', '', ''),
(4, 'Operacije', 'Brojilac', 'square/M', '()/()', '(', ')/(M)'),
(5, 'Operacije', 'Imenilac', 'M/square', '()/()', '(M)/(', ')'),
(6, 'Stepenovanje i indeksiranje', 'Kvadratni koren', 'sqrt(square)', 'sqrt()', 'sqrt(', ')'),
(7, 'Stepenovanje i indeksiranje', 'Koren', 'root(square)(square)', 'root()()', '', ''),
(8, 'Stepenovanje i indeksiranje', 'Stepen korena', 'root(square)(M)', 'root()()', 'root(', ')(M)'),
(9, 'Stepenovanje i indeksiranje', 'Pod korenom', 'root(M)(square)', 'root()()', 'root(M)(', ')'),
(10, 'Stepenovanje i indeksiranje', 'Stepenovanje', '(square)^(square)', '()^()', '', ''),
(11, 'Stepenovanje i indeksiranje', 'Stepen', '(M)^(square)', '()^()', '(M)^(', ')'),
(12, 'Stepenovanje i indeksiranje', 'Baza stepena', '(square)^(M)', '()^()', '(', ')^(M)'),
(13, 'Stepenovanje i indeksiranje', 'Indeksiranje', '(square)_(square)', '()_()', '', ''),
(14, 'Stepenovanje i indeksiranje', 'Indeks', '(M)_(square)', '()_()', '(M)_(', ')'),
(15, 'Stepenovanje i indeksiranje', 'Baza indeksa', '(square)_(M)', '()_()', '(', ')_(M)'),
(16, 'Zagrade', 'Zagrade', '(square)', '()', '(', ')'),
(17, 'Zagrade', 'Leva zagrada', '(', '(', '', ''),
(18, 'Zagrade', 'Desna zagrada', ')', ')', '', ''),
(19, 'Zagrade', 'Uglaste zagrade', '[square]', '[]', '[', ']'),
(20, 'Zagrade', 'Uglasta leva zagrada', '[', '[', '', ''),
(21, 'Zagrade', 'Uglasta desna zagrada', ']', ']', '', ''),
(22, 'Zagrade', 'Vitičaste zagrade', '{square}', '{}', '{', '}'),
(23, 'Zagrade', 'Vitičasta leva zagrada', '{', '{', '', ''),
(24, 'Zagrade', 'Vitičasta desna zagrada', '}', '}', '', ''),
(25, 'Zagrade', 'Apsolutno', '|square|', '||', '|', '|'),
(26, 'Operacije', 'Plus', '+', '+', '', ''),
(27, 'Operacije', 'Minus', '-', '-', '', ''),
(28, 'Operacije', 'Vektorski proizvod', 'xx', 'xx', '', ''),
(29, 'Operacije', 'Skalarni proizvod', '*', '*', '', ''),
(30, 'Operacije', 'Podeljeno', '//', '//', '', ''),
(31, 'Relacije', 'Jednako', '=', '=', '', ''),
(32, 'Relacije', 'Manje', '<', '<', '', ''),
(33, 'Relacije', 'Veće', '>', '>', '', ''),
(34, 'Relacije', 'Manje ili jednako', '<=', '<=', '', ''),
(35, 'Relacije', 'Veće ili jednako', '>=', '>=', '', ''),
(36, 'Relacije', 'Pripada', 'in', 'in', '', ''),
(37, 'Relacije', 'Ne pripada', '!in', '!in', '', ''),
(38, 'Relacije', 'Različito', '!=', '!=', '', ''),
(39, 'Relacije', 'Levi podskup', 'sub', 'sub', '', ''),
(40, 'Relacije', 'Desni podskup', 'sup', 'sup', '', ''),
(41, 'Relacije', 'Levi pravi podskup', 'sube', 'sube', '', ''),
(42, 'Relacije', 'Desni pravi podskup', 'supe', 'supe', '', ''),
(43, 'Operacije', 'Unija', 'uu', 'uu', '', ''),
(44, 'Operacije', 'Presek', 'nn', 'nn', '', ''),
(45, 'Relacije', 'Približno', '~~', '~~', '', ''),
(46, 'Relacije', 'Približno jednako', '~=', '~=', '', ''),
(47, 'Simboli', 'Prazan skup', 'O/', 'O/', '', ''),
(48, 'Operacije', 'Plus-minus', '+-', '+-', '', ''),
(49, 'Operacije', 'Suma', 'sum_(square)^(square)(square)', 'sum_()^()()', '', ''),
(50, 'Operacije', 'Proizvod', 'prod_(square)^(square)(square)', 'prod_()^()()', '', ''),
(51, 'Operacije', 'Konjukcija', '^^', '^^', '', ''),
(52, 'Operacije', 'Velika konjukcija', '^^^_(square)^(square)(square)', '^^^_()^()()', '', ''),
(53, 'Operacije', 'Disjunkcija', 'vv', 'vv', '', ''),
(54, 'Operacije', 'Velika disjunkcija', 'vvv_(square)^(square)(square)', 'vvv_()^()()', '', ''),
(55, 'Operacije', 'Veliki presek', 'nnn_(square)^(square)(square)', 'nnn_()^()()', '', ''),
(56, 'Operacije', 'Velika unija', 'uuu_(square)^(square)(square)', 'uuu_()^()()', '', ''),
(57, 'Simboli', 'Integral', 'int_(square)^(square)(square)', 'int_()^()()', '', ''),
(58, 'Simboli', 'Parcijalni izvod', 'del', 'del', '', ''),
(59, 'Simboli', 'Nabla', 'grad', 'grad', '', ''),
(60, 'Simboli', 'Beskonačno', 'oo', 'oo', '', ''),
(61, 'Simboli', 'Ugao', '/_', '/_', '', ''),
(62, 'Simboli', 'Zaključak', ':.', ':.', '', ''),
(63, 'Simboli', 'Horizontalne tri tačke', 'cdots', 'cdots', '', ''),
(64, 'Simboli', 'Vertikalne tri tačke', 'vdots', 'vdots', '', ''),
(65, 'Simboli', 'Dijagonalne tri tačke', 'ddots', 'ddots', '', ''),
(66, 'Simboli', 'Skup kompleksnih brojeva', 'CC', 'CC', '', ''),
(67, 'Simboli', 'Skup prirodnih brojeva', 'NN', 'NN', '', ''),
(68, 'Simboli', 'Skup iracionalnih brojeva', 'QQ', 'QQ', '', ''),
(69, 'Simboli', 'Skup racionalnih brojeva', 'RR', 'RR', '', ''),
(70, 'Simboli', 'Skup celih brojeva', 'ZZ', 'ZZ', '', ''),
(71, 'Zagrade', 'Gornji ceo deo', '|~square~|', '|~~|', '|~', '~|'),
(72, 'Zagrade', 'Donji ceo deo', '|__square__|', '|____|', '|__', '__|'),
(73, 'Zagrade', 'Gornja leva zagrada celog dela', '|~', '|~', '', ''),
(74, 'Zagrade', 'Gornja desna zagrada celog dela', '~|', '~|', '', ''),
(75, 'Zagrade', 'Donja leva zagrada celog dela', '|__', '|__', '', ''),
(76, 'Zagrade', 'Donja desna zagrada celog dela', '__|', '__|', '', ''),
(78, 'Stepenovanje i indeksiranje', 'Kapica', 'hat(square)', 'hat()', 'hat(', ')'),
(79, 'Stepenovanje i indeksiranje', 'Nadvučeno', 'bar(square)', 'bar()', 'bar(', ')'),
(80, 'Stepenovanje i indeksiranje', 'Podvučeno', 'ul(square)', 'ul()', 'ul(', ')'),
(81, 'Stepenovanje i indeksiranje', 'Vektor', 'vec(square)', 'vec()', 'vec(', ')'),
(82, 'Logički simboli i strelice', 'Negacija', 'not', 'not', '', ''),
(83, 'Logički simboli i strelice', 'Implikacija', '=>', '=>', '', ''),
(84, 'Logički simboli i strelice', 'Ekvivalencija', 'iff', 'iff', '', ''),
(85, 'Logički simboli i strelice', 'Za svako', 'AA', 'AA', '', ''),
(86, 'Logički simboli i strelice', 'Postoji', 'EE', 'EE', '', ''),
(87, 'Logički simboli i strelice', 'Nete', '_|_', '_|_', '', ''),
(88, 'Logički simboli i strelice', 'Te', 'TT', 'TT', '', ''),
(89, 'Logički simboli i strelice', 'Dokaz', '|--', '|--', '', ''),
(90, 'Logički simboli i strelice', 'Dupli dokaz', '|==', '|==', '', ''),
(91, 'Logički simboli i strelice', 'Strelica gore', 'uarr', 'uarr', '', ''),
(92, 'Logički simboli i strelice', 'Strelica dole', 'darr', 'darr', '', ''),
(93, 'Logički simboli i strelice', 'Strelica desno', '->', '->', '', ''),
(94, 'Logički simboli i strelice', 'Strelica desno s crtom', '|->', '|->', '', ''),
(95, 'Logički simboli i strelice', 'Strelica levo', 'larr', 'larr', '', ''),
(96, 'Logički simboli i strelice', 'Strelica levo i desno', 'harr', 'harr', '', ''),
(97, 'Relacije', 'Modul', '-=', '-=', '', ''),
(98, 'Simboli', 'Limes', 'lim_(square->square)', 'lim_(->)', '', ''),
(99, 'Operacije', 'Primer matrice 2x2', '[[square,square],[square,square]]', '[[,],[,]]', '', ''),
(100, 'Simboli', 'Kvadratić', 'square', 'square', '', ''),
(101, 'Simboli', 'Zvezdica', '**', '**', '', ''),
(102, 'Operacije', 'Deljenje', '-:', '-:', '', ''),
(103, 'Simboli', 'Kružić', '@', '@', '', ''),
(104, 'Grčka slova', 'Alfa', 'alpha', 'alpha', '', ''),
(105, 'Grčka slova', 'Beta', 'beta', 'beta', '', ''),
(106, 'Grčka slova', 'Hi', 'chi', 'chi', '', ''),
(107, 'Grčka slova', 'Delta', 'delta', 'delta', '', ''),
(108, 'Grčka slova', 'Veliko delta', 'Delta', 'Delta', '', ''),
(109, 'Grčka slova', 'Epsilon', 'epsilon', 'epsilon', '', ''),
(110, 'Grčka slova', 'Varepsilon', 'varepsilon', 'varepsilon', '', ''),
(111, 'Grčka slova', 'Eta', 'eta', 'eta', '', ''),
(112, 'Grčka slova', 'Gama', 'gamma', 'gamma', '', ''),
(113, 'Grčka slova', 'Veliko gama', 'Gamma', 'Gamma', '', ''),
(114, 'Grčka slova', 'Jota', 'iota', 'iota', '', ''),
(115, 'Grčka slova', 'Kapa', 'kappa', 'kappa', '', ''),
(116, 'Grčka slova', 'Lambda', 'lambda', 'lambda', '', ''),
(117, 'Grčka slova', 'Veliko lambda', 'Lambda', 'Lambda', '', ''),
(118, 'Grčka slova', 'Mi', 'mu', 'mu', '', ''),
(119, 'Grčka slova', 'Ni', 'nu', 'nu', '', ''),
(120, 'Grčka slova', 'Omega', 'omega', 'omega', '', ''),
(121, 'Grčka slova', 'Veliko omega', 'Omega', 'Omega', '', ''),
(122, 'Grčka slova', 'Fi', 'phi', 'phi', '', ''),
(123, 'Grčka slova', 'Veliko fi', 'Phi', 'Phi', '', ''),
(124, 'Grčka slova', 'Varfi', 'varphi', 'varphi', '', ''),
(125, 'Grčka slova', 'Pi', 'pi', 'pi', '', ''),
(126, 'Grčka slova', 'Veliko pi', 'Pi', 'Pi', '', ''),
(127, 'Grčka slova', 'Psi', 'psi', 'psi', '', ''),
(128, 'Grčka slova', 'Veliko psi', 'Psi', 'Psi', '', ''),
(129, 'Grčka slova', 'Ro', 'rho', 'rho', '', ''),
(130, 'Grčka slova', 'Sigma', 'sigma', 'sigma', '', ''),
(131, 'Grčka slova', 'Veliko sigma', 'Sigma', 'Sigma', '', ''),
(132, 'Grčka slova', 'Tau', 'tau', 'tau', '', ''),
(133, 'Grčka slova', 'Teta', 'theta', 'theta', '', ''),
(134, 'Grčka slova', 'Veliko teta', 'Theta', 'Theta', '', ''),
(135, 'Grčka slova', 'Varteta', 'vartheta', 'vartheta', '', ''),
(136, 'Grčka slova', 'Upsilon', 'upsilon', 'upsilon', '', ''),
(137, 'Grčka slova', 'Ksi', 'xi', 'xi', '', ''),
(138, 'Grčka slova', 'Veliko ksi', 'Xi', 'Xi', '', ''),
(139, 'Grčka slova', 'Zeta', 'zeta', 'zeta', '', ''),
(140, 'Stepenovanje i indeksiranje', 'Tačka nad', 'dot(square)', 'dot()', 'dot(', ')'),
(141, 'Stepenovanje i indeksiranje', 'Dupla tačka nad', 'ddot(square)', 'ddot()', 'ddot(', ')');

-- --------------------------------------------------------

--
-- Table structure for table `expression`
--

CREATE TABLE IF NOT EXISTS `expression` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accid` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8_bin NOT NULL DEFAULT 'Izraz',
  `formula` varchar(5000) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `popularity` int(11) NOT NULL DEFAULT '0',
  `verified` int(11) NOT NULL DEFAULT '0',
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `popularity` (`popularity`,`verified`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=44 ;

--
-- Dumping data for table `expression`
--

INSERT INTO `expression` (`id`, `accid`, `name`, `formula`, `description`, `content`, `popularity`, `verified`, `ts`) VALUES
(1, 1, 'Pitagorina teorema', 'c^2=a^2+b^2', 'Kvadrat nad hipotenuzom jednak je zbiru kvadrata nad katetama.', '<math>\r\n    <apply>\r\n        <eq/>\r\n        <apply>\r\n            <power/>\r\n            <ci>c</ci>\r\n            <cn>2</cn>\r\n        </apply>\r\n        <apply>\r\n            <plus/>\r\n            <apply>\r\n                <power/>\r\n                <ci>a</ci>\r\n                <cn>2</cn>\r\n            </apply>\r\n            <apply>\r\n                <power/>\r\n                <ci>b</ci>\r\n                <cn>2</cn>\r\n            </apply>\r\n        </apply>\r\n    </apply>\r\n</math>', 0, 0, '2015-11-07 16:23:12'),
(4, 1, 'Kvadratna formula', 'x_(1,2)=(-b+-sqrt(b^2+4ac))/(2a)', '', '', 0, 0, '2015-11-09 13:19:13'),
(8, 1, 'Suma', 'sum_(i=1)^(n)i', 'Suma brojeva od 1 do n.', '', 0, 0, '2015-11-09 13:19:51'),
(16, 3, 'Integral', 'int_a^bf(x)dx', '', '', 0, 0, '2015-10-30 00:52:54'),
(17, 3, 'Specijalna teorija relativiteta', 'E=mc^2', '#fizika #ajnstajn', '', 0, 0, '2015-10-30 17:23:17'),
(18, 1, 'Ojlerova relacija', 'e^(ipi)+1=0', 'Ojlerova jednačina kompleksne analize. #matematika #ojler', '', 0, 0, '2015-10-30 17:26:41'),
(19, 1, 'Fridmanova jednačina 1', '(dot(a)^2+kc^2)/(a^2)=(8piGrho+Lambdac^2)/3', 'Izvedena iz Ajnštajnove teorije opšteg relativiteta. #fridman #fizika', '', 0, 0, '2015-10-30 17:31:23'),
(20, 1, 'Bolcmanova formula', 'S=klogW', '', '', 0, 0, '2015-10-30 17:32:13'),
(21, 1, 'Teorema izračunljivosti', '(df)/dt=lim_(h->0)(f(t+h)-f(t))/(h)', '', '', 1, 0, '2015-11-09 13:19:29'),
(22, 1, 'Normalna distribucija', 'Phi(x)=1/sqrt(2pisigma)e^((x-mu)^2/(2sigma^2))', '', '', 0, 0, '2015-10-30 17:37:59'),
(23, 1, 'Jednačina talasa', '(del^2u)/(delt^2)=c^2(del^2u)/(delx^2)', '', '', 0, 0, '2015-10-30 17:39:17'),
(25, 1, 'Kvadratni polinom', 'ax^2+bx+c', '#matematika', '<math>\r\n    <apply>\r\n        <plus/>\r\n        <apply>\r\n            <times/>\r\n            <ci>a</ci>\r\n            <apply>\r\n                <power/>\r\n                <ci>x</ci>\r\n                <cn>2</cn>\r\n            </apply>\r\n        </apply>\r\n        <apply>\r\n            <times/>\r\n            <ci>b</ci>\r\n            <ci>x</ci>\r\n        </apply>\r\n        <ci>c</ci>\r\n    </apply>\r\n</math>', 0, 0, '2015-11-06 16:37:54'),
(26, 1, 'Koren', 'sqrt(x)', '#matematika', '<math>\r\n <apply>\r\n  <root/>\r\n  <ci>x</ci>\r\n </apply>\r\n</math>', 1, 0, '2015-11-09 13:10:52'),
(27, 1, 'Kvadrat', 'x^2', '#matematika', '<math>\r\n    <apply>\r\n        <power/>\r\n        <ci>x</ci>\r\n        <cn>2</cn>\r\n    </apply>\r\n</math>', 0, 0, '2015-11-06 21:36:04'),
(28, 1, 'Razlomak', '(a)/(b)', '#matematika', '<math>\r\n    <apply>\r\n        <divide/>\r\n        <ci>a</ci>\r\n        <ci>b</ci>\r\n    </apply>\r\n</math>', 0, 0, '2015-11-06 22:41:00'),
(29, 1, 'Apsolutno', '|x|', '', '<math>\r\n    <apply>\r\n        <abs/>\r\n        <ci>x</ci>\r\n    </apply>\r\n</math>', 0, 0, '2015-11-06 22:47:09'),
(30, 1, '', '(a+b)/(a-b)', '', '<math>\r\n    <apply>\r\n        <divide/>\r\n        <apply>\r\n            <plus/>\r\n            <ci>a</ci>\r\n            <ci>b</ci>\r\n        </apply>\r\n        <apply>\r\n            <minus/>\r\n            <ci>a</ci>\r\n            <ci>b</ci>\r\n        </apply>\r\n    </apply>\r\n</math>', 0, 0, '2015-11-07 16:11:46'),
(32, 1, '', '10-a-b-3', '', '<math>\r\n    <apply>\r\n        <minus/>\r\n        <cn>10</cn>\r\n        <ci>a</ci>\r\n        <ci>b</ci>\r\n        <cn>3</cn>\r\n    </apply>\r\n</math>', 0, 0, '2015-11-07 15:32:18'),
(33, 1, '', 'x^y', '', '<math>\r\n    <apply>\r\n        <power/>\r\n        <ci>x</ci>\r\n        <ci>y</ci>\r\n    </apply>\r\n</math>', 0, 0, '2015-11-07 15:38:09'),
(34, 1, '', 'x-4=2+3', '', '<math>\r\n    <apply>\r\n        <eq/>\r\n        <apply>\r\n            <minus/>\r\n            <ci>x</ci>\r\n            <cn>4</cn>\r\n        </apply>\r\n        <apply>\r\n            <plus/>\r\n            <cn>2</cn>\r\n            <cn>3</cn>\r\n        </apply>\r\n    </apply>\r\n</math>', 0, 0, '2015-11-07 15:53:53'),
(35, 1, '', 'x<10', '', '<math>\r\n    <apply>\r\n        <lt/>\r\n        <ci>x</ci>\r\n        <cn>10</cn>\r\n    </apply>\r\n</math>', 0, 0, '2015-11-07 16:11:10'),
(36, 1, 'Površina kruga', 'P_k=r^2pi', '', '', 0, 0, '2015-11-07 16:42:25'),
(37, 3, 'Deljenje', 'a//b', '', '', 1, 0, '2015-11-09 13:27:21'),
(38, 1, '', '10-a-b', '', '<math>\r\n    <apply>\r\n        <minus/>\r\n        <cn>10</cn>\r\n        <ci>a</ci>\r\n        <ci>b</ci>\r\n    </apply>\r\n</math>', 0, 0, '2015-11-09 23:42:57'),
(39, 1, 'Faktorijel', 'n!', 'Proizvod svih celih brojeva od n do 1.\r\n#matematika', '<math>\r\n    <apply>\r\n        <factorial/>\r\n        <ci>n</ci>\r\n    </apply>\r\n</math>', 0, 0, '2015-12-02 21:44:05'),
(41, 1, '', 'a+b+c', '', '<apply>\r\n    <plus/>\r\n    <ci>a</ci>\r\n    <ci>b</ci>\r\n    <ci>c</ci>\r\n</apply>', 0, 0, '2015-12-19 15:41:10'),
(42, 0, '', 'f(b)-f(a)=int_(a)^(b)(x+x^3)/(alphax^4+[(x+2x^3)/(3x-x^4)]^4)dx', '', '', 0, 0, '2016-01-05 21:04:19'),
(43, 0, '', 'f(x)=x^4+3x^3-4x^2+3', '', '', 0, 0, '2016-01-05 21:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `pinned`
--

CREATE TABLE IF NOT EXISTS `pinned` (
  `fid` int(11) NOT NULL,
  `accid` int(11) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`fid`,`accid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pinned`
--

INSERT INTO `pinned` (`fid`, `accid`, `ts`) VALUES
(9, 1, '2015-10-20 20:43:21'),
(21, 3, '2015-11-09 13:19:29'),
(26, 3, '2015-11-09 13:10:51'),
(37, 1, '2015-11-09 13:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `saved`
--

CREATE TABLE IF NOT EXISTS `saved` (
  `accid` int(11) NOT NULL,
  `fid` int(11) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`accid`,`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `saved`
--

INSERT INTO `saved` (`accid`, `fid`, `ts`) VALUES
(1, 8, '2015-11-09 13:06:57'),
(1, 9, '2015-10-29 22:54:35'),
(1, 18, '2015-11-09 13:07:04'),
(1, 36, '2015-11-09 13:24:19'),
(3, 8, '2015-11-09 13:15:56'),
(3, 9, '2015-10-30 00:51:06'),
(3, 11, '2015-10-30 00:51:49'),
(3, 12, '2015-10-30 00:51:00'),
(3, 14, '2015-10-30 00:51:00'),
(3, 15, '2015-10-30 00:50:39'),
(3, 17, '2015-11-09 13:15:19'),
(3, 26, '2015-11-09 13:15:57');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

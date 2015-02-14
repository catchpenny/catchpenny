-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2015 at 12:01 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `catchpenny`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `activation_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activation_validity` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `registration_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `registration_ip` varchar(39) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.0.0.0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user auth data' AUTO_INCREMENT=26 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `level`, `status`, `activation_key`, `activation_validity`, `registration_datetime`, `registration_ip`) VALUES
(1, 'kljn@jkl.com', '$2y$10$AYc7lliUC3xKJuiw3RgzEu/rX.Rp2kgibj.MxLKM3a6c.xRptzcWW', 2, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '::1'),
(2, 'kln@nlknk.com', '$2y$10$xDfzrVQTL2AtEqVxqZBtT.l2SZ4LDqvdyUcbx0ff4XQgGGKYdW0rO', 2, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '::1'),
(3, 'kln@hghcj.com', '$2y$10$N4Tpm7lH4CCt8zv41eadNOVaTk1MGfw.Iyew7aeCfm0E2aPDTCM9u', 2, 0, NULL, '0000-00-00 00:00:00', '2015-02-07 00:42:30', '::1'),
(4, 'klm@jvh.com', '$2y$10$gh.RxNDWrl9IoaAL9buLQ.gQyYFUTKGUyuN9X8aXRZ33iklxRBO5a', 2, 0, NULL, '0000-00-00 00:00:00', '2015-02-07 00:43:30', '::1'),
(5, 'ukyg@ezsw.com', '$2y$10$iojzq6VBF9xMxvATgUATbOEVIV9BBjxhYz6ySsOfJtbkv1IopHI.e', 1, 0, NULL, '0000-00-00 00:00:00', '2015-02-07 00:44:44', '::1'),
(6, 'jkbh@tchg.com', '$2y$10$.BaK95iVafL73MncfvJcBe8LjaHyHPqVfVL87mX8HJf1a6x/2tWHG', 2, 0, NULL, '0000-00-00 00:00:00', '2015-02-07 00:58:33', '::1'),
(7, 'jbvh@jskjsnkj.com', '$2y$10$/dVWXA1QzNNHlKbxi3pQjetv/dQDN2zNXodoZzHKk.diivxeOdFTa', 2, 0, NULL, '0000-00-00 00:00:00', '2015-02-07 00:59:23', '::1'),
(8, 'edfvijuh@kjh.com', '$2y$10$/JqMaB2mepX8.QoAHYYF1OiqQtQsv61gHu0VGEgsIaCRpWxfLqCbG', 1, 0, NULL, '0000-00-00 00:00:00', '2015-02-07 01:00:15', '::1'),
(9, 'kjlh@kjh.com', '$2y$10$qTJgduquSpJptp8A7emzUu4BdJ1sWzqULN8oW4Kurg3.j3.OHosHi', 2, 0, NULL, '0000-00-00 00:00:00', '2015-02-07 11:35:46', '::1'),
(10, 'tydjfshdvgj@kjb.com', '$2y$10$IFMFDv6VpKDs5LsqW0Rm3eG/imviXFAuOtGYdHWZ3m.VfcJD768Za', 1, 0, NULL, '0000-00-00 00:00:00', '2015-02-07 11:36:38', '::1'),
(11, 'jcvdghveiu@KJ.com', '$2y$10$wQj9OOqkKWpapFlt9jK15.lUqqTcpJ/TpfCGS2vUMekUjmrExEv.i', 2, 0, '$2y$10$a8eRkhxk.Kly00WehJLU7.qmAcdGKsiJy', '2015-02-07 11:37:15', '2015-02-07 11:37:14', '::1'),
(12, 'kjnkljn@rtssrdxdh.com', '$2y$10$1dHl7zlzasZ.Yb0N8KgOV.S70rTKFxgf/uVmjHAhkfR4o0bvAfDoG', 1, 0, '$2y$10$u.JBQlBWPqopzJFq607hKuvjTpLNX7MB1', '2015-02-07 12:02:01', '2015-02-07 12:02:01', '::1'),
(13, 'tahaalibra@gmail.com', '$2y$10$N.M8irFoCzVAI/c8SO7TCeFXGrsSh.hyGROrwD998sb0QI.bRi85y', 2, 0, '$2y$10$CG8zlTsp3vCOR4V3vVPXKOVEDGWj.P21p', '2015-02-07 12:39:37', '2015-02-07 12:39:37', '::1'),
(14, 'ghncnb@gcgmcb.com', '$2y$10$QwCiokWAp.Gf57aMw30RNeZc/q0.aUA5b9kYWg5q62xcxl/2Dvho6', 1, 0, '$2y$10$.QVwY3TkpQjwj.3qJKOX.ew02LguZCOOy', '2015-02-07 12:47:05', '2015-02-07 12:47:05', '::1'),
(15, 'gfxgfx@gchjcg.com', '$2y$10$PNgfmOYMM3II1Rte1lGhVODT4Zagt/c6nms6sLvZ4wxyMcitQclUC', 1, 1, NULL, '2015-02-07 12:55:06', '2015-02-07 12:54:28', '::1'),
(16, 'kjbjkb@kj.com', '$2y$10$yE/d4qwo1SgHaeSrRN6mGuBBj3J6EJbGovqiAglQG0IE7dnJ7.LoG', 1, 0, '$2y$10$MRmM6/oZMOGKplP1hLOIPOVR/OsQ72cfLYo9bgvPv/RNYoDXf.v3a', '2015-02-07 20:45:28', '2015-02-07 20:45:28', '::1'),
(17, 'kjlbkljb@kjnj.com', '$2y$10$fVXeJb7HEEvER2x6agpWHezZmlyceW.9FiNGQvK.ajvqsWLQ/GsB6', 2, 1, NULL, '2015-02-07 20:49:42', '2015-02-07 20:48:17', '::1'),
(18, 'kljb@Kljbkjlblk.com', '$2y$10$a57myWBTKaqUrXQZXHg/r.kUrmA0EOymgJDfVlnoYDtpCEhCRFCtC', 2, 0, '$2y$10$vraQJoBgXCbgwYsuYA79r.Fnnqfmyv2YbAYlH1OBHLYuygkX.zPr6', '2015-02-07 20:50:48', '2015-02-07 20:50:48', '::1'),
(19, 'jhbjhb@jbkj.com', '$2y$10$Uz7gS.Z01S72HoTnHZcYKe38P6vVTJs0eapGe9pTWk9kJw2qmXzwW', 2, 1, NULL, '2015-02-07 20:53:27', '2015-02-07 20:53:01', '::1'),
(20, 'qw@qw.com', '$2y$10$mu6rXaWNhPTWV8xoI22Kzu0NasMd5mWX2ZnC4qaAm9W4yxC0YZo3i', 2, 1, NULL, '2015-02-08 04:20:32', '2015-02-08 04:20:06', '::1'),
(21, 'wq@wq.com', '$2y$10$WHEgSR4j6unpaNo2P3b/kuxvb27dlDwiimMi6FD.V7.xTcg4MGEZi', 2, 0, '$2y$10$xv6zXVDhFG5rldNt8LWAM.JThMvr.eUNaJiAY/atIHo1mWQarmEXu', '2015-02-08 04:32:21', '2015-02-08 04:32:21', '::1'),
(22, 'jhb@kjbn.com', '$2y$10$2gFvp9meSwpUaruJSjCA3.L2m5t1aqltenaUF1bUiFj3zLvlGs4ba', 1, 0, '$2y$10$lketH.MOuhVO59onYtpJL.74UhJbUUTNiiX7l4uBqsOKA8s5awIRS', '2015-02-08 04:34:15', '2015-02-08 04:34:15', '::1'),
(23, 'qwe@qwe.com', '$2y$10$g5hgZ1SxbjlZdR.IEpGMi.ia6mEJcjK8Ext1.T7YUwpCek7K7HQG.', 1, 0, '$2y$10$HMH6KcbkzyZU7Du9qJkG7.liiXTM3phxvD1CfHY/MQEkO0MwJKe8m', '2015-02-08 04:59:57', '2015-02-08 04:59:57', '::1'),
(24, 'jhb@kjlbjfvn.com', '$2y$10$CRi35nliL23kii/WxFoS/OrsAzigCjs2/aTFV8zYmTuWaef/w1uDO', 2, 1, NULL, '2015-02-08 05:13:29', '2015-02-08 05:13:10', '::1'),
(25, 'kjkjfrnkjn@ekln.com', '$2y$10$vY6EAjAdJUJXtj9cy52M.uNS1..shgTn7lLWG3fLmYroZ4VWV/TwW', 2, 0, '$2y$10$jjGJ92xdYM3OCKGj/w8G5Okp3caRfjXLMoWiujdgKfWbWXb.toY8K', '2015-02-08 06:30:41', '2015-02-08 06:30:41', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date_ob` date NOT NULL,
  `sex` char(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user profile data';

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`user_id`, `first_name`, `last_name`, `date_ob`, `sex`) VALUES
(7, 'jkb,', 'kjlb', '1970-01-01', 'male'),
(8, 'asdfghj', 'xcvbn', '1987-04-02', 'female'),
(9, 'khkjh', 'kjhkl', '1993-01-01', 'male'),
(10, 'asdfgh', 'qwerfcv', '1970-01-01', 'male'),
(11, 'sdfgh', 'sdfgh', '1970-01-01', 'male'),
(12, 'sefkjnerkljkjl', 'kljnkljn', '1993-01-01', 'male'),
(13, 'tahaa', 'karim', '1993-03-03', 'male'),
(14, 'tgfd', 'gfcghc', '1991-01-01', 'male'),
(15, 'jhgbh', 'ghdgfd', '1970-01-01', 'male'),
(16, 'kugabhjjhb', 'jhbjhbkj', '1993-01-02', 'male'),
(17, 'hmbdjk', 'kjlbkj', '1986-05-06', 'female'),
(18, 'wdkjb', 'lkjb', '1992-01-02', 'female'),
(19, 'jhydshjb', 'hjbjkbh', '1986-04-04', 'female'),
(20, 'hjbjh', 'jhbkjhb', '1993-01-01', 'male'),
(21, 'kjnkj', 'kjnkl', '1993-01-01', 'female'),
(22, 'hjwqb', 'jhbl', '1993-01-01', 'female'),
(23, 'kj', 'kjln', '1993-01-01', 'male'),
(24, 'kjn', 'jhb', '1970-01-01', 'female'),
(25, 'ewkn', 'kjlbnm', '1970-01-01', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
 ADD PRIMARY KEY (`user_id`), ADD FULLTEXT KEY `first_name` (`first_name`,`last_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

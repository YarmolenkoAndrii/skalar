-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 01 2019 г., 14:18
-- Версия сервера: 10.1.37-MariaDB
-- Версия PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `skalar`
--
CREATE DATABASE IF NOT EXISTS `skalar` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `skalar`;

-- --------------------------------------------------------

--
-- Структура таблицы `feedbacks`
--

CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `id_user` int(3) NOT NULL,
  `id_subject` int(3) NOT NULL,
  `feedback_description` text NOT NULL,
  `date_feedback` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `count_feedback` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `id_user`, `id_subject`, `feedback_description`, `date_feedback`, `image`, `count_feedback`) VALUES
(1, 1, 2, 'улучшение №1', '2019-03-30', 'depositphotos.jpg', 5),
(2, 2, 3, 'жалоба № 1', '2019-03-30', 'complaint.jpg', 2),
(4, 2, 2, 'улучшение №2', '2019-03-31', 'depositphotos.jpg', 12),
(5, 4, 1, 'благодарность №1', '2019-03-31', '', 12),
(12, 2, 3, 'жалоба № 2', '2019-03-31', 'complaint.jpg', 20),
(13, 3, 3, 'жалоба № 3', '2019-03-31', 'complaint.jpg', 20),
(14, 2, 1, 'благодарность №2', '2019-03-31', '', 20),
(15, 3, 2, 'улучшение №3', '2019-03-31', 'depositphotos.jpg', 200),
(16, 1, 1, 'благодарность №3', '2019-03-31', '', 200);

-- --------------------------------------------------------

--
-- Структура таблицы `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subjects`
--

INSERT INTO `subjects` (`id`, `subject`) VALUES
(1, 'Благодарность'),
(2, 'Предложение о улучшении сервиса'),
(3, 'Жалоба');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17185 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`) VALUES
(1, 'Иванов И.О.'),
(2, 'Иванов А.А.'),
(3, 'Петров П.А.'),
(4, 'Иванова А.С.'),
(5, 'Сидоров С.С.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

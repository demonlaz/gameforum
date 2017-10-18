-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 18 2017 г., 13:16
-- Версия сервера: 5.5.50
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gameforum`
--

-- --------------------------------------------------------

--
-- Структура таблицы `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL,
  `namegames` varchar(255) DEFAULT NULL COMMENT 'название игры',
  `globalimag` varchar(255) DEFAULT NULL COMMENT 'главная картинка',
  `content` text COMMENT 'описание игры',
  `url_dowload` varchar(255) DEFAULT NULL COMMENT 'сайт производитель',
  `tehnik_trebov` text,
  `global` bit(1) DEFAULT NULL COMMENT 'главаня игра 1 да',
  `popular` bit(1) DEFAULT NULL COMMENT 'популярная игра 1 да',
  `date_add` datetime DEFAULT NULL COMMENT 'дата дабавления возможно смнеить на int',
  `date_up` datetime DEFAULT NULL COMMENT 'дата обновления возможно смнеить на int'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `games`
--

INSERT INTO `games` (`id`, `namegames`, `globalimag`, `content`, `url_dowload`, `tehnik_trebov`, `global`, `popular`, `date_add`, `date_up`) VALUES
(1, 'DIABLO III', 'banner-bg.jpg', NULL, NULL, NULL, b'1', NULL, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

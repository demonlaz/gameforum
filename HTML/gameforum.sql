-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 20 2018 г., 19:18
-- Версия сервера: 5.7.16-log
-- Версия PHP: 7.1.0

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
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id_parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `id_parent`) VALUES
(3, 'rpgnnn', NULL),
(4, 'action', NULL),
(5, 'emulator', NULL),
(6, 'rpg', NULL),
(8, 'emulator', NULL),
(9, 'Тестовая', NULL),
(10, 'action', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_games` int(11) NOT NULL DEFAULT '0',
  `reply` int(11) NOT NULL DEFAULT '0' COMMENT 'id коментария на который отвечают',
  `login` varchar(255) DEFAULT NULL,
  `content` text,
  `date_add` datetime DEFAULT NULL,
  `date_up` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='таблица с комментариями';

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `id_games`, `reply`, `login`, `content`, `date_add`, `date_up`) VALUES
(1, 1, 0, 'admin', 'http://web/site/games/1', '2018-01-13 10:31:15', NULL),
(2, 1, 1, 'admin', 'test test2', '2018-01-13 10:31:18', NULL),
(3, 1, 2, 'admin', 'test test4', '2018-01-13 10:31:20', NULL),
(4, 1, 1, 'admin', 'test test3', '2018-01-13 10:31:22', NULL),
(5, 1, 0, 'admin', 'test testdjf gsgfds fgshf jhdsgf sdf hds fjh', '2018-01-13 10:31:15', NULL),
(9, 1, 0, 'demonlaz', 'rabotaet', '2018-01-13 14:09:17', '2018-01-13 14:09:17'),
(10, 1, 0, 'demonlaz', 'hf,sdfds', '2018-01-13 14:09:38', '2018-01-13 14:09:38'),
(11, 1, 0, 'demonlaz', 'nnsdf', '2018-01-13 14:13:00', '2018-01-13 14:13:00'),
(12, 1, 0, 'demonlaz', 'fdgfdg', '2018-01-13 14:23:22', '2018-01-13 14:23:22'),
(13, 1, 0, 'demonlaz', '9999', '2018-01-13 14:24:03', '2018-01-13 14:24:03'),
(14, 1, 0, 'demonlaz', 'дубаль ХХ', '2018-01-13 14:25:52', '2018-01-13 14:25:52'),
(15, 1, 0, 'demonlaz', 'hf,sdfds', '2018-01-13 14:09:38', '2018-01-13 14:09:38'),
(16, 1, 0, 'demonlaz', 'hf,sdfds', '2018-01-13 14:09:38', '2018-01-13 14:09:38'),
(17, 1, 0, 'demonlaz', 'hf,sdfds', '2018-01-13 14:09:38', '2018-01-13 14:09:38'),
(18, 1, 0, 'demonlaz', 'hf,sdfds', '2018-01-13 14:09:38', '2018-01-13 14:09:38'),
(19, 1, 0, 'demonlaz', 'hf,sdfds', '2018-01-13 14:09:38', '2018-01-13 14:09:38'),
(20, 1, 0, 'demonlaz', 'hf,sdfds', '2018-01-13 14:09:38', '2018-01-13 14:09:38'),
(21, 1, 0, 'demonlaz', 'hf,sdfds', '2018-01-13 14:09:38', '2018-01-13 14:09:38'),
(22, 1, 0, 'demonlaz', 'hf,sdfds', '2018-01-13 14:09:38', '2018-01-13 14:09:38'),
(23, 1, 0, 'demonlaz', 'hf,sdfds', '2018-01-13 14:09:38', '2018-01-13 14:09:38'),
(24, 1, 0, 'demonlaz', 'hf,sdfds', '2018-01-13 14:09:38', '2018-01-13 14:09:38'),
(25, 1, 0, 'demonlaz', 'hf,sdfds', '2018-01-13 14:09:38', '2018-01-13 14:09:38'),
(26, 1, 0, 'demonlaz', 'hf,sdfds', '2018-01-13 14:09:38', '2018-01-13 14:09:38'),
(27, 1, 0, 'demonlaz', 'hf,sdfds', '2018-01-13 14:09:38', '2018-01-13 14:09:38'),
(28, 1, 0, 'demonlaz', 'hf,sdfds', '2018-01-13 14:09:38', '2018-01-13 14:09:38'),
(29, 1, 26, 'demonlaz', 'тестим', '2018-01-13 15:21:16', '2018-01-13 15:21:16'),
(30, 3, 0, 'demonlaz2', 'ой какая охуенная игра))', '2018-01-13 21:45:31', '2018-01-13 21:45:31'),
(31, 3, 30, 'demonlaz2', 'потрисающея игра)', '2018-01-13 21:47:08', '2018-01-13 21:47:08'),
(32, 1, 26, 'demonlaz', 'иди нахуй', '2018-01-13 22:21:18', '2018-01-13 22:21:18'),
(33, 1, 9, 'demonlaz', 'так себе', '2018-01-16 19:37:17', '2018-01-16 19:37:17');

-- --------------------------------------------------------

--
-- Структура таблицы `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `namegames` varchar(255) DEFAULT NULL COMMENT 'название игры',
  `namegamesdop` varchar(255) DEFAULT NULL COMMENT 'дополнительно к названию игры',
  `stampgames` varchar(255) DEFAULT NULL COMMENT 'пометка к игре',
  `rating` float DEFAULT NULL COMMENT 'рейтинг игры макс 10',
  `globalimag` varchar(255) DEFAULT NULL COMMENT 'главная картинка',
  `content` text COMMENT 'описание игры',
  `url_dowload` varchar(255) DEFAULT NULL COMMENT 'сайт производитель',
  `tehnik_trebov` text,
  `global` bit(1) DEFAULT NULL COMMENT 'главаня игра 1 да',
  `popular` bit(1) DEFAULT NULL COMMENT 'популярная игра 1 да',
  `central` bit(1) DEFAULT NULL COMMENT '1 отоброжать ',
  `date_exit` datetime DEFAULT NULL COMMENT 'дата выхода игры ',
  `date_add` datetime DEFAULT NULL COMMENT 'дата дабавления возможно смнеить на int',
  `date_up` datetime DEFAULT NULL COMMENT 'дата обновления возможно смнеить на int',
  `category_id` int(11) DEFAULT NULL COMMENT 'категория игры'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `games`
--

INSERT INTO `games` (`id`, `namegames`, `namegamesdop`, `stampgames`, `rating`, `globalimag`, `content`, `url_dowload`, `tehnik_trebov`, `global`, `popular`, `central`, `date_exit`, `date_add`, `date_up`, `category_id`) VALUES
(1, 'DIABLO III', 'REAPER OF SOULS', 'One of the best grind games', 2, 'banner-bg.jpg', 'Verbum est ex. Et ... sunt occidat. Videtur quod est super omne oppidum. Quis transfretavit tu iratus es contudit cranium cum dolor apparatus. Qui curis! Modo nobis <p>certamen est</p>, qui non credunt at.', '', '', b'0', b'0', b'1', NULL, NULL, '2018-01-20 18:09:04', 9),
(2, '5', NULL, NULL, 10, 'banner-bg.jpg', NULL, NULL, NULL, b'0', b'1', b'1', NULL, NULL, '2018-01-07 17:22:10', 9),
(3, '4', NULL, NULL, 7.5, 'banner-bg.jpg', NULL, NULL, NULL, b'0', b'0', b'1', NULL, NULL, '2018-01-13 21:47:26', 9),
(4, '3', NULL, NULL, 10, 'banner-bg.jpg', NULL, NULL, NULL, b'0', b'0', b'1', NULL, NULL, '2018-01-13 08:10:01', 9),
(5, '2', NULL, NULL, 9, 'banner-bg.jpg', NULL, NULL, NULL, b'0', b'1', b'1', NULL, NULL, '2018-01-13 09:27:17', 9),
(6, '1', NULL, NULL, 9, 'banner-bg.jpg', 'Verbum est ex. Et ... sunt occidat. Videtur quod est super omne oppidum. Quis transfretavit tu iratus es contudit cranium cum dolor apparatus. Qui curis! Modo nobis certamen est, qui non credunt at.', NULL, NULL, b'0', b'0', b'1', '2017-12-17 16:58:21', '2018-01-20 11:30:01', '2018-01-20 17:36:58', 9),
(7, 'DIABLO III', 'REAPER OF SOULS', 'One of the best grind games', 8.6, 'banner-bg.jpg', 'Verbum est ex. Et ... sunt occidat. Videtur quod est super omne oppidum. Quis transfretavit tu iratus es contudit cranium cum dolor apparatus. Qui curis! Modo nobis <p>certamen est</p>, qui non credunt at.', NULL, NULL, b'0', b'0', b'1', NULL, NULL, '2018-01-07 14:00:14', 9),
(8, 'DIABLO III', 'REAPER OF SOULS', 'One of the best grind games', 7.5, 'banner-bg.jpg', 'Verbum est ex. Et ... sunt occidat. Videtur quod est super omne oppidum. Quis transfretavit tu iratus es contudit cranium cum dolor apparatus. Qui curis! Modo nobis <p>certamen est</p>, qui non credunt at.', NULL, NULL, b'0', b'0', b'1', NULL, NULL, '2018-01-07 14:21:10', 9),
(11, 'DIABLO III', 'REAPER OF SOULS', 'One of the best grind games', 2, 'banner-bg.jpg', 'Verbum est ex. Et ... sunt occidat. Videtur quod est super omne oppidum. Quis transfretavit tu iratus es contudit cranium cum dolor apparatus. Qui curis! Modo nobis <p>certamen est</p>, qui non credunt at.', '', '', b'0', b'1', b'1', NULL, NULL, '2018-01-20 18:07:51', 9),
(12, 'ghjghj', 'ghjghj', '', 0, 'banner-blog-bg.jpg', '', '', '', b'1', b'0', b'1', NULL, '2018-01-20 17:32:11', '2018-01-20 18:15:46', 3),
(13, 'dkjfghdfhfdg hldg f sdg;lkfsdh g;sfhd gl;khfds', 'rfeklgh;dk hg;l H', 'J FGLKFJDG ;K\'JFKGJDF\'', 2, 'banner-witcher-3.jpg', 'G;fdssdfdsf', 'dsfds', 'fdsfsdf', b'0', b'1', b'1', NULL, '2018-01-20 17:33:45', '2018-01-20 18:12:17', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `id_parent_games` int(11) DEFAULT NULL COMMENT 'id игры',
  `images_games` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `id_parent_games`, `images_games`) VALUES
(1, 1, 'banner-bg.jpg'),
(2, 1, 'banner-witcher-3.jpg'),
(3, 1, 'banner-bg.jpg'),
(4, 1, 'banner-witcher-3.jpg'),
(5, 1, 'banner-witcher-3.jpg'),
(6, 1, 'banner-witcher-3.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `loginFrom` varchar(250) DEFAULT NULL COMMENT 'от кого',
  `loginTo` varchar(250) DEFAULT NULL COMMENT 'к кому',
  `content` text COMMENT 'содержание ',
  `readContent` bit(1) DEFAULT b'0' COMMENT '1 если пользователь прочитал сообщение',
  `date_add` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'дата создания ',
  `date_up` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'дат редактирования'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='сообщения между пользователями';

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `loginFrom`, `loginTo`, `content`, `readContent`, `date_add`, `date_up`) VALUES
(35, 'demonlaz', 'fdgfdgfdg', 'dfgdfgdf', b'0', '2018-01-05 19:17:27', '2018-01-05 19:17:27'),
(36, 'demonlaz', 'cbvbcb', 'xgfccgh', b'0', '2018-01-05 19:18:15', '2018-01-05 19:18:15'),
(38, 'demonlaz', 'fdfsdf', 'sdfdsfsdf', b'0', '2018-01-05 19:24:57', '2018-01-05 19:24:57'),
(39, 'demonlaz', '', 'rtetreter', b'0', '2018-01-05 19:33:49', '2018-01-05 19:33:49'),
(44, 'demonlaz', 'admin', 'asdsa', b'1', '2018-01-06 16:52:58', '2018-01-06 16:52:58'),
(45, 'demonlaz2', 'demonlaz', 'все работает нормально))', b'1', '2018-01-13 19:44:17', '2018-01-13 19:44:17');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1508067533),
('m140209_132017_init', 1508067700),
('m140403_174025_create_account_table', 1508067701),
('m140504_113157_update_tables', 1508067706),
('m140504_130429_create_token_table', 1508067709),
('m140506_102106_rbac_init', 1508067536),
('m140830_171933_fix_ip_field', 1508067710),
('m140830_172703_change_account_table_name', 1508067710),
('m141222_110026_update_ip_field', 1508067711),
('m141222_135246_alter_username_length', 1508067712),
('m150614_103145_update_social_account_table', 1508067715),
('m150623_212711_fix_username_notnull', 1508067715),
('m151218_234654_add_timezone_to_profile', 1508067716),
('m160929_103127_add_last_login_at_to_user_table', 1508067717);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `id_games` int(11) NOT NULL DEFAULT '0',
  `title` text,
  `content_short` text,
  `content` text,
  `date_add` datetime DEFAULT NULL,
  `date_up` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='новости';

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `id_games`, `title`, `content_short`, `content`, `date_add`, `date_up`) VALUES
(1, 11, 'Заголовок', 'Gus sit amet suum motum. Nescio quando, aut quomodo, nescio quo. Illud scio, amet tortor. Suarum impotens prohibere eum.', 'Jackson Isai? Tu quoque ... A te quidem a ante. Vos scitis quod blinking res Ive \'been vocans super vos? Et conteram illud, et conteram hoc. Maledicant druggie excors. Iam hoc tu facere conatus sum ad te in omni tempore?\r\n\r\nLudum mutavit. Verbum est ex. Et ... sunt occidat. Videtur quod est super omne oppidum. Quis transfretavit tu iratus es contudit cranium cum dolor apparatus. Qui curis! Modo nobis certamen est, qui non credunt at.\r\n\r\nNonne vides quid sit? Tu es ... Jesse me respice. Tu ... blowfish sunt. A blowfish! Cogitare. Statura pusillus, nec sapientium panem, nec artificum. Sed predators facile prædam blowfish secretum telum non se habet. Non ille? Quid faciam blowfish, Isai. Blowfish quid faciat? In blowfish inflat, purus?\r\n\r\nBlowfish librantur in se quatuor, quinquies maior quam normalis, et quare? Quare id faciam? Ut terrorem facit, qui quid. Terrent! Ut alter, scarier pisces agminis off. Et quod tu es? Vos blowfish. Tu iustus in omnibus visio. Vides ... suus \' suus \'non aliud aerem. Nunc ... qui cum partibus blowfish Isai? Tu damnare ius. Vos blowfish. Dicere iterum. Dicere illam quasi velis eam. Es BLOWFISH!\r\n\r\nUt sibi fuerat socius sagittis. Ego intervenerit. Vere quia a te nuper iratus occidit illos undecim annorum puer. Deinde, si hoc forte qui fuit imperavit.', '2017-10-21 10:17:27', '2017-10-21 10:17:24'),
(3, 1, '1', NULL, 'Gus sit amet suum motum. Nescio quando, aut quomodo, nescio quo. Illud scio, amet tortor. Suarum impotens prohibere eum.', '2017-10-21 12:33:49', '2017-10-21 12:33:53');

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Дмитрий', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'Москва', '', '', 'Pacific/Apia'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `id_games` int(11) DEFAULT NULL,
  `id_username` int(11) DEFAULT NULL,
  `rating_to_user` int(11) DEFAULT NULL,
  `rating_full_with_user` int(11) DEFAULT NULL,
  `data_add` timestamp NULL DEFAULT NULL,
  `data_up` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rating`
--

INSERT INTO `rating` (`id`, `id_games`, `id_username`, `rating_to_user`, `rating_full_with_user`, `data_add`, `data_up`) VALUES
(5, 7, 3, 10, NULL, NULL, NULL),
(7, 7, 999, 9, NULL, NULL, NULL),
(11, 7, 1, 7, NULL, NULL, NULL),
(12, 8, 2332, 8, NULL, NULL, NULL),
(13, 8, 12, 8, NULL, NULL, NULL),
(14, 8, 1, 3, NULL, NULL, NULL),
(15, 2, 1, 10, NULL, NULL, NULL),
(16, 2, 2, 10, NULL, NULL, NULL),
(17, 6, 2, 10, NULL, NULL, NULL),
(18, 6, 456546, 8, NULL, NULL, NULL),
(19, 11, 2, 2, NULL, NULL, NULL),
(20, 3, 2, 5, NULL, NULL, NULL),
(21, 4, 2, 10, NULL, NULL, NULL),
(22, 1, 2, 2, NULL, NULL, NULL),
(23, 5, 2, 9, NULL, NULL, NULL),
(24, 3, 3, 10, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(1, '9PvXBxzJxlkMs3as5FhQYRQF4wh992Lj', 1515873646, 1),
(1, 'Yr9rDedCAg1l5oD4WLsl6pH6CVuOoJBB', 1508068444, 0),
(2, 'ksUziU9JJxn0sHBAx1thvAJDSSdrYqCp', 1508322611, 0),
(3, 'Rw_7zGPqrjFn_6Y7inPkeR8EgMYzXBDu', 1515872548, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `last_login_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`) VALUES
(1, 'admin', 'demonlaz@yandex.ru', '$2y$10$GKJdNU.RrGpTLPUSDSqSbe/2SV4rikPrIK8p6GFcm2Qs07LY.WPRC', 'pdqY4sBs_HQC2VoZchmAsG_gyKX0H4Lk', 1508166649, NULL, NULL, '127.0.0.1', 1508068444, 1508068444, 0, 1515260164),
(2, 'demonlaz', 'demon-l_91@mail.ru', '$2y$10$STVgNM8qykp8fFlbg5bChuEa66udwMObPKiwbzrz6LbBXsvAHng5e', '2eAinV9k1Wh_b_afC4Epe86DHJ049_uf', 1508323273, NULL, NULL, '127.0.0.1', 1508322611, 1508322611, 0, 1515875591),
(3, 'demonlaz2', 'deddd@mail.ru', '$2y$10$8I4DLKiAtcVdlHZoDVXSvOlZSAhJ9EyXS4wDhGBOcW9Yg8JnC/ES6', 'O5gq_8r-nFsvqQENL3P3Pk_PWEcsIapm', 1516364601, NULL, NULL, '127.0.0.1', 1515872548, 1515872548, 0, 1515872589);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comments_games` (`id_games`);

--
-- Индексы таблицы `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryKey` (`category_id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_images_games` (`id_parent_games`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `games` (`id_games`);

--
-- Индексы таблицы `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Индексы таблицы `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT для таблицы `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT для таблицы `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_comments_games` FOREIGN KEY (`id_games`) REFERENCES `games` (`id`);

--
-- Ограничения внешнего ключа таблицы `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `categoryKey` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Ограничения внешнего ключа таблицы `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_images_games` FOREIGN KEY (`id_parent_games`) REFERENCES `games` (`id`);

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `games` FOREIGN KEY (`id_games`) REFERENCES `games` (`id`);

--
-- Ограничения внешнего ключа таблицы `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

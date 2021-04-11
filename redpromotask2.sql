-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 11 2021 г., 16:51
-- Версия сервера: 8.0.19
-- Версия PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `redpromotask2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(1, 'Уфа'),
(2, 'Москва');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1618146341),
('m210411_104237_create_news_table', 1618146369),
('m210411_104244_create_cities_table', 1618146369);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `text` text,
  `image` varchar(255) DEFAULT NULL,
  `similar_id` int DEFAULT NULL,
  `city_id` int DEFAULT NULL,
  `is_favourite` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `text`, `image`, `similar_id`, `city_id`, `is_favourite`) VALUES
(5, 'Потепление', 'Сегодня будет потепление.', 'Сегодня будет потепление, одевайтесь легко. Будет солнечно. Не забудьте солнечные очки!', 'https://picsum.photos/200/300?random=1', 1, 1, 1),
(6, 'Природа', 'Красивая природа', 'Красивая природа России. В вашей новостной ленте.', 'https://picsum.photos/200/300?random=2', 1, 2, 0),
(7, 'Шедевры кулинарии', 'Вкусный и лёгкий завтрак!', 'Ингридиенты: 1 яйцо, 3 ст. ложки молока, 3 ст. ложки овсяных хлопьев.', 'https://picsum.photos/200/300?random=3', 2, 2, 1),
(8, 'Новый человек-паук', 'Сегодня в кинотеатрах', 'Сегодня в кинотеатрах будут показывать нового человека-паука.', 'https://picsum.photos/200/300?random=4', 3, 1, 1),
(9, 'Фильм: \"Начало\"', 'Разбор фильма', 'Концовка фильма объясняется тем, что...', 'https://picsum.photos/200/300?random=5', 3, 1, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

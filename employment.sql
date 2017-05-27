-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 27 2017 г., 18:03
-- Версия сервера: 10.1.16-MariaDB
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `employment`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`, `parent`) VALUES
  (1, 'Финансы / Страхование', NULL),
  (2, 'Банки / Инвестиции / Ценные бумаги', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `speciality`
--

CREATE TABLE `speciality` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `speciality`
--

INSERT INTO `speciality` (`id`, `name`) VALUES
  (1, 'Прикладная информатика');

-- --------------------------------------------------------

--
-- Структура таблицы `sphere`
--

CREATE TABLE `sphere` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sphere`
--

INSERT INTO `sphere` (`id`, `name`, `speciality`) VALUES
  (1, 'Программист', '1'),
  (3, 'Математик', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `speciality` varchar(255) NOT NULL,
  `sphere` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`id`, `login`, `password`, `role`, `name`, `birthday`, `address`, `phone_number`, `education`, `experience`, `speciality`, `sphere`, `email`, `organization`) VALUES
  (3, 'erlan', '83422503bcfc01d303030e8a7cc80efc', 'employer', NULL, NULL, 'Bishkek, Chuy 230, Business Centre &quot;Bereket&quot;', '707330726', NULL, NULL, '', NULL, 'okay11007@gmail.com', 'Sunrise'),
  (10, 'admin', '83422503bcfc01d303030e8a7cc80efc', 'employee', 'Erlan', '1997-11-17', NULL, '707330726', 'Высшее', '3 года', '1', '1', NULL, NULL),
  (11, 'nurs', '83422503bcfc01d303030e8a7cc80efc', 'employer', NULL, NULL, 'Bishkek, Chuy 230, Business Centre &quot;Bereket&quot;', '707330726', NULL, NULL, '', NULL, 'okay11007@gmail.com', 'Sunrise');

-- --------------------------------------------------------

--
-- Структура таблицы `vacancy`
--

CREATE TABLE `vacancy` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `work_time` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `speciality`
--
ALTER TABLE `speciality`
ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sphere`
--
ALTER TABLE `sphere`
ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vacancy`
--
ALTER TABLE `vacancy`
ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `speciality`
--
ALTER TABLE `speciality`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `sphere`
--
ALTER TABLE `sphere`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `vacancy`
--
ALTER TABLE `vacancy`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
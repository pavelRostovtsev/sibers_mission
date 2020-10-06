-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 06 2020 г., 10:35
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testproject`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `roles` int(2) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `surname`, `gender`, `date`, `roles`) VALUES
(95, 'admin', '$2y$10$YvxDi99IhwcoJQeSX/8U1OxlQZSy8fGxPloRsGopNzOruSCnFgqty', 'admin', 'admin', 'man', '2020-10-29', 1),
(96, 'user1', '$2y$10$XD/kdMzAQrsyVZSIsP8d1OZdXsE6C9eFI34cRafpOHfEwCbi4SFhy', 'user1', 'user1', 'man', '2020-10-16', 2),
(97, 'user2', '$2y$10$G5vHNEYIRMXmcEQH6O9Cju3zlmOuZRWj.cjzYVNOz7ao52J6yUuDa', 'user2', 'user2', 'man', '2020-10-29', 2),
(98, 'user3', '$2y$10$lEWTvV0RiJHaTdJk6YFgeOVfUXTbfU8hvTvMEF8qocAwhqDIDNeC2', 'user3', 'user3', 'man', '2020-10-29', 2),
(99, 'user4', '$2y$10$2cnus9fCpmlOlgjBb4NzUeXc5lBUboGjuR5QSkJnDWUQTzUsD89qy', 'user4', 'user4', 'wooman', '2020-10-28', 2),
(100, 'user5', '$2y$10$PByAR3xaxwdRTr2o./mZ2urJff9o8IkYH0aubA6S4JPTqzYWxEMkG', 'user5', 'user5', 'man', '2020-10-29', 2),
(101, 'user6', '$2y$10$fCNZsl6v3ozwg6cO7EhQzuhsUhzlOvB4hWdwiFwceNr/BRlRRnOQW', 'user6', 'user6', 'wooman', '2020-10-22', 2),
(102, 'user7', '$2y$10$DusqlA7SqxYist5D4vMKx.Rtep5mTZaT.nCYGMhoNCHWpeU3y3E2.', 'user7', 'user7', 'man', '2020-10-28', 2),
(103, 'user8', '$2y$10$RUq0N51mOUzh29iqjq2cW.FXOwkLlTgFUsFuKGd10XefjvpXNfuhy', 'user8', 'user8', 'wooman', '2020-10-28', 2),
(104, 'user9', '$2y$10$bKDEnSqQIbk5M2ejtD/QPeOuErEssLUYb7l1ASBn9eYl9YwgIPSju', 'user9', 'user9', 'wooman', '2020-10-21', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

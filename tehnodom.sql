-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Сен 30 2019 г., 13:17
-- Версия сервера: 5.7.27-0ubuntu0.18.04.1
-- Версия PHP: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tehnodom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `scu` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `type_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `scu`, `name`, `price`, `type`, `type_product`) VALUES
(1, 'dsgdsgds', 'DVD1', 500, '1', 1),
(3, '1', '2', 3, '5', 1),
(7, '33', '2', 3, '4', 3),
(11, '3333', '2', 3, '4', 3),
(12, '111', '1', 1, '1', 3),
(20, '34324s', '666', 222, '555', 2),
(21, '34324ss', '666', 222, '555', 2),
(22, '34324ssa', '666', 222, '555', 1),
(24, '34324ssaa', '666', 222, '555', 3),
(25, 'dddd', 'safsaf', 43646, '333', 3),
(26, 'dddda', 'safsaf', 43646, '333', 2),
(27, '4444', '44', 44, '6666', 1),
(28, '444', '444', 444, '555', 1),
(50, 'Ñ„Ñ‹Ð²Ñ‹Ñ„Ð²', 'Ñ„Ñ‹Ð°Ñ‹Ñ„Ð°', 4000, 'Ñ„Ñ‹Ð°Ñ„Ñ‹Ð°Ñ‹Ñ„Ð°', 3),
(57, '4444s', 'asf', 4444, 'asfsaf', 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `scu` (`scu`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

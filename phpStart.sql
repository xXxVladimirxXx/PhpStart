-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 08 2018 г., 17:32
-- Версия сервера: 5.6.37
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `phpStart`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `sort_order`, `status`) VALUES
(2, 'Блузки', 2, 1),
(3, 'Куртки', 3, 1),
(4, 'Сумки', 4, 1),
(5, 'Брюки', 5, 1),
(6, 'Пиджаки', 6, 1),
(7, 'Rolex', 7, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `price` float NOT NULL,
  `availability` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_new` int(11) NOT NULL,
  `is_recommended` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `code`, `price`, `availability`, `brand`, `image`, `description`, `is_new`, `is_recommended`, `status`) VALUES
(1, 'Lorem ipsum', 2, 2143, 750, 0, '', '/template/images/home/girl1.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient', 1, 1, 1),
(2, 'ipsum lorem ', 3, 2143, 1200, 0, '', '/template/images/home/girl1.jpg', 'Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturien Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 0, 0, 1),
(4, 'Lorem Ipsum Reference ', 2, 1245, 12000, 0, 'Nike', '/template/images/home/girl3.jpg', 'Reference site about Lorem IpsumReference site about Lorem IpsumReference site about Lorem IpsumReference site about Lorem IpsumReference site about Lorem IpsumReference site about Lorem IpsumReference site about Lorem Ipsum', 0, 1, 1),
(5, 'Where can I', 2, 4894, 100, 0, '', '/template/images/home/girl1.jpg', 'Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versi', 1, 0, 1),
(6, 'Distribution', 3, 4879, 400, 0, '', '/template/images/home/girl1.jpg', '\'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as  Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versi', 0, 1, 1),
(7, 'Reference theirem Ipsum', 2, 7689, 250, 0, 'Nike', '/template/images/home/girl2.jpg', 'as  Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versi', 1, 0, 1),
(8, 'Publishing ', 2, 45367, 12000, 0, 'Adidas', '/template/images/home/girl3.jpg', '\'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versi', 1, 1, 1),
(9, 'long established', 2, 5676, 750, 0, '', '/template/images/home/girl1.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient', 0, 1, 1),
(10, 'long established lorem ', 3, 4537, 1200, 0, '', '/template/images/home/girl1.jpg', 'Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturien Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 0, 1, 1),
(11, 'Reference long established', 2, 45739, 450, 0, 'Nike', '/template/images/home/girl2.jpg', 'Reference site about Lorem IpsumReference site about Lorem IpsumReference site about Lorem IpsumReference site about Lorem IpsumReference site about Lorem IpsumReference site about Lorem IpsumReference site about Lorem Ipsum', 0, 0, 1),
(12, 'Lorem long established Reference ', 2, 7687, 12000, 0, 'Nike', '/template/images/home/girl3.jpg', 'Reference site about Lorem IpsumReference site about Lorem IpsumReference site about Lorem IpsumReference site about Lorem IpsumReference site about Lorem IpsumReference site about Lorem IpsumReference site about Lorem Ipsum', 0, 1, 1),
(13, 'Reference site', 5, 4894, 400, 0, '', '/template/images/home/girl1.jpg', 'Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versi', 0, 0, 1),
(14, 'And web page', 4, 7862, 400, 0, '', '/template/images/home/girl1.jpg', '\'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as  Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versi', 0, 0, 1),
(15, 'Reference readable English', 3, 7533, 250, 0, 'Nike', '/template/images/home/girl2.jpg', 'as  Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versi', 0, 0, 1),
(16, 'Still update', 3, 7583, 7000, 0, 'Adidas', '/template/images/home/girl3.jpg', '\'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versi', 0, 1, 1),
(17, 'Still product', 4, 77536, 1000, 0, 'Adudas', '/template/images/home/girl1.jpg', 'And web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versi \'Content here, content here\', making it look like readable English. Many desktop publishing packages', 1, 0, 1),
(18, 'This article hynm', 2, 4562123, 1200, 1, 'Nike', '', 'Lorem ipsm dolore and fge Lorem ipsm dolore and fge Lorem ipsm dolore and fge Lorem ipsm dolore and fge Lorem ipsm dolore and fge Lorem ipsm dolore and fge Lorem ipsm dolore and fge Lorem ipsm dolore and fge Lorem ipsm dolore and fge Lorem ipsm dolore and fge', 1, 0, 1),
(19, 'Where can I', 2, 654332, 200, 1, 'Nike', '', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n', 0, 0, 1),
(20, 'Randomised words', 6, 76931, 358, 1, 'Nike', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_order`
--

CREATE TABLE `product_order` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `products` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_order`
--

INSERT INTO `product_order` (`id`, `user_name`, `user_phone`, `user_comment`, `user_id`, `date`, `products`, `status`) VALUES
(2, 'Vladimir', '+380 99 712 9002', 'Ул. Пушкина дом Колатушкина', 5, '2018-08-08 13:41:59', '{\"18\":1,\"17\":1,\"14\":1}', 1),
(3, 'Sanya', '+380 99 743 9453', 'Ул. Пушкина дом 32', 5, '2018-08-08 13:42:57', '{\"10\":1,\"13\":1}', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Sanya1996', 'emailS@gmail.com', '000000', ''),
(2, 'Vladimir', 'email@gmail.com', '000000', 'admin'),
(3, 'Vladimir', 'email@gmail.com0000', '	 000000', ''),
(5, 'ChessStatistic', 'freedva9001@gmail.com', '000000', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 19 2023 г., 18:05
-- Версия сервера: 5.7.29
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dip3`
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

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '554', 1554784590);

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

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/category/*', 2, NULL, NULL, NULL, 1556193494, 1556193494),
('/forms/*', 2, NULL, NULL, NULL, 1684401084, 1684401084),
('/gii/*', 2, NULL, NULL, NULL, 1554784546, 1554784546),
('/personal/*', 2, NULL, NULL, NULL, 1556344014, 1556344014),
('/personal/view', 2, NULL, NULL, NULL, 1557820706, 1557820706),
('/product/*', 2, NULL, NULL, NULL, 1556193504, 1556193504),
('/product/index', 2, NULL, NULL, NULL, 1556346197, 1556346197),
('/product/return', 2, NULL, NULL, NULL, 1557820475, 1557820475),
('/product/take', 2, NULL, NULL, NULL, 1557820470, 1557820470),
('/product/view', 2, NULL, NULL, NULL, 1556346213, 1556346213),
('/rbac/*', 2, NULL, NULL, NULL, 1554802431, 1554802431),
('/user/*', 2, NULL, NULL, NULL, 1554809500, 1554809500),
('accessCategory', 2, 'Доступ к категориям', NULL, NULL, 1556193717, 1556193717),
('accessGii', 2, 'Доступ к Gii', NULL, NULL, 1554784567, 1554784567),
('accessPersonal', 2, 'Доступ к списку сотрудников', NULL, NULL, 1556344035, 1556344035),
('accessProduct', 2, 'Доступ к товарам на складе', NULL, NULL, 1556193760, 1556193760),
('accessRbac', 2, 'Доступ в Rbac', NULL, NULL, 1554802455, 1554802455),
('accessUser', 2, NULL, NULL, NULL, 1557820507, 1557820507),
('admin', 1, NULL, NULL, NULL, 1554784581, 1554784581),
('worker', 1, 'Сотрудник', NULL, NULL, 1556346148, 1556346148);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('accessCategory', '/category/*'),
('admin', '/forms/*'),
('accessGii', '/gii/*'),
('accessPersonal', '/personal/*'),
('worker', '/personal/view'),
('accessProduct', '/product/*'),
('worker', '/product/index'),
('accessUser', '/product/return'),
('worker', '/product/return'),
('accessUser', '/product/take'),
('worker', '/product/take'),
('worker', '/product/view'),
('accessRbac', '/rbac/*'),
('admin', '/user/*'),
('admin', 'accessCategory'),
('admin', 'accessGii'),
('admin', 'accessPersonal'),
('admin', 'accessProduct'),
('admin', 'accessRbac');

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
  `name` varchar(500) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `parent_id`, `active`) VALUES
(5, 'Компьютерная техника', NULL, 0),
(6, 'Мебель', NULL, 0),
(7, 'Канцелярские товары', NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `forms`
--

CREATE TABLE `forms` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `forms`
--

INSERT INTO `forms` (`id`, `name`, `active`) VALUES
(1, 'Выговор', 0),
(2, 'Благодарность', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `forms_fields`
--

CREATE TABLE `forms_fields` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `active` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `forms_fields`
--

INSERT INTO `forms_fields` (`id`, `form_id`, `name`, `type`, `active`) VALUES
(7, 1, 'Причина', 'text', 0),
(8, 1, 'Описание', 'text', 0),
(16, 2, 'Название', 'text', 0),
(17, 2, 'Описание', 'text', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `forms_fields_data`
--

CREATE TABLE `forms_fields_data` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` smallint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `forms_fields_data`
--

INSERT INTO `forms_fields_data` (`id`, `form_id`, `user_id`, `content`, `date_create`, `active`) VALUES
(2, 2, 1, '{\"16\":\"ok ok\",\"17\":\"no no\"}', '2023-05-19 08:59:20', 0),
(3, 1, 1, '{\"7\":\"\\u0412\\u044b\\u0433\\u043e\\u0432\\u043e\\u0440 \\u0437\\u0430 \\u043e\\u043f\\u043e\\u0437\\u0434\\u0430\\u043d\\u0438\\u0435\",\"8\":\"\\u0421\\u043e\\u0442\\u0440\\u0443\\u0434\\u043d\\u0438\\u043a \\u043f\\u043e\\u043b\\u0443\\u0447\\u0438\\u043b 3-\\u0435 \\u043e\\u043f\\u043e\\u0437\\u0434\\u0430\\u043d\\u0438\\u0435 \\u0437\\u0430 \\u043c\\u0435\\u0441\\u044f\\u0446\"}', '2023-05-19 09:27:38', 0),
(4, 2, 2, '{\"16\":\"\\u0411\\u043b\\u0430\\u0433\\u043e\\u0434\\u0430\\u0440\\u043d\\u043e\\u0441\\u0442\\u044c \\u043e\\u0442 \\u0440\\u0443\\u043a\\u043e\\u0432\\u043e\\u0434\\u0441\\u0442\\u0432\\u0430\",\"17\":\"\\u0417\\u0430 \\u043f\\u0440\\u043e\\u044f\\u0432\\u043b\\u0435\\u043d\\u043d\\u0443\\u044e \\u0441\\u0430\\u043c\\u043e\\u043e\\u0442\\u0432\\u0435\\u0440\\u0436\\u0435\\u043d\\u043d\\u043e\\u0441\\u0442\\u044c, \\u0438 \\u0432\\u044b\\u0441\\u043e\\u043a\\u0438\\u0435 \\u043f\\u0440\\u043e\\u0444\\u0435\\u0441\\u0441\\u0438\\u043e\\u043d\\u0430\\u043b\\u044c\\u043d\\u044b\\u0435 \\u043a\\u0430\\u0447\\u0435\\u0441\\u0442\\u0432\\u0430 \"}', '2023-05-19 09:32:09', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `patronymic` varchar(100) NOT NULL,
  `gender` smallint(1) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `personal`
--

INSERT INTO `personal` (`id`, `user_id`, `firstname`, `lastname`, `patronymic`, `gender`, `active`) VALUES
(1, 555, 'Иванов', 'Иван', 'Иванович', 0, 0),
(2, 554, 'Администратор', 'Администратор', 'Администратор', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `category_id` int(11) NOT NULL,
  `img` varchar(150) NOT NULL,
  `number` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `period` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `img`, `number`, `price`, `period`, `count`, `active`) VALUES
(8, 'Ноутбук Apple MacBook Pro A2338 с дисплеем Retina', 5, '04-06-2022_10-29-16_554.jpg', 'Z11D0003C', 939900, 5, 4, 0),
(9, 'Ноутбук ASUS TUF Gaming F17 FX706HCB', 5, '04-06-2022_10-31-31_554.jpg', '81WQ001XRK', 154990, 5, 4, 0),
(10, 'МФУ HP LaserJet', 5, '04-06-2022_10-34-07_554.jpg', 'M236d', 124990, 3, 4, 0),
(11, 'Стол офисный угловой эргономичный 167.6x149.2x74.5 слива коллекции Статус', 6, '04-06-2022_10-36-49_554.jpg', '411542', 291753, 5, 2, 0),
(12, 'Стол эргономичный 167.6x110x74.5 слива коллекции Статус', 6, '04-06-2022_10-37-22_554.jpg', '410523', 178237, 5, 8, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `rent`
--

CREATE TABLE `rent` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rent`
--

INSERT INTO `rent` (`id`, `product_id`, `personal_id`, `date_add`) VALUES
(15, 10, 2, '2022-04-06 05:01:37'),
(18, 9, 2, '2022-04-06 05:04:14'),
(19, 11, 2, '2022-04-06 05:04:15');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `person_id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(554, 0, 'admin', 'RFKgGyHWZcEoMTE6mNGq7GZsucUUfQkP', '$2y$13$mYo8gKo0arTo3HN3DiJ5WuqosMAjZgwFDJxEX90Elc9e3HJa4DWei', NULL, 'test@kstu.kz', 10, 1554784364, 1554784364),
(555, 0, 'test', 'GoSEGNPstsXqGR169ClpaPQTtO13tNmf', '$2y$13$HEWX7cBcrezOe5V4y47xIO8anJGsKcD1dmrYRhD5P3WuAvkvnejx.', NULL, 'test1@kstu.kz', 10, 1556343848, 1556343848);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `auth_assignment_user_id_idx` (`user_id`);

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
  ADD PRIMARY KEY (`parent`,`child`) USING BTREE,
  ADD KEY `child` (`child`) USING BTREE;

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
-- Индексы таблицы `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `forms_fields`
--
ALTER TABLE `forms_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_id` (`form_id`);

--
-- Индексы таблицы `forms_fields_data`
--
ALTER TABLE `forms_fields_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forms_fields_data_ibfk_1` (`form_id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Индексы таблицы `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_id` (`person_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `forms_fields`
--
ALTER TABLE `forms_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `forms_fields_data`
--
ALTER TABLE `forms_fields_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `rent`
--
ALTER TABLE `rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=556;

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
-- Ограничения внешнего ключа таблицы `forms_fields`
--
ALTER TABLE `forms_fields`
  ADD CONSTRAINT `forms_fields_ibfk_1` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`);

--
-- Ограничения внешнего ключа таблицы `forms_fields_data`
--
ALTER TABLE `forms_fields_data`
  ADD CONSTRAINT `forms_fields_data_ibfk_1` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`);

--
-- Ограничения внешнего ключа таблицы `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

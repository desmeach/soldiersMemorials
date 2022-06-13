-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 13 2022 г., 15:46
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_soldiers`
--

-- --------------------------------------------------------

--
-- Структура таблицы `award`
--

CREATE TABLE `award` (
  `id` int NOT NULL,
  `photo` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Фото награды',
  `award_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Название'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `award`
--

INSERT INTO `award` (`id`, `photo`, `award_name`) VALUES
(1, 'red_star_orden.png', 'Орден Красной Звезды');

-- --------------------------------------------------------

--
-- Структура таблицы `birthplace`
--

CREATE TABLE `birthplace` (
  `id` int NOT NULL,
  `id_country` int NOT NULL,
  `region` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Область рождения',
  `city` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Город рождения',
  `district` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Район рождения',
  `village` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Село/посёлок'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `birthplace`
--

INSERT INTO `birthplace` (`id`, `id_country`, `region`, `city`, `district`, `village`) VALUES
(1, 1, 'Московская обл.', 'Химки', 'Октябрьская ж/д.', 'с. Барашки');

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE `country` (
  `id` int NOT NULL,
  `country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id`, `country`) VALUES
(1, 'РСФСР'),
(2, 'УССР'),
(3, 'БССР'),
(4, 'ЗСФСР');

-- --------------------------------------------------------

--
-- Структура таблицы `enlistment`
--

CREATE TABLE `enlistment` (
  `id` int NOT NULL,
  `year` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Год призыва',
  `month` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Месяц призыва',
  `day` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'День призыва',
  `id_country` int NOT NULL COMMENT 'id страны призыва',
  `region` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Область призыва',
  `city` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Город призыва',
  `district` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Район призыва'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `enlistment`
--

INSERT INTO `enlistment` (`id`, `year`, `month`, `day`, `id_country`, `region`, `city`, `district`) VALUES
(1, '1939', '01', '14', 1, 'Московская обл.', 'Химки', 'Химкинский р-н.');

-- --------------------------------------------------------

--
-- Структура таблицы `military_unit`
--

CREATE TABLE `military_unit` (
  `id` int NOT NULL,
  `type` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Подразделение',
  `unit_num` int NOT NULL COMMENT 'Номер'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `military_unit`
--

INSERT INTO `military_unit` (`id`, `type`, `unit_num`) VALUES
(1, 'Истребительный авиационный полк', 437);

-- --------------------------------------------------------

--
-- Структура таблицы `rank`
--

CREATE TABLE `rank` (
  `id` int NOT NULL,
  `rank_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Название звания'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `rank`
--

INSERT INTO `rank` (`id`, `rank_name`) VALUES
(1, 'Лейтенант');

-- --------------------------------------------------------

--
-- Структура таблицы `retire`
--

CREATE TABLE `retire` (
  `id` int NOT NULL,
  `year` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Год выбытия',
  `month` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Месяц выбытия',
  `day` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'День выбытия'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `retire`
--

INSERT INTO `retire` (`id`, `year`, `month`, `day`) VALUES
(1, '1942', '08', '26');

-- --------------------------------------------------------

--
-- Структура таблицы `soldiers`
--

CREATE TABLE `soldiers` (
  `id` int NOT NULL,
  `photo` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Фото солдата',
  `id_status` int NOT NULL COMMENT 'id статуса',
  `surname` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Фамилия солдата',
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Имя солдата',
  `middle_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Отчество солдата',
  `birth_year` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Год рождения',
  `birth_month` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Месяц рождения',
  `birth_day` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'День рождения',
  `id_retire` int NOT NULL COMMENT 'id даты выбытия ',
  `id_rank` int NOT NULL COMMENT 'id звания',
  `id_military_unit` int NOT NULL COMMENT 'id военной части',
  `id_enlistment` int NOT NULL COMMENT 'id года и места призыва',
  `id_birthplace` int NOT NULL COMMENT 'id места рождения'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `soldiers`
--

INSERT INTO `soldiers` (`id`, `photo`, `id_status`, `surname`, `name`, `middle_name`, `birth_year`, `birth_month`, `birth_day`, `id_retire`, `id_rank`, `id_military_unit`, `id_enlistment`, `id_birthplace`) VALUES
(1, 'filippov_alexei.jpg', 1, 'Филиппов', 'Алексей', 'Иванович', '1921', '01', '16', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `soldier_award`
--

CREATE TABLE `soldier_award` (
  `id_soldier` int NOT NULL,
  `id_award` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `soldier_award`
--

INSERT INTO `soldier_award` (`id_soldier`, `id_award`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int NOT NULL,
  `status` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Статус солдата'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Погиб');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `award`
--
ALTER TABLE `award`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `birthplace`
--
ALTER TABLE `birthplace`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_country` (`id_country`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `enlistment`
--
ALTER TABLE `enlistment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fk_country_enlistment` (`id_country`);

--
-- Индексы таблицы `military_unit`
--
ALTER TABLE `military_unit`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `retire`
--
ALTER TABLE `retire`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `soldiers`
--
ALTER TABLE `soldiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `soldiers_fk0` (`id_status`),
  ADD KEY `soldiers_fk2` (`id_retire`),
  ADD KEY `soldiers_fk3` (`id_rank`),
  ADD KEY `soldiers_fk4` (`id_military_unit`),
  ADD KEY `soldiers_fk5` (`id_enlistment`),
  ADD KEY `soldiers_fk6` (`id_birthplace`);

--
-- Индексы таблицы `soldier_award`
--
ALTER TABLE `soldier_award`
  ADD PRIMARY KEY (`id_soldier`),
  ADD KEY `id_award` (`id_award`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `award`
--
ALTER TABLE `award`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `birthplace`
--
ALTER TABLE `birthplace`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `enlistment`
--
ALTER TABLE `enlistment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `military_unit`
--
ALTER TABLE `military_unit`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `rank`
--
ALTER TABLE `rank`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `retire`
--
ALTER TABLE `retire`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `soldiers`
--
ALTER TABLE `soldiers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `birthplace`
--
ALTER TABLE `birthplace`
  ADD CONSTRAINT `birthplace_ibfk_1` FOREIGN KEY (`id_country`) REFERENCES `country` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `enlistment`
--
ALTER TABLE `enlistment`
  ADD CONSTRAINT `enlistment_ibfk_1` FOREIGN KEY (`id_country`) REFERENCES `country` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `soldiers`
--
ALTER TABLE `soldiers`
  ADD CONSTRAINT `soldiers_fk0` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `soldiers_fk2` FOREIGN KEY (`id_retire`) REFERENCES `retire` (`id`),
  ADD CONSTRAINT `soldiers_fk3` FOREIGN KEY (`id_rank`) REFERENCES `rank` (`id`),
  ADD CONSTRAINT `soldiers_fk4` FOREIGN KEY (`id_military_unit`) REFERENCES `military_unit` (`id`),
  ADD CONSTRAINT `soldiers_fk5` FOREIGN KEY (`id_enlistment`) REFERENCES `enlistment` (`id`),
  ADD CONSTRAINT `soldiers_fk6` FOREIGN KEY (`id_birthplace`) REFERENCES `birthplace` (`id`);

--
-- Ограничения внешнего ключа таблицы `soldier_award`
--
ALTER TABLE `soldier_award`
  ADD CONSTRAINT `soldier_award_ibfk_1` FOREIGN KEY (`id_soldier`) REFERENCES `soldiers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `soldier_award_ibfk_2` FOREIGN KEY (`id_award`) REFERENCES `award` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

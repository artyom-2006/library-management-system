-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 09 2024 г., 19:13
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `added_ebooks_genres`
--

CREATE TABLE `added_ebooks_genres` (
  `id` int(11) NOT NULL,
  `ebook_id` int(11) DEFAULT NULL,
  `genre_id` int(11) DEFAULT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(80) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `password`, `created_at`) VALUES
(1, 'Artyom', '$2y$10$SxsVUonoxT/v6.wbv5yu.ex9cFC1prV1MQUhI5uwYtVpvTZ.bQQT2', '31.10.2024-19:24');

-- --------------------------------------------------------

--
-- Структура таблицы `ebooks`
--

CREATE TABLE `ebooks` (
  `ebook_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `edges` int(11) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pdf_file_path` varchar(255) DEFAULT NULL,
  `cover_image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `ebooks`
--

INSERT INTO `ebooks` (`ebook_id`, `name`, `author`, `edges`, `language`, `size`, `description`, `added_at`, `pdf_file_path`, `cover_image_path`) VALUES
(29, 'Հարրի Փոթերը և Փիլիսոփայական քարը', 'Ջոան Ռոուլինգ', 348, 'Հայերեն', '2.7', 'Ծնողներին կորցնելուց հետո Հարրի Փոթերն ապրում է մորաքրոջ ընտանիքի հետ, որտեղ տղային հալածում են, նվաստացնում և գրեթե կիսաքաղց պահում: Սակայն երբ լրանում է Հարրիի տասնմեկ տարին, նրան հրավիրում են Հոգվորթս` աներևակայելի մի դպրոց, որտեղ կարող են սովորել միայն բացառիկ` կախարդական ունակություններով օժտված պատանիներն ու աղջիկները: Այստեղ Հարրի Փոթերին սպասում է բոլորովին նոր` անհավանական արկածներով ու փորձություններով հարուստ կյանք։', '2024-11-22 15:29:06', '/Library/uploads/ebooks/files/6740a3420bcaa_Harri-Pottery-ev-pilisopayakan-qary.pdf', '/Library/uploads/ebooks/covers/6740a3420bcb8_Harry-Pottery-ev-pilisopayakan-qary.jpg'),
(30, 'Հարրի Փոթթերը և Գաղտնիքների սենյակը', 'Ջոան Ռոուլինգ', 380, 'Հայերեն', '1.8', 'Ամառային արձակուրդին Հարրի Փոթերը դարձյալ իր ազգականների տանն է, որտեղ նրա հետ կոպիտ ու վատ են վարվում: Շուտով Հարրին վերադառնում է դպրոց: Հելոուինին դպրոցի սրահներում տարօրինակ շշուկներ են լսվում, որ նշանակում է՝ հարյուրավոր տարիներ առաջ դպրոցում կառուցած Գաղտնիքների սենյակը կրկին բացվել է, և այնտեղ դարանած Սարսափն ազատ է արձակվել` սպառնալով ոչնչացնել ոչ կախարդ ընտանիքներում ծնված աշակերտներին:', '2024-11-22 15:31:23', '/Library/uploads/ebooks/files/6740a3cbbadcd_Harri-Pottery-ev-gaxtniqneri-senyaky.pdf', '/Library/uploads/ebooks/covers/6740a3cbbadd5_Harry-Pottery-ev-gaxtniqneri-senyaky.jpg'),
(31, 'Հարրի Փոթերը և Ազքաբանի կալանավորը', 'Ջոան Ռոուլինգ', 441, 'Հայերեն', '3.2', 'Տասներկու երկար տարիներ Ազքաբանի բանտում փակված էր Սիրիուս Բլեք անունով սոսկալի մի կալանավոր: Նրանից վախենում են բոլորը` մագլ թե մոգ: Ժամանակին Բլեքը մեկ անեծքով տասներեք հոգու էր միաժամանակ կործանել: Շատերը կարծում էին, որ նա լորդ Վոլդեմորի հետնորդն էր: Եվ ահա Սիրիուս Բլեքին հաջողվում է խորամանկել անգամ Ազքաբանի պահնորդներին և փախչել իր ատելի խցից: Ինչ–որ կերպ Բլեքը ճակատագրով կապված է Հարրիի հետ: Թեև դպրոցում Հարրին շրջապատված է նվիրված ընկերներով և իմաստուն ու հմուտ ուսուցիչներով, Հոգվորթսում կա մեկը, որ խիստ վտանգավոր է նրա համար, սակայն որևէ մեկի մտքով չի անցնում կասկածել նրան։', '2024-11-22 15:36:09', '/Library/uploads/ebooks/files/6740a4e9340b8_Harri-Pottery-ev-azqabani-kalanavory.pdf', '/Library/uploads/ebooks/covers/6740a4e9340bd_Harry-Pottery-ev-azqabani-kalanavory.png'),
(32, 'Հարրի Փոթերը և Կրակի գավաթը', 'Ջոան Ռոուլինգ', 748, 'Հայերեն', '5.3', 'Հարրի Փոթերին բախտ է վիճակվում ներկա լինելու կախարդ աշխարհի ամենահետաքրքիր իրադարձություններից մեկին՝ քվիդիչի աշխարհի գավաթի խաղին: Սակայն խաղին հետևող իրադարձությունները խուճապի են մատնում հանդիսատեսին: Մոգության նախարարությունում իրարանցում է սկսվում: Իր ընկերների՝ Ռոնի և Հերմայոնիի հետ Հարրին վերադառնում է դպրոց, որտեղ իմանում է, որ հարյուր տարվա ընդմիջումից հետո վերսկսվելու է Եռյակի մրցամարտը՝ կախարդների դպրոցների միջև տեղի ունեցող մրցույթը: Հարրին մյուս աշակերտների նման պատրաստվում է դիտելու մրցամարտի երեք փուլերը, սակայն դեպքերն անսպասելի ընթացք են ստանում. Հարրիին դարձյալ դժվարին փորձություններ են սպասում:', '2024-11-22 15:38:11', '/Library/uploads/ebooks/files/6740a563b03f4_Harry-Pottery-ev-kraki-gavaty.pdf', '/Library/uploads/ebooks/covers/6740a563b03fc_Harry-Pottery-ev-kraki-gavaty.png');

-- --------------------------------------------------------

--
-- Структура таблицы `ebooks_genres`
--

CREATE TABLE `ebooks_genres` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `ebooks_genres`
--

INSERT INTO `ebooks_genres` (`genre_id`, `genre_name`, `created_at`) VALUES
(1, 'Սարսափ', '2024-12-05 14:03:54'),
(2, 'Արկածային', '2024-12-05 14:04:11'),
(3, 'Դետեկտիվ', '2024-12-05 14:04:17');

-- --------------------------------------------------------

--
-- Структура таблицы `pbooks_genres`
--

CREATE TABLE `pbooks_genres` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(80) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `saved_ebooks`
--

CREATE TABLE `saved_ebooks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ebook_id` int(11) DEFAULT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `saved_ebooks`
--

INSERT INTO `saved_ebooks` (`id`, `user_id`, `ebook_id`, `added_at`) VALUES
(101, 1, 32, '2024-12-04 16:56:45'),
(102, 1, 31, '2024-12-05 17:42:20');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  `surname` varchar(80) DEFAULT NULL,
  `phone_number` varchar(30) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`, `phone_number`, `email_address`, `password`, `registration_date`) VALUES
(1, 'Արտյոմ', 'Հովհաննիսյան', '+374 99 245208', 'hovhannisyanartyom79@gmail.com', '$2y$12$DCCqp7J7.JlAqcMCNixE9ead2FiXibta/BWMefj6YUbRvelBeDKR2', '2024-11-02 15:08:46'),
(7, 'Նորիկ', 'Հարությունյան', '+374 55 159793', 'norikharutyunyan825@gmail.com', '$2y$12$D9twNakFEn.Ay4mstGpXz.N8FAkI/iKyEhEI27nx8H0XtcpLBD/IS', '2024-11-27 11:28:32');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `added_ebooks_genres`
--
ALTER TABLE `added_ebooks_genres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ebook_id` (`ebook_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Индексы таблицы `ebooks`
--
ALTER TABLE `ebooks`
  ADD PRIMARY KEY (`ebook_id`);

--
-- Индексы таблицы `ebooks_genres`
--
ALTER TABLE `ebooks_genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- Индексы таблицы `pbooks_genres`
--
ALTER TABLE `pbooks_genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- Индексы таблицы `saved_ebooks`
--
ALTER TABLE `saved_ebooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ebook_id` (`ebook_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `added_ebooks_genres`
--
ALTER TABLE `added_ebooks_genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `ebooks`
--
ALTER TABLE `ebooks`
  MODIFY `ebook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `ebooks_genres`
--
ALTER TABLE `ebooks_genres`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `pbooks_genres`
--
ALTER TABLE `pbooks_genres`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `saved_ebooks`
--
ALTER TABLE `saved_ebooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `added_ebooks_genres`
--
ALTER TABLE `added_ebooks_genres`
  ADD CONSTRAINT `added_ebooks_genres_ibfk_1` FOREIGN KEY (`ebook_id`) REFERENCES `ebooks` (`ebook_id`),
  ADD CONSTRAINT `added_ebooks_genres_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `ebooks_genres` (`genre_id`);

--
-- Ограничения внешнего ключа таблицы `saved_ebooks`
--
ALTER TABLE `saved_ebooks`
  ADD CONSTRAINT `saved_ebooks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `saved_ebooks_ibfk_2` FOREIGN KEY (`ebook_id`) REFERENCES `ebooks` (`ebook_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

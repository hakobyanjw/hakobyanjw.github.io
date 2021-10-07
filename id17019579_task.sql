-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Окт 07 2021 г., 11:11
-- Версия сервера: 10.3.16-MariaDB
-- Версия PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `id17019579_task`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(3) NOT NULL,
  `header` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `date_creat` date NOT NULL,
  `date_mod` date DEFAULT NULL,
  `date_exp` date NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'https://pic.onlinewebfonts.com/svg/img_548469.png',
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `done` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `header`, `description`, `text`, `date_creat`, `date_mod`, `date_exp`, `name`, `img`, `phone`, `email`, `done`) VALUES
(1, 'Help remote workers function as a team', 'Please take care of the two new employees - Ashton Kutcher and Mila Kunis', 'There’s nothing like proximity to help a group of people coordinate efforts and work together more effectively.\r\n\r\nCommunicating verbally and non-verbally, and touching base during hallway conversations goes a long way toward keeping projects on track and moving toward completion.\r\n\r\nBut when teammates are spread across locations and time zones, work management apps that provide real-time insight into project status — and potential dependencies and blockers — can keep everyone on the same page.\r\n\r\nRemote workers can also use the platform’s mobile app to track and update the status of projects in real time.', '2021-10-03', '2021-10-07', '2021-11-16', 'Dominic Swilington', 'https://www.teahub.io/photos/full/56-562870_beard-man-wallpaper-ray-ban-new-wayfarer-on.jpg', '+7123456789', 'domswim@gmail.com', 'false'),
(2, 'Testing all keyboards', 'Most employees complain that their keyboard does not work well.', 'For help.&lt;br&gt;\r\nThe keyboard has stopped working or is intermittently shutting down.\r\nIf you are using a Bluetooth enabled device, the problem is most likely a lost wireless connection. The loss of connection between your Logitech Keyboard K48 and your computer or mobile device can occur for several reasons.\r\nCheck the battery level in the keyboard.\r\nMake sure the keyboard is not placed on a metal surface that could interfere with Bluetooth signals.&lt;br&gt;\r\nCheck if other devices are interfering with the Bluetooth signal.&lt;br&gt;\r\nWireless speakers, computer power supplies, monitors, mobile phones, and garage door openers can be sources of interference.&lt;br&gt;\r\nKeep the keyboard and the connected computer or mobile device at least 20 cm away from other electrical appliances.\r\nMove the keyboard closer to your computer or mobile device.&lt;br&gt;\r\nThe keyboard stopped working after the connected computer woke up from sleep mode.&lt;br&gt;\r\nChange the power settings for the Bluetooth wireless adapter.\r\nOpen Device Manager by going to Control Panel&gt; System and Security&gt; System&gt; Device Manager.&lt;br&gt;\r\n\r\nUnder Bluetooth Radios, right-click the name of the Bluetooth adapter you are using (for example, Dell Wireless 370), then select Properties.&lt;br&gt;\r\n\r\nIn the Properties window, click the Power Management tab and uncheck the Allow this device to turn off to save power check box.&lt;br&gt;\r\n\r\nClick OK to save the settings and restart your PC.', '2021-10-03', NULL, '2021-10-10', 'Samuel Ivanov', 'https://www.teahub.io/photos/full/279-2798906_man-free-pictures-free-photos-free-images-royalty.jpg', '+7987654321', 'samiva@gmail.com', 'true');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

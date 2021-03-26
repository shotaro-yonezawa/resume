-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2021 年 3 月 26 日 04:33
-- サーバのバージョン： 5.7.32
-- PHP のバージョン: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `bleaf`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `posts`
--

CREATE TABLE `posts` (
  `post_id` int(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `reply_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `posts`
--

INSERT INTO `posts` (`post_id`, `content`, `user_id`, `photo`, `reply_id`) VALUES
(1, 'this is my first leaf', 1, NULL, NULL),
(2, '2nd leaf', 1, NULL, NULL),
(3, 'hi', 1, NULL, 1),
(4, 'this is my first leaf', 3, NULL, NULL),
(5, 'hi', 3, NULL, 2),
(6, 'hi', 3, NULL, 3),
(7, 'hi', 3, NULL, 4),
(8, 'hi 1', 3, NULL, 5),
(9, 'hi 2', 3, NULL, 6),
(11, 'test', 1, NULL, NULL),
(15, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 1, NULL, NULL),
(21, 'aaa', 8, NULL, NULL),
(30, 'Hey mate!', 8, NULL, 15),
(31, 'How are you?', 8, NULL, 16),
(34, 'aaa', 8, NULL, 19),
(35, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 10, NULL, NULL),
(36, 'a', 10, NULL, NULL),
(37, 'gergergesr', 10, NULL, 20),
(38, 'aaa', 10, NULL, 21),
(41, 'Good morning everyone!', 12, NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `replies`
--

CREATE TABLE `replies` (
  `reply_id` int(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `reply_address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `replies`
--

INSERT INTO `replies` (`reply_id`, `content`, `user_id`, `photo`, `reply_address_id`) VALUES
(1, 'hi', 1, NULL, 2),
(2, 'hi', 3, NULL, 4),
(3, 'hi', 3, NULL, 2),
(4, 'hi', 3, NULL, 1),
(5, 'hi 1', 3, NULL, 3),
(6, 'hi 2', 3, NULL, 3),
(15, 'Hey mate!', 8, NULL, 29),
(16, 'How are you?', 8, NULL, 29),
(19, 'aaa', 8, NULL, 15),
(20, 'gergergesr', 10, NULL, 36),
(21, 'aaa', 10, NULL, 36);

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(1) NOT NULL DEFAULT 'U',
  `bio` varchar(255) DEFAULT NULL,
  `user_photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `bio`, `user_photo`) VALUES
(1, 'sho', '$2y$10$0ZNM31Qa1RZGynmzZijAFOP0hZllXEGN.zodOlxx5M1ip6uaShoOq', 'U', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.', 'IMG_2250.JPG'),
(3, 'will', '$2y$10$WqgkyAuDZEdr.b6i5mS4cOzhkRT0Kootz8NWJgAZcISeN4DTdHBkW', 'U', 'Gyudon', ''),
(8, 'aaa', '$2y$10$JItajDVHQgf/38KkrNhpx.dzrRvpgtXxxPnzfS5AQbTUq/.D4wv1u', 'U', 'aaa', 'addidas2.jpg'),
(10, 'bbb', '$2y$10$aHdCiDG6fsRRG1ebo3aa4.iGhFmaU24gunVSzPCNJu5.3gXO.RCfK', 'U', 'aaa', NULL),
(12, 'Jennifer', '$2y$10$ZnBuU.ysIVrLUy6pTy/TG.LhZxnqx74xWZfw6vtrCRlCy48cOqyzm', 'U', 'I\'m designer.', 'pexels-daniel-xavier-839633.jpg');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- テーブルのインデックス `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`reply_id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- テーブルの AUTO_INCREMENT `replies`
--
ALTER TABLE `replies`
  MODIFY `reply_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

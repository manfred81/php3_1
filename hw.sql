drop database if exists hw;
create database hw;

use hw;

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

INSERT INTO `products` (`id`, `name`, `price`) VALUES
(1, 'Первый', 34.13),
(2, 'Второй', 67.10),
(3, 'Третий', 98.27),
(4, 'Четвертый', 34.13),
(5, 'Пятый', 67.10),
(6, 'Шестой', 98.27),
(7, 'Седьмой', 34.13),
(8, 'Восьмой', 67.10),
(9, 'Девятый', 98.27),
(10, 'Десятый', 34.13),
(11, 'Одиннадцатый', 34.13),
(12, 'Двенадцатый', 67.10),
(13, 'Тринадцатый', 98.27),
(14, 'Четырнадцатый', 34.13),
(15, 'Пятнадцатый', 67.10),
(16, 'Шестнадцатый', 98.27),
(17, 'Что-то ещё', 18.37);
CREATE DATABASE IF NOT EXISTS `tintuc` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `tintuc`;

CREATE TABLE IF NOT EXISTS `users` (
  `idUS` int(11) NOT NULL AUTO_INCREMENT,
  `HoTen` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  PRIMARY KEY (`idUS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=2;

INSERT INTO `users` (`idUS`, `HoTen`, `Username`, `Password`, `email`, `Phone`) VALUES
(1, 'lethe', 'lethe', '123456', 'lethe@gmail.com', '09051234566');


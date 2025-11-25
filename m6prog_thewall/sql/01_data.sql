-- Seed data for m6prog_thewall

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;

INSERT INTO `messages` (`author`, `body`) VALUES
('System', 'Welkom op The Wall! Post je eerste bericht.'),
('De Maker', 'Deze muur is gebouwd met Docker, PHP en MySQL.');

SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

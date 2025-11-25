-- Seed data for m6prog_digipost

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;

INSERT INTO `recipients` (`name`, `email`) VALUES
('Alice Post', 'alice@example.com'),
('Bob Box', 'bob@example.com');

INSERT INTO `messages` (`recipient_id`, `subject`, `body`, `created_at`) VALUES
(1, 'Welkom', 'Welkom bij DigiPost, Alice!', NOW()),
(2, 'Welkom', 'Welkom bij DigiPost, Bob!', NOW());

SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

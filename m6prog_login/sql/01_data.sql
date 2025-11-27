-- Seed data for m6prog_login

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;

INSERT INTO `users` (`username`, `displayname`, `passwordhash`) VALUES
('leraar', 'mario', '$argon2id$v=19$m=65536,t=4,p=1$Zm9Cc0IwQ3BDLzRSaVIvYw$attCFRn94QfWxMObfoDrLtZ7emSPJjFl+AsqHGuQGAo');

SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

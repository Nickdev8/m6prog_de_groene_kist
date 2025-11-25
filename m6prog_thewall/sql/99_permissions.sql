-- Ensure app user can connect from any container host
CREATE USER IF NOT EXISTS 'thewall_app'@'%' IDENTIFIED BY 'thewall_app_pw';
GRANT ALL PRIVILEGES ON `m6prog_thewall`.* TO 'thewall_app'@'%';
FLUSH PRIVILEGES;

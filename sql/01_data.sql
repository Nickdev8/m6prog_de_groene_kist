INSERT INTO users (email, password, role) VALUES
('beheer@groenehavenmarkt.nl', 'admin123', 'admin');

INSERT INTO categories (name, slug) VALUES
('Groente', 'groente'),
('Fruit', 'fruit');

INSERT INTO products (name, description, price, category_id, created_by) VALUES
('Boerenkool stronk', 'Vers van het land, klaar om te snijden.', 1.25, 1, 1),
('Flespompoen', 'Zoete pompoen, ideaal voor soep en oven.', 2.80, 1, 1),
('Mand mandarijnen', 'Knapperige mandarijnen voor in de lunchbox.', 3.75, 2, 1),
('Blauwe bessen', 'Bosje bessen, vol smaak.', 2.50, 2, 1);

INSERT INTO offers (product_id, title, promo_price, starts_at, ends_at, active, created_by) VALUES
(1, 'Stoofpaarse boerenkool deal', 0.99, '2025-11-01 00:00:00', '2025-11-30 23:59:59', 1, 1),
(3, 'Mand mandarijnen herfstactie', 2.99, '2025-11-05 00:00:00', '2025-11-20 23:59:59', 1, 1);

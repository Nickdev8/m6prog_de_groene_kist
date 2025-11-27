-- Fruit selecteren, alfabetisch
SELECT p.id, p.name, p.price
FROM products p
JOIN categories c ON c.id = p.category_id
WHERE c.name = 'Fruit'
ORDER BY p.name ASC;

-- Groente selecteren, alfabetisch
SELECT p.id, p.name, p.price
FROM products p
JOIN categories c ON c.id = p.category_id
WHERE c.name = 'Groente'
ORDER BY p.name ASC;

-- Product zoeken op (deel van) de naam: vervang :term met jouw zoekterm, incl. % voor wildcards
SELECT p.id, p.name, p.price, c.name AS category
FROM products p
JOIN categories c ON c.id = p.category_id
WHERE p.name LIKE :term
ORDER BY p.name ASC;

-- Aanbiedingen per categorie (soort)
SELECT c.name AS category, o.title, o.promo_price, p.name AS product
FROM offers o
JOIN products p ON p.id = o.product_id
JOIN categories c ON c.id = p.category_id
WHERE o.active = 1
ORDER BY c.name, o.title;

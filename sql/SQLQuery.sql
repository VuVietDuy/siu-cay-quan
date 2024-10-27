SELECT * FROM orders;

SELECT * FROM order_items;

SELECT * FROM foods;

SELECT * FROM users;

SELECT * FROM categories;

SELECT * FROM tables;

SELECT  f.id, f.name, f.image, oi.quantity, oi.price 
FROM order_items oi
INNER JOIN foods f ON f.id = oi.food_id
WHERE order_id = 1;

SELECT o.order_id, o.table_id, o.status, SUM(oi.quantity * oi.price) AS total_price FROM orders o
LEFT JOIN order_items oi ON o.order_id = oi.order_id
GROUP BY o.order_id, o.table_id, o.status;

SELECT oi.food_id, oi.quantity, oi.price, f.name AS food_name FROM order_items oi
INNER JOIN foods f ON f.food_id = oi.food_id
WHERE order_id = 2;

SELECT  f.food_id, f.name, f.image_url, oi.quantity, oi.price 
FROM order_items oi
INNER JOIN foods f ON f.food_id = oi.food_id
WHERE order_id = 2;


SELECT o.order_id, o.table_id, o.status, SUM(oi.quantity * oi.price) AS total_price FROM orders o
LEFT JOIN order_items oi ON o.order_id = oi.order_id
GROUP BY o.order_id, o.table_id, o.status
WHERE o.order_id = 2;
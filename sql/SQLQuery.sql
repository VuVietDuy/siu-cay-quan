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


SELECT o.order_id, o.table_id, o.status, o.payment_method, o.payment_status, o.payment_time, SUM(oi.quantity * oi.price) AS total_price FROM orders o
LEFT JOIN order_items oi ON o.order_id = oi.order_id
WHERE o.order_id = 3
GROUP BY o.order_id, o.table_id, o.status, o.payment_method, o.payment_status, o.payment_time;

SELECT COUNT(food_id) AS total_food FROM foods;

SELECT COUNT(order_id) AS total_order FROM orders
WHERE MONTH(created_at) = MONTH(NOW());

SELECT COUNT(table_id) AS total_table FROM tables;

SELECT SUM(quantity * price) AS total_revenue_this_month FROM order_items
WHERE MONTH(created_at) = MONTH(NOW());

SELECT f.food_id, f.name, f.description, f.category_id, c.name AS category, SUM(oi.quantity) AS total_buy FROM foods f
INNER JOIN order_items oi ON oi.food_id = f.food_id
INNER JOIN categories c ON c.category_id = f.category_id
GROUP BY f.food_id, f.name, f.description, f.category_id
ORDER BY total_buy DESC
LIMIT 5;



SELECT 
    DATE(payment_time) AS day,
    SUM(price * quantity) AS daily_revenue
FROM 
    orders AS o
JOIN 
    order_items AS oi ON o.order_id = oi.order_id
WHERE 
    o.payment_status = 'paid'
    AND MONTH(o.payment_time) = MONTH(CURRENT_DATE)
    AND YEAR(o.payment_time) = YEAR(CURRENT_DATE)
GROUP BY 
    day
ORDER BY 
    day;

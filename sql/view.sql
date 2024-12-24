CREATE PROCEDURE get_order_info(
    IN p_order_id INT
)
BEGIN
    SELECT o.order_id, o.table_id, o.status, o.payment_method, o.payment_status, o.payment_time, o.created_at, o.updated_at,
           t.capacity AS table_capacity, t.qr AS table_qr, t.status AS table_status
    FROM orders o
    JOIN tables t ON o.table_id = t.table_id
    WHERE o.order_id = p_order_id;

    SELECT oi.order_item_id, oi.food_id, f.name AS food_name, oi.quantity, oi.note, oi.price, oi.created_at, oi.updated_at
    FROM order_items oi
    JOIN foods f ON oi.food_id = f.food_id
    WHERE oi.order_id = p_order_id;
END;


CREATE VIEW top_foods_by_sales AS
SELECT f.food_id, 
       f.name, 
       f.description, 
       f.image_url, 
       f.price, 
       f.category_id, 
       c.name AS category, 
       SUM(oi.quantity) AS total_buy
FROM foods f
INNER JOIN order_items oi ON oi.food_id = f.food_id
INNER JOIN categories c ON c.category_id = f.category_id
GROUP BY f.food_id, f.name, f.description, f.category_id
ORDER BY total_buy DESC
LIMIT 5;

CREATE VIEW daily_revenue_by_day AS
SELECT 
    DATE(o.payment_time) AS day,
    SUM(oi.price * oi.quantity) AS daily_revenue
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

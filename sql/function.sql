CREATE FUNCTION get_avg_order_value()
RETURNS DECIMAL(10, 2)
DETERMINISTIC
BEGIN
    DECLARE avg_value DECIMAL(10, 2);

    SELECT AVG(oi.price * oi.quantity) INTO avg_value
    FROM orders AS o
    JOIN order_items AS oi ON o.order_id = oi.order_id
    WHERE o.payment_status = 'paid'
    AND MONTH(o.payment_time) = MONTH(CURRENT_DATE)
    AND YEAR(o.payment_time) = YEAR(CURRENT_DATE);

    RETURN avg_value;
END;


CREATE FUNCTION get_total_revenue_this_month()
RETURNS DECIMAL(10, 2)
DETERMINISTIC
BEGIN
    DECLARE total_revenue DECIMAL(10, 2);

    SELECT SUM(oi.quantity * oi.price) INTO total_revenue
    FROM order_items AS oi
    WHERE MONTH(oi.created_at) = MONTH(CURRENT_DATE)
    AND YEAR(oi.created_at) = YEAR(CURRENT_DATE);

    RETURN total_revenue;
END;

SELECT get_total_revenue_this_month();

CREATE PROCEDURE get_order_details(IN order_id_param INT)
BEGIN
    SELECT 
        o.order_id, 
        o.table_id, 
        o.status, 
        o.payment_method, 
        o.payment_status, 
        o.payment_time, 
        SUM(oi.quantity * oi.price) AS total_price
    FROM 
        orders o
    LEFT JOIN 
        order_items oi ON o.order_id = oi.order_id
    WHERE 
        o.order_id = order_id_param
    GROUP BY 
        o.order_id, o.table_id, o.status, o.payment_method, o.payment_status, o.payment_time;
END;


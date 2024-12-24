
CREATE PROCEDURE add_food(
    IN p_name VARCHAR(255),
    IN p_category_id INT,
    IN p_description VARCHAR(255),
    IN p_price DECIMAL(10,2),
    IN p_image_url VARCHAR(255),
    IN p_available BOOLEAN
)
BEGIN
    DECLARE food_count INT;

    SELECT COUNT(*) INTO food_count
    FROM foods
    WHERE name = p_name;

    IF food_count > 0 THEN
        SELECT 'Food item already exists' AS message;
    ELSE
        INSERT INTO foods (name, category_id, description, price, image_url, available, created_at, updated_at)
        VALUES (p_name, p_category_id, p_description, p_price, p_image_url, p_available, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
        
        SELECT LAST_INSERT_ID() AS food_id;
    END IF;
END;



CREATE PROCEDURE get_food_by_category(
    IN p_category_id INT
)
BEGIN
    -- Select all food items that match the given category_id
    SELECT food_id, name, description, price, image_url, available, created_at, updated_at
    FROM foods
    WHERE category_id = p_category_id;
END;

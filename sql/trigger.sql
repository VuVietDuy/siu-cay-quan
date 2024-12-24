CREATE TRIGGER update_table_status_after_place_order
AFTER INSERT ON orders
FOR EACH ROW
BEGIN
    UPDATE tables
    SET status = 'occupied'
    WHERE table_id = NEW.table_id;
END;


CREATE TRIGGER update_table_status_after_completed_order
AFTER UPDATE ON orders
FOR EACH ROW
BEGIN
    IF NEW.payment_status = 'paid' THEN
        UPDATE tables
        SET status = 'available'
        WHERE table_id = NEW.table_id;
    END IF;
END;

CREATE TRIGGER set_payment_time_on_paid
BEFORE UPDATE ON orders
FOR EACH ROW
BEGIN
  IF NEW.payment_status = 'paid' AND OLD.payment_status != 'paid' THEN
    SET NEW.payment_time = CURRENT_TIMESTAMP;
  END IF;
END;

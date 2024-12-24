

USE siu_cay_quan_dev;

-- Thêm 10 dòng vào bảng `users`
INSERT INTO users (username, password, name, role)
VALUES 
('admin1', 'password1', 'Nguyễn Văn A', 'admin'),
('admin2', 'password2', 'Trần Thị B', 'admin'),
('nv1', 'password3', 'Phạm Văn C', 'staff'),
('nv2', 'password4', 'Lê Thị D', 'staff'),
('nv3', 'password5', 'Đặng Văn E', 'staff'),
('nv4', 'password6', 'Bùi Thị F', 'staff'),
('nv5', 'password7', 'Nguyễn Thị G', 'staff'),
('nv6', 'password8', 'Hoàng Văn H', 'staff'),
('nv7', 'password9', 'Phan Thị I', 'staff'),
('nv8', 'password10', 'Lý Văn K', 'staff');

-- Thêm 10 dòng vào bảng `tables`
INSERT INTO tables (capacity, qr, status, is_active)
VALUES
(2, 'qr_ban1', 'available', true),
(4, 'qr_ban2', 'occupied', true),
(2, 'qr_ban3', 'available', true),
(4, 'qr_ban4', 'occupied', false),
(6, 'qr_ban5', 'available', true),
(4, 'qr_ban6', 'occupied', true),
(2, 'qr_ban7', 'available', false),
(4, 'qr_ban8', 'occupied', true),
(6, 'qr_ban9', 'available', true),
(4, 'qr_ban10', 'occupied', false);

-- Thêm 4 dòng vào bảng `categories`
INSERT INTO categories (name, description)
VALUES
('Món mỳ cay', 'Các loại mỳ cay hấp dẫn'),
('Nước uống', 'Các loại nước uống giải khát'),
('Tráng miệng', 'Món tráng miệng ngọt ngào'),
('Khai vị', 'Món ăn nhẹ khai vị cho bữa ăn');

-- Thêm 20 dòng vào bảng `foods`
INSERT INTO foods (name, category_id, description, price, image_url, available)
VALUES
('Mỳ cay cấp 1', 1, 'Mỳ cay cấp độ 1 cho người không ăn cay', 50000, '/uploads/my_cay_1.jpg', true),
('Mỳ cay cấp 2', 1, 'Mỳ cay cấp độ 2 cho người ăn cay vừa', 55000, '/uploads/my_cay_2.jpg', true),
('Mỳ cay cấp 3', 1, 'Mỳ cay cấp độ 3 cho người ăn cay', 60000, '/uploads/my_cay_3.jpg', true),
('Trà sữa', 2, 'Trà sữa thơm ngon', 30000, '/uploads/tra_sua.jpg', true),
('Trà chanh', 2, 'Trà chanh mát lạnh', 20000, '/uploads/tra_chanh.jpg', true),
('Nước cam', 2, 'Nước cam tươi mát', 25000, '/uploads/nuoc_cam.jpg', true),
('Kem dừa', 3, 'Kem dừa ngọt mát', 35000, '/uploads/kem_dua.jpg', true),
('Bánh flan', 3, 'Bánh flan mềm mịn', 15000, '/uploads/banh_flan.jpg', true),
('Chè thập cẩm', 3, 'Chè thập cẩm ngon miệng', 30000, '/uploads/che_thap_cam.jpg', true),
('Khoai tây chiên', 4, 'Khoai tây chiên giòn tan', 25000, '/uploads/khoai_tay_chien.jpg', true),
('Gỏi cuốn', 4, 'Gỏi cuốn tươi mát', 30000, '/uploads/goi_cuon.jpg', true),
('Mỳ cay cấp 4', 1, 'Mỳ cay cấp độ 4 cho người ăn rất cay', 65000, '/uploads/my_cay_4.jpg', true),
('Mỳ cay hải sản', 1, 'Mỳ cay kết hợp hải sản', 75000, '/uploads/my_cay_hai_san.jpg', true),
('Sinh tố bơ', 2, 'Sinh tố bơ thơm ngon', 35000, '/uploads/sinh_to_bo.jpg', true),
('Kem socola', 3, 'Kem vị socola', 35000, '/uploads/kem_socola.jpg', true),
('Mực chiên giòn', 4, 'Mực chiên giòn ngon', 55000, '/uploads/muc_chien.jpg', true),
('Nem chua rán', 4, 'Nem chua rán giòn tan', 40000, '/uploads/nem_chua_ran.jpg', true),
('Mỳ cay cấp 5', 1, 'Mỳ cay cấp độ 5 siêu cay', 70000, '/uploads/my_cay_5.jpg', true),
('Soda chanh', 2, 'Soda chanh sảng khoái', 20000, '/uploads/soda_chanh.jpg', true),
('Nước ngọt', 2, 'Các loại nước ngọt', 15000, '/uploads/nuoc_ngot.jpg', true);

-- Thêm 1000 dòng vào bảng `orders`
INSERT INTO orders (table_id, status, payment_method, payment_status, payment_time)
SELECT 
  FLOOR(1 + RAND() * 10), 
  CASE FLOOR(1 + RAND() * 3) 
    WHEN 1 THEN 'pending' 
    WHEN 2 THEN 'completed' 
    ELSE 'cancelled' 
  END, 
  CASE FLOOR(1 + RAND() * 3) 
    WHEN 1 THEN 'Tiền mặt' 
    WHEN 2 THEN 'Thẻ tín dụng' 
    ELSE 'Trực tuyến' 
  END, 
  CASE FLOOR(1 + RAND() * 2) 
    WHEN 1 THEN 'unpaid' 
    ELSE 'paid' 
  END, 
  DATE_ADD(CURRENT_TIMESTAMP, INTERVAL -FLOOR(RAND() * 30) DAY)
FROM (SELECT 1 UNION ALL SELECT 1 UNION ALL SELECT 1 UNION ALL SELECT 1 UNION ALL SELECT 1) t1,
     (SELECT 1 UNION ALL SELECT 1 UNION ALL SELECT 1 UNION ALL SELECT 1 UNION ALL SELECT 1) t2;

-- Thêm 2000 dòng vào bảng `order_items` (cập nhật với `order_id` hợp lệ)
INSERT INTO order_items (food_id, order_id, quantity, note, price)
SELECT 
  FLOOR(1 + RAND() * 20), 
  (SELECT order_id FROM orders ORDER BY RAND() LIMIT 1), -- Lấy order_id hợp lệ từ bảng orders
  FLOOR(1 + RAND() * 5), 
  'Thêm cay', 
  ROUND(RAND() * (70000 - 15000) + 15000, 2)
FROM (SELECT 1 UNION ALL SELECT 1 UNION ALL SELECT 1 UNION ALL SELECT 1 UNION ALL SELECT 1) t1,
     (SELECT 1 UNION ALL SELECT 1 UNION ALL SELECT 1 UNION ALL SELECT 1 UNION ALL SELECT 1) t2
LIMIT 2000;

UPDATE orders
SET payment_method = 'cash', payment_status = 'paid'
WHERE order_id = 1;
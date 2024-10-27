USE siu_cay_quan_dev;

INSERT INTO users (username, password, name, role, created_at, updated_at) VALUES 
('duyvv', '12345678', 'Vu Viet Duy', 'admin', NOW(), NOW()),
('ngocvtm', '12345678', 'Vu Thi Minh Ngoc', 'admin', NOW(), NOW());


INSERT INTO tables (table_id, capacity, qr, status, is_active) VALUES 
(1,4,'qrcode','available', 1),
(2,4,'qrcode','available', 0),
(3,6,'qrcode','occupied', 1),
(4,6,'qrcode','occupied', 0);

INSERT INTO categories (name, description) VALUES
('Mỳ Cay', 'Món chính'),
('Đồ uống', NULL),
('Tráng miệng', NULL),
('Hoa quả', NULL);

INSERT INTO foods (name, description, price, image_url, category_id) VALUES 
('Mỳ cay hải sản','Best seller',30000,'/uploads/my_cay.jpeg', 1),
('Mỳ cay thập cẩm','Best seller',40000,'/uploads/my_cay.jpeg', 1),
('Mỳ cay bò','Best seller',35000,'/uploads/my_cay.jpeg', 1),
('Cocacola', NULL,10000,'/uploads/my_cay.jpeg', 2),
('Pessi', NULL,10000,'/uploads/my_cay.jpeg', 2);

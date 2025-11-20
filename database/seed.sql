-- Default Admin (password: password123)
INSERT INTO users (username, password_hash, role) VALUES 
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');

-- Sample Teams
INSERT INTO teams (name, coach, category) VALUES 
('Red Dragons', 'John Smith', 'Senior'),
('Blue Sharks', 'Sarah Connor', 'Junior'),
('Green Eagles', 'Mike Ross', 'Amateur');

-- Sample Members
INSERT INTO members (full_name, email, phone, address, join_date, team_id) VALUES 
('Alice Johnson', 'alice@example.com', '555-0101', '123 Main St', '2023-01-15', 1),
('Bob Williams', 'bob@example.com', '555-0102', '456 Oak Ave', '2023-02-20', 1),
('Charlie Brown', 'charlie@example.com', '555-0103', '789 Pine Rd', '2023-03-10', 2);

-- Sample Events
INSERT INTO events (event_name, event_date, location, type, description) VALUES 
('Summer Championship', '2024-06-15 09:00:00', 'City Stadium', 'Competition', 'Annual summer championship for all teams'),
('Charity Gala', '2024-07-01 18:00:00', 'Grand Hotel', 'Social', 'Fundraising event');

-- Sample Subscriptions
INSERT INTO subscriptions (member_id, amount, date, status, type) VALUES 
(1, 50.00, '2024-01-01', 'paid', 'monthly'),
(2, 50.00, '2024-01-01', 'paid', 'monthly'),
(3, 500.00, '2024-01-01', 'pending', 'annual');

-- 50 Sample Members (Arabic names, Algerian wilayas)
-- Use ON DUPLICATE KEY UPDATE so importing again won't fail on existing unique emails
INSERT INTO members (full_name, email, phone, address, join_date, team_id, photo) VALUES
('محمد قاسمي', 'member01@example.com', '0550000001', 'ولاية الجزائر', '2023-01-15', 1, NULL),
('أحمد بوعزة', 'member02@example.com', '0550000002', 'ولاية وهران', '2023-02-10', 2, NULL),
('علي عبيدي', 'member03@example.com', '0550000003', 'ولاية قسنطينة', '2023-03-05', 3, NULL),
('مصطفى بلماضي', 'member04@example.com', '0550000004', 'ولاية عنابة', '2023-04-12', 1, NULL),
('يوسف مرسي', 'member05@example.com', '0550000005', 'ولاية البليدة', '2023-05-20', 2, NULL),
('كريم شريف', 'member06@example.com', '0550000006', 'ولاية باتنة', '2023-06-18', 3, NULL),
('سمية بوطاهر', 'member07@example.com', '0550000007', 'ولاية تلمسان', '2023-07-22', 1, NULL),
('ليلى بن زيدان', 'member08@example.com', '0550000008', 'ولاية تيزي وزو', '2023-08-30', 2, NULL),
('فاطمة بن حسين', 'member09@example.com', '0550000009', 'ولاية سطيف', '2023-09-14', 3, NULL),
('زهراء بلقاسم', 'member10@example.com', '0550000010', 'ولاية بجاية', '2023-10-01', 1, NULL),
('أمين بدري', 'member11@example.com', '0550000011', 'ولاية جيجل', '2023-11-12', 2, NULL),
('رامي عقون', 'member12@example.com', '0550000012', 'ولاية بشار', '2024-01-05', 3, NULL),
('ناديا بوسعادة', 'member13@example.com', '0550000013', 'ولاية غرداية', '2024-02-14', 1, NULL),
('هدى دراجي', 'member14@example.com', '0550000014', 'ولاية أدرار', '2024-03-21', 2, NULL),
('سليم مسعود', 'member15@example.com', '0550000015', 'ولاية مستغانم', '2024-04-11', 3, NULL),
('نور الدين شنيتي', 'member16@example.com', '0550000016', 'ولاية سكيكدة', '2024-05-09', 1, NULL),
('ياسين بن يعيش', 'member17@example.com', '0550000017', 'ولاية تيبازة', '2024-06-17', 2, NULL),
('عبد الرحمن قورمي', 'member18@example.com', '0550000018', 'ولاية بومرداس', '2024-07-25', 3, NULL),
('سعدي مزالي', 'member19@example.com', '0550000019', 'ولاية الوادي', '2024-08-08', 1, NULL),
('حكيم سيفي', 'member20@example.com', '0550000020', 'ولاية المسيلة', '2024-09-02', 2, NULL),
('مريم بلحول', 'member21@example.com', '0550000021', 'ولاية الجزائر', '2024-09-18', 3, NULL),
('خولة مزروقي', 'member22@example.com', '0550000022', 'ولاية وهران', '2024-10-05', 1, NULL),
('جمال بن عيسى', 'member23@example.com', '0550000023', 'ولاية قسنطينة', '2024-10-20', 2, NULL),
('بشير مسدور', 'member24@example.com', '0550000024', 'ولاية عنابة', '2024-11-01', 3, NULL),
('ناصر زواوي', 'member25@example.com', '0550000025', 'ولاية البليدة', '2024-11-15', 1, NULL),
('رضوان قادة', 'member26@example.com', '0550000026', 'ولاية باتنة', '2024-12-02', 2, NULL),
('سامي غزالي', 'member27@example.com', '0550000027', 'ولاية تلمسان', '2025-01-08', 3, NULL),
('لطيفة رشيش', 'member28@example.com', '0550000028', 'ولاية تيزي وزو', '2025-02-11', 1, NULL),
('يسرا بودراع', 'member29@example.com', '0550000029', 'ولاية سطيف', '2025-03-07', 2, NULL),
('هشام رقيق', 'member30@example.com', '0550000030', 'ولاية بجاية', '2025-04-16', 3, NULL),
('فريد كريم', 'member31@example.com', '0550000031', 'ولاية جيجل', '2025-05-21', 1, NULL),
('هاجر سفيان', 'member32@example.com', '0550000032', 'ولاية بشار', '2025-06-30', 2, NULL),
('زياد بن حمو', 'member33@example.com', '0550000033', 'ولاية غرداية', '2025-07-12', 3, NULL),
('عائشة قاسمي', 'member34@example.com', '0550000034', 'ولاية أدرار', '2025-08-03', 1, NULL),
('عبد القادر دهون', 'member35@example.com', '0550000035', 'ولاية مستغانم', '2025-08-25', 2, NULL),
('نورية قرفي', 'member36@example.com', '0550000036', 'ولاية سكيكدة', '2025-09-09', 3, NULL),
('رفيق خضرة', 'member37@example.com', '0550000037', 'ولاية تيبازة', '2025-09-24', 1, NULL),
('سليمة بن عياد', 'member38@example.com', '0550000038', 'ولاية بومرداس', '2025-10-05', 2, NULL),
('نزار لكحل', 'member39@example.com', '0550000039', 'ولاية الوادي', '2025-10-18', 3, NULL),
('حمزة رابح', 'member40@example.com', '0550000040', 'ولاية المسيلة', '2025-10-29', 1, NULL),
('وفاء سليم', 'member41@example.com', '0550000041', 'ولاية الجزائر', '2025-11-01', NULL, NULL),
('طارق بن مخلوف', 'member42@example.com', '0550000042', 'ولاية وهران', '2025-11-02', NULL, NULL),
('إيمان بن يوسف', 'member43@example.com', '0550000043', 'ولاية قسنطينة', '2025-11-03', NULL, NULL),
('صابر لعراب', 'member44@example.com', '0550000044', 'ولاية عنابة', '2025-11-04', NULL, NULL),
('سامية طوبال', 'member45@example.com', '0550000045', 'ولاية البليدة', '2025-11-05', NULL, NULL),
('ريان شايب', 'member46@example.com', '0550000046', 'ولاية باتنة', '2025-11-06', NULL, NULL),
('نعيمة بن سالم', 'member47@example.com', '0550000047', 'ولاية تلمسان', '2025-11-07', NULL, NULL),
('فؤاد حمادي', 'member48@example.com', '0550000048', 'ولاية تيزي وزو', '2025-11-08', NULL, NULL),
('لطفي جبور', 'member49@example.com', '0550000049', 'ولاية سطيف', '2025-11-09', NULL, NULL),
('عبير مسواني', 'member50@example.com', '0550000050', 'ولاية بجاية', '2025-11-10', NULL, NULL)
ON DUPLICATE KEY UPDATE
	full_name = VALUES(full_name),
	phone = VALUES(phone),
	address = VALUES(address),
	join_date = VALUES(join_date),
	team_id = VALUES(team_id),
	photo = VALUES(photo);

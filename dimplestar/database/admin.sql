CREATE TABLE site_content (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    content_key VARCHAR(100) NOT NULL UNIQUE,
    content_value TEXT NOT NULL,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO site_content (content_key, content_value) VALUES
('about_hero_title', 'About Dimple Star Transport'),
('about_hero_subtitle', 'Your trusted transportation partner for decades'),
('history_title', 'Our History'),
('history_content_1', 'Photo taken on October 16, 1993. Napat Transit (now Dimple Star Transport) NVR-963 (fleet No 800) going to Alabang and jeepneys under the Light Rail Line in Taft Ave near United Nations Avenue, Ermita, Manila, Philippines.'),
('history_content_2', 'Year 2004 of May changes has been made, Napat Transit became Dimple Star Transport.'),
('mission_title', 'Our Mission'),
('mission_content', 'To provide superior transport service to Metro Manila and Mindoro Province commuters.'),
('vision_title', 'Our Vision'),
('vision_content', 'To lead the bus transport industry through its innovation service to the riding public.'),
('stats_years', '30+'),
('stats_years_text', 'Years of Service'),
('stats_buses', '50+'),
('stats_buses_text', 'Buses in Fleet'),
('stats_routes', '20+'),
('stats_routes_text', 'Routes Served'),
('stats_passengers', '1000+'),
('stats_passengers_text', 'Daily Passengers'),
('footer_text', 'Providing reliable and comfortable transportation services for over a decade.');
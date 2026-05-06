CREATE DATABASE IF NOT EXISTS campus_lost_found;
USE campus_lost_found;
CREATE TABLE IF NOT EXISTS items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(10) NOT NULL,
    category VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(100) NOT NULL,
    item_date DATE NOT NULL,
    contact_name VARCHAR(100) NOT NULL,
    contact_email VARCHAR(100) NOT NULL
);
INSERT INTO items (
        type,
        category,
        description,
        location,
        item_date,
        contact_name,
        contact_email
    )
VALUES (
        'lost',
        'Phone',
        'Black iPhone 13',
        'Library 2nd floor',
        '2026-05-04',
        'Paul',
        'paul@example.com'
    ),
    (
        'found',
        'Backpack',
        'Blue Jansport backpack',
        'Cafeteria',
        '2026-05-03',
        'Kevin',
        'kevin@example.com'
    );
-- RUN MO TO SA LOCALPHPMYADMIN SCRIPT

-- MySQL script for the Equipment

-- Create the database
CREATE DATABASE IF NOT EXISTS iTamReserve;

-- Use the created database
USE iTamReserve;

-- Create the equipment table
CREATE TABLE IF NOT EXISTS equipment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) UNIQUE,
    type VARCHAR(50),
    quantity INT,
    available_quantity INT
);

-- Initialize the equipment table with data
INSERT INTO equipment (name, type, quantity, available_quantity) VALUES
    ('Sound System', 'General', 20, 20),
    ('Speaker', 'General', 20, 20),
    ('HDMI cord', 'General', 20, 20),
    ('Mouse', 'General', 20, 20),
    ('Keyboard', 'General', 20, 20),
    ('HDMI Adapter', 'General', 20, 20),
    ('Extension Cord', 'General', 20, 20),
    ('Projector', 'General', 20, 20)
ON DUPLICATE KEY UPDATE
    quantity = VALUES(quantity),
    available_quantity = VALUES(available_quantity);


-- MYSQL script of the Events

CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(100),
    date_of_event DATE,
    start_of_event TIME,
    end_of_event TIME,
    number_of_participants INT DEFAULT 0
);

-- MYSQL script of the facility_reservation

CREATE TABLE IF NOT EXISTS facility_reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    department VARCHAR(100),
    email VARCHAR(100),
    contact_number VARCHAR(20),
    facility VARCHAR(50),
    reservation_date DATE,
    start_time TIME,
    end_time TIME,
    purpose VARCHAR(255),
    id_picture VARCHAR(255)
);

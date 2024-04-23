-- Create users table
CREATE TABLE
    users (
        user_id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        profile VARCHAR(100),
        dob DATE,
        status_active VARCHAR(50),
        user_level VARCHAR(50) DEFAULT 'user',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

ALTER TABLE `users` ADD `password` VARCHAR(255) NOT NULL COMMENT 'Hash password' AFTER `dob`;

-- Create event_tb table
CREATE TABLE
    event_tb (
        event_id INT AUTO_INCREMENT PRIMARY KEY,
        event_name VARCHAR(100) NOT NULL,
        date_event DATE NOT NULL,
        amount DECIMAL(10, 2) NOT NULL,
        devise VARCHAR(10) NOT NULL,
        user_id INT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users (user_id)
    );
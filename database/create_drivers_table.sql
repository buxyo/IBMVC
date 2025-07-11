CREATE TABLE drivers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    NAS VARCHAR(50) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    driver_id VARCHAR(50) NOT NULL,
    broker_id INT NOT NULL,
    added_by INT NOT NULL,
    status ENUM('active', 'inactive') DEFAULT 'active',
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_joined DATE NOT NULL
);

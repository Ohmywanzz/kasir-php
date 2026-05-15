CREATE DATABASE kasir_db;
USE kasir_db;

CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50),
password VARCHAR(50)
);
INSERT INTO users VALUES (NULL,'admin','123');

CREATE TABLE categories (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50)
);
INSERT INTO categories (name) VALUES ('Makanan'),('Minuman');

CREATE TABLE items (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
price INT,
stock INT,
barcode VARCHAR(50),
category_id INT,
image TEXT
);

CREATE TABLE transactions (
id INT AUTO_INCREMENT PRIMARY KEY,
total INT,
date DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE transaction_details (
id INT AUTO_INCREMENT PRIMARY KEY,
transaction_id INT,
item_id INT,
qty INT,
subtotal INT
);

CREATE DATABASE IF NOT EXISTS cart_system;
USE cart_system;


CREATE TABLE IF NOT EXISTS product (
  id int(11) NOT NULL AUTO_INCREMENT,
  product_name varchar(255) NOT NULL,
  product_price decimal(10,2) NOT NULL,
  product_image varchar(255) NOT NULL,
  product_code varchar(50) NOT NULL,
  product_qty int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (id)
);


CREATE TABLE IF NOT EXISTS cart (
  id int(11) NOT NULL AUTO_INCREMENT,
  product_name varchar(255) NOT NULL,
  product_price decimal(10,2) NOT NULL,
  product_image varchar(255) NOT NULL,
  qty int(11) NOT NULL,
  total_price decimal(10,2) NOT NULL,
  product_code varchar(50) NOT NULL,
  PRIMARY KEY (id)
);


CREATE TABLE IF NOT EXISTS orders (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  phone varchar(50) NOT NULL,
  address text NOT NULL,
  pmode varchar(50) NOT NULL,
  products text NOT NULL,
  amount_paid decimal(10,2) NOT NULL,
  order_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

INSERT INTO product (product_name, product_price, product_image, product_code, product_qty) VALUES
('iPhone 13', 999.00, 'https://placehold.co/600x400?text=iPhone+13', 'p1000', 10),
('Samsung Galaxy S22', 899.00, 'https://placehold.co/600x400?text=Samsung+S22', 'p1001', 8),
('Google Pixel 6', 799.00, 'https://placehold.co/600x400?text=Pixel+6', 'p1002', 5),
('Xiaomi Mi 11', 699.00, 'https://placehold.co/600x400?text=Mi+11', 'p1003', 12),
('OnePlus 10', 749.00, 'https://placehold.co/600x400?text=OnePlus+10', 'p1004', 7);
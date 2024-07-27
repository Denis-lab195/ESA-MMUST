CREATE DATABASE esa_mmust;

USE esa_mmust;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    reg_no VARCHAR(255) NOT NULL,
    UNIQUE(email),
    UNIQUE(reg_no)
);

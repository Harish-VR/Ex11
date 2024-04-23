CREATE DATABASE IF NOT EXISTS job_applications;

USE job_applications;

CREATE TABLE IF NOT EXISTS job_applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    cv VARCHAR(255) NOT NULL
);

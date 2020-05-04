-- noinspection SqlNoDataSourceInspectionForFile

CREATE DATABASE test
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;
USE test;

CREATE TABLE users
(
    id           INT AUTO_INCREMENT PRIMARY KEY,
    dt_reg       TIMESTAMP,
    user_name    VARCHAR(128) NOT NULL,
    password     CHAR(64)     NOT NULL,
);

CREATE TABLE categories
(
    id            INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(128) NOT NULL UNIQUE
);

CREATE TABLE position
(
    id             INT AUTO_INCREMENT PRIMARY KEY,
    position_name  VARCHAR(128),
    description    TEXT,
    img            VARCHAR(128),

    category_id    INT,
    FOREIGN KEY (category_id) REFERENCES categories (id)
);

//*
CREATE INDEX position_name ON position (position_name);
CREATE INDEX category_id ON position (category_id);

CREATE INDEX user_id ON bids (user_id);
CREATE INDEX lot_id ON bids (lot_id);
*//

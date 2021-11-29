
DROP DATABASE IF EXISTS bugme;
CREATE DATABASE bugme;
USE bugme;

-- Users

DROP TABLE IF EXISTS users;
CREATE TABLE users (
    id int unsigned not null auto_increment,
    firstname varchar(255) not null,
    lastname varchar(255) not null,
    password varchar(255) not null,
    email varchar(255) not null,
    date_joined datetime not null,
    primary key(id)
);

-- Add an initial user
INSERT INTO users (firstname, lastname, password, email, date_joined) VALUES('Admin', 'User', 'password123', 'admin@project2.com', SYSDATE());


-- Issues

DROP TABLE IF EXISTS issues;
CREATE TABLE issues (
    id int unsigned not null auto_increment,
    title varchar(255) not null,
    description text not null,
    type varchar(255) not null,
    priority varchar(255) not null,
    status varchar(255) not null,
    assigned_to int unsigned not null,
    created_by int unsigned not null,
    created datetime not null,
    updated datetime not null,
    primary key(id)
);
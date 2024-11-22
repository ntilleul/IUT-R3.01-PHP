-- Active: 1732265893086@@127.0.0.1@3306
CREATE DATABASE lacosina;

DROP TABLE recettes;
CREATE TABLE recettes(
    id SERIAL PRIMARY KEY,
    titre VARCHAR(100),
    description TEXT,
    auteur VARCHAR(100),
    date_creation DATETIME
);
-- ALTER TABLE recettes ADD COLUMN image VARCHAR(100); 
SELECT * FROM recettes;

DROP TABLE contact;
CREATE TABLE contact (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100),
    mail VARCHAR(100),
    description TEXT
);
SELECT * FROM contact;

DROP TABLE users;
CREATE TABLE users(
    id SERIAL PRIMARY KEY,
    identifiant VARCHAR(100),
    password VARCHAR(100),
    mail VARCHAR(100),
    create_time DATETIME,
    isAdmin TINYINT(1)
);
-- UPDATE users SET isAdmin = 1 WHERE identifiant = 'admin';
SELECT * FROM users;

DROP TABLE favoris;
CREATE TABLE favoris(
    id SERIAL PRIMARY KEY,
    recette_id INT,
    user_id INT,
    create_time DATETIME
);
SELECT * FROM favoris;





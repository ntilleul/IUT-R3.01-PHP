-- Active: 1732213705247@@127.0.0.1@3306@lacosina
CREATE DATABASE lacosina;

DROP TABLE recettes;
CREATE TABLE recettes(
    id SERIAL PRIMARY KEY,
    titre VARCHAR(100),
    description TEXT,
    auteur VARCHAR(100),
    date_creation DATETIME
)

SELECT * FROM recettes;


DROP TABLE IF EXISTS Auteurs;

CREATE TABLE Auteurs (
    idAuteur INT AUTO_INCREMENT PRIMARY KEY,
    auteur VARCHAR(50) NOT NULL
);

INSERT INTO Auteurs (auteur)
VALUES
('Pokémon Company'),
('Fan Creations');

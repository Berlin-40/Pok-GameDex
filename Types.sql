DROP TABLE IF EXISTS Types;

CREATE TABLE Types (
    idP INT NOT NULL,
    idType INT NOT NULL,
    PRIMARY KEY (idP, idType),
    FOREIGN KEY (idP) REFERENCES Jeux(idP) ON DELETE CASCADE,
    FOREIGN KEY (idType) REFERENCES Type(idType) ON DELETE CASCADE
);
INSERT INTO Types (idP, idType)
VALUES
(1, 2),  -- Pokémon Rouge -> Aventure
(1, 3),  -- Pokémon Rouge -> Combat
(2, 2),  -- Pokémon Uranium -> Aventure
(2, 4),  -- Pokémon Uranium -> Compétition
(3, 2);  -- Pokémon Épée -> Aventure

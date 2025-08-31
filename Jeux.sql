CREATE TABLE Jeux (
    idP INT AUTO_INCREMENT PRIMARY KEY,
    jeux VARCHAR(100) NOT NULL,
    idAuteur INT NOT NULL,
    idConsole INT NOT NULL,
    image VARCHAR(100),
    description TEXT NOT NULL,
    dateC DATE NOT NULL
);
INSERT INTO Jeux (jeux, idAuteur, idConsole, image, description, dateC)
VALUES
('Pokémon Rouge', 1, 5, 'rouge.jpg', 'Premier jeu Pokémon sorti sur Game Boy.', '1996-02-27'),
('Pokémon Uranium', 2, 1, 'uranium.jpg', 'Version non officielle de Pokémon créée par des fans.', '2016-08-06'),
('Pokémon Épée', 1, 2, 'epee.jpg', 'Jeu Pokémon officiel sur Nintendo Switch.', '2019-11-15');

DROP TABLE IF EXISTS Consoles;

CREATE TABLE Consoles (
    idConsole INT AUTO_INCREMENT PRIMARY KEY,
    console VARCHAR(50) NOT NULL
);

INSERT INTO Consoles (console)
VALUES
('PC'),
('Nintendo Switch'),
('3DS'),
('Nintendo DS'),
('Game Boy'),
('Game Boy Color'),
('Game Boy Advance'),
('Nintendo 64'),
('GameCube'),
('Wii U'),
('Wii'),
('Nintendo 3DS XL'),
('Mobile (iOS/Android)');

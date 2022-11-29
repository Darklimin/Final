USE project_ads;
-- Active: 1666769524085@@127.0.0.1@3306@project_ads
DELETE FROM games;

ALTER TABLE games AUTO_INCREMENT = 1;

INSERT INTO games (
    name,
    release_date,
    image,
    genre,
    developer,
    description
)
VALUES
('Vampire: The Masquerade – Bloodlines', '2004', '51KRPG1YWPL.jpg', 'Action role-playing', 'Troika Games', 'Vampire: The Masquerade – Bloodlines is a 2004 action role-playing video game developed by Troika Games and published by Activision for Microsoft Windows.'),
('Elden Ring', '2022', 'thumb-1920-1151249.jpg', 'Action role-playing game', 'FromSoftware Inc.', 'Elden Ring is a 2022 action role-playing game developed by FromSoftware and published by Bandai Namco Entertainment. It was directed by Hidetaka Miyazaki with worldbuilding provided by the fantasy writer George R. R. Martin.'),
('Half-Life 2', '2004', '252534-half-life-2-windows-front-cover.jpg', 'First-person shooter', 'Valve Corporation', 'Half-Life 2 is a 2004 first-person shooter game developed by Valve. It was published by Valve through its distribution service Steam. Like the original Half-Life, Half-Life 2 combines shooting, puzzles, and storytelling, and adds features such as vehicles and physics-based gameplay')
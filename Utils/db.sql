-- Structure de la table `UserTheme` pour stocker les thèmes disponibles
CREATE TABLE IF NOT EXISTS `UserTheme`
(
    `id`   INTEGER PRIMARY KEY AUTOINCREMENT,
    `name` TEXT NOT NULL -- Nom du thème
);

-- Insertion des thèmes disponibles
INSERT INTO `UserTheme` (`name`)
VALUES ('skin-blue'),   -- Thème Bleu
       ('skin-black'),  -- Thème Noir
       ('skin-purple'), -- Thème Violet
       ('skin-green'),  -- Thème Vert
       ('skin-red'),    -- Thème Rouge
       ('skin-yellow') -- Thème Jaune
;

-- Structure de la table `User` pour stocker les utilisateurs avec leur thème choisi
CREATE TABLE IF NOT EXISTS `User`
(
    `id`        INTEGER PRIMARY KEY AUTOINCREMENT,
    `firstname` TEXT    NOT NULL,                         -- Prénom de l'utilisateur
    `lastname`  TEXT    NOT NULL,                         -- Nom de famille de l'utilisateur
    `pseudo`    TEXT             DEFAULT NULL,            -- Pseudo de l'utilisateur
    `email`     TEXT    NOT NULL,                         -- Adresse e-mail de l'utilisateur
    `password`  TEXT    NOT NULL,                         -- Mot de passe de l'utilisateur
    `themeID`   INTEGER NOT NULL DEFAULT 1,               -- Clé étrangère référençant userTheme.id
    FOREIGN KEY (`themeID`) REFERENCES `UserTheme` (`id`) -- Contrainte de clé étrangère
);

-- Structure de la table `ColorPalette` pour stocker les valeurs hexadécimales des couleurs
CREATE TABLE IF NOT EXISTS `ColorPalette`
(
    `id`        INTEGER PRIMARY KEY AUTOINCREMENT,
    `name`      TEXT NOT NULL, -- Nom de la couleur
    `hexValue` TEXT NOT NULL  -- Valeur hexadécimale de la couleur
);

-- Insertion des valeurs hexadécimales des couleurs
INSERT INTO `ColorPalette` (`name`, `hexValue`)
VALUES ('red', '#dd4b39'),        -- Rouge
       ('yellow', '#f39c12'),     -- Jaune
       ('aqua', '#00c0ef'),       -- Bleu clair
       ('blue', '#0073b7'),       -- Bleu
       ('black', '#111111'),      -- Noir
       ('light-blue', '#3c8dbc'), -- Bleu clair
       ('green', '#00a65a'),      -- Vert
       ('gray', '#d2d6de'),       -- Gris
       ('navy', '#001f3f'),       -- Bleu marine
       ('teal', '#39cccc'),       -- Sarcelle
       ('olive', '#3d9970'),      -- Olive
       ('lime', '#01ff70'),       -- Citron vert
       ('orange', '#ff851b'),     -- Orange
       ('fuchsia', '#f012be'),    -- Fuchsia
       ('purple', '#605ca8'),     -- Violet
       ('maroon', '#d81b60')      -- Bordeaux
;

-- Structure de la table `Calendar` pour stocker les calendriers avec leur couleur associée
CREATE TABLE IF NOT EXISTS `Calendar`
(
    `id`      INTEGER PRIMARY KEY AUTOINCREMENT,
    `name`    TEXT    NOT NULL DEFAULT 'undefined',          -- Nom du calendrier
    `url`     TEXT    NOT NULL,                              -- URL du calendrier
    `colorID` INTEGER NOT NULL,                              -- Clé étrangère référençant colorPalette.id
    FOREIGN KEY (`colorID`) REFERENCES `ColorPalette` (`id`) -- Contrainte de clé étrangère
);

-- Table structure for table `userCalendar`
CREATE TABLE IF NOT EXISTS `UserCalendar`
(
    `userID`     INTEGER,
    `calendarID` INTEGER,
    PRIMARY KEY (`userID`, `calendarID`),
    FOREIGN KEY (`userID`) REFERENCES `User` (`id`),
    FOREIGN KEY (`calendarID`) REFERENCES `Calendar` (`id`)
);

-- Structure de la table `Event` pour stocker les événements avec leur couleur et leur calendrier associés
CREATE TABLE IF NOT EXISTS `Event`
(
    `id`          INTEGER PRIMARY KEY AUTOINCREMENT,
    `startDate`   DATE    NOT NULL DEFAULT '0000-00-00',      -- Date de début de l'événement
    `startTime`   TIME    NOT NULL DEFAULT '00:00:00',        -- Heure de début de l'événement
    `endDate`     DATE    NOT NULL DEFAULT '0000-00-00',      -- Date de fin de l'événement
    `endTime`     TIME    NOT NULL DEFAULT '00:00:00',        -- Heure de fin de l'événement
    `title`       TEXT    NOT NULL DEFAULT '',                -- Titre de l'événement
    `location`    TEXT             DEFAULT NULL,              -- Lieu de l'événement
    `description` TEXT,                                       -- Description de l'événement
    `colorID`     INTEGER NOT NULL,                           -- Clé étrangère référençant colorPalette.id
    `calendarID`  INTEGER NOT NULL,                           -- Clé étrangère référençant calendar.id
    FOREIGN KEY (`colorID`) REFERENCES `ColorPalette` (`id`), -- Contrainte de clé étrangère
    FOREIGN KEY (`calendarID`) REFERENCES `Calendar` (`id`),  -- Contrainte de clé étrangère
    UNIQUE (`id`)                                             -- Contrainte d'unicité
);

-- Structure de la table `UserEvent` pour stocker les relations entre les utilisateurs et les événements
CREATE TABLE IF NOT EXISTS `UserEvent`
(
    `UserID`  INTEGER,                                -- ID de l'utilisateur
    `EventID` INTEGER,                                -- ID de l'événement
    PRIMARY KEY (`UserID`, `EventID`),                -- Clé primaire composée des ID utilisateur et événement
    FOREIGN KEY (`UserID`) REFERENCES `User` (`id`),  -- Contrainte de clé étrangère faisant référence à l'ID de l'utilisateur
    FOREIGN KEY (`EventID`) REFERENCES `Event` (`id`) -- Contrainte de clé étrangère faisant référence à l'ID de l'événement
);


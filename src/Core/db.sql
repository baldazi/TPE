-- Table structure for table `User`
CREATE TABLE IF NOT EXISTS `User` (
    `id` INTEGER PRIMARY KEY AUTOINCREMENT,
    `pseudo` TEXT NOT NULL,
    `email` TEXT NOT NULL,
    `password` TEXT NOT NULL
);

-- Table structure for table `Calendar`
CREATE TABLE IF NOT EXISTS `Calendar` (
    `id` INTEGER PRIMARY KEY AUTOINCREMENT,
    `name` TEXT NOT NULL DEFAULT 'undefined',
    `UserID` INTEGER,  -- Foreign key referencing User.id
    `Url` TEXT NOT NULL,
    FOREIGN KEY (`UserID`) REFERENCES `User`(`id`)
);

-- Table structure for table `Event`
CREATE TABLE IF NOT EXISTS `Event` (
    `ID` INTEGER PRIMARY KEY AUTOINCREMENT,
    `StartDate` DATE NOT NULL DEFAULT '0000-00-00',
    `StartTime` TIME NOT NULL DEFAULT '00:00:00',
    `EndDate` DATE NOT NULL DEFAULT '0000-00-00',
    `EndTime` TIME NOT NULL DEFAULT '00:00:00',
    `Title` TEXT NOT NULL DEFAULT '',
    `Location` TEXT DEFAULT NULL,
    `Description` TEXT,
    `UserID` INTEGER,  -- Foreign key
    `CalendarID` INTEGER,  -- Foreign key referencing Calendar.id
    FOREIGN KEY (`UserID`) REFERENCES `User`(`id`),
    FOREIGN KEY (`CalendarID`) REFERENCES `Calendar`(`id`),
    UNIQUE (`ID`)
);

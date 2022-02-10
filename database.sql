DROP DATABASE IF EXISTS `Kebab_Van_Erhan`;
CREATE DATABASE IF NOT EXISTS `Kebab_Van_Erhan`;

USE `Kebab_Van_Erhan`;

CREATE TABLE IF NOT EXISTS `location` (
    Id INT NOT NULL AUTO_INCREMENT,
    Day CHAR(9) NOT NULL,
    Place VARCHAR(28) NOT NULL,
    Name VARCHAR(50) NOT NULL,
    TimeStart TIME NOT NULL,
    TimeEnd TIME NOT NULL,

    CONSTRAINT PK_location PRIMARY KEY (Id)
);

CREATE TABLE IF NOT EXISTS `account` (
    Id INT NOT NULL AUTO_INCREMENT,
    User VARCHAR(100),
    FullName VARCHAR(750) NOT NULL,
    Mail VARCHAR(320) NOT NULL,
    Password VARCHAR(255) NOT NULL,

    CONSTRAINT PK_account PRIMARY KEY (Id),
    CONSTRAINT UQ_user UNIQUE (User)
);

CREATE TABLE IF NOT EXISTS `type` (
    Id INT NOT NULL AUTO_INCREMENT,
    Type VARCHAR(100) NOT NULL,

    CONSTRAINT PK_type PRIMARY KEY (Id)
);

CREATE TABLE IF NOT EXISTS `menu` (
    Id INT NOT NULL AUTO_INCREMENT,
    Name VARCHAR(100) NOT NULL,
    TypeId INT NOT NULL,
    PriceRegular DOUBLE(4,2),
    PriceKalf DOUBLE(4,2),
    PriceKip DOUBLE(4,2),
    PriceMix DOUBLE(4,2),

    CONSTRAINT PK_menu PRIMARY KEY (Id),
    CONSTRAINT FK_type FOREIGN KEY (TypeId) REFERENCES `type`(Id) ON UPDATE CASCADE ON DELETE CASCADE
);

INSERT INTO `type` (Id, Type) VALUES
    (1, "BROODJES"),
    (2, "SCHOTEL"),
    (3, "TURKSE PIZZA / LAHMACUN"),
    (4, "TOSTI'S (incl. salade en saus) / SNACKS"),
    (5, "FRISDRANKEN / EXTRA'S");

INSERT INTO `menu` (Name, TypeId, PriceRegular, PriceKalf, PriceKip, PriceMix) VALUES 
    ("Broodje döner", 1, null, 5.99, 5.99, 6.49),
    ("Broodje döner super", 1, null, 7.99, 7.99, 8.49),
    ("DönerBox Klein", 1, null, 4.99, 4.99, 5.49),
    ("DönerBox Groot", 1, null, 5.99, 5.99, 6.49),
    ("Döner 1 Kilo", 1, null, 22.00, 22.00, 22.00),
    ("Dürüm / Wrap döner", 1, null, 5.99, 5.00, 6.49),
    ("Döner schotel", 2, null, 9.99, 9.99, 10.99),
    ("Lahmacun", 3, 3.49, null, null, null),
    ("Lahmacun met salade + saus", 3, 4.49, null, null, null),
    ("Lahmacun met döner", 3, 7.49, null, null, null),
    ("Lahmacun 5 stuks verpakt", 3, 14.99, null, null, null),
    ("Tosti (Turks brood)", 4, 3.99, null, null, null),
    ("Tosti XL (Turks brood)", 4, 4.99, null, null, null),
    ("Tosti XL (Turks brood) + döner", 4, 6.49, null, null, null),
    ("Aardappelschijfjes Klein + saus", 4, 3.99, null, null, null),
    ("Aardappelschijfjes Groot + saus", 4, 4.99, null, null, null),
    ("Frisdrank", 5, 1.99, null, null, null),
    ("Red Bull", 5, 2.49, null, null, null),
    ("Broodje", 5, 1.00, null, null, null),
    ("Extra kaas", 5, 1.00, null, null, null),
    ("Bakje groente", 5, 1.00, null, null, null),
    ("Bakje saus", 5, 0.50, null, null, null),
    ("Plastic tasje", 5, 0.01, null, null, null);

INSERT INTO `location` (Day, Place, Name, TimeStart, TimeEnd) VALUES 
    ('Tuesday', 'Vroomshoop', 'De Koele', '11:00:00', '18:00:00'),
    ('Wednesday', 'Holten', 'Kalfstermansweide', '11:00:00', '18:00:00'),
    ('Thursday', 'Enter', 'Dorpsplein', '11:00:00', '18:00:00'),
    ('Friday', 'Goor', 'Weversplein', '11:00:00', '19:00:00'),
    ('Saturday', 'Almelo', 'Marktplein', '09:00:00', '17:00:00');
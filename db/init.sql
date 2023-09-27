CREATE DATABASE fumo;

GRANT ALL PRIVILEGES ON fumo.* TO 'user'@'%' WITH GRANT OPTION;

USE fumo;

CREATE TABLE fumos (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(20),
    cost DECIMAL,
    PRIMARY KEY (id)
);

INSERT INTO fumos (name, cost) VALUES ('Marisa Kirisame', 4000);
INSERT INTO fumos (name, cost) VALUES ('Reimu Hakurei', 4200);
INSERT INTO fumos (name, cost) VALUES ('Keine Kamishirasawa', 3000);
INSERT INTO fumos (name, cost) VALUES ('Utsuho Reiuji', 3500);
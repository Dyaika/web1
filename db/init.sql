CREATE DATABASE fumo;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON fumo.* TO 'user'@'%' WITH GRANT OPTION;

USE fumo;

CREATE TABLE fumos (
    fumo_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(60),
    cost DECIMAL,
    PRIMARY KEY (fumo_id)
);

INSERT INTO fumos (name, cost) VALUES ('Marisa Kirisame', 4000);
INSERT INTO fumos (name, cost) VALUES ('Reimu Hakurei', 4200);
INSERT INTO fumos (name, cost) VALUES ('Keine Kamishirasawa', 3000);
INSERT INTO fumos (name, cost) VALUES ('Utsuho Reiuji', 3500);

CREATE TABLE shops (
    shop_id INT NOT NULL AUTO_INCREMENT,
    address VARCHAR(160),
    opening_time TIME,
    closing_time TIME,
    PRIMARY KEY (shop_id)
);

INSERT INTO shops (address, opening_time, closing_time) VALUES ('Москва, ул. Примерная, д. 1', '09:00:00', '20:00:00');
INSERT INTO shops (address, opening_time, closing_time) VALUES ('Волгоград, ул. Тестовая, д. 2', '10:00:00', '19:00:00');
INSERT INTO shops (address, opening_time, closing_time) VALUES ('Астана, ул. Проверочная, д. 3', '08:30:00', '18:30:00');
INSERT INTO shops (address, opening_time, closing_time) VALUES ('Бухен, ул. Пробная, д. 4', '09:30:00', '21:00:00');

CREATE TABLE fumo_shop_association (
    fumo_id INT,
    shop_id INT,
    quantity INT,
    FOREIGN KEY (fumo_id) REFERENCES fumos(fumo_id),
    FOREIGN KEY (shop_id) REFERENCES shops(shop_id),
    PRIMARY KEY (fumo_id, shop_id)
);

INSERT INTO fumo_shop_association (fumo_id, shop_id, quantity) VALUES (1, 1, 10);
INSERT INTO fumo_shop_association (fumo_id, shop_id, quantity) VALUES (2, 1, 15);
INSERT INTO fumo_shop_association (fumo_id, shop_id, quantity) VALUES (4, 1, 8);
INSERT INTO fumo_shop_association (fumo_id, shop_id, quantity) VALUES (2, 2, 15);
INSERT INTO fumo_shop_association (fumo_id, shop_id, quantity) VALUES (3, 2, 16);
INSERT INTO fumo_shop_association (fumo_id, shop_id, quantity) VALUES (4, 2, 13);
INSERT INTO fumo_shop_association (fumo_id, shop_id, quantity) VALUES (1, 3, 90);
INSERT INTO fumo_shop_association (fumo_id, shop_id, quantity) VALUES (3, 3, 8);
INSERT INTO fumo_shop_association (fumo_id, shop_id, quantity) VALUES (3, 4, 17);
INSERT INTO fumo_shop_association (fumo_id, shop_id, quantity) VALUES (4, 4, 12);
CREATE TABLE products_db
(
id int(11) NOT NULL AUTO_INCREMENT,
name  varchar(100) NOT NULL,
type  varchar(100) NOT NULL,
email varchar(100) NOT NULL,
PRIMARY KEY(id)
);

insert into products_db(name, type, email)
VALUES
('ad1', 'Book', 'asd@asd.com'),
('ad2', 'Book', 'asd@asd.com'),
('ad3', 'Book', 'asd@asd.com'),
('ad4', 'CD',   'asd@asd.com');

ALTER TABLE products_db ADD email varchar(100) NOT NULL;

ALTER TABLE products_db ADD email varchar(100) NOT NULL;

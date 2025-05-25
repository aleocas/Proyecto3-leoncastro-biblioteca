DROP DATABASE IF EXISTS proyecto3_biblioteca;
CREATE DATABASE proyecto3_biblioteca;
USE proyecto3_biblioteca;

CREATE TABLE Usuarios (
	id INT AUTO_INCREMENT,
	nombre VARCHAR (50) NOT NULL,
	correoe VARCHAR (50) NOT NULL UNIQUE,
	contrasena VARCHAR (200) NOT NULL,
	rol VARCHAR (32) NOT NULL,
	CONSTRAINT PK_Usuarios PRIMARY KEY (id)
);

CREATE TABLE Autores (
	id INT AUTO_INCREMENT,
	nombre VARCHAR (50) NOT NULL,
	CONSTRAINT PK_Autores PRIMARY KEY (id)
);

CREATE TABLE Libros (
	id INT AUTO_INCREMENT,
	titulo VARCHAR (200) NOT NULL,
	copias INT NOT NULL,
	stock INT NOT NULL,
	foto VARCHAR (100) NOT NULL,
	id_autor INT,
	CONSTRAINT PK_Libros PRIMARY KEY (id),
	CONSTRAINT FK_Autores FOREIGN KEY (id_autor) REFERENCES Autores (id) ON DELETE SET NULL ON UPDATE CASCADE
);

CREATE TABLE Prestamos (
	id INT AUTO_INCREMENT,
	id_libro INT,
	id_usuario INT,
	cantidad INT NOT NULL,
	fecha_inicio DATE NOT NULL,
	fecha_fin DATE NOT NULL,
	estado VARCHAR (30) NOT NULL,
	CONSTRAINT PK_Prestamos PRIMARY KEY (id),
	CONSTRAINT FK_Libro FOREIGN KEY (id_libro) REFERENCES Libros (id) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT FK_Usuario FOREIGN KEY (id_usuario) REFERENCES Usuarios (id) ON DELETE CASCADE ON UPDATE CASCADE
);
INSERT INTO Autores (nombre) VALUES 
('Gabriel García Márquez'),
('J.K. Rowling'),
('George Orwell'),
('Jane Austen'),
('Miguel de Cervantes'),
('Ernest Hemingway'),
('Mark Twain'),
('Leo Tolstoy'),
('F. Scott Fitzgerald'),
('Virginia Woolf');

INSERT INTO Libros (titulo, copias, stock, foto, id_autor) VALUES 
('Cien años de soledad', 10, 10, '../img/cien_anos_de_soledad.png', 1),
('El amor en los tiempos del cólera', 9, 9, '../img/el_amor_en_los_tiempos_del_colera.png', 1),
('Harry Potter y la piedra filosofal', 15, 15, '../img/harry_potter_piedra_filosofal.png', 2),
('Harry Potter y la cámara secreta', 14, 14, '../img/harry_potter_camara_secreta.png', 2),
('1984', 8, 8, '../img/1984.png', 3),
('Rebelión en la granja', 10, 10, '../img/rebelion_en_la_granja.png', 3),
('Orgullo y prejuicio', 12, 12, '../img/orgullo_y_prejuicio.png', 4),
('Sentido y sensibilidad', 11, 11, '../img/sentido_y_sensibilidad.png', 4),
('Don Quijote de la Mancha', 7, 7, '../img/don_quijote_de_la_mancha.png', 5),
('El viejo y el mar', 10, 10, '../img/el_viejo_y_el_mar.png', 6),
('Por quién doblan las campanas', 9, 9, '../img/por_quien_doblan_las_campanas.png', 6),
('Las aventuras de Tom Sawyer', 10, 10, '../img/las_aventuras_de_tom_sawyer.png', 7),
('Las aventuras de Huckleberry Finn', 8, 8, '../img/las_aventuras_de_huckleberry_finn.png', 7),
('Guerra y paz', 7, 7, '../img/guerra_y_paz.png', 8),
('Anna Karénina', 6, 6, '../img/anna_karenina.png', 8),
('El gran Gatsby', 10, 10, '../img/el_gran_gatsby.png', 9),
('La señora Dalloway', 9, 9, '../img/la_senora_dalloway.png', 10),
('Al faro', 8, 8, '../img/al_faro.png', 10);

INSERT INTO Usuarios (nombre, correoe, contrasena, rol) VALUES
('alex','alex','$2y$10$YYGa3qFFKkQnyvw9mt7uzuYJmGMRRLdzQWs/dY48qZg8VJZFxWNFC','admin'), --Contraseña admin098
('dani','dani','$2y$10$QXgeCoFopoNxtkvFu40MuO4XAeruZhHM0jEQ.pkCELuaoDnMOxzsC','cliente'); --Contraseña hola
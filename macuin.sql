-- DROP DATABASE IF EXISTS macuin;
/*
CREATE DATABASE macuin
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'C'
    LC_CTYPE = 'C'
    LOCALE_PROVIDER = 'libc'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1
    IS_TEMPLATE = False;
*/
/*
	CREATE TABLE Usuario (
		ID_Usuario SERIAL PRIMARY KEY,
		Nombre VARCHAR(100),
		Rol VARCHAR(50)
	);

	CREATE TABLE Departamento (
		ID_Departamento SERIAL PRIMARY KEY,
		Nombre_Departamento VARCHAR(100)
	);

	CREATE TABLE Ticket (
		ID_Ticket SERIAL PRIMARY KEY,
		ID_Usuario INT REFERENCES Usuario(ID_Usuario),
		ID_Auxiliar INT,
		ID_Departamento INT REFERENCES Departamento(ID_Departamento),
		Fecha DATE,
		Clasificacion VARCHAR(100),
		Detalles TEXT,
		Estatus VARCHAR(50)
	);
*/
/*
INSERT INTO Usuario (Nombre, Rol) VALUES
    ('Fernando', 'Cliente'),
    ('Joaquin', 'Jefe soporte'),
    ('David', 'Auxiliar soporte');


INSERT INTO Departamento (Nombre_Departamento) VALUES
    ('Compras'),
    ('Ventas'),
    ('Contabilidad'),
    ('Logística'),
    ('Producción');
*/








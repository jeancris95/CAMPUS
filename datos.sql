/* creacion del usuario */
CREATE DATABASE alumnos;
/* esta es la tabla donde secretaria va a guardar los datos de los alumnos registrados */
use alumnos;
CREATE TABLE IF NOT EXISTS alumnos.registros;
/* tabla registro de los alumnos que se almacenaran para que sean recogidos por el administrador */
create table alumnos(
    nombre varchar(100),
    apellido varchar(100),
    usuario varchar(100),
    dni varchar(100),
    correo varchar(100),
    telefono int,
    curso varchar(100),
    anio int,
    alta varchar(100) default 'NO',
    password varchar(200),/* password hasheada */
    fecha_registro date,
    PRIMARY KEY(dni,correo)
    
);
alter table alumnos add fecha date;
/* creacion tabla profesores */
create table profesores(
id int NOT NULL AUTO_INCREMENT,
nombre varchar(20) DEFAULT NULL,
apellido varchar(20)DEFAULT NULL,
curso_imparte varchar(20) DEFAULT NULL,
asignatura varchar(20) DEFAULT NULL,
correo varchar(100) DEFAULT NULL,
password varchar(200) DEFAULT NULL,
usuario varchar(200) default null,
PRIMARY KEY(id)
);
alter table profesores add usuario varchar(100),


create Table Usuarios (
	usuario varchar(100),
	password varchar(200),
	rol varchar(200),
	PRIMARY KEY (usuario)
)


CREATE TABLE `usuarios` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `rol` varchar(100) not null,
  `last_seen` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`);
  ALTER TABLE `usuarios`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
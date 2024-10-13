CREATE TABLE `invernadero` (
  `id_invernadero` int auto_increment primary key,
  `invernadero` varchar(50) NOT NULL,
  `latitud` varchar(20) NOT NULL,
  `longitud` varchar(20) NOT NULL,
  `area` decimal(8,2) NOT NULL,
  `fecha_creacion` date NOT NULL
);

CREATE TABLE `seccion` (
  `id_seccion` int(11) NOT NULL,
  `seccion` varchar(50) NOT NULL,
  `area` decimal(8,2) NOT NULL,
  `id_invernadero` integer REFERENCES invernadero(id_invernadero) NOT NULL
);

CREATE TABLE usuario(
    id_usuario INT AUTO_INCREMENT PRIMARY KEY, 
    contrasena VARCHAR(32), 
    correo VARCHAR(100) NOT NULL UNIQUE
);

INSERT INTO `usuario` (`correo`, `contrasena`) VALUES
('21031178@itcelaya.edu.mx', '202cb962ac59075b964b07152d234b70'),
('luislao@itcelaya.edu.mx', 'd16fb36f0911f878998c136191af705e'),
('l21031178@celaya.tecnm.mx', '900150983cd24fb0d6963f7d28e17f72');

CREATE TABLE permiso(
    id_permiso INT AUTO_INCREMENT PRIMARY KEY, 
    permiso VARCHAR(30) NOT NULL
);

INSERT INTO `permiso` (`permiso`) VALUES
('index'),
('Ver invernaderos'),
('Nuevo invernadero'),
('Modificar invernadero'),
('Eliminar invernadero'),
('Agregar un usuario'),
('Modificar un usuario'),
('Eliminar un usuario');

CREATE TABLE rol(
    id_rol INT AUTO_INCREMENT PRIMARY KEY, 
    rol VARCHAR(30) NOT NULL
);
insert into rol(rol) values('usuario'), ('cliente'), ('agricultor'), ('administrador');

CREATE TABLE rol_permiso(
    id_rol INT NOT NULL, 
    id_permiso INT NOT NULL, 
    PRIMARY KEY (id_rol, id_permiso), 
    FOREIGN KEY (id_rol) REFERENCES rol(id_rol), 
    FOREIGN KEY (id_permiso) REFERENCES permiso(id_permiso)
);

/*usuario*/
INSERT into rol_permiso(id_rol, id_permiso) values(1, 1);
/*cliente*/
INSERT into rol_permiso(id_rol, id_permiso) values(2, 1);
/*agricultor*/
INSERT into rol_permiso(id_rol, id_permiso) values(3, 1), (3, 2), (3, 3), (3, 4), (3, 5);
/*administrador*/
INSERT into rol_permiso(id_rol, id_permiso) values(4, 1), (4, 2), (4, 3), (4, 4), (4, 5), (4, 6), (4, 7), (4, 8);

CREATE TABLE usuario_rol(
    id_usuario INT NOT NULL, 
    id_rol INT NOT NULL, 
    PRIMARY KEY (id_usuario, id_rol), 
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario), 
    FOREIGN KEY (id_rol) REFERENCES rol(id_rol)
);

/*('21031178@itcelaya.edu.mx', '202cb962ac59075b964b07152d234b70'),*/
insert into usuario_rol(id_rol, id_usuario) VALUES(1, 1);
insert into usuario_rol(id_rol, id_usuario) VALUES(2, 1);

/*('luislao@itcelaya.edu.mx', 'd16fb36f0911f878998c136191af705e'),*/
insert into usuario_rol(id_rol, id_usuario) VALUES(4, 2);

/*('l21031178@celaya.tecnm.mx', '900150983cd24fb0d6963f7d28e17f72');*/
insert into usuario_rol(id_rol, id_usuario) VALUES(3, 3);
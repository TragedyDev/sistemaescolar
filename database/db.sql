CREATE TABLE roles (

  id_rol        INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre_rol    VARCHAR (255) NOT NULL UNIQUE KEY,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11)


)ENGINE=InnoDB;
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES  ('ADMINISTRADOR','2024-01-03 16:20:20','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES  ('DIRECTOR ACADÉMICO','2024-01-03 16:20:20','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES  ('DIRECTOR ADMINISTRATIVO','2024-01-03 16:20:20','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES  ('CONTADOR','2024-01-03 16:20:20','1');
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES  ('SECRETARIA','2024-01-03 16:20:20','1');

CREATE TABLE usuarios (

  id_usuario INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombres    VARCHAR (255) NOT NULL,
  rol_id     INT (11) NOT NULL,
  email      VARCHAR (255) NOT NULL UNIQUE KEY,
  password   TEXT NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (rol_id) REFERENCES roles (id_rol) on delete no action on update cascade


)ENGINE=InnoDB;
INSERT INTO usuarios (nombres,rol_id,email,password,fyh_creacion,estado)
VALUES ('Freddy Hilari Michua','1','admin@admin.com','$2y$10$0tYmdHU9uGCIxY1f90W1EuIm54NQ8axowkxL1WzLbqO2LdNa8m3l2','2023-12-28 20:29:10','1');




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
INSERT INTO roles (nombre_rol,fyh_creacion,estado) VALUES  ('DOCENTE','2024-01-03 16:20:20','1');

CREATE TABLE usuarios (

  id_usuario INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  rol_id     INT (11) NOT NULL,
  email      VARCHAR (255) NOT NULL UNIQUE KEY,
  password   TEXT NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (rol_id) REFERENCES roles (id_rol) on delete no action on update cascade


)ENGINE=InnoDB;
INSERT INTO usuarios (rol_id,email,password,fyh_creacion,estado)
VALUES ('1','admin@admin.com','$2y$10$0tYmdHU9uGCIxY1f90W1EuIm54NQ8axowkxL1WzLbqO2LdNa8m3l2','2025-04-14 20:29:10','1');

CREATE TABLE personas (

  id_persona      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  usuario_id             INT (11) NOT NULL,
  nombres            VARCHAR (50) NOT NULL,
  apellidos          VARCHAR (50) NOT NULL,
  ci                 VARCHAR (20) NOT NULL,
  fecha_nacimiento   VARCHAR (20) NOT NULL,
  profesion          VARCHAR (50) NOT NULL,
  direccion          VARCHAR (255) NOT NULL,
  celular            VARCHAR (20) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (usuario_id) REFERENCES usuarios (id_usuario) on delete no action on update cascade

)ENGINE=InnoDB;

INSERT INTO personas (usuario_id,nombres,apellidos,ci,fecha_nacimiento,profesion,direccion,celular,fyh_creacion,estado)
VALUES ('1','Yolimar Karina','Peña Garcia','12177711','03/02/1975','Directora','Calle Duvisi','04267002501','2025-04-22 20:29:10','1');

CREATE TABLE administrativos (

  id_administrativo      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  persona_id             INT (11) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (persona_id) REFERENCES personas (id_persona) on delete no action on update cascade

)ENGINE=InnoDB;

CREATE TABLE docentes (

  id_docente             INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  persona_id             INT (11) NOT NULL,
  especialidad           VARCHAR (255) NOT NULL,
  antiguedad             VARCHAR (255) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (persona_id) REFERENCES personas (id_persona) on delete no action on update cascade

)ENGINE=InnoDB;

CREATE TABLE estudiantes (
    id_estudiante INT PRIMARY KEY AUTO_INCREMENT,
    apellidos VARCHAR(100) NOT NULL,
    nombres VARCHAR(100) NOT NULL,
    cedula_escolar VARCHAR(20) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    lugar_nacimiento VARCHAR(100),
    estado VARCHAR(50),
    edad INT,
    sexo CHAR(1),
    talla_camisa VARCHAR(10),
    talla_pantalon VARCHAR(10),
    talla_zapatos VARCHAR(10),
    peso DECIMAL(5,2),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado_registro VARCHAR(11),
    
    persona_id  INT (11) NOT NULL,
    nivel_id    INT (11) NOT NULL,
    grado_id    INT (11) NOT NULL,
    
    FOREIGN KEY (persona_id) REFERENCES personas (id_persona) ON DELETE NO ACTION ON UPDATE CASCADE,
    FOREIGN KEY (nivel_id) REFERENCES niveles (id_nivel) ON DELETE NO ACTION ON UPDATE CASCADE,
    FOREIGN KEY (grado_id) REFERENCES grados (id_grado) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE representantes (
    id_representante INT PRIMARY KEY AUTO_INCREMENT,
    id_estudiante INT NOT NULL,

    apellidos_nombres_madre VARCHAR(200),
    apellidos_nombres_padre VARCHAR(200),
    ci VARCHAR(20) NOT NULL,
    parentesco VARCHAR(50) NOT NULL,
    fecha_nacimiento DATE,
    ocupacion VARCHAR(100),

    lugar_trabajo VARCHAR(200),
    direccion_trabajo TEXT,

    celular VARCHAR(20),
    correo VARCHAR(100),
    direccion TEXT,

    numero_hijos INT DEFAULT 1,
    numero_hijos_estudiando INT DEFAULT 1,
    numero_hijos_estudiando_plantel INT DEFAULT 1,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR(11),

    FOREIGN KEY (id_estudiante) REFERENCES estudiantes(id_estudiante) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE configuracion_instituciones (

  id_config_institucion    INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre_institucion       VARCHAR (255) NOT NULL,
  logo                     VARCHAR (255) NULL,
  direccion                VARCHAR (255) NOT NULL,
  telefono                 VARCHAR (100) NULL,
  celular                  VARCHAR (100) NULL,
  correo                   VARCHAR (100) NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11)

)ENGINE=InnoDB;
INSERT INTO configuracion_instituciones (nombre_institucion,logo,direccion,telefono,celular,correo,fyh_creacion,estado)
VALUES ('Josefin Leidenz','logo.jpg','Calle Federación entre Calle Miranda y Urdaneta','02682511304','04263687478','epbjosefinleidenz@gmail.com','2025-04-14 20:29:10','1');


CREATE TABLE gestiones (

  id_gestion      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  gestion         VARCHAR (255) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11)

)ENGINE=InnoDB;
INSERT INTO gestiones (gestion,fyh_creacion,estado)
VALUES ('PERIODO 2025','2025-04-22 20:29:10','1');

CREATE TABLE niveles (

  id_nivel       INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  gestion_id     INT (11) NOT NULL,
  nivel          VARCHAR (255) NOT NULL,
  turno          VARCHAR (255) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (gestion_id) REFERENCES gestiones (id_gestion) on delete no action on update cascade

)ENGINE=InnoDB;
INSERT INTO niveles (gestion_id,nivel,turno,fyh_creacion,estado)
VALUES ('1','PRIMARIA','MAÑANA','2025-04-26 20:29:10','1');

CREATE TABLE grados (

  id_grado       INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nivel_id       INT (11) NOT NULL,
  curso          VARCHAR (255) NOT NULL,
  paralelo       VARCHAR (255) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (nivel_id) REFERENCES niveles (id_nivel) on delete no action on update cascade

)ENGINE=InnoDB;
INSERT INTO grados (nivel_id,curso,paralelo,fyh_creacion,estado)
VALUES ('1','PRIMER GRADO','A','2025-04-28 20:29:10','1');

CREATE TABLE materias (

  id_materia      INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre_materia         VARCHAR (255) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11)

)ENGINE=InnoDB;
INSERT INTO materias (nombre_materia,fyh_creacion,estado)
VALUES ('MATEMATICAS','2025-04-22 20:29:10','1');

CREATE TABLE permisos (

  id_permiso       INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,

  nombre_url       VARCHAR (100) NOT NULL,
  url              TEXT NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11)

)ENGINE=InnoDB;

CREATE TABLE roles_permisos (

  id_rol_permiso    INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,

  rol_id            INT (11) NOT NULL,
  permiso_id        INT (11) NOT NULL,

  fyh_creacion   DATETIME NULL,
  fyh_actualizacion DATETIME NULL,
  estado        VARCHAR (11),

  FOREIGN KEY (rol_id) REFERENCES roles (id_rol) on delete no action on update cascade,
  FOREIGN KEY (permiso_id) REFERENCES permisos (id_permiso) on delete no action on update cascade

)ENGINE=InnoDB;


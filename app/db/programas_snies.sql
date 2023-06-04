CREATE TABLE sectores(
    cod_sector serial PRIMARY KEY, 
    nomb_sector varchar(50)
);

CREATE TABLE caracter_academico(
    cod_academ serial PRIMARY KEY,
    nomb_academ
);

CREATE TABLE estados(
    cod_estado serial NOT NULL PRIMARY KEY,
    nomb_estado varchar(20)
);

CREATE TABLE instituciones(
    cod_inst varchar(4) NOT NULL PRIMARY KEY,
    nomb_inst varchar(100) NOT NULL,
    cod_estado varchar(1),
    cod_academ int,
    cod_sector int,
    FOREIGN KEY (cod_estado) REFERENCES estados (cod_estado) ON UPDATE CASCADE ON DELETE RESTRICT,
    FOREIGN KEY (cod_academ) REFERENCES caracter_academico (cod_academ) ON UPDATE CASCADE ON DELETE RESTRICT,
    FOREIGN KEY (cod_sector) REFERENCES sectores (cod_sector) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE departamentos(
    cod_ depar serial PRIMARY KEY,
    nomb_depar varchar(30),
);

CREATE TABLE municipios(
    cod_municipio serial PRIMARY KEY,
    nomb_municipio varchar(50),
    cod_depar int,
    FOREIGN KEY (cod_depar) REFERENCES departamentos (cod_depar) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE nivel_academico(
    cod_nivel serial PRIMARY KEY,
    nomb_nivel varchar(30)
);

CREATE TABLE modalidades(
    cod_modal serial PRIMARY KEY,
    nomb_modal varchar(40)
);

CREATE TABLE campo_amplio(
    cod_amplio SERIAL PRIMARY KEY,
    nomb_amplio varchar(60)
);

CREATE TABLE campo_especifico(
    cod_espec serial PRIMARY KEY,
    nomb_espec varchar(100)
);

CREATE TABLE campo_detallado(
    cod_detallado SERIAL PRIMARY KEY,
    nomb_detallado varchar(100)
);

CREATE TABLE titulos(
    cod_titulo SERIAL NOT NULL PRIMARY KEY,
    nomb_titulo varchar(50), 
);

CREATE TABLE programas(
    snies varchar(6) NOT NULL PRIMARY KEY,
    nomb_programa varchar(60) NOT NULL,
    creditos int NOT NULL,
    periocidad varchar(15),
    semestres int NOT NULL,
    cod_modal int,
    cod_nivel int,
    cod_amplio int,
    cod_espec int,
    cod_detallado int,
    cod_titulo varchar(6),
    cod_estado varchar(1),
    cod_inst varchar(4),
    cod_municipio int,
    FOREIGN KEY (cod_municipio) REFERENCES municipios (cod_municipio) ON UPDATE RESTRICT ON DELETE RESTRICT,
    FOREIGN KEY (cod_modal) REFERENCES modalidades (cod_modal) ON UPDATE CASCADE ON DELETE SET NULL,
    FOREIGN KEY (cod_nivel) REFERENCES nivel_academico (cod_nivel) ON UPDATE CASCADE ON DELETE RESTRICT ,
    FOREIGN KEY (cod_amplio) REFERENCES campo_amplio (cod_amplio) ON UPDATE CASCADE ON DELETE SET NULL,
    FOREIGN KEY (cod_espec) REFERENCES campo_especifico (cod_espec) ON UPDATE CASCADE ON DELETE RESTRICT,
    FOREIGN KEY (cod_detallado) REFERENCES campo cod_detallado (cod_detallado) ON UPDATE CASCADE ON DELETE SET NULL,
    FOREIGN KEY (cod_estado) REFERENCES estados (cod_estado) ON UPDATE CASCADE ON DELETE RESTRICT,
    FOREIGN KEY (cod_titulo) REFERENCES titulos (cod_titulo) ON UPDATE CASCADE ON DELETE RESTRICT,
    FOREIGN KEY (cod_inst) REFERENCES instituciones (cod_inst) ON UPDATE CASCADE ON DELETE RESTRICT

);

CREATE TABLE tipos_reconocimientos (
    cod_reconoc SERIAL NOT NULL PRIMARY KEY,
    nomb_reconoc varchar(60)
);

CREATE TABLE reconocimientos (
    fecha_resolucion date PRIMARY KEY,
    resolucion varchar(6),
    fecha_ejecutura date,
    vigencia varchar(2),
    cod_progr varchar(6),
    cod_reconoc varchar(3)
);

ALTER TABLE reconocimientos ADD CONSTRAINT pk_participa PRIMARY KEY(fecha_resolucion,cod_progr,cod_reconoc);
ALTER TABLE reconocimientos ADD CONSTRAINT fk_cod_progr  FOREIGN KEY(cod_progr) REFERENCES programas(cod_progr) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE reconocimientos ADD CONSTRAINT fk_cod_reconoc FOREIGN KEY(cod_reconoc) REFERENCES tipos_reconocimientos(cod_reconoc) ON UPDATE CASCADE ON DELETE SET NULL;






CREATE TABLE sectores(
    cod_sector serial PRIMARY KEY, 
    nomb_sector varchar(50)
);

CREATE TABLE caracter_academico(
    cod_academ serial PRIMARY KEY,
    nomb_academ
);

CREATE TABLE estados(
    cod_estado varchar(1) NOT NULL PRIMARY KEY,
    nomb_estado varchar(20)
);

CREATE TABLE departamentos(
    cod_ depar serial PRIMARY KEY,
    nomb_depar varchar(30),
);

CREATE TABLE municipios(
    cod_municipio serial PRIMARY KEY,
    nomb_municipio varchar(50),
    cod_depar int,
    FOREIGN KEY (cod_depar) REFERENCES departamentos (cod_depar)
);

CREATE TABLE instituciones(
    cod_inst varchar(4) NOT NULL PRIMARY KEY,
    nomb_inst varchar(100) NOT NULL,
    cod_estado varchar(1),
    cod_academ int,
    cod_sector int,
    cod_municipio int,
    FOREIGN KEY (cod_municipio) REFERENCES municipios (cod_municipio),
    FOREIGN KEY (cod_estado) REFERENCES estados (cod_estado) ,
    FOREIGN KEY (cod_academ) REFERENCES caracter_academico (cod_academ),
    FOREIGN KEY (cod_estado) REFERENCES sectores (cod_sector)
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
    cod_amplio serial PRIMARY KEY,
    nomb_amplio varchar(60)
);

CREATE TABLE campo_especifico(
    cod_espec serial PRIMARY KEY,
    nomb_espec varchar(100)
);

CREATE TABLE campo_detallado(
    cod_detallado serial PRIMARY KEY,
    nomb_detallado varchar(100)
);

CREATE TABLE titulos(
    cod_titulo varchar(6) NOT NULL PRIMARY KEY,
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
    FOREIGN KEY (cod_modal) REFERENCES modalidades (cod_modal),
    FOREIGN KEY (cod_nivel) REFERENCES nivel_academico (cod_nivel) ,
    FOREIGN KEY (cod_amplio) REFERENCES campo_amplio (cod_amplio),
    FOREIGN KEY (cod_espec) REFERENCES campo_especifico (cod_espec)
    FOREIGN KEY (cod_detallado) REFERENCES campo cod_detallado (cod_detallado),
    FOREIGN KEY (cod_estado) REFERENCES estados (cod_estado) ,
    FOREIGN KEY (cod_titulo) REFERENCES titulos (cod_titulo),
    FOREIGN KEY (cod_inst) REFERENCES instituciones (cod_inst)

);

CREATE TABLE tipos_reconocimientos (
    cod_reconoc varchar(3) NOT NULL PRIMARY KEY,
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
ALTER TABLE reconocimientos ADD CONSTRAINT fk_cod_progr  FOREIGN KEY(cod_progr) REFERENCES programas(cod_progr);
ALTER TABLE reconocimientos ADD CONSTRAINT fk_cod_reconoc FOREIGN KEY(cod_reconoc) REFERENCES tipos_reconocimientos(cod_reconoc);






CREATE TABLE sectores(
    cod_sector VARCHAR(3) PRIMARY KEY, 
    nomb_sector varchar(50)
);

CREATE TABLE caracter_academico(
    cod_academ VARCHAR(3) PRIMARY KEY,
    nomb_academ varchar(50)
);

CREATE TABLE estados(
    cod_estado VARCHAR(2) NOT NULL PRIMARY KEY,
    nomb_estado varchar(20)
);

CREATE TABLE instituciones(
    cod_inst varchar(4) NOT NULL PRIMARY KEY,
    nomb_inst varchar(100) NOT NULL,
    cod_estado VARCHAR(2),
    cod_academ VARCHAR(3),
    cod_sector VARCHAR(3)
);


ALTER TABLE instituciones ADD CONSTRAINT fk_cod_estado FOREIGN KEY (cod_estado) REFERENCES estados (cod_estado) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE instituciones ADD CONSTRAINT fk_cod_academ FOREIGN KEY (cod_academ) REFERENCES caracter_academico (cod_academ) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE instituciones ADD CONSTRAINT fk_cod_sector FOREIGN KEY (cod_sector) REFERENCES sectores (cod_sector) ON UPDATE CASCADE ON DELETE RESTRICT;

CREATE TABLE departamentos(
    cod_depto varchar(3) PRIMARY KEY,
    nomb_depto varchar(30)
);

CREATE TABLE municipios(
    cod_municipio varchar(4) PRIMARY KEY,
    nomb_municipio varchar(50),
    cod_dpto varchar(3)
);
ALTER TABLE municipios ADD CONSTRAINT fk_cod_depto FOREIGN KEY (cod_depto) REFERENCES departamentos (cod_depto) ON UPDATE CASCADE ON DELETE RESTRICT;

CREATE TABLE nivel_academico(
    cod_nivel VARCHAR(4) PRIMARY KEY,
    nomb_nivel varchar(30)
);

CREATE TABLE modalidades(
    cod_modalidade VARCHAR(2) PRIMARY KEY,
    nomb_modalidad varchar(40)
);

CREATE TABLE campo_amplio(
    cod_amplio VARCHAR(5) PRIMARY KEY,
    nomb_amplio varchar(60)
);

CREATE TABLE campo_especifico(
    cod_especifico varchar(5) PRIMARY KEY,
    nomb_especifico varchar(100)
);

CREATE TABLE campo_detallado(
    cod_detallado VARCHAR(6) PRIMARY KEY,
    nomb_detallado varchar(100)
);

CREATE TABLE titulos(
    cod_titulo varchar(3) NOT NULL PRIMARY KEY,
    nomb_titulo varchar(150)
);



CREATE TABLE programas(
    snies varchar(6) NOT NULL PRIMARY KEY,
    nomb_programa varchar(60) NOT NULL,
    creditos int NOT NULL,
    periocidad varchar(15),
    semestres int NOT NULL,
    cod_modalidad VARCHAR(2),
    cod_nivel VARCHAR(4),
    cod_amplio VARCHAR(5),
    cod_especifico VARCHAR(5),
    cod_detallado varchar(6),
    cod_titulo VARCHAR(3),
    cod_estado VARCHAR(2),
    cod_inst varchar(4),
    cod_municipio varchar(4),
    FOREIGN KEY (cod_inst) REFERENCES instituciones (cod_inst) ON UPDATE CASCADE ON DELETE RESTRICT
);

ALTER TABLE programas ADD CONSTRAINT fk_cod_estado FOREIGN KEY (cod_estado) REFERENCES estados (cod_estado) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE programas ADD CONSTRAINT fk_cod_modalidad FOREIGN KEY (cod_modalidad) REFERENCES modalidades (cod_modalidad) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE programas ADD CONSTRAINT fk_cod_titulo FOREIGN KEY (cod_titulo) REFERENCES titulos (cod_titulo) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE programas ADD CONSTRAINT fk_cod_munic FOREIGN KEY (cod_munic) REFERENCES municipios (cod_munic) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE programas ADD CONSTRAINT fk_cod_amplio FOREIGN KEY (cod_amplio) REFERENCES campo_amplio (cod_amplio) ON UPDATE CASCADE ON DELETE SET NULL;
ALTER TABLE programas ADD CONSTRAINT fk_cod_especifico FOREIGN KEY (cod_especifico) REFERENCES campo_especifico (cod_especifico) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE programas ADD CONSTRAINT fk_cod_detallado FOREIGN KEY (cod_detallado) REFERENCES campo_detallado (cod_detallado) ON UPDATE CASCADE ON DELETE RESTRICT;
ALTER TABLE programas ADD CONSTRAINT fk_cod_nivel FOREIGN KEY (cod_nivel) REFERENCES nivel_academico (cod_nivel) ON UPDATE CASCADE ON DELETE RESTRICT;


CREATE TABLE tipos_reconocimientos (
    cod_tipo VARCHAR(3) NOT NULL PRIMARY KEY,
    nomb_tipo varchar(60)
);

CREATE TABLE reconocimientos (
    fecha_resolucion date,
    resolucion varchar(6),
    fecha_ejecutura date,
    vigencia varchar(2),
    cod_progr varchar(6),
    cod_tipo VARCHAR(3)
);

ALTER TABLE reconocimientos ADD CONSTRAINT pk_participa PRIMARY KEY (fecha_resolucion,cod_progr,cod_reconoc);
ALTER TABLE reconocimientos ADD CONSTRAINT fk_cod_tipo FOREIGN KEY (cod_tipo) REFERENCES tipos_reconocimientos (cod_tipo) ON UPDATE CASCADE ON DELETE SET NULL;
ALTER TABLE reconocimientos ADD CONSTRAINT fk_cod_progr  FOREIGN KEY (cod_progr) REFERENCES programas (snies) ON UPDATE CASCADE ON DELETE CASCADE;


COPY estados(cod_estado,nomb_estado) FROM '/tmp/Estados.csv' WITH (FORMAT CSV, DELIMITER ';',HEADER,ENCODING'latin1');
COPY sectores(cod_sector,nomb_sector) FROM '/tmp/Sectores.csv' WITH (FORMAT CSV, DELIMITER ';',HEADER,ENCODING'latin1');
COPY caracter_academico(cod_academ,nomb_academ) FROM '/tmp/Caracter_academico.csv' WITH (FORMAT CSV, DELIMITER ',',HEADER,ENCODING'latin1');
COPY titulos(cod_titulo,nomb_titulo) FROM '/tmp/Titulos.csv' WITH (FORMAT CSV, DELIMITER ';',HEADER,ENCODING'latin1');
COPY tipos_reconocimientos(cod_tipo,nomb_tipo) FROM '/tmp/Tipos_de_reconocimientos.csv' WITH (FORMAT CSV, DELIMITER ',',HEADER,ENCODING'latin1');
COPY departamentos(cod_depto,nomb_depto) FROM '/tmp/Departamentos.csv' WITH (FORMAT CSV, DELIMITER ';',HEADER,ENCODING'latin1');
COPY nivel_academico(cod_nivel,nomb_nivel) FROM '/tmp/Nivel_academico.csv' WITH (FORMAT CSV, DELIMITER ';',HEADER,ENCODING'latin1');
COPY modalidades(cod_modalidad,nomb_modalidad) FROM '/tmp/Modalidades.csv' WITH (FORMAT CSV, DELIMITER ';',HEADER,ENCODING'latin1');
COPY campo_amplio(cod_amplio,nomb_amplio) FROM '/tmp/Campo_amplio.csv' WITH (FORMAT CSV, DELIMITER ';',HEADER,ENCODING'latin1');
COPY campo_especifico(cod_especifico,nomb_especifico) FROM '/tmp/Campo_especifico.csv' WITH (FORMAT CSV, DELIMITER ';',HEADER,ENCODING'latin1');
COPY campo_detallado(cod_detallado,nomb_detallado) FROM '/tmp/Campo_detallado.csv' WITH (FORMAT CSV, DELIMITER ';',HEADER,ENCODING'latin1');

COPY municipios(cod_munic,nomb_munic,cod_depto) FROM '/tmp/Municipios.csv' WITH (FORMAT CSV, DELIMITER ',',HEADER,ENCODING'latin1');
COPY instituciones(cod_inst,nomb_inst,cod_sector,cod_academ,cod_estado) FROM '/tmp/Instituciones.csv' WITH (FORMAT CSV, DELIMITER ';',HEADER,ENCODING'latin1');
COPY programas(snies,nomb_programa,creditos,semestres,periocidad,cod_titulo,cod_estado,cod_nivel,cod_modalidad,cod_amplio,cod_especifico,cod_detallado,cod_inst,cod_munic) FROM '/tmp/Programas.csv' WITH (FORMAT CSV, DELIMITER ';',HEADER,ENCODING'latin1');
COPY reconocimientos(cod_tipo,cod_progr,fecha_resolucion,resolucion,fecha_ejecutura,vigencia) FROM '/tmp/Reconocimientos.csv' WITH (FORMAT CSV, DELIMITER ';',HEADER,ENCODING'latin1');

ALTER TABLE reconocimientos DROP CONSTRAINT pk_participa;
ALTER TABLE reconocimientos ADD CONSTRAINT pk_participa PRIMARY KEY (fecha_resolucion,cod_progr,cod_tipo);
ALTER TABLE reconocimientos ALTER COLUMN fecha_resolucion DROP NOT NULL;
ALTER TABLE reconocimientos DROP CONSTRAINT fk_cod_titulo;
ALTER TABLE titulos ALTER COLUMN cod_titulo TYPE VARCHAR(6);
ALTER TABLE programas ALTER COLUMN cod_titulo TYPE VARCHAR(6);
ALTER TABLE programas ADD CONSTRAINT fk_cod_titulo FOREIGN KEY (cod_titulo) REFERENCES titulos (cod_titulo) ON UPDATE CASCADE ON DELETE RESTRICT;


ALTER TABLE titulos ALTER COLUMN nomb_titulo TYPE VARCHAR(255);
ALTER TABLE programas ALTER COLUMN nomb_programa TYPE VARCHAR(255);
ALTER TABLE departamentos ALTER COLUMN nomb_depto TYPE VARCHAR(100);
ALTER TABLE nivel_academico ALTER COLUMN nomb_nivel TYPE VARCHAR(255);
ALTER TABLE campo_detallado ALTER COLUMN nomb_detallado TYPE VARCHAR(255);
ALTER TABLE campo_especifico ALTER COLUMN nomb_especifico TYPE VARCHAR(255);
ALTER TABLE reconocimientos ALTER COLUMN vigencia TYPE VARCHAR(10);





SELECT p.snies, p.nomb_programa,p.periocidad,p.semestres,p.creditos, m.nomb_munic, mo.nomb_modalidad,
d.nomb_depto, i.nomb_inst, ca.nomb_amplio, ce.nomb_especifico, cd.nomb_detallado, t.nomb_titulo, 
n.nomb_nivel, e.nomb_estado 
FROM programas p 
JOIN municipios m ON p.cod_munic = m.cod_munic
JOIN modalidades mo ON p.cod_modalidad = mo.cod_modalidad
JOIN departamentos d ON m.cod_depto = d.cod_depto
JOIN instituciones i ON p.cod_inst = i.cod_inst
JOIN campo_amplio ca ON p.cod_amplio = ca.cod_amplio
JOIN campo_especifico ce ON p.cod_especifico = ce.cod_especifico
JOIN campo_detallado cd ON p.cod_detallado = cd.cod_detallado
JOIN titulos t ON p.cod_titulo = t.cod_titulo
JOIN nivel_academico n ON p.cod_nivel = n.cod_nivel
JOIN estados e ON p.cod_estado = e.cod_estado
WHERE p.snies = '19';

cod_modalidad VARCHAR(2),
    cod_nivel VARCHAR(4),
    cod_amplio VARCHAR(5),
    cod_especifico VARCHAR(5),
    cod_detallado varchar(6),
    cod_titulo VARCHAR(3),
    cod_estado VARCHAR(2),
    cod_inst varchar(4),
    cod_municipio varchar(4),

    select p.snies, t.nomb_tipo FROM programas p 
    JOIN reconocimientos r ON p.snies= r.cod_progr
    JOIN tipos_reconocimientos t ON p.cod_tipo = t.cod_tipo
    WHERE p.snies = '19';

    SELECT p.snies, p.nomb_programa, p.creditos, 
p.periocidad, p.semestres, m.nomb_modalidad, 
na.nomb_nivel, ca.nomb_amplio, ce.nomb_especifico,
cd.nomb_detallado, t.nomb_titulo, e.nomb_estado,
i.nomb_inst, mu.nomb_munic, tr.nomb_tipo,d.nomb_depto
FROM programas p
INNER JOIN modalidades m ON p.cod_modalidad=m.cod_modalidad
INNER JOIN nivel_academico na ON p.cod_nivel=na.cod_nivel
INNER JOIN campo_amplio ca ON p.cod_amplio=ca.cod_amplio
INNER JOIN campo_especifico ce ON p.cod_especifico=ce.cod_especifico
INNER JOIN campo_detallado cd ON p.cod_detallado=cd.cod_detallado
INNER JOIN titulos t ON p.cod_titulo=t.cod_titulo
INNER JOIN estados e ON p.cod_estado=e.cod_estado
INNER JOIN instituciones i ON p.cod_inst=i.cod_inst
INNER JOIN municipios mu ON p.cod_munic=mu.cod_munic
JOIN departamentos d ON mu.cod_depto = d.cod_depto
INNER JOIN reconocimientos re ON re.cod_progr=p.snies
INNER JOIN tipos_reconocimientos tr ON re.cod_tipo=tr.cod_tipo
WHERE p.snies = '19';
;
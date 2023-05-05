-- Commencer par créser la base m2ldb et s'y connecter

-- Drop tables

-- DROP TABLE bureau;

-- DROP TABLE salle;

-- DROP TABLE etage;

-- DROP TABLE batiment;

-- DROP TABLE ligue;

-- DROP TABLE discipline;

CREATE TABLE ligue
(
  idligue   serial  NOT NULL,
  nom       varchar NOT NULL,
  adresse   varchar NULL,
  nomfichier varchar NULL,
  CONSTRAINT ligue_pk PRIMARY KEY (idligue)
);


CREATE TABLE batiment
(
  idbatiment serial  NOT NULL,
  nom        varchar NULL,
  CONSTRAINT batiment_pk PRIMARY KEY (idbatiment)
);


CREATE TABLE etage
(
  idetage  serial NOT NULL,
  numero   int2   NOT NULL,
  batiment int4   NOT NULL,
  CONSTRAINT etage_pk PRIMARY KEY (idetage),
  CONSTRAINT etage_un UNIQUE (numero, batiment),
  CONSTRAINT etage_batiment_fk FOREIGN KEY (batiment) REFERENCES batiment (idbatiment)
);


CREATE TABLE salle
(
  idsalle   serial  NOT NULL,
  nom       varchar NULL,
  situation int4    NULL,
  CONSTRAINT salle_pk PRIMARY KEY (idsalle),
  CONSTRAINT salle_etage_fk FOREIGN KEY (situation) REFERENCES etage (idetage)
);


CREATE TABLE bureau
(
  idbureau int4 NOT NULL,
  occupant int4 NULL,
  CONSTRAINT bureau_pk PRIMARY KEY (idbureau),
  CONSTRAINT bureau_ligue_fk FOREIGN KEY (occupant) REFERENCES ligue (idligue),
  CONSTRAINT bureau_salle_fk FOREIGN KEY (idbureau) REFERENCES salle (idsalle)
);


CREATE TABLE discipline
(
  iddiscipline   serial  NOT NULL,
  libelle       varchar NOT NULL,
  CONSTRAINT discipline_pk PRIMARY KEY (iddiscipline)
);

alter table ligue add column discipline int4;
alter table ligue ADD CONSTRAINT ligue_discipline_fk FOREIGN KEY (discipline) REFERENCES discipline (iddiscipline);
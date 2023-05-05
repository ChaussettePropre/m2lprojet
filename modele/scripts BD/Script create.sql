-- Commencer par créser la base m2ldb et s'y connecter
--
-- Drop tables
--insert into association 
-- DROP TABLE bureau;
--
-- DROP TABLE salle;
--
-- DROP TABLE etage;
--
-- DROP TABLE batiment;
-- Commencer par créser la base m2ldb et s'y connecter
--
-- Drop tables
--insert into association 
-- DROP TABLE bureau;
--
-- DROP TABLE salle;
--
-- DROP TABLE etage;
--
-- DROP TABLE batiment;
--
-- DROP TABLE ligue;
--
-- DROP TABLE discipline;
--



CREATE TABLE batiment
(
  id         serial  NOT NULL,
  nom        varchar NULL,
  CONSTRAINT batiment_pk PRIMARY KEY (id)
);


CREATE TABLE etage
(
  id       serial NOT NULL,
  numero   int2   NOT NULL,
  batiment int4   NOT NULL,
  CONSTRAINT etage_pk PRIMARY KEY (id),
  CONSTRAINT etage_un UNIQUE (numero, batiment),
  CONSTRAINT etage_batiment_fk FOREIGN KEY (batiment) REFERENCES batiment (id)
);


CREATE TABLE salle
(
  id        serial  NOT NULL,
  nom       varchar NULL,
  situation int4    NULL,
  CONSTRAINT salle_pk PRIMARY KEY (id),
  CONSTRAINT salle_etage_fk FOREIGN KEY (situation) REFERENCES etage (id)
);

CREATE TABLE discipline
(
  id      serial  NOT NULL,
  libelle varchar NOT NULL,
  CONSTRAINT discipline_pk PRIMARY KEY (id)
);

create table association
(
  id           serial  not null unique, 
  idDiscipline int4    not null,
  nom          varchar not null,
  adresse      varchar not null,
  tel          varchar null,
  email        varchar null,
  logo         varchar null,
  constraint association_pk primary key (id),
  constraint association_discipline_fk foreign key (idDiscipline) references discipline (id)
);

CREATE TABLE bureau
(
  id       int4 NOT NULL,
  occupant int4 NULL,
  CONSTRAINT bureau_pk PRIMARY KEY (id),
  CONSTRAINT bureau_salle_fk FOREIGN KEY (id) REFERENCES salle (id),
  constraint bureau_association_fk foreign key (occupant) references association (id)
);



create table ligue
(
  id int4 NOT null,
  CONSTRAINT ligue_pk PRIMARY KEY (id),
  CONSTRAINT ligue_association_fk FOREIGN KEY (id) REFERENCES association (id)
);

CREATE TABLE comite
(
  id             int4 NOT NULL,
  idLigueTravail int4 NULL,
  CONSTRAINT comite_pk PRIMARY KEY (id),
  CONSTRAINT comite_association_fk FOREIGN KEY (id) REFERENCES association (id)
);

create table membre
(
  id      serial  not null,
  nom     varchar not null,
  prenom  varchar not null,
  mail    varchar not null,
  adresse varchar null,
  tel     varchar null,
  constraint membre_pk primary key (id)
);

create table metier
(
  id  serial  not null,
  nom varchar not null,
  constraint metier_pk primary key (id)
);

create table travail
(
  idMembre    int4 not null,
  idMetier    int4 not null,
  idAssociation int4 not null,
  constraint travail_pk primary key (idMembre, idAssociation),
  constraint travail_association_fk foreign key (idAssociation) references association (id),
  constraint travail_metier_fk foreign key (idMetier) references metier (id),
  constraint travail_membre_fk foreign key (idMembre) references membre (id)
);

create table niveau
(
  id  serial  not null,
  nom varchar not null,
  constraint niveau_pk primary key (id)
);

create table identification
(
  id         serial  not null,  
  pseudonyme varchar not null,
  mdp        varchar not null,
  idniveau   int4    not null,
  constraint identification_pk primary key (id),
  constraint identification_niveau_fk foreign key (idniveau) references niveau (id)
);


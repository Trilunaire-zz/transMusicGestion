/*************************************************************

        Projet Trans-Musicale :
          Anthony LOHOU
          Tristan LAURENT FRANCOIS

*************************************************************/

CREATE SCHEMA trans;
SET SCHEMA 'trans';

CREATE TABLE trans._utilisateur(
  login VARCHAR(10) NOT NULL PRIMARY KEY,
  mail TEXT NOT NULL,
  motDePasse VARCHAR(20) NOT NULL,
  etat BOOLEAN NOT NULL,
  CONSTRAINT mail_PK2 UNIQUE (mail)
);

--L'utilisateur ATM est unique, il est l'administrateur du site
CREATE TABLE trans._atm(
  login VARCHAR(10) NOT NULL,
  CONSTRAINT ATMloginRef FOREIGN KEY (login) REFERENCES _utilisateur(login),
  CONSTRAINT atmPK PRIMARY KEY (login)
);


CREATE TABLE trans._groupe(
  login VARCHAR(10) NOT NULL,
  nom VARCHAR(50) NOT NULL PRIMARY KEY,
  dateDecreation TEXT, --certaines informations ne sont pas sous forme de date, et pas assez de precision (seulement l'année) pour utiliser le type date
  pays VARCHAR(50) NOT NULL,
  ville VARCHAR(50),
  formation TEXT,
  genre TEXT,
  elements_principaux TEXT,
  elements_ponctuels TEXT,
  parentés TEXT,
  siteweb TEXT,
  photos TEXT,
  video TEXT,
  discographie SERIAL NOT NULL,
  CONSTRAINT GROUPEloginRef FOREIGN KEY (login) REFERENCES _utilisateur(login),
  CONSTRAINT disco_group UNIQUE (discographie)
);

CREATE TABLE trans._chanson(
  discographie INTEGER NOT NULL,
  titre TEXT NOT NULL,
  lien TEXT,
  CONSTRAINT chansonDisco FOREIGN KEY (discographie) REFERENCES _groupe(discographie),
  CONSTRAINT chansonPK PRIMARY KEY (titre,discographie)
);

CREATE TABLE trans._lieu(
  ville VARCHAR(50) NOT NULL,
  nom VARCHAR(100) NOT NULL,
  capacite INTEGER,
  acces_handi BOOLEAN,
  CONSTRAINT lieuPK PRIMARY KEY (ville,nom)
);

CREATE TABLE trans._scene(
  ville VARCHAR(50) NOT NULL,
  nom VARCHAR(100) NOT NULL,
  CONSTRAINT scenePK PRIMARY KEY (ville,nom),
  CONSTRAINT sceneFK FOREIGN KEY (ville,nom) REFERENCES _lieu(ville,nom)
);

CREATE TABLE trans._bar(
  ville VARCHAR(50) NOT NULL,
  nom VARCHAR(100) NOT NULL,
  CONSTRAINT barPK PRIMARY KEY (ville,nom),
  CONSTRAINT barFK FOREIGN KEY (ville,nom) REFERENCES _lieu(ville,nom)
);

CREATE TABLE trans._reservation(
  id SERIAL,
  etat TEXT NOT NULL,
  h_debut DATE NOT NULL,
  jour DATE NOT NULL,
  ville VARCHAR(50) NOT NULL,
  nomLieu VARCHAR(100) NOT NULL,
  login VARCHAR(10) NOT NULL,
  CONSTRAINT reservPK PRIMARY KEY (login,h_debut,jour,ville,nomLieu),
  CONSTRAINT reservationUser FOREIGN KEY (login) REFERENCES _utilisateur(login),
  CONSTRAINT reservationLieu FOREIGN KEY (ville,nomLieu) REFERENCES _lieu(ville,nom)
);


--Copie des données

--copie dans la table lieu
COPY trans._lieu(capacite,nom,ville,acces_handi) FROM '/path/of/file.csv' DELIMITER ',' CSV;

--la table des scènes (choisies au hasard parmis celle ayant la plus grande capacité d'accueil)
COPY trans._scene(nom,ville) FROM 'path/of/file/scenes.csv' DELIMITER ',' CSV;

--la table des bars (tout ce qui appartient à la table lieu et qui n'est pas une scène)
COPY trans._bar(nom,ville) FROM 'path/of/file/bars.csv' DELIMITER ',' CSV;

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
  dateDecreation DATE NOT NULL,
  pays VARCHAR(50) NOT NULL,
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

COPY _lieu(capacite, nom, ville, acces_handi) FROM STDIN;
52  'Le Blosne' 'Rennes'  True
55  'Bato Fou'  'Saint-Pierre de la Réunion'  False
71  'Aire Libre ' 'Saint-Jacques-de-la-Lande' True
71  'Nouvel Atrium' 'Saint-Avertin' True
82  'L''Omnibus'  'Saint-Malo'  True
116 'Le Fuzz''Yon'  'La Roche-sur-Yon'  False
119 'Village' 'Rennes'  True
129 'FNAC'  'Rennes'  False
138 'Le Pub Gallery'  'Rennes'  True
142 'Ecole intercomunale de musique du pays de la Roche-aux-fées' 'Janzé' False
145 'Le Normandy' 'Saint-Lô'  False
145 'Parc des Expositions - Hall 8' 'Bruz'  True
150 'Coatélan'  'Morlaix' False
162 'Liberté Haut'  'Rennes'  True
165 'Espace Bel-Air'  'Saint-Aubin-du-Cormier ' True
171 'Arena 09'  'Moscou'  True
181 'Parc des Expositions - L''Atelier' 'Bruz'  False
189 'Parc des Expositions - Green Room' 'Bruz'  True
203 'Aire Libre'  'Saint-Jacques-de-la-Lande' True
220 'La Route du Rhum'  'Nantes'  True
233 'Parc des Expositions - Hall 4' ''  True
250 'Kinap - Red Hall'  'Samara'  True
256 'La Cité' 'Rennes'  False
273 'Le Runs Ar Puns' 'Chateaulin'  False
280 'Espace Bel-Air'  'Saint-Aubin-Du-Cormier'  True
285 'La Bellangerais' 'Rennes'  True
294 'Grand Huit'  'Rennes'  True
315 'Le Pôle Sud' 'Chartres-de-Bretagne'  True
325 'Eglise du Vieux St-Etienne'  'Rennes'  False
327 'La Péniche'  'Rennes'  True
337 'Le Cotton' 'Rennes'  False
337 'Le Thy''roir'  'Ploërmel ' True
367 'Salle du CLOUS'  'Brest' False
379 'Salle municipale'  'Louvigné-du-Désert'  True
383 'Le Tambour'  'Rennes'  False
399 'La Citrouille' 'Saint-Brieuc'  True
425 'Le Triangle' 'Rennes'  False
428 'Chaoyang Park' 'Pékin' True
433 'Ferme de la Harpe' 'Rennes'  False
473 'Le Cargö'  'Caen'  True
477 'Parc des Expositions - Hall 4' 'Bruz'  True
511 'Salle municipale'  'Bazouges-la-Pérouse' True
528 'Maison du Champs de Mars'  'Rennes'  True
538 'Liberté' 'Rennes'  False
571 'Centre Culturel Jovence' 'Louvigné-du-Désert'  False
581 'Big Band Café' 'Hérouville Saint-Clair'  False
590 'Place de la Mairie'  'Rennes'  True
605 'Maison de Quartier Villejean'  'Rennes'  False
609 'Parc des Expositions - Hall 5' 'Bruz'  False
619 'Salle Omnisports'  'Rennes'  True
633 'Parc des Expositions - L''Usine' 'Bruz'  True
654 'Opéra' 'Rennes'  False
664 'La Carène' 'Brest' True
690 'Hall du Tango' 'Pékin' False
701 'L''Inconnu'  'Rennes'  True
703 'Le Chabada'  'Angers'  True
712 'Le VIP'  'Saint-Nazaire' True
715 'La Trinquette' 'Rennes'  True
735 'Théâtre de Poche'  'Hédé'  True
746 'Villejean' 'Rennes'  True
750 'L''Excelsior'  'Allonnes'  True
757 'Le Scopitone'  'Rennes'  False
762 'La Nouvelle Vague' 'Saint-Malo'  False
767 'Amphigouri'  'Angers'  True
774 'Centre Culturel de l''Ecusson' 'Josselin'  False
779 'Le Thy''roir'  'Ploërmel'  False
797 'Lounge du Tango' 'Pékin' True
802 'L''Echonova' 'Saint-Avé' False
817 'La Citrouille' 'Saint Brieuc'  False
836 'Maison d''arrêt des Hommes'  'Rennes'  True
836 'Salle Municipale'  'Louvigné-du-Désert'  True
862 'Esperanza' 'Angers'  True
881 'Le Coatelan' 'Morlaix '  False
883 'Ubu' 'Rennes'  False
884 'Le Liberté'  'Rennes'  True
890 'Arena 09 - Miller Advanced Music Room' 'Moscou'  True
897 'Espace Bel Air'  'Saint-Aubin-du-Cormier'  True
905 'Parc des Expositions - La Forêt' 'Bruz'  True
914 'Run Ar Puns' 'Chateaulin'  True
915 'Théâtre Max Jacob' 'Quimper' False
923 'Le Piccadilly' 'Rennes'  True
925 'Maison de la Culture'  'Rennes'  True
933 'Le Synthi' 'Rennes'  True
951 'Le Fuzz''Yon'  'La Roche-Sur-Yon'  False
955 ''  'Oslo'  False
958 'Centre Culturel Le Triangle' 'Rennes'  False
987 'Maison de Quartier Le Blosne'  'Rennes'  False
992 'Orange Bleue'  'Brest' False
1013  'Salle des Fêtes' 'La Bosse-de-Bretagne'  False
1020  'Salle de l''Amicale Laïque'  'Janzé' True
1032  'Centre Pénitentiaire des Hommes' 'Vezin-Le-Coquet' False
1036  'L''Etage'  'Rennes'  True
1039  'Run Ar Puns' 'Châteaulin'  False
1042  'Les Champs Libres' 'Rennes'  True
1044  'L''Espace' 'Bruz'  True
1045  'Lenexpo' 'Saint-Pétersbourg' True
1045  'Rennes'  ''  False
1046  'Parc des Expositions - House Hall' 'Bruz'  True
1049  'Le 6 Par 4'  'Laval' True
1051  'Café des Beaux-Arts' 'Rennes'  False
1058  'MJC Cleunay' 'Rennes'  True
1063  'Maison d''Arrêt des Hommes'  'Rennes'  True
1076  'Le Batofar'  'Paris' True
1082  'Le Fuzz''Yon'  'La Roche sur Yon'  False
1087  'L''Echonova' 'Vannes'  True
1091  'Com''s'  'Rennes'  True
1092  'Centre Pénitentiaire des Femmes' 'Rennes'  True
1093  'Le 6 par 4'  'Entrammes' True
1096  'L''Espace' 'Rennes'  False
1105  'Théâtre de Cornouailles' 'Quimper' True
1124  'La Passerelle' 'Saint-Brieuc'  True
1132  'Le Pub Satori' 'Rennes'  False
1147  'Le Coatelan' 'Morlaix' False
1169  'Le Vauban' 'Brest' False
1180  'Les Temps Modernes'  'Rennes'  False
1181  'Le Satori' 'Rennes'  True
1207  'Parc des Expositions - Hall 9' 'Bruz'  True
1236  'Bruz'  ''  True
1245  'Parc des Expositions - Hall 4' 'Rennes'  True
1251  'Le Vip'  'Saint-Nazaire' True
1257  'La Luciole'  'Alençon' True
1262  'Place du Colombier'  'Rennes'  True
1272  'Le Scooter'  'Rennes'  False
1286  'Maison de Quartier Maurepas' 'Rennes'  True
1288  'César' 'Brest' True
1288  'Le Grand Logis'  'Bruz'  True
1295  'Triangle'  'Rennes'  True
1300  'Le Manège' 'Lorient' True
1301  'Fleda' 'Brno'  True
1304  'Stereolux' 'Nantes'  True
1310  'L''Aventure' 'Rennes'  True
1313  'MPT Penhars' 'Quimper '  True
1318  'Liberté Bas' 'Rennes'  True
1323  'Le Pôle Sud' 'Chartres de Bretagne'  False
1324  'Le Cactus' 'Rennes'  False
1326  'Parc des Expositions - Hall 3' 'Bruz'  False
1331  'Le Coatélan' 'Morlaix' True
1340  'Triptyque' 'Paris' True
1344  'Amphi Chateaubriand' 'Rennes'  True
1346  'Le Chatham'  'Rennes'  True
1355  'Maison d''Arrêt des Hommes ' 'Rennes'  True
1361  'Antipode'  'Rennes'  True
1384  'Parc des Expositions - Techno Hall'  'Bruz'  True
1387  'Espace Bel-Air'  'Saint-Aubin-du-Cormier'  False
1390  'Le Cargo'  'Neufchâtel'  False
1410  'Le 6 Par 4'  'Entrammes' False
1413  'L''Olympic'  'Nantes'  True
1420  'Le Trap' 'Rennes'  True
1440  'Le Carmès' 'Rennes'  True
1446  'Centre Culturel de Cesson Sévigné' 'Cesson-Sévigné'  False
1457  'Espace Cosmao du Manoir' 'Lorient' False
1458  'Le 4 Bis'  'Rennes'  True
1474  'Batofar' 'Paris' True
1483  'Ecole de musique Opus 17'  'Bain de Bretagne'  False
1492  'Ar Gwez Boell' 'Saint-Brieuc'  True
1492  'Théâtre de la Ville' 'Rennes'  False;


COPY _scene (nom, ville) FROM STDIN
'Le Chatham'  'Rennes'
'Maison d''Arrêt des Hommes ' 'Rennes'
'Antipode'  'Rennes'
'Parc des Expositions - Techno Hall'  'Bruz'
'Espace Bel-Air'  'Saint-Aubin-du-Cormier'
'Le Cargo'  'Neufchâtel'
'Le 6 Par 4'  'Entrammes'
'L''Olympic'  'Nantes'
'Le Trap' 'Rennes'
'Le Carmès' 'Rennes'
'Centre Culturel de Cesson Sévigné' 'Cesson-Sévigné'
'Espace Cosmao du Manoir' 'Lorient'
'Le 4 Bis'  'Rennes'
'Batofar' 'Paris'
'Ecole de musique Opus 17'  'Bain de Bretagne'
'Ar Gwez Boell' 'Saint-Brieuc'
'Théâtre de la Ville' 'Rennes'


COPY _bar (nom, ville) FROM STDIN
'Blosne' 'Rennes'
'Bato Fou'  'Saint-Pierre de la Réunion'
'Aire Libre ' 'Saint-Jacques-de-la-Lande'
'Nouvel Atrium' 'Saint-Avertin'
'L''Omnibus'  'Saint-Malo'
'Le Fuzz''Yon'  'La Roche-sur-Yon'
'Village' 'Rennes'
'FNAC'  'Rennes'
'Le Pub Gallery'  'Rennes'
'Ecole intercomunale de musique du pays de la Roche-aux-fées' 'Janzé'
'Le Normandy' 'Saint-Lô'
'Parc des Expositions - Hall 8' 'Bruz'
'Coatélan'  'Morlaix'
'Liberté Haut'  'Rennes'
'Espace Bel-Air'  'Saint-Aubin-du-Cormier '
'Arena 09'  'Moscou'
'Parc des Expositions - L''Atelier' 'Bruz'
'Parc des Expositions - Green Room' 'Bruz'
'Aire Libre'  'Saint-Jacques-de-la-Lande'
'La Route du Rhum'  'Nantes'
'Parc des Expositions - Hall 4' ''
'Kinap - Red Hall'  'Samara'
'La Cité' 'Rennes'
'Le Runs Ar Puns' 'Chateaulin'
'Espace Bel-Air'  'Saint-Aubin-Du-Cormier'
'La Bellangerais' 'Rennes'
'Grand Huit'  'Rennes'
'Le Pôle Sud' 'Chartres-de-Bretagne'
'Eglise du Vieux St-Etienne'  'Rennes'
'La Péniche'  'Rennes'
'Le Cotton' 'Rennes'
'Le Thy''roir'  'Ploërmel '
'Salle du CLOUS'  'Brest'
'Salle municipale'  'Louvigné-du-Désert'
'Le Tambour'  'Rennes'
'La Citrouille' 'Saint-Brieuc'
'Le Triangle' 'Rennes'
'Chaoyang Park' 'Pékin'
'Ferme de la Harpe' 'Rennes'
'Le Cargö'  'Caen'
'Parc des Expositions - Hall 4' 'Bruz'
'Salle municipale'  'Bazouges-la-Pérouse'
'Maison du Champs de Mars'  'Rennes'
'Liberté' 'Rennes'
'Centre Culturel Jovence' 'Louvigné-du-Désert'
'Big Band Café' 'Hérouville Saint-Clair'
'Place de la Mairie'  'Rennes'
'Maison de Quartier Villejean'  'Rennes'
'Parc des Expositions - Hall 5' 'Bruz'
'Salle Omnisports'  'Rennes'
'Parc des Expositions - L''Usine' 'Bruz'
'Opéra' 'Rennes'
'La Carène' 'Brest'
'Hall du Tango' 'Pékin'
'L''Inconnu'  'Rennes'
'Le Chabada'  'Angers'
'Le VIP'  'Saint-Nazaire'
'La Trinquette' 'Rennes'
'Théâtre de Poche'  'Hédé'
'Villejean' 'Rennes'
'L''Excelsior'  'Allonnes'
'Le Scopitone'  'Rennes'
'La Nouvelle Vague' 'Saint-Malo'
'Amphigouri'  'Angers'
'Centre Culturel de l''Ecusson' 'Josselin'
'Le Thy''roir'  'Ploërmel'
'Lounge du Tango' 'Pékin'
'L''Echonova' 'Saint-Avé'
'La Citrouille' 'Saint Brieuc'
'Maison d''arrêt des Hommes'  'Rennes'
'Salle Municipale'  'Louvigné-du-Désert'
'Esperanza' 'Angers'
'Le Coatelan' 'Morlaix '
'Ubu' 'Rennes'
'Le Liberté'  'Rennes'
'Arena 09 - Miller Advanced Music Room' 'Moscou'
'Espace Bel Air'  'Saint-Aubin-du-Cormier'
'Parc des Expositions - La Forêt' 'Bruz'
'Run Ar Puns' 'Chateaulin'
'Théâtre Max Jacob' 'Quimper'
'Le Piccadilly' 'Rennes'
'Maison de la Culture'  'Rennes'
'Le Synthi' 'Rennes'
'Le Fuzz''Yon'  'La Roche-Sur-Yon'
''  'Oslo'
'Centre Culturel Le Triangle' 'Rennes'
'Maison de Quartier Le Blosne'  'Rennes'
'Orange Bleue'  'Brest'
'Salle des Fêtes' 'La Bosse-de-Bretagne'
'Salle de l''Amicale Laïque'  'Janzé'
'Centre Pénitentiaire des Hommes' 'Vezin-Le-Coquet'
'L''Etage'  'Rennes'
'Run Ar Puns' 'Châteaulin'
'Les Champs Libres' 'Rennes'
'L''Espace' 'Bruz'
'Lenexpo' 'Saint-Pétersbourg'
'Rennes'  ''
'Parc des Expositions - House Hall' 'Bruz'
'Le 6 Par 4'  'Laval'
'Café des Beaux-Arts' 'Rennes'
'MJC Cleunay' 'Rennes'
'Maison d''Arrêt des Hommes'  'Rennes'
'Le Batofar'  'Paris'
'Le Fuzz''Yon'  'La Roche sur Yon'
'L''Echonova' 'Vannes'
'Com''s'  'Rennes'
'Centre Pénitentiaire des Femmes' 'Rennes'
'Le 6 par 4'  'Entrammes'
'L''Espace' 'Rennes'
'Théâtre de Cornouailles' 'Quimper'
'La Passerelle' 'Saint-Brieuc'
'Le Pub Satori' 'Rennes'
'Le Coatelan' 'Morlaix'
'Le Vauban' 'Brest'
'Les Temps Modernes'  'Rennes'
'Le Satori' 'Rennes'
'Parc des Expositions - Hall 9' 'Bruz'
'Bruz'  ''
'Parc des Expositions - Hall 4' 'Rennes'
'Le Vip'  'Saint-Nazaire'
'La Luciole'  'Alençon'
'Place du Colombier'  'Rennes'
'Le Scooter'  'Rennes'
'Maison de Quartier Maurepas' 'Rennes'
'César' 'Brest'
'Le Grand Logis'  'Bruz'
'Triangle'  'Rennes'
'Le Manège' 'Lorient'
'Fleda' 'Brno'
'Stereolux' 'Nantes'
'L''Aventure' 'Rennes'
'MPT Penhars' 'Quimper '
'Liberté Bas' 'Rennes'
'Le Pôle Sud' 'Chartres de Bretagne'
'Le Cactus' 'Rennes'
'Parc des Expositions - Hall 3' 'Bruz'
'Le Coatélan' 'Morlaix'
'Triptyque' 'Paris'
'Amphi Chateaubriand' 'Rennes'

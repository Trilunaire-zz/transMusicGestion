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
  nom VARCHAR(75) NOT NULL PRIMARY KEY,
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
  h_reserv  DATE NOT NULL,
  ville VARCHAR(50) NOT NULL,
  nomLieu VARCHAR(100) NOT NULL,
  login VARCHAR(10) NOT NULL,
  CONSTRAINT reservPK PRIMARY KEY (login,h_reserv,ville,nomLieu),
  CONSTRAINT reservationUser FOREIGN KEY (login) REFERENCES _utilisateur(login),
  CONSTRAINT reservationLieu FOREIGN KEY (ville,nomLieu) REFERENCES _lieu(ville,nom)
);


--Copie des données

--Copie des données

--copie dans la table lieu
COPY trans._lieu(capacite,nom,ville,acces_handi) FROM '/path/of/file.csv' DELIMITER ',' CSV;
52,Le Blosne,Rennes,True
55,Bato Fou,Saint-Pierre de la Réunion,False
71,Aire Libre ,Saint-Jacques-de-la-Lande,True
71,Nouvel Atrium,Saint-Avertin,True
82,L'Omnibus,Saint-Malo,True
116,Le Fuzz'Yon,La Roche-sur-Yon,False
119,Village,Rennes,True
129,FNAC,Rennes,False
138,Le Pub Gallery,Rennes,True
142,Ecole intercomunale de musique du pays de la Roche-aux-fées,Janzé,False
145,Le Normandy,Saint-Lô,False
145,Parc des Expositions - Hall 8,Bruz,True
150,Coatélan,Morlaix,False
162,Liberté Haut,Rennes,True
165,Espace Bel-Air,Saint-Aubin-du-Cormier ,True
171,Arena 09,Moscou,True
181,Parc des Expositions - L'Atelier,Bruz,False
189,Parc des Expositions - Green Room,Bruz,True
203,Aire Libre,Saint-Jacques-de-la-Lande,True
220,La Route du Rhum,Nantes,True
250,Kinap - Red Hall,Samara,True
256,La Cité,Rennes,False
273,Le Runs Ar Puns,Chateaulin,False
280,Espace Bel-Air,Saint-Aubin-Du-Cormier,True
285,La Bellangerais,Rennes,True
294,Grand Huit,Rennes,True
315,Le Pôle Sud,Chartres-de-Bretagne,True
325,Eglise du Vieux St-Etienne,Rennes,False
327,La Péniche,Rennes,True
337,Le Cotton,Rennes,False
337,Le Thy'roir,Ploërmel ,True
367,Salle du CLOUS,Brest,False
379,Salle municipale,Louvigné-du-Désert,True
383,Le Tambour,Rennes,False
399,La Citrouille,Saint-Brieuc,True
425,Le Triangle,Rennes,False
428,Chaoyang Park,Pékin,True
433,Ferme de la Harpe,Rennes,False
473,Le Cargö,Caen,True
477,Parc des Expositions - Hall 4,Bruz,True
511,Salle municipale,Bazouges-la-Pérouse,True
528,Maison du Champs de Mars,Rennes,True
538,Liberté,Rennes,False
571,Centre Culturel Jovence,Louvigné-du-Désert,False
581,Big Band Café,Hérouville Saint-Clair,False
590,Place de la Mairie,Rennes,True
605,Maison de Quartier Villejean,Rennes,False
609,Parc des Expositions - Hall 5,Bruz,False
619,Salle Omnisports,Rennes,True
633,Parc des Expositions - L'Usine,Bruz,True
654,Opéra,Rennes,False
664,La Carène,Brest,True
690,Hall du Tango,Pékin,False
701,L'Inconnu,Rennes,True
703,Le Chabada,Angers,True
712,Le VIP,Saint-Nazaire,True
715,La Trinquette,Rennes,True
735,Théâtre de Poche,Hédé,True
746,Villejean,Rennes,True
750,L'Excelsior,Allonnes,True
757,Le Scopitone,Rennes,False
762,La Nouvelle Vague,Saint-Malo,False
767,Amphigouri,Angers,True
774,Centre Culturel de l'Ecusson,Josselin,False
779,Le Thy'roir,Ploërmel,False
797,Lounge du Tango,Pékin,True
802,L'Echonova,Saint-Avé,False
817,La Citrouille,Saint Brieuc,False
836,Maison d'arrêt des Hommes,Rennes,True
836,Salle Municipale,Louvigné-du-Désert,True
862,Esperanza,Angers,True
881,Le Coatelan,Morlaix ,False
883,Ubu,Rennes,False
884,Le Liberté,Rennes,True
890,Arena 09 - Miller Advanced Music Room,Moscou,True
897,Espace Bel Air,Saint-Aubin-du-Cormier,True
905,Parc des Expositions - La Forêt,Bruz,True
914,Run Ar Puns,Chateaulin,True
915,Théâtre Max Jacob,Quimper,False
923,Le Piccadilly,Rennes,True
925,Maison de la Culture,Rennes,True
933,Le Synthi,Rennes,True
951,Le Fuzz'Yon,La Roche-Sur-Yon,False
958,Centre Culturel Le Triangle,Rennes,False
987,Maison de Quartier Le Blosne,Rennes,False
992,Orange Bleue,Brest,False
1013,Salle des Fêtes,La Bosse-de-Bretagne,False
1020,Salle de l'Amicale Laïque,Janzé,True
1032,Centre Pénitentiaire des Hommes,Vezin-Le-Coquet,False
1036,L'Etage,Rennes,True
1039,Run Ar Puns,Châteaulin,False
1042,Les Champs Libres,Rennes,True
1044,L'Espace,Bruz,True
1045,Lenexpo,Saint-Pétersbourg,True
1046,Parc des Expositions - House Hall,Bruz,True
1049,Le 6 Par 4,Laval,True
1051,Café des Beaux-Arts,Rennes,False
1058,MJC Cleunay,Rennes,True
1063,Maison d'Arrêt des Hommes,Rennes,True
1076,Le Batofar,Paris,True
1082,Le Fuzz'Yon,La Roche sur Yon,False
1087,L'Echonova,Vannes,True
1091,Com's,Rennes,True
1092,Centre Pénitentiaire des Femmes,Rennes,True
1093,Le 6 par 4,Entrammes,True
1096,L'Espace,Rennes,False
1105,Théâtre de Cornouailles,Quimper,True
1124,La Passerelle,Saint-Brieuc,True
1132,Le Pub Satori,Rennes,False
1147,Le Coatelan,Morlaix,False
1169,Le Vauban,Brest,False
1180,Les Temps Modernes,Rennes,False
1181,Le Satori,Rennes,True
1207,Parc des Expositions - Hall 9,Bruz,True
1245,Parc des Expositions - Hall 4,Rennes,True
1251,Le Vip,Saint-Nazaire,True
1257,La Luciole,Alençon,True
1262,Place du Colombier,Rennes,True
1272,Le Scooter,Rennes,False
1286,Maison de Quartier Maurepas,Rennes,True
1288,César,Brest,True
1288,Le Grand Logis,Bruz,True
1295,Triangle,Rennes,True
1300,Le Manège,Lorient,True
1301,Fleda,Brno,True
1304,Stereolux,Nantes,True
1310,L'Aventure,Rennes,True
1313,MPT Penhars,Quimper ,True
1318,Liberté Bas,Rennes,True
1323,Le Pôle Sud,Chartres de Bretagne,False
1324,Le Cactus,Rennes,False
1326,Parc des Expositions - Hall 3,Bruz,False
1331,Le Coatélan,Morlaix,True
1340,Triptyque,Paris,True
1344,Amphi Chateaubriand,Rennes,True
1346,Le Chatham,Rennes,True
1355,Maison d'Arrêt des Hommes ,Rennes,True
1361,Antipode,Rennes,True
1384,Parc des Expositions - Techno Hall,Bruz,True
1387,Espace Bel-Air,Saint-Aubin-du-Cormier,False
1390,Le Cargo,Neufchâtel,False
1410,Le 6 Par 4,Entrammes,False
1413,L'Olympic,Nantes,True
1420,Le Trap,Rennes,True
1440,Le Carmès,Rennes,True
1446,Centre Culturel de Cesson Sévigné,Cesson-Sévigné,False
1457,Espace Cosmao du Manoir,Lorient,False
1458,Le 4 Bis,Rennes,True
1474,Batofar,Paris,True
1483,Ecole de musique Opus 17,Bain de Bretagne,False
1492,Ar Gwez Boell,Saint-Brieuc,True
1492,Théâtre de la Ville,Rennes,False
\.

--la table des scènes (choisies au hasard parmis celle ayant la plus grande capacité d'accueil)
COPY trans._scene(nom,ville) FROM STDIN DELIMITER ',' CSV;
Le 6 par 4,Entrammes
L'Espace,Rennes
Théâtre de Cornouailles,Quimper
La Passerelle,Saint-Brieuc
Le Pub Satori,Rennes
Le Coatelan,Morlaix
Le Vauban,Brest
Les Temps Modernes,Rennes
Le Satori,Rennes
Parc des Expositions - Hall 9,Bruz
Parc des Expositions - Hall 4,Rennes
Le Vip,Saint-Nazaire
La Luciole,Alençon
Place du Colombier,Rennes
Le Scooter,Rennes
Maison de Quartier Maurepas,Rennes
César,Brest
Le Grand Logis,Bruz
Triangle,Rennes
Le Manège,Lorient
Fleda,Brno
Stereolux,Nantes
L'Aventure,Rennes
MPT Penhars,Quimper
Liberté Bas,Rennes
Le Pôle Sud,Chartres de Bretagne
Le Cactus,Rennes
Parc des Expositions - Hall 3,Bruz
Le Coatélan,Morlaix
Triptyque,Paris
Amphi Chateaubriand,Rennes
Le Chatham,Rennes
Maison d'Arrêt des Hommes ,Rennes
Antipode,Rennes
Parc des Expositions - Techno Hall,Bruz
Espace Bel-Air,Saint-Aubin-du-Cormier
Le Cargo,Neufchâtel
Le 6 Par 4,Entrammes
L'Olympic,Nantes
Le Trap,Rennes
Le Carmès,Rennes
Centre Culturel de Cesson Sévigné,Cesson-Sévigné
Espace Cosmao du Manoir,Lorient
Le 4 Bis,Rennes
Batofar,Paris
Ecole de musique Opus 17,Bain de Bretagne
Ar Gwez Boell,Saint-Brieuc
Théâtre de la Ville,Rennes
\.

--la table des bars (tout ce qui appartient à la table lieu et qui n'est pas une scène)
COPY trans._bar(nom,ville) FROM STDIN DELIMITER ',' CSV;
Le Blosne,Rennes
Bato Fou,Saint-Pierre de la Réunion
Aire Libre ,Saint-Jacques-de-la-Lande
Nouvel Atrium,Saint-Avertin
L'Omnibus,Saint-Malo
Le Fuzz'Yon,La Roche-sur-Yon
Village,Rennes
FNAC,Rennes
Le Pub Gallery,Rennes
Ecole intercomunale de musique du pays de la Roche-aux-fées,Janzé
Le Normandy,Saint-Lô
Parc des Expositions - Hall 8,Bruz
Coatélan,Morlaix
Liberté Haut,Rennes
Espace Bel-Air,Saint-Aubin-du-Cormier
Arena 09,Moscou
Parc des Expositions - L'Atelier,Bruz
Parc des Expositions - Green Room,Bruz
Aire Libre,Saint-Jacques-de-la-Lande
La Route du Rhum,Nantes
Kinap - Red Hall,Samara
La Cité,Rennes
Le Runs Ar Puns,Chateaulin
Espace Bel-Air,Saint-Aubin-Du-Cormier
La Bellangerais,Rennes
Grand Huit,Rennes
Le Pôle Sud,Chartres-de-Bretagne
Eglise du Vieux St-Etienne,Rennes
La Péniche,Rennes
Le Cotton,Rennes
Le Thy'roir,Ploërmel
Salle du CLOUS,Brest
Salle municipale,Louvigné-du-Désert
Le Tambour,Rennes
La Citrouille,Saint-Brieuc
Le Triangle,Rennes
Chaoyang Park,Pékin
Ferme de la Harpe,Rennes
Le Cargö,Caen
Parc des Expositions - Hall 4,Bruz
Salle municipale,Bazouges-la-Pérouse
Maison du Champs de Mars,Rennes
Liberté,Rennes
Centre Culturel Jovence,Louvigné-du-Désert
Big Band Café,Hérouville Saint-Clair
Place de la Mairie,Rennes
Maison de Quartier Villejean,Rennes
Parc des Expositions - Hall 5,Bruz
Salle Omnisports,Rennes
Parc des Expositions - L'Usine,Bruz
Opéra,Rennes
La Carène,Brest
Hall du Tango,Pékin
L'Inconnu,Rennes
Le Chabada,Angers
Le VIP,Saint-Nazaire
La Trinquette,Rennes
Théâtre de Poche,Hédé
Villejean,Rennes
L'Excelsior,Allonnes
Le Scopitone,Rennes
La Nouvelle Vague,Saint-Malo
Amphigouri,Angers
Centre Culturel de l'Ecusson,Josselin
Le Thy'roir,Ploërmel
Lounge du Tango,Pékin
L'Echonova,Saint-Avé
La Citrouille,Saint Brieuc
Maison d'arrêt des Hommes,Rennes
Salle Municipale,Louvigné-du-Désert
Esperanza,Angers
Le Coatelan,Morlaix
Ubu,Rennes
Le Liberté,Rennes
Arena 09 - Miller Advanced Music Room,Moscou
Espace Bel Air,Saint-Aubin-du-Cormier
Parc des Expositions - La Forêt,Bruz
Run Ar Puns,Chateaulin
Théâtre Max Jacob,Quimper
Le Piccadilly,Rennes
Maison de la Culture,Rennes
Le Synthi,Rennes
Le Fuzz'Yon,La Roche-Sur-Yon
Centre Culturel Le Triangle,Rennes
Maison de Quartier Le Blosne,Rennes
Orange Bleue,Brest
Salle des Fêtes,La Bosse-de-Bretagne
Salle de l'Amicale Laïque,Janzé
Centre Pénitentiaire des Hommes,Vezin-Le-Coquet
L'Etage,Rennes
Run Ar Puns,Châteaulin
Les Champs Libres,Rennes
L'Espace,Bruz
Lenexpo,Saint-Pétersbourg
Parc des Expositions - House Hall,Bruz
Le 6 Par 4,Laval
Café des Beaux-Arts,Rennes
MJC Cleunay,Rennes
Maison d'Arrêt des Hommes,Rennes
Le Batofar,Paris
Le Fuzz'Yon,La Roche sur Yon
L'Echonova,Vannes
Com's,Rennes
Centre Pénitentiaire des Femmes,Rennes
\.

-- la table utilisateurs
COPY trans._utilisateur(pseudo,mail,motDePasse,etat) FROM STDIN DELIMITER ',' CSV;
htrIo^07za,atm@atm.com,fd78amp^78'7z74asAds,True
Eb@Hs[XFhl,1000Names@groupemusique.com,1^rP;XD;COtG3wrB6^[9,True
]rNbz>f`^@,12Rounds@groupemusique.com,Pz}FP^W1T:^r>^:[cv@,True
~g7tH5Rq~{,13thHole@groupemusique.com,XuSZXGdziu~mB<6sGcBR,True
O8P2{cI0Em,22Pistepirkko@groupemusique.com,k^6Y|Hy|5Ae;{a7:3`,False
dePx84zTBV,24.7Spyz@groupemusique.com,QJYT;EaJ`r|?J<KOBJRK,True
cv6yQ>SI|`,2Bal2Neg'@groupemusique.com,;UA6==doIygQmZ_XlIzy,True
_x^|Y0@9lG,2ManyDjs@groupemusique.com,MQzoz~48EZr}S?J=4k8l,False
w@3mJR6g@,3Mustaphas3@groupemusique.com,O9cdUIz]haf@jo<e>v3g,True
^rRux@Ri~,4????????????@groupemusique.com,]QwrFm]0rJ;1edv>Rpd;,False
[oBmFC=k@0,50MilesFromVancouver@groupemusique.com,M{Xc2g]Z<pj~iOqp]~2h,False
Aq@6@8>UJo,64DollarQuestion@groupemusique.com,pe=NzZm2<KxYueyC@J_X,True
X71Kkyhm7Y,69@groupemusique.com,1UGS8oS6s73E]p|@LR1y,True
3>gmnEn1s~,78RPMSelector@groupemusique.com,sPP`_sYY<Ouu@XAYOv6o,False
jIjiPnT[Ia,808State@groupemusique.com,raG2wCyKoGjlMT?3GE}_,False
@SnQ>Sx;tZ,AbrahamInc.@groupemusique.com,CBC3mLR[^RMlf9of9xQ,True
Wd0th^G_||,AbstracktKealAgram@groupemusique.com,6c_`DWmMQ8wA}7hvX~{w,True
M{9_eF=Ytn,Accrorap@groupemusique.com,MGXA>yyAXD:p_akKnx{X,True
}~Y>EF<5Hc,Ace@groupemusique.com,L<ML7oVlQ8GxaeduE[x;,True
}75qb?6LGT,AcidArab@groupemusique.com,0s~4ie7^ZMmgn;5kfVN`,True
ae8oDjV[[X,AcidBrass@groupemusique.com,?zNV^ud=rdv8[>yW~KIu,False
5_2|_5gthk,AD@groupemusique.com,Fou`h3BX<9D^={4<eV},True
XVBNNH^;iU,A.D.O.R.@groupemusique.com,03V8CW?8TvpwTyy8vjD,True
50Mm<@azJh,AdrianVeidt@groupemusique.com,kNkjeS4E^K~L29f]vo9,False
Yk@9FW1[tg,Aeroplane@groupemusique.com,{r|<qafIYcbsXE6J0DO;,True
KMMNNu7>jq,AesopRock@groupemusique.com,<1XpPYi0^p9cX~SoVncq,False
mD@=9dyIr:,AffectionPlace@groupemusique.com,n0}Blm10b:It`WPJrn:M,False
VPc4H4gX;,AfricaUnite@groupemusique.com,?8vg8J@[mIUrO]0:QzZ,False
ZO~rVh3ZK,AfroCeltSoundSystem@groupemusique.com,]?4|Ri:gx_5SW^ewg:g>,False
8xx0wagN|o,AfroJazz@groupemusique.com,]_mmjftIxmFWh[WF3>xq,True
0E8bTqh`tj,AgentSideGrinder@groupemusique.com,vl{jM2xSFaU9=B<3yyOq,True
s^XJ;}>HyB,AgeofChance@groupemusique.com,62qv[6{;qYg{T?`o`Je1,True
?Qo:2`kcCg,Agoria@groupemusique.com,1Jjt_Zgho8r16EG{PsA?,True
_lt_EoA^Bo,Aï@groupemusique.com,6ANe{b^O1m2v1]b3vZj,True
Z0:byN}fDB,Aipa'Atout@groupemusique.com,OE6yY|Qh7ExdybP@]@<@,False
GZBup4U9MC,AïshaKandisha'sJarringEffects@groupemusique.com,G?>Fse_>X1g}9[XFo05,False
S[N1M@2wCn,Aïwa@groupemusique.com,g0r:;7dApV}5p}@[IWs,False
<US~Kexwa5,AjCroce@groupemusique.com,=~kl`n07dLgj4TzvqH,False
Sy<abpmN9S,Akabu@groupemusique.com,UFKF}Kn{ifeO><iwW<3O,True
Y1Lxk8s{X>,AktuelForce@groupemusique.com,wd8a[|^~70XaTRAeCBSr,False
AwQgRjbs;z,Alabama3@groupemusique.com,w;u=?j^[nRHs@8HpynRu,True
D|fNi_;<nF,AlanStivell@groupemusique.com,_~~aNMfbkI~2_LW<R5?},False
~8Xd~4z|Gl,AlbertHammondJr@groupemusique.com,4oA73y9Bku_gHlUjv:4,True
UVBgt98|Jz,AlecMetric(Live)@groupemusique.com,aEZxmeJgZUCvtNoFRz[z,True
[PSE|ijrL^,Alee@groupemusique.com,?BwbVpNW9QeU@k>{;W_,False
WrThNCLmsB,AlejandroEscovedo@groupemusique.com,?PsiVWuegx[FyqiSGcg,True
hhdW7J9bQc,AlexanderKowalski@groupemusique.com,j@x45By]uZOnjdrQQPc[,True
?Efi3O4]:F,AlexanderTucker@groupemusique.com,|LU?D5r4bP2a`B;j@~Kg,False
Sse}Q>ZQ?H,AlexGrenier@groupemusique.com,DFuPxeKF>TiKTX6fQUY6,True
M_^hXXbVaE,AliHassanKuban@groupemusique.com,2IYX`~E;oP_umW2MlKOk,True
9|^|FjBk[[,AllianceEthnik@groupemusique.com,u_i<{qQp52;S:?@|NYj,False
}SpmiWCoo?,Alphaat@groupemusique.com,No:S8x`}Kh`Q2`taV{Q?,False
h^YGDa`zwd,Alphabet@groupemusique.com,4bAvnf}<i[6hbJ@r{[?l,True
8}ZEP?h|a6,Alsarah&TheNubatones@groupemusique.com,VnQUC>TkXOmvtVZ^YX@],False
d}bm<8D5iN,Amadou&Mariam@groupemusique.com,SbnIdBdqTq|79Hli3@Dn,True
ggTM3j}cKP,AmonTobin@groupemusique.com,A0o8SBRqmZHgw6Mi@mxu,True
cPKjX}Cg0u,AmpFiddler@groupemusique.com,?1UKS}S^Ry6vlksDfvE~,True
g3icgXRl@8,AnchesDooTooCoolDuo@groupemusique.com,K:R0^Xnp7HJ0KvAIK}x9,True
jS0~RaXeQy,AndreBratten@groupemusique.com,<J:bCoOn>SeIaAX5}y=,False
]Jy=CbCyie,AndréRoque@groupemusique.com,Fw5P2dXeS{p=tRuTQU,False
Cx~G6bg:d=,AndrewMore@groupemusique.com,0OW@@2zjPv2ROI=d1fR,True
\.

--la table artistes
COPY trans._groupe(pseudo,nom,pays,ville,dateDecreation) FROM STDIN DELIMITER ',' CSV;
Eb@Hs[XFhl,1000 Names,Bulgarie,,2006
]rNbz>f`^@,12 Rounds,Etats-Unis,Madison,
~g7tH5Rq~{,13th Hole,France,Rennes,
O8P2{cI0Em,22 Pistepirkko,Finlande,Utajärvi,1980
dePx84zTBV,24.7 Spyz,Etats-Unis,New-York,1986
cv6yQ>SI|`,2 Bal 2 Neg',France,Chelles,1989
_x^|Y0@9lG,2 Many Djs,Belgique,,
w@3mJR6g@,3 Mustaphas 3,Royaume-Uni,Londres,1985
^rRux@Ri~,4 ??????? ?????,Russie,,
[oBmFC=k@0,50 Miles From Vancouver,France,Brest,2009
Aq@6@8>UJo,64 Dollar Question,France,Caen,2005
X71Kkyhm7Y,69,France,,2007
3>gmnEn1s~,78 RPM Selector,Inde,,2008
jIjiPnT[Ia,808 State,Royaume-Uni,Manchester,
@SnQ>Sx;tZ,Abraham Inc.,Royaume-Uni,,2008
Wd0th^G_||,Abstrackt Keal Agram,France,Morlaix,
M{9_eF=Ytn,Accrorap,France,,1993
}~Y>EF<5Hc,Ace,France ,Nancy,
}75qb?6LGT,Acid Arab,France,Paris,2012
ae8oDjV[[X,Acid Brass,Royaume-Uni,,
5_2|_5gthk,AD,France,Rennes,2008
XVBNNH^;iU,A.D.O.R.,Etats-Unis,Mount Vernon,
50Mm<@azJh,Adrian Veidt,France,Rennes,2012
Yk@9FW1[tg,Aeroplane,Belgique,,
KMMNNu7>jq,Aesop Rock,Etats-Unis ,New-York,
mD@=9dyIr:,Affection Place,France,Lyon,1978
VPc4H4gX;,Africa Unite,Italie ,Turin,1981
ZO~rVh3ZK,Afro Celt Sound System,Royaume-Uni,Londres,1995
8xx0wagN|o,Afro Jazz,France,,
0E8bTqh`tj,Agent Side Grinder,Suède,,2005
s^XJ;}>HyB,Age of Chance,Royaume-Uni,Leeds,1985
?Qo:2`kcCg,Agoria,France,Lyon,1999
_lt_EoA^Bo,Aï,France,Paris,
Z0:byN}fDB,Aipa'Atout,France,Rennes,
GZBup4U9MC,Aïsha Kandisha's Jarring Effects,Maroc,,1988
S[N1M@2wCn,Aïwa,France ,Rennes,
<US~Kexwa5,Aj Croce,Etats-Unis,San Diego,
Sy<abpmN9S,Akabu,Royaume-Uni,,1988
Y1Lxk8s{X>,Aktuel Force,France,,1984
AwQgRjbs;z,Alabama 3,Royaume-Uni,Londres,1989
D|fNi_;<nF,Alan Stivell,France,,Fin 1960's
~8Xd~4z|Gl,Albert Hammond Jr,Etats-Unis ,New-York,1998
UVBgt98|Jz,Alec Metric (Live),Royaume-Uni,,2005
[PSE|ijrL^,Alee,France ,Rennes,2002
WrThNCLmsB,Alejandro Escovedo,Etats-Unis,Austin,Milieu 1970's
hhdW7J9bQc,Alexander Kowalski,Allemagne,Berlin,
?Efi3O4]:F,Alexander Tucker,Royaume-Uni,Londres,2000
Sse}Q>ZQ?H,Alex Grenier,France,,2000
M_^hXXbVaE,Ali Hassan Kuban,Egypte,Le Caire,1942
9|^|FjBk[[,Alliance Ethnik,France,Creil,1990
}SpmiWCoo?,Alphaat,France,Nantes,2010
h^YGDa`zwd,Alphabet,France,Rennes,2011
8}ZEP?h|a6,Alsarah & The Nubatones,Soudan,,2010 / Alsarah seule : première moitié des années 2000
d}bm<8D5iN,Amadou & Mariam,Mali,Bamako,1980
ggTM3j}cKP,Amon Tobin,Brésil,,
cPKjX}Cg0u,Amp Fiddler,Etats-Unis ,Detroit,
g3icgXRl@8,Anches Doo Too Cool Duo,France,Rennes,1978
jS0~RaXeQy,Andre Bratten,Norvège,Oslo,2013
]Jy=CbCyie,André Roque,France ,Rennes,
Cx~G6bg:d=,Andrew More,France,Paris,
\.

--l'utilisateur atm
insert into _atm VALUES('htrIo^07za'); 

--la table reservation
COPY trans._reservation(etat,h_reserv,ville,nomLieu,login) FROM STDIN DELIMITER ',' CSV;
validée,2016-12-16 20:30,Saint-Malo,L'Omnibus,Eb@Hs[XFhl
validée,2016-12-16 21:30,Saint-Malo,L'Omnibus,]rNbz>f`^@
validée,2016-12-16 22:30,Saint-Malo,L'Omnibus,~g7tH5Rq~{
validée,2016-12-16 23:30,Saint-Malo,L'Omnibus,O8P2{cI0Em
validée,2016-12-16 19:30,Saint-Malo,L'Omnibus,dePx84zTBV
validée,2016-12-16 19:30,La Roche-sur-Yon,Le Fuzz'Yon,cv6yQ>SI|`
validée,2016-12-16 19:30,Rennes,Village,_x^|Y0@9lG
validée,2016-12-16 19:30,Rennes,FNAC,w@3mJR6g@
validée,2016-12-16 19:30,Rennes,Le Pub Gallery,^rRux@Ri~
validée,2016-12-16 19:30,Janzé,Ecole intercomunale de musique du pays de la Roche-aux-fées,[oBmFC=k@0
attente,2016-12-16 19:30,Saint-Lô,Le Normandy,Aq@6@8>UJo
attente,2016-12-16 19:30,Bruz,Parc des Expositions - Hall 8,X71Kkyhm7Y
attente,2016-12-16 19:30,Morlaix,Coatélan,3>gmnEn1s~
attente,2016-12-16 19:30,Rennes,Liberté Haut,jIjiPnT[Ia
attente,2016-12-16 19:30,Saint-Aubin-du-Cormier ,Espace Bel-Air,@SnQ>Sx;tZ
refusée,2016-12-16 19:30,Moscou,Arena 09,Wd0th^G_||
refusée,2016-01-17 19:30,Bruz,Parc des Expositions - L'Atelier,M{9_eF=Ytn
refusée,2016-01-17 19:30,Bruz,Parc des Expositions - Green Room,}~Y>EF<5Hc
refusée,2016-01-17 19:30,Saint-Jacques-de-la-Lande,Aire Libre,}75qb?6LGT
\.

CREATE TABLE POSTE(
	ID SERIAL PRIMARY KEY,
	NAME VARCHAR(20) UNIQUE,
	ISADMIN INT DEFAULT 0
);

CREATE TABLE IF NOT EXISTS SOCIETY (
	ID SERIAL PRIMARY KEY NOT NULL,
	NAME VARCHAR(60) NOT NULL UNIQUE,
	OBJECT VARCHAR(60),
	LEADER VARCHAR(60) NOT NULL,
	RESIDENCE VARCHAR(100) NOT NULL,
	ADDRESS VARCHAR(100) NOT NULL,
	TEL VARCHAR(40) NOT NULL,
	EMAIL VARCHAR(40) NOT NULL,
	DATE_CREATION DATE
);

CREATE TABLE IF NOT EXISTS USERS (
	ID SERIAL PRIMARY KEY,
	FIRSTNAME VARCHAR(100),
	LASTNAME VARCHAR(100),
	EMAIL VARCHAR(60) NOT NULL,
	PASSWORD VARCHAR(60) NOT NULL,
	IDPOSTE INT,
	FOREIGN KEY (IDPOSTE) REFERENCES POSTE(ID),
	UNIQUE (EMAIL,PASSWORD)
);

CREATE TABLE IF NOT EXISTS ADMINISTRATION(
	ID SERIAL PRIMARY KEY,
	NAME VARCHAR (60) UNIQUE,
	REF VARCHAR(4) UNIQUE
);

CREATE TABLE IF NOT EXISTS DOCUMENT(
	IDADMINISTRATION INT,
	NUMERO VARCHAR(25) UNIQUE,
	DOCUMENT VARCHAR(100) UNIQUE,
	FOREIGN KEY (IDADMINISTRATION) REFERENCES ADMINISTRATION(ID)
);

CREATE TABLE IF NOT EXISTS PLAN_GENERAL(
	ID SERIAL PRIMARY KEY,
	INTITULE VARCHAR(35),
	DEBUT INT UNIQUE NOT NULL,
	FIN INT UNIQUE NOT NULL,
	REPORT INT  DEFAULT 0,
	DEFAULT_TYPE INT  DEFAULT 0,
	CHECK(FIN > DEBUT)
);
CREATE TABLE IF NOT EXISTS PLAN_COMPTABLE (
	ID SERIAL PRIMARY KEY,
	NUM_COMPTE INT NOT NULL UNIQUE,
	NOM_COMPTE VARCHAR(35) NOT NULL UNIQUE
);
CREATE TABLE IF NOT EXISTS CODE_DE_JOURNAL(
	ID SERIAL PRIMARY KEY,
	CODE  VARCHAR(3) NOT NULL UNIQUE,
	LIBELLE VARCHAR (35)
);

CREATE TABLE IF NOT EXISTS TYPE_TIERS(
	ID SERIAL PRIMARY KEY,
	INTITULE VARCHAR(15) NOT NULL UNIQUE,
	RACINE VARCHAR(5) NOT NULL UNIQUE
);
CREATE TABLE IF NOT EXISTS COMPTE_TIERS(
	ID SERIAL PRIMARY KEY,
	NUMERO INT NOT NULL UNIQUE,
	NAME VARCHAR(35), 
	TYPE_TIERS INT NOT NULL,
	FOREIGN KEY (TYPE_TIERS) REFERENCES TYPE_TIERS(ID),
	UNIQUE(NAME, TYPE_TIERS)

);

CREATE TABLE IF NOT EXISTS EXERCICE (
	ID SERIAL PRIMARY KEY,
	DEBUT DATE,
	DUREE SMALLINT DEFAULT 12,
	TVA FLOAT DEFAULT 20,
	SOLDE FLOAT
);

CREATE TABLE IF NOT EXISTS OPERATION (
	ID SERIAL PRIMARY KEY,
	CODE INT NOT NULL,
	DATE DATE NOT NULL,
	COMPTE INT NOT NULL,
	TYPE INT ,
	VALEUR FLOAT NOT NULL,
	PIECE VARCHAR(40) UNIQUE,
	FOREIGN KEY (COMPTE) REFERENCES PLAN_COMPTABLE(ID),
	FOREIGN KEY (CODE) REFERENCES CODE_DE_JOURNAL(ID)
);

CREATE TABLE IF NOT EXISTS DETAIL_OPERATION (
	ID SERIAL PRIMARY KEY,
	IDOPERATION INT,
	IDTIERS INT,
	FOREIGN KEY (IDTIERS) REFERENCES COMPTE_TIERS(ID),
	FOREIGN KEY (IDOPERATION) REFERENCES OPERATION(ID)
);


























-- INSERT INTO SOCIETY (NAME,LEADER,RESIDENCE,ADDRESS,TEL,EMAIL,DATE_CREATION) VALUES('AAA','AAA','AAA','AAA','AAA','AAA',NOW());

-- ALTER TABLE USERS ADD CONSTRAINT CUSTOM_USER_POST FOREIGN KEY(IDPOSTE) REFERENCES POSTE(ID) ON DELETE RESTRICT;
-- ALTER TABLE USERS ADD CONSTRAINT CUSTOM_USER_SOCIETY FOREIGN KEY(IDSOCIETY) REFERENCES SOCIETY(ID) ON DELETE RESTRICT;

-- ALTER TABLE DOCUMENT ADD CONSTRAINT CUSTOM_DOC_ADMIN FOREIGN KEY(IDADMINISTRATION) REFERENCES ADMINISTRATION(ID) ON DELETE RESTRICT;
-- ALTER TABLE DOCUMENT ADD CONSTRAINT CUSTOM_DOC_SOCIETY FOREIGN KEY(IDSOCIETY) REFERENCES SOCIETY(ID) ON DELETE RESTRICT;

-- ALTER TABLE CODE_DE_JOURNAL ADD CONSTRAINT CUSTOM_CODE_SOCIETY FOREIGN KEY(IDSOCIETY) REFERENCES SOCIETY(ID) ON DELETE RESTRICT;

-- ALTER TABLE PLAN_COMPTABLE ADD CONSTRAINT CUSTOM_COMPTABLE_SOCIETY FOREIGN KEY(IDSOCIETY) REFERENCES SOCIETY(ID) ON DELETE RESTRICT;

-- ALTER TABLE COMPTE_TIERS ADD CONSTRAINT CUSTOM_PLAN_COMPTE FOREIGN KEY(COMPTE) REFERENCES PLAN_COMPTABLE(ID) ON DELETE RESTRICT;
-- ALTER TABLE COMPTE_TIERS ADD CONSTRAINT CUSTOM_PLAN_SOCIETY FOREIGN KEY(IDSOCIETY) REFERENCES SOCIETY(ID) ON DELETE RESTRICT;

-- INSERT INTO PLAN_COMPTABLE (IDSOCIETY,NUM_COMPTE,NOM_COMPTE) VALUES(1,2000,'ACHAT');

-- -- INSERT INTO COMPTE_TIERS (NAME,COMPTE,IDSOCIETY) VALUES('GERAR',35,1);

INSERT INTO POSTE (NAME,ISADMIN) VALUES('PDG',1),
('COMPTABLE',0),
('EXPERT COMPTABLE',0);

-- INSERT INTO ADMINISTRATION(NAME,REF) VALUES('NUMERO D IDENTITE FISCALE','NIF'),
-- ('NUMERO C R S','NCRS'),
-- ('NUMERO STATISTIQUE','NS');

-- INSERT INTO CODE_DE_JOURNAL (CODE,LIBELLE)VALUES
-- ('AN','code des a-nouveaux'),
-- ('BQ','Journal de banqe ou de CCP'),
-- ('CA','caisse'),
-- ('CE','journal des cheques a encaisser'),
-- ('DC','dons et cotisations'),
-- ('HA','journal des achats'),
-- ('VT','ventes'),
-- ('SL','journal des salaires '),
-- ('OD','operation diverses');

INSERT INTO USERS (FIRSTNAME, LASTNAME, EMAIL, PASSWORD, IDPOSTE) VALUES
('RANDRIA', 'Kanto', 'nk@gmail.mg', '12345', 1),
('RANDRIA', 'Isabelle', 'isa@gmail.mg', '12345', 3),
('RAKOTO', 'Zo', 'zo@gmail.mg', '12345', 2);

-- INSERT INTO PLAN_COMPTABLE (NUM_COMPTE, NOM_COMPTE) VALUES(10100,'CAPITAL'),
-- (10610,'RESERVE LEGALE'),
-- (10620,'RESERVES STATUTAIRES'),
-- (11000,'REPORT A NOUVEAU'),
-- (11010,'REPORT A NOUVEAU SOLDE CREDITEUR'),
-- (11200,'AUTRES PRODUITS ET CHARGES'),
-- (11900,'REPORT A NOUVEAU SOLDE DEBITEUR'),
-- (12800,'RESULTAT EN INSTANCE'),
-- (13100,'SUBVENTION D EQUIPEMENT'),
-- (13300,'IMPOTS DIFFERES ACTIFS'),
-- (16110,'EMPRUNT A LT'),
-- (16510,'EMPRUNT A MT'),
-- (20124,'FRAIS DE REHABILITATION'),
-- (20800,'AUTRES IMMOB INCORP'),
-- (21100,'TERRAINS'),
-- (21200,'CONSTRUCTION'),
-- (21300,'MATERIEL ET OUTILLAGE'),
-- (21510,'MATERIEL AUTOMOBILE'),
-- (21520,'MATERIEL MOTO'),
-- (21600,'AGENCEMENT .AM .INST'),
-- (21810,'MATERIELS ET MOBILIERS DE BUREAU'),
-- (21819,'MATERIELS INFORMATIQUES ET AUTRES'),
-- (21820,'MATERIELS MOB DE LOGEMENT'),
-- (21880,'AUTRES IMMOBILISATIONS CORP'),
-- (23000,'IMMOB EN COURS'),
-- (28000,'AMORT IMMOB INCORP'),
-- (28120,'AMORT DES CONSTRUCTIONS'),
-- (28130,'AMORT MACH-MATER-OUTIL'),
-- (28150,'AMORT MAT DE TRANSPORT'),
-- (28160,'AMORT A.A.I'),
-- (28181,'AMORT MATERIEL&MOB'),
-- (28182,'AMORT MATERIELS INFORMATIQUES'),
-- (28183,'AMORT MATER & MOB LOGT'),
-- (32110,'STOCK MATIERES PREMIERES'),
-- (32120,'PETITES FOURNITURES');



-- INSERT INTO OPERATION (COMPTE, TYPE, VALEUR, PIECE) VALUES (1,1,94352,'7'),
-- (1,1,10000,'1'),
-- (1,1,20010,'2'),
-- (2,1,21340,'3'),
-- (2,1,34322,'4'),
-- (3,1,39010,'8'),
-- (1,1,23432,'6'),
-- (4,1,23402,'9'),
-- (4,1,13423,'10'),
-- (8,1,23401,'11'),
-- (8,1,45093,'12'),
-- (8,1,23412,'5'),
-- (2,1,98450,'18'),
-- (3,1,43553,'16'),
-- (6,0,45093,'17'),
-- (6,0,23412,'15'),
-- (6,0,98450,'14'),
-- (6,0,43553,'13'),
-- (20,0,23412,'19'),
-- (20,0,98450,'20'),
-- (20,0,43553,'21');
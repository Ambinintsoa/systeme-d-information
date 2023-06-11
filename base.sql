CREATE SEQUENCE SEQ_OPERATION;

CREATE TABLE
    POSTE(
        ID SERIAL PRIMARY KEY,
        NAME VARCHAR(20) UNIQUE,
        ISADMIN INT DEFAULT 0
    );

CREATE TABLE
    IF NOT EXISTS SOCIETY (
        ID SERIAL PRIMARY KEY NOT NULL,
        NAME VARCHAR(60) NOT NULL UNIQUE,
        OBJECT VARCHAR(60),
        LEADER VARCHAR(60) NOT NULL,
        RESIDENCE VARCHAR(100) NOT NULL,
        ADDRESS VARCHAR(100) NOT NULL,
        TEL VARCHAR(40) NOT NULL,
        EMAIL VARCHAR(40) NOT NULL,
        DATE_CREATION DATE,
        LOGO VARCHAR(40) NOT NULL
    );

CREATE TABLE
    IF NOT EXISTS USERS (
        ID SERIAL PRIMARY KEY,
        FIRSTNAME VARCHAR(100),
        LASTNAME VARCHAR(100),
        EMAIL VARCHAR(60) NOT NULL,
        PASSWORD VARCHAR(60) NOT NULL,
        IDPOSTE INT,
        FOREIGN KEY (IDPOSTE) REFERENCES POSTE(ID),
        UNIQUE (EMAIL, PASSWORD)
    );

CREATE TABLE
    IF NOT EXISTS ADMINISTRATION(
        ID SERIAL PRIMARY KEY,
        NAME VARCHAR (60) UNIQUE,
        REF VARCHAR(4) UNIQUE
    );

CREATE TABLE
    IF NOT EXISTS DOCUMENT(
        IDADMINISTRATION INT,
        NUMERO VARCHAR(25) UNIQUE,
        DOCUMENT VARCHAR(100) UNIQUE,
        FOREIGN KEY (IDADMINISTRATION) REFERENCES ADMINISTRATION(ID)
    );

CREATE TABLE
    IF NOT EXISTS PLAN_GENERAL(
        ID SERIAL PRIMARY KEY,
        INTITULE VARCHAR(35),
        DEBUT INT UNIQUE NOT NULL,
        FIN INT UNIQUE NOT NULL,
        REPORT INT DEFAULT 0,
        DEFAULT_TYPE INT DEFAULT 0,
        CHECK(FIN > DEBUT)
    );

CREATE TABLE
    IF NOT EXISTS PLAN_COMPTABLE (
        ID SERIAL PRIMARY KEY,
        NUM_COMPTE INT NOT NULL UNIQUE,
        NOM_COMPTE VARCHAR(60) NOT NULL UNIQUE,
        CORPO INT DEFAULT 0
    );

CREATE TABLE
    IF NOT EXISTS CODE_DE_JOURNAL(
        ID SERIAL PRIMARY KEY,
        CODE VARCHAR(3) NOT NULL UNIQUE,
        LIBELLE VARCHAR (35)
    );

CREATE TABLE
    IF NOT EXISTS TYPE_TIERS(
        ID SERIAL PRIMARY KEY,
        INTITULE VARCHAR(15) NOT NULL UNIQUE,
        RACINE VARCHAR(5) NOT NULL UNIQUE
    );

CREATE TABLE
    IF NOT EXISTS COMPTE_TIERS(
        ID SERIAL PRIMARY KEY,
        NUMERO INT NOT NULL UNIQUE,
        NAME VARCHAR(35),
        TYPE_TIERS INT NOT NULL,
        FOREIGN KEY (TYPE_TIERS) REFERENCES TYPE_TIERS(ID),
        UNIQUE(NAME, TYPE_TIERS)
    );

CREATE TABLE
    IF NOT EXISTS EXERCICE (
        ID SERIAL PRIMARY KEY,
        DEBUT DATE,
        DUREE SMALLINT DEFAULT 12,
        TVA FLOAT DEFAULT 20,
        SOLDE FLOAT
    );

CREATE TABLE
    IF NOT EXISTS OPERATION (
        ID SERIAL PRIMARY KEY,
        IDEXERCICE INT NOT NULL,
        NUM_OPERATION INT NOT NULL,
        CODE INT NOT NULL,
        DATE DATE NOT NULL,
        COMPTE INT NOT NULL,
        TYPE INT,
        VALEUR FLOAT NOT NULL,
        PIECE VARCHAR(40),
        FOREIGN KEY (IDEXERCICE) REFERENCES EXERCICE(ID),
        FOREIGN KEY (COMPTE) REFERENCES PLAN_COMPTABLE(ID),
        FOREIGN KEY (CODE) REFERENCES CODE_DE_JOURNAL(ID)
    );

CREATE TABLE
    IF NOT EXISTS DETAIL_OPERATION (
        ID SERIAL PRIMARY KEY,
        IDOPERATION INT,
        IDTIERS INT,
        FOREIGN KEY (IDTIERS) REFERENCES COMPTE_TIERS(ID),
        FOREIGN KEY (IDOPERATION) REFERENCES OPERATION(ID)
    );

CREATE TABLE
    IF NOT EXISTS DEVISE (
        ID SERIAL PRIMARY KEY,
        NAME VARCHAR(30),
        EQUIVALENCE NUMERIC
    );

CREATE TABLE
    IF NOT EXISTS UNITE (
        ID SERIAL PRIMARY KEY,
        NOM VARCHAR(30)
    );

CREATE TABLE
    IF NOT EXISTS PRODUIT (
        ID SERIAL PRIMARY KEY,
        NOM VARCHAR(30),
        IDUNITE INTEGER,
        PRIX NUMERIC,
        FOREIGN KEY (IDUNITE) REFERENCES UNITE(ID)
    );

CREATE TABLE
    IF NOT EXISTS CENTRE (
        ID SERIAL PRIMARY KEY,
        NOM VARCHAR(30),
        ISFONCTION SMALLINT DEFAULT 1
    );

CREATE TABLE
    IF NOT EXISTS NATURE (
        ID SERIAL PRIMARY KEY,
        NOM VARCHAR(30)
    );

CREATE TABLE
    IF NOT EXISTS COMPTE_PRODUIT_CENTRE (
        IDCOMPTE INT,
        IDPRODUIT INT,
        IDCENTRE INT,
        CRPRODUIT NUMERIC,
        CRNATURE NUMERIC,
        CRCENTRE NUMERIC,
        PRIXUNITE NUMERIC,
        QUANTITE INT,
        IDNATURE INT,
        DATE DATE DEFAULT NOW(),
        FOREIGN KEY (IDNATURE) REFERENCES NATURE(ID),
        FOREIGN KEY (IDCOMPTE) REFERENCES PLAN_COMPTABLE(ID),
        FOREIGN KEY (IDPRODUIT) REFERENCES PRODUIT(ID),
        FOREIGN KEY (IDCENTRE) REFERENCES CENTRE(ID)
    );

CREATE TABLE
    IF NOT EXISTS STRUCTURE_FONCTION (
        ID SERIAL PRIMARY KEY,
        IDCENTRESTRUCT INTEGER,
        IDCENTREFONCT INTEGER,
        POURCENTAGE NUMERIC,
        DATE DATE DEFAULT NOW(),
        FOREIGN KEY (IDCENTRESTRUCT) REFERENCES CENTRE (ID),
        FOREIGN KEY (IDCENTREFONCT) REFERENCES CENTRE (ID), 
    );

CREATE TABLE
    IF NOT EXISTS SUPPLETIVE (
        ID SERIAL PRIMARY KEY,
        CHARGE NUMERIC,
        RAISON VARCHAR(100)
    );

CREATE TABLE
    IF NOT EXISTS FACTURE (
        ID SERIAL PRIMARY KEY,
        DATE DATE,
        IDPRODUIT INT,
        IDECRITURE INT,
        OBJET TEXT,
        ACCOMPTE NUMERIC,
        FOREIGN KEY (IDPRODUIT) REFERENCES PRODUIT(ID),
        FOREIGN KEY (IDECRITURE) REFERENCES OPERATION(ID),
    );

INSERT INTO
    DEVISE (NAME, EQUIVALENCE)
VALUES ('ARIARY', 1), ('EURO', 5000), ('DOLLAR', 4500);

INSERT INTO NATURE (NOM) VALUES
('FIXE'),
('VARIABLE');

INSERT INTO CENTRE (NOM) VALUES
('ADM/DIST'),
('USINE'),
('PLANTATION');

INSERT INTO COMPTE_PRODUIT_CENTRE (IDCOMPTE, IDCENTRE, CRNATURE, CRCENTRE, PRIXUNITE, QUANTITE, IDNATURE) VALUES
(37, 3, 100, 100, 4321600, 1, 2),
(38, 3, 100, 100, 60000000, 1, 2),
(40, 2, 100, 95, 4446700, 1, 2),
(40, 3, 100, 5, 4446700, 1, 2),
(41, 1, 100, 100, 2783700, 1, 1),
(42, 1, 100, 30, 14373200, 1, 2),
(42, 3, 100, 70, 14373200, 1, 2),
(43, 1, 100, 15, 34637200, 1, 2),
(43, 2, 100, 80, 34637200, 1, 2),
(43, 3, 100, 5, 34637200, 1, 2),
(44, 1, 100, 10, 35675400, 1, 2),
(44, 2, 100, 30, 35675400, 1, 2),
(44, 3, 100, 60, 35675400, 1, 2),
(45, 1, 100, 10, 9742000, 1, 1),
(45, 2, 100, 30, 9742000, 1, 1),
(45, 3, 100, 60, 9742000, 1, 1),
(46, 1, 100, 15, 4987300, 1, 2),
(46, 2, 100, 70, 4987300, 1, 2),
(46, 3, 100, 15, 4987300, 1, 2),
(48, 1, 100, 100, 450900, 1, 1),
(49, 1, 100, 60, 8236300, 1, 1),
(49, 2, 100, 40, 8236300, 1, 1),
(50, 1, 100, 100, 789500, 1, 2),
(51, 1, 100, 100, 8358100, 1, 2),
(52, 1, 100, 100, 3200000, 1, 2),
(53, 1, 100, 40, 1934000, 1, 2),
(53, 2, 100, 30, 1934000, 1, 2),
(53, 3, 100, 30, 1934000, 1, 2),
(54, 1, 100, 100, 16222500, 1, 1),
(55, 1, 100, 40, 31523800, 1, 2),
(55, 2, 100, 30, 31523800, 1, 2),
(55, 3, 100, 30, 31523800, 1, 2),
(56, 1, 100, 40, 3142800, 1, 2),
(56, 2, 100, 30, 3142800, 1, 2),
(56, 3, 100, 30, 3142800, 1, 2),
(57, 3, 100, 100, 31784800, 1, 2),
(58, 1, 100, 35, 5029800, 1, 1),
(58, 2, 100, 35, 5029800, 1, 1),
(58, 3, 100, 30, 5029800, 1, 1),
(59, 2, 100, 75, 89267100, 1, 2),
(59, 3, 100, 25, 89267100, 1, 2),
(60, 1, 100, 20, 71735100, 1, 1),
(60, 2, 100, 35, 71735100, 1, 1),
(60, 3, 100, 45, 71735100, 1, 1),
(61, 1, 100, 20, 36320600, 1, 1),
(61, 2, 100, 35, 36320600, 1, 1),
(61, 3, 100, 45, 36320600, 1, 1),
(62, 1, 100, 100, 654600, 1, 1),
(63, 1, 100, 40, 15956700, 1, 2),
(63, 2, 100, 30, 15956700, 1, 2),
(63, 3, 100, 30, 15956700, 1, 2),
(64, 1, 100, 25, 28639600, 1, 1),
(64, 2, 100, 70, 28639600, 1, 1),
(64, 3, 100, 5, 28639600, 1, 1),
(65, 1, 100, 100, 23007600, 1, 2);

-- INSERT INTO PLAN_COMPTABLE (NUM_COMPTE, NOM_COMPTE) VALUES
-- (60120, 'ACHAT SEMENCE'),
-- (60110, 'ACHAT ENGRAIS&ASSIMILES'),
-- (60260, 'ACHAT EMBALLAGE'),
-- (62240, 'FOURNIT DE MAGASIN'),
-- (62242, 'FOURNIT BUR'),
-- (62232, 'PIECE RECH VEHICULES'),
-- (60610, 'EAU ET ELECTRICITE'),
-- (60620, 'GAZ, COMBUST, CARBURANT, LUBRIF'),
-- (61300, 'LOCATION TERRAINS'),
-- (61500, 'ENTRETIENS ET REPARATIONS'),
-- (61600, 'ASSURANCES'),
-- (62602, 'PHOTOCOPIE'),
-- (62600, 'TELEPHONE'),
-- (62601, 'ENVOI COLIS'),
-- (62260, 'HONORAIRES'),
-- (62400, 'FRAIS DE TRANSPORT'),
-- (62510, 'VOYAGES ET DEPLACEMENTS'),
-- (62560, 'MISSION'),
-- (62700, 'COMMISSION BANQUE'),
-- (61000, 'AUTRES CHARGES EXTERNES'),
-- (62702, 'CUEILLEURS'),
-- (63000, 'IMPOTS ET TAXES'),
-- (64111, 'SALAIRES M.O.TEMPORAIRES'),
-- (64110, 'SALAIRES PERMANENTS'),
-- (65110, 'CNAPS COTISATION PATRONALE'),
-- (65111, 'ORGANISME SANITAIRE'),
-- (65120, 'AUTRES CHARGES DU PERSONNEL'),
-- (68100, 'AMORTISSEMENTS'),
-- (66000, 'CHARGES FINANCIERES');





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

INSERT INTO
    POSTE (NAME, ISADMIN)
VALUES ('PDG', 1), ('COMPTABLE', 0), ('EXPERT COMPTABLE', 0);

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

INSERT INTO
    USERS (
        FIRSTNAME,
        LASTNAME,
        EMAIL,
        PASSWORD,
        IDPOSTE
    )
VALUES (
        'RANDRIA',
        'Kanto',
        'nk@gmail.mg',
        '12345',
        1
    ), (
        'RANDRIA',
        'Isabelle',
        'isa@gmail.mg',
        '12345',
        3
    ), (
        'RAKOTO',
        'Zo',
        'zo@gmail.mg',
        '12345',
        2
    );

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
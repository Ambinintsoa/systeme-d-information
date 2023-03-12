CREATE TABLE POSTE(
    ID SERIAL PRIMARY KEY,
    NAME VARCHAR(20),
    ISADMIN INT DEFAULT 0
);
CREATE TABLE IF NOT EXISTS USERS (
    ID SERIAL PRIMARY KEY,
    FIRSTNAME VARCHAR(100),
    LASTNAME VARCHAR(100),
    EMAIL VARCHAR(60) NOT NULL,
    PASSWORD VARCHAR(60) NOT NULL,
    IDPOSTE INT
    
);
CREATE TABLE IF NOT EXISTS SOCIETY (
    ID SERIAL PRIMARY KEY NOT NULL,
    NAME VARCHAR(60) NOT NULL,
    OBJECT VARCHAR(60),
    LEADER VARCHAR(60) NOT NULL,
    RESIDENCE VARCHAR NOT NULL,
    ADDRESS VARCHAR(100) NOT NULL,
    TEL VARCHAR(40) NOT NULL,
    EMAIL VARCHAR(40) NOT NULL,
    DATE_CREATION DATE,
);
CREATE TABLE IF NOT EXISTS ADIMINISTRATION(
    ID SERIAL PRIMARY KEY,
    NAME VARCHAR (30),
    REF VARCHAR(4)
);

CREATE TABLE IF NOT EXISTS DOCUMENT(
    IDSOCIETY INT FOREIGN KEY REFERENCES SOCIETY(ID),
    IDADMINISTRATION INT FOREIGN KEY  REFERENCES ADIMINISTRATION(ID),
    DOCUMENT VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS PLAN_COMPTABLE (
    ID SERIAL PRIMARY KEY,
    IDSOCIETY INT FOREIGN KEY REFERENCES SOCIETY(ID),
    NUM_COMPTE INT NOT NULL,
    NOM_COMPTE VARCHAR(100) NOT NULL
);
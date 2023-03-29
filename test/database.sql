CREATE TABLE Plan_comptable (
  Compte INT PRIMARY KEY,
  Type_de_compte VARCHAR(50) NOT NULL,
  Numero_compte VARCHAR(50) NOT NULL,
  Nom_du_compte VARCHAR(255) NOT NULL 
);

-- Création de la table "Plan tiers"
CREATE TABLE Plan_tiers (
  Tiers INT PRIMARY KEY,
  Type_tiers VARCHAR(255) NOT NULL,
  Nom_du_tiers VARCHAR(255) NOT NULL,
  Autres_informations VARCHAR(255)
);

-- Création de la table "Code journal"
CREATE TABLE Code_journal (
  Code INT PRIMARY KEY,
  Description_du_code VARCHAR(255) NOT NULL
);

-- Création de la table "Journal"
CREATE TABLE Journal (
  ID_du_journal INT PRIMARY KEY,
  Date_du_journal DATE NOT NULL,
  Code INT,
  Description_du_journal VARCHAR(255),
  FOREIGN KEY (Code) REFERENCES Code_journal(Code)
);

-- Création de la table "Grand livre"
CREATE TABLE Grand_livre (
  ID_ecriture INT PRIMARY KEY,
  Date_ecriture DATE NOT NULL,
  Compte INT,
  Debit DECIMAL(10, 2),
  Credit DECIMAL(10, 2),
  ID_tiers INT,
  ID_journal INT,
  FOREIGN KEY (Compte) REFERENCES Plan_comptable(Compte),
  FOREIGN KEY (ID_tiers) REFERENCES Plan_tiers(Tiers),
  FOREIGN KEY (ID_journal) REFERENCES Journal(ID_du_journal)
);

-- Création de la table "Balance"
CREATE TABLE Balance (
  Compte INT,
  Solde_debiteur DECIMAL(10, 2),
  Solde_crediteur DECIMAL(10, 2),
  PRIMARY KEY (Compte),
  FOREIGN KEY (Compte) REFERENCES Plan_comptable(Compte)
);
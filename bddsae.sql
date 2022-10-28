CREATE TABLE Enfant(
   Id_Enfant INT AUTO_INCREMENT,
   Nom VARCHAR(50) NOT NULL,
   Prénom VARCHAR(50) NOT NULL,
   Date_Naissance DATE NOT NULL,
   Lien_Jeton VARCHAR(50),
   PRIMARY KEY(Id_Enfant)
);

CREATE TABLE Membre(
   Id_Membre INT AUTO_INCREMENT,
   Nom VARCHAR(50) NOT NULL,
   Prénom VARCHAR(50) NOT NULL,
   Adresse VARCHAR(100),
   Code_Postal CHAR(5),
   Ville VARCHAR(50),
   Courriel VARCHAR(50),
   Date_Naissance DATE NOT NULL,
   Mdp VARCHAR(50),
   Pro BOOLEAN,
   Compte_Validé BOOLEAN,
   PRIMARY KEY(Id_Membre)
);

CREATE TABLE Objectif(
   Id_Objectif INT AUTO_INCREMENT,
   Intitule VARCHAR(50),
   Nb_Jetons TINYINT,
   Durée DOUBLE,
   Lien_Image VARCHAR(50),
   Priorité INT,
   Travaillé BOOLEAN,
   Id_Membre INT NOT NULL,
   Id_Enfant INT NOT NULL,
   PRIMARY KEY(Id_Objectif),
   FOREIGN KEY(Id_Membre) REFERENCES Membre(Id_Membre),
   FOREIGN KEY(Id_Enfant) REFERENCES Enfant(Id_Enfant)
);

CREATE TABLE Message(
   Id_Message INT AUTO_INCREMENT,
   Sujet VARCHAR(50),
   Corps TEXT,
   Date_Heure DATETIME,
   Id_Objectif INT NOT NULL,
   Id_Membre INT NOT NULL,
   PRIMARY KEY(Id_Message),
   FOREIGN KEY(Id_Objectif) REFERENCES Objectif(Id_Objectif),
   FOREIGN KEY(Id_Membre) REFERENCES Membre(Id_Membre)
);

CREATE TABLE Récompense(
   Id_Récompense INT AUTO_INCREMENT,
   Intitulé VARCHAR(50),
   Descriptif TEXT,
   Lien_Image VARCHAR(50),
   PRIMARY KEY(Id_Récompense)
);

CREATE TABLE Suivre(
   Id_Enfant INT,
   Id_Membre INT,
   Date_Demande_Equipe DATE,
   Rôle VARCHAR(50),
   PRIMARY KEY(Id_Enfant, Id_Membre),
   FOREIGN KEY(Id_Enfant) REFERENCES Enfant(Id_Enfant),
   FOREIGN KEY(Id_Membre) REFERENCES Membre(Id_Membre)
);

CREATE TABLE Placer_Jeton(
   Id_Objectif INT,
   Date_Heure DATETIME,
   Id_Membre INT NOT NULL,
   PRIMARY KEY(Id_Objectif, Date_Heure),
   FOREIGN KEY(Id_Objectif) REFERENCES Objectif(Id_Objectif),
   FOREIGN KEY(Id_Membre) REFERENCES Membre(Id_Membre)
);

CREATE TABLE Lier(
   Id_Objectif INT,
   Id_Récompense INT,
   PRIMARY KEY(Id_Objectif, Id_Récompense),
   FOREIGN KEY(Id_Objectif) REFERENCES Objectif(Id_Objectif),
   FOREIGN KEY(Id_Récompense) REFERENCES Récompense(Id_Récompense)
);

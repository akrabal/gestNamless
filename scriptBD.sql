CREATE DATABASE if not exists  GESNAMLESS ;
  

CREATE Table Fournisseur(

 idFournisseur INT  AUTO_INCREMENT PRIMARY KEY ,
 NomFourniseur varchar(255),
 NomEtablisement varchar(255),
 NumeroTelephone varchar(16),
 quartierFourniseur varchar(255),
 geolocalisation VARCHAR(255)
 

);

CREATE Table Administrateur(

 idAdministrateur INT   AUTO_INCREMENT PRIMARY KEY ,   
 NomAdmin VARCHAR(255),
 Password VARCHAR(255)
 

);


CREATE Table Categorie(

 idCategorie INT  AUTO_INCREMENT PRIMARY KEY ,
 NomCategorie VARCHAR(255)
 

);

CREATE Table Produit(

 idProduit INT AUTO_INCREMENT PRIMARY KEY ,
 NomProduit VARCHAR(255),
 PrixVente varchar(255),
 prixAchat varchar(255)


);

ALTER Table Categorie;

ALTER Table Administrateur;

ALTER Table Fournisseur
add idAdministrateur int ,
add FOREIGN KEY (idAdministrateur) REFERENCES Administrateur(idAdministrateur);


ALTER Table Produit
add idFournisseur int ,
add idCategorie int ,
add FOREIGN KEY (idFournisseur) REFERENCES Fournisseur(idFournisseur),
add FOREIGN KEY (idCategorie) REFERENCES Categorie(idCategorie);



#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: role
#------------------------------------------------------------

CREATE TABLE role(
        id_role Int  Auto_increment  NOT NULL ,
        nom     Varchar (50) NOT NULL
	,CONSTRAINT role_PK PRIMARY KEY (id_role)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        id_user  Int  Auto_increment  NOT NULL ,
        login    Varchar (50) NOT NULL ,
        password Varchar (50) NOT NULL ,
        id_role  Int NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ref_histoire
#------------------------------------------------------------

CREATE TABLE ref_histoire(
        id_ref_histoire Int  Auto_increment  NOT NULL ,
        nom             Varchar (255) NOT NULL ,
        auteur          Varchar (255) NOT NULL ,
        avis            Decimal NOT NULL
	,CONSTRAINT ref_histoire_PK PRIMARY KEY (id_ref_histoire)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: histoire
#------------------------------------------------------------

CREATE TABLE histoire(
        id_histoire     Int  Auto_increment  NOT NULL ,
        id_ref_histoire Int NOT NULL
	,CONSTRAINT histoire_PK PRIMARY KEY (id_histoire)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ref_objet
#------------------------------------------------------------

CREATE TABLE ref_objet(
        id_ref_objet Int  Auto_increment  NOT NULL ,
        nom          Varchar (255) NOT NULL
	,CONSTRAINT ref_objet_PK PRIMARY KEY (id_ref_objet)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ref_slot
#------------------------------------------------------------

CREATE TABLE ref_slot(
        id_ref_slot Int  Auto_increment  NOT NULL ,
        nom         Varchar (255) NOT NULL
	,CONSTRAINT ref_slot_PK PRIMARY KEY (id_ref_slot)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ref_stat
#------------------------------------------------------------

CREATE TABLE ref_stat(
        id_ref_stat Int  Auto_increment  NOT NULL ,
        nom         Varchar (255) NOT NULL
	,CONSTRAINT ref_stat_PK PRIMARY KEY (id_ref_stat)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: detail_histoire
#------------------------------------------------------------

CREATE TABLE detail_histoire(
        id_detail_histoire Int  Auto_increment  NOT NULL ,
        contenue           Longtext NOT NULL ,
        id_histoire        Int NOT NULL
	,CONSTRAINT detail_histoire_PK PRIMARY KEY (id_detail_histoire)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ref_equipement
#------------------------------------------------------------

CREATE TABLE ref_equipement(
        id_ref_equipement Int  Auto_increment  NOT NULL ,
        nom               Varchar (255) NOT NULL
	,CONSTRAINT ref_equipement_PK PRIMARY KEY (id_ref_equipement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: sauvegarde
#------------------------------------------------------------

CREATE TABLE sauvegarde(
        id_sauvegarde Int  Auto_increment  NOT NULL ,
        id_personnage Int NOT NULL ,
        id_user       Int NOT NULL ,
        id_histoire   Int NOT NULL
	,CONSTRAINT sauvegarde_PK PRIMARY KEY (id_sauvegarde)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: equipement
#------------------------------------------------------------

CREATE TABLE equipement(
        id_equipement     Int NOT NULL ,
        valeur            Int NOT NULL ,
        id_ref_slot       Int NOT NULL ,
        id_personnage     Int NOT NULL ,
        id_ref_equipement Int NOT NULL
	,CONSTRAINT equipement_PK PRIMARY KEY (id_equipement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: inventaire
#------------------------------------------------------------

CREATE TABLE inventaire(
        id_inventaire                   Int  Auto_increment  NOT NULL ,
        nbr_emplacement_dans_inventaire Int NOT NULL ,
        id_personnage                   Int NOT NULL
	,CONSTRAINT inventaire_PK PRIMARY KEY (id_inventaire)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: personnage
#------------------------------------------------------------

CREATE TABLE personnage(
        id_personnage  Int  Auto_increment  NOT NULL ,
        nom_personnage Varchar (50) NOT NULL ,
        id_inventaire  Int NOT NULL ,
        id_sauvegarde  Int NOT NULL
	,CONSTRAINT personnage_PK PRIMARY KEY (id_personnage)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: stat_personnage
#------------------------------------------------------------

CREATE TABLE stat_personnage(
        id_stat_personnage Int NOT NULL ,
        valeur             Int NOT NULL ,
        id_ref_stat        Int NOT NULL ,
        id_personnage      Int NOT NULL
	,CONSTRAINT stat_personnage_PK PRIMARY KEY (id_stat_personnage)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: objet
#------------------------------------------------------------

CREATE TABLE objet(
        id_objet      Int NOT NULL ,
        nombre        Int NOT NULL ,
        id_inventaire Int NOT NULL ,
        id_ref_objet  Int NOT NULL
	,CONSTRAINT objet_PK PRIMARY KEY (id_objet)
)ENGINE=InnoDB;




ALTER TABLE user
	ADD CONSTRAINT user_role0_FK
	FOREIGN KEY (id_role)
	REFERENCES role(id_role);

ALTER TABLE histoire
	ADD CONSTRAINT histoire_ref_histoire0_FK
	FOREIGN KEY (id_ref_histoire)
	REFERENCES ref_histoire(id_ref_histoire);

ALTER TABLE detail_histoire
	ADD CONSTRAINT detail_histoire_histoire0_FK
	FOREIGN KEY (id_histoire)
	REFERENCES histoire(id_histoire);

ALTER TABLE sauvegarde
	ADD CONSTRAINT sauvegarde_personnage0_FK
	FOREIGN KEY (id_personnage)
	REFERENCES personnage(id_personnage);

ALTER TABLE sauvegarde
	ADD CONSTRAINT sauvegarde_user1_FK
	FOREIGN KEY (id_user)
	REFERENCES user(id_user);

ALTER TABLE sauvegarde
	ADD CONSTRAINT sauvegarde_histoire2_FK
	FOREIGN KEY (id_histoire)
	REFERENCES histoire(id_histoire);

ALTER TABLE sauvegarde 
	ADD CONSTRAINT sauvegarde_personnage0_AK 
	UNIQUE (id_personnage);

ALTER TABLE equipement
	ADD CONSTRAINT equipement_ref_slot0_FK
	FOREIGN KEY (id_ref_slot)
	REFERENCES ref_slot(id_ref_slot);

ALTER TABLE equipement
	ADD CONSTRAINT equipement_personnage1_FK
	FOREIGN KEY (id_personnage)
	REFERENCES personnage(id_personnage);

ALTER TABLE equipement
	ADD CONSTRAINT equipement_ref_equipement2_FK
	FOREIGN KEY (id_ref_equipement)
	REFERENCES ref_equipement(id_ref_equipement);

ALTER TABLE inventaire
	ADD CONSTRAINT inventaire_personnage0_FK
	FOREIGN KEY (id_personnage)
	REFERENCES personnage(id_personnage);

ALTER TABLE inventaire 
	ADD CONSTRAINT inventaire_personnage0_AK 
	UNIQUE (id_personnage);

ALTER TABLE personnage
	ADD CONSTRAINT personnage_inventaire0_FK
	FOREIGN KEY (id_inventaire)
	REFERENCES inventaire(id_inventaire);

ALTER TABLE personnage
	ADD CONSTRAINT personnage_sauvegarde1_FK
	FOREIGN KEY (id_sauvegarde)
	REFERENCES sauvegarde(id_sauvegarde);

ALTER TABLE personnage 
	ADD CONSTRAINT personnage_inventaire0_AK 
	UNIQUE (id_inventaire);

ALTER TABLE personnage 
	ADD CONSTRAINT personnage_sauvegarde1_AK 
	UNIQUE (id_sauvegarde);

ALTER TABLE stat_personnage
	ADD CONSTRAINT stat_personnage_ref_stat0_FK
	FOREIGN KEY (id_ref_stat)
	REFERENCES ref_stat(id_ref_stat);

ALTER TABLE stat_personnage
	ADD CONSTRAINT stat_personnage_personnage1_FK
	FOREIGN KEY (id_personnage)
	REFERENCES personnage(id_personnage);

ALTER TABLE objet
	ADD CONSTRAINT objet_inventaire0_FK
	FOREIGN KEY (id_inventaire)
	REFERENCES inventaire(id_inventaire);

ALTER TABLE objet
	ADD CONSTRAINT objet_ref_objet1_FK
	FOREIGN KEY (id_ref_objet)
	REFERENCES ref_objet(id_ref_objet);

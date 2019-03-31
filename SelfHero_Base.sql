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
        id_user        Int  Auto_increment  NOT NULL ,
        login          Varchar (50) NOT NULL ,
        password       Varchar (255) NOT NULL ,
        email          Varchar (255) NOT NULL ,
        remember_token Varchar (255) ,
        id_role        Int NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (id_user)

	,CONSTRAINT user_role_FK FOREIGN KEY (id_role) REFERENCES role(id_role)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ref_histoire
#------------------------------------------------------------

CREATE TABLE ref_histoire(
        id_ref_histoire Int  Auto_increment  NOT NULL ,
        nom             Varchar (255) NOT NULL ,
        auteur          Varchar (255) NOT NULL ,
        avis            Decimal NOT NULL ,
        url_image       Varchar (255)
	,CONSTRAINT ref_histoire_PK PRIMARY KEY (id_ref_histoire)
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
# Table: personnage
#------------------------------------------------------------

CREATE TABLE personnage(
        id_personnage  Int  Auto_increment  NOT NULL ,
        nom_personnage Varchar (50) NOT NULL
	,CONSTRAINT personnage_PK PRIMARY KEY (id_personnage)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: inventaire
#------------------------------------------------------------

CREATE TABLE inventaire(
        id_inventaire                   Int  Auto_increment  NOT NULL ,
        nbr_emplacement_dans_inventaire Int NOT NULL ,
        id_personnage                   Int NOT NULL
	,CONSTRAINT inventaire_PK PRIMARY KEY (id_inventaire)

	,CONSTRAINT inventaire_personnage_FK FOREIGN KEY (id_personnage) REFERENCES personnage(id_personnage)
	,CONSTRAINT inventaire_personnage_AK UNIQUE (id_personnage)
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
# Table: stat_personnage
#------------------------------------------------------------

CREATE TABLE stat_personnage(
        id_stat_personnage Int NOT NULL ,
        valeur             Int NOT NULL ,
        id_ref_stat        Int NOT NULL ,
        id_personnage      Int NOT NULL
	,CONSTRAINT stat_personnage_PK PRIMARY KEY (id_stat_personnage)

	,CONSTRAINT stat_personnage_ref_stat_FK FOREIGN KEY (id_ref_stat) REFERENCES ref_stat(id_ref_stat)
	,CONSTRAINT stat_personnage_personnage0_FK FOREIGN KEY (id_personnage) REFERENCES personnage(id_personnage)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: detail_histoire
#------------------------------------------------------------

CREATE TABLE detail_histoire(
        id_detail_histoire Int  Auto_increment  NOT NULL ,
        contenue           Longtext NOT NULL ,
        numero_page        Int NOT NULL ,
        id_ref_histoire    Int NOT NULL
	,CONSTRAINT detail_histoire_PK PRIMARY KEY (id_detail_histoire)

	,CONSTRAINT detail_histoire_ref_histoire_FK FOREIGN KEY (id_ref_histoire) REFERENCES ref_histoire(id_ref_histoire)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: sauvegarde
#------------------------------------------------------------

CREATE TABLE sauvegarde(
        id_sauvegarde      Int  Auto_increment  NOT NULL ,
        id_detail_histoire Int NOT NULL ,
        id_personnage      Int NOT NULL ,
        id_user            Int NOT NULL
	,CONSTRAINT sauvegarde_PK PRIMARY KEY (id_sauvegarde)

	,CONSTRAINT sauvegarde_detail_histoire_FK FOREIGN KEY (id_detail_histoire) REFERENCES detail_histoire(id_detail_histoire)
	,CONSTRAINT sauvegarde_personnage0_FK FOREIGN KEY (id_personnage) REFERENCES personnage(id_personnage)
	,CONSTRAINT sauvegarde_user1_FK FOREIGN KEY (id_user) REFERENCES user(id_user)
	,CONSTRAINT sauvegarde_personnage_AK UNIQUE (id_personnage)
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

	,CONSTRAINT objet_inventaire_FK FOREIGN KEY (id_inventaire) REFERENCES inventaire(id_inventaire)
	,CONSTRAINT objet_ref_objet0_FK FOREIGN KEY (id_ref_objet) REFERENCES ref_objet(id_ref_objet)
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
# Table: equipement
#------------------------------------------------------------

CREATE TABLE equipement(
        id_equipement     Int NOT NULL ,
        valeur            Int NOT NULL ,
        id_ref_slot       Int NOT NULL ,
        id_personnage     Int NOT NULL ,
        id_ref_equipement Int NOT NULL
	,CONSTRAINT equipement_PK PRIMARY KEY (id_equipement)

	,CONSTRAINT equipement_ref_slot_FK FOREIGN KEY (id_ref_slot) REFERENCES ref_slot(id_ref_slot)
	,CONSTRAINT equipement_personnage0_FK FOREIGN KEY (id_personnage) REFERENCES personnage(id_personnage)
	,CONSTRAINT equipement_ref_equipement1_FK FOREIGN KEY (id_ref_equipement) REFERENCES ref_equipement(id_ref_equipement)
)ENGINE=InnoDB;


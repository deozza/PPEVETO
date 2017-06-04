# -----------------------------------------------------------------------------
#       CREATION DE LA BASE
# -----------------------------------------------------------------------------
DROP DATABASE IF EXISTS ptiveto;
CREATE DATABASE IF NOT EXISTS ptiveto;
USE ptiveto;

# -----------------------------------------------------------------------------
#       TABLE : medicament
# -----------------------------------------------------------------------------
CREATE TABLE  medicament
 (
   numm INT(3) NOT NULL AUTO_INCREMENT,
   nomm  VARCHAR(32) DEFAULT "NULL",
   prixm DECIMAL(13,2) DEFAULT NULL,
   PRIMARY KEY (numm)
 );

# -----------------------------------------------------------------------------
#       TABLE : t_user
# -----------------------------------------------------------------------------
CREATE TABLE t_user
 (
   id_user INT(3) NOT NULL,
   login VARCHAR(32) NOT NULL,
   nom VARCHAR(32) NOT NULL,
   prenom VARCHAR(32) NOT NULL,
   mdp VARCHAR(32),
   mail VARCHAR(50),
   idtype INT(1) NOT NULL,
   PRIMARY KEY (id_user)
 );

# -----------------------------------------------------------------------------
#       TABLE : proprietaire
# -----------------------------------------------------------------------------
CREATE TABLE proprietaire
 (
   id_user INT(3) NOT NULL AUTO_INCREMENT,
   login VARCHAR(32) NOT NULL,
   nom VARCHAR(32) NOT NULL,
   prenom VARCHAR(32) NOT NULL,
   mdp VARCHAR(32) NOT NULL,
   mail VARCHAR(50) NOT NULL,
   adrp VARCHAR(128) DEFAULT "NULL",
   codep INT(5) DEFAULT 0,
   villep VARCHAR(32) DEFAULT "NULL",
   telp INT(10) DEFAULT 0,
   PRIMARY KEY (id_user)
 );

# -----------------------------------------------------------------------------
#       TABLE : veterinaire
# -----------------------------------------------------------------------------
CREATE TABLE veterinaire
 (
   id_user INT(3) NOT NULL AUTO_INCREMENT,
   login VARCHAR(32) NOT NULL,
   nom VARCHAR(32) NOT NULL,
   prenom VARCHAR(32) NOT NULL,
   mdp VARCHAR(32),
   mail VARCHAR(50),
   PRIMARY KEY (id_user)
 );

# -----------------------------------------------------------------------------
#       TABLE : secretaire
# -----------------------------------------------------------------------------
CREATE TABLE secretaire
 (
   id_user INT(3) NOT NULL AUTO_INCREMENT,
   login VARCHAR(32) NOT NULL,
   nom VARCHAR (32) NOT NULL,
   prenom VARCHAR (32) NOT NULL,
   mdp VARCHAR(32),
   mail VARCHAR(50),
   PRIMARY KEY (id_user)
 );

# -----------------------------------------------------------------------------
#       TABLE : TYPE
# -----------------------------------------------------------------------------
CREATE TABLE type
(
idtype INT(1) NOT NULL,
libelle VARCHAR(20),
PRIMARY KEY(idtype)
);


# -----------------------------------------------------------------------------
#       TABLE : soins
# -----------------------------------------------------------------------------
CREATE TABLE soins
 (
   nums INT(3) NOT NULL AUTO_INCREMENT,
   prixms DECIMAL(13,2) DEFAULT NULL,
   commentaires VARCHAR(200),
   PRIMARY KEY (nums)
 );

# -----------------------------------------------------------------------------
#       TABLE : race
# -----------------------------------------------------------------------------
CREATE TABLE race
 (
   numr INT(3) NOT NULL,
   nomr VARCHAR(32) DEFAULT "NULL",
   poids INT(3) DEFAULT NULL,
   PRIMARY KEY (numr)
 );

# -----------------------------------------------------------------------------
#       TABLE : animal
# -----------------------------------------------------------------------------
CREATE TABLE animal
 (
   numa INT(3) NOT NULL AUTO_INCREMENT,
   id_user INT(3) NOT NULL,
   numr INT(3) NOT NULL,
   nomA VARCHAR(32) DEFAULT "NULL",
   datenaissa DATE DEFAULT NULL,
   tatouage VARCHAR(32) DEFAULT "NULL",
   photo VARCHAR(255),
   FOREIGN KEY proprietaire (id_user) REFERENCES proprietaire (id_user),
   FOREIGN KEY race (numr) REFERENCES race (numr),
   PRIMARY KEY (numa)
 );

# -----------------------------------------------------------------------------
#       TABLE : consultation
# -----------------------------------------------------------------------------
CREATE TABLE consultation
 (
   numc INT(3) NOT NULL AUTO_INCREMENT,
   id_user INT(3) NOT NULL,
   nom VARCHAR(32) NOT NULL,
   prenom VARCHAR(32) NOT NULL,
   numa INT(3) NOT NULL,
   datec DATE DEFAULT NULL,
   heurec TIME DEFAULT NULL,
   prixc DECIMAL(13,2) DEFAULT NULL,
   FOREIGN KEY veterinaire (id_user) REFERENCES veterinaire (id_user),
   PRIMARY KEY (numc)
 );

# -----------------------------------------------------------------------------
#       TABLE : prescrire
# -----------------------------------------------------------------------------
CREATE TABLE prescrire
 (
   id_user INT(3) NOT NULL,
   numm INT(3) NOT NULL,
   numa INT(3) NOT NULL,
   posologiem VARCHAR(32) NULL,
   quantiteem INT(3) NULL,
   date_prescription DATE NOT NULL,
   date_fin DATE NOT NULL,
   FOREIGN KEY veterinaire (id_user) REFERENCES veterinaire (id_user),
   FOREIGN KEY medicament (numm) REFERENCES medicament (numm),
   FOREIGN KEY animal (numa) REFERENCES animal (numa),
   PRIMARY KEY (id_user,numm,numa)
 );

 # -----------------------------------------------------------------------------
#       TABLE : prescrire_archive
# -----------------------------------------------------------------------------
CREATE TABLE prescrire_archive
 (
   id_user INT(3) NOT NULL,
   numm INT(3) NOT NULL,
   numa INT(3) NOT NULL,
   posologiem VARCHAR(32) NULL,
   quantiteem INT(3) NULL,
   date_prescription DATE NOT NULL,
   date_fin DATE NOT NULL,
   FOREIGN KEY veterinaire (id_user) REFERENCES veterinaire (id_user),
   FOREIGN KEY medicament (numm) REFERENCES medicament (numm),
   FOREIGN KEY animal (numa) REFERENCES animal (numa),
   PRIMARY KEY (id_user,numm,numa)
 );

# -----------------------------------------------------------------------------
#       TABLE : pratique
# -----------------------------------------------------------------------------

CREATE TABLE pratique
 (
   numc INT(3) NOT NULL,
   nums INT(3) NOT NULL,
   FOREIGN KEY (numc) REFERENCES consultation(numc),
   FOREIGN KEY (nums) REFERENCES soins(nums),
   PRIMARY KEY (numc,nums)
 );

# -----------------------------------------------------------------------------
#       TABLE : HOSPITALISER
# -----------------------------------------------------------------------------
CREATE TABLE hospitaliser
(
  numh INT(3) NOT NULL AUTO_INCREMENT,
  date_entree DATE NOT NULL,
  heure_entree TIME NOT NULL,
  date_sortie DATE DEFAULT NULL,
  heure_sortie TIME DEFAULT NULL,
  commentaires VARCHAR(200) DEFAULT NULL,
  numa INT(3) NOT NULL,
  id_user INT(3) NOT NULL,
  FOREIGN KEY(numa) REFERENCES animal(numa),
  PRIMARY KEY(numh)
);

# -----------------------------------------------------------------------------
#       TABLE : HOSPITALISER_ARCHIVE
# -----------------------------------------------------------------------------

CREATE TABLE hospitaliser_archive
(
  numh INT(3) NOT NULL,
  date_entree DATE NOT NULL,
  heure_entree TIME NOT NULL,
  date_sortie DATE  NOT NULL,
  heure_sortie TIME  NOT NULL,
  commentaires VARCHAR(200) DEFAULT NULL,
  numa INT(3) NOT NULL,
  id_user INT(3) NOT NULL,
  FOREIGN KEY(numa) REFERENCES animal(numa),
  PRIMARY KEY(numh)
);

# -----------------------------------------------------------------------------
#       VUES
# -----------------------------------------------------------------------------


CREATE VIEW nbcani(numeroa,total)
AS SELECT animal.numa,count(numc)
FROM animal left join consultation
ON animal.numa = consultation.numa
GROUP BY animal.numa;

CREATE VIEW nbcvet(numerov,total)
AS SELECT veterinaire.id_user,count(numc)
FROM veterinaire left join consultation
ON veterinaire.id_user = consultation.id_user
GROUP BY veterinaire.id_user;

# -----------------------------------------------------------------------------
#       ALTER TABLE
# -----------------------------------------------------------------------------

ALTER TABLE t_user ADD nbConnexion INT DEFAULT 0;
ALTER TABLE t_user ADD lastConnexion DATETIME;
ALTER TABLE t_user ADD nbFail INT DEFAULT 0;
ALTER TABLE t_user ADD nbFailSinceLastLogin INT DEFAULT 0;
ALTER TABLE t_user ADD lastFail DATETIME DEFAULT NOW();

ALTER TABLE animal ADD nbConsultation INT DEFAULT 0;

ALTER TABLE animal ADD nbHospitaliser INT DEFAULT 0;

ALTER TABLE medicament ADD stock INT DEFAULT 0;

ALTER TABLE consultation ADD motif varchar(255) DEFAULT 'Routine';
ALTER TABLE consultation ADD commentaires varchar(255) DEFAULT 'RAS';

# -----------------------------------------------------------------------------
#       TRIGGER animal
# -----------------------------------------------------------------------------

DROP TRIGGER if exists verifdate;
DELIMITER //
CREATE TRIGGER verifdate
BEFORE INSERT ON animal
for each row
BEGIN
if new.datenaissa>curdate()
THEN
  SET new.datenaissa = curdate();
END IF;
IF length(new.tatouage)>5
OR new.tatouage IS NULL
THEN
  SIGNAL sqlstate '45000'
  SET Message_text = 'Tatouage pas valide';
END IF;
END //
DELIMITER ;

# -----------------------------------------------------------------------------
#       TRIGGER HERITAGE INSERT
# -----------------------------------------------------------------------------

DROP TRIGGER IF EXISTS heritageProprietaire;
DELIMITER //
CREATE TRIGGER heritageProprietaire
BEFORE INSERT ON proprietaire
FOR EACH ROW
BEGIN
DECLARE nbu, nbv, nbs, idP INT;
SELECT count(*) INTO nbv FROM veterinaire V WHERE V.nom=new.nom AND V.prenom=new.prenom;
IF nbv>0
THEN
  SIGNAL SQLSTATE '45000'
  SET MESSAGE_TEXT='Cet utilisateur est deja un veterinaire';
END IF;
SELECT count(*) INTO nbs FROM secretaire S WHERE S.nom=new.nom AND S.prenom=new.prenom;
IF nbs>0
THEN
  SIGNAL SQLSTATE '45000'
  SET MESSAGE_TEXT='Cet utilisateur est deja un secretaire';
END IF;
SELECT max(id_user) INTO idP FROM t_user;
IF idP IS NULL
THEN
  SET idP = 1;
ELSE
  SET idP = idP+1;
END IF;
  INSERT INTO t_user (id_user, login, nom, prenom, mdp, mail, idtype) VALUES(idP, new.login, new.nom,new.prenom,new.mdp,new.mail,2);
END//
DELIMITER ;

DROP TRIGGER IF EXISTS heritageVeterinaire;
DELIMITER //
CREATE TRIGGER heritageVeterinaire
BEFORE INSERT ON veterinaire
FOR EACH ROW
BEGIN
DECLARE nbu, nbp, nbs, idV INT;
SELECT count(*) INTO nbp FROM proprietaire P WHERE P.nom=new.nom AND P.prenom=new.prenom;
IF nbp>0
THEN
  SIGNAL SQLSTATE '45000'
  SET MESSAGE_TEXT='Cet utilisateur est deja un proprietaire';
END IF;
SELECT count(*) INTO nbs FROM secretaire S WHERE S.nom=new.nom AND S.prenom=new.prenom;
IF nbs>0
THEN
  SIGNAL SQLSTATE '45000'
  SET MESSAGE_TEXT='Cet utilisateur est deja un secretaire';
END IF;
SELECT max(id_user) INTO idV FROM t_user;
IF idV IS NULL
THEN
  SET idV = 1;
ELSE
  SET idV = idV+1;
END IF;
  INSERT INTO t_user (id_user, login, nom, prenom, mdp, mail, idtype) VALUES(idV, new.login, new.nom,new.prenom,new.mdp,new.mail,3);
END//
DELIMITER ;

DROP TRIGGER IF EXISTS heritageSecretaire;
DELIMITER //
CREATE TRIGGER heritageSecretaire
BEFORE INSERT ON secretaire
FOR EACH ROW
BEGIN
DECLARE nbu, nbv, nbp, idS INT;
SELECT count(*) INTO nbv FROM veterinaire V WHERE V.nom=new.nom AND V.prenom=new.prenom;
IF nbv>0
THEN
  SIGNAL SQLSTATE '45000'
  SET MESSAGE_TEXT='Cet utilisateur est deja un veterinaire';
END IF;
SELECT count(*) INTO nbp FROM proprietaire P WHERE P.nom=new.nom AND P.prenom=new.prenom;
IF nbp>0
THEN
  SIGNAL SQLSTATE '45000'
  SET MESSAGE_TEXT='Cet utilisateur est deja un proprietaire';
END IF;
SELECT max(id_user) INTO idS FROM t_user;
IF idS IS NULL
THEN
  SET idS = 1;
ELSE
  SET idS = idS+1;
END IF;
  INSERT INTO t_user (id_user, login, nom, prenom, mdp, mail, idtype) VALUES(idS, new.login, new.nom,new.prenom,new.mdp,new.mail,4);
END//
DELIMITER ;

# -----------------------------------------------------------------------------
#       TRIGGER HERITAGE UPDATE
# -----------------------------------------------------------------------------

DROP TRIGGER IF EXISTS updateProprietaire;
DELIMITER //
CREATE TRIGGER updateProprietaire
BEFORE UPDATE ON proprietaire
FOR EACH ROW
BEGIN
IF new.id_user != old.id_user
THEN
  SIGNAL SQLSTATE '45000'
  SET MESSAGE_TEXT='Modification non autorisee';
ELSE
  UPDATE t_user
  SET login=new.login,mdp=new.mdp,mail=new.mail
  WHERE nom=old.nom AND prenom=old.prenom;
END IF;
END//
DELIMITER ;

DROP TRIGGER IF EXISTS updateVeterinaire;
DELIMITER //
CREATE TRIGGER updateVeterinaire
BEFORE UPDATE ON veterinaire
FOR EACH ROW
BEGIN
IF new.id_user != old.id_user
THEN
  SIGNAL SQLSTATE '45000'
  SET MESSAGE_TEXT='Modification non autorisee';
ELSE
  UPDATE t_user
  SET login=new.login,mdp=new.mdp,mail=new.mail
  WHERE nom=old.nom AND prenom=old.prenom;
END IF;
END//
DELIMITER ;

DROP TRIGGER IF EXISTS updateSecretaire;
DELIMITER //
CREATE TRIGGER updateSecretaire
BEFORE UPDATE ON secretaire
FOR EACH ROW
BEGIN
IF new.id_user != old.id_user
THEN
  SIGNAL SQLSTATE '45000'
  SET MESSAGE_TEXT='Modification non autorisee';
ELSE
  UPDATE t_user
  SET login=new.login,nom=new.nom, prenom=new.prenom, mdp=new.mdp,mail=new.mail
  WHERE nom=old.nom AND prenom=old.prenom;
END IF;
END//
DELIMITER ;

# -----------------------------------------------------------------------------
#       TRIGGER HERITAGE DELETE
# -----------------------------------------------------------------------------

DROP TRIGGER IF EXISTS deleteProprietaire;
DELIMITER //
CREATE TRIGGER deleteProprietaire
AFTER DELETE ON proprietaire
FOR EACH ROW
BEGIN
DELETE FROM t_user WHERE login = old.login;
END//
DELIMITER ;


DROP TRIGGER IF EXISTS deleteVeterinaire;
DELIMITER //
CREATE TRIGGER deleteVeterinaire
AFTER DELETE ON veterinaire
FOR EACH ROW
BEGIN
DELETE FROM t_user WHERE nom=old.nom AND prenom=old.prenom;
END//
DELIMITER ;


DROP TRIGGER IF EXISTS deleteSecretaire;
DELIMITER //
CREATE TRIGGER deleteSecretaire
AFTER DELETE ON secretaire
FOR EACH ROW
BEGIN
DELETE FROM t_user WHERE nom=old.nom AND prenom=old.prenom;
END//
DELIMITER ;

# -----------------------------------------------------------------------------
#       TRIGGER ARCHIVAGE HOSPITALISER
# -----------------------------------------------------------------------------

DROP TRIGGER IF EXISTS archiveHOSPITALISER;
DELIMITER //
CREATE TRIGGER archiveHOSPITALISER
AFTER UPDATE ON hospitaliser
FOR EACH ROW
BEGIN
  INSERT INTO hospitaliser_archive SELECT * FROM hospitaliser WHERE numh=old.numh;
END //
DELIMITER ;


# -----------------------------------------------------------------------------
#       PROCEDURE STOCKEE CONNEXION
# -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS connexion;
DELIMITER //
CREATE PROCEDURE connexion(uname VARCHAR(255), psw VARCHAR(255))
BEGIN
 IF (SELECT mdp FROM t_user u WHERE u.login = uname) = psw
 THEN   
     UPDATE t_user u
           SET u.nbConnexion = u.nbConnexion + 1,
               u.nbFailSinceLastLogin = 0,        
               u.lastConnexion = NOW()
               WHERE u.login = uname;
  END IF;
  IF (SELECT mdp FROM t_user u WHERE u.login = uname) != psw
  THEN     
       UPDATE t_user u  
            SET u.nbFail = u.nbFail + 1,
                u.nbFailSinceLastLogin = u.nbFailSinceLastLogin + 1,
                u.lastFail = NOW()
                WHERE u.login = uname;
  END IF;
END //
DELIMITER ;



# -----------------------------------------------------------------------------
#       PROCEDURE STOCKEE STATISTIQUE CONSULTATION
# -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS statConsultation;
DELIMITER //
CREATE PROCEDURE statConsultation(idanimal int(3))
BEGIN
     UPDATE animal a
           SET a.nbConsultation = a.nbConsultation + 1
            WHERE numa = idanimal;
       END //
DELIMITER ; 

# -----------------------------------------------------------------------------
#       PROCEDURE STOCKEE STATISTIQUE HOSPITALISATION
# -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS statHospitalisation;
DELIMITER //
CREATE PROCEDURE statHospitalisation(idanimal int(3))
BEGIN
     UPDATE animal a
           SET a.nbHospitaliser = a.nbHospitaliser + 1
            WHERE numa = idanimal;
       END //
DELIMITER ; 

# -----------------------------------------------------------------------------
#       PROCEDURE STOCKEE D'AJOUT
# -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS ajoutPrescrire;
DELIMITER //
CREATE PROCEDURE ajoutPrescrire(animal varchar(255), medicament varchar(255), posologie varchar(255), quantitee int(3), debut date, fin date)
BEGIN
DECLARE num_m, num_a INT;
  SELECT numm INTO num_m FROM medicament WHERE nomm = medicament;
  SELECT numa INTO num_a FROM animak WHERE noma = animal;
  INSERT INTO 

DROP PROCEDURE IF EXISTS ajoutProprietaire;
DELIMITER //
CREATE PROCEDURE ajoutProprietaire (loginP VARCHAR(32), nomP VARCHAR(32), prenomP VARCHAR(32), mdpP VARCHAR(32), mailP VARCHAR(50))
BEGIN
  INSERT INTO proprietaire (login, nom, prenom, mdp, mail) 
  VALUES(loginP, nomP, prenomP, md5(mdpP), mailP);
END //
DELIMITER ;

DROP PROCEDURE IF EXISTS ajoutAnimal;
DELIMITER //
CREATE PROCEDURE ajoutAnimal (iduser INT, numrA INT, nomaA VARCHAR(32), datenaissaA DATE, tatouageA VARCHAR(32))
BEGIN
  INSERT INTO animal (id_user, numr, noma, datenaissa, tatouage) 
  VALUES(iduser,numrA, nomaA, datenaissaA, tatouageA);
END //
DELIMITER ;

DROP PROCEDURE IF EXISTS ajoutMedicament;
DELIMITER //
CREATE PROCEDURE ajoutMedicament(nomMedicament VARCHAR(32), prixMedicament decimal(13,2), qtt INT)
BEGIN
  INSERT INTO medicament (nomm,prixm,stock) VALUES(nomMedicament, prixMedicament,qtt);
END //
DELIMITER ;

# -----------------------------------------------------------------------------
#       PROCEDURE STOCKEE consultation
# -----------------------------------------------------------------------------

DROP PROCEDURE IF EXISTS verifRDV;
DELIMITER //
CREATE PROCEDURE verifRDV (idVeto INT, nomP VARCHAR(32), prenomP VARCHAR(32), numA INT, dateRDV DATE, heureRDV TIME, raison VARCHAR(255))
BEGIN
  DECLARE var1, var2 INT;

  SELECT count(*) INTO var1 FROM consultation 
  WHERE id_user=idVeto AND heurec=heureRDV AND datec=dateRDV;

  SELECT count(*) INTO var2 FROM proprietaire
  INNER JOIN animal ON proprietaire.id_user=animal.id_user
  WHERE proprietaire.nom=nomP AND proprietaire.prenom=prenomP AND animal.numa=numA;
  
  IF var1=0
  THEN
    IF var2!=0
    THEN
      SELECT 'Rendez vous accepte';
      INSERT INTO consultation (id_user, nom, prenom, numa, datec, heurec, motif) VALUES(idVeto, nomP, prenomP, numA, dateRDV, heureRDV, raison);
    ELSE
      SELECT 'Erreur de saisie sur le proprietaire ou l\'animal';
    END IF;
  ELSEIF var1 >0
  THEN
    SELECT 'La place est prise';
  ELSE
    SELECT 'Erreur de saisie sur le veterinaire';
  END IF;
END //
DELIMITER ;

DROP PROCEDURE IF EXISTS annulerRDV;
DELIMITER //
CREATE PROCEDURE annulerRDV (numeroConsultation INT)
BEGIN
  DELETE FROM consultation WHERE numc=numeroConsultation;
END //
DELIMITER ;


# -----------------------------------------------------------------------------
#       PROCEDURE STOCKEE animal
# -----------------------------------------------------------------------------
DROP PROCEDURE IF EXISTS visuAnimal;
DELIMITER //
CREATE PROCEDURE visuAnimal (numeroUser INT)
BEGIN
  SELECT animal.numa,animal.noma, animal.datenaissa, animal.tatouage, animal.nbca, race.nomr FROM animal
                INNER JOIN proprietaire ON animal.id_user=proprietaire.id_user
                INNER JOIN race ON animal.numr=race.numr
                WHERE animal.id_user = numeroUser;
END //
DELIMITER ;

# -----------------------------------------------------------------------------
#       PROCEDURE STOCKEE medicament
# -----------------------------------------------------------------------------
DROP PROCEDURE IF EXISTS visuMedicament;
DELIMITER //
CREATE PROCEDURE visuMedicament ()
BEGIN
  SELECT numm,nomm,prixm,stock FROM medicament;
END //
DELIMITER ;

DROP PROCEDURE IF EXISTS supprimerMedicament;
DELIMITER //
CREATE PROCEDURE supprimerMedicament(numeroMedicament INT)
BEGIN
  DELETE FROM medicament WHERE numm = numeroMedicament;
END //
DELIMITER ;

DROP PROCEDURE IF EXISTS updateMedicament;
DELIMITER //
CREATE PROCEDURE updateMedicament(numeroMedicament INT, nomMedicament VARCHAR(32), prixMedicament decimal(13,2))
BEGIN
  UPDATE medicament SET nomm=nomMedicament, prixm=prixMedicament WHERE numm = numeroMedicament;
END //
DELIMITER ;

# -----------------------------------------------------------------------------
#       EVENEMENT SUPPRESSION ARCHIVAGE PRESCRIPTION
# -----------------------------------------------------------------------------

CREATE EVENT suppressionPrescrireArchive
ON SCHEDULE EVERY 1 day STARTS '2017-02-28 00:00:00'
DO DELETE FROM prescrire_archive WHERE year(curdate())-year(date_fin) = 1;

# -----------------------------------------------------------------------------
#       EVENEMENT SUPPRESSION ARCHIVAGE HOSPITALISER
# -----------------------------------------------------------------------------

CREATE EVENT suppressionHOSPITALISERArchive
ON SCHEDULE EVERY 1 day STARTS '2017-02-28 00:00:00'
DO DELETE FROM HOSPITALISER_archive WHERE year(curdate())-year(date_sortie) = 1;

# -----------------------------------------------------------------------------
#       EVENEMENT RESET COMPTEUR CONSULTATION
# -----------------------------------------------------------------------------

CREATE EVENT resetStatConsultation
ON SCHEDULE EVERY 1 month STARTS '2017-02-28 00:00:00'
DO 
  UPDATE animal
  SET nbConsultation = 0;

# -----------------------------------------------------------------------------
#       EVENEMENT RESET COMPTEUR HOSPITALISATION
# -----------------------------------------------------------------------------

CREATE EVENT resetStatHospitalisation
ON SCHEDULE EVERY 1 month STARTS '2017-02-28 00:00:00'
DO 
  UPDATE animal
  SET nbHospitaliser = 0;

# -----------------------------------------------------------------------------
#       JEUX D'ESSAI TYPE
# -----------------------------------------------------------------------------

INSERT INTO type VALUES (1,'administrateur'),
                        (2,'proprietaire'),
                        (3,'veterinaire'),
                        (4,'secretaire');

# -----------------------------------------------------------------------------
#       JEUX D'ESSAI t_user
# -----------------------------------------------------------------------------

/*INSERT INTO t_user VALUES (1,'admin',md5('password'),'admin@gmail.com',1); */


INSERT INTO proprietaire (id_user,login,nom,prenom,mdp,mail) VALUES (1,'prop1','prop','1',md5('password'),'prop1@gmail.com');
INSERT INTO proprietaire (id_user,login,nom,prenom,mdp,mail) VALUES (2,'prop2','pro','1',md5('password'),'prop2@gmail.com');
INSERT INTO proprietaire (id_user,login,nom,prenom,mdp,mail) VALUES (3,'prop3','Machin','1',md5('password'),'prop3@gmail.com');
INSERT INTO proprietaire (id_user,login,nom,prenom,mdp,mail) VALUES (4,'prop4','Truc','1',md5('password'),'prop4@gmail.com');
INSERT INTO proprietaire (id_user,login,nom,prenom,mdp,mail) VALUES (5,'prop5','Bidule','1',md5('password'),'prop5@gmail.com');

INSERT INTO veterinaire (id_user,login,nom,prenom,mdp,mail) VALUES (1,'veterinaire1','veto','10',md5('password'),'veterinaire1@gmail.com');
INSERT INTO veterinaire (id_user,login,nom,prenom,mdp,mail) VALUES (2,'veterinaire2','vet','20',md5('password'),'veterinaire2@gmail.com');

INSERT INTO secretaire (id_user,login,nom,prenom,mdp,mail) VALUES(1,'secretaire1','secr','100',md5('password'),'secretaire1@gmail;com');
INSERT INTO secretaire (id_user,login,nom,prenom,mdp,mail) VALUES(2,'secretaire2','sec','200',md5('password'),'secretaire2@gmail;com');

# -----------------------------------------------------------------------------
#       JEUX D'ESSAI race
# -----------------------------------------------------------------------------

INSERT INTO race(numr, nomr) VALUES (1,'Autre'),
                                    (2,'Chien'),
                                    (3,'Chat'),
                                    (4,'Rongeur'),
                                    (5,'Oiseau'),
                                    (6,'Reptile');

# -----------------------------------------------------------------------------
#       JEUX D'ESSAI animal
# -----------------------------------------------------------------------------

INSERT INTO animal (id_user, numr, noma, datenaissa, tatouage)
VALUES (1,2,'biloute','2010-12-21','H3HjE');
INSERT INTO animal (id_user, numr, noma, datenaissa, tatouage)
VALUES (2,2,'magie','2016-06-04','JJeu3');
INSERT INTO animal (id_user, numr, noma, datenaissa, tatouage)
VALUES (3,3,'blackie','2016-06-04','JJeu3');
INSERT INTO animal (id_user, numr, noma, datenaissa, tatouage)
VALUES (4,5,'titi','2016-06-04','JJeu3');
INSERT INTO animal (id_user, numr, noma, datenaissa, tatouage)
VALUES (5,6,'dragon','2016-06-04','JJeu3');

# -----------------------------------------------------------------------------
#       JEUX D'ESSAI medicament
# -----------------------------------------------------------------------------

INSERT INTO medicament VALUES (1,'Vermifuge pate','35.00', 10),
                              (2,'Vermifuge cachet','40.00', 10),
                              (3,'Vaccin rage','86.00', 30),
                              (4,'Vaccin Leucose','119.00', 5),
                              (5,'Diuretique','45.00', 4),
                              (6,'Croquettes 10 Kg','350.00', 3);


INSERT INTO consultation (numc,id_user,nom,prenom,numa,datec,heurec,prixc) VALUES ('1',1,'prop','1',1,'2017-10-01','10:00:00',35.00);
INSERT INTO consultation (numc,id_user,nom,prenom,numa,datec,heurec,prixc) VALUES ('2',2,'pro','1',2,'2017-12-01','15:30:00',20.00);
INSERT INTO consultation (numc,id_user,nom,prenom,numa,datec,heurec,prixc) VALUES ('3',2,'pro','1',1,'2017-12-01','10:00:00',340.00);
INSERT INTO consultation (numc,id_user,nom,prenom,numa,datec,heurec,prixc) VALUES ('4',1,'prop','1',2,'2015-12-01','15:30:00',20.00);
INSERT INTO consultation (numc,id_user,nom,prenom,numa,datec,heurec,prixc) VALUES ('5',2,'Machin','1',3,'2016-12-11','15:30:00',20.00);
INSERT INTO consultation (numc,id_user,nom,prenom,numa,datec,heurec,prixc) VALUES ('6',2,'Truc','1',4,'2016-02-01','15:30:00',20.00);
INSERT INTO consultation (numc,id_user,nom,prenom,numa,datec,heurec,prixc) VALUES ('7',1,'Bidule','1',5,'2015-11-01','15:30:00',20.00);

UPDATE animal SET nbConsultation = 2 WHERE numa = 1;
UPDATE animal SET nbConsultation = 2 WHERE numa = 2;
UPDATE animal SET nbConsultation = 1 WHERE numa = 3;
UPDATE animal SET nbConsultation = 1 WHERE numa = 4;
UPDATE animal SET nbConsultation = 1 WHERE numa = 5;

INSERT INTO hospitaliser(date_entree,heure_entree, commentaires, numa,id_user) VALUES('2017-10-01','10:30:00', 'Soins', 1,1),
                                                                      ('2017-12-01','10:55:00', 'Repos apres operation', 1,2);
INSERT INTO hospitaliser(date_entree,heure_entree, commentaires, numa,id_user) VALUES('2016-12-11','16:00:00','Soins', 3,3);
UPDATE hospitaliser SET date_sortie='2016-12-12',heure_sortie='10:00:00' WHERE numh=3;

UPDATE animal SET nbHospitaliser = 1 WHERE numa = 1;
UPDATE animal SET nbHospitaliser = 1 WHERE numa = 3;

INSERT INTO soins (prixms,commentaires) VALUES
(35,'Consultation de base pour chien/chat'),
(68,'Consultation d\'urgence pour chien/chat'),
(30,'Consultation NAC'),
(55,'Vaccin CHP pour chien'),
(60,'Vaccin CHPPiLTC pour chien'),
(65,'Vaccin CHPPiLTC et rage pour chien'),
(55,'Vaccin LTC pour chien'),
(60,'Vaccin LTC et rage pour chien'),
(63,'Vaccin Lk pour chat'),
(70,'Vaccin Lk et rage pour chat'),
(51,'Vaccin TCChl pour chat'),
(56,'Vaccin TCChl et rage pour chat'),
(60,'Castration de chat'),
(150,'Castration de chien'),
(125,'Ovariectomie de chatte'),
(230,'Ovariectomie de chienne');

INSERT INTO prescrire VALUES
(1,1,1,'Une fois par jour',1,'2017-03-20','2017-03-30');
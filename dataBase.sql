CREATE DATABASE imanipelerinage ;

CREATE TABLE user(
    id INT PRIMARY KEY AUTO_INCREMENT,
    compte VARCHAR(50) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(75) NOT NULL
);

CREATE TABLE demande_preinscription(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    nationalite VARCHAR(50) NOT NULL,
    numero_passeport VARCHAR(25) NOT NULL,
    compte VARCHAR(50) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(75) NOT NULL,
    e_mail VARCHAR(60) NOT NULL,
    num_tel INT(8) NOT NULL,
    voyage_souhait VARCHAR(6)
);
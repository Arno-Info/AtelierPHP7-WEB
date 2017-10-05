<?php

//DEFINIR UNE CHAINE POUR LA CONNEXION
define('CHAINE_DE_CONNEXION', 'mysql:host=localhost;dbname=streaming');
define('DB_USER', 'root');

//REGROUPE L'ENSEMBLE DES FONCTIONS POUVANT ETRE APPELLEES
//FONCTION CREATION DE TABLES
function creerTable() {
    //CONNEXION A LA BASE
    $pdo = new PDO(CHAINE_DE_CONNEXION, DB_USER);
    //REQUETE DE CREATION DE TABLES
    $req1 = "CREATE TABLE film (id BIGINT PRIMARY KEY AUTO_INCREMENT, titre VARCHAR(12))";
    $req2 = "CREATE TABLE utilisateur (id BIGINT PRIMARY KEY AUTO_INCREMENT, login VARCHAR(12), mdp VARCHAR(12))";
    //ON EXECUTE NOS REQUETES
    $pdo->exec($req1);
    $pdo->exec($req2);
}

//FONCTION SUPPRESSION DE TABLES
function supprimerTable() {
    //CONNEXION A LA BASE
    $pdo = new PDO(CHAINE_DE_CONNEXION, DB_USER);
    //REQUETE DE SUPPRESSION DE TABLES
    $req3 = "DROP TABLE film";
    $req4 = "DROP TABLE utilisateur";
    //EXECUTION DE LA REQUETE
    $pdo->exec($req3);
    $pdo->exec($req4);
}

//FONCITON SUPPRESSION D'UN FILM
function supprimerFilm($id){
    //CONNEXION A LA BASE
    $pdo = new PDO(CHAINE_DE_CONNEXION, DB_USER);

    //TRANSACTION D'AJOUT D'UN FILM
    $pdo->beginTransaction();
    $statement= $pdo->prepare("DELETE FROM film WHERE id=:idFilm");
    $statement->bindValue('idFilm', $id);
    $statement->execute();
    $pdo->commit();
}
//FONCTION AJOUT D'UN FILM
function ajoutFilm($titre) {
    //CONNEXION A LA BASE
    $pdo = new PDO(CHAINE_DE_CONNEXION, DB_USER);

    //TRANSACTION D'AJOUT D'UN FILM
    $pdo->beginTransaction();
    $statement= $pdo->prepare("INSERT INTO film(titre) VALUES(:monTitre)");
    $statement->bindValue('monTitre', $titre);
    $statement->execute();
    $pdo->commit();
    
}

//FONCTION AJOUT D'UN UTILISATEUR
function ajoutUser() {
    //CONNEXION A LA BASE
    $pdo = new PDO(CHAINE_DE_CONNEXION, DB_USER);

    //REQUETE D'AJOUT D'UN USER
    $reqAjoutUser = "INSERT INTO utilisateur (login, mdp) VALUES('Arnaud', '123')";

    //EXECUTION DE LA REQUETE
    $pdo->exec($reqAjoutUser);
}

//FONCTION LISTER LES FILMS PAR ORDRE ALPHABETIQUE
function lister():array {  //:array est le typage
    //CONNEXION A LA BASE
    $pdo = new PDO(CHAINE_DE_CONNEXION, DB_USER);
        
    //EXECUTION DE LA REQUETE
    $statement = $pdo->query("SELECT * FROM film ORDER BY id");
    return $statement->fetchAll();
    
}

//*******************EXECUTION DES FONCTIONS
//APPELLE DE LA FONCTION supprimerTable()
//supprimerTable();

//APPELLE DE LA FONCTION creerTable();
//creerTable();

//APPELLE DE LA FONCTION ajoutFilm()
//ajoutFilm("TOP GUN");
//ajoutFilm("DRACULA");
//
//$films = lister();
//var_dump($films);
//
////APPELLE DE LA FONCTION ajoutUser()
//ajoutUser();
//
////APPELLE DE LA FONCTION lister()
//lister();


?>
<?php
function getContacts(): array
{
    # Récupération de ma variable $dbh depuis l'espace global PHP
    global $dbh;


    #création de ma requête SQL

    $sql = 'SELECT id_contact,
        prenom,
       nom,
       email,
       telephone
     FROM contact';
    /* int $limit = null
     $limit !== null ? $sql .= " LIMIT $limit" : '';*/

    # Execution de ma requête
    $query = $dbh->query($sql);

    # Retour du résultat
    return $query->fetchAll();


}

function getContactById(string $contactId)
{

    # Récupération de ma variable $dbh depuis l'espace global PHP
    global $dbh;


    #création de ma requête SQL

    $sql = 'SELECT id_contact,
        prenom,
       nom,
       email,
       telephone
     FROM contact         
         WHERE id_contact = :contactId';


    # Préparation de ma requête
    # ⚠️⚠️ Paramètre externe = requête préparée ⚠️⚠️
    $query = $dbh->prepare($sql);

    # J'associe à ma requête le paramètre categorySlug.
    # NOTA BENE : Cette préparation me protège contre les injections SQL.
    $query->bindValue(':contactId', $contactId, PDO::PARAM_STR);

    # Execution de ma requête
    $query->execute();

    # Retour du résultat
    return $query->fetchAll();

}

function insertContact(
    string $prenom,
    string $nom,
    string $email,
    string $telephone,
    string $id_administrateur
): bool|string {
    global $dbh;
    $sql = 'INSERT into contact(prenom,nom,email,telephone,id_administrateur)VALUES(:prenom,:nom,:email,:telephone,:id_administrateur)';
    $query = $dbh->prepare($sql);
    $query->bindValue('prenom', $prenom);
    $query->bindValue('nom', $nom);
    $query->bindValue('email', $email);
    $query->bindValue('telephone', $telephone);
    $query->bindValue('id_administrateur', $id_administrateur);

    return $query->execute() ? $dbh->lastInsertId() : false;

}

function updateContact(
    string $id_contact,
    string $prenom,
    string $nom,
    string $email,
    string $telephone,
    string $id_administrateur
): bool|string {
    
    global $dbh;
    $sql="UPDATE `contact` SET `prenom`=:prenom, `nom`=:nom,`email`=:email,`telephone`=:telephone,`id_administrateur`=:id_administrateur WHERE id_contact = :id_contact";

    
    $query= $dbh->prepare($sql);
    $query->bindValue('id_contact', $id_contact);
    $query->bindValue('prenom', $prenom);
    $query->bindValue('nom', $nom);
    $query->bindValue('email', $email);
    $query->bindValue('telephone', $telephone);
    $query->bindValue('id_administrateur', $id_administrateur);

    return $query->execute();
    
}

function deleteContact
(
    string $id_contact,
    string $prenom,
    string $nom,
    string $email,
    string $telephone,
    string $id_administrateur
    
): bool|string {
    global $dbh;
    $sql="DELETE FROM `contact` WHERE id_contact = $id_contact";
    $query = $dbh->prepare($sql);
    $query->bindValue('id_contact', $id_contact);
    $query->bindValue(':prenom', $prenom);
    $query->bindValue(':nom', $nom);
    $query->bindValue(':email', $email);
    $query->bindValue(':telephone', $telephone);
    $query->bindValue(':id_administrateur', $id_administrateur);

    return $query->execute();
    
} 


?>
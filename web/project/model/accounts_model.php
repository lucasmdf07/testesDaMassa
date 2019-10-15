<?php

// Acme Registration Model

function regClient($firstname, $lastname, $username, $email, $password){
     
    $db = get_db();

    $sql = 'INSERT INTO doclookup.users (firstname, lastname, username, email, password) 
    VALUES (:firstname, :lastname, :username, :email, :password)';
   
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}

// Check for an existing email address
function checkExistingEmail($email) {
    $db = get_db();
    $sql = 'SELECT email FROM doclookup.users WHERE email = :email';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
    $stmt->closeCursor();
    if(empty($matchEmail)){
        return 0;
    } else {
        return 1;
    }
}

// Get client data based on an email address
function getClient($email){
    $db = get_db();
    $sql = "SELECT user_id, firstname, lastname, username, usrlevel, email, userpassword FROM doclookup.users WHERE email = :email";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $clientData;
}


//These are the updates that can be done
function updateClient($firstname, $lastname, $email, $clientId){   
    $db = get_db();
    $sql = 'UPDATE doclookup.users SET firstname = :firstname, lastname = :lastname, email = :email WHERE clientId = :clientId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

function updatePassword($password, $clientId){
    $db = get_db();
    $sql = 'UPDATE doclookup.users SET password = :password WHERE clientId = :clientId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}


// Delete Client Record
function deleteClient($clientId){
    $db = get_db();
    $sql = 'DELETE FROM doclookup.users WHERE clientId = :clientID';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientId', $firstname, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

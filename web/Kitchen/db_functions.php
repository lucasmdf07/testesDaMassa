<?
// Select and return the list of types
function getTypes() {
    global $db;
    $query = "SELECT * FROM types
        ORDER BY types_name";
    $statement = $db->prepare($query);
    $statement->execute();
    $types = $statement->fetchAll();
    $statement->closeCursor();
    return $types;
}

// Select and return the list of storage locations
function getStorage() {
    global $db;
    $query = "SELECT * FROM entitylist
        ORDER BY storage";
    $statement = $db->prepare($query);
    $statement->execute();
    $entity = $statement->fetchAll();
    $statement->closeCursor();
    return $entity;
}

// Insert name, type id, and description into item, then return id
function insertItem($data) {
    global $db;
    $query = "INSERT INTO item
        (item_name, types_id, item_description)
        VALUES (:item_name, :types_id, :item_description)";
    $statement = $db->prepare($query);
    $statement->bindValue(':item_name',$data['newItem']);
    $statement->bindValue(':types_id',$data['type']);
    $statement->bindValue(':item_description',$data['newDescription']);
    $statement->execute();
    $statement->closeCursor();
    return $db->lastInsertId();
}

// Add item id to new row, including quantity, expdate, and entity location
function addRow($data, $itemID, $userID){
    global $db;
    $query = "INSERT INTO inventory
        (username_id, item_id, expdate, quantity, entitylist_id)
        VALUES (:username_id, :item_id, :expdate, :quantity, :entitylist_id)";
    $statement = $db->prepare($query);
    $statement->bindValue(':username_id',$userID);
    $statement->bindValue(':item_id',$itemID);
    $statement->bindValue(':expdate',$data['expdate']);
    $statement->bindValue(':quantity',$data['quantity']);
    $statement->bindValue(':entitylist_id',$data['storage']);
    $statement->execute();
    $statement->closeCursor();
    return $db->lastInsertId();
}

function updateItem($data) {
    global $db;
    $query = "UPDATE item
        SET (item_name, types_id, item_description)
        VALUES (:item_name, :types_id, :item_description)";
    $statement = $db->prepare($query);
    $statement->bindValue(':item_name',$data['item']);
    $statement->bindValue(':types_id',$data['type']);
    $statement->bindValue(':item_description',$data['description']);
    $statement->execute();
    $statement->closeCursor();
    return $db->lastInsertId();
}

function updateRow($data, $itemID, $userID){
    global $db;
    $query = "UPDATE inventory
        SET (username_id, item_id, expdate, quantity, entitylist_id)
        VALUES (:username_id, :item_id, :expdate, :quantity, :entitylist_id)";
    $statement = $db->prepare($query);
    $statement->bindValue(':username_id',$userID);
    $statement->bindValue(':item_id',$itemID);
    $statement->bindValue(':expdate',$data['expdate']);
    $statement->bindValue(':quantity',$data['quantity']);
    $statement->bindValue(':entitylist_id',$data['storage']);
    $statement->execute();
    $statement->closeCursor();
    return $db->lastInsertId();
}

?>
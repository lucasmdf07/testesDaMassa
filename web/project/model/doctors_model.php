<?php

function getAllSpecialties() {
    $db = get_db();
    $sql = 'SELECT specialty_id, specialty_name FROM doclookup.specialties ORDER BY specialty_name';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $specialties = $stmt->fetchAll();
    $stmt->closeCursor();
    return $specialties;
}

function getSpecialty($category){
    $db = get_db();
    $sql = 'SELECT specialty_id FROM doclookup.specialties WHERE specialty_name = :category';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':category', $category, PDO::PARAM_STR);
    $stmt->execute();
    $specialty = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $specialty;
}

function addDoctor($docFName, $docLName, $docSex, $docTitle){
    $db = get_db();
    $sql = 'INSERT INTO doclookup.doctors (doctorfirstname, doctorlastname, sex, doctor_title) VALUES (:firstname, :lastname, :sex, :title)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':firstname', $docFName, PDO::PARAM_STR);
    $stmt->bindValue(':lastname', $docLName, PDO::PARAM_STR);
    $stmt->bindValue(':sex', $docSex, PDO::PARAM_STR);
    $stmt->bindValue(':title', $docTitle, PDO::PARAM_STR);
    $stmt->execute();
    $lastId = $db->lastInsertId();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return array($rowsChanged, $lastId);
}

function addDocAddress($docId, $docAddress1, $docAddress2, $docAddress3, $docCity, $docState, $docZip, $docPhone){
    $db = get_db();
    $sql = 'INSERT INTO doclookup.addresses ( doctor_id, docaddress1, docaddress2, docaddress3, doccity, docstate, doczip, docphone) VALUES (:docid, :addr1, :addr2, :addr3, :city, :addst, :zip, :docphone)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':docid', $docId, PDO::PARAM_INT);
    $stmt->bindValue(':addr1', $docAddress1, PDO::PARAM_STR);
    $stmt->bindValue(':addr2', $docAddress2, PDO::PARAM_STR);
    $stmt->bindValue(':addr3', $docAddress3, PDO::PARAM_STR);
    $stmt->bindValue(':city', $docCity, PDO::PARAM_STR);
    $stmt->bindValue(':addst', $docState, PDO::PARAM_STR);
    $stmt->bindValue(':zip', $docZip, PDO::PARAM_STR);
    $stmt->bindValue(':docphone', $docPhone, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}


function addDocSpec($docid, $docSpecId){
    $db = get_db();
    $sql = 'INSERT INTO doclookup.doc_specialties (doctor_id, specialties_id) VALUES (:docid, :specid)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':docid', $docid, PDO::PARAM_INT);
    $stmt->bindValue(':specid', $docSpecId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

function deleteDoctor($docid){
    $db = get_db();
    $sql = 'DELETE doclookup.doctors SET firstname = :firstname, lastname = :lastname WHERE clientId = :clientId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

function deleteDocAddress($docid){
    $db = get_db();
    $sql = 'DELETE doclookup.doctors SET firstname = :firstname, lastname = :lastname WHERE clientId = :clientId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

function deleteDocSpecialty($docid){
    $db = get_db();
    $sql = 'DELETE doclookup.doctors SET firstname = :firstname, lastname = :lastname WHERE clientId = :clientId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

function modDoctor($docid, $docFName, $docLName){
    $db = get_db();
    $sql = 'UPDATE doclookup.doctors SET doctorfirstname = :firstname, doctorlastname = :lastname WHERE doctor_id = :docid';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':firstname', $docFName, PDO::PARAM_STR);
    $stmt->bindValue(':lastname', $docLName, PDO::PARAM_STR);
    $stmt->bindValue(':docid', $docid, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

function modDocAddress($docId, $addId, $addLine1, $addLine2, $addLine3, $addCity, $addState, $addZip){
    $db = get_db();
    $sql = 'UPDATE doclookup.addresses SET docaddress1 = :addr1, docaddress2 = :addr2, docaddress3 = :addr3, doccity = :city, docstate = :addst, doczip = :zip WHERE doctor_id = :docid AND address_id = :address_id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':addr1', $addLine1, PDO::PARAM_STR);
    $stmt->bindValue(':addr2', $addLine2, PDO::PARAM_STR);
    $stmt->bindValue(':addr3', $addLine3, PDO::PARAM_STR);
    $stmt->bindValue(':city', $addCity, PDO::PARAM_STR);
    $stmt->bindValue(':addst', $addState, PDO::PARAM_STR);
    $stmt->bindValue(':zip', $addZip, PDO::PARAM_STR);
    $stmt->bindValue(':docid', $docId, PDO::PARAM_INT);
    $stmt->bindValue(':address_id', $addId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

function getDoctor($docId, $addId){
    $db = get_db();
    $sql = "SELECT dc.doctor_id, dc.doctorfirstname, dc.doctorlastname, da.docaddress1, da.docaddress2, da.docaddress3, da.doccity, da.docstate, da.doczip, da.address_id FROM doclookup.doctors AS dc RIGHT JOIN doclookup.addresses AS da ON da.doctor_id = dc.doctor_id RIGHT JOIN doclookup.doc_specialties AS ds ON dc.doctor_id = ds.doctor_id JOIN doclookup.specialties AS sp ON sp.specialty_id = ds.specialties_id WHERE dc.doctor_id = $docId AND da.address_id = $addId";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $doctor = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $doctor;
}

function getDocRecords(){
    $db = get_db();
    $sql = "SELECT dc.doctor_id, dc.doctorFirstname, dc.doctorLastname, ad.docaddress1, ad.docaddress2, ad.docaddress3, ad.doccity, ad.docstate, ad.doczip, ad.address_id FROM doclookup.doctors AS dc 
    RIGHT JOIN doclookup.addresses AS ad ON ad.doctor_id = dc.doctor_id
    RIGHT JOIN doclookup.doc_specialties AS ds ON dc.doctor_id = ds.doctor_id 
    JOIN doclookup.specialties AS sp ON sp.specialty_id = ds.id ORDER BY dc.doctorLastname";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $doctors = $stmt->fetchAll();
    $stmt->closeCursor();
    return $doctors;
}
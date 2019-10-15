<?php

function insertscripture($postData) {

}

function getAllScriptures(){
    $db = get_db();
    $sql = 'SELECT book, chapter, verse, content FROM scriptures.scriptures';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $clientData;

}

function getScripturesByTopic($topicid){
    $db = get_db();
    $sql = 'SELECT book, chapter, verse, content FROM scriptures.scriptures AS sc JOIN scriptures.topiclinking AS tl ON sc.id = tl.scripture_id JOIN scriptures.topics AS tc ON tc.topic_id = tl.topiclink_id WHERE tc.topic_id = :topicid';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':topicid', $topicid, PDO::PARAM_STR);
    $stmt->execute();
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $clientData;

}


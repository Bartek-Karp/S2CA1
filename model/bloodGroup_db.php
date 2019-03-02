<?php

function get_bloodgroup() {
    global $db;
    $query = 'SELECT * FROM bloodgroup
              ORDER BY bloodID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;
}

function get_blood_type($blood_id) {
    global $db;
    $query = 'SELECT * FROM bloodgroup
              WHERE bloodID = :blood_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':blood_id', $blood_id);
    $statement->execute();
    $blood = $statement->fetch();
    $statement->closeCursor();
    $blood_type = $blood['bloodType'];
    return $blood_type;
}

function add_blood($type) {
    global $db;
    $query = 'INSERT INTO bloodgroup (bloodType)
              VALUES (:type)';
    $statement = $db->prepare($query);
    $statement->bindValue(':type', $type);
    $statement->execute();
    $statement->closeCursor();
}

function delete_blood($blood_id) {
    global $db;
    $query = 'DELETE FROM bloodgroup
              WHERE bloodID = :blood_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':blood_id', $blood_id);
    $statement->execute();
    $statement->closeCursor();
}

?>
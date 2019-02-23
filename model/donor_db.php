<?php
function get_donors() {
    global $db;
    $query = 'SELECT * FROM donors
              ORDER BY donorID';
    $statement = $db->prepare($query);
    $statement->execute();
    $donors = $statement->fetchAll();
    $statement->closeCursor();
    return $donors;
}

function get_donors_by_blood($blood_id) {
    global $db;
    $query = 'SELECT * FROM donors
              WHERE donors.bloodID = :blood_id
              ORDER BY productID';
    $statement = $db->prepare($query);
    $statement->bindValue(":blood_id", $blood_id);
    $statement->execute();
    $donors = $statement->fetchAll();
    $statement->closeCursor();
    return $donors;
}

function get_donor($donor_id) {
    global $db;
    $query = 'SELECT * FROM donors
              WHERE donorID = donor_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":donor_id", $donor_id);
    $statement->execute();
    $donor = $statement->fetch();
    $statement->closeCursor();
    return $donor;
}

function delete_donor($donor_id) {
    global $db;
    $query = 'DELETE FROM donors
              WHERE donorID = :donor_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':donor_id', $donor_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_donor($blood_id, $name, $number, $age) {
    global $db;
    $query = 'INSERT INTO donors
                 (bloodID, fullName, phoneNumber, age)
              VALUES
                 (:blood_id, :name, :number, :age)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $blood_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':number', $number);
    $statement->bindValue(':age', $age);
    $statement->execute();
    $statement->closeCursor();
}

function update_donor($donor_id, $blood_id, $name, $number, $age) {
    global $db;
    $query = 'UPDATE donors
              SET bloodID = :blood_id,
                  fullName = :name,
                  phoneNumber = :number,
                  age = :age
               WHERE donorID = :donor_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':blood_id', $blood_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':number', $number);
    $statement->bindValue(':age', $age);
    $statement->bindValue(':donor_id', $donor_id);
    $statement->execute();
    $statement->closeCursor();
}
?>
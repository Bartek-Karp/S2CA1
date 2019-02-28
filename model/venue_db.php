<?php
function get_venues() {
    global $db;
    $query = 'SELECT * FROM venues
              ORDER BY venueID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement; 
}

function get_location($venue_id) {
    global $db;
    $query = 'SELECT * FROM venues
              WHERE venueID = :venue_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':venue_id', $venue_id);
    $statement->execute();    
    $venue = $statement->fetch();
    $statement->closeCursor();    
    $location = $venue['location'];
    return $location;
}

function add_venue($type) {
    global $db;
    $query = 'INSERT INTO venues (location)
              VALUES (:place)';
    $statement = $db->prepare($query);
    $statement->bindValue(':place', $place);
    $statement->execute();
    $statement->closeCursor();    
}

function delete_venue($venue_id) {
    global $db;
    $query = 'DELETE FROM venues
              WHERE venueID = :venue_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':venue_id', $venue_id);
    $statement->execute();
    $statement->closeCursor();
}
?>
<?php
function get_venues() {
    global $db;
    $query = 'SELECT * FROM venues
              ORDER BY venueID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement; 
}
    
    function get_venue($venue_id) {
    global $db;
    $query = 'SELECT * FROM venues
              WHERE venueID = :venue_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':venue_id', $venue_id);
    $statement->execute();
    $venue = $statement->fetch();
    $statement->closeCursor();
    return $venue; 
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

function add_venue($location, $time, $date) {
    global $db;
    $query = 'INSERT INTO venues (location, date, time)
              VALUES (:location, :time, :date)';
    $statement = $db->prepare($query);
    $statement->bindValue(':location', $location);
    $statement->bindValue(':time', $time);
    $statement->bindValue(':date', $date);
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

function update_venue($venue_id, $location, $date, $time)
{
    global $db;
    $query = 'UPDATE venues
              SET location = :location,
                  date = :date,
                  time = :time
               WHERE venueID = :venue_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':venue_id', $venue_id);
    $statement->bindValue(':location', $location);
    $statement->bindValue(':date', $date);
    $statement->bindValue(':time', $time);
    $statement->execute();
    $statement->closeCursor();
}
?>
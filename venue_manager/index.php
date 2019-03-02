<?php

require('../model/database.php');
require('../model/donor_db.php');
require('../model/bloodGroup_db.php');
require('../model/venue_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_venue';
    }
}

if ($action == 'list_venue') {
    // Get the current venue ID
    $venue_id = filter_input(INPUT_GET, 'venue_id', FILTER_VALIDATE_INT);
    if ($venue_id == NULL || $venue_id == FALSE) {
        $venue_id = 1;
    }

    // Get venue
    $venues = get_venues();

    // Display the venue list
    include('venue_list.php');
} else if ($action == 'show_edit_form') {
    $venue_id = filter_input(INPUT_POST, 'venue_id', FILTER_VALIDATE_INT);
    if ($venue_id == NULL || $venue_id == FALSE) {
        $error = "Missing or incorrect venue id.";
        include('../errors/error.php');
    } else {
        $venue = get_venue($venue_id);
        include('venue_edit.php');
    }
} else if ($action == 'update_venue') {
    $venue_id = filter_input(INPUT_POST, 'venue_id', FILTER_VALIDATE_INT);
    $location = filter_input(INPUT_POST, 'location');
    $date = filter_input(INPUT_POST, 'date');
    $time = filter_input(INPUT_POST, 'time');

    // Validate the inputs
    if ($venue_id == NULL || $venue_id == FALSE || $location == NULL || $date == NULL || $time == NULL) {
        $error = "Invalid venue data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        update_venue($venue_id, $location, $date, $time);

        // Display the venue List page 
        header("Location: .?venue_id=$venue_id");
    }
} else if ($action == 'delete_venue') {
    $venue_id = filter_input(INPUT_POST, 'venue_id', FILTER_VALIDATE_INT);
    if ($venue_id == NULL || $venue_id == FALSE) {
        $error = "Missing or incorrect donor id or blood id.";
        include('../errors/error.php');
    } else {
        delete_venue($venue_id);
        header("Location: .?venue_id=$venue_id");
    }
} else if ($action == 'show_add_form') {
    include('venue_add.php');
} else if ($action == 'add_venue') {
    $place_id = filter_input(INPUT_POST, 'place_id', FILTER_VALIDATE_INT);
    $location = filter_input(INPUT_POST, 'location');
    $date = filter_input(INPUT_POST, 'date');
    $time = filter_input(INPUT_POST, 'time');
    if ($location == NULL || $date == NULL || $time == NULL || $time == FALSE) {
        $error = "Invalid donor data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        add_venue($location, $date, $time);
        header("Location: .?place_id=$place_id");
    }
} else if ($action == 'list_venue') {
    $venues = get_venues();
    include('venue_list.php');
} else if ($action == 'add_venue') {
    $location = filter_input(INPUT_POST, 'location');

    // Validate inputs
    if ($location == NULL) {
        $error = "Invalid blood type. Check type and try again.";
        include('../errors/error.php');
    } else {
        add_venue($type);
        header('Location: .?action=list_venue');  // display the venue list
    }
} else if ($action == 'delete_venue') {
    $venue_id = filter_input(INPUT_POST, 'venue_id', FILTER_VALIDATE_INT);
    delete_venue($venue_id);
    header('Location: .?action=list_venue');      // display the Blood List page
}
?>
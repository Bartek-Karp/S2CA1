<?php
require('../model/database.php');
require('../model/donor_db.php');
require('../model/bloodGroup_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_donors';
    }
}

if ($action == 'list_donors') {
    // Get the current blood ID
    $blood_id = filter_input(INPUT_GET, 'blood_id', 
            FILTER_VALIDATE_INT);
    if ($blood_id == NULL || $blood_id == FALSE) {
        $blood_id = 1;
    }
    
    // Get donor and category data
    $blood_type = get_blood_type($blood_id);
    $bloodgroup = get_bloodgroup();
    $donors_blood = get_donors_by_blood($blood_id);
    $donors = get_donors();

    // Display the donor list
    include('donor_list.php');
} else if ($action == 'show_edit_form') {
    $donor_id = filter_input(INPUT_POST, 'donor_id', 
            FILTER_VALIDATE_INT);
    if ($donor_id == NULL || $donor_id == FALSE) {
        $error = "Missing or incorrect donor id.";
        include('../errors/error.php');
    } else { 
        $donor = get_donor(donor_id);
        include('donor_edit.php');
    }
} else if ($action == 'update_donor') {
    $donor_id = filter_input(INPUT_POST, 'donor_id', 
            FILTER_VALIDATE_INT);
    $blood_id = filter_input(INPUT_POST, 'blood_id', 
            FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'name');
    $number = filter_input(INPUT_POST, 'number');
    $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);

    // Validate the inputs
    if ($donor_id == NULL || $donor_id == FALSE || $blood_id == NULL || 
            $blood_id == FALSE || $name == NULL || $number == NULL || 
            $age == NULL || age == FALSE) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        update_donor($donor_id, $blood_id, $name, $number, $age);

        // Display the Donor List page for the current blood type
        header("Location: .?blood_id=$blood_id");
    }
} else if ($action == 'delete_donor') {
    $donor_id = filter_input(INPUT_POST, 'donor_id', 
            FILTER_VALIDATE_INT);
    $blood_id = filter_input(INPUT_POST, 'blood_id', 
            FILTER_VALIDATE_INT);
    if ($blood_id == NULL || $blood_id == FALSE ||
            $donor_id == NULL || $donor_id == FALSE) {
        $error = "Missing or incorrect donor id or category id.";
        include('../errors/error.php');
    } else { 
        delete_donor($donor_id);
        header("Location: .?blood_id=$blood_id");
    }
} else if ($action == 'show_add_form') {
    $bloodgroup = get_bloodgroup();
    include('donor_add.php');
} else if ($action == 'add_donor') {
    $blood_id = filter_input(INPUT_POST, 'blood_id', 
            FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'name');
    $number = filter_input(INPUT_POST, 'number');
    $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_FLOAT);
    if ($blood_id == NULL || $blood_id == FALSE || $name == NULL || 
            $number == NULL || $age == NULL || $age == FALSE) {
        $error = "Invalid donor data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        add_donor($blood_id, $name, $number, $age);
        header("Location: .?blood_id=$blood_id");
    }
} else if ($action == 'list_bloodgroup') {
    $bloodgroup = get_bloodgroup();
    include('blood_list.php');
} else if ($action == 'add_blood') {
    $name = filter_input(INPUT_POST, 'name');

    // Validate inputs
    if ($name == NULL) {
        $error = "Invalid blood type. Check type and try again.";
        include('../errors/error.php');
    } else {
        add_blood($name);
        header('Location: .?action=list_bloodgroup');  // display the Category List page
    }
} else if ($action == 'delete_blood') {
    $blood_id = filter_input(INPUT_POST, 'blood_id', 
            FILTER_VALIDATE_INT);
    delete_blood($blood_id);
    header('Location: .?action=list_bloodgroup');      // display the Category List page
}
?>
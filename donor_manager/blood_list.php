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
    $blood_id = filter_input(INPUT_GET, 'blood_id', 
            FILTER_VALIDATE_INT);
    if ($blood_id == NULL || $blood_id == FALSE) {
        $blood_id = 1;
    }
    $bloodgroup = get_bloodgroup();
    $blood_type = get_blood_type($blood_id);
    $donors = get_donors_by_blood($blood_id);

    include('donor_list.php');
} else if ($action == 'view_donor') {
    $donor_id = filter_input(INPUT_GET, 'donor_id', 
            FILTER_VALIDATE_INT);   
    if ($donor_id == NULL || $donor_id == FALSE) {
        $error = 'Missing or incorrect donor id.';
        include('../errors/error.php');
    } else {
        $bloodgroup = get_bloodgroup();
        $donor = get_donor($donor_id);

        // Get donor data
        $name = $donor['fullName'];
        $number = $donor['phoneNumber'];
        $age = $donor['age'];

        
        // Get image URL and alternate text
        $image_filename = '../images/' . $code . '.png';
        $image_alt = 'Image: ' . $code . '.png';

        include('donor_view.php');
    }
}
?>
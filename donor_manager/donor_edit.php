<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Donor</h1>
    <form action="index.php" method="post" id="add_donor_form">

        <input type="hidden" name="action" value="update_donor">

        <input type="hidden" name="donor_id"
               value="<?php echo $donor['donorID']; ?>">

        <label>Blood ID:</label>
        <input type="blood_id" name="blood_id"
               value="<?php echo $donor['donorID']; ?>">
        <br>

        <label>Full Name:</label>
        <input type="input" name="name"
               value="<?php echo $donor['fullName']; ?>">
        <br>

        <label>Phone Number:</label>
        <input type="input" name="number"
               value="<?php echo $donor['phoneNumber']; ?>">
        <br>

        <label>Age:</label>
        <input type="input" name="age"
               value="<?php echo $donor['age']; ?>">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Save Changes">
        <br>
    </form>
    <p><a href="index.php?action=list_donors">View Donor List</a></p>

</main>
<?php include '../view/footer.php'; ?>
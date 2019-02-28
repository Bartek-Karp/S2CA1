<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Donor</h1>
    <form action="index.php" method="post" id="add_donor_form">

        <input type="hidden" name="action" value="update_donor">

        <label>Blood Type:</label>
        <select name="blood_id">
            <?php foreach ($bloodgroup as $blood) : ?>
                <option value="<?php echo $blood['bloodID']; ?>">
                    <?php echo $blood['bloodType']; ?>
                </option>
            <?php endforeach; ?>
        </select>
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
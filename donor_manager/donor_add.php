<?php include '../view/header.php'; ?>
<main>
    <h1>Add Donor</h1>
    <form action="index.php" method="post" id="add_donor_form">
        <input type="hidden" name="action" value="add_donor">

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
        <input type="input" name="name">
        <br>

        <label>Phone Number:</label>
        <input type="input" name="number">
        <br>

        <label>Age:</label>
        <input type="input" name="age">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Donor">
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_donors">View Donor List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>

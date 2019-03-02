<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Location</h1>
    <form action="index.php" method="post" id="add_venue_form">

        <input type="hidden" name="action" value="update_venue">

        <input type="hidden" name="action" value="venue_id">

        <label>Location:</label>
        <input type="input" name="location"
               value="<?php echo $venue['location']; ?>">
        <br>

        <label>Date:</label>
        <input type="input" name="date"
               value="<?php echo $venue['date']; ?>">
        <br>

        <label>Time:</label>
        <input type="input" name="time"
               value="<?php echo $venue['time']; ?>">
        <br>
        <br>
        <label>&nbsp;</label>
        <input type="submit" value="Save Changes">
        <br>
    </form>
    <p><a href="index.php?action=list_venue">View venue List</a></p>

</main>
<?php include '../view/footer.php'; ?>
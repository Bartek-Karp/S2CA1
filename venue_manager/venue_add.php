<?php include '../view/header.php'; ?>
<main>
    <h1>Add Venue</h1>
    <form action="index.php" method="post" id="add_venue_form">
        <input type="hidden" name="action" value="add_venue">

        
        <label>Location:</label>
        <input type="input" name="location">
        <br>

        <label>Date:</label>
        <input type="input" name="date">
        <br>

        <label>Time:</label>
        <input type="input" name="time">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Venue">
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_venues">View Venue List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>

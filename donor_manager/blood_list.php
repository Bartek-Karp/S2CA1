<?php include '../view/header.php'; ?>
<main>

    <h1>Category List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($bloodgroup as $blood) : ?>
            <tr>
                <td><?php echo $blood['bloodType']; ?></td>
                <td>
                    <form id="delete_donor_form"
                          action="index.php" method="post">
                        <input type="hidden" name="action" value="delete_blood">
                        <input type="hidden" name="blood_id"
                               value="<?php echo $blood['bloodID']; ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br />

    <h2>Add Blood Type</h2>
    <form id="add_blood_form"
          action="index.php" method="post">
        <input type="hidden" name="action" value="add_blood">

        <label>Type:</label>
        <input type="input" name="name">
        <input type="submit" value="Add">
    </form>

    <p><a href="index.php?action=list_donors">List Donors</a></p>
    <br>
    <p> <a href="../index.php">Menu</a></p>

</main>
<?php include '../view/footer.php'; ?>
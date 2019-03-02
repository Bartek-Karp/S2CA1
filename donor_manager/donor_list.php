<?php include '../view/header.php'; ?>
<main>

    <h1>Donor List</h1>

    <aside>
        <!-- display a list of blood types -->
        <h2>Blood Type</h2>
        <?php include '../view/blood_nav.php'; ?>        
    </aside>

    <section>
        <!-- display a table of donors -->
        <h2><?php echo $blood_type; ?></h2>
        <table>
            <tr>
                <th>Full Name</th>
                <th>Phone Number</th>
                <th class="right">Age</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($donors_blood as $donor) : ?>
                <tr>
                    <td><?php echo $donor['fullName']; ?></td>
                    <td><?php echo $donor['phoneNumber']; ?></td>
                    <td class="right"><?php echo $donor['age']; ?></td>
                    <td><form action="." method="post">
                            <input type="hidden" name="action"
                                   value="edit_form">
                            <input type="hidden" name="donor_id"
                                   value="<?php echo $donor['donorID']; ?>">
                            <input type="hidden" name="blood_id"
                                   value="<?php echo $donor['bloodID']; ?>">
                            <input type="submit" value="Edit">
                        </form></td>
                    <td><form action="." method="post">
                            <input type="hidden" name="action"
                                   value="delete_donor">
                            <input type="hidden" name="donor_id"
                                   value="<?php echo $donor['donorID']; ?>">
                            <input type="hidden" name="blood_id"
                                   value="<?php echo $donor['bloodID']; ?>">
                            <input type="submit" value="Delete">
                        </form></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Donor</a></p>
        <p><a href="?action=list_bloodgroup">List Blood Groups</a></p>
        <br>
        <p> <a href="../index.php">Menu</a></p>

    </section>

</main>
<?php include '../view/footer.php'; ?>
<?php include '../view/header.php'; ?>
<main>

    <h1>Venues</h1>
    <section>
        <!-- display a table of donors -->
        <center><table>
            <tr>
                <th>Location</th>
                <th>Date</th>
                <th class="right">Time</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($venues as $venue) : ?>
                <tr>
                    <td><?php echo $venue['location']; ?></td>
                    <td><?php echo $venue['date']; ?></td>
                    <td class="right"><?php echo $venue['time']; ?></td>
                    <td><form action="." method="post">
                            <input type="hidden" name="action"
                                   value="show_edit_form">
                            <input type="hidden" name="venue_id"
                                   value="<?php echo $venue['venueID']; ?>">
                            <input type="submit" value="Edit">
                        </form></td>
                    <td><form action="." method="post">
                            <input type="hidden" name="action"
                                   value="delete_venue">
                            <input type="hidden" name="venue_id"
                                   value="<?php echo $venue['venueID']; ?>">
                            <input type="hidden" name="venue_id"
                                   value="<?php echo $venue['venueID']; ?>">
                            <input type="submit" value="Delete">
                        </form></td>
                </tr>
            <?php endforeach; ?>
            </table></center>
        <p><a href="?action=show_add_form">Add Venue</a></p>
        <br>
        <p> <a href="../index.php">Menu</a></p>
        
    </section>

</main>
<?php include '../view/footer.php'; ?>
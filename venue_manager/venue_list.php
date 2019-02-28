<?php include '../view/header.php'; ?>
<main>
    <aside>
        <!-- display a list of blood types -->
        <h2>Venues</h2>
        <?php include '../view/blood_nav.php'; ?>        
    </aside>
    <section>
        <h1><?php echo $venues; ?></h1>
        <ul class="nav">
            <!-- display links for donors in selected blood group -->
            <?php foreach ($venues as $venue) : ?>
            <li>
                <a href="?action=view_venue&amp;venue_id=<?php 
                          echo $venue['venueID']; ?>">
                    <?php echo $venue['location']; ?>
                     <?php echo $venue['date']; ?>
                     <?php echo $venue['time']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>
<?php include '../view/footer.php'; ?>
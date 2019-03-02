<?php include '../view/header.php'; ?>
<main>
    <aside>
        <!-- display a list of blood types -->
        <h2>Categories</h2>
        <?php include '../view/blood_nav.php'; ?>        
    </aside>
    <section>
        <h1><?php echo $blood_type; ?></h1>
        <ul class="nav">
            <!-- display links for donors in selected blood group -->
            <?php foreach ($donors as $donor) : ?>
            <li>
                <a href="?action=view_donor&amp;donor_id=<?php 
                          echo $donor['donorID']; ?>">
                    <?php echo $donor['fullName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <br>
        <p> <a href="../index.php">Menu</a></p>
</main>
<?php include '../view/footer.php'; ?>
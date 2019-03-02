<?php include '../view/header.php'; ?>
<main>

    <section>
        <h1><?php echo $donor['fullName']; ?>'s information</h1>

        <div action="index.php" method="post" id="view_donor">
            <div id="right_column">
                <p><b>Full Name:</b> <?php echo $name; ?></p>
                <p><b>Contact Number:</b> <?php echo $number; ?></p>
                <p><b>Age:</b> <?php echo $age; ?></p>
                <br><br>
                <p> <a href="../index.php">Menu</a></p>

            </div>
        </div>

    </section>
</main>
<?php include '../view/footer.php'; ?>
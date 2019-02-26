
        <nav>
            <ul>
                <!-- display links for all blood groups -->
                <?php foreach($bloodgroup as $blood) : ?>
                <li>
                    <a href="?blood_id=<?php 
                              echo $blood['bloodID']; ?>">
                        <?php echo $blood['bloodType']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>


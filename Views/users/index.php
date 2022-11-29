<section class="images-list">
    <?php
    foreach ($users as $user) {
        ?>
        <article class="card small">
            <header>
                <img src="<?= photosUrl(($user['photo'] ?? '')); ?>">
                <h2><?= $user['first_name'] . " " . $user['last_name']; ?></h2>
            </header>

            <div class="card-description">
                <?= $user['description']; ?>
            </div>
            <div class="buttons">
                <a class="button" href="showUser.php?id=<?= $user['id']; ?>">Show</a>
            </div>
        </article>

    <?php } ?>
</section>

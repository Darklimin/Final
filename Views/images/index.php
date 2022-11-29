<body>
<section class="images-list">
    <?php
    foreach ($images as $image) {
        ?>
        <article class="card small">
            <header>
                <img src="<?= imagesUrl(($image['image'] ?? '')); ?>">
                <h2><?= $image['name']; ?></h2>
                <p>Likes collected: <?= $image['likes']; ?></p>
            </header>

            <div class="card-description">
                <?= $image['description']; ?>
            </div>

            <div class="buttons">
                <a class="button" href="like.php?id=<?= $image['id']; ?>">Like</a>
                <a class="button" href="show.php?id=<?= $image['id']; ?>">Show</a>
            </div>
        </article>
    <?php } ?>
</section>
</body>
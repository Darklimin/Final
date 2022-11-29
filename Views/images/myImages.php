<section class="images-list">
    <?php if (sizeof($userImages) == 0) { ?>
        <p class="big-text">You have no images. Upload first one <a href="<?= publicUrl('create.php'); ?>">here</a></p>
    <?php } else { ?>
        <?php
        foreach ($userImages as $userImage) {
            ?>
            <article class="card small">
                <header>
                    <img src="<?= imagesUrl(($userImage['image'] ?? '')); ?>">
                    <h2><?= $userImage['name']; ?></h2>
                    <p>Likes collected: <?= $userImage['likes']; ?></p>
                </header>

                <div class="card-description">
                    <?= $userImage['description']; ?>
                </div>

                <div class="buttons">
                    <a class="button" href="show.php?id=<?= $userImage['id']; ?>">Show</a>
                    <a class="button" href="edit.php?id=<?= $userImage['id']; ?>">Edit</a>
                    <a class="button" href="delete.php?id=<?= $userImage['id']; ?>">Delete</a>
                </div>
            </article>
        <?php } ?>
    <?php } ?>
</section>

<section class="image-list">
    <article class="card">
        <header>
            <img class="big-user-photo" src="<?= photosUrl(($user['photo'] ?? '')); ?>">
            <h2><?= $user['first_name'] . " " . $user['last_name']; ?></h2>
        </header>

        <div class="card-description">
            <?= $user['description']; ?>
        </div>
        <div class="card-description">
            <?php if (sizeof($userImages) == 0) { ?>
                <p><?= $user['first_name']; ?> has no images</p>
            <?php } else { ?>
            <p><?= $user['first_name']; ?> images:</p>
            <section class="images-list">
                <?php foreach ($userImages as $userImage) { ?>
                    <article class="card smaller">
                        <img src="<?= imagesUrl(($userImage["image"] ?? '')); ?>">
                    </article>
                <?php } ?>
            </section>
            <?php } ?>
        </div>
    </article>
</section>
<section class="image-list">
    <article class="card">
        <header>
        <img src="<?= imagesUrl(($image['image'] ?? '')); ?>">
            <h2><?= $image['name']; ?></h2>
        </header>

        <div class="card-description">
            <p><?= $image['description']; ?></p>
            <p>Image author: <?= $user['first_name'] . " " . $user['last_name']; ?></p>
            <p>Likes collected: <?= $image['likes']; ?></p>
        </div>
    </article>
</section>
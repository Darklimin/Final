<section id="login-form">
  <form method="POST" action="<?= publicUrl('update.php'); ?>" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= ($image['id'] ?? ''); ?>">

    <label for="name">Name:</label>
    <input type="text" name="name" value="<?= ($image['name'] ?? ''); ?>">

    <label for="description">Description:</label>
    <textarea rows="5" type="text" name="description"><?= ($image['description'] ?? ''); ?></textarea>

    <input type="submit" value="Submit">
  </form>
</section>
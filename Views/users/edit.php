<section id="login-form">
    <form method="POST" action="<?= publicUrl('updateUser.php'); ?>" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= ($user['id'] ?? ''); ?>">

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="<?= ($user['first_name'] ?? ''); ?>">

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="<?= ($user['last_name'] ?? ''); ?>">

        <label for="description">Description:</label>
        <textarea rows="5" type="text" name="description"><?= ($user['description'] ?? ''); ?></textarea>

        <input type="submit" value="Submit">
    </form>
</section>
<section id="login-form">
  <form method="POST" action="<?= publicUrl('store.php'); ?>" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="text" name="name">

    <label for="image">Image:</label>
    <input type="file" name="image">

    <label for="description">Description:</label>
    <textarea rows="5" type="text" name="description"></textarea>

    <input type="submit" value="Submit">
  </form>
</section>
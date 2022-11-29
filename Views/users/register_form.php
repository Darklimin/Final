<form id="login-form" action="<?= publicUrl('registerUser.php'); ?>" method="post" enctype="multipart/form-data">
    <h1>Sign Up</h1>
    <div>
        <label for="first_name">First name:</label>
        <input type="text" name="first_name" id="first_name">
    </div>
    <div>
        <label for="last_name">Last name:</label>
        <input type="text" name="last_name" id="last_name">
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea rows="5" type="text" name="description"></textarea>
    </div>
    <div>
        <label for="photo">Photo:</label>
        <input type="file" name="photo">
    </div>
    <input type="submit" value="Submit">

    <h3>Already a member? <a href="login.php">Login here</a></h3>
</form>


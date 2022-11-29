<section id="login-form">
    <heading>
        <h1>Log in into Images gallery</h1>
    </heading>
    <div>
        <form action="<?= publicUrl('login.php'); ?>" method="POST">
            <input name="email" placeholder="email" value="<?php echo ($data['email'] ?? ''); ?>">
            <input type="password" name="password" placeholder="password" value="<?php echo ($data['password'] ?? ''); ?>">
            <input type="submit">
        </form>
    </div>
</section>
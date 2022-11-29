<section id="login-form">
    <h1>Images gallery</h1>
    <heading>
        <h2>Log in</h2>
    </heading>
    <div>
        <form action="<?= publicUrl('login.php'); ?>" method="POST">
            <input name="email" placeholder="email" value="<?php echo ($data['email'] ?? ''); ?>">
            <input type="password" name="password" placeholder="password" value="<?php echo ($data['password'] ?? ''); ?>">
            <input type="submit">
        </form>
    </div>
</section>
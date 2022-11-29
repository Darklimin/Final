<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images gallery</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="<?= publicUrl('css/main.css'); ?>">
    <link rel="stylesheet" href="<?= publicUrl('css/form.css'); ?>">
    <link rel="stylesheet" href="<?= publicUrl('css/navigation.css'); ?>">
</head>

<body>
<header>
    <nav>
        <ul>
            <?php if (!isset($_SESSION['is_authenticated']) ?? '') { ?>
            <li>
                <a href="<?= publicUrl('register.php'); ?>">Sign up</a>
            </li>
            <?php } ?>
            <?php if ($_SESSION['is_authenticated'] ?? '') { ?>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="<?= publicUrl('users.php'); ?>">Show users</a>
                </li>
                <li>
                    <a href="<?= publicUrl('create.php'); ?>">New image</a>
                </li>
                <li class='dropdown'>
                    <?php if ($_SESSION['user_name'] ?? '') echo $_SESSION['user_name'];
                    ?>
                    <ul class='dropdown-list'>
                        <li>
                            <a href="<?= publicUrl('showMyImages.php?id=') . $_SESSION['user_id']; ?>">My Images</a>
                        </li>
                        <li>
                            <a href="<?= publicUrl('editUser.php?id=') . $_SESSION['user_id']; ?>">Edit Account</a>
                        </li>
                        <li>
                            <a href="<?= publicUrl('login.php?logout=1'); ?>">Logout</a>
                        </li>
                        <li>
                            <a href="<?= publicUrl('deleteUser.php?id=') . $_SESSION['user_id']; ?>">Delete My Account</a>
                        </li>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </nav>
</header>
<main>
    <?php echo $content ?? ''; ?>
</main>
<script src='js/main.js'></script>
</body>

</html>
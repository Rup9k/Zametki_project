<!DOCTYPE html>
<html>
<head>
    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Zametki'; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <div class="header-content">
        <h1><a href="index.php" class="logo">Zametki</a></h1>

        <nav>

        <?php if (isLoggedIn()): ?>

            <a href="about.php">О нас</a>
            <a href="contact.php">Контакты</a>

                <a href="profile.php">Личный кабинет</a>
                <a href="logout.php">Выйти</a>
            <?php else: ?>
                <a href="login.php">Войти</a>
                <a href="register.php">Зарегистрироваться</a>
            <?php endif; ?>
        </nav>
    </div>
</header>

<div class="container">

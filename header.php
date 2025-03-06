<!DOCTYPE html>
<html>
<head>
    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Zametki'; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <h1><a href="index.php" class="logo">Zametki</a></h1>
    <nav>
        <?php if (isLoggedIn()): ?>
            <a href="profile.php" class="button">Личный кабинет</a>
            <a href="logout.php" class="button">Выйти</a>
        <?php else: ?>
            <a href="login.php" class="button">Войти</a>
            <a href="register.php" class="button">Зарегистрироваться</a>
        <?php endif; ?>
    </nav>
</header>

<div class="container">

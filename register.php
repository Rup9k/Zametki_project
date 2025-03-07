<?php
require_once "functions.php";
$pageTitle = "Регистрация";

$errors = []; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = escape($_POST["username"]);
    $email = escape($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if (empty($username)) {
        $errors[] = "Имя пользователя обязательно для заполнения.";
    } elseif (!validateUsername($username)) {
        $errors[] = "Имя пользователя должно содержать только латинские буквы, цифры и подчеркивания, длиной от 3 до 20 символов.";
    }

    if (empty($email)) {
        $errors[] = "Email обязателен для заполнения.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Некорректный формат Email.";
    }

    if (empty($password)) {
        $errors[] = "Пароль обязателен для заполнения.";
    } elseif (!validatePassword($password)) {
        $errors[] = "Пароль должен содержать минимум 8 символов, одну заглавную и одну строчную букву.";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Пароли не совпадают.";
    }


    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

        if (mysqli_query($conn, $sql)) {
            redirect("login.php");
        } else {
            $errors[] = "Ошибка при регистрации: " . mysqli_error($conn);
        }
    }
}
?>

<?php include "header.php"; ?>

<h1>Регистрация</h1>

<?php if (!empty($errors)): ?>
    <div class="error">
        <?php foreach ($errors as $error): ?>
            <p><?php echo $error; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form method="post">
    <label for="username">Имя пользователя:</label>
    <input type="text" id="username" name="username" value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>"><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>"><br>

    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password"><br>

    <label for="confirm_password">Подтвердите пароль:</label>
    <input type="password" id="confirm_password" name="confirm_password"><br>

    <button type="submit">Зарегистрироваться</button>
</form>

<div class="center-link">
    <p>Уже зарегистрированы? <a href="login.php">Войти</a></p>
</div>

<?php include "footer.php"; ?>

</div>
</body>
</html>

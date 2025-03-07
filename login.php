<?php
require_once "functions.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = escape($_POST["email"]);
    $password = $_POST["password"];

    if (empty($email)) {
        $errors[] = "Email обязателен для заполнения.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Некорректный формат Email.";
    }

    if (empty($password)) {
        $errors[] = "Пароль обязателен для заполнения.";
    }

    if (empty($errors)) {
        
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);

            
            if (password_verify($password, $user["password"])) {
              
                $_SESSION["user_id"] = $user["id"];  
                $_SESSION["username"] = $user["username"]; 

                redirect("profile.php");
            } else {
                $errors[] = "Неверный пароль.";
            }
        } else {
            $errors[] = "Пользователь с таким Email не найден.";
        }
    }
}

$pageTitle = "Вход";
?>
<?php include "header.php"; ?>

<h1>Вход</h1>

<?php if (!empty($errors)): ?>
    <div class="error">
        <?php foreach ($errors as $error): ?>
            <p><?php echo $error; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>"><br>

    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password">

    <div class="center-link">
    <p>Еще не зарегистрированы? <a href="register.php">Зарегистрироваться</a></p>
</div>

    <button type="submit">Войти</button>
</form>

<?php include "footer.php"; ?>

</div>
</body>
</html>

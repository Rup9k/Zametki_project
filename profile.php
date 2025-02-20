<?php
require_once "functions.php";

if (!isLoggedIn()) {
    redirect("login.php");
}

$user_id = $_SESSION["user_id"];

$sql = "SELECT username, email FROM users WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    $username = htmlspecialchars($user["username"]);
    $email = htmlspecialchars($user["email"]);
} else {
    redirect("index.php");
}

$pageTitle = "Личный кабинет";
?>

<?php include "header.php"; ?>

<h1>Личный кабинет</h1>

<p><strong>Имя пользователя:</strong> <?php echo $username; ?></p>
<p><strong>Email:</strong> <?php echo $email; ?></p>

<a href="index.php" class="button">На главную</a>
<a href="logout.php" class="button">Выйти</a>

</div>
</body>
</html>
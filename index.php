<?php
require_once "functions.php";
$pageTitle = "Главная";
if (!isLoggedIn()) {
    redirect("login.php");
}

$username = $_SESSION["username"];
?>
<?php include "header.php"; ?>

<h1>Добро пожаловать, <?php echo htmlspecialchars($username); ?>!</h1>

<p>Это главная страница.</p>

<a href="logout.php" class="button">Выйти</a>

</div>
</body>
</html>
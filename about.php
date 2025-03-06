
<?php
require_once "functions.php";
$pageTitle = "Контакты";
if (!isLoggedIn()) {
    redirect("login.php");
}
?>
<?php include "header.php"; ?>


<div class="container">
    <h1>О нас</h1>
    <p>Это страница "О нас". Здесь вы можете разместить информацию о своей компании, команде или проекте.</p>
    <p>Пример текста:  Мы - команда энтузиастов, увлеченных созданием качественного и полезного контента.</p>
</div>

<?php include "footer.php"; ?>

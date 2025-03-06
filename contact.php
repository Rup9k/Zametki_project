
<?php
require_once "functions.php";
$pageTitle = "Контакты";
if (!isLoggedIn()) {
    redirect("login.php");
}
?>
<?php include "header.php"; ?>

<div class="container">
    <h1>Свяжитесь с нами</h1>
    <p>Вы можете связаться с нами, заполнив форму ниже:</p>

    <form action="#" method="post">
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Сообщение:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <button type="submit">Отправить</button>
    </form>
</div>

<?php include "footer.php"; ?>

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

<div class="slider-container">
    <div class="slider">
        <div class="slide">
            <img src="img/image_1.png" alt="Image 1">
        </div>
        <div class="slide">
            <img src="img/image_2.png" alt="Image 2">
        </div>
        <div class="slide">
            <img src="img/image_3.png" alt="Image 3">
        </div>
    </div>
    <button class="prev" onclick="plusSlides(-1)">&#10094;</button>
    <button class="next" onclick="plusSlides(1)">&#10095;</button>
</div>

<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("slide");
      if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
      }
      slides[slideIndex-1].style.display = "block";
    }
</script>

<?php include "footer.php"; ?>

</body>
</html>

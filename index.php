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

    <div class="slider">
    <div class="slides">
        <div class="slide fade">
            <img src="img/zam_img1.png" alt="Слайд 1">
        </div>
        <div class="slide fade">
            <img src="img/zam_img2.png" alt="Слайд 2">
        </div>
        <div class="slide fade">
            <img src="img/zam_img3.png" alt="Слайд 3">
        </div>
    </div>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>


    <a href="logout.php" class="button">Выйти</a>
   
<script>
let slideIndex = 0;
showSlides();

function plusSlides(n) {
    slideIndex += n;
    showSlides();
}

function showSlides() {
    let slides = document.getElementsByClassName("slide");
    if (slideIndex >= slides.length) { slideIndex = 0; }
    if (slideIndex < 0) { slideIndex = slides.length - 1; }
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    slides[slideIndex].style.display = "block";  
}
</script>
    </body>
    </html>

<?php
require_once "functions.php";

if (!isLoggedIn()) {
    redirect("login.php");
}

$user_id = $_SESSION["user_id"];

$sql = "SELECT username, email, profile_image FROM users WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    $username = htmlspecialchars($user["username"]);
    $email = htmlspecialchars($user["email"]);
    $profile_image = htmlspecialchars($user["profile_image"]);
} else {
    redirect("index.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        $file_name = basename($_FILES['profile_image']['name']);
        $target_file = $upload_dir . $file_name;
        $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($image_file_type, ['jpg', 'jpeg', 'png', 'gif'])) {
            move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file);

            $sql = "UPDATE users SET profile_image = '$target_file' WHERE id = '$user_id'";
            mysqli_query($conn, $sql);
            $profile_image = $target_file; 
        } else {
            echo "Недопустимый формат файла.";
        }
    }

    if (isset($_POST['delete_image'])) {
        $default_image = 'uploads/default_profile.png';
        
        if ($profile_image != $default_image && file_exists($profile_image)) {
            unlink($profile_image); 
        }
        
        $sql = "UPDATE users SET profile_image = '$default_image' WHERE id = '$user_id'";
        mysqli_query($conn, $sql);
        
        $profile_image = $default_image;
        echo "Изображение профиля было удалено.";
    }
}

$pageTitle = "Личный кабинет";
?>

<?php include "header.php"; ?>

<h1>Личный кабинет</h1>

<img src="<?php echo $profile_image; ?>" alt="Изображение профиля" class="profile-image">

<form action="" method="post" enctype="multipart/form-data">
    <label for="profile_image">Загрузить изображение профиля:</label>
    <input type="file" name="profile_image" id="profile_image" accept="image/*">
    <button type="submit">Загрузить</button>
</br>
    <button type="submit" name="delete_image" onclick="return confirm('Вы уверены, что хотите удалить изображение?');">Удалить изображение</button>
</form>

<h1><strong>Имя пользователя:</strong> <?php echo $username; ?></h1>
<h1><strong>Email:</strong> <?php echo $email; ?></h1>


<?php include "footer.php"; ?>

</div>
</body>
</html>

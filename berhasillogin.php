<?php 
 
session_start();
 
if (!(isset($_SESSION['name']) || isset($_SESSION['id']) || isset($_SESSION['nis']))) {
	header('Location: index.php');
}
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Berhasil Login</title>
</head>
<body>
    <div class="container-logout">
        <form action="" method="POST" class="login-email">
            <?php echo "<h2>Selamat anda berhasil login,  " . $_SESSION['username'] ." !". "</h2>"; ?>
            <div class="input-group">
            <a href="logout.php" class="btn">Logout</a>
            </div>
        </form>
    </div>
</body>
</html>
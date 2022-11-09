<?php 
 
include 'config.php';
 
error_reporting(0);
session_start();
 
if (isset($_SESSION['name']) && isset($_SESSION['id']) && isset($_SESSION['nis'])) {
    header("Location: dashboard.php");
}
 
if (isset($_POST['submit'])) {
    $nis = $_POST['nis'];
    $password = ($_POST['password']);
 
    $sql = "SELECT * FROM users WHERE nis='$nis' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['nis'] = $row['nis'];
        header("Location: dashboard.php");
    } 
    else {
        echo "<script>alert('nis atau Password anda salah.silahkan gunakan nis atau Password yang benar.')</script>";
    }
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="ex.css">
 
    <title>SIGN IN</title>
</head>
<body>
    <div class="alert alert-warning" role="alert">
        <?php echo $_SESSION['error']?>
    </div>
    <div class="container">
        <form action="" method="POST" class="login-email transparant">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">SIGN IN</p>
            <div class="input-group">
                <input type="nis" placeholder="NIS" name="nis" value="<?php echo $nis; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">SIGN IN</button>
            </div>
            <center><p class="login-register-text">If you don't have an account, please <a href="register.php">sign up</a> first.</p></center>
        </form>
    </div>
</body>
</html>
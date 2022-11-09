<?php 
 
include 'config.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['nis' or 'name'])) {
    header("Location: index.php");
}
 
if (isset($_POST['submit'])) {
    $nis = $_POST['nis'];
    $name = $_POST['name'];
    $password = ($_POST['password']);
    $cpassword = ($_POST['cpassword']);
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE name='$name'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (nis, name, password)
                    VALUES ('$nis', '$name', '$password')";

                    $_SESSION['nis'] = $row['nis'];
                    header("Location: index.php");
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil! Silahkan login')</script>";
                $nis = "";
                $name = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }

            } else {
            echo "<script>alert('Woops! Nama Sudah Terdaftar.')</script>";
            }
         
            } else {
            echo "<script>alert('Password Tidak Sesuai')</script>";
            }
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="ex.css">
 
    <title>SIGN UP</title>
</head>
<body">
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">SIGN UP</p>
            <div class="input-group">
                <input type="text" placeholder="NIS" name="nis" value="<?php echo $nis; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="Nama Lengkap" name="name" value="<?php echo $name; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <div class="input-group">
                <button color="#00BFFF" name="submit" class="btn">SIGN UP</button>
            </div>
            <p class="login-register-text">If you have successfully created an account, please <a href="index.php">sign in</a> on the previous page.</p>
        </form>
    </div>
</body>
</html>
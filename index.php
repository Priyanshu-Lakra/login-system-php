<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="box">
<h2>Login</h2>

<?php if (isset($_GET['error'])) echo "<p class='error'>".$_GET['error']."</p>"; ?>

<form action="login.php" method="POST">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button name="login">Login</button>
</form>

<a href="register.php">Create Account</a>
</div>

</body>
</html>

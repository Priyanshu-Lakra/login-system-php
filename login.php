<?php
session_start();
include "db.php";

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            header("Location: dashboard.php");
        } else {
            header("Location: index.php?error=Wrong Password");
        }

    } else {
        header("Location: index.php?error=User not found");
    }
}
?>

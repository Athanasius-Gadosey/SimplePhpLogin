<?php
include '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $reset_token = bin2hex(random_bytes(50));
    $sql = "UPDATE users SET reset_token='$reset_token' WHERE email='$email'";

    if ($conn->query($sql) === TRUE) {
        $reset_link = "http://yourdomain.com/reset_password.php?token=$reset_token";
        // Send this reset link to the user's email in a real application
        echo "Password reset link: $reset_link";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Password Reset</h2>
    <form method="post">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary">Reset Password</button>
    </form>
</div>
</body>
</html>

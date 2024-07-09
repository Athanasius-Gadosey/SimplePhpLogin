<?php
include '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reset_token = $_POST['reset_token'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

    $sql = "UPDATE users SET password='$new_password', reset_token=NULL WHERE reset_token='$reset_token'";

    if ($conn->query($sql) === TRUE) {
        echo "Password updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Update Password</h2>
    <form method="post">
        <input type="hidden" name="reset_token" value="<?php echo $_GET['token']; ?>">
        <div class="form-group">
            <label for="new_password">New Password:</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Password</button>
    </form>
</div>
</body>
</html>

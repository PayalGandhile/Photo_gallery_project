<?php
session_start(); // Start the session
include 'about.php';  // Include your database connection file

$errors = array();
$success = '';

if (isset($_POST["submit"])) {
    $email = htmlspecialchars($_POST["email"]);
    $password = $_POST["password"];

    // Query to check if the user exists
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        // Verify password
        if (password_verify($password, $user["password"])) {
            // Set user session upon successful login
            $_SESSION["user"] = $user["email"]; // You can also store user ID or other info
            
            // Redirect to another page on successful login
            header("Location:index.php");
            exit(); // Stop further script execution
        } else {
            $errors['password'] = "Password does not match.";
        }
    } else {
        $errors['email'] = "Email does not exist. Please enter the registered email.";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../styles/login.css">
</head>
<body>
    <div class="container">
        <form class="form" action="login_form.php" method="post">
            <h3>Login Now</h3>
            <input type="email" name="email" placeholder="Enter Email" value="<?php echo isset($email) ? $email : ''; ?>" required>
            <?php if (!empty($errors['email'])): ?>
                <div class="error"><?php echo $errors['email']; ?></div>
            <?php endif; ?>
            
            <input type="password" name="password" placeholder="Enter Password" required>
            <?php if (!empty($errors['password'])): ?>
                <div class="error"><?php echo $errors['password']; ?></div>
            <?php endif; ?>
            
            <button class="submit" name="submit" type="submit">Log In</button>
            <p>Don't have an account? <a href="register_form.php">Register now</a></p>
        </form>
    </div>
</body>
</html>

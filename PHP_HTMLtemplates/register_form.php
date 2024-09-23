<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION["user"])) {
    header("Location: ./index.php");
    exit();
}

include 'about.php';  // Include your database connection file

$errors = array();
$success = '';

if (isset($_POST["submit"])) {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    
    // Validate password length
    if (strlen($password) < 8) {
        $errors['password'] = "Password must be at least 8 characters long";
    }
    
    // Validate password match
    if ($password !== $cpassword) {
        $errors['cpassword'] = "Passwords do not match";
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $errors['email'] = "Email already exists. Please use a different email.";
    }
    $stmt->close();

    // If no errors, process registration
    if (empty($errors)) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $passwordHash); // 'sss' indicates three strings
        
        // Execute the query
        if ($stmt->execute()) {
            // Set user session upon successful registration
            $_SESSION["user"] = $email; // Store user's email in session or use user ID
            
            $success = "Registration successful!";
            $stmt->close(); // Close the statement

            // Redirect to avoid form resubmission
            header("Location: login_form.php?success=1");
            exit(); 
        } else {
            $errors['general'] = "Error: " . $stmt->error;
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../styles/login.css">
</head>
<body>
    <div class="container">
        <form class="form" action="register_form.php" method="post">
            <h3>Register Now</h3>
            
            <?php if (!empty($success)): ?>
                <div class="success"><?php echo $success; ?></div>
            <?php endif; ?>

            <?php if (!empty($errors['general'])): ?>
                <div class="error"><?php echo $errors['general']; ?></div>
            <?php endif; ?>
            
            <input type="text" name="name" placeholder="Enter Username" value="<?php echo isset($name) ? $name : ''; ?>" required>
            
            <input type="email" name="email" placeholder="Enter Email" value="<?php echo isset($email) ? $email : ''; ?>" required>
            <?php if (!empty($errors['email'])): ?>
                <div class="error"><?php echo $errors['email']; ?></div>
            <?php endif; ?>

            <input type="password" name="password" placeholder="Enter Password" required>
            <?php if (!empty($errors['password'])): ?>
                <div class="error"><?php echo $errors['password']; ?></div>
            <?php endif; ?>
            
            <input type="password" name="cpassword" placeholder="Confirm Password" required>
            <?php if (!empty($errors['cpassword'])): ?>
                <div class="error"><?php echo $errors['cpassword']; ?></div>
            <?php endif; ?>
            
            <button class="submit" type="submit" name="submit">Register</button>
            <p>Already have an account? <a href="login_form.php">Login now</a></p>
        </form>
    </div>
</body>
</html>

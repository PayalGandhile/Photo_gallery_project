<?php
include 'about.php';  // Include your database connection file

$errors = array();
$success = '';

if (isset($_POST["submit"])) {
    // Collecting and sanitizing user input
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = $_POST["phone"];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format!";
    }

    // Validate phone (simple regex for 10-15 digits, can be adjusted based on country codes)
    if (!preg_match('/^[0-9]{10,15}$/', $phone)) {
        $errors['phone'] = "Invalid phone number! Must be 10-15 digits.";
    }

    // If there are no validation errors, proceed to insert the data
    if (empty($errors)) {
        // Prepare the insert query
        $stmt = $conn->prepare("INSERT INTO contactform (name, email, phone) VALUES (?, ?, ?)");
        
        // Bind parameters ('sss' indicates three strings)
        $stmt->bind_param("sss", $name, $email, $phone);
        
        // Execute the statement
        if ($stmt->execute()) {
            $success = "New contact form entry inserted successfully!";
            
            // Redirect to avoid form resubmission
            header("Location: /Photo_gallery_project/HTMLtemplates/index.html");
            exit();
        } else {
            $errors['database'] = "Error: " . $stmt->error;
        }
        
        // Close the statement
        $stmt->close();
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="./styles/contact.css">
</head>
<body>

    <!-- Contact Us Section -->  
    <section id="contact">
        <div class="contact">
            <h2>Contact Us</h2>
        </div>
        
        <form class="contact-form" method="post" action="contact.php">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter Username" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter Email" required>
            <?php if (!empty($errors['email'])): ?>
                <div class="error"><?php echo $errors['email']; ?></div>
            <?php endif; ?>
            
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" placeholder="Enter Number" required>
            <?php if (!empty($errors['phone'])): ?>
                <div class="error"><?php echo $errors['phone']; ?></div>
            <?php endif; ?>

            <button type="submit" name="submit">Submit</button>

            <?php if (!empty($errors['database'])): ?>
                <div class="error"><?php echo $errors['database']; ?></div>
            <?php endif; ?>
            <?php if (!empty($success)): ?>
                <div class="success"><?php echo $success; ?></div>
            <?php endif; ?>
        </form>
    </section>

</body>
</html>

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
            header("Location:index.php");
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
    <link rel="stylesheet" href="../styles/contact.css">
</head>
<body>
 <!-- navigation bar -->
 <script>           
            // Get the navigation bar HTML
            fetch('navbar.html')
            .then(response => response.text())
            .then(html => {
                // Append the navigation bar to the page
                document.getElementById('nav-container').innerHTML = html;
            });
        </script>
            <div id="nav-container"></div>
    


    <!-- Contact Us Section -->  
    
    
    <section>
    <div class="contact-page">
        <span class="contact">
            <h3>Contact Us</h3>
        </span>
        
        
        <form class="contact-form" method="post" action="contact.php" >
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
            <div class="contact-info">
                <h3>Why Connect with Us?</h3>
                <ul>
                    <li><strong>Exclusive Content</strong>: By joining us, you'll gain access to a curated selection of personal photography not available elsewhere.</li>
                    <li><strong>Stay Updated</strong>: Get the latest updates on new photo releases, upcoming photography events, and behind-the-scenes stories directly in your inbox.</li>
                    <li><strong>Personalized Communication</strong>: We value your input. Submit any photography inquiries, collaboration ideas, or feedback, and we'll get back to you personally.</li>
                    <li><strong>Join Our Community</strong>: Become part of a growing community of photography enthusiasts who appreciate the art of unedited realism in nature.</li>
                </ul>
            </div>
    </div>
    </section>
        
</body>
</html>

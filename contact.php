<?php
include("db.php");

$messageBox = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $message = $_POST['message'];

    // SERVER VALIDATION
    if (empty($name) || empty($email) || empty($mobile) || empty($message)) {
        $messageBox = "<div class='error'>All fields are required.</div>";
    }
    elseif (!preg_match("/^[A-Za-z\s]+$/", $name)) {
        $messageBox = "<div class='error'>Invalid Name</div>";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $messageBox = "<div class='error'>Invalid Email</div>";
    }
    elseif (!preg_match("/^[0-9]{10}$/", $mobile)) {
        $messageBox = "<div class='error'>Invalid Mobile Number</div>";
    }
    else {

        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, mobile, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $mobile, $message);

        if ($stmt->execute()) {
            $messageBox = "<div class='success'>Message sent successfully!</div>";
        } else {
            $messageBox = "<div class='error'>Database error!</div>";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include("header.php"); ?>

<section class="hero">
    <h2><span class="highlight-text">Contact Us</span></h2>
    <p>We are here to help you</p>
</section>

<main>
<div class="card">

    <!-- JS MESSAGE -->
    <div id="contactMessage" style="display:none;"></div>

    <!-- PHP MESSAGE -->
    <?php echo $messageBox; ?>

    <form id="contactForm" method="POST">

        <label>Name:</label>
        <input type="text" id="cname" name="name" required>

        <label>Email:</label>
        <input type="email" id="cemail" name="email" required>

        <label>Mobile:</label>
        <input type="text" id="cmobile" name="mobile" required>

        <label>Message:</label>
        <textarea id="cmessage" name="message" rows="4" required></textarea>

        <button type="submit" class="btn">Send Message</button>

    </form>

</div>
</main>

<?php include("footer.html"); ?>

<script src="js/script.js"></script>

</body>
</html>
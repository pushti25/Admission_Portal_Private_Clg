<?php
session_start();
include("db.php");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admissions WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        if ($password == $user['password']) {
            $_SESSION['student'] = $email;
            header("Location: student-dashboard.php");
            exit();
        } else {
            $message = "<div class='error'>Incorrect Password</div>";
        }
    } else {
        $message = "<div class='error'>Email not registered</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include("header.php"); ?>

<section class="hero">
    <h2><span class="highlight-text">Student Login</span></h2>
    <p>Access your admission dashboard</p>
</section>

<main>
    <div class="card" style="max-width:400px; margin:auto;">

        <!-- JS MESSAGE -->
        <div id="loginMessage" style="display:none;"></div>

        <!-- PHP MESSAGE -->
        <?php echo $message; ?>

        <form id="loginForm" method="POST">

            <label>Email:</label>
            <input type="email" id="loginEmail" name="email" required>

            <label>Password:</label>
            <input type="password" id="loginPassword" name="password" required>

            <button type="submit" class="btn">Login</button>

        </form>

    </div>
</main>

<?php include("footer.html"); ?>

<script src="js/script.js"></script>

</body>
</html>
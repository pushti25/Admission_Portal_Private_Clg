<?php
session_start();
include("db.php");

// 🔒 Protect page
if (!isset($_SESSION['student'])) {
    header("Location: student-login.php");
    exit();
}

$email = $_SESSION['student'];

// ✅ Fetch student data
$stmt = $conn->prepare("SELECT * FROM admissions WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include("header.php"); ?>

<section class="hero">
    <h2><span class="highlight-text">Welcome, <?php echo $user['name']; ?></span></h2>
    <p>Your Admission Details</p>
</section>

<main>

<div class="card">

    <h3>Student Information</h3>
    <br>

    <p><b>Name:</b> <?php echo $user['name']; ?></p>
    <p><b>Email:</b> <?php echo $user['email']; ?></p>
    <p><b>Mobile:</b> <?php echo $user['mobile']; ?></p>
    <p><b>Course:</b> <?php echo $user['course']; ?></p>

    <br>

    <p><b>Document:</b>
        <a href="uploads/<?php echo $user['document']; ?>" target="_blank">
            View PDF
        </a>
    </p>

</div>

<br>

<a href="student-logout.php" class="btn">Logout</a>

</main>

<?php include("footer.html"); ?>

</body>
</html>
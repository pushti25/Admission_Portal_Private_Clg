<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "db.php";

$slug = isset($_GET['course']) ? $_GET['course'] : '';

$query = $conn->prepare("SELECT * FROM courses WHERE course_slug = ?");
$query->bind_param("s", $slug);
$query->execute();
$result = $query->get_result();

if ($result->num_rows === 0) {
    die("Course not found or slug mismatch");
}

$course = $result->fetch_assoc();

$collegeQuery = $conn->prepare(
    "SELECT college_name, city FROM course_colleges WHERE course_id = ?"
);
$collegeQuery->bind_param("i", $course['id']);
$collegeQuery->execute();
$colleges = $collegeQuery->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $course['course_name']; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include "header.php"; ?>

<main>

<h2><?php echo $course['course_name']; ?></h2>

<div class="card">
    <h3>Course Overview</h3>
    <p><?php echo $course['overview']; ?></p>
</div>

<div class="card">
    <h3>Eligibility</h3>
    <p><?php echo $course['eligibility']; ?></p>
</div>

<div class="card">
    <h3>Duration</h3>
    <p><?php echo $course['duration']; ?></p>
</div>

<h2>Colleges in Gujarat</h2>

<div class="cards-container">
<?php while ($row = $colleges->fetch_assoc()) { ?>
    <div class="course-card">
        <h3><?php echo $row['college_name']; ?></h3>
        <p><?php echo $row['city']; ?></p>
    </div>
<?php } ?>
</div>

<div class="card">
    <h3>Career Opportunities</h3>
    <p><?php echo $course['careers']; ?></p>
</div>

<div class="card">
    <a href="admission.php" class="btn">Apply Now</a>
</div>

</main>

<?php include 'footer.html'; ?>

</body>
</html>

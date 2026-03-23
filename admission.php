<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("db.php");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $course = $_POST['course'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SERVER SIDE VALIDATION
    if (empty($name) || empty($mobile) || empty($course) || empty($email) || empty($password)) {
        $message = "<div class='error'>All fields are required.</div>";
    }
    elseif (!preg_match("/^[A-Za-z\s]+$/", $name)) {
        $message = "<div class='error'>Invalid Name.</div>";
    }
    elseif (!preg_match("/^[0-9]{10}$/", $mobile)) {
        $message = "<div class='error'>Invalid Mobile Number.</div>";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "<div class='error'>Invalid Email.</div>";
    }
    elseif (strlen($password) < 4) {
        $message = "<div class='error'>Password must be at least 4 characters.</div>";
    }
    elseif ($_FILES['document']['size'] > 2000000) {
        $message = "<div class='error'>File must be under 2MB.</div>";
    }
    else {

        // CHECK DUPLICATE EMAIL
        $check = $conn->prepare("SELECT id FROM admissions WHERE email=?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $message = "<div class='error'>Email already registered.</div>";
        } else {

            $fileName = $_FILES['document']['name'];
            $tempName = $_FILES['document']['tmp_name'];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            if ($fileExt !== "pdf") {
                $message = "<div class='error'>Only PDF allowed.</div>";
            } else {

                if (!is_dir("uploads")) {
                    mkdir("uploads", 0777, true);
                }

                $newFileName = time() . "_" . $fileName;

                if (move_uploaded_file($tempName, "uploads/" . $newFileName)) {

                    // INSERT DATA (FIXED)
                    $stmt = $conn->prepare("INSERT INTO admissions (name, mobile, course, email, password, document) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("ssssss", $name, $mobile, $course, $email, $password, $newFileName);

                    if ($stmt->execute()) {
                        $message = "<div class='success'>Admission Submitted Successfully!<br>Your Login Email: <b>$email</b></div>";
                    } else {
                        $message = "<div class='error'>Database Insert Failed.</div>";
                    }

                    $stmt->close();

                } else {
                    $message = "<div class='error'>File upload failed.</div>";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admission | Management Quota Portal</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include("header.php"); ?>

<section class="hero">
    <h2><span class="highlight-text">Apply for Admission</span></h2>
    <p>Secure your seat through Management Quota process.</p>
</section>

<main>
    <div class="card">

        <!-- JS MESSAGE BOX -->
        <div id="formMessage" style="display:none;"></div>

        <!-- PHP MESSAGE -->
        <?php echo $message; ?>

        <!-- FORM -->
        <form id="admissionForm" method="POST" enctype="multipart/form-data">

            <label>Name:</label>
            <input type="text" id="name" name="name" required>

            <label>Mobile:</label>
            <input type="text" id="mobile" name="mobile" required>

            <label>Email (Login ID):</label>
            <input type="email" id="email" name="email" required>

            <label>Password:</label>
            <input type="password" id="password" name="password" required>

            <label>Course:</label>
            <select id="course" name="course" required>
            <option value="">Select Course</option>
                <option>BE Computer Engineering</option>
                <option>BE Information Technology</option>
                <option>BE Mechanical Engineering</option>
                <option>BE Civil Engineering</option>
                <option>BE Electronics Engineering</option>
                <option>BE Electrical Engineering</option>
                <option>BE Chemical Engineering</option>
                <option>BE Artificial Intelligence & Data Science</option>
                <option>BE Cyber Security</option>
                <option>BE Automobile Engineering</option>
                <option>BE Mechatronics Engineering</option>
                <option>BE Biomedical Engineering</option>
            </select>

            <label>Upload 10th/12th result (PDF only):</label>
            <input type="file" id="document" name="document" required>

            <button type="submit" class="btn">Submit Application</button>

        </form>

    </div>
</main>

<?php include("footer.html"); ?>

<!-- JS FILE -->
<script src="js/script.js"></script>

</body>
</html>
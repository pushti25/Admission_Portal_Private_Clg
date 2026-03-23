<?php
if (session_id() == "") {
    session_start();
}
?>

<header class="main-header">

  <div class="header-container">

    <div class="logo">
        <a href="index.php">
            <img src="assets/logo.png" alt="Logo"> 
        </a>
        <h1>Management Quota Admission Portal</h1>
    </div>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="courses.php">Courses</a></li>
            <li><a href="admission.php">Admission</a></li>
            <li><a href="status.php">Merit/Status</a></li>
            <li><a href="contact.php">Contact</a></li>

            <?php if(isset($_SESSION['student'])) { ?>
                <li><a href="student-dashboard.php">Dashboard</a></li>
                <li><a href="student-logout.php">Logout</a></li>
            <?php } else { ?>
                <li><a href="student-login.php">Student Login</a></li>
            <?php } ?>
        </ul>
    </nav>

  </div>

</header>
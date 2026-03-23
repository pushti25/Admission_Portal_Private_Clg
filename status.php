<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check Admission Status</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="assets/logo.png" type="image/x-icon">
</head>
<body>

<?php include 'header.php'; ?>

<main>

    <h2>Check Your Admission Status</h2>

    <div class="card">
        <p>
            Enter your <strong>Registered Mobile Number</strong> or
            <strong>Application ID</strong> to check the current status
            of your admission application.
        </p>
    </div>

    <!-- STATUS FORM -->
    <div class="card">
        <form method="post" action="status.php">

            <label>Registered Mobile Number</label>
            <input type="text" name="mobile" placeholder="Enter 10 digit mobile number" required>

            <p style="text-align:center; margin:10px 0;">OR</p>

            <label>Application ID</label>
            <input type="text" name="application_id" placeholder="Enter Application ID">

            <button type="submit" class="btn">Check Status</button>
        </form>
    </div>

    <?php
    // Future-ready placeholder (no DB yet)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $mobile = isset($_POST['mobile']) ? trim($_POST['mobile']) : '';
        $appId  = isset($_POST['application_id']) ? trim($_POST['application_id']) : '';

        echo '<div class="card">';

        if ($mobile === '' && $appId === '') {
            echo '<p>Please enter Mobile Number or Application ID.</p>';
        } else {
            echo '<h3>Status Result</h3>';
            echo '<p><strong>Status:</strong> Under Review</p>';
            echo '<p>Your application has been received and is currently under verification.</p>';
            echo '<p>Please check back after some time or contact support for assistance.</p>';
        }

        echo '</div>';
    }
    ?>

    <!-- HELP SECTION -->
    <div class="card">
        <h3>Need Help?</h3>
        <ul>
            <li>✔ Ensure mobile number is same as used during application</li>
            <li>✔ Status updates may take 24–48 hours</li>
            <li>✔ For urgent queries, contact our support team</li>
        </ul>
        <a href="contact.php" class="btn">Contact Support</a>
    </div>

</main>

<?php include 'footer.html'; ?>

</body>
</html>

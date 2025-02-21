<?php
session_start();
require_once "database.php";

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION["user"];
$fullName = "{$user['firstName']} " . substr($user['middleName'], 0, 1) . ". {$user['lastName']}";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="dashboard-body">
    <div class="header-container">
        <h2><img src="ccs.png" alt="Logo" class="logo"> Dashboard</h2>
        <div class="nav-bar">
            <a href="dashboard.php">Home</a>
            <a href="editProfile.php">Edit Profile</a>
            <a href="sitInHistory.php">Sit-in History</a>
            <a href="reservation.php">Reservation</a>
            <a href="login.php">Log-out</a>
        </div>
    </div>

    <div class="dashboard-container">
        <div class="profile-container card">
            <h3>Profile</h3>
            <center><img src="profilepicture.png" alt="Profile Picture" class="profile-img"></center>
            <p><strong>Name:</strong> <?php echo $fullName; ?></p>
            <p><strong>ID Number:</strong> <?php echo $user['idNo']; ?></p>
            <p><strong>Course:</strong> <?php echo $user['course']; ?></p>
            <p><strong>Year Level:</strong> <?php echo $user['yearLevel']; ?></p>
            <p><strong>Email:</strong> <?php echo $user['emailAddress']; ?></p>
            <p><strong>Sessions Remaining: </strong>30/30</p>
        </div>

        <div class="announcement-container card">
            <h3><center>Announcements</center></h3>
            <ul>
                <li>New semester enrollment starts next week!</li>
                <li>Library hours extended until 10 PM.</li>
                <li>University sports fest on March 10!</li>
            </ul>
        </div>

        <div class="rules-container card">
            <h3><center>Rules & Regulations</center></h3>
            <div class="scroll-box">
                <h5><strong><center>University of Cebu - College of Information & Computer Studies</center></strong></h5>
                <p><strong>Laboratory Rules and Regulations</strong></p>
                <p>
                    To avoid embarrassment and maintain camaraderie with your friends and superiors at our laboratories, please observe the following:
                    <br>
                    1. Maintain silence, proper decorum, and discipline inside the laboratory. Mobile phones, walkmans and other personal pieces of equipment must be switched off.
                    <br>
                    2. Games are not allowed inside the lab. This includes computer-related games, card games and other games that may disturb the operation of the lab.
                    <br>
                    3. Surfing the Internet is allowed only with the permission of the instructor. Downloading and installing of software are strictly prohibited.
                    <br>
                    4. Getting access to other websites not related to the course (especially pornographic and illicit sites) is strictly prohibited.
                    <br>
                    5. Deleting computer files and changing the set-up of the computer is a major offense.
                    <br>
                    6. Observe computer time usage carefully. A fifteen-minute allowance is given for each use. Otherwise, the unit will be given to those who wish to "sit-in".
                    <br>
                    7. Observe proper decorum while inside the laboratory.
                </p>
                <ol type="A">
                    <li>Do not get inside the lab unless the instructor is present.</li>
                    <li>All bags, knapsacks, and the likes must be deposited at the counter.</li>
                    <li>Follow the seating arrangement of your instructor.</li>
                    <li>At the end of class, all software programs must be closed.</li>
                    <li>Return all chairs to their proper places after using.</li>
                </ol>
                <p>
                8. Chewing gum, eating, drinking, smoking, and other forms of vandalism are prohibited inside the lab.
                <br>
                9. Anyone causing a continual disturbance will be asked to leave the lab. Acts or gestures offensive to the members of the community, including public display of physical intimacy, are not tolerated.
                <br>
                10. Persons exhibiting hostile or threatening behavior such as yelling, swearing, or disregarding requests made by lab personnel will be asked to leave the lab.
                <br>
                11. For serious offense, the lab personnel may call the Civil Security Office (CSU) for assistance.
                <br>
                12. Any technical problem or difficulty must be addressed to the laboratory supervisor, student assistant or instructor immediately.
                </p>
                <p><strong>DISCIPLINARY ACTION</strong></p>
                <ul>
                    <li>First Offense - The Head or the Dean or OIC recommends to the Guidance Center for a suspension from classes for each offender.</li>
                    <li>Second and Subsequent Offenses - A recommendation for a heavier sanction will be endorsed to the Guidance Center.</li>
                </ul>
                
            </div>
        </div>
    </div>
</body>
</html>

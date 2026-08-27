<?php

session_start() ;   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/profile.css">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <title>Profile - Account Portal</title>
</head>
<body class="profile-page">
    <main class="dashboard" id="profile-dashboard">
        <header class="dashboard__header">
            <a class="dashboard__brand" href="profile.php">Account<span>+</span></a>
            <nav class="profile__nav">
                <a class="profile__nav-link profile__nav-link--active" href="profile.php">
                    <i class="bx bx-grid-alt"></i> Overview
                </a>
            </nav>
            <a href="logout.php" class="dashboard__logout">
                <i class="bx bx-log-out"></i>
                Log out
            </a>
        </header>

        <section class="dashboard__content">
            
                <div class="message">
                  
                </div>
         

            <div class="dashboard__intro">
                <p class="dashboard__eyebrow">Your personal space</p>
                <h1>Welcome back, <span><?php echo $_SESSION['auth'][0] ;   ?></span>.</h1>
                <p><?php   echo "Your Email is " . $_SESSION ['auth'] [1] ; ?></p>
            </div>

            <div class="profile__overview">
                <section class="profile__identity">
                    <div class="profile__avatar"><?php ?></div>
                    <div>
                        <p class="dashboard__card-label">Account profile</p>
                        <h2><?php  ?></h2>
                        <p class="dashboard__card-copy"><?php  ?></p>
                    </div>
                    <span class="profile__online">
                        <i class="bx bxs-circle"></i> Active
                    </span>
                </section>

                <section class="profile__stats">
                    <div>
                        <strong>01</strong>
                        <span>Profile</span>
                    </div>
                    <div>
                        <strong>100%</strong>
                        <span>Complete</span>
                    </div>
                    <div>
                        <strong>0</strong>
                        <span>Alerts</span>
                    </div>
                </section>
            </div>

            <div class="dashboard__cards">
                <article class="dashboard__card dashboard__card--main">
                    <div class="dashboard__card-icon"><i class="bx bx-user"></i></div>
                    <div>
                        <p class="dashboard__card-label">Profile status</p>
                        <h2>All set up</h2>
                        <p class="dashboard__card-copy">Your account is ready to use.</p>
                    </div>
                    <i class="bx bx-check-circle dashboard__check"></i>
                </article>

                <article class="dashboard__card">
                    <div class="dashboard__card-icon"><i class="bx bx-calendar"></i></div>
                    <p class="dashboard__card-label">Member since</p>
                   
                    <p class="dashboard__card-copy">Thanks for joining us.</p>
                </article>

                <article class="dashboard__card">
                    <div class="dashboard__card-icon"><i class="bx bx-bell"></i></div>
                    <p class="dashboard__card-label">Notifications</p>
                    <h2>All caught up</h2>
                    <p class="dashboard__card-copy">No new updates right now.</p>
                </article>
            </div>

            <section class="profile__activity">
                <div class="profile__section-heading">
                    <div>
                        <p class="dashboard__eyebrow">Stay up to date</p>
                        <h2>Recent activity</h2>
                    </div>
                    <i class="bx bx-dots-horizontal-rounded"></i>
                </div>
                <div class="profile__activity-row">
                    <div class="profile__activity-icon"><i class="bx bx-check"></i></div>
                    <div>
                        <strong>Account created</strong>
                        <span>Your profile is ready to go.</span>
                    </div>
   
                </div>
            </section>
        </section>
    </main>
</body>
</html>
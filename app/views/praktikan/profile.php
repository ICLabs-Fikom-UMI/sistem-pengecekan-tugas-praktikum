<?php if ($_SESSION['role'] == 'Administrator') { ?>
<div class="content">
    <h2 style="margin-top: 70px;">Profile</h2>
    <div class="profile">
            <div class="profile-picture">
                <img src="<?= BASEURL; ?> /img/back1.png" alt="Profile Picture">
            </div>
            <div class="profile-details">
                <h1>John Doe</h1>
                <p>Email: johndoe@example.com</p>
                <p>Location: New York City</p>
                <p>Occupation: Web Developer</p>
                <button>Edit Profile</button>
            </div>
        </div>
     
<?php } ?>
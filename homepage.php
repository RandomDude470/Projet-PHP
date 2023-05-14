<?php
$login = $_POST['email'];
$password = $_POST['password'];
$connection = new mysqli('localhost', 'root', '', 'joystick');
$result = $connection->query('SELECT email, `password`,`name`,`role` FROM `login` WHERE email LIKE \'' . $login . '\'');
$arr = $result->fetch_array();
if ($arr == null  || $arr[1] != $password) {
    header("Location: login.php?try=1");
    die();
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylehomepage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" media="(prefers-color-scheme:dark)" href="assests/joystick.png" type="image/x-icon">
    <link rel="shortcut icon" media="(prefers-color-scheme:light)" href="assests/joystick-black.png" type="image/x-icon">
    <script src="homepage.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Home</title>
</head>

<body>
    <div class="desktop flex-row">
        <nav class="flex-column">
            <div class="upper-nav upper-section flex-column">
                <div class="logo">
                    <img src="assests/logo-black-with-text.svg" alt="logo">
                </div>
                <ul class="flex-column">
                    <li class="nav-item flex-row ">
                        <img src="assests/My-account.png" alt="account">
                        <span>My account</span>
                    </li>
                    <li class="nav-item flex-row ">
                        <img src="assests/media.png" alt="media">
                        <span>Media</span>
                    </li>
                    <li class="nav-item flex-row ">
                        <img src="assests/games.png" alt="games">
                        <span>Games</span>
                    </li>
                </ul>
            </div>
            <div class="bottom-nav">
                <div id="settings">
                    <img src="assests/settings-cog.png" alt="settings">
                </div>
            </div>
        </nav>
        <main>
            <section id="Myaccount" class="flex-column">
                <div class="upper-section flex-column">
                    <div class="profile flex-row">
                        <div class="profile-pic">
                            <img src="assests/profile-picture1.png" alt="profile-pic">
                        </div>
                        <div class="infos">
                            <p><?php echo $arr[2]; ?></p>
                            <p><?php echo ($arr[3]=="user")? "User":"Admin";   ?></p>
                        </div>
                    </div>
                </div>
                <div class="grid">
                    <div class="bloc">
                        <h3>Personal Information : </h3>
                        <p> 
                            <span class="bold">Full Name :</span> <?php echo $arr[2]; ?> <br>
                            <span class="bold">Email Adress : </span>  <?php echo $arr[0]; ?> <br>
                            <span class="bold">Age : </span> 11 years old <br>
                            <span class="bold">Date of birth : </span> 22-03-2110 
                        </p>
                    </div>
                    <div class="bloc">
                        <h3>Account Security : </h3>
                            <p> 
                                <span class="bold">Password :</span> ********** <span class="pass-chang">change password</span><br>
                                <span class="bold">Privileges : </span>  <?php echo ($arr[3]=="user")? "User":"Admin";   ?>
                            </p>
                    </div>
                    <div class="bloc">
                        <h3>Deactivate my account : </h3>
                        <p class="bold">
                           <span class="red"> Warning !</span> By deactivating your account all data and progress will be permanently lost , you will never be able to regain access to your account. Proceed with caution. <br><br><br>
                            <span class="delete-acc"> I want to permanently  delete my account !</span>
                        </p>
                    </div>
                </div>
            </section>
            <section id="Media"></section>
            <section id="Games"></section>
        </main>
    </div>
    <div class="mobile"></div>
</body>

</html>
<?php $connection->close();
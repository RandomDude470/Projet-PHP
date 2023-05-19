<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylelogin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" media="(prefers-color-scheme:dark)" href="assests/joystick.png" type="image/x-icon">
    <link rel="shortcut icon" media="(prefers-color-scheme:light)" href="assests/joystick-black.png" type="image/x-icon">
    <!-- <script src="main.js" defer></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Login</title>
</head>
<body>
    <div class="main">
        <div class="rectangle purplerect">
            <div class="logo">
                <img src="assests/logo-with-text-svg.svg" alt="">
            </div>
            <div class="art">
                <img id="bigassphoto" src="assests/abstract.png" alt="">
            </div>
        </div>
        <div class="rectangle whiterect">
            <div class="logo">
                <img src="assests/logo-black-with-text.svg" alt="">
            </div>
            <h1>Login</h1>
            <?php if (isset($_GET['success'])) {
                echo "<span style=\"color:green;font-size:0.9rem;padding:1rem;\" >Your account has been successfully
                created ! Log in </span>";
            }?>
            <form action="homepage.php" method="post">
                <input type="email" name="email" placeholder="Email..." id="email">
                <input type="password" name="password" placeholder="Password..." id="password">
                <?php 
                    if (isset($_GET['try'])) {
                        echo '<style>
                                    #email{border-color:red ; border-style: solid; border-width:1px}
                                    #password{border-color:red ; border-style: solid; border-width:1px}
                                    #error{color:red;font-size:12;padding-inline:1rem;}
                             </style>'.'<span id="error">Invalid Email or password</span>';
                    }
                ?>
                <a href="forgotpass.html"><u> Forgot password ?</u></a>
                <button type="submit">Log in</button>
            </form>
        </div>
    </div>
</body>
</html>
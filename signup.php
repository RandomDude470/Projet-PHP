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
    <script src="signup.js" defer></script>
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
            <h1>Signup</h1>
            <?php if (isset($_GET['databaseerror'])) {
                echo "<span style=\"color:red;font-size:0.9rem;padding:1rem;\" >Database error</span>";
            }else if (isset($_GET['missingfield'])) {
                echo "<span style=\"color:red;font-size:0.9rem;padding:1rem;\" >Please fill all the fields</span>";
            
                
            }?>
            <form action="signedup.php" method="post">
                <input type="text" name="fullname" placeholder="Full name...">
                <input type="email" name="email" placeholder="Email..." id="email">
                <?php if (isset($_GET['invalidemail'])) {
                    echo '<style>#email{
                        border: red solid 1px;
                        margin-bottom:0;
                    }
                    #error{
                        color :red;
                        font-size:12;
                        padding-inline:1rem;
                        margin-bottom:25px;
                    }
                    </style><span id="error">Email already in use</span> ';
                }
                ?>
                <input type="password"  name="password" placeholder="Password..." id="password">
                <input type="password" class="red" name="confirmp" placeholder="Confirm password..." id="confirmp" >
                <?php if (isset($_GET['nomatch'])) {
                    echo '<style>
                    .red{
                        border: red solid 1px;
                        margin-bottom:0;
                    }
                    #error2{
                        color :red;
                        font-size:12;
                        padding-inline:1rem;
                        margin-bottom:25px;
                    }
                    </style><span id="error2">Passwords not matching</span> ';
                }
                ?>
                
                <button type="submit">Sign up</button>
            </form>
        </div>
    </div>
</body>
</html>
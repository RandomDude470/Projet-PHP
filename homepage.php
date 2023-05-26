<?php
$login = $_POST['email'];
$password = $_POST['password'];
$connection = new mysqli('localhost', 'root', '', 'joystick');
$result = $connection->query('SELECT email, `password`,`name`,`role` FROM `login` WHERE email LIKE \'' . $login . '\'');
$arr = $result->fetch_array();
if ($arr == null  || $arr[1] != $password) {
    header("Location: login.php?try=1");
    die(); }
    else if($arr[3]=='admin'){
        ob_start();
        echo '<p class="security-verification" hidden>thisIsPasswordforxhr</p>';
        $output = ob_get_clean();
}?>
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
    <?php

    echo (isset($output)? $output : '');
    ?>
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
                    <img src="assests/logout.svg">
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
                            <p><?php echo ($arr[3] == "user") ? "User" : "Admin";   ?></p>
                        </div>
                    </div>
                </div>
                <div class="grid">
                    <div class="bloc">
                        <h3>Personal Information : </h3>
                        <p>
                            <span class="medium">Full Name :</span> <?php echo $arr[2]; ?> <br>
                            <span class="medium">Email Adress : </span> <span id="email"><?php echo $arr[0]; ?></span> <br>
                            <span class="medium">Age : </span> 11 years old <br>
                            <span class="medium">Date of birth : </span> 22-03-2110
                        </p>
                    </div>
                    <div class="bloc">
                        <h3>Account Security : </h3>
                        <p>
                            <span class="medium">Password :</span> ********** <span class="pass-chang">change password</span><br>
                            <span class="medium">Privileges : </span> <?php echo ($arr[3] == "user") ? "User" : "Admin";   ?>
                        </p>
                        <dialog class="changp">
                            <div class="box">
                                <h2>Change Password</h2>
                                <div class="line"></div>
                                <p>Please enter the old and new passwords respectively : </p>

                                <input type="password" name="oldp" id="oldp" placeholder="Enter old password...">
                                <input type="password" name="newp" id="newp" placeholder="Enter new password...">
                                <div class="line bottom"></div>
                                <div class="result"></div>

                                <button class="change-password-button">Confirm</button>
                                <button class="cancel">Cancel</button>
                            </div>
                        </dialog>
                        <dialog class="deleteacc">
                            <div class="box" style="height:50vh;">
                                <h2>Delete account</h2>
                                <div class="line"></div>
                                <p>Please enter your password : </p>

                                <input type="password" name="oldp" id="oldp_d" placeholder="Enter password...">
                                <div class="line bottom"></div>
                                <div class="result_d"></div>

                                <button class="change-password-button">Confirm</button>
                                <button class="cancel">Cancel</button>
                            </div>
                        </dialog>
                    </div>
                    <div class="bloc">
                        <h3>Deactivate my account : </h3>
                        <p class="bold">
                            <span class="red"> Warning !</span> By deactivating your account all data and progress will be permanently lost , you will never be able to regain access to your account. Proceed with caution. <br><br><br>
                            <span class="delete-acc"> I want to permanently delete my account !</span>
                        </p>
                    </div>
                </div>
            </section>
            <section id="Media" class="">
                <div class="mediaheader flex-row">
                    <div class="flex-row">
                        <span>Media</span><img src="assests/down-arrow.png" alt="">
                    </div>
                </div>
                <div class="flex-row">
                    <div class="mediagrid-wrapper">
                        <div class="mediagrid">
                            <?php if($arr[3] == 'admin'){
                                echo '<div class="mediabloc addnewcollection">
                                <div class="outer card add" style="background-image:url();">
                                    <div class="inner card add" style="background-image:url();">
                                        <img src="assests/add.svg"  alt="">
                                    </div>
                                </div>
                                <p>New collection</p>
                            </div>';
                            }  ?>
                            
                            <?php
                            $res =  $connection->query("SELECT `name` FROM collections");

                            while ($row = $res->fetch_array()) {
                                $links = $connection->query("SELECT link FROM images WHERE (images.`collection` = '" . $row[0] . "') LIMIT 2");

                                if ($links->num_rows > 1) {

                                    $pic1 = $links->fetch_array()[0];
                                    $pic2 = $links->fetch_array()[0];
                                    echo '<div class="mediabloc real">
                                            <div class="outer card" style="background-image:url(' . ((!empty($pic1)) ? $pic1 : '') . ');">
                                                <div class="inner card"  style="background-image:url(' . ((!empty($pic1)) ? $pic2 : '') . ');">
            
                                                </div>
                                            </div>
                                            <p>' . $row[0] . '</p>
                                        </div>';
                                } elseif ($links->num_rows == 1) {
                                    $pic1 = $links->fetch_array()[0];
                                    echo '<div class="mediabloc real">
                                            <div class="outer card" style="background-image:url();">
                                                <div class="inner card"  style="background-image:url(' . ((!empty($pic1)) ? $pic1 : '') . ');">
            
                                                </div>
                                            </div>
                                            <p>' . $row[0] . '</p>
                                        </div>';
                                } elseif ($links->num_rows == 0) {
                                    if ($arr[3] == 'admin') {
                                        echo '<div class="mediabloc real">
                                        <div class="outer card" style="background-image:url();">
                                            <div class="inner card"  style="background-image:url();">
        
                                            </div>
                                        </div>
                                        <p>' . $row[0] . '</p>
                                    </div>';
                                    }
                                }
                            }

                            ?>

                        </div>
                        <dialog class="collection" >
                            <div class="box">
                                <h2>New collection</h2>
                                <div class="line"></div>
                                <p></p>

                                <input type="text" name="collname"  placeholder="Name...">
                               <textarea name="desc" id="desc" cols="30" rows="7" placeholder="Description..."></textarea>
                                <div class="line bottom"></div>
                                <div class="result"></div>

                                <button class="addButton_c">Add</button>
                                <button class="cancel">Cancel</button>
                            </div>
                        </dialog>
                        <dialog class="collection_image_add"  style="opacity: 0;">
                            <div class="box">
                                
                                    <h2>New image</h2>
                                    <div class="line"></div>
                                    <p></p>
                                    
                                    <input type="text" name="imgname" id="imgname"  placeholder="Name...">
                                    <select name="imgcollection" id="imgcollection" placeholder="Collection..."> 
                                        <?php 
                                            $colls = $connection->query('SELECT `name` FROM collections ');
                                            while ($line = $colls->fetch_array()) {
                                                echo '<option value=\''.$line[0].'\'>'.$line[0].'</option>';
                                            }

                                        ?>
                                    </select>
                                    <textarea name="imgdesc" id="imgdesc" cols="30" rows="3" placeholder="Description..."></textarea>
                                    <label for="imgfile">Image file <span class="red">*</span></label>
                                    <input type="file" name="imgfile" id="imgfile">
                                    <label for="audiofile">Audio file</label>
                                    <input type="file" name="audiofile" id="audiofile">

                                    <div class="line bottom"></div>
                                    <div class="result"></div>

                                    <button class="addButton_img">Add</button>
                                    <button class="cancel">Cancel</button>
                                
                            </div>
                        </dialog>
                    </div>
                    <div class="collapsable-img-tab flex-row">
                        <div class="collapsebutton">
                            <img src="assests/down-arrow.png" alt="">
                        </div>
                        <div class="images">
                                <?php if ($arr[3] == 'admin') {
                                    echo "<div class=\"image-card\" title=\"Add\"><div style=\"background-image:url('assests/add.svg');\"></div><p>Add image</p></div>"; 
                                } ?>
                        </div>
                    </div>
                </div>
            </section>
            <section id="Games"></section>
        </main>
    </div>
    <div class="mobile flex-column">
        <div class="warning flex-column">
            <img src="assests/robot-error.png" alt="">
            <h2>Mobile is currently not supported !</h2>
            <p>Please use the desktop version</p>
        </div>
    </div>
</body>
<?php
if (isset($_POST['imgname']) && isset($_POST['imgcollection']) && isset($_POST['imgname']) && isset($_POST['imgfile'])) {
    $imagename = ($_POST['imgname']);
    $imagecollection = ($_POST['imgcollection']);
    $imagedesc = ((isset($_POST['imgdesc']))? $_POST['imgdesc'] : '' );
    $audio = '';
    move_uploaded_file($_FILES['imgfile']["tmp_name"],"assests/images/".basename($_FILES['imgfile']['name']));
    if (isset($_POST['audiofile'])) {
        $audio = "assests/audio/".basename($_FILES['imgfile']['name']);
        move_uploaded_file($_FILES['audiofile']["tmp_name"],"assests/audio/".basename($_FILES['audiofile']['name']));
    }
    $connection->query("INSERT INTO images VALUES ('','".$imagename."','assests/images/".basename($_FILES['imgfile']['name'])."','".$imagedesc."','".$imagecollection."','".$audio."')");

}?>
</html>
<?php $connection->close();

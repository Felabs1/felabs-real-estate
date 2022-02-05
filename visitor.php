<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./lib/libr/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="./css/felabs.css">
    <link rel="stylesheet" href="./css/style.css">

    <style>
    * {
        color: white;
    }

    input{
        color: #444;
    }

    .w3-modal .w3-bar-item{
        color: #444;
    }

    span{
        color: #444;
    }

    .w3-bar-item {
        text-decoration: none;
    }

    @media(max-width: 600px){
        .slide1 h1{
            font-size: 20px;
        }
    }

    .slide1 h1{
        margin-top: 15% !important;
    }
    </style>


    <script src="./js/jquery.min.js"></script>
    <script src="./js/main.js"></script>
    <title>Document</title>
</head>

<body onload="setl()">
    <div id="loader" class="w3-animate-fading w3-display-middle">f</div>
    <div style="display: none; background-image: url('./images/webassets/cover.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 100%;" id="mainbody">
        <div class="w3-bar topbar w3-top" style="background-color: transparent;">
            <a class="w3-bar-item logo">Kisumu</a>
            <div class="mainnav w3-padding w3-hide-small" id="mainnav" style="margin-left: 90px; position: sticky;">
                <a href="./index.php" class="w3-bar-item" style="margin-left: 70px;"><i class="fa fa-home">&nbsp;</i>Home</a>
                <!-- <a href="#" class="w3-bar-item">About Us</a> -->
                <a href="./products.php" class="w3-bar-item"><i class="fa fa-building">&nbsp;</i>Products</a>
                <div class="w3-right" style="margin-right: 200px;">
                    <a href="#" class="w3-bar-item" onclick="openModal('login')"><i class="fa fa-user">&nbsp;</i>Sign In</a>
                    <a href="#" class="w3-bar-item" onclick="openModal('signup')"><i class="fa fa-users">&nbsp;</i>Sign Up</a>
                </div>

            </div>
            <div class="w3-right">
                <a id="mobile-menu" class="w3-bar-item w3-hide-large w3-hide-medium" onclick="lowermenu()"><i class="fa fa-navicon">&nbsp;</i></a>
            </div>
        </div>

        <!-- mobile menu -->
        <div class="w3-modal" id="mobilemainnav" style="background-color: rgba(0, 0, 0, 0.1);">
            <div class="w3-modal-content w3-round-xlarge">
                <div class="w3-container mobmainnav" id="mobmainnav">
                    <a href="#" class="w3-bar-item"><i class="fa fa-home w3-text-black">&nbsp;</i>Home</a>
                    <!-- <a href="#" class="w3-bar-item">About</a> -->
                    <a href="./products.php" class="w3-bar-item"><i class="fa fa-building w3-text-black">&nbsp;</i>Products</a>
                    <a href="#" class="w3-bar-item" onclick="openModal('login')"><i class="fa fa-user w3-text-black">&nbsp;</i>Sign in</a>
                    <a href="#" class="w3-bar-item" onclick="openModal('signup')"><i class="fa fa-users w3-text-black">&nbsp;</i>Sign Up</a>
                    <button class="w3-button w3-right w3-round w3-blue" onclick="raisemenu()">Close</button>
                    <br>
                    <br>
                </div>
            </div>
        </div><br><br>



        <!-- background-wallpapers -->
        <div class="wallpaper w3-center">
            <div class="slide1">
                <h1 class="w3-text-white"><b>Kisumu County <span class="w3-text-blue">Homes</span></b></h1>
                <div class="wallpaper-desc">
                    <p class="w3-text-white w3-small">Tired of walking and straining all day looking for a place to stay in? Be
                        assured you are in the right place.</p>
                        <button class="w3-button w3-blue w3-round" onclick="window.location.href='./products.php'">Get Started</button>
                </div>
            </div>
        </div>



        <div class="w3-modal" id="login" style="background-color: transparent;">
            <div class="w3-modal-content w3-animate-zoom w3-card-4 w3-round">
                <div class="w3-row login">
                    <form class="w3-col w3-padding l8" id="frmlogin">
                        <h3 class="w3-center">Welcome Back</h3>
                        <br>
                        <input type="text" class="w3-input" placeholder="Username Or Phone Number" id="loginusername"
                            name="loginusername"><br>
                        <input type="Password" class="w3-input" placeholder="Password" name="loginuserpassword"
                            id="loginuserpassword"><br>
                        <input type="checkbox" name="remember_me" id="remember_me" class=""> <span style="color: #444;">Remember Me </span>
                        <br><br>
                        <button class="w3-button w3-light-green w3-round w3-block" type="button" onclick="signin()">Sign
                            In</button><br><br>
                        <button class="w3-button w3-red w3-round"
                            onclick="document.getElementById('login').style.display = 'none'">Close</button>
                    </form>
                    <div class="w3-col l4">
                        <div class="loginimage overlay" style="height: 400px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w3-modal" id="signup" style="background-color: transparent;">
            <div class="w3-modal-content w3-animate-zoom w3-white">
                <div class="w3-row signup">
                    <div class="w3-col l4">
                        <div class="signupimage overlay" style="height: 400px;">
                            <button type="button" class="w3-button w3-margin w3-red w3-round"
                                onclick="$('#signup').css('display', 'none')">Close</button>
                        </div>
                    </div>
                    <div class="w3-col l8">
                        <div class="w3-row-padding">
                            <h3 class="w3-center">Sign Up</h3>
                            <form id="usersignup">
                                <div class="w3-col w3-padding m6">
                                    <input type="text" class="w3-input" name="firstname" id="firstname"
                                        placeholder="First Name">

                                </div>
                                <div class="w3-col w3-padding m6">
                                    <input type="text" class="w3-input" name="lastname" id="lastname"
                                        placeholder="Last Name">

                                </div>
                                <div class="w3-col w3-padding m12">
                                    <input type="text" class="w3-input" name="email" id="email" placeholder="Email">

                                </div>
                                <div class="w3-col w3-padding m12">
                                    <input type="text" class="w3-input" name="phone" id="phone" placeholder="Phone">

                                </div>
                                <div class="w3-col w3-padding m6">
                                    <input type="password" class="w3-input" name="password" id="password"
                                        placeholder="password">

                                </div>
                                <div class="w3-col w3-padding m6">
                                    <input type="password" class="w3-input" name="confirm_password"
                                        id="confirm_password" placeholder="Confirm password">

                                </div>
                                <div class="w3-col w3-padding m12">
                                    register As&nbsp; <input type="radio" name="usertype"
                                        value="owner">&nbsp;<span>owner</span>&nbsp;&nbsp; <input type="radio" name="usertype"
                                        value="broker">&nbsp;<span>Broker</span>&nbsp;&nbsp; <input type="radio" name="usertype"
                                        value="customer" checked>&nbsp;<span>Customer&nbsp;

                                </div>
                                <div class="w3-col w3-padding m12">
                                    <input type="button" class="w3-button w3-block w3-blue w3-round" placeholder="Phone"
                                        value="Register" onclick="signUp()"><br>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <br>
        <br>

    </div>


</body>

</html>

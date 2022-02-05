<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./lib/libr/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="./css/felabs.css">
    <link rel="stylesheet" href="./css/style.css">


    <style>
    li {
        cursor: pointer;
    }

    li:hover {
        color: #2196f3;
    }
    </style>



    <title>Document</title>
</head>

<body onload="setl()" bgcolor="#f2f9fe">
    <div id="loader" class="w3-animate-fading w3-display-middle">f</div>
    <div style="display: none;" id="mainbody">
        <div class="w3-bar w3-blue topbar w3-top">
            <a class="w3-bar-item logo">Kisumu</a>
            <div class="w3-right">
                <?php
                 if(isset($_SESSION['full_name'])){
                     ?>
                <a class="w3-bar-item w3-text-white w3-hide-small">Welcome, <?php echo $_SESSION['full_name'] ; ?></a>

                <?php
                 }
                ?>
                <a id="mobile-menu" class="w3-bar-item w3-hide-large w3-hide-medium" onclick="lowermenu()"><i
                        class="fa fa-navicon">&nbsp;</i></a>
            </div>
        </div>

        <!-- mobile menu -->
        <div class="w3-modal" id="mobilemainnav" style="background-color: rgba(0, 0, 0, 0.1);">
            <div class="w3-modal-content w3-round-xlarge">
                <div class="w3-container mobmainnav" id="mobmainnav">
                    <a href="./index.php" class="w3-bar-item"><i class="fa fa-home">&nbsp;</i>Home</a>
                    <a href="#" class="w3-bar-item">About</a>
                    <a href="#" class="w3-bar-item">Products</a>
                    <a href="./userdetails.php" class="w3-bar-item">User Details</a>

                    <?php
                    if(isset($_SESSION['full_name'])){
                        ?>
                    <button class="w3-button w3-blue w3-round" onclick="openModal('propertyModal')"><b
                            class='w3-text-white'>+</b> ADD NEW PRODUCT</button>

                    <?php
                    }else{
                        ?>

                    <a href="#" class="w3-bar-item" onclick="openModal('login')"><i class="fa fa-user">&nbsp;</i>Sign
                        In</a>
                    <a href="#" class="w3-bar-item" onclick="openModal('signup')"><i class="fa fa-users">&nbsp;</i>Sign
                        Up</a>
                    <?php
                    }


?>

                    <button class="w3-button w3-right w3-round w3-blue" onclick="raisemenu()">Close</button>
                    <br>
                    <br>
                </div>
            </div>
        </div><br><br>
        <div class="w3-bar w3-padding w3-white mainnav w3-hide-small" id="mainnav">
            <a href="./index.php" class="w3-bar-item" style="margin-left: 90px;"><i
                    class="fa fa-home">&nbsp;</i>Home</a>
            <!-- <a href="#" class="w3-bar-item">About Us</a> -->
            <a href="#" class="w3-bar-item"><i class="fa fa-building">&nbsp;</i>Products</a>
            <?php

            if(isset($_SESSION['full_name'])){
                ?>
            <a href="./userdetails.php" class="w3-bar-item"><i class="fa fa-user">&nbsp;</i>My Account</a>
            <a href="./logout.php" class="w3-bar-item"><i class="fa fa-sign-out">&nbsp;</i>Logout</a>
            <?php
            }

            ?>

            <div class="w3-right" style="margin-right: 200px;">
                <?php
                    if(isset($_SESSION['full_name'])){
                        ?>
                <button class="w3-button w3-blue w3-round" onclick="openModal('propertyModal')"><b
                        class='w3-text-white'>+</b> ADD NEW PRODUCT</button>

                <?php
                    }else{
                        ?>

                <a href="#" class="w3-bar-item" onclick="openModal('login')"><i class="fa fa-user">&nbsp;</i>Sign In</a>
                <a href="#" class="w3-bar-item" onclick="openModal('signup')"><i class="fa fa-users">&nbsp;</i>Sign
                    Up</a>
                <?php
                    }


?>
            </div>

        </div>

        <div class="userdetailsheader">
            <br>
            <h3 class="w3-center">Properties</h3>
            <?php
                if(isset($_GET['msg'])){
                    ?>
            <div class="w3-container w3-center"><b
                    class="w3-text-green w3-border-bottom w3-border-green"><?php echo $_GET['msg']; ?></b></div>
            <?php
                }
            ?>
        </div>

        <!-- <section>
            <form class="w3-padding">
                <div class="w3-row-padding w3-white w3-card">

                    <div class="w3-col m4 w3-padding">
                        <span class="w3-large">Live Search</span>
                        <input type="text" name="search" class="w3-input w3-border w3-round" id="search"
                            placeholder="Search price, room Name or location" onkeyup="searchProperties()">
                        <!-- <button class="w3-button w3-blue">Search</button> -->
                        <!-- <br>
                    </div>
                </div>
            </form>
        </section> --> -->






        <section>
            <div class="w3-row-padding">
                <div class="w3-col l4">
                    <div class="w3-card w3-padding w3-white">
                        <h3 class="" style="margin-left: 15px;">Property Type</h3>
                        <ul type="none" style="margin: 0;">
                            <li class="w3-padding" onclick="viewOnlyApartments()"><i class="fa fa-check-square-o"></i>
                                Apartments</li>
                            <li class="w3-padding" onclick="viewOnlyHouses()"><i class="fa fa-check-square-o"></i>
                                Houses</li>
                            <li class="w3-padding" onclick="viewOnlyOffices()"><i class="fa fa-check-square-o"></i>
                                Offices</li>
                            <li class="w3-padding" onclick="viewOnlyVillas()"><i class="fa fa-check-square-o"></i>
                                Villas</li>
                        </ul>
                    </div>
                    <br />
                    <div class="w3-card w3-padding w3-white">
                        <h3 style="margin-left: 15px;">Status</h3>
                        <ul type="none">
                            <li class="w3-padding" onclick="viewOnlyOnSale()"><i class="fa fa-check-square-o"></i> On
                                Sale</li>
                            <li class="w3-padding" onclick="viewOnlyRental()"><i class="fa fa-check-square-o"></i>
                                Rental</li>
                        </ul>
                    </div>
                    <br />
                    <!-- <div class="w3-card w3-padding-large w3-white">
                        <h3 style="margin-left: 15px;">Property By City</h3>
                        <ul>
                            <li class="w3-padding">Nairobi</li>
                            <li class="w3-padding">Kisumu</li>
                            <li class="w3-padding">Nakuru</li>
                            <li class="w3-padding">Mombasa</li>
                            <li class="w3-padding">Eldoret</li>
                            <li class="w3-padding">Siaya</li>
                        </ul>
                    </div> -->
                </div>
                <div id="datadisplay">
                    <div class="w3-col w3-padding l4">
                        <div>
                            <div
                                style="background-image: url('./images/uploadspexels-jean-van-der-meulen-1454806.jpg'); background-size:cover; background-position: center; height: 250px;">
                                <br>
                                <button class="w3-button w3-margin w3-blue w3-round">Sale</button>

                            </div>
                            <div class="w3-container w3-white">
                                <h4>2 BHK Builder Floor</h4>
                                <span>Kisumu Kenya Kanyamedha</span>
                                <h2 class="w3-text-light-blue">24.1 M</h2>
                                <hr>
                            </div>
                            <div class="w3-container w3-white">
                                <table class="w3-table">
                                    <tr>
                                        <th>Beds</th>
                                        <th>Baths</th>
                                        <th>Area</th>
                                    </tr>
                                    <tr class="w3-text-grey w3-center">
                                        <td>2</td>
                                        <td>2</td>
                                        <td>520 sq Ft</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <!-- Add Properties Modal -->
        <div class="w3-modal" id="propertyModal">
            <div class="w3-modal-content">
                <div class="w3-card">
                    <div class="w3-container w3-round-large w3-border-bottom">
                        <button class="w3-button w3-right"
                            onclick='document.getElementById("propertyModal").style.display ="none";'>&times</button>
                        <h5>New Property</h5>
                    </div>
                    <div class="w3-container">
                        <form action="<?php echo htmlspecialchars("./php/process.php?action=addproperty")  ?>"
                            method="post" enctype='multipart/form-data'>
                            <div class="w3-row-padding">
                                <label for=""><b>Property Title</b></label>
                                <input type="text" class="w3-input w3-border w3-round" name="property_title"><br>
                                <label for=""><b>Property Description</b></label>
                                <textarea id="property_description" cols="30" rows="10"
                                    class="w3-input w3-border w3-round" name="property_description"></textarea><br>
                                <div class="w3-col l4">
                                    <label for=""><b>Type</b></label>
                                    <select class="w3-select w3-border w3-round" style="width: 90%" name="ptype"
                                        id="ptype">

                                        <option value="" disabled selected>Select Property Type</option>

                                        <option value="Apartments">Apartments</option>
                                        <option value="Houses">Houses</option>
                                        <option value="Offices">Offices</option>
                                        <option value="Villas">Villas</option>
                                        <option value="Lands">Lands</option>
                                    </select>
                                </div>
                                <div class="w3-col l4">
                                    <label for=""><b>Status</b></label>
                                    <select class="w3-input w3-border w3-round" style="width: 90%" id="pstatus"
                                        name="pstatus">
                                        <option value="sale">Sale</option>
                                        <option value="Rent">Rent</option>
                                    </select>
                                </div>
                                <div class="w3-col l4">
                                    <label for=""><b>Location</b></label>
                                    <input type="text" class="w3-input w3-border w3-round" name="plocation"
                                        id="plocation">
                                </div>
                                <div class="w3-col l4">
                                    <label for=""><b>Bedrooms</b></label>
                                    <input type="text" class="w3-input w3-border w3-round" style="width: 90%"
                                        name="bedrooms" id="bedrooms">
                                </div>
                                <div class="w3-col l4">
                                    <label for=""><b>Bathrooms</b></label>
                                    <input type="text" class="w3-input w3-border w3-round" style="width: 90%"
                                        name="bathrooms" id="bathrooms">
                                </div>
                                <div class="w3-col l4">
                                    <label for=""><b>Floors</b></label>
                                    <input type="text" class="w3-input w3-border w3-round" name="floors" id="floors">
                                </div>
                                <div class="w3-col l4">
                                    <label for=""><b>Garages</b></label>
                                    <input type="text" class="w3-input w3-border w3-round" style="width: 90%"
                                        name="garages" id="garages">
                                </div>
                                <div class="w3-col l4">
                                    <label for=""><b>area</b></label>
                                    <input type="text" placeholder="sq ft" class="w3-input w3-border w3-round"
                                        style="width: 90%" name="area" id="area">
                                </div>
                                <div class="w3-col l4">
                                    <label for=""><b>Size</b></label>
                                    <input type="text" placeholder="sq ft" class="w3-input w3-border w3-round"
                                        name="psize" id="psize">
                                </div>
                                <div class="w3-col l4">
                                    <label for=""><b>Sale or rent Price</b></label>
                                    <input type="text" class="w3-input w3-border w3-round" style="width: 90%"
                                        name="sale_or_rent_price" id="sale_or_rent_price">
                                </div>
                                <div class="w3-col l4">
                                    <label for=""><b>Before Price label</b></label>
                                    <input type="text" class="w3-input w3-border w3-round" style="width: 90%"
                                        name="before_price_label" id="before_price_label" placeholder="eg start from">
                                </div>
                                <div class="w3-col l4">
                                    <label for=""><b>After Price Label</b></label>
                                    <input type="text" class="w3-input w3-border w3-round" name="after_price_label"
                                        id="after_price_label" placeholder="eg: monthly">
                                </div><br><br>
                            </div>
                            <br>
                            <div class="w3-row-padding">
                                <h5 style="margin-top: 20px;">Property Features</h5>
                                <div class="w3-col w3-padding m3 s6">
                                    <input type="hidden" name="balcony" value="no">
                                    <input type="checkbox" name="balcony" id="balcony" value="yes">Balcony
                                </div>
                                <div class="w3-col w3-padding m3 s6">
                                    <input type="hidden" name="balcony" value="no">
                                    <input type="hidden" name="pet_friendly" value="no">
                                    <input type="checkbox" name="pet_friendly" id="pet_friendly" value="yes">Pet
                                    Friendly
                                </div>
                                <div class="w3-col w3-padding s6 m3">
                                    <input type="hidden" name="barbeque" value="no">
                                    <input type="checkbox" name="barbeque" id="barbecue" value="yes">Barbecue
                                </div>
                                <div class="w3-col w3-padding s6 m3">
                                    <input type="hidden" name="center_cooling" value="no">
                                    <input type="checkbox" name="center_cooling" id="center_cooling" value="yes">Center
                                    Cooling
                                </div>
                                <div class="w3-col w3-padding s6 m3">
                                    <input type="hidden" name="fire_alarm" value="no">
                                    <input type="checkbox" name="fire_alarm" id="fire_alarm" value="yes">Fire Alarm
                                </div>
                                <div class="w3-col w3-padding s6 m3">
                                    <input type="hidden" name="modern_kitchen" value="no">
                                    <input type="checkbox" name="modern_kitchen" id="modern_kitchen" value="yes">Modern
                                    Kitchen
                                </div>
                                <div class="w3-col w3-padding s6 m3">
                                    <input type="hidden" name="storage" value="no">
                                    <input type="checkbox" name="storage" id="storage" value="yes">Storage
                                </div>
                                <div class="w3-col w3-padding s6 m3">
                                    <input type="hidden" name="drier" value="no">
                                    <input type="checkbox" name="drier" id="drier" value="yes">Drier
                                </div>
                                <div class="w3-col w3-padding s6 m3">
                                    <input type="hidden" name="heating" value="no">
                                    <input type="checkbox" name="heating" id="heating" value="yes">Heating
                                </div>
                                <div class="w3-col w3-padding s6 m3">
                                    <input type="hidden" name="pool" value="no">
                                    <input type="checkbox" name="pool" id="pool" value="yes">Pool
                                </div>
                                <div class="w3-col w3-padding s6 m3">
                                    <input type="hidden" name="laundry" value="no">

                                    <input type="checkbox" name="laundry" id="laundry" value="yes">Laundry
                                </div>
                                <div class="w3-col w3-padding s6 m3">
                                    <input type="hidden" name="sauna" value="no">

                                    <input type="checkbox" name="sauna" id="sauna" value="yes">Sauna
                                </div>
                                <div class="w3-col w3-padding s6 m3">
                                    <input type="hidden" name="gym" value="no">

                                    <input type="checkbox" name="gym" id="gym" value="yes">Gym
                                </div>
                                <div class="w3-col w3-padding s6 m3">
                                    <input type="hidden" name="elevator" value="no">

                                    <input type="checkbox" name="elevator" id="elevator" value="yes">Elevator
                                </div>
                                <div class="w3-col w3-padding s6 m3">
                                    <input type="hidden" name="dish_washer" value="no">

                                    <input type="checkbox" name="dish_washer" id="dish_washer" value="yes">Dish Washer
                                </div>
                                <div class="w3-col w3-padding s6 m3">
                                    <input type="hidden" name="emergency_exit" value="no">

                                    <input type="checkbox" name="emergency_exit" id="emergency_exit"
                                        value="yes">Emergency Exit
                                </div>

                            </div>
                            <br>
                            <br>
                            <div class="w3-row-padding">
                                <h5>Property Gallery</h5>

                                <div class="w3-col l4">
                                    <label for=""><b>Featured Image</b></label>
                                    <input type="file" class="w3-input w3-border w3-round" style="width: 90%"
                                        name="gallery_0" id="gallery_0">

                                </div>
                                <div class="w3-col l4">
                                    <label for=""><b>Gallery 1</b></label>
                                    <input type="file" class="w3-input w3-border w3-round" style="width: 90%"
                                        name="gallery_1" id="gallery_1">
                                </div>
                                <div class="w3-col l4">
                                    <label for=""><b>Gallery 2</b></label>
                                    <input type="file" class="w3-input w3-border w3-round" name="gallery_2"
                                        id="gallery_2">
                                </div>
                                <div class="w3-col l4">
                                    <label for=""><b>Gallery 3</b></label>
                                    <input type="file" class="w3-input w3-border w3-round" style="width: 90%"
                                        name="gallery_3" id="gallery_3">
                                </div>
                                <div class="w3-col l4">
                                    <label for=""><b>Gallery 4</b></label>
                                    <input type="file" class="w3-input w3-border w3-round" style="width: 90%"
                                        name="gallery_4" id="gallery_4">
                                </div>
                                <div class="w3-col l4">
                                    <label for=""><b>Gallery 5</b></label>
                                    <input type="file" class="w3-input w3-border w3-round" name="gallery_5"
                                        id="gallery_5">
                                </div>

                            </div>
                            <br>
                            <br>
                            <div class="w3-row-padding">
                                <h5>Property Location</h5>
                                <div class="w3-col l4">
                                    <label for=""><b>Address</b></label>
                                    <input type="text" class="w3-input w3-border w3-round" style="width: 90%"
                                        name="address" id="address">
                                </div>
                                <div class="w3-col l4">
                                    <label for=""><b>Country</b></label>
                                    <input type="text" class="w3-input w3-border w3-round" style="width: 90%"
                                        name="country" id="country">
                                </div>
                                <div class="w3-col l4">
                                    <label for=""><b>Location</b></label>
                                    <input type="text" class="w3-input w3-border w3-round" name="location2"
                                        id="location2">
                                </div>
                                <div class="w3-col l4">
                                    <label for=""><b>City</b></label>
                                    <input type="text" class="w3-input w3-border w3-round" style="width: 90%"
                                        name="city" id="city">
                                </div>
                                <div class="w3-col l4">
                                    <label for=""><b>Zip/Postal Code</b></label>
                                    <input type="text" class="w3-input w3-border w3-round" style="width: 90%"
                                        name="postal_code" id="postal_code">
                                </div>
                                <div class="w3-col l4">
                                    <label for=""><b>NeighbourHood</b></label>
                                    <input type="text" class="w3-input w3-border w3-round" name="neighbourhood"
                                        id="neighbourhood">
                                </div>
                            </div>
                            <br>
                            <div class="w3-row-padding">
                                &nbsp;<input type="submit" class="w3-button w3-blue w3-round" value="Save Property">
                            </div>

                        </form>
                    </div>

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
                        <input type="checkbox" name="remember_me" id="remember_me" class=""> <span
                            style="color: #444;">Remember Me </span>
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
                                        value="owner">&nbsp;<span>owner</span>&nbsp;&nbsp; <input type="radio"
                                        name="usertype" value="broker">&nbsp;<span>Broker</span>&nbsp;&nbsp; <input
                                        type="radio" name="usertype" value="customer" checked>&nbsp;<span>Customer&nbsp;

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
        <div class="w3-light-grey w3-center" style="margin-bottom: 0px;">
            <section style="margin-bottom: 0px;">
                <div class="w3-row-padding">
                    <div class="w3-col m4">
                        <div class="footer-navs">
                            <a href="#">felabs Real Estate</a>
                            <a href="#">+254 731 862583</a>
                            <a href="#">felabsit@gmail.com</a>
                        </div>
                    </div>
                    <div class="w3-col m4">
                        <div class="footer-navs">
                            <a href="#">Home</a>
                            <a href="#">About</a>
                            <a href="#">Products</a>
                            <a href="#">Sign In</a>
                            <a href="#">Sign up</a>
                            <a href="#">Affiliates</a>
                        </div>
                    </div>
                    <div class="w3-col m4">
                        <div class="footer-navs">
                            <h3>Donate</h3>
                            <a>7837673625365</a>
                            <a>+254 731 862583</a>
                            <a>+254 727 695648</a>
                        </div>
                    </div>

                </div>
            </section>
        </div>
        <div class="w3-center">
            <small>&copy; Copyright Felabs Enterprises</small>
        </div>
    </div>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/main.js"></script>
</body>

</html>
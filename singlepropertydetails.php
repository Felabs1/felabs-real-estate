<?php
session_start();
if(!isset($_SESSION['full_name']) && $_SESSION['full_name'] !== true){
    header("location: visitor.php");
}
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


   
    <title>Document</title>
</head>

<body onload="setl()" bgcolor="#f2f9fe">
    <div id="loader" class="w3-animate-fading w3-display-middle"></div>
    <div style="display: none;" id="mainbody">
        <div class="w3-bar w3-blue topbar w3-top">
            <a class="w3-bar-item logo">Kisumu</a>
            <div class="w3-right">
                <a class="w3-bar-item w3-text-white w3-hide-small">Welcome, <?php echo $_SESSION['full_name'] ; ?></a>
                <a id="mobile-menu" class="w3-bar-item w3-hide-large w3-hide-medium" onclick="lowermenu()"><i class="fa fa-navicon">&nbsp;</i></a>
            </div>
        </div>

        <!-- mobile menu -->
        <div class="w3-modal" id="mobilemainnav" style="background-color: rgba(0, 0, 0, 0.1);">
            <div class="w3-modal-content w3-round-xlarge">
                <div class="w3-container mobmainnav" id="mobmainnav">
                    <a href="./index.php" class="w3-bar-item"><i class="fa fa-home">&nbsp;</i>Home</a>
                    <!-- <a href="#" class="w3-bar-item"><i class="fa fa-navicon">&nbsp;</i>About</a> -->
                    <a class="w3-bar-item" href="./products.php"><i class="fa fa-building">&nbsp;</i>Properties</a>
                    <a class="w3-bar-item" href="./userdetails.php"><i class="fa fa-user">&nbsp;</i>My Account</a>
                    <a href="./userdetails.php" class="w3-bar-item"><?php echo "welcome, ". $_SESSION['full_name']; ?></a>
                    <button class="w3-button w3-right w3-round w3-blue" onclick="raisemenu()">Close</button>
                    <br>
                    <br>
                </div>
            </div>
        </div><br><br>
        <div class="w3-bar w3-padding w3-white mainnav w3-hide-small" id="mainnav" >
            <a href="./index.php" class="w3-bar-item" style="margin-left: 90px; position: sticky;"><i class="fa fa-home">&nbsp;</i>Home</a>
            <!-- <a href="#" class="w3-bar-item">About Us</a> -->
            <a href="./products.php" class="w3-bar-item"><i class="fa fa-building">&nbsp;</i>Properties</a>
            <a href="./userdetails.php" class="w3-bar-item"><i class="fa fa-user">&nbsp;</i>My Account</a>
            <div class="w3-right" style="margin-right: 200px;">
                 <button class="w3-button w3-blue w3-round" onclick="openModal('propertyModal')"><b class='w3-text-white'>+</b> ADD NEW PRODUCT</button>
                
            </div>

        </div>

        <div class="w3-container w3-opacity-max" style="background-image: url('./images/uploadspexels-curtis-adams-4682110.jpg'); height: 100px;">

        </div>
        <section>
            <div class="w3-row-padding">
                    <div class="w3-center">
                    <span class="w3-text-grey" style="font-weight: 500; font-size: 30px; display:block;" id="property_title">2 BHK Builder Floor </span>
                    <span style="font-size: 20px;"><span id='city'>Kisumu</span>, <span id="postal-code">40602</span>, <span id="country">Kenya</span></span>

            
                
                
                    <span style="font-size: 20px;display:block; text-align: center;"> sale</span>

                    <span class="w3-text-light-blue" style="font-weight: 500; font-size: 30px; display:block; text-align: center;" id="sale_price">2.5 M</span>
            </div>

                    
                

    
            </div>
            <hr>
            <div class="w3-row-padding">
            <h4>Property ID: <span class="w3-text-grey" id="prop_id">123456789</span></h4>
            <div class="w3-col m8">
                

                <div class="w3-container w3-white">
                <h5><b>Gallery</b></h5>
                <div>
                    <img id="featured_image" src="./images/uploadspexels-alexander-zvir-3705529.jpg" alt="" srcset="" width="100%" class="mySlides w3-animate-opacity">
                    <img id="gallery_1" src="./images/uploadspexels-alexander-zvir-3705529.jpg" alt="" srcset="" width="100%" class="mySlides w3-animate-opacity" style="display:none;">
                    <img id="gallery_2" src="./images/uploadspexels-alexander-zvir-3705529.jpg" alt="" srcset="" width="100%" class="mySlides w3-animate-opacity" style="display:none;">
                    <img id="gallery_3" src="./images/uploadspexels-alexander-zvir-3705529.jpg" alt="" srcset="" width="100%" class="mySlides w3-animate-opacity" style="display:none;">
                    <img id="gallery_4" src="./images/uploadspexels-alexander-zvir-3705529.jpg" alt="" srcset="" width="100%" class="mySlides w3-animate-opacity" style="display:none;">
                    <img id="gallery_5" src="./images/uploadspexels-alexander-zvir-3705529.jpg" alt="" srcset="" width="100%" class="mySlides w3-animate-opacity" style="display:none;">
                </div><br>
                <div class="w3-row-padding">
                    <div class="w3-col s2">
                        <img id="btnfeatured_image" src="./images/uploadspexels-alexander-zvir-3705529.jpg" alt="" srcset="" width="100%" height="100%" class="demo w3-opacity w3-hover-opacity-off" onclick="currentDiv(1)">                        
                    </div>
                    <div class="w3-col s2">
                        <img id="btngallery_1" src="./images/uploadspexels-alexander-zvir-3705529.jpg" alt="" srcset="" width="100%" height="100%" class="demo w3-opacity w3-hover-opacity-off" onclick="currentDiv(2)">                        
                    </div>
                    <div class="w3-col s2">
                        <img id="btngallery_2" src="./images/uploadspexels-alexander-zvir-3705529.jpg" alt="" srcset="" width="100%" height="100%" class="demo w3-opacity w3-hover-opacity-off" onclick="currentDiv(3)">                        
                    </div>
                    <div class="w3-col s2">
                        <img id="btngallery_3" src="./images/uploadspexels-alexander-zvir-3705529.jpg" alt="" srcset="" width="100%" height="100%" class="demo w3-opacity w3-hover-opacity-off" onclick="currentDiv(4)">                        
                    </div>
                    <div class="w3-col s2">
                        <img id="btngallery_4" src="./images/uploadspexels-alexander-zvir-3705529.jpg" alt="" srcset="" width="100%" height="100%" class="demo w3-opacity w3-hover-opacity-off" onclick="currentDiv(5)">                        
                    </div>
                    <div class="w3-col s2">
                        <img id="btngallery_5" src="./images/uploadspexels-alexander-zvir-3705529.jpg" alt="" srcset="" width="100%" height="100%" class="demo w3-opacity w3-hover-opacity-off" onclick="currentDiv(6)">                        
                    </div>
                </div>
                <br/>

                </div>

                <br/>

                <div class="w3-container w3-white">
                    <h5><b>Description</b></h5>
                    <div class="w3-row-padding">
                        <div class="w3-col m4 s6">
                            <div class="w3-container">
                                <span class="w3-center"><b>Area</b></span>
                                <span  class="w3-center" id="property_area">2q m</span>
                            </div>
                        </div>
                        <div class="w3-col m4 s6">
                            <div class="w3-container">
                                <span  class="w3-center"><b>Beds</b></span>
                                <span class="w3-center" id="no_beds">2</span>
                            </div>
                        </div>

                        <div class="w3-col m4 s6" style="margin-bottom: 20px;">
                            <div class="w3-container">
                                <span  class="w3-center"><b>Baths</b></span>
                                <span class="w3-center" id="no_bathrooms">1</span>
                            </div>
                        </div>

                        <div class="w3-col m4 s6">
                            <div class="w3-container">
                                <span class="w3-center"><b>floors</b></span>
                                <span  class="w3-center" id="no_floors">1</span>
                            </div>
                        </div>

                        <div class="w3-col m4 s6">
                            <div class="w3-container">
                                <span class="w3-center"><b>Garages</b></span>
                                <span class="w3-center" id="no_garages">1</span>
                            </div>
                        </div>

                        <div class="w3-col m4 s6">
                            <div class="w3-container">
                                <span class="w3-center"><b>Size</b></span>
                                <span class="w3-center" id="no_size">1</span>
                            </div>
                        </div>
                    </div><br/>
                    <div class="w3-container w3-padding" id="property_description">
                        There are two Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magnam aperiam ipsa quas optio blanditiis accusamus quia? Saepe eligendi necessitatibus blanditiis vero assumenda nam voluptatibus commodi iure aperiam perspiciatis? Debitis, esse.
                    </div>
                </div>
                <br>
                <div class="w3-container w3-white">
                    <h5><b>Features</b></h5>
                    <table class="w3-table w3-responsive w3-bordered">
                        <tr>
                            <td><b>Center Cooling</b>: <span id="center_cooling"></span></td>
                            <td><b>Balcony</b>: <span id="balcony"></span></td>
                            <td><b>Pet Friendly</b>: <span id="pet_friendly"></span></td>
                        </tr>
                        <tr>
                            <td><b>Barbeque</b>: <span id="barbeque"></span></td>
                            <td><b>Fire Alarm</b>: <span id="fire_alarm"></span></td>
                            <td><b>Modern Kitchen</b>: <span id="modern_kitchen"></span></td>
                        </tr>
                        <tr>
                            <td><b>Storage</b>: <span id="storage"></span></td>
                            <td><b>Dryer</b>: <span id="drier"></span></td>
                            <td><b>Heating</b>: <span id="heating"></span></td>
                        </tr>
                        <tr>
                            <td><b>Pool</b>: <span id="pool"></span></td>
                            <td><b>Laundry</b>: <span id="laundry"></span></td>
                            <td><b>Gym</b>: <span id="gym"></span></td>
                        </tr>
                        <tr>
                            <td><b>Sauna</b>: <span id="sauna"></span></td>
                            <td><b>Elevator</b>: <span id="elevator"></span></td>
                            <td><b>Dish</b>: <span id="dish_washer"></span></td>
                        </tr>
                        <tr>
                            <td><b>Emergency Exit</b>: <span id="emergency_exit"></span></td>
                        </tr>
                    </table>
                </div>


                <br/>
                <div class="w3-container w3-white">
                    <h5><b>Location</b></h5><hr/>
                    <table class="w3-table w3-responsive">
                        <tr>
                            <td><b>Address : </b><span id="address"></span></td>
                            <td><b>City : </b><span id="p_city"></span></td>
                            <td><b>Country : </b><span id="p_country"></span></td>
                        </tr>
                        <tr>
                            <td><b>State : </b><span id="p_state"></span></td>
                            <td><b>Postal Code : </b><span id="postal_code"></span></td>
                        </tr>
                    </table>
                </div>

                <br/>
                <div class="w3-container w3-white">
                    <h5><b id="review_numbers">1 Review</b></h5>
                    <div id="property_review_box">
                        <!-- <div class="w3-row-padding">
                            <div class="w3-col m3 w3-round ">
                                <div class="w3-center w3-light-grey w3-round" style="height: 50px; width: 50px;">
                                    <h2><b>F</b></h2>

                                </div>

                            </div>
                            <div class="w3-col m9">
                                <h3>Felabs</h3>
                                <p>This review is for testing</p>
                            </div>
                        </div> -->
                    </div>
                    
                </div>
                <br>
                <div class="w3-container w3-white">
                    <h5><b>Leave A review</b></h5>
                    <form id="leave_review">
                        <textarea class="w3-input w3-border w3-round" name="review_message" id="review_message" cols="30" rows="10"></textarea>
                        <br>
                        <button type="button" class="w3-button w3-blue w3-round" onclick="post_review(<?php echo $_GET['id']; ?>)">Post Review</button><br>
                    </form><br>
                </div>
            </div>
            <div class="w3-col m4">
                <div class="w3-container w3-white">
                    <h5>Posted By Broker/Agent</h5>
                    <div class="icon" style="height: 150px;"></div>
                    <div class="w3-container">
                    <h5 id="posted_by">Felabs</h5>
                    <span id="poster_contact">0731862583</span><br>
                    <span id="poster_email"></span><br><br>
                    
                    </div>
                </div>
                <br>
                <div class="w3-container w3-white">
                    <form id="enq_creation">
                    <h5>Request A showing</h5>
                    <label><b>Your Name*</b></label>
                    <input type="text" class="w3-input w3-border w3-round" name="enq_name" id="enq_name" required value="<?php echo $_SESSION['full_name']; ?>"><br>
                    <label><b>Email Address*</b></label>
                    <input type="text" class="w3-input w3-border w3-round" name="enq_email" id="enq_email" required value="<?php echo $_SESSION['email']; ?>"><br>
                    <label><b>Destination</b></label>
                    <input type="text" class="w3-input w3-border w3-round" name="enq_dest" id="enq_dest" readonly><br>
                    <label><b>Phone Number</b></label>
                    <input type="text" class="w3-input w3-border w3-round" name="enq_phone" id="enq_phone" required value="<?php echo $_SESSION['phone']; ?>"><br>
                    <label><b>Message*</b></label>
                    <textarea name="enq_message" class="w3-input w3-border w3-round" id="enq_message" cols="30" rows="10"></textarea><br>
                    <button class="w3-button w3-blue w3-block w3-round" type="button" onclick="createEnquiry(<?php echo $_GET['id']; ?>)"><b class="w3-text-white"><i class="fa fa-send w3-text-white">&nbsp;</i>Send Request</b></button><br>
                    </form>
                </div>
            </div>

            </div>
        </section>
    </div>














    <script src="./js/jquery.min.js"></script>
    <script src="./js/main.js"></script>
    <script>
    $.get("./php/process.php?viewsingleproperty=true&pid=<?php echo $_GET['id']; ?>", function(data) {
        // console.log(JSON.parse(data));
        result = JSON.parse(data);

        $("#city").html(result.city);
        $("#postal-code").html(result.postal_code);
        $("#country").html(result.country);
        $("#property_title").html(result.property_title);
        $("#property_description").html(result.property_description);
        $("#property_area").html(result.area);
        $("#no_beds").html(result.bedrooms);
        $("#no_floors").html(result.floors);
        $("#no_garages").html(result.garages);
        $("#no_size").html(result.size);
        $("#center_cooling").html(result.center_cooling);
        $("#balcony").html(result.balcony);
        $("#pet_friendly").html(result.pet_friendly);
        $("#barbeque").html(result.barbeque);
        $("#fire_alarm").html(result.fire_alarm);
        $("#modern_kitchen").html(result.modern_kitchen);
        $("#storage").html(result.storage);
        $("#drier").html(result.drier);
        $("#heating").html(result.heating);
        $("#pool").html(result.pool);
        $("#laundry").html(result.laundry);
        $("#gym").html(result.gym);
        $("#sauna").html(result.sauna);
        $("#elevator").html(result.elevator);
        $("#prop_id").html(result.id);
        $("#dish_washer").html(result.dish_washer);
        $("#address").html(result.address);
        $("#p_city").html(result.city);
        $("#p_country").html(result.country);
        $("#p_state").html(result.home_location);
        $("#postal_code").html(result.postal_code);
        $("#featured_image").attr("src", result.featured_image.substr(1));
        $("#gallery_1").attr("src", result.gallery_1.substr(1));
        $("#gallery_2").attr("src", result.gallery_2.substr(1));
        $("#gallery_3").attr("src", result.gallery_3.substr(1));
        $("#gallery_4").attr("src", result.gallery_4.substr(1));
        $("#gallery_5").attr("src", result.gallery_5.substr(1));
        $("#btnfeatured_image").attr("src", result.featured_image.substr(1));
        $("#btngallery_1").attr("src", result.gallery_1.substr(1));
        $("#btngallery_2").attr("src", result.gallery_2.substr(1));
        $("#btngallery_3").attr("src", result.gallery_3.substr(1));
        $("#btngallery_4").attr("src", result.gallery_4.substr(1));
        $("#btngallery_5").attr("src", result.gallery_5.substr(1));
        // $("#gallery_1").html(result.property_title);
        $("#property_title").html(result.property_title);
        $("#property_title").html(result.property_title);

        $("#sale_price").html("KSH " + result["sale/rent_price"]);
    });

    $.get("./php/process.php?viewwhoposted=true&pid=<?php echo $_GET['id']; ?>", function(data){
        result = JSON.parse(data);
        // console.log(result);
        $("#posted_by").html(result.full_name);
        $("#poster_contact").html(result.phone);
        $("#poster_email").html(result.email);
        $("#enq_dest").val(result.email);

        if($("#enq_email").val() == $("#enq_dest").val()){
            $("#enq_message").attr("disabled", "true");
        }

    });


    function currentDiv(n) {
    showDivs(slideIndex = n);
    }

    function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
    }
    x[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " w3-opacity-off";
    }
    </script>
</body>
</html>

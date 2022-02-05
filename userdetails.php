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
    <link rel="stylesheet" href="./css/felabs.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./lib/libr/font-awesome/css/font-awesome.min.css">


    <script src="./js/jquery.min.js"></script>
    <script src="./js/main.js"></script>
    <title>Document</title>
    <style>
        .w3-ul li{
            cursor: pointer;
        }

        th,td{
            border: 1px solid #ccc;
        }
    </style>
</head>

<body onload="setl()">
    <div id="loader" class="w3-animate-fading w3-display-middle">f</div>
    <div style="display: none;" id="mainbody">
        <div class="w3-bar w3-blue topbar w3-top">
            <a class="w3-bar-item logo">Kisumu</a>
            <div class="w3-right">
                <a id="mobile-menu" class="w3-bar-item w3-hide-large w3-hide-medium" onclick="lowermenu()"><i class="fa fa-navicon">&nbsp;</i></a>
            </div>
        </div>

        <!-- mobile menu -->
        <div class="w3-modal" id="mobilemainnav" style="background-color: rgba(0, 0, 0, 0.1);">
            <div class="w3-modal-content w3-round-xlarge">
                <div class="w3-container mobmainnav" id="mobmainnav">
                    <a href="./index.php" class="w3-bar-item"><i class="fa fa-home w3-text-grey">&nbsp;</i>Home</a>
                    <!-- <a href="#" class="w3-bar-item" ><i class="fa fa-navicon w3-text-grey">&nbsp;</i>About</a> -->
                    <a href="./products.php" class="w3-bar-item"><i class="fa fa-building w3-text-grey">&nbsp;</i>Products</a>
                    <a href="./userdetails.php" class="w3-bar-item">Welcome <?php echo $_SESSION['full_name']; ?></a>
                    <button class="w3-button w3-right w3-round w3-blue" onclick="raisemenu()">Close</button>
                    <br>
                    <br>
                </div>
            </div>
        </div><br><br>
        <div class="w3-bar w3-white mainnav w3-hide-small" id="mainnav" style="margin-left: 90px; position: sticky;">
            <a href="./index.php" class="w3-bar-item"><i class="fa fa-home">&nbsp;</i>Home</a>
            <!-- <a href="#" class="w3-bar-item">About Us</a> -->
            <a href="./products.php" class="w3-bar-item"><i class="fa fa-building">&nbsp;</i>Products</a>
            <div class="w3-right" style="margin-right: 200px;">
            <a href="./userdetails.php" class="w3-bar-item"><i class="fa fa-user">&nbsp;</i><?php echo $_SESSION['full_name']; ?></a>
            </div>

        </div>
        <div class="userdetailsheader">
            <br>
            <h3 class="w3-center">User Details</h3>
        </div>
        <section>
            <br>
            <br>
            <div class="w3-row-padding">
                <div class="w3-col m4">
                    <ul class="w3-ul w3-small w3-center w3-border w3-hoverable">
                        <li onclick="showeditname()"><i class="fa w3-text-black fa-edit">&nbsp;</i> Edit Name</li>
                        <li onclick="showeditpassword()"><i class="fa w3-text-black fa-edit">&nbsp;</i>Edit password</li>
                        <li onclick="showMyProperties(<?php echo $_SESSION['userid']; ?>)"><i class="fa w3-text-black fa-building-o">&nbsp;</i>My Properties</li>
                        <li onclick="showReceivedEnquiries(<?php echo $_SESSION['userid']; ?>)"><i class="fa w3-text-black fa-wechat">&nbsp;</i>Received Enquiries</li>
                        <li onclick="showSentEnquiries(<?php echo $_SESSION['userid']; ?>)"><i class="fa w3-text-black fa-send-o">&nbsp;</i>Sent Enquiries</li>
                        <li onclick="window.location.href='./logout.php'"><i class="fa w3-text-black fa-sign-out">&nbsp;</i>Log Out</li>
                    </ul>
                </div>
                <div class="w3-col m8 w3-padding">
                    <form id="edituserdetails">
                        <!-- Dynamic content -->
                        <h4 class="w3-center" id="h4clicktoedit">Click to edit...</h4>
                        <div id="editusernamedata" style="display:none;">
                            <input class="w3-input" placeholder="Enter New Username" name="txteditusername" id="txteditusername">
                            <br>
                            <button type="button" class="w3-button w3-block w3-round w3-purple" onclick="editusername()">Edit and save</button>
                        </div>

                        <div id="edituserpassworddata" style="display:none;">
                            <input class="w3-input" placeholder="Enter old password" name="txtedituseroldpassword" id="txtedituseroldpassword">
                            <br>
                            <input class="w3-input" placeholder="Enter new password" name="txteditusernewpassword" id="txteditusernewpassword"><br>
                            <button type="button" class="w3-button w3-block w3-round w3-purple" onclick="edituserpassword()">Edit and save</button>
                        </div>
                    </form>
                    <div id="userdatadisplay" style="display:none">
                    <h3>Now What</h3>
                    </div>
                </div>
            </div>
        </section>

        <div class="w3-modal " id="receivedenqmodal" style="background-color: transparent;">
            <div class="w3-modal-content w3-round-large w3-card-4">
                <div class="w3-padding">
                    <span class="w3-right" onclick="document.getElementById('receivedenqmodal').style.display='none'">&times;</span>
                    <h4>Enquiry Detail</h4><hr>
                </div>
                <div class="w3-container">
                    <table class="w3-table w3-bordered">
                        <tr>
                            <th>Full Name</th>
                            <td id='e_full_name'>John Doe</td>
                        </tr>
                        <tr>
                            <th>Property Title</th>
                            <td id='e_title'>John Doe</td>
                        </tr>
                        <tr>
                            <th>email</th>
                            <td id='e_email'>John Doe</td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td id='e_phone'>John Doe</td>
                        </tr>
                        <tr>
                            <th>Message</th>
                            <td id='e_message'>John Doe</td>
                        </tr>
                        <tr>
                            <th>Enquiry Date</th>
                            <td id='e_enq_date'>John Doe</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td id='e_status'>John Doe</td>
                        </tr>
                    </table>
                    <br>
                    <table class="w3-table w3-bordered" id="remarktable">
                        <form id="remarks">
                        <tr>
                            <th>Remark</th>
                            <td>
                            <input type="hidden" name="enquiryId" id="enquiryId">
                            <textarea name="remarkmessage" class="w3-input w3-border w3-round" id="remarkmessage" cols="30" rows="10"></textarea>
                            </td>
                        </tr>
                        <tr>
                        <td>&nbsp;</td>
                        <td>
                        <button class="w3-button w3-blue" type="button" onclick="postRemark()">Save Remark</button>
                        </td>
                        </tr>
                        </form>
                    </table>

                    <table class="w3-table w3-bordered" id="savedremarkcontainer">
                    <tr>
                        <th>Remark</th>
                        <td id="savedremarkmessage"></td>
                    </tr>
                    <tr>
                        <th>Date Replied</th>
                        <td id="savedremarkdate"></td>
                    </tr>
                    </table>
                    <br>
                </div>

            </div>
        </div>
    </div>


    
</body>
</html>
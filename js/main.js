function setl() {
    setTimeout(showPage, 2000);
}

function showPage() {
    $("#loader").css("display", "none");
    $("#mainbody").css("display", "block");
}

function lowermenu() {
    $("#mobilemainnav").slideToggle();
}

function raisemenu() {
    $("#mobilemainnav").slideToggle();
}

function openModal(id) {
    $("#" + id).css("display", "block");
}


function signUp() {
    var form = $("#usersignup");
    var fname = $("#firstname");
    var lname = $("#lastname");
    var email = $("#email");
    var phone = $("#phone");
    var pass = $("#password");
    var confpass = $("#confirm_password");
    var status;

    if (fname.val() == "") {
        fname.addClass("w3-border-red w3-animate-zoom");
        fname[0].placeholder = 'please enter first name';
        status = false;
    }

    if (lname.val() == "") {
        lname.addClass('w3-border-red w3-animate-zoom');
        lname[0].placeholder = 'please enter last name';
        status = false
    }

    if (email.val() == "") {
        email.addClass("w3-border-red w3-animate-zoom");
        email[0].placeholder = 'please enter email';
        status = false;
    }

    if (phone.val() == "") {
        phone.addClass("w3-border-red w3-animate-zoom");
        phone[0].placeholder = 'please enter phone';
        status = false;
    }

    if (pass.val() == "") {
        pass.addClass("w3-border-red w3-animate-zoom");
        pass[0].placeholder = 'please enter your password';
        status = false;
    }

    if (confpass.val() == "") {
        confpass.addClass("w3-border-red");
        confpass[0].placeholder = "please confirm password";
        status = false;
    } else if (confpass.val() !== pass.val()) {
        confpass.addClass("w3-border-red");
        confpass.val("");
        confpass[0].placeholder = "please enter matchning  password";
        status = false;
    }

    if (status !== false) {
        var request = new XMLHttpRequest();
        request.open('POST', './php/process.php?action=registeruser');
        request.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                if (this.responseText == "phone_exists") {
                    phone.addClass('w3-border-red w3-animate-zoom');
                    phone.val("");
                    phone[0].placeholder = 'This Phone Number Exists';
                } else if (this.responseText == "email_exists") {
                    email.addClass('w3-border-red w3-animate-zoom');
                    email.val();
                    email[0].placeholder = "This email allready exists";
                } else {
                    alert('registered successfully, try logging in');
                    window.location.href = './visitor.php';
                }
            }
        }
        var formdata = new FormData(form[0]);
        request.send(formdata);
    }

}

function signin() {
    username = $('#loginusername');
    password = $('#loginuserpassword');
    var status;

    if (username.val() == "") {
        username.addClass('w3-border-red w3-animate-zoom');
        username[0].placeholder = 'Please enter email or phone';
        status = false;
    }

    if (password.val() == "") {
        password.addClass('w3-border-red w3-animate-zoom');
        password[0].placeholder = 'Please enter password';
        status = false;
    }

    if (status !== false) {
        var request = new XMLHttpRequest();
        request.open("POST", "./php/process.php?action=loginuser");
        request.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var result = this.responseText;
                if (result == "invalid_username") {
                    username.val("");
                    username.addClass('w3-border-red w3-animate-zoom')
                    username[0].placeholder = 'username is not registered';
                } else if (result == "INCORRECT_PASS") {
                    password.val("");
                    password.addClass('w3-border-red w3-animate-zoom');
                    password[0].placeholder = "Your password is incorrect";
                } else {
                    window.location.href = './index.php';
                }
            }

            if (this.status == 503) {
                alert('there was an error please try again');
            }
        }
        var form = $("#frmlogin");
        var formdata = new FormData(form[0]);
        request.send(formdata);
    }


}

function showeditname() {
    $("#editusernamedata").css("display", "block");
    $("#h4clicktoedit").hide();
    $("#edituserpassworddata").hide();
    $("#userdatadisplay").hide();
    window.location.href = "#editusernamedata";
}

function showeditpassword() {
    $("#editusernamedata").css("display", "none");
    $("#h4clicktoedit").hide();
    $("#edituserpassworddata").show();
    $("#userdatadisplay").hide();
    window.location.href = "#edituserpassworddata"
}

function showuserchatmodules() {
    $("#userchatmodules").slideToggle();
}

function editusername() {
    var status;
    var username = $("#txteditusername");
    if ($("#txteditusername").val() == "") {
        $("#txteditusername").addClass("w3-border-red w3-animate-zoom");
        $("#txteditusername")[0].placeholder = "enter the username to update";
        status = false;
    }

    if (status !== false) {
        var request = new XMLHttpRequest();
        request.open("POST", "./php/process.php?action=editusername");
        request.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                window.location.href = './userdetails.php';
                alert('Edit Successful');
            }
        }
        var form = $("#edituserdetails")[0];
        var formdata = new FormData(form);
        request.send(formdata);
    }
}

function edituserpassword() {
    var old_pass = $("#txtedituseroldpassword"),
        new_pass = $("#txteditusernewpassword"),
        status;

    if (old_pass.val() == "") {
        old_pass.addClass("w3-border-red w3-animate-zoom");
        old_pass[0].placeholder = "please write old password";
        status = false;
    }

    if (new_pass.val() == "") {
        new_pass.addClass("w3-border-red w3-animate-zoom");
        new_pass[0].placeholder = "Write the new password you intend to change";
        status = false;
    }

    if (status !== false) {
        var request = new XMLHttpRequest();
        request.open("POST", "./php/process.php?action=edituserpassword");
        request.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                result = this.responseText;
                console.log(this.responseText);
                if (result == "1") {
                    window.location.href = './userdetails.php';
                    alert('Edit Successful');
                } else {
                    old_pass.val("");
                    old_pass.addClass('w3-border-red w3-animate-zoom');
                    old_pass[0].placeholder = "Your old password is incorrect";
                }
            }
        }
        var form = $("#edituserdetails")[0];
        var formdata = new FormData(form);
        request.send(formdata);
    }


}

$.get("./php/process.php?viewproperty=true", function(data) {
    $("#datadisplay").html(data);
});

function get_all_reviews(pid) {
    pid = $("#prop_id").html();
    // console.log(pid);
    $.get("./php/process.php?prop_review_id=" + pid, function(data) {
        $("#property_review_box").html(data);
    });
}

setInterval(get_all_reviews, 2000);

function post_review(productId) {
    var message = $("#review_message");
    if (message.val() == "") {
        message.addClass("w3-border-red");
        alert('You can not send a blank review');
    } else {
        var request = new XMLHttpRequest();
        request.open('POST', './php/process.php?insert_review=true&prod_rev_id=' + productId);
        request.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                result = this.responseText;
                if (result == "1") {
                    message.val("");
                    alert('review successfully updated');
                }
            }
        }
        var form = $("#leave_review");
        var formdata = new FormData(form[0]);
        request.send(formdata);
    }


}

function count_no_reviews() {
    pid = $("#prop_id").html();
    $.get("./php/process.php?view_no_review=" + pid, function(data) {
        $("#review_numbers").html(data);
    })
}

setInterval(count_no_reviews, 2000);

function showMyProperties(accountId) {
    $("#userdatadisplay").show();
    $("#h4clicktoedit").hide();
    $("#edituserpassworddata").hide();
    $("#editusernamedata").css("display", "none");

    $.get("./php/process.php?showmyproperties=" + accountId, function(data) {
        $("#userdatadisplay").html(data);
    })
}


function createEnquiry(enqPropertyId) {
    var name = $("#enq_name"),
        email = $("#enq_email"),
        phone = $("#enq_phone"),
        message = $("#enq_message"),
        submit;

    if (name.val() == "") {
        name.addClass("w3-border-red");
        name[0].placeholder = "please enter your name";
        submit = false;
    }

    if (email.val() == "") {
        email.addClass("w3-border-red");
        email[0].placeholder = "please enter your email";
        submit = false;
    }

    if (phone.val() == "") {
        phone.addClass("w3-border-red");
        phone[0].placeholder = "please enter your contact";
        submit = false;
    }

    if (message.val() == "") {
        message.addClass("w3-border-red");
        message[0].placeholder = "please enter your message";
        submit = false;
    }

    if ($("#enq_message")[0].disabled == true) {
        message.addClass("w3-border-red");
        message[0].placeholder = "You are not allowed to send a message to yourself";
        alert("You are not allowed to send a message to yourself");
        submit = false;
    }


    if (submit !== false) {
        var request = new XMLHttpRequest();
        request.open("POST", "./php/process.php?action=make_enquiry&enqPropertyId=" + enqPropertyId);
        request.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                result = this.responseText;
                if (result == 1) {
                    alert('Enquiry Sent Successfully');
                    message.val("");
                }
            }
        }
        var form = $("#enq_creation");
        var formdata = new FormData(form[0]);
        request.send(formdata);
    }
}

function showReceivedEnquiries(receivedforuserid) {
    $("#userdatadisplay").show();
    $("#h4clicktoedit").hide();
    $("#edituserpassworddata").hide();
    $("#editusernamedata").css("display", "none");

    $.get("./php/process.php?receivedforuserid=" + receivedforuserid, function(data) {
        $("#userdatadisplay").html(data);
    })
}



function viewSingleEnquiry(id) {
    $("#receivedenqmodal").slideDown();
    // document.getElementById("receivedenqmodal").style.display = "block";
    // alert('coming');
    $.get("./php/process.php?viewSingleEnquiry=" + id, function(data) {
        result = JSON.parse(data);
        $("#e_full_name").html(result.full_name);
        $("#e_title").html(result.property_id);
        $("#e_email").html(result.account_id);
        $("#e_phone").html(result.phone);
        $("#e_message").html(result.message);
        $("#e_enq_date").html(result.enquiry_date);
        $("#e_status").html(result.status);
        $("#enquiryId").val(result.id);
        $("#savedremarkmessage").html(result.remark);
        $("#savedremarkdate").html(result.remark_date);

        if (result.status == "answered") {
            $("#remarktable").hide();
            $("#savedremarkcontainer").show();
        } else {
            $("#remarktable").show();
            $("#savedremarkcontainer").hide();
        }
    });
}

function postRemark() {
    $("#remarkmessage").val() == "";
    if ($("#remarkmessage").val() == "") {
        alert('please write something before you send');
    } else {
        var request = new XMLHttpRequest();
        request.open("POST", "./php/process.php?action=updateenquiry");
        request.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                result = this.responseText;
                if (result == "1") {
                    $("#remarktable").hide();
                    $("#savedremarkcontainer").show();
                    $("#savedremarkmessage").html($("#remarkmessage").val());
                    $("#savedremarkdate").html(new Date());
                }
            }
        }
        var form = $("#remarks");
        var formdata = new FormData(form[0]);
        request.send(formdata);
    }
}

function viewOnlyApartments() {
    // alert('apartments');
    $.get('./php/process.php?viewOnlyApartments=Apartments', function(data) {
        $("#datadisplay").html(data);
    })
}

function viewOnlyOnSale() {
    // alert('on sale')
    $.get('./php/process.php?viewOnlyOnSale=sale', function(data) {
        $("#datadisplay").html(data);
    })
}

function viewOnlyHouses() {
    $.get('./php/process.php?viewOnlyHouses=Houses', function(data) {
        $("#datadisplay").html(data);
    })
}

function viewOnlyOffices() {
    // alert(' offices');
    $.get('./php/process.php?viewOnlyOffices=Offices', function(data) {
        $("#datadisplay").html(data);
    })
}

function viewOnlyVillas() {
    // alert(' villas');
    $.get('./php/process.php?viewOnlyVillas=Villas', function(data) {
        $("#datadisplay").html(data);
    })
}

function viewOnlyRental() {
    // alert('rental');
    $.get('./php/process.php?viewOnlyRental=Rent', function(data) {
        $("#datadisplay").html(data);
    })
}

function showSentEnquiries(id) {
    $("#userdatadisplay").show();
    $("#h4clicktoedit").hide();
    $("#edituserpassworddata").hide();
    $("#editusernamedata").css("display", "none");

    $.get("./php/process.php?sentforuserid=" + id, function(data) {
        $("#userdatadisplay").html(data);
    })
}

function markAsTaken(id, owner) {
    // alert(id);
    $.get("./php/process.php?markastaken=" + id, function(data) {
        if (data == "1") {
            alert('Property allocated successfully');
            showMyProperties(owner);
            console.log(owner);
        }
    })
}


function searchProperties() {
    var input = $("#search");

    $.get('./php/process.php?q=' + input.val(), function(data) {
        console.log(data);
    })
}
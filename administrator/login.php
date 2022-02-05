<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../lib/libr/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="../css/felabs.css">
    <link rel="stylesheet" href="./style.css">
    <style>
        h1 {
            margin-top: 200px;
            font-weight: 600;
            color: rgb(51, 49, 49);
        }
    </style>
    <title>Document</title>

    <script src="../js/jquery.min.js"></script>

</head>

<body bgcolor="#f2f9fe">
    <div class="w3-row-padding">
        <div class="w3-col m8">
            <h1>Admin Login Kisumu County</h1>
        </div>
        <div class="w3-col m4"><br><br><br><br>
            <form id="frmlogin" class="w3-padding w3-white w3-round">
                <h3>Login Admin</h3>
                <input type="text" class="w3-input" placeholder="Username Or Phone Number" id="loginusername" name="loginusername"><br>
                <input type="Password" class="w3-input" placeholder="Password" name="loginuserpassword" id="loginuserpassword"><br>
                <button class="w3-border w3-button w3-block w3-blue w3-round-xlarge" type="button" onclick="signin()">Sign In</button><br>
            </form>
        </div>
    </div>

    <script>
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

            // if (status !== false) {
            //     $.ajax({
            //         url: "../php/process.php?action=loginuser",
            //         method: "POST",
            //         data: $("#frmlogin").serialize(),
            //         success: function(data) {
            //             console.log(data);
            //         }
            //     })
            // }

            if (status !== false) {
                var request = new XMLHttpRequest();
                request.open("POST", "../php/process.php?action=loginuser");
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
    </script>

</body>

</html>
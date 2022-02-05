<?php
session_start();
if(!isset($_SESSION['email']) && $_SESSION['email'] !== true){
    header("location: ./login.php");
}else{
    if($_SESSION['usertype'] !== 'admin'){
        header("location: ./login.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <link rel="stylesheet" href="../lib/libr/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="../css/felabs.css">
    <link rel="stylesheet" href="./style.css">
    <script src="../lib/chart.js-2.9.4/package/dist/Chart.min.js"></script>
    <title>Document</title>
    <style>
    .w3-bar-item {
        padding: 12px;
        color: #eee;
        cursor: pointer;
        display: block;
        text-decoration: none;
    }

    .w3-bar-item:hover {
        font-weight: 600;
    }

    th,
    td {
        border: 1px solid #ccc;
    }

    .w3-col{
        margin-bottom: 10px;
    }

    #main {
        margin-left: 20%;
    }

    @media(max-width: 600px) {
        #main {
            margin-left: 0px;
        }
    }

    .w3-quarter .w3-card-4 {
        margin-bottom: 12px;
    }
    </style>
</head>

<body bgcolor="#f2f9fe">
    <div class="w3-sidebar w3-hide-small w3-metro-blue" style="width: 20%">
        <div class="w3-container w3-center w3-padding"><br>
            <span class="" style="font-weight: 600; font-size: 17px;">ADMIN REAL ESTATE</span>
            <hr style="border-color: #eee; border-width: 1px;">

        </div>
        <div class="w3-container">
            <a class="w3-bar-item" href="#">
                <i class="fa fa-dashboard w3-text-white">&nbsp;</i><small>Dashboard</small>

            </a>
            <a class="w3-bar-item" href="#dvprop">
                <i class="fa fa-building w3-text-white">&nbsp;</i><small>Property</small>
                <hr style="border-color: #eee; border-width: 1px;">

            </a>
            <a class="w3-bar-item" href="#dvowners">
                <i class="fa fa-user-plus w3-text-white">&nbsp;</i><small>Owners</small>

            </a>
            <a class="w3-bar-item" href="#dvagents">
                <i class="fa fa-user-circle w3-text-white">&nbsp;</i><small>Agents</small>


            </a>
            <a class="w3-bar-item" href="logout.php">
                <i class="fa fa-sign-out w3-text-white">&nbsp;</i><small>Log Out</small>


            </a>
            <!-- <div class="w3-bar-item">
                <small>Reports</small>
                <hr style="border-color: #eee; border-width: 1px;">

            </div> -->
        </div>
    </div>
    <div id="main">
        <div class="w3-bar w3-card-4 w3-padding-large w3-white">
            <span class="w3-large"><b>DASHBOARD</b></span>
            <div class="w3-right w3-hide-medium w3-hide-large">
                <a href="" class="w3-bar-item"><i class="fa w3-text-grey fa-navicon "></i></a>
            </div>
        </div>
        <br>
        <br>
        <div class="w3-row-padding">
            <div class="w3-col m6 l3">
                <div class="w3-card-4 w3-white w3-border-blue w3-round-large"
                    style="border-left: 4px solid #2196f3; height: 100px;">
                    <br>
                    <span class="w3-small w3-padding" style="font-weight: 600;">TOTAL PROPERTY WORTH</span><br><span
                        style="margin-top: -23px;" class="w3-right fa fa-3x w3-padding w3-text-blue fa-money"></span>
                    <span class="w3-large w3-padding" id="totalPworth"></span>
                </div>
            </div>
            <div class="w3-col m6 l3">
                <div class="w3-card-4 w3-white w3-round-large" style="border-left: 4px solid #00a300; height: 100px;">
                    <br>
                    <span class="w3-small w3-padding" style="font-weight: 600;">TOTAL OWNERS</span><br><span
                        style="margin-top: -23px;"
                        class="w3-right fa fa-3x w3-padding w3-text-green fa-user-plus"></span>
                    <span class="w3-large w3-padding" id="totalOwners"></span>
                </div>
            </div>
            <div class="w3-col m6 l3">
                <div class="w3-card-4 w3-white w3-round-large" style="border-left: 4px solid #00aba9; height: 100px;">
                    <br>
                    <span class="w3-small w3-padding" style="font-weight: 600;">TOTAL USERS</span><br><span
                        style="margin-top: -23px;" class="w3-right fa fa-3x w3-padding w3-text-teal fa-users"></span>
                    <span class="w3-large w3-padding" id="totalUsers"></span>
                </div>
            </div>
            <div class="w3-col m6 l3">
                <div class="w3-card-4 w3-white w3-round-large" style="border-left: 4px solid #6c00ab; height: 100px;">
                    <br>
                    <span class="w3-small w3-padding" style="font-weight: 600;">REVIEWS</span><br><span
                        style="margin-top: -23px;" class="w3-right fa fa-3x w3-padding w3-text-purple fa-wechat"></span>
                    <span class="w3-large w3-padding" id="totalReviews">21</span>
                </div>
            </div>
        </div><br><br>
        <div class="w3-row-padding">
            <div class="w3-col m8">
                <div class="w3-card-4 w3-white w3-round-large" style="min-height: 300px;">
                    <div class="w3-border-bottom w3-padding"
                        style="background-color: #afc5f88f; border-radius: 10px 10px 0px 0px;">
                        <span class=""><b>Property Types</b></span>
                    </div>
                    <canvas id="myChart" class="w3-image">

                    </canvas>

                </div>
            </div>
            <div class="w3-col m4">
                <div class="w3-card-4 w3-white w3-round-large" style="min-height: 350px;">
                    <div class="w3-border-bottom w3-padding"
                        style="background-color: #afc5f88f; border-radius: 10px 10px 0px 0px;">
                        <span class=""><b>STatus Chart</b></span>
                    </div><br><br>
                    <canvas id="myChart2" style="width: 100%">

                    </canvas>

                </div>
            </div>
        </div>
        <br><br>
        <div class="w3-row-padding" id="dvprop">
            <div class="w3-col m12">
                <div class="w3-card-4 w3-white w3-round-large" style="min-height: 400px;">
                    <div class="w3-border-bottom w3-padding"
                        style="background-color: #afc5f88f; border-radius: 10px 10px 0px 0px;">
                        <span class=""><b>Properties</b></span>
                        <div class="w3-right">
                            <input type="text" id="propertiesdt" class="w3-input w3-border w3-round w3-right"
                                placeholder="search">

                        </div><br>
                    </div><br><br>
                    <div id="propertiesdata" class="w3-padding" style="overflow-y: auto;">

                    </div>
                </div>
            </div>
        </div><br><br>
        <div class="w3-row-padding" id="dvowners">
            <div class="w3-col m12">
                <div class="w3-card-4 w3-white w3-round-large" style="min-height: 400px;">
                    <div class="w3-border-bottom w3-padding"
                        style="background-color: #afc5f88f; border-radius: 10px 10px 0px 0px;">
                        <span class=""><b>Owners</b></span>
                        <div class="w3-right">
                            <input type="text" id="ownersdt" class="w3-input w3-border w3-round w3-right"
                                placeholder="search">

                        </div><br>
                    </div><br><br>
                    <div id="ownersData" class="w3-padding" style="overflow-y: auto;">

                    </div>
                </div>
            </div>
        </div><br><br>
        <div class="w3-row-padding" id="dvagents">
            <div class="w3-col m12">
                <div class="w3-card-4 w3-white w3-round-large" style="min-height: 400px;">
                    <div class="w3-border-bottom w3-padding"
                        style="background-color: #afc5f88f; border-radius: 10px 10px 0px 0px;">
                        <span class=""><b>Brokers</b></span>
                        <div class="w3-right">
                            <input type="text" id="brokersdt" class="w3-input w3-border w3-round w3-right"
                                placeholder="search">

                        </div><br>
                    </div><br><br>
                    <div id="agentsData" class="w3-padding" style="overflow-y: auto;">

                    </div>
                </div>
            </div>
        </div>
        <br><br>

        <!-- <div class="w3-row-padding">
            <div class="w3-col m6">
                <div class="w3-card-4 w3-white w3-round-large" style="min-height: 200px;">
                    <div class="w3-border-bottom w3-padding" style="background-color: #afc5f88f; border-radius: 10px 10px 0px 0px;">
                        <span class=""><b>Cities</b></span>
                        <div class="w3-right">
                            <input type="text" class="w3-input w3-border w3-round w3-right" placeholder="search">

                        </div><br>
                    </div><br>
                    <div id="citiesData" class="w3-padding" style="overflow-y: auto; height: 130px;">

                    </div>
                </div>
            </div>
            <div class="w3-col m6">
                <div class="w3-card-4 w3-white w3-round-large" style="min-height: 200px;">
                    <div class="w3-border-bottom w3-padding" style="background-color: #afc5f88f; border-radius: 10px 10px 0px 0px;">
                        <span class=""><b>Location</b></span>
                        <div class="w3-right">
                            <input type="text" class="w3-input w3-border w3-round w3-right" placeholder="search">

                        </div><br>
                    </div><br><br>
                    <div id="locationData" class="w3-padding" style="overflow-y: auto;">

                    </div>
                </div>
            </div>
        </div>
        <br> -->
        <!-- <div class="w3-row-padding">
            <div class="w3-col m6">
                <div class="w3-card-4 w3-white w3-round-large" style="min-height: 200px;">
                    <div class="w3-border-bottom w3-padding" style="background-color: #afc5f88f; border-radius: 10px 10px 0px 0px;">
                        <span class=""><b>New City</b></span>
                    </div>
                    <form class="w3-container" id="frmAddCity">
                        <label for="">City Name</label>
                        <input type="text" id="cityName" name="cityName" class="w3-input w3-border w3-round">
                        <label for="">Postal Code</label>
                        <input type="text" id="postalCode" name="postalCode" class="w3-input w3-border w3-round">
                        <label for="">Address</label>
                        <input type="text" id="cityAddress" name="cityAddress" class="w3-input w3-border w3-round"><br>
                        <button class="w3-button w3-round w3-blue w3-block" type="button" onclick="saveCity()">Save City</button><br>
                    </form>
                </div>
            </div>

            <div class="w3-col m6">
                <div class="w3-card-4 w3-white w3-round-large" style="min-height: 200px;">
                    <div class="w3-border-bottom w3-padding" style="background-color: #afc5f88f; border-radius: 10px 10px 0px 0px;">
                        <span class=""><b>New Location</b></span>
                    </div>
                    <form class="w3-container">
                        <label for="">Location Name</label>
                        <input type="text" class="w3-input w3-border w3-round">
                        <label for="">City Ref</label>
                        <select type="text" class="w3-select w3-border w3-round" onfocus="getSelectCities()">
                            <option value="" selected disabled>select city</option>
                        </select>
                        <br><br>
                        <button class="w3-button w3-round w3-blue w3-block">Save City</button><br>
                    </form>
                </div>
            </div>
        </div> -->
        <div class="w3-modal" id="singlepropmodal">
            <div class="w3-modal-content w3-round-large">
                <div class="w3-padding w3-round-large">
                    <span class="w3-large">Property</span><span class="w3-right"
                        onclick="$('#singlepropmodal').hide()">&times;</span>
                </div>
                <div class="w3-container" id="singleAdminPropertyData"></div>
            </div>
        </div>
        <script src="../js/jquery.min.js"></script>
        <script>
        $("#propertiesdt").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#tblproperties tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $("#ownersdt").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#tblowners tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $("#brokersdt").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#tblbrokers tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        var dlabel = [];
        var dvalues = [];
        var dlabel2 = [];
        var dvalues2 = [];

        var getJSON = function() {
            $.get('../php/process.php?viewapartmenttype=true', function(data) {
                result = JSON.parse(data);
                // console.log();

                for (var i in result) {
                    dlabel.push(result[i].type);
                    dvalues.push(result[i]['count(type)']);
                }
            })
        }

        getJSON();



        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dlabel,
                datasets: [{
                    label: 'Property Types Count',
                    data: dvalues,
                    backgroundColor: [
                        // 'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        // 'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


        var getJSON2 = function() {
            $.get('../php/process.php?viewapartmentstatus=true', function(data) {
                result = JSON.parse(data);
                console.log(result);

                for (var i in result) {
                    dlabel2.push(result[i].status);
                    dvalues2.push(result[i]['count(status)']);
                }
            })
        }

        getJSON2();

        var ctx2 = document.getElementById('myChart2').getContext('2d');
        var myChart2 = new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: dlabel2,
                datasets: [{
                    label: 'status',
                    data: dvalues2,
                    backgroundColor: [
                        'rgba(255, 99, 132,1)',
                        'rgba(54, 162, 235,1)'
                    ],
                    // borderColor: [
                    //     'rgba(255, 99, 132, 1)',
                    //     'rgba(54, 162, 235, 1)',
                    //     'rgba(255, 206, 86, 1)',
                    //     'rgba(75, 192, 192, 1)',
                    //     'rgba(153, 102, 255, 1)',
                    //     'rgba(255, 159, 64, 1)'
                    // ],
                    // borderWidth: 0
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // storekeeper data ma
        // library relationship remind automatically
        // administration
        // role call

        setInterval(() => {
            $.get("../php/process.php?allproperties=true", function(data) {
                $("#propertiesdata").html(data);
                // console.log(data);
            })

        }, 2000);


        setInterval(() => {
            $.get("../php/process.php?ownersData=true", function(data) {
                $("#ownersData").html(data);
                // console.log(data);
            })
        }, 2000);


        setInterval(() => {
            $.get("../php/process.php?agentsData=true", function(data) {
                $("#agentsData").html(data);
                // console.log(data);
            })
        }, 2000);


        // $(document).ready(function() {
        //     alert('cool');
        // })

        function totalPworth() {
            $.get("../php/process.php?totalPworth=true", function(data) {
                $("#totalPworth").html(data);
                // console.log(data);
            })
        }

        setInterval(totalPworth, 2000);

        function totalOwners() {
            $.get("../php/process.php?totalOwners=true", function(data) {
                $("#totalOwners").html(data);
                // console.log(data);
            })
        }

        setInterval(totalOwners, 2000);

        function totalUsers() {
            $.get("../php/process.php?totalUsers=true", function(data) {
                $("#totalUsers").html(data);
                // console.log(data);
            })
        }

        setInterval(totalUsers, 2000);

        function totalReviews() {
            $.get("../php/process.php?totalReviews=true", function(data) {
                $("#totalReviews").html(data);
                // console.log(data);
            })
        }

        setInterval(totalReviews, 2000);

        function citiesData() {
            $.get("../php/process.php?citiesData=true", function(data) {
                $("#citiesData").html(data);
                // console.log(data);
            })
        }

        setInterval(citiesData, 2000);

        function saveCity() {
            // alert('helo world');
            var cityName = $("#cityName"),
                postalCode = $("#postalCode"),
                cityAddress = $("#cityAddress");

            if (cityName.val() == "" || postalCode.val == "" || cityAddress.val() == "") {
                alert("please fill in all the data")
            } else {
                $.ajax({
                    url: "../php/process.php?addCity=true",
                    method: "POST",
                    data: $("#frmAddCity").serialize(),
                    success: function(data) {
                        alert(data);
                        cityName.val("");
                        postalCode.val("");
                        cityAddress.val("");
                    }
                })
            }
        }

        function viewAdminProperty(id) {
            // alert(id);
            $("#singlepropmodal").show();
            $.get('../php/process.php?singleAdminPropertyData=' + id, function(data) {
                $("#singleAdminPropertyData").html(data);
            })
        }
        </script>
</body>

</html>
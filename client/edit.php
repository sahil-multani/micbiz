<?php require_once "../session.php";?>
<!doctype html>
<html lang="en">

<head>
    <style>
        .checkpwd,
        .error,
        .chpwd {
            width: 100%;
            margin-top: .25rem;
            font-size: 80%;
            color: #dc3545
        }
    </style>
    <div id="inj">
            <?php require_once '../req/css.php';?>
    </div>

</head>

<body class="sidebar-main-active right-column-fixed hide">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <?php require_once '../assets/nav/top.php';
        require_once '../assets/nav/sidebar.php';
    ?>
    <div class="wrapper">
        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="iq-card">
                            <div class="iq-card-body p-0">
                                <div class="iq-edit-list">
                                    <ul class="iq-edit-profile d-flex nav nav-pills">
                                        <li class="col-md-3 p-0">
                                            <a class="nav-link active" data-toggle="pill" href="#personal-information">
                                                Personal Information
                                            </a>
                                        </li>
                                        <li class="col-md-3 p-0">
                                            <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                                                Change Password
                                            </a>
                                        </li>
                                        <li class="col-md-3 p-0">
                                            <a class="nav-link" data-toggle="pill" href="#emailandsms">
                                                Social Media
                                            </a>
                                        </li>
                                        <li class="col-md-3 p-0">
                                            <a class="nav-link" data-toggle="pill" href="#manage-contact">
                                                Manage Contact
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="iq-edit-list-data">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                                    <div class="iq-card">
                                        <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Personal Information</h4>
                                            </div>
                                        </div>
                                        <div class="iq-card-body">
                                            <form class="needs-validation mt-4" novalidate method="POST" name="addUser"
                                                enctype="multipart/form-data">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-md-12">
                                                        <center>
                                                            <div class="profile-img-edit">
                                                                <img class="profile-pic" src="<?=$img?>"
                                                                    alt="profile-pic">
                                                                <div class="p-image">
                                                                    <i class="ri-pencil-line upload-button"></i>
                                                                    <input class="file-upload" type="file"
                                                                        name="image" />
                                                                </div>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>

                                                <div class=" row align-items-center mb-4">
                                                    <div class="form-group col-sm-12">
                                                        <label for="uname">User Name:</label>
                                                        <input type="text" class="form-control" id="uname"
                                                            value="<?=$_SESSION['data']['uname'];?>" name="uname">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="fname">First Name:</label>
                                                        <input type="text" class="form-control" id="fname" value="<?=$_SESSION['data']['fname'];?>"
                                                            required name="fn">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="lname">Last Name:</label>
                                                        <input type="text" class="form-control" id="lname" value="<?=$_SESSION['data']['lname'];?>"
                                                            name="ln">
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-primary mr-2"
                                                    name="pi">Submit</button>
                                                    <div class="e1 error"></div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                                    <div class="iq-card">
                                        <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Change Password</h4>
                                            </div>
                                        </div>
                                        <div class="iq-card-body">

                                            <form method="POST" name="chpwd" >
                                                <div class="form-group">
                                                    <label for="cpass">Current Password:</label>

                                                    <input type="Password" class="form-control " id="cpass" name="cpass" value=""
                                                        name="cpass" >
                                                    <div class="chpwd">Invalid Password </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="npass">New Password:</label>
                                                    <input type="Password" class="form-control pwd" id="npass" value=""
                                                        name="npass" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="vpass">Verify Password:</label>
                                                    <input type="Password" class="form-control pwd" id="vpass" value="" >
                                                    <div class="checkpwd">Passowrds are not matching !</div>
                                                </div>
                                                <button type="submit" class="btn  dosub btn-primary mr-2"
                                                    name="cp">Submit</button><a href="javascripe:void();" class="float-right">Forgot Password ?</a>
                                                    <div class="error e2"></div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="emailandsms" role="tabpanel">
                                    <div class="iq-card">
                                        <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Social Media</h4>
                                            </div>
                                        </div>
                                        <div class="iq-card-body">
                                            <div class="acc-edit">
                                            <form method="POST" name="socialicons" >
                                                    <div class="form-group">
                                                        <label for="facebook">Facebook:</label>
                                                        <input type="text" class="form-control" id="facebook"
                                                            value="<?=$_SESSION['data']['fb'] != null ? $_SESSION['data']['fb'] : 'www.facebook.com';?>" name="fb">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="twitter">Twitter:</label>
                                                        <input type="text" class="form-control" id="twitter"
                                                            value="<?=$_SESSION['data']['fb'] != null ? $_SESSION['data']['tw'] : 'www.twitter.com';?>" name="tw">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="instagram">Instagram:</label>
                                                        <input type="text" class="form-control" id="instagram"
                                                            value="<?=$_SESSION['data']['fb'] != null ? $_SESSION['data']['fb'] : 'www.instagram.com';?>" name="ig">
                                                    </div>

                                                    <button type="submit" class="btn btn-primary" name="social">Submit</button>
                                                    <div class="error e3"></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="manage-contact" role="tabpanel">
                                    <div class="iq-card">
                                        <div class="iq-card-header d-flex justify-content-between">
                                            <div class="iq-header-title">
                                                <h4 class="card-title">Manage Contact</h4>
                                            </div>
                                        </div>
                                        <div class="iq-card-body">
                                            <form method="post">

                                                <div class="form-group">
                                                    <label for="email">Email:</label>
                                                    <input type="text" class="form-control" id="email"
                                                        value="<?=$_SESSION['data']['mail'];?>" name="mail">
                                                </div>

                                                <button type="submit" class="btn btn-primary mr-2" name="contact">Submit</button>
                                                <div class="error e4"></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="log"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $js = '../';
    require_once '../req/js.php';?>
</body>
<script>
    $(".dosub").prop("disabled", true)
    $(".pwd").on("keyup", function() {
        let val1 = document.getElementById("npass").value;
        let val2 = document.getElementById("vpass").value;
        //console.log(val1)
        //console.log(val2)
        if (val1 != val2 || val1 == '' || val2 == '') {
            $(".checkpwd").show();
            $(".dosub").prop("disabled", true)
        } else {
            $(".checkpwd").hide();
            $(".dosub").prop("disabled", false)
        }
    })


    $(document).on("submit", '#chpwd', function(e) {
        e.preventDefault();
        let val = document.getElementById("cpass").value;
        $.ajax({
            type: 'POST',
            url: '../assets/update/update.php',
            data: {
                data: val
            },
            success: function(response) {
                if (response) {
                    $('.chpwd').hide()
                    $("form").submit()

                } else {
                    $('.chpwd').show()
                    $("#cpass").focus();
                }
            }
        });

    })
</script>

</html>


<? require_once "../assets/update/update.php";?>
<?php
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Registration Form | LMS </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Library Management System</h1>
</div>

<body class="login" style="margin-top: -20px;">
    <div class="login_wrapper">
        <section class="login_content" style="margin-top: -40px;">
            <form name="form1" action="" method="post">
                <h2>Librarian Registration Form</h2><br>
                <div>
                    <input type="text" class="form-control" placeholder="Librarian Username" name="username" required=""/>
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="First Name" name="firstname" required=""/>
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="Last Name" name="lastname" required=""/>
                </div>
                <div>
                    <input type="password" class="form-control" placeholder="Password" name="password" required=""/>
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="Email" name="email" required=""/>
                </div>
                <div>
                    <input type="text" class="form-control" placeholder="Contact" name="contact" required=""/>
                </div>
                <div class="col-lg-12  col-lg-push-3">
                    <input class="btn btn-default submit" style="margin-top:10px;" type="submit" name="submit1" value="Register">
                </div>
                <div class="clearfix"></div>
                <div class="separator">
                    <p class="change_link">Already a User
                        <a href="login.php"> Login Now</a>
                    </p>
                    <div class="clearfix"></div>
                    <br/>
                </div>
            </form>
        </section>
        <?php
            if(isset($_POST['submit1']))
            {
                $tbl = mysqli_query($link,"select * from librarian_registration where librarian_username = '$_POST[username]'");
                $row = mysqli_num_rows($tbl);
                if($row > 0)
                {
        ?>
                <script>
                    alert("This username is already registered, Please try again.");
                </script>
        <?php
                }
                else
                {
                    mysqli_query($link,"insert into librarian_registration values('$_POST[username]','$_POST[firstname]','$_POST[lastname]','$_POST[password]','$_POST[email]','$_POST[contact]')");
        ?>
                <div class="alert alert-success col-lg-12 col-lg-push-0">
                    <script>
                        alert("Registration successfully.");
                        window.location="login.php";
                    </script>
                </div>
        <?php
                }
            }
        ?>
    </div>
</body>
</html>

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
                    <h2>User Registration Form</h2><br>

                    <div>
                        <input type="text" class="form-control" placeholder="Uet ID" name="uetid" required=""/>
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
                    <div>
                        <input type="text" class="form-control" placeholder="Batch No" name="batch" required=""/>
                    </div>
                    <div>
                        <select name="id" class="form-control">
                            <option value="Computer Science">Computer Science</option>
                            <option value="Electrical Engineering">Electrical Engineering</option>
                            <option value="Chemical Engineering">Chemical Engineering</option>
                        </select>
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
                    </div>

                </form>
            </section>
    <?php

    if(isset($_POST['submit1'])){
        $tbl = mysqli_query($link,"select * from student_registration where student_uet_id = '$_POST[uetid]'");
        $row = mysqli_num_rows($tbl);
        if($row > 0)
        {
            ?>
            <script>
                alert("This uet_id is already registered, Please try again or contact to Librarian");
            </script>
            <?php
        }
        else
        {
            mysqli_query($link,"insert into student_registration values('$_POST[uetid]','$_POST[firstname]','$_POST[lastname]','$_POST[password]','$_POST[email]','$_POST[contact]','$_POST[batch]', '$_POST[id]','no')");
        ?>
            <div class="alert alert-success col-lg-12 col-lg-push-0">
                <script>
                    alert("Registration successfully, Please wait for the Librarian Approval");
                </script>
            </div>
        <?php
        }
    }
    ?>
    </div>

</body>
</html>

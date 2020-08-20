<?php
session_start();
if(!isset($_SESSION["librarian"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.php";
    </script>
    <?php
}
include "header.php";
include "connection.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Librarian Portal</h3>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Send Messages to Students</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>
                                            <select name ="id" class="form-control selectpicker">
                                                <?php
                                                    $tbl = mysqli_query($link,"select * from student_registration");
                                                    while($row = mysqli_fetch_array($tbl))
                                                    {
                                                        ?>
                                                        <option value="<?php echo $row["student_uet_id"]?>">
                                                        <?php echo $row["student_uet_id"]," ( ",$row["firstname"]," )";?>
                                                        </option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>                                        
                                        </td>
                                    </tr>
                                    </tr>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Enter Message Title" name="msg_title" required="">
                                        </td>
                                    </tr>
                                    </tr>
                                        <td>
                                            <label > Enter Message</label>
                                            <textarea name="msg_body"  cols="30" rows="10" class="form-control">
                                            </textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="submit" class="btn btn-default submit" name="submit1" value="Send Message">
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <?php
                                if(isset($_POST["submit1"]))
                                {
                                    mysqli_query($link,"insert into messages values('','$_SESSION[librarian]','$_POST[id]','$_POST[msg_title]','$_POST[msg_body]','no','$_SESSION[date]')");
                                    ?>
                                        <script>
                                            alert("Message Sent Successfully");
                                        </script>
                                    <?php
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
<?php
    include "footer.php";
?>

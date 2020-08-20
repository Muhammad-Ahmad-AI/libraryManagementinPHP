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
                                <h2>Issue Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form action="" name="form1" method="post">
                                    <table>
                                        <tr>
                                            <td>
                                                <select name ="id" class="form-control selectpicker">
                                                    <?php
                                                    $tbl = mysqli_query($link,"select student_uet_id from student_registration");
                                                    while($row = mysqli_fetch_array($tbl))
                                                    {
                                                        echo "<option>";
                                                        echo $row["student_uet_id"];
                                                        echo "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="submit" name="submit1" value="Search" class="form-control btn btn-default" style="margin-top:5px">
                                            </td>
                                        </tr>
                                    </table>
                                
                                    <?php
                                        if(isset($_POST["submit1"]))
                                        {
                                            $tbl1 = mysqli_query($link,"select * from student_registration where student_uet_id='$_POST[id]'");
                                            while($row1 =mysqli_fetch_array($tbl1))
                                            {
                                                $UET_ID = $row1["student_uet_id"];
                                                $Firstname = $row1["firstname"];
                                                $Lastname = $row1["lastname"];
                                                $Email = $row1["email"];
                                                $Batch = $row1["batch_no"];
                                                $Department = $row1["department"];
                                                $_SESSION["uet_id"]=$UET_ID;
                                            }
                                    ?>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>
                                                <label >UET ID</label>
                                                <input type="text" class="form-control" value="<?php echo $UET_ID;?>" name="Uetid" disabled="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label >Firstname</label>
                                                <input type="text" class="form-control" value="<?php echo $Firstname;   ?>" name="firstname" disabled="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label >Lastname</label>
                                                <input type="text" class="form-control" value="<?php echo $Lastname;   ?>" name="lastname" disabled="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label >Email</label>
                                                <input type="text" class="form-control" value="<?php echo $Email;  ?>" name="email" disabled="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label >Batch</label>
                                                <input type="text" class="form-control" value="<?php echo $Batch;  ?>" name="batchno" disabled="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label >Department</label>
                                                <input type="text" class="form-control" value="<?php echo $Department;  ?>" name="department" disabled="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php
                                                    $tbl3 = mysqli_query($link,"select * from issue_books where student_uet_id ='$_POST[id]'  && book_return_date = ''");
                                                    $issued_books = mysqli_num_rows($tbl3);
                                                    $_SESSION["issued_books"] = $issued_books;
                                                ?>
                                                <label >Already Issue Books</label>
                                                <input type="text" class="form-control" value="<?php echo $_SESSION["issued_books"];  ?>" name="batchno" disabled="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label >Select Book</label>
                                                <select name ="booksname" class="form-control selectpicker">
                                                    <?php

                                                        $tbl2 = mysqli_query($link,"select book_name from add_books");
                                                        while($row2 = mysqli_fetch_array($tbl2))
                                                        {
                                                            echo "<option>";
                                                            echo $row2["book_name"];
                                                            echo "</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="submit" name="submit2" value="Search" class="form-control btn btn-default" >
                                            </td>
                                        </tr>
                                    </table>

                                    <?php
                                        }
                                        if(isset($_POST["submit2"]))
                                        {
                                            $tbl2 = mysqli_query($link,"select * from add_books where book_name='$_POST[booksname]'");
                                            while($row2 =mysqli_fetch_array($tbl2))
                                            {
                                                $Book_ID = $row2["book_id"];
                                                $Book_Name = $row2["book_name"];
                                                $Book_Available_Qty = $row2["available_quantity"];
                                                $_SESSION["available_quantity"]=$Book_Available_Qty;
                                                $_SESSION["book_id"]=$Book_ID;
                                                $_SESSION["book_name"]=$Book_Name;
                                                $date = date("d-M-Y");
                                                $_SESSION["date"]= $date;
                                            }
                                    ?>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>
                                                <?php
                                                    $tbl4 = mysqli_query($link,"select * from issue_books where book_id ='$_SESSION[book_id]' && book_return_date = ''");
                                                    $current_issue_books = mysqli_num_rows($tbl4);
                                                    $_SESSION["current_issue_books"] = $current_issue_books;
                                                ?>
                                                <label >If this Book is already Issued or not <?php echo $_SESSION["current_issue_books"]  ?></label>
                                                <?php
                                                    if($_SESSION["current_issue_books"] > 0)
                                                    {
                                                        ?>
                                                        <input type="text" class="form-control" value="<?php echo "Yes";  ?>" disabled="">
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <input type="text" class="form-control" value="<?php echo "No";  ?>" disabled="">
                                                        <?php
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label >Book ID</label>
                                                <input type="text" class="form-control" value="<?php echo $Book_ID;  ?>" name="bookid" disabled="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label >Book Name</label>
                                                <input type="text" class="form-control" value="<?php echo $Book_Name; ?>" name="bookname" disabled="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label >Book Available Quantity</label>
                                                <input type="text" class="form-control" value="<?php echo $Book_Available_Qty; ?>" name="bookavailableqty" disabled="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label >Issue Date</label>
                                                <input type="text" class="form-control" value="<?php echo date("d-M-Y");  ?>" name="Bookissuedate" disabled="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="submit" name="submit3" value="Issue Book" class="form-control btn btn-default" >
                                            </td>
                                        </tr>
                                    </table>

                                    <?php
                                    }
                                    ?>
                                    <?php
                                        if(isset($_POST["submit3"]))
                                        {
                                            if($_SESSION["available_quantity"]<=0)
                                            {
                                                ?>
                                                    <script>alert("Required Books are out of Stock");</script>
                                                <?php
                                            }
                                            elseif($_SESSION["current_issue_books"] > 0)
                                            {
                                                ?>
                                                    <script>alert("You have already issued this Book");</script>
                                                <?php
                                            }
                                            elseif($_SESSION["issued_books"] >= 2)
                                            {
                                                ?>
                                                    <script>alert("You have already issued 2 Books");</script>
                                                <?php
                                            }
                                            else
                                            {
                                                mysqli_query($link,"insert into issue_books values('','$_SESSION[uet_id]','$_SESSION[book_id]','$_SESSION[book_name]','$_SESSION[date]','', '$_SESSION[librarian]')");
                                                mysqli_query($link,"update add_books set available_quantity = available_quantity - 1 where book_id = '$_SESSION[book_id]'");
                                                ?>
                                                    <script>
                                                    alert("Book issued successfully");
                                                    </script>
                                                <?php
                                            }
                                        }
                                    ?>
                                </form>
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
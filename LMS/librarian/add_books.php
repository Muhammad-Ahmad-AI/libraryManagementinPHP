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
                                <h2>Add New Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>
                                            <label >Book Name</label>
                                            <input type="text" class="form-control" placeholder="Book Name" name="bookname" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label >Book Author Name</label>
                                            <input type="text" class="form-control" placeholder="Book Author name" name="bookauthorename" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label >Publication Name</label>
                                            <input type="text" class="form-control" placeholder="Book Publication Name" name="bookpublishname" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label >Book Purchase Date</label>
                                            <input type="date" class="form-control" placeholder="Book Purchase Date" name="bookpurchasedate" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label >Book Price</label>
                                            <input type="text" class="form-control" placeholder="Book Price" name="bookprice" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label >Book Quantity</label>
                                            <input type="text" class="form-control" placeholder="Book Quantity" name="bookquantity" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="submit" class="btn btn-default submit" name="submit1" value="insert book details">
                                        </td>
                                    </tr>
                                </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
<?php
    if(isset($_POST["submit1"]))
    {
        mysqli_query($link,"insert into add_books values('','$_POST[bookname]','$_POST[bookauthorename]','$_POST[bookpublishname]','$_POST[bookpurchasedate]','$_POST[bookprice]','$_POST[bookquantity]','$_POST[bookquantity]','$_SESSION[librarian]')");
        ?>
        <script type="text/javascript">
            alert("Books Inserted Successfully");
        </script>

        <?php
    }
?>

<?php
    include "footer.php";
?>

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
                                <h2>All Books Info</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form action="" name="form1" method="post">
                                    <table class="">
                                        <tr>
                                            <td>
                                            <input type="text" name="bookname" class="form-control" placeholder="Enter Book Name">
                                            </td>
                                            <td>
                                            <input type="submit" name="submit1" value="Search Books" style="margin-top:5px" class="btn btn-default">
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                </form>
                                <?php
                                    if(isset($_POST["submit1"]))
                                    {
                                        $tbl = mysqli_query($link,"select * from add_books where book_name like('%$_POST[bookname]%')");
                                    echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>";    echo "Book Id";   echo "</th>";
                                    echo "<th>";    echo "Book Name";   echo "</th>";
                                    echo "<th>";    echo "Author Name";   echo "</th>";
                                    echo "<th>";    echo "Publication Name";   echo "</th>";
                                    echo "<th>";    echo "Purchase Date";   echo "</th>";
                                    echo "<th>";    echo "Book Price";   echo "</th>";
                                    echo "<th>";    echo "Book Quantity";   echo "</th>";
                                    echo "<th>";    echo "Available Quantity";   echo "</th>";
                                    echo "<th>";    echo "Book Image";   echo "</th>";
                                    echo "<th>";    echo "Delete Book";   echo "</th>";
                                    
                                    echo "</tr>";
                                    
                                    while($row = mysqli_fetch_array($tbl))
                                    {
                                        echo "<tr>";
                                        echo "<td>";    echo $row["book_id"];   echo "</td>";
                                        echo "<td>";    echo $row["book_name"];   echo "</td>";
                                        echo "<td>";    echo $row["book_author_name"];   echo "</td>";
                                        echo "<td>";    echo $row["book_publication_name"];   echo "</td>";
                                        echo "<td>";    echo $row["book_purchase_date"];   echo "</td>";
                                        echo "<td>";    echo $row["book_price"];   echo "</td>";
                                        echo "<td>";    echo $row["book_quantity"];   echo "</td>";
                                        echo "<td>";    echo $row["available_quantity"];   echo "</td>";
                                        echo "<td>";    ?> <a href= "delete_book.php ?book_id=<?php echo $row["book_id"]; ?>" style="color:red";>delete book </a>  <?php echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</table>";                      
                                    }
                                    else{
                                    $tbl = mysqli_query($link,"select * from add_books");
                                    echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>";    echo "Book Id";   echo "</th>";
                                    echo "<th>";    echo "Book Name";   echo "</th>";
                                    echo "<th>";    echo "Author Name";   echo "</th>";
                                    echo "<th>";    echo "Publication Name";   echo "</th>";
                                    echo "<th>";    echo "Purchase Date";   echo "</th>";
                                    echo "<th>";    echo "Book Price";   echo "</th>";
                                    echo "<th>";    echo "Book Quantity";   echo "</th>";
                                    echo "<th>";    echo "Available Quantity";   echo "</th>";
                                    echo "<th>";    echo "Delete Book";   echo "</th>";
                                    
                                    echo "</tr>";
                                    
                                    while($row = mysqli_fetch_array($tbl))
                                    {
                                        echo "<tr>";
                                        echo "<td>";    echo $row["book_id"];   echo "</td>";
                                        echo "<td>";    echo $row["book_name"];   echo "</td>";
                                        echo "<td>";    echo $row["book_author_name"];   echo "</td>";
                                        echo "<td>";    echo $row["book_publication_name"];   echo "</td>";
                                        echo "<td>";    echo $row["book_purchase_date"];   echo "</td>";
                                        echo "<td>";    echo $row["book_price"];   echo "</td>";
                                        echo "<td>";    echo $row["book_quantity"];   echo "</td>";
                                        echo "<td>";    echo $row["available_quantity"];   echo "</td>";
                                        echo "<td>";    ?> <a href= "delete_book.php ?book_id=<?php echo $row["book_id"]; ?>" style="color:red";>delete book </a>  <?php echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</table>";                                           
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

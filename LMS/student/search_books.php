<?php
session_start();
if(!isset($_SESSION["uet_id"]))
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
                        <h3>Student Portal</h3>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2> Search Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form action="" name="form1" method="post">
                                    <table>
                                        <tr>
                                            <td>
                                            <input type="text" name="bookname" class="form-control" placeholder="Enter Book Name">
                                            </td>
                                            <td>
                                            <input type="submit" name="submit1" value="Search Books" class="form-control btn btn-default" style="margin-top:5px">
                                            </td>
                                        </tr>
                                    </table>

                                </form>
                                <?php
                                    if(isset($_POST["submit1"]))
                                    {
                                        $tbl = mysqli_query($link,"select * from add_books where book_name like ('%$_POST[bookname]%') && available_quantity > 0");
                                    echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>";    echo "Book Name";   echo "</th>";
                                    echo "<th>";    echo "Author Name";   echo "</th>";
                                    echo "<th>";    echo "Publication Name";   echo "</th>";
                                    echo "<th>";    echo "Book Price";   echo "</th>";
                                    
                                    echo "</tr>";
                                    
                                    while($row = mysqli_fetch_array($tbl))
                                    {
                                        echo "<tr>";
                                        echo "<td>";    echo $row["book_name"];   echo "</td>";
                                        echo "<td>";    echo $row["book_author_name"];   echo "</td>";
                                        echo "<td>";    echo $row["book_publication_name"];   echo "</td>";
                                        echo "<td>";    echo $row["book_price"];   echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</table>";                      
                                    }
                                    else{
                                    $tbl = mysqli_query($link,"select * from add_books where available_quantity > 0");
                                    echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>";    echo "Book Name";   echo "</th>";
                                    echo "<th>";    echo "Author Name";   echo "</th>";
                                    echo "<th>";    echo "Publication Name";   echo "</th>";
                                    echo "<th>";    echo "Book Price";   echo "</th>";
                                    
                                    echo "</tr>";
                                    
                                    while($row = mysqli_fetch_array($tbl))
                                    {
                                        echo "<tr>";
                                        echo "<td>";    echo $row["book_name"];   echo "</td>";
                                        echo "<td>";    echo $row["book_author_name"];   echo "</td>";
                                        echo "<td>";    echo $row["book_publication_name"];   echo "</td>";
                                        echo "<td>";    echo $row["book_price"];   echo "</td>";
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
 
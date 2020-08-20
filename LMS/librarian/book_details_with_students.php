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
                                <h2>Books With Details</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php
                                    $tbl = mysqli_query($link,"select * from add_books where available_quantity > 0");
                                    echo "<table class='table table-bordered'>";
                                        echo "<tr>";
                                            echo "<th>";    echo "Book ID";   echo "</th>";
                                            echo "<th>";    echo "Book Name";   echo "</th>";
                                            echo "<th>";    echo "Author Name";   echo "</th>";
                                            echo "<th>";    echo "Publication Name";   echo "</th>";
                                            echo "<th>";    echo "Book Price";   echo "</th>";
                                            echo "<th>";    echo "Rocords with Students";   echo "</th>";            
                                        echo "</tr>";                    
                                    while($row = mysqli_fetch_array($tbl))
                                    {
                                        echo "<tr>";
                                        echo "<td>";    echo $row["book_id"];   echo "</td>";
                                        echo "<td>";    echo $row["book_name"];   echo "</td>";
                                        echo "<td>";    echo $row["book_author_name"];   echo "</td>";
                                        echo "<td>";    echo $row["book_publication_name"];   echo "</td>";
                                        echo "<td>";    echo $row["book_price"];   echo "</td>";
                                        echo "<td>";    ?> <a href="all_students_of_this_book.php?book_id=<?php echo $row["book_id"];?>" style="color:red">Student Record of this Book</a><?php   echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</table>"; 
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

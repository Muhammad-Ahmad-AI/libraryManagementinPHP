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
                                <h2>Return Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form action="" name="form1" method="post">
                                    <table>
                                        <tr>
                                            <td>
                                                <select name ="id" class="form-control selectpicker">
                                                    <?php
                                                    $tbl = mysqli_query($link,"select issue_id,student_uet_id from issue_books where book_return_date = ''");
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
                                </form>
                                <?php
                                    if(isset($_POST["submit1"]))
                                    {
                                    $tbl = mysqli_query($link,"select * from issue_books where student_uet_id = '$_POST[id]' && book_return_date = ''");
                                    echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>";    echo "Issue ID";   echo "</th>";
                                    echo "<th>";    echo "Uet ID";   echo "</th>";
                                    echo "<th>";    echo "Book ID";   echo "</th>";
                                    echo "<th>";    echo "Book Name";   echo "</th>";
                                    echo "<th>";    echo "Issue Date";   echo "</th>";
                                    echo "<th>";    echo "Return Date";   echo "</th>";
                                    echo "</tr>";
                                    while($row = mysqli_fetch_array($tbl))
                                    {
                                        echo "<tr>";
                                        echo "<td>";    echo $row["issue_id"];   echo "</td>";
                                        echo "<td>";    echo $row["student_uet_id"];   echo "</td>";
                                        echo "<td>";    echo $row["book_id"];   echo "</td>";
                                        echo "<td>";    echo $row["book_name"];   echo "</td>";
                                        echo "<td>";    echo $row["book_issue_date"];   echo "</td>";
                                        echo "<td>";    ?> <a href="return.php ?issue_id=<?php echo $row["issue_id"]; ?>">Return </a>  <?php echo "</td>";
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

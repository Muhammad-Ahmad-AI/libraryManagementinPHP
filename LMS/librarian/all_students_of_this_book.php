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
                                <h2>Student List with this Book</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <?php
                                $tbl = mysqli_query($link,"select a.student_uet_id,a.book_issue_date,b.student_uet_id, b.firstname, b.lastname, b.email,b.contact from issue_books a,student_registration b where book_id='$_GET[book_id]' && a.student_uet_id = b.student_uet_id && book_return_date = ''");
                                echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                        echo "<th>";    echo "student Uet ID";   echo "</th>";
                                        echo "<th>";    echo "Student First Name";   echo "</th>";
                                        echo "<th>";    echo "Student Last Name";   echo "</th>";
                                        echo "<th>";    echo "Student Email";   echo "</th>";
                                        echo "<th>";    echo "Student Contact No";   echo "</th>";
                                        echo "<th>";    echo "Student Books Issue Date";   echo "</th>";
                                    echo "</tr>";
                                    
                                    while($row = mysqli_fetch_array($tbl))
                                    {   
                                        echo "<tr>";
                                            echo "<td>";    echo $row["student_uet_id"];   echo "</td>";
                                            echo "<td>";    echo $row["firstname"];   echo "</td>";
                                            echo "<td>";    echo $row["lastname"];   echo "</td>";
                                            echo "<td>";    echo $row["email"];   echo "</td>";
                                            echo "<td>";    echo $row["contact"];   echo "</td>";
                                            echo "<td>";    echo $row["book_issue_date"];   echo "</td>";
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

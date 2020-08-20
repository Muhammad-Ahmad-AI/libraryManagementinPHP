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
                                <h2>User Profile</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php
                                    $tbl = mysqli_query($link,"select * from student_registration where student_uet_id = '$_SESSION[uet_id]'");
                                    echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>";    echo "Uet ID";   echo "</th>";
                                    echo "<th>";    echo "First Name";   echo "</th>";
                                    echo "<th>";    echo "Last Name";   echo "</th>";
                                    echo "<th>";    echo "Email";   echo "</th>";
                                    echo "<th>";    echo "Contact";   echo "</th>";
                                    echo "<th>";    echo "Batch No";   echo "</th>";
                                    echo "<th>";    echo "Department";   echo "</th>";
                                    echo "</tr>";
                                    while($row = mysqli_fetch_array($tbl))
                                    {
                                        echo "<tr>";
                                        echo "<td>";    echo $row["student_uet_id"];   echo "</td>";
                                        echo "<td>";    echo $row["firstname"];   echo "</td>";
                                        echo "<td>";    echo $row["lastname"];   echo "</td>";
                                        echo "<td>";    echo $row["email"];   echo "</td>";
                                        echo "<td>";    echo $row["contact"];   echo "</td>";
                                        echo "<td>";    echo $row["batch_no"];   echo "</td>";
                                        echo "<td>";    echo $row["department"];   echo "</td>";
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

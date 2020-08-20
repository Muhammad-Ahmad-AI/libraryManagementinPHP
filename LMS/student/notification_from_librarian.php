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
$tlb=mysqli_query($link,"update messages set msg_read = 'yes' where student_uet_id='$_SESSION[uet_id]'");
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
                                <h2>Messages from Librarian</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                            <?php
                                $tbl = mysqli_query($link,"select * from messages where student_uet_id = '$_SESSION[uet_id]' order by msg_id desc");
                                echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                        echo "<th>";    echo "Librarian Name";   echo "</th>";
                                        echo "<th>";    echo "Message Title";   echo "</th>";
                                        echo "<th>";    echo "Message Date";   echo "</th>";
                                        echo "<th>";    echo "Message";   echo "</th>";
                                    echo "</tr>";
                                    
                                    while($row = mysqli_fetch_array($tbl))
                                    {   
                                        $tbl2 = mysqli_query($link, "select * from librarian_registration where librarian_username ='$row[librarian_username]'");
                                        while($row2 = mysqli_fetch_array($tbl2))
                                        {
                                            $fullname = $row2["firstname"]." ".$row2["lastname"];
                                        }
                                        echo "<tr>";
                                            echo "<td>";    echo $fullname;   echo "</td>";
                                            echo "<td>";    echo $row["msg_title"];   echo "</td>";
                                            echo "<td>";    echo $row["msg_date"];   echo "</td>";
                                            echo "<td>";    echo $row["msg_body"];   echo "</td>";
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

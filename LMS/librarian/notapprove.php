<?php
    include "connection.php";
    if(isset($_GET["student_uet_id"]))
    {
        $id = $_GET["student_uet_id"];
        mysqli_query($link,"update student_registration set status = 'no' where student_uet_id = '$id'");
?>
    <script type = "text/javascript">
    window.location="display_student_info.php";
    </script>
<?php
    }
    else
    {
?>
    <script type = "text/javascript">
    window.location="display_student_info.php";
    </script>
<?php
}
?>
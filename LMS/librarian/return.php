<?php
    include "connection.php";
    $id = $_GET["issue_id"];
    $date = date("d-M-Y");
    mysqli_query($link,"update issue_books set book_return_date = '$date' where issue_id = '$id'");
    $tbl= mysqli_query($link,"select * from issue_books where issue_id= $id");
    while($row = mysqli_fetch_array($tbl))
    {
        $Book_id = $row["book_id"];
    }
    mysqli_query($link,"update add_books set available_quantity = available_quantity + 1 where book_id = '$Book_id'");
?>

<script type = "text/javascript">
    window.location="return_books.php";
</script>
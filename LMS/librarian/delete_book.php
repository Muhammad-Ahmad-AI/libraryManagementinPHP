<?php
    include "connection.php";
    if(isset($_GET["book_id"]))
    {
        $id = $_GET["book_id"];
        mysqli_query($link,"delete from add_books where book_id = '$id'");
?>
    <script type = "text/javascript">
        window.location="display_books.php";
    </script>
<?php
    }
    else
    {
?>
    <script type = "text/javascript">
        window.location="display_books.php";
    </script>
<?php
}
?>


    
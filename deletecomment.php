<?php

session_start();

include './connection.php';

$id = $_GET['id'];

$deletequery = "DELETE FROM `comments_section` WHERE id='$id'";

$query = mysqli_query($con,$deletequery);

if($query){
    ?>
    <script>
        alert("Comment deleted!!!");
    </script>
    <?php
}else{
    ?>
    <script>
        alert("Comment not deleted!!!");
    </script>
    <?php
}

?>

<script>
    location.replace("index.php");
</script>
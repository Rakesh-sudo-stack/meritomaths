<?php
session_start();
include './connection.php';

$email = $_GET['email'];
$post = $_GET['post'];

if($post === "OWNER"){
    ?>
    <script>
        alert("Sorry you cannot delete an owner account!!!");
    </script>
    <?php
}elseif($post === "DEVELOPER"){
    ?>
    <script>
        alert("Sorry you cannot delete a developer account!!!");
    </script>
    <?php
}else{
    $deletequery = " DELETE FROM `userslist` WHERE email='$email' ";
    $query = mysqli_query($con,$deletequery);
    if($query){
    ?>
    <script>
        alert("Successfully Deleted");
    </script>
    <?php
    }else{
        ?>
    <script>
        alert("Cannot Delete");
    </script>
    <?php
    }
}


?>

<script>
    location.replace("admin.php?post=<?php echo $_SESSION['post']; ?>")
</script>
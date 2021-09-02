<?php include('partials/menu.php'); ?>

<div class="main-content">

<div class="wrapper"></div>
<h1>Add Admin</h1>
<br>

<?php
if(isset($_SESSION['add'])){
            echo $_SESSION['add']; //Displaying session message
            unset($_SESSION['add']);//Removing message displayed
        } 
?>
<form action="" method="POST">
<table class="tbl-30 table table-borderless">
    <tr>
    <td>Full Name </td>
    <td><input type="text" name="fullName"></td>
    </tr>

    <tr>
    <td>Username </td>
    <td><input type="text" name="username"></td>
    </tr>

    <tr>
    <td>Password </td>
    <td><input type="password" name="password"></td>
    </tr>

    <tr>
        <td colspan="2">
        
            <input type="submit" value="Add Admin" name="submit" class="btn2 btn btn-primary"> 
        </td>
    </tr>

</table>


</form>
</div>

<?php include('partials/footer.php'); ?>

<?php 
if(isset($_POST['submit'])){
//Get Data from User
    $fullName = $_POST['fullName'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

//Save user Data
$sql = "INSERT INTO admin_settings SET
fullName = '$fullName',
username = '$username',
password = '$password'
";


$res = mysqli_query($conn, $sql) or die(mysqli_error());
if ($res==true){
    //Session message 
  $_SESSION['add'] = "<div class='alert alert-success'>Admin has been added sucessfully</div>";
  //Redirect the page to manage admin
  header("location:".SITEURL.'admin/manage-admin.php');
}
else {
     //Session message
  $_SESSION['add'] = "<div class='alert alert-danger'>Failed to add admin</div>";
  //Redirect the page to add admin
  header("location:".SITEURL.'admin/admin-add.php');
}
}
?>
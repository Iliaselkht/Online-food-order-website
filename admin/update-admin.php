<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br>

        <?php 
            //1. Get the ID of Selected Admin
            $id=$_GET['id'];

            //2. Create SQL Query to Get the Details
            $sql="SELECT * FROM admin_settings WHERE id=$id";

            //Execute the Query
            $res=mysqli_query($conn, $sql);

            //Check whether the query is executed or not
            if($res==true)
            {
                // Check whether the data is available or not
                $count = mysqli_num_rows($res);
                //Check whether we have admin data or not
                if($count==1)
                {
                    // Get the Details
                    //echo "Admin Available";
                    $row=mysqli_fetch_assoc($res);

                    $fullName = $row['fullName'];
                    $username = $row['username'];
                }
                else
                {
                    //Redirect to Manage Admin PAge
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        
        ?>


        <form action="" method="POST">

            <table class="tbl-30 table table-borderless table-secondary">
                <tr>
                    <td>Full Name </td>
                    <td>
                        <input type="text" name="fullName" value="<?php echo $fullName; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>
                    
                <tr>
                
                    <td colspan="2">
                    
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn2 btn btn-info">
                    </td>
                </tr>

            </table>

        </form>
    </div>
</div>

<?php 

    //Check whether the Submit Button is Clicked or not
    if(isset($_POST['submit']))
    {
        //echo "Button CLicked";
        //Get all the values from form to update
        $id = $_POST['id'];
        $fullName = $_POST['fullName'];
        $username = $_POST['username'];

        //Create a SQL Query to Update Admin
        $sql = "UPDATE admin_settings SET
        fullName = '$fullName',
        username = '$username' 
        WHERE id='$id'
        ";

        //Execute the Query
        $res = mysqli_query($conn, $sql);
        if ($res==true){
            //Session message 
          $_SESSION['update'] = "<div class='alert alert-success'>Admin has been Updated sucessfully</div>";
          //Redirect the page to manage admin
          header("location:".SITEURL.'admin/manage-admin.php');
        }
        else {
             //Session message
          $_SESSION['update'] = "<div class='alert alert-danger'>Failed to Update admin</div>";
          //Redirect the page to add admin
          header("location:".SITEURL.'admin/manage-admin.php');
        }
    }

?>


<?php include('partials/footer.php'); ?>
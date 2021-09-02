    <?php include('partials/menu.php'); ?>
    <!--Main section start -->
    <div class="main-content">
    <div class="wrapper">
        <h1>Admin Management</h1>
        <br><br>
        <?php
        if (isset($_SESSION['add'])){
            echo $_SESSION['add']; //Displaying session message
            unset($_SESSION['add']);//Removing message displayed
        }
        if (isset($_SESSION['delete'])){
            echo $_SESSION['delete']; //Displaying session message
            unset($_SESSION['delete']);//Removing message displayed
        }
        if (isset($_SESSION['update'])){
            echo $_SESSION['update']; //Displaying session message
            unset($_SESSION['update']);//Removing message displayed
        }
        if(isset($_SESSION['user-not-found']))
        {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
        }

        if(isset($_SESSION['pwd-not-match']))
        {
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
        }

        if(isset($_SESSION['change']))
        {
            echo $_SESSION['change'];
            unset($_SESSION['change']);
        }
        ?>
        <br><br>
        <!--------Add Admin button-------->
        <a href="admin-add.php"><input class="btn btn-primary" type="button" value="Add Admin"></a>
        <br><br>
        <table class="full-table table-secondary">
        <tr>
        <th>Id</th>
        <th>Username</th>
        <th>fullName</th>
        <th>Action</th>
        </tr>
        <?php
        //To get all Admin
        $sql = "SELECT * FROM  admin_settings";
        //Execute query 
        $res = mysqli_query($conn, $sql);
        
        //Check whether the query is executed or not
        if ($res==true) {
            $cont = mysqli_num_rows($res); // to get all the rows in database
            $ai = 1;
            if($cont>0) { // data exists in database
                while ($rows = mysqli_fetch_assoc($res)){
                    //Get individual data
                    $id=$rows['id'];
                    $fullName=$rows['fullName'];
                    $username=$rows['username'];

                    //Display the value in the table
                    ?>
                     <tr>
                    <td> <?php echo $ai++;?>.</td>
                    <td> <?php echo $fullName;?></td>
                    <td> <?php echo $username; ?></td>
                    <td>
                    <a href="<?php echo SITEURL; ?>admin/change-password.php?id=<?php echo $id; ?>" class="btn btn-dark">Change Password</a>
                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class=" btn btn-info">Update Admin</a>
                   <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class=" btn btn-danger">Delete Admin</a>
                    </td>
                    </tr>
                    <?php 
                    }
            }
            
        } 
        ?>
       </table>
       <br>
  <div class="clearfix"></div>
    </div>
    </div>
    <!--Main section ends -->
    <?php include('partials/footer.php');?>
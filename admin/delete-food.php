<?php 
    //Include COnstants Page
    include('../config/cots.php');

    //echo "Delete Food Page";

    if(isset($_GET['id']) && isset($_GET['image_name'])) 
    {
        //Process to Delete
        //echo "Process to Delete";

        //1.  Get ID and Image NAme
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //2. Remove the Image if Available
        //CHeck whether the image is available or not and Delete only if available
        if($image_name != "")
        {
            // IT has image and need to remove from folder
            //Get the Image Path
            $path = "../images/food/".$image_name;

            //REmove Image File from Folder
            $remove = unlink($path);

            //Check whether the image is removed or not
            if($remove==false)
            {
                //Failed to Remove image
                $_SESSION['upload'] = "<div class='alert alert-danger'>Failed to Remove Image File.</div>";
                //REdirect to Manage Food
                header('location:'.SITEURL.'admin/manage-food.php');
                //Stop the Process of Deleting Food
                die();
            }

        }

        //3. Delete Food from Database
        $sql = "DELETE FROM food_name WHERE id=$id";
        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //CHeck whether the query executed or not and set the session message respectively
        //4. Redirect to Manage Food with Session Message
        if($res==true)
        {
            //Food Deleted
            $_SESSION['delete'] = "<div class='alert alert-success'>Food Deleted Successfully.</div>";\
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            //Failed to Delete Food
            $_SESSION['delete'] = "<div class='alert alert-danger'>Failed to Delete Food.</div>";\
            header('location:'.SITEURL.'admin/manage-food.php');
        }

        

    }
    else
    {
        //Redirect to Manage Food Page
        //echo "REdirect";
        $_SESSION['unauthorize'] = "<div class='alert alert-danger'>Unauthorized Access</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }

?>
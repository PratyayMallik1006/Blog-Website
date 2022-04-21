<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php
$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
 Confirm_Login(); 
 ?>
<?php
$SearchQueryParameter = $_GET["id"];
//Fetching Content to be Deleted
global $ConnectingDB;
$sql = "SELECT * FROM posts WHERE id='$SearchQueryParameter'";
$stmt = $ConnectingDB->query($sql);
while($DataRows=$stmt->fetch()){
    $TitleToBeDeleted=$DataRows['title'];
    $CategoryToBeDeleted=$DataRows['category'];
    $ImageToBeDeleted=$DataRows['image'];
    $PostToBeDeleted = $DataRows['post'];
}
if(isset($_POST["Submit"])){
  
    // Query to delete Post in DB When everything is fine
    global $ConnectingDB;
    $sql = "DELETE FROM posts WHERE id='$SearchQueryParameter'";
    $Execute =$ConnectingDB->query($sql);
    if($Execute){
        $Target_Path_To_DELETE_Image = "uploads/$ImagesToBeDeleted";
        unlink($Target_Path_To_DELETE_Image);
      $_SESSION["SuccessMessage"]="Post with id : " .$ConnectingDB->lastInsertId()." deleted Successfully";
      Redirect_to("Posts.php");
    }else {
      $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
      Redirect_to("Posts.php");
    }
  
} //Ending of Submit Button If-Condition

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9cabd83c0a.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>Delete Post</title>
</head>
<body>
    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
            <a href="#" class="navbar-brand">Blog</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarcollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarcollapse">
            <ul class="navbar-nav me-auto">
                <li class="navbar-item">
                    <a href="MyProfile.php" class="nav-link">My Profile</a>
                </li>
                <li class="navbar-item">
                    <a href="Dashboard.php" class="nav-link">Dashboard</a>
                </li>
                <li class="navbar-item">
                    <a href="Posts.php" class="nav-link">Posts</a>
                </li>
                <li class="navbar-item">
                    <a href="Categories.php" class="nav-link">Categories</a>
                </li>
                <li class="navbar-item">
                    <a href="Admins.php" class="nav-link">Manage Admins</a>
                </li>
                <li class="navbar-item">
                    <a href="Comments.php" class="nav-link">Comments</a>
                </li>
                <li class="navbar-item">
                    <a href="Blog.php?page=1" class="nav-link">Live Blog</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="Logout.php">Logout</a>
                </li>
            </ul>
        </div>

        </div>

    </nav>
    <!--NAVBAR END-->
    <!--HEADER-->
    <header class="py-3">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <h1><i class="fa-solid fa-trash-o"></i> Delete Post</h1>
            </div>
            </div>
        </div>
    </header>
    <!--HEADER END-->
    <!--MAIN AREA-->
    <section class="container py-2 mb-4">
        <div class="row">
            <div class="offset-lg-1 col-lg-10" style="min-height:450px;">
            <?php
               echo ErrorMessage();
               echo SuccessMessage();
               
           ?>

            <form class="form-group" action="DeletePost.php?id=<?php echo $SearchQueryParameter;?>" method="POST" enctype="multipart/form-data">
                <div class="card text-light px-3" style="background:#444;">
                    <div class="card-header">
                    </div>
                    <div class="card-body py-4">
                        <div class="form-group">
                            <label for="title"><span class="FieldInfo">Post Title: </span></lebel>
                            <input disabled class="form-control" type="text" name="PostTitle" id="title" value="<?php echo $TitleToBeDeleted; ?>" placeholder="Type new category title" style="min-width:1000px">
                        </div>
                        <div class="form-group">
                            <span class="FieldInfo">Existing category: </span>
                            <?php echo $CategoryToBeDeleted ?> <BR>
                            
                        </div>
                        <div class="form-group">
                        <span class="FieldInfo">Existing Image: </span>
                        <img src= "uploads/<?php echo $ImageToBeDeleted?>" width="170px" height="70px"><br>
                            
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="Post"><span class="FieldInfo">Post: </span></lebel>
                            <textarea disabled class="form-control" name="PostDescription" value="" id="Post" cols="30" rows="10" style="min-width:1000px">
                            <?php echo $PostToBeDeleted ?>
                            </textarea>
                        </div>
                        <div class="row mb-2">
                            <div class="offset-1 col-lg-5" >
                                <a href="Dashboard.php" class="btn btn-success btn-block mt-3" style="width:80%"><i class="fa-solid fa-arrow-left"></i> Back To Dashboard</a>
                            </div>
                            <div class="offset-1 col-lg-5">
                                <button type="submit" name="Submit" class="btn btn-danger btn-block mt-3" style="width: 80%;">
                                    <i class="fa-solid fa-trash-o"></i> Delete</a>
                                </button>
                                
                            </div>
                        </div>
                    </div>
                <div>
            </form>

        </div>
        </div>

    </section>
    <!--FOOTER-->
    <footer class="bg-dark text-white">
        <div class="container">
            <div class="row">
                <p class="lead text-center">Made By Pratyay Mallik</p>
            </div>
        </div>
    </footer>
    <!--FOOTER END-->


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
</body>
</html>
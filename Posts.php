
<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php
$_SESSION["TrackingURL"]=$_SERVER["PHP_SELF"];
 Confirm_Login();
 ?>
<?php
if(isset($_POST["Submit"])){
  $PostTitle = $_POST["PostTitle"];
  $Category = $_POST["Category"];
  $Image = $_FILES["Image"]["name"];
  $Target = "uploads/".basename($_FILES["Image"]["name"]);
  $PostText = $_POST["PostDescription"];
  $Admin = "Pratyay";
  date_default_timezone_set("Asia/Dili");
  $CurrentTime=time();
  $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);

  if(empty($PostTitle)){
    $_SESSION["ErrorMessage"]= "Title can not be empty";
    Redirect_to("AddNewPost.php");
  }elseif (strlen($PostTitle)<3) {
    $_SESSION["ErrorMessage"]= "Post Title title should be greater than 2 characters";
    Redirect_to("AddNewPost.php");
  }elseif (strlen($PostText)>999) {
    $_SESSION["ErrorMessage"]= "Post Description should be less than than 1000 characters";
    Redirect_to("AddNewPost.php");
  }else{
    // Query to insert Post in DB When everything is fine
    global $ConnectingDB;
    $sql = "INSERT INTO posts(datetime,title,category,author,image,post)";
    $sql .= "VALUES(:dateTime,:postTitle,:categoryName,:adminName,:imageName,:postDescription)";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':dateTime',$DateTime);
    $stmt->bindValue(':postTitle',$PostTitle);
    $stmt->bindValue(':categoryName',$Category);
    $stmt->bindValue(':adminName',$Admin);
    $stmt->bindValue(':imageName',$Image);
    $stmt->bindValue(':postDescription',$PostText);
    $Execute=$stmt->execute();
    move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
    if($Execute){
      $_SESSION["SuccessMessage"]="Post with id : " .$ConnectingDB->lastInsertId()." added Successfully";
      Redirect_to("AddNewPost.php");
    }else {
      $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
      Redirect_to("AddNewPost.php");
    }
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
    <title>Posts</title>
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
              <h1><i class="fa fa-light fa-newspaper-o"></i> Manage Posts</h1>
            </div>
            <div class="col-lg-3 mb-2 text-center">
                <a href="AddNewPost.php" class="btn btn-primary btn-block">
                    Add New Post
                </a>
            </div>
            <div class="col-lg-3 mb-2 text-center">
                <a href="Categories.php" class="btn btn-primary btn-block">
                    Add New Category
                </a>
            </div>
            <div class="col-lg-3 mb-2 text-center">
                <a href="Admins.php" class="btn btn-primary btn-block">
                    Add New Admin
                </a>
            </div>
            <div class="col-lg-3 mb-2 text-center">
                <a href="Comments.php" class="btn btn-primary btn-block">
                    Approve Comments
                </a>
            </div>
            </div>
        </div>
    </header>
    <!--HEADER END-->
    <!--MAIN AREA-->
    <section class="container py-2 mb-4">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Date&Time</th>
                        <th>Author</th>
                        <th>Banner</th>
                        <th>Comments</th>
                        <th>Action</th>
                        <th>Live Preview</th>

                    </tr>
                </thead>
                <?php
                global $ConnectingDB;
                $sql  = "SELECT * FROM posts ORDER BY id desc";
                $stmt = $ConnectingDB->query($sql);
                $Sr = 0;
                while ($DataRows = $stmt->fetch()) {
                  $Id        = $DataRows["id"];
                  $DateTime  = $DataRows["datetime"];
                  $PostTitle = $DataRows["title"];
                  $Category  = $DataRows["category"];
                  $Admin     = $DataRows["author"];
                  $Image     = $DataRows["image"];
                  $PostText  = $DataRows["post"];
                  $Sr++;
                ?>
<tbody>
    <tr>
      <td>
          <?php echo $Sr; ?>
      </td>
      <td>
          <?php
              if(strlen($PostTitle)>20){$PostTitle= substr($PostTitle,0,18).'..';}
               echo $PostTitle;
           ?>
       </td>
       <td>
          <?php
              if(strlen($Category)>8){$Category= substr($Category,0,8).'..';}
               echo $Category ;
           ?>
       </td>
       <td>
          <?php
              if(strlen($DateTime)>11){$DateTime= substr($DateTime,0,11).'..';}
                 echo $DateTime ;
          ?>
      </td>
      <td>
          <?php
              if(strlen($Admin)>6){$Admin= substr($Admin,0,6).'..';}
                 echo $Admin ;
           ?>
      </td>
          <td><img src="Uploads/<?php echo $Image ; ?>" width="170px;" height="50px"</td>
          <td>
              <?php $Total = ApproveCommentsAccordingtoPost($Id);
              if ($Total>0) {
                ?>
                <span class="badge bg-dark">
                  <?php
                echo $Total; ?>
                </span>
                  <?php  }  ?>
            <?php $Total = DisApproveCommentsAccordingtoPost($Id);
            if ($Total>0) {
                            ?>
              <span class="badge bg-danger">
                <?php
              echo $Total;  ?>
              </span>
                <?php  }   ?>
          </td>
          <td>
            <a href="EditPost.php?id=<?php echo $Id; ?>"><span><i class="fa fa-pen-to-square"></span></i></a>
            <a href="DeletePost.php?id=<?php echo $Id; ?>"><span><i class="fa fa-trash-o"></span></i></a>
          </td>
          <td>
            <a href="FullPost.php?id=<?php echo $Id; ?>" target="_blank"><span class="btn btn-primary">Live Preview</span></a>
          </td>
            </tr>
            </tbody>
    <?php } ?>   <!--  Ending of While loop -->
      </table>

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
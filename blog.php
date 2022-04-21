<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9cabd83c0a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>Blog Page</title>
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
                    <a href="Blog.php" class="nav-link">Home</a>
                </li>
                <li class="navbar-item">
                    <a href="#" class="nav-link">About Us</a>
                </li>
                
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <form class="d-flex" action="Blog.php">
                        
                        <input type="text" name="Search" class="form-control me-2">
                        <button class="btn btn-info" name="SearchButton"><i class="fa fa-search"></i></button>
                        
                    </form>
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
                <h1>Blogs</h1>
            </div>
            </div>
        </div>
    </header>
    <!--HEADER END-->
    <!--Main Area-->
    <div class="container">
        <div class="row mt-4">
            <div class="col-sm-8" style="min-height:800px;">
            <?php
               echo ErrorMessage();
               echo SuccessMessage();
           ?>
                <?php
                global $ConnectingDB;
                //SQLMquery fro searc
                if(isset($_GET["SearchButton"])){
                    $Search = $_GET["Search"];
                    $sql = "SELECT * FROM posts 
                    WHERE datetime LIKE :search
                    OR title LIKE :search
                    OR category LIKE :search
                    OR post LIKE :search";
                    $stmt = $ConnectingDB->prepare($sql);
                    $stmt->bindValue(':search','%'.$Search.'%');
                    $stmt->execute();
                }
                //SQL for all result
                else{
                $sql = "SELECT * FROM posts ORDER BY id desc";
                $stmt = $ConnectingDB->query($sql);
                }
                while($DataRows = $stmt->fetch()){
                    $PostId = $DataRows["id"];
                    $DateTime = $DataRows["datetime"];
                    $PostTitle = $DataRows["title"];
                    $Category = $DataRows["category"];
                    $Admin = $DataRows["author"];
                    $Image = $DataRows["image"];
                    $PostDescription = $DataRows["post"];
                
                ?>
                <div class="card mb-4" style="background-color:#eee;">
                    <img src="uploads/<?php echo htmlentities($Image);?>" class="img-fluid card-img-top" />
                    <div class="card-body">
                        <h4 class="card-title"><?php echo htmlentities($PostTitle); ?></h4>
                        <small class="text-muted">Written by <?php echo htmlentities($Admin); ?> On <?php echo $DateTime; ?></small>
                        <span style="float:right;" class="badge bg-dark">Comments 
                        <?php echo ApproveCommentsAccordingtoPost($PostId);?>
                        </span>
                        <hr>
                        <p class="card-text">
                        <?php if (strlen($PostDescription)>150) { $PostDescription = substr($PostDescription,0,150)."...";} echo htmlentities($PostDescription); ?>        
                    </p>
                        <a href="FullPost.php?id=<?php echo $PostId;?>" style="float:right;">
                            <span class="btn btn-primary">Read more >></span>
                        </a>
                    </div>
                </div>
                <?php } ?>
            
            </div>
        
    <!--Main Area End-->

    <!--Side Area-->
    <div class="col-sm-4" style="min-height:40px;">
        <div class="card mt-4">
            <div class="card-body bg-primary text-white">
                <h3>Catergories</h3>
                <ul>
                    <li>Technology</li>
                    <li>Science</li>
                    <li>News</li>
                    <li>Travel</li>
                </ul>
            </div>
            
            </div>
        
    
    <div class="card mt-4">
        <div class="card-header bg-dark text-white">
            <h2>Subscribe</h2>
        </div>
        <div class="card-body" style="background-color:#eee">
            <form class="" action="">
                        
                <input type="text" name="Search" class="form-control me-2" placeholder="email">
                <button class="btn btn-success" name="SearchButton">Subscribe</button>
                
            </form>
        </div>
        
        </div>
    </div>
    
</div>
    </div>
    </div>
    </div>
                
    <!--End Side Area-->
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
<!DOCTYPE html>
<html lang="en">
<?php
include("connect.php");
session_start();
$insert = false;
$update = false;
$delete = false;
if (isset($_POST["btn_addBlog"])) {
    $userId = $_SESSION['userId'];
    $title = $_POST['title'];
    $detail = $_POST['detail'];
    $query = "insert into tbl_blog values (0,'$userId','$title','$detail')";
    if (isset($_POST["btn_addBlog"])) {
        if (mysqli_query($conn, $query)) {
            $insert = true;
        } else { ?>
            <div class="snackbar alert alert-Danger" role="alert">
                <div>
                    Something Went Wrong!
                </div>
            </div>
            <?php
        }
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap/bootstrap.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="php.svg" height="54px" alt=""> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                databs-target="#navbarSupportedContent" ariacontrols="navbarSupportedContent" ariaexpanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav navbar-brand">Welcome <?php echo $_SESSION['email']?></div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./showdata.php">Show Data</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    if ($insert) {
        echo '<div class="alert alert-success alert-dismissible fade
        show" role="alert"> <strong>Success!</strong> Blog added successfully. <button type="button" class="btn-close" data-bsdismiss="alert" arialabel="Close"></button>
        </div>';
    } ?>
    <div class="container my-3">
        <h2>Add a Blog</h2>
        <form method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Blog Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">Blog description</label>
                <textarea name="detail" class="form-control" id="detail" cols="30" rows="5" required></textarea>
            </div>
            <button type="submit" name="btn_addBlog" class="btn btn-primary">Add Blog</button>
        </form>
    </div>

</body>

</html>
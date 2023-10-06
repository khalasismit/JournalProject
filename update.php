<!DOCTYPE html>
<html lang="en">
<?php
include("connect.php");
session_start();
if (isset($_POST['btn_update'])) {
    $update = "update tbl_blog set title='$_POST[title]',detail='$_POST[detail]' where id='$_GET[bid]'";
    if (mysqli_query($conn,$update)){
        echo "Success: Data Updated";

    }
    else {
        echo "Error:" . mysqli_error($conn);
    }
}

if (isset($_GET['bid'])) {
    $sel = "select * from tbl_blog where id=$_GET[bid]";
    $res = mysqli_query($conn, $sel);
    $data = mysqli_fetch_assoc($res);
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap/bootstrap.css">

</head>

<body><nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
    <div class="container my-3">
        <h2>Update Blog</h2>
        <form method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Blog Title</label>
                <input type="text" value="<?php echo $data['title'] ?>" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">Blog Description</label>
                <input type="text" value="<?php echo $data['detail']?>" name="detail" class="form-control" id="detail" required></textarea>
            </div>
            <button type="submit" name="btn_update" class="btn btn-primary">Update Blog</button>
        </form>
    </div>
</body>

</html>
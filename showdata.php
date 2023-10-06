<!DOCTYPE html>
<html lang="en">
<?php
include("connect.php");
session_start();
if (isset($_GET['delid'])) {
    $delete = "delete from tbl_blog where id=$_GET[delid]";
    mysqli_query($conn, $delete);
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
                <div class="navbar-nav navbar-brand">Welcome
                    <?php echo $_SESSION['email'] ?>
                </div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="./home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./showdata.php">Show Data</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <table class="table table-striped">
        <tr>
            <th>Blog Id</th>
            <th>Blog Title</th>
            <th>Blog Description</th>
            <th>User Id</th>
            <th>Action</th>
        </tr>
        <?php
        $query = "select * from tbl_blog";
        $res = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($res)) {
            ?>
            <tr>
                <td>
                    <?php echo $row['id'] ?>
                </td>
                <td>
                    <?php echo $row['title'] ?>
                </td>
                <td>
                    <?php echo $row['detail'] ?>
                </td>
                <td>
                    <?php echo $row['userId'] ?>
                </td>
                <td><a href="./update.php?bid=<?php echo $row['id'] ?>">Update</a> | <a
                        href="showdata.php?delid=<?php echo $row['id'] ?>"
                        onclick="return confirm('Are you sure?')">Delete</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>

</html>
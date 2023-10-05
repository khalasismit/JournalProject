<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Sign-In</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap/bootstrap.css">
</head>
<?php
include("connect.php");
session_start();
if (isset($_POST["btnLogin"])) {
    $email = $_POST["txtemail"];
    $pass = $_POST["txtpass"];
    if (isset($_POST["btnLogin"])) {
        if ($email != "" && $pass != "") {
            $query = "select * from tbl_user where email = '$email' and password = '$pass' ";
            $res = mysqli_fetch_assoc(mysqli_query($conn, $query));
            // $count = mysqli_num_rows($res);
            if ($res !== null) {
                if ($res['email'] === $email && $res['password'] === $pass) {
                    ?>
                    <h6 class="snackbar"> Login Complete </h6>
                    <?php
                    $_SESSION['email'] = $email;
                    $_SESSION['userId'] = $res['id'];
                    $_SESSION['password'] = $pass;
                    header("location:home.php");
                }
            } else { ?>
                <h6 class="snackbar"> Invalid Detail </h6>
                <?php
            }
        } else { ?>
            <h6 class="snackbar"> Fill Detail </h6>
            <?php
        }
    }
}
?>

<body>
    <section class="vh-100 bg-image"
        style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-center mb-3">Sign-In</h2>
                                <form method="post">
                                    <div class="form-outline mb-4">
                                        <input type="email" name="txtemail" placeholder="Email"
                                            class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" name="txtpass" placeholder="Password"
                                            class="form-control form-control-lg" />
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="btnLogin"
                                            class="btn btn-block btn-lg gradient-custom-4 text-body">Login</button>
                                    </div>

                                    <p class="text-center text-muted mt-3 mb-0">Don't have an account <a
                                            href="index.php" class="fw-bold text-body"><u>Register here</u></a></p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
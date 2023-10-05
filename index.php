<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Sign-Up</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap/bootstrap.css">
</head>
<?php
include("connect.php");
if (isset($_POST["btnRegister"])) {
    $name = $_POST["txtname"];
    $phone = $_POST["txtphone"];
    $email = $_POST["txtemail"];
    $pass = $_POST["txtpass"];
    $cpass = $_POST["txtcpass"];
    $query = "insert into tbl_user values (0,'$name','$email','$pass','$phone')";
    if (isset($_POST["btnRegister"])) {
        if ($name != "" && $email != "" && $phone != "" && $cpass === $pass) {
            if (mysqli_query($conn, $query)) {
                ?>
                <h6 class="snackbar"> Registration Complete </h6>
                <?php
            }
        } else { ?>
            <h6 class="snackbar"> Please fill all details </h6>
            <?php
        }
    }
}
?>


<body>
    <section class="vh-100">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-center mb-3">Sign-Up</h2>
                                <form method="post">

                                    <div class="form-outline mb-4">
                                        <input name="txtname" type="text" placeholder="Full Name"
                                            class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input name="txtphone" type="text" placeholder="Phone"
                                            class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input name="txtemail" type="email" placeholder="Email"
                                            class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input name="txtpass" type="password" placeholder="Password"
                                            class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input name="txtcpass" type="password" placeholder="Confirm Password"
                                            class="form-control form-control-lg" />
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="btnRegister"
                                            class="btn btn-block btn-lg gradient-custom-4 text-body">Register</button>
                                    </div>

                                    <p class="text-center text-muted mt-3 mb-0">Already have an account? <a
                                            href="login.php" class="fw-bold text-body"><u>Login here</u></a></p>
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
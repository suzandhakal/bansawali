<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Login | Banshawali</title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
  rel="stylesheet"
/>
<!-- <style>
    .left-cont {
        width: 69%;
        margin: 0;
        display: inline-block;
    }

    .page-title {
        text-align: center;
    }

    .logoin-frm {
        width: 30%;
        margin: 0;
        display: inline-block;
        border-left: solid 1px brown;
        height: 100%;
    }

    /* .logoin-frm input { */
    /* display: block; */
    /*
        margin: 3vh auto;
        width: 60%;
        text-align: center;
    } */

    .input-icons i {
        position: absolute;
    }

    .input-icons {
        width: 80%;
        margin: auto;
        margin-bottom: 10px;
    }

    .icon {
        padding: 10px;
        color: green;
        min-width: 50px;
        text-align: center;
    }

    .input-field {
        width: 100%;
        padding: 10px;
        text-align: center;
        display: inline-block;
    }

    h2 {
        color: green;
    }

    .sbmt-btn{
        display: block;
        padding: 8px 0;
        width: 30%;
        margin:  auto;
        background-color:  green;
        border-radius: 12px;
    }
</style> -->

<body>
    <!-- <div class="left-cont">
    </div>
    <vr>
    <form action="LoginValidation.php" method="post" class="logoin-frm">
        <h2 class="page-title">Banshawali</h2>
        <div class="input-icons">
            <i class="fa fa-user icon"></i>
            <input type="text" name="userName" id="nameUser" class="input-field" placeholder="UserName" required>
        </div>
        <div class="input-icons">
            <i class="fa fa-lock icon"></i>
            <input type="password" name="userPass" id="passUser" class="input-field" placeholder="Password" required>
        </div>
        <input class="sbmt-btn" type="submit" value="Log In">
    </form> -->
    <section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="images/family.jpg" class="img-fluid"
          alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      <form action="LoginValidation.php" method="post">

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" name="userName" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid username" />
            <label class="form-label" for="form3Example3">Enter Username</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" name="userPass" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" />
            <label class="form-label" for="form3Example4">Password</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
            <!-- <a href="#!" class="text-body">Forgot password?</a> -->
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" name="login" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>
</body>
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
></script>
</html>
<?php 
session_start();

if(isset($_SESSION['usersession']) && $_SESSION['usersession']=="admin")
{
	require "dbcontroller.php";
	include 'include/dashboard-sidebar.php';
        $db_handle = new DBController();
        ?>
        <style>
    .profile{
        text-align:center;
    }
    .profile img {
    width: 150px;
    height: 150px;
    border-radius: 50%
}
.invisible{
    visibility:invisible;
}
    </style>
      <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                          
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                     ADD NEW ADMIN
                                     <p style="text-align:right;"><a href="admins.php">Go Back</a></p>
                                    </div>
                                    <div class="card-body card-block">
                                    <form action="AddMember.php" method="post" name="entry"  enctype="multipart/form-data" accept-charset="utf-8">
 

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Full Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input class="form-control" type="text" name="fname" id="" placeholder="First Name" required><br> 
                                                <input class="form-control" type="text" name="mname" id="" placeholder="Middle Name"><br>
                                                <input class="form-control" type="text" name="lname" id="" placeholder="Last Name">  
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Contact Number</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input class="form-control" type="text" name="contact_number" id="" placeholder="Contact Number" required><br>  
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Email Address</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input class="form-control" type="text" name="email_address" id="" placeholder="Email Address" required><br> 
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input type="button" value="Generate Password" onclick="GenerateIDPASSWORD()">
                                                <input type="password" id="password" name="password" placeholder="password" class="form-control" required="" readonly>
                                                <br><p style="color:red;">We will send login credential to provided email address </p>
                                                </div>
                                            </div>

    
  
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input class="form-control btn btn-primary" type="submit" name="add_admin" value="Add" id="subBtn">

                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                   
                                </div>
                       
                     
                        
                </div>
                </div>
            </div>
        </div>
        <script>
            var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
            </script>
        <?php

    include 'include/dashboard-footer.php';
    }
    else {
        header('location:index.php');
    } 
	?>
    <script>
    function GenerateIDPASSWORD()
{

function randomInteger(min, max) {
return Math.floor(Math.random() * (max - min + 1)) + min;
}

function makeid(length) {
var result           = '';
var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
var charactersLength = characters.length;
for ( var i = 0; i < length; i++ ) {
result += characters.charAt(Math.floor(Math.random() * charactersLength));
}
return result;
}
let generatedpassword = makeid(8);
document.getElementById("password").value=generatedpassword;
}
    </script>



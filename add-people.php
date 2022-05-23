<?php 
session_start();

if(isset($_SESSION['usersession']) && $_SESSION['usersession']=="admin")
{
	require "dbcontroller.php";
	include 'include/dashboard-sidebar.php';
        $db_handle = new DBController();

$stmt_province =$db_handle->rawQuery("SELECT * FROM province");
$stmt_province1 =$db_handle->rawQuery("SELECT * FROM province");

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
                                     ADD NEW PEOPLE
                                     <p style="text-align:right;"><a href="peoples.php">Go Back</a></p>
                                    </div>
                                    <div class="card-body card-block">
                                    <form action="AddMember.php" method="post" name="entry"  enctype="multipart/form-data">
                                            <p style="font-size:16px; color:red" align="center">  </p>
                                            <div class="profile">
                                            <img src="storage/profile/defaultuser.png" id="output"> 

                                                <br>
                                            <br>
                                        </div>
                                            <br>
                                            <br>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Profile Picture</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input type="file"  accept="image/*" name="image" class="form-control" id="customFile" onchange="loadFile(event)" requiredonchange="loadFile(event)" />

                                                </div>
                                            </div>
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
                                                    <label for="email-input" class=" form-control-label">Gender</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input  type="radio" name="gender" value="Male" checked>Male
                                                <input  type="radio" name="gender" value="Female">Female  
                                                <input  type="radio" name="gender" value="Others">Others                                              
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Date Of Birth</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input class="form-control" type="date" name="DOB" id="" placeholder="Date of Birth" required><br>                                                    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Permanent Address</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <div class="form-group">
                                                            <select class="form-control" name="select_provincep"  onchange="fetch_select(this.value,'1');" id="province exampleFormControlSelect1" required>
                                                                        <option value="">SELECT PROVINCE</option>
                                                                        <?php  while ($row = mysqli_fetch_assoc($stmt_province)) 
                                                                                {
                                                                                    ?>
                                                                                    <option value="<?php echo $row['ProvinceID'] ?>"><?php  echo $row['Name']; ?></option>
                                                                                    <?php
                                                                                }
                                                                                
                                                                                ?>
                                                                    </select>
                                                                            </div>
                                                                    <div class="form-group">

                                                            <select class="form-control" name="select_districtp" id="select_district1" required>
                                                                    <option value="">SELECT DISTRICT</option>
                                                            
                                                                    </select>

                                                            </div> 
                                                            <div >
                                                            <input class="form-control" type="text" name="Permanent_streetline" id="" placeholder="Permanent StreetLine" required>  

                                                </div> 
                                                            </div>                  
                                                                                   
                                                              </div>
                                            </div>
                                          
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Temporary Address</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <div class="form-group">
                                                            <select class="form-control" name="select_provincet"  onchange="fetch_select(this.value,'2');" id="province exampleFormControlSelect1" required>
                                                                        <option value="">SELECT PROVINCE</option>
                                                                        <?php  while ($row = mysqli_fetch_assoc($stmt_province1)) 
                                                                                {
                                                                                    ?>
                                                                                    <option value="<?php echo $row['ProvinceID'] ?>"><?php  echo $row['Name']; ?></option>
                                                                                    <?php
                                                                                }
                                                                                
                                                                                ?>
                                                                    </select>
                                                                            </div>
                                                                    <div class="form-group">

                                                            <select class="form-control" name="select_districtt" id="select_district2" required>
                                                                    <option value="">SELECT DISTRICT</option>
                                                            
                                                                    </select>

                                                            </div>
                                                            <div >
                                                            <input class="form-control" type="text" name="temporary_streetline" id="" placeholder="Temporary StreetLine" required>  

                                                </div> 
                                                            </div>                  
                                                                                   
                                                              </div>
                                            </div>
                                       
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Occupation</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input type="text" class="form-control" placeholder="Enter Occupation" name="occupation" >

                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Pusta No:.</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input type="text" class="form-control" onkeyup="fetch_father(this.value)" placeholder="Enter Pusta Number" name="pusta_no" >

                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Father Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                  <select class="form-control" name="fatherid" id="fathers">
                                                                    <option value="">SELECT Father</option>
                                                            
                                                                    </select>
               
                                                </div>
                                            </div>
                        
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">About </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <textarea class="form-control" name="about" rows="4" cols="50" placeholder="enter some description"></textarea>


                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Is Alive ?</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input class="form-control " type="checkbox" name="activeStatus" id="actCheck"><br>

                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input class="form-control btn btn-primary" type="submit" name="addmember" value="Add" id="subBtn">

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
function fetch_select(val,index)
{
 
    $.ajax({
 type: 'post',
 url: 'fetchdata.php',
 data: {
  get_option:val
 },
 success: function (response) {
document.getElementById("select_district"+index).innerHTML=response; 
 } 
 
 });

}
function fetch_father(pustano)
{
    $.ajax({
 type: 'post',
 url: 'fetchdata.php',
 data: {
  get_pusta:pustano
 },
 success: function (response) {
document.getElementById("fathers").innerHTML=response; 
 } 
 
 });

}
            </script>
        <?php

    include 'include/dashboard-footer.php';
    }
    else {
        header('location:index.php');
    } 
	?>



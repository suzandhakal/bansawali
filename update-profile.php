<?php 
session_start();

if(isset($_SESSION['usersession']) && $_SESSION['usersession']=="admin")
{
	require "dbcontroller.php";
	include 'include/dashboard-sidebar.php';
    if($_GET['profileid'])
    {
        $slug=$_GET['profileid'];
        $db_handle = new DBController();
        $stmt_province =$db_handle->rawQuery("SELECT * FROM province");
$stmt_province1 =$db_handle->rawQuery("SELECT * FROM province");
        $result = $db_handle->rawQuery("SELECT * FROM updatedetail WHERE slug='$slug'");
            $i=1;
        while ($row = mysqli_fetch_assoc($result)) {
            $live ="";
            $status = $row['activeStatus'];
            if($status=="on")
            {
                $live.="checked";
            }
            $fathername = $row['fatherfirstname'].' '.$row['fathermiddlename'].' '.$row['fatherlastname'];
        ?>
        <style>
    .profile{
        text-align:center;
    }
    .profile img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
}
    </style>
      <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                          
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                     People Profile
                                     <p style="text-align:right;"><a href="peoples.php">Go Back</a></p>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="AddMember.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <input type="hidden" name="personid" value="<?php echo $row['person_id']; ?>">
                                        <input type="hidden" name="parentid" value="<?php echo $row['parentid']; ?>">
                                        
                                        <div class="row form-group">
                                                <div class="col col-md-9">
                                                </div>
                                                <div class="col-12 col-md-3">
                                                <input class="form-control btn btn-primary" type="submit" name="updatemember" value="Update Details" id="subBtn">

                                                </div>
                                            </div> 
                                        <p style="font-size:16px; color:red" align="center">  </p>
                                            <div class="profile">
                                                <input type="hidden" name="default_image" value="<?php echo $row['profile_picture']; ?>">
                                                <?php 
                                                if($row['profile_picture']!="")
                                                {
                                                    ?>
                                                    <img style="border-radius:50%;width:150px;height:150px;" id="output" src="storage/profile/<?php echo $row['profile_picture']; ?>"> 
                                                    <?php
                                                }
                                                else {
                                                    ?>
                                            <img src="storage/profile/defaultuser.png" id="output"> 
                                                    <?php
                                                    
                                                }
                                                ?>

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
                                                <input type="file"  accept="image/*" id="output" name="image" class="form-control" id="customFile" onchange="loadFile(event)" requiredonchange="loadFile(event)" />

                                                </div>
                                            </div>
                                               <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Full Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input class="form-control" type="text" name="fname" id="" value="<?php echo  $row['firstName']; ?>" placeholder="First Name" required><br> 
                                                <input class="form-control" type="text" name="mname" value="<?php echo  $row['middleName']; ?>" id="" placeholder="Middle Name"><br>
                                              <input class="form-control" type="text" name="lname" value="<?php echo  $row['lastName']; ?>" id="" placeholder="Last Name">  
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Gender</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <?php 
                                                        $checkedstatus = $row['Gender'];
                                                    ?>
                                                <input  type="radio" name="gender" value="Male"
                                                <?php 
                                                        if($checkedstatus =="Male")
                                                        {
                                                            echo "checked";
                                                        }
                                                ?>
                                                >Male
                                                <input  type="radio" name="gender" value="Female"
                                                <?php 
                                                        if($checkedstatus =="Female")
                                                        {
                                                            echo "checked";
                                                        }
                                                ?>>Female  
                                                <input  type="radio" name="gender" value="Others"
                                                <?php 
                                                        if($checkedstatus =="Others")
                                                        {
                                                            echo "checked";
                                                        }
                                                ?>>Others                                                   
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Date Of Birth</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" id="date" name="DOB" value="<?php echo $row['DateOfBirth']; ?>" class="form-control" required="">
                                                    
                                                </div>
                                            </div>
 

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Permanent Address</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <div class="form-group">
                                                            <select class="form-control" name="select_provincep"  onchange="fetch_select(this.value,'1');" id="province exampleFormControlSelect1" required>
                                                                        <option value="<?php echo $row['ppid'] ?>"><?php echo $row['permanentProvince']; ?></option>
                                                                        <?php  while ($rowp = mysqli_fetch_assoc($stmt_province)) 
                                                                                {
                                                                                    ?>
                                                                                    <option value="<?php echo $rowp['ProvinceID'] ?>"><?php  echo $rowp['Name']; ?></option>
                                                                                    <?php
                                                                                }
                                                                                
                                                                                ?>
                                                                    </select>
                                                                            </div>
                                                                    <div class="form-group">

                                                            <select class="form-control" name="select_districtp" id="select_district1" required>
                                                                    <option value="<?php echo $row['pdid']; ?>"><?php echo $row['permanentDistrict'] ?></option>
                                                            
                                                                    </select>

                                                            </div> 
                                                            <div >
                                                            <input class="form-control" type="text" name="Permanent_streetline" value="<?php echo $row['Permanent_StreetLine']; ?>" id="" placeholder="Permanent StreetLine" required>  

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
                                                                        <option value="<?php echo $row['tpid'] ?>"><?php echo $row['temporaryProvince']; ?></option>
                                                                        <?php  while ($rowt = mysqli_fetch_assoc($stmt_province1)) 
                                                                                {
                                                                                    ?>
                                                                                    <option value="<?php echo $rowt['ProvinceID'] ?>"><?php  echo $rowt['Name']; ?></option>
                                                                                    <?php
                                                                                }
                                                                                
                                                                                ?>
                                                                    </select>
                                                                            </div>
                                                                    <div class="form-group">

                                                            <select class="form-control" name="select_districtt" id="select_district2" required>
                                                                    <option value="<?php echo $row['tdid'] ?>"><?php echo $row['temporaryDistrict'] ?></option>
                                                            
                                                                    </select>

                                                            </div>
                                                            <div >
                                                            <input class="form-control" type="text" name="temporary_streetline" value="<?php echo $row['Temporary_StreetLine']; ?>" id="" placeholder="Temporary StreetLine" required>  

                                                </div> 
                                                            </div>                  
                                                                                   
                                                              </div>
                                            </div>
                                       


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Occupation</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input type="text" class="form-control" placeholder="Enter Occupation" value="<?php echo  $row['Occupation']; ?>" name="occupation" >

                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Pusta Number</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input type="text" class="form-control" onkeyup="fetch_father(this.value,'<?php echo $row['slug']; ?>')" placeholder="Enter Pusta Number" name="pusta_no" value="<?php echo $row['Pusta_Number']; ?>">

                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Father Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <select class="form-control" name="fatherid" id="fathers">
                                                                    <option value="<?php echo $row['fatherid'];?> "><?php echo $fathername; ?></option>
                                                            
                                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">About </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <textarea class="form-control" name="about" rows="4" cols="50" value="<?php echo  $row['About_people']; ?>" placeholder="enter some description"><?php echo  $row['About_people']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Is Alive ?</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input class="form-control " type="checkbox" name="activeStatus" id="actCheck" <?php echo $live; ?>><br>

                                                </div>
                                            </div>
                                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">People Registration date</label>
                                                </div>  
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="adminregdate" name="adminregdate" value="<?php echo  $row['RegDate']; ?>" class="form-control" required="" readonly="">
                                                    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <input class="form-control btn btn-primary" type="submit" name="updatemember" value="Update Details" id="subBtn">

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
function fetch_father(pustano,slug)
{
    $.ajax({
 type: 'post',
 url: 'fetchdata.php',
 data: {
  get_pusta:pustano,
  get_slug:slug
 },
 success: function (response) {
document.getElementById("fathers").innerHTML=response; 
 } 
 
 });

}
            </script>
        <?php
            $i++;
        }
    }
    include 'include/dashboard-footer.php';
    }
    else {
        header('location:index.php');
    } 
	?>



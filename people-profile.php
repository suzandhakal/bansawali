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
        $result = $db_handle->rawQuery("SELECT * FROM peoplesdetail WHERE slug='$slug'");
            $i=1;
        while ($row = mysqli_fetch_assoc($result)) {
            $live ="";
            $status = $row['activeStatus'];
            if($status=="on")
            {
                $live.="YES";
            }
            else
            {
                $live.="No";
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
    border-radius: 50%
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
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <p style="font-size:16px; color:red" align="center">  </p>
                                            <div class="profile">
                                                <?php 
                                                if($row['profile_picture']!="")
                                                {
                                                    ?>
                                                    <img style="border-radius:50%;width:150px;height:150px;" src="storage/profile/<?php echo $row['profile_picture']; ?>"> 
                                                    <?php
                                                }
                                                else {
                                                    ?>
                                            <img src="storage/profile/defaultuser.png"> 
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
                                                    <label for="text-input" class=" form-control-label">Full Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="adminname" name="adminname" value="<?php echo  $row['firstName'].' '.$row['middleName'].' '.$row['lastName'] ?>" class="form-control" required="" readonly>
                                                    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Gender</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" readonly>
                                                        <option value="<?php echo $row['Gender']; ?>"><?php echo $row['Gender']; ?></option>
                                                        <option value="Male" disabled>Male</option>
                                                        <option value="Female" disabled>Female</option>
                                                    </select>                                                    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email-input" class=" form-control-label">Date Of Birth</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="email" id="email" name="email" value="<?php echo $row['DateOfBirth']; ?>" class="form-control" required="" readonly>
                                                    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password-input" class=" form-control-label">Permanent Address</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="mobilenumber" name="mobilenumber" class="form-control" maxlength="10" value="<?php echo $row['permanentAddress']; ?>" required="" readonly>
                                                </div>
                                            </div>
                                          
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Temporary Address</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input name="username" id="username" rows="9" class="form-control" required="" readonly="" value="<?php echo  $row['temporaryAddress']; ?>">

                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Occupation</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input name="username" id="username" rows="9" class="form-control" required="" readonly="" value="<?php echo  $row['Occupation']; ?>">

                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Father Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input name="username" id="username" rows="9" class="form-control" required="" readonly="" value="<?php echo $fathername; ?>">

                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Pusta Number</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input name="username" id="username" rows="9" class="form-control" required="" readonly="" value="<?php echo $row['Pusta_Number']; ?>">

                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">About </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea rows="4" cols="50" class="form-control" readonly="" value="<?php echo  $row['About_people']; ?>"><?php echo  $row['About_people']; ?>
                                                </textarea>

                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Is Alive ?</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input name="username" id="username" rows="9" class="form-control" required="" readonly="" value="<?php echo $live; ?>">

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
                                        </form>
                                    </div>
                                   
                                </div>
                       
                     
                        
                </div>
                </div>
            </div>
        </div>
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



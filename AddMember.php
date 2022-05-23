<?php
session_start();
extract($_POST);
// print_r($_POST);
include "dbcontroller.php";
$db_handle = new DBController();
$fname = $db_handle->escapechar($fname);
$mname = $db_handle->escapechar($mname);
$lname = $db_handle->escapechar($lname);
$Permanent_streetline = $db_handle->escapechar($Permanent_streetline);
$temporary_streetline = $db_handle->escapechar($temporary_streetline);
$about = $db_handle->escapechar($about);
$occupation = $db_handle->escapechar($occupation);

if(isset($_POST['addmember'])){
    $adminid =$_SESSION['id'];
    $time = date("YmdHis");
    $slug = $time.md5($fname.$lname.$DOB);
    $init_filename = $_FILES['image']['name'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $explode= explode('.',$init_filename);
      $extension = pathinfo($init_filename, PATHINFO_EXTENSION);
  
    if($init_filename!=null)
    {
        $filename = $time."-".$fname.$mname.$lname.$init_filename ;
              if (!in_array($extension, ['jpg', 'png', 'gif','JPG', 'PNG', 'GIF'])) {
            echo "You file extension must be .jpg, .png or .gif";
        } elseif ($_FILES['image']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
            echo "File too large!";
        } else {
            if(move_uploaded_file($file_tmp,"storage/profile/".$filename)){
            }
            else{
                echo "file uploadation fail";
            }
    
        }

    }
    else{
        $filename = null;
    }
      
    
        if($fatherid==null)
        {
            $fatherid=0;
        }

    @$InsertQuery = "INSERT INTO `person` (`firstName`, `middleName`, `lastName`,Gender,
    Permanent_DistrictID,TemporaryDistrictID,Permanent_StreetLine,Temporary_StreetLine,
    Pusta_Number,Occupation,
     About_people,`uid`, `activeStatus`,DateOfBirth,slug,profile_picture,AddedBy) 
    VALUES ('$fname', '$mname', '$lname','$gender','$select_districtp','$select_districtt',
    '$Permanent_streetline','$temporary_streetline','$pusta_no','$occupation','$about','$uudi', 
    '$activeStatus','$DOB','$slug','$filename','$adminid')";
    $db_handle->insertQuery($InsertQuery);
    $chid = $db_handle->newId();
    try{
        @$UpdateRelation = "INSERT INTO `parent` (`chid`, `prid`) VALUES ('$chid', '$fatherid')";
        // echo "INSERT INTO `parent` (`chid`, `prid`,mid) VALUES ('$chid', '$fatherid','$motherid')";
        // echo $motherid."<br>";
        $db_handle->insertQuery($UpdateRelation);
        header("location: peoples.php");
    }
    catch(Exception $e)
    {
        header("location: peoples.php");

    }
  

}
if(isset($_POST['add_admin']))
{
    @$InsertQuery = "INSERT INTO `superuser` (`firstName`, `middleName`, `lastName`,mobile,mail,password) 
   VALUES ('$fname', '$mname', '$lname','$contact_number','$email_address','$password')";
   $db_handle->insertQuery($InsertQuery);
$name = $fname.' '.$mname.' '.$lname;

   $to_email = $email_address;
   $subject = "Bansawali Login Details";
   $body = "Hi, (  $name  )  please use this given password in admin login in https://family.iotech.com.np \n <br> Staff id: $email_address \n <br>Staff Password : $password
   \n<br> <span style='color:red;'> Make sure to keep your id and password secret</span>";
   $headers[] = "From: appointmentsystem4@gmail.com";
   $headers[] = 'MIME-Version: 1.0';
   $headers[] = 'Content-type: text/html; charset=iso-8859-1';
   
   if (mail($to_email, $subject, $body,implode("\r\n", $headers))) {
    header("location: admins.php");
   }
   else {
       echo "email sending fail";
   }


}
if(isset($_POST['updatemember']))
{
    $time = date("YmdHis");
    $slug = $time.md5($fname.$lname.$DOB);
    $init_filename = $_FILES['image']['name'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $explode= explode('.',$init_filename);
    if($init_filename!=null)
    {
        $filename = $time."-".$fname.$mname.$lname.$init_filename ;
         $extension = pathinfo($init_filename, PATHINFO_EXTENSION);
        if (!in_array($extension, ['jpg', 'png', 'gif','JPG', 'PNG', 'GIF'])) {
            echo "You file extension must be .jpg, .png or .gif";
        } elseif ($_FILES['image']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
            echo "File too large!";
        } else {
            if(move_uploaded_file($file_tmp,"storage/profile/".$filename)){
            }
            else{
                echo "file uploadation fail";
            }
    
        }
       

    }
    else{
        $filename = $default_image;
    }
       
    
        if($fatherid==null)
        {
            $fatherid=0;
        }
    @$InsertQuery = "UPDATE person SET firstName='$fname',
    middleName='$mname',lastName='$lname',
    Gender='$gender',Permanent_DistrictID='$select_districtp',TemporaryDistrictID='$select_districtt',
    Permanent_StreetLine='$Permanent_streetline',Temporary_StreetLine='$temporary_streetline',
    Pusta_Number='$pusta_no',Occupation='$occupation',About_people='$about',activeStatus='$activeStatus',
    DateOfBirth='$DOB',profile_picture='$filename' WHERE id=$personid";
    $db_handle->insertQuery($InsertQuery);
    try{
        $result = $db_handle->rawQuery("SELECT * FROM parent where chid =$personid");
        // echo mysqli_num_rows($result);
       
        if(mysqli_num_rows($result)>0)
        {
            @$UpdateRelation = "UPDATE parent SET prid='$fatherid' WHERE id=$parentid";
            $db_handle->insertQuery($UpdateRelation);
        }else{
                  @$UpdateRelation = "INSERT INTO `parent` (`chid`, `prid`) VALUES ('$personid', '$fatherid')";
            $db_handle->insertQuery($UpdateRelation);
        }
 
        header("location: peoples.php");
    }
    catch(Exception $e)
    {
        header("location: peoples.php");

    }
}
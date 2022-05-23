<?php
require "dbcontroller.php";
$db_handle = new DBController();
if(isset($_POST['gender']) || isset($_POST['addedBy']))
{
$gender = $_POST['gender'];
$addedBy = $_POST['addedBy'];
$pustano= $_POST['pustano'];
$gendercondition ="";
if(!empty($_POST['gender']))
{ 
    if(empty($gendercondition))
    {
        $gendercondition .= " WHERE per.Gender = '$gender'";
    }
    else {
        $gendercondition .= " AND per.Gender = '$gender'";

    }
}
if(!empty($_POST['pustano']))
{ 
    if(empty($gendercondition))
    {
        $gendercondition .= " WHERE per.Pusta_Number = '$pustano'";
    }
    else {
        $gendercondition .= " AND per.Pusta_Number = '$pustano'";

    }
}
if(!empty($_POST['addedBy']))
{
    if(empty($gendercondition))
    {
        $gendercondition .= " WHERE per.AddedBy = $addedBy";
    }
    else {
        $gendercondition .= " AND per.AddedBy = $addedBy";

    }
}

$myquery ="SELECT per.firstName,per.middleName,per.lastName,per.Pusta_Number,Concat(per.Permanent_StreetLine,', ',pdistrict.district_Name,', ',pprovince.Name) as permanentAddress, Concat(per.Temporary_StreetLine,', ',tdistrict.district_Name,', ',tprovince.Name) as temporaryAddress,per.profile_picture,per.Gender,per.Occupation,per.About_people,per.DateOfBirth,per.RegDate,per.activeStatus,per.slug,per.AddedBy,
 father.firstName as fatherfirstname,father.middleName as fathermiddlename,
 father.lastName as fatherlastname FROM person as per 
 LEFT JOIN parent parid on per.id = parid.chid 
  LEFT JOIN person father on parid.prid=father.id
  LEFT JOIN districts pdistrict on per.Permanent_DistrictID = pdistrict.DistrictID
  LEFT JOIN districts tdistrict on per.TemporaryDistrictID = tdistrict.DistrictID
  LEFT JOIN province pprovince on pdistrict.ProvinceID = pprovince.ProvinceID
  LEFT JOIN province tprovince on tdistrict.ProvinceID = tprovince.ProvinceID". $gendercondition;
 $result = $db_handle->rawQuery("SELECT per.firstName,per.middleName,per.lastName,per.Pusta_Number,Concat(per.Permanent_StreetLine,', ',pdistrict.district_Name,', ',pprovince.Name) as permanentAddress, Concat(per.Temporary_StreetLine,', ',tdistrict.district_Name,', ',tprovince.Name) as temporaryAddress,per.profile_picture,per.Gender,per.Occupation,per.About_people,per.DateOfBirth,per.RegDate,per.activeStatus,per.slug,per.AddedBy,
 father.firstName as fatherfirstname,father.middleName as fathermiddlename,
 father.lastName as fatherlastname FROM person as per 
 LEFT JOIN parent parid on per.id = parid.chid 
  LEFT JOIN person father on parid.prid=father.id
  LEFT JOIN districts pdistrict on per.Permanent_DistrictID = pdistrict.DistrictID
  LEFT JOIN districts tdistrict on per.TemporaryDistrictID = tdistrict.DistrictID
  LEFT JOIN province pprovince on pdistrict.ProvinceID = pprovince.ProvinceID
  LEFT JOIN province tprovince on tdistrict.ProvinceID = tprovince.ProvinceID". $gendercondition);
 
 $totalpeople = mysqli_num_rows($result);
 $returnvalue = "<h3> Total No. of People : ".$totalpeople."</h3>";
 $returnvalue .= '<table class="table" id="myTable">
 <tr>
 <th> S No.</th>
 <th>Full Name</th>
 <th>Father Name</th>
 <th>Gender</th>
 <th>Date of Birth</th>
 <th>Pusta No.</th>
 <th>Is alive ?</th>
 <th>Reg_Date</th>
 <th class="text-center" colspan=3>Action</th>
 </tr>
 ';
 $i=1;
     while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['firstName'].' '.$row['middleName'].' '.$row['lastName'];  
        $fathername = $row['fatherfirstname'].' '.$row['fathermiddlename'].' '.$row['fatherlastname'];
        $status = $row['activeStatus'];
            if($status=="on")
            {
                $mystatus = "Yes";
            }
            else
            {
                $mystatus ="No";
            }
            
        $returnvalue.='<tr><td>'.$i.'</td>
        <td>'.$name.'</td>
        <td>'.$fathername.'</td>
        <td>'.$row['Gender'].'</td>
        <td>'.$row['DateOfBirth'].'</td>
            <td>'.$row['Pusta_Number'].'</td>
        <td>'.$mystatus.'</td>
        <td>'.$row['RegDate'].'</td>        
            <tr>';
      $i++;  
     } 
        $returnvalue.='</table>';

        echo $returnvalue;
}
if(isset($_POST['get_option']))
{
  

 $province_id = $_POST['get_option'];
 $stmt_district = $db_handle->rawQuery("SELECT * FROM districts WHERE ProvinceID = $province_id");

 while ($rowdistrict = mysqli_fetch_assoc($stmt_district)) 
 {
  echo "<option value=".$rowdistrict['DistrictID']." >".$rowdistrict['district_Name']."</option>";
 }
 exit;
}

if(isset($_POST['get_pusta']))
{
    $pustano = $_POST['get_pusta']-1;
    if(isset($_POST['get_slug']))
    {
        $personslug=$_POST['get_slug'];
        $resultfather = $db_handle->rawQuery("SELECT * FROM person Where Gender='Male' AND Pusta_Number = $pustano AND slug <> '$personslug'" );

    }
    else{
        $resultfather = $db_handle->rawQuery("SELECT * FROM person Where Gender='Male' AND Pusta_Number = $pustano" );

    }
    while ($rowfather = mysqli_fetch_assoc($resultfather)) {
        echo "<option value='".$rowfather['id']."'>".$rowfather['firstName'].' '.$rowfather['lastName'].'( '.$rowfather['DateOfBirth'].' )'."</option>";

    }
}
?>